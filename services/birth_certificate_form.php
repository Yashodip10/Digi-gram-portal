<?php
session_name("user_page");
session_start();
include '../database/db.php';
require_once __DIR__ . './../certificate/include/vendor/autoload.php';

if(isset($_POST['birth_submit'])){
$user_id=$_SESSION['username'];
$name_of_child=$_POST['name_of_child'];
$date_of_birth=$_POST['date_of_birth'];
$gender=$_POST['gender'];
$birth_place=$_POST['birth_place'];
$birth_village=$_POST['birth_village'];
$birth_tal=$_POST['birth_tal'];
$birth_dist=$_POST['birth_dist'];
$father_name=$_POST['father_name'];
$mother_name=$_POST['mother_name'];
$father_aadhar_no=$_POST['father_aadhar_no'];
$mother_aadhar_no=$_POST['mother_aadhar_no'];
$full_address=$_POST['full_address'];
$pin_code=$_POST['pin_code'];
$mobile_no=$_POST['mobile_no'];
$service_name='Birth Certificate Request';

$sql = "SELECT token_no FROM birth_certificates ORDER BY sr DESC LIMIT 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$last_token_no=isset($row['token_no']) ? str_replace("Birth", "", $row['token_no']):0;
$token_no = 'Birth'. (int)$last_token_no + 1;

$target_dir = "../certificate/uploads/birth/$user_id/";
$father_aadhar_path = $target_dir . "father_aadhar.jpg";
$mother_aadhar_path = $target_dir . "mother_aadhar.jpg";


if (!file_exists($target_dir)) {
  mkdir($target_dir, 0777, true);
}
move_uploaded_file($_FILES["father_aadhar"]["tmp_name"], $father_aadhar_path);
move_uploaded_file($_FILES["mother_aadhar"]["tmp_name"], $mother_aadhar_path);


$mpdf = new \Mpdf\Mpdf();

$html =" <style>
        body {
            font-family: Arial, sans-serif;
            width: 800px;
            height: 1000px;
            margin: auto;
            padding: 20px;
            border: 2px solid black;
            position: relative;
        }
        .header {
            text-align: center;
            font-size: 22px;
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 20px;
        }
        
        .section-title {
            font-size: 16px;
            font-weight: bold;
            text-decoration: underline;
            margin-top: 30px;
            margin-left:30%;
        }
        .details {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }
        .details td {
            padding: 8px;
            border: none;
        }
        .label {
            font-weight: bold;
            text-align:left;
        }
        th{
          width:30%;
          }
        td{
        width:70%;
}

.documents{
  width:100vw;
}
  .document{
  width:100%;
}
    </style>

    <div class='header'>
        Maharastra Government<br>
        Birth Certificate Application
    </div>
<hr/>
    <div class='section-title'>Child Details</div>
    <table class='details'>
        <tr><th class='label'>Name of Child:</th><td>[$name_of_child]</td></tr>
        <tr><th class='label'>Date of Birth:</th><td>[$date_of_birth]</td></tr>
        <tr><th class='label'>Gender:</th><td>[$gender]</td></tr>
    </table>

    <div class='section-title'>Place of Birth</div>
    <table class='details'>
        <tr><th class='label'>Hospital/Home Name:</th><td>[$birth_place]</td></tr>
        <tr><th class='label'>Village/Town/City:</th><td>[$birth_village]</td></tr>
        <tr><th class='label'>Tahsil:</th><td>[$birth_tal]</td></tr>
        <tr><th class='label'>District:</th><td>[$birth_dist]</td></tr>
        <tr><th class='label'>State:</th><td>Maharashtra</td></tr>
    </table>
 
    <div class='section-title'>Parents' Information</div>
    <table class='details'>
        <tr><th class='label'>Father's Full Name:</th><td>[$father_name]</td></tr>
        <tr><th class='label'>Mother's Full Name:</th><td>[$mother_name]</td></tr>
        <tr><th class='label'>Father's Aadhaar No.:</th><td>[$father_aadhar_no]</td></tr>
        <tr><th class='label'>Mother's Aadhaar No.:</th><td>[$mother_aadhar_no]</td></tr>
        <tr><th class='label'>Nationality of Parents:</th><td>Indian</td></tr>
    </table>

    <div class='section-title'>Address Details</div>
    <table class='details'>
        <tr><th class='label'>Full Residential Address:</th><td>[$full_address]</td></tr>
        <tr><th class='label'>Pincode:</th><td>[$pin_code]</td></tr>
        <tr><th class='label'>Mobile No.:</th><td>[$mobile_no]</td></tr>
    </table>
<table class='documents'>
     
     <tr class='document'><td><img src='$father_aadhar_path' alt='father_adhar' ></img></td></tr>
     <tr class='document'><td><img src='$mother_aadhar_path' alt='mother_adhar'></img></td></tr>
     </table>
";
$mpdf->WriteHTML($html);
$pdfFileName = "C:/xampp/htdocs/Digi-gram/certificate/generated_forms/birth_form/birth_certificate_$token_no.pdf";
$mpdf->Output($pdfFileName,'F');


$application_form=$pdfFileName;


$sql="INSERT INTO `birth_certificates` (name_of_child, sex, date_of_birth, place_of_birth, village_of_birth, birth_tal, birth_dist, name_of_mother, name_of_father, father_aadhar_no, mother_aadhar_no, permanent_address, pin_code, mobile_no,  user_id, token_no, application_form,requested_date)
                                VALUES ('$name_of_child', '$gender', '$date_of_birth', '$birth_place', '$birth_village', '$birth_tal', '$birth_dist', '$mother_name', '$father_name', '$father_aadhar_no', '$mother_aadhar_no', '$full_address', '$pin_code', '$mobile_no', '$user_id', '$token_no', '$application_form',NOW())";


$result = mysqli_query($conn, $sql);
if (!$result) {
    die("Query Failed:1 " . mysqli_error($conn));
}

$sql2="INSERT INTO `document_requests` (user_id,service_name,token_no,requested_date,application_form)
VALUES('$user_id','$service_name','$token_no',NOW(),'$application_form')";

$result2 = mysqli_query($conn, $sql2);
if (!$result2) {
    die("Query Failed:2 " . mysqli_error($conn));
}

if($result && $result2){
  echo "<script>alert('form submitted successfully');
        window.location.replace('services.php?key=Dashboard');
  </script>";

}
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Birth Certificate Form (Maharashtra)</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    />
    <style>
      body {
        background-color: #f8f9fa;
        padding: 20px;
      }
      .container {
        background: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      }
      .border_color{
        border: 1px solid rgba(0, 0, 0, 0.36);
      }
    </style>
  </head>
  <body>
    <div class="container">
      <h2 class="text-center mb-4">Birth Certificate Form</h2>

      <form action="" method="POST" enctype="multipart/form-data" class="">
        <!-- Child Details -->
        <div class="mb-3">
          <label class="form-label"
            ><span class="text-danger">*</span>Name of Child</label
          >
          <input type="text" class="form-control border_color" name="name_of_child" required />
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="form-label"
              ><span class="text-danger">*</span>Date of Birth</label
            >
            <input
              type="date"
              class="form-control border_color"
              name="date_of_birth"
              required
            />
          </div>
          
        </div>

        <div class="mb-3">
          <label class="form-label"
            ><span class="text-danger">*</span>Gender</label
          >
          <select class="form-control border_color" name="gender" required>
            <option value="">Select</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
          </select>
        </div>

        <!-- Place of Birth -->
        <h5><span class="text-danger">*</span>Place of Birth</h5>
        <div class="mb-3">
          <label class="form-label"
            ><span class="text-danger">*</span>Hospital/Home Name</label
          >
          <input
            type="text"
            class="form-control border_color"
            name="birth_place"
            required
          />
        </div>

        <div class="row">
          <div class="col-md-4 mb-3">
            <label class="form-label"
              ><span class="text-danger">*</span>Village/Town/City</label
            >
            <input type="text" class="form-control border_color" name="birth_village" required />
          </div>
          <div class="col-md-4 mb-3">
            <label class="form-label"
              ><span class="text-danger">*</span>Tahsil</label
            >
            <input type="text" class="form-control border_color" name="birth_tal" required />
          </div>
          <div class="col-md-4 mb-3">
            <label class="form-label"
              ><span class="text-danger">*</span>District</label
            >
            <input type="text" class="form-control border_color" name="birth_dist" required />
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label"
            ><span class="text-danger">*</span>State</label
          >
          <input
            type="text"
            class="form-control border_color"
            value="Maharashtra"
            readonly
          />
        </div>

        <!-- Parents Information -->
        <h5>Parents' Information</h5>
        <div class="mb-3">
          <label class="form-label"
            ><span class="text-danger">*</span>Father's Full Name</label
          >
          <input type="text" class="form-control border_color" name="father_name" required />
        </div>

        <div class="mb-3">
          <label class="form-label"
            ><span class="text-danger">*</span>Mother's Full Name</label
          >
          <input type="text" class="form-control border_color" name="mother_name" required />
        </div>

        <div class="mb-3">
          <label class="form-label"
            ><span class="text-danger">*</span>Nationality of Parents</label
          >
          <select class="form-control border_color" required>
            <option value="">Select</option>
            <option value="Indian" selected>Indian</option>
            <option value="Other">Other</option>
          </select>
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="form-label"
              ><span class="text-danger">*</span>Father's Aadhaar No.
              (must)</label
            >
            <input type="text" class="form-control border_color" name="father_aadhar_no" />
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label"
              ><span class="text-danger">*</span>Mother's Aadhaar No.
              (must)</label
            >
            <input type="text" class="form-control border_color" name="mother_aadhar_no" />
          </div>
        </div>

        <!-- Address -->
        <h5>Address Details</h5>
        <div class="mb-3">
          <label class="form-label"
            ><span class="text-danger">*</span>Full Residential Address</label
          >
          <textarea
            class="form-control border_color"
            rows="2"
            name="full_address"
            required
          ></textarea>
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="form-label"
              ><span class="text-danger">*</span>Pincode</label
            >
            <input type="text" class="form-control border_color" name="pin_code" required />
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label"
              ><span class="text-danger">*</span>Mobile No.</label
            >
            <input type="text" class="form-control border_color" name="mobile_no" required />
          </div>
        </div>

        <h4>Documents</h4>
      <div class="mb-3">
      <span class="text-danger">*</span> <label class="form-label"
          >Father Aadhar </label
        >
        <input type="file" accept=".jpg, .jpeg, .png" class="form-control border-dark" name="father_aadhar" required />
      </div>

      <div class="mb-3">
      <span class="text-danger">*</span> <label class="form-label"
          >Mother Aadhar </label
        >
        <input type="file" accept=".jpg, .jpeg, .png" class="form-control border-dark" name="mother_aadhar" required />
      </div>

        <!-- Registration Details -->
        <div class="text-center mt-4">
        <input type="submit" name="birth_submit" class="btn btn-primary" />
        </div>
      </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
