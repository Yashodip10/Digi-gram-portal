<?php
session_name("user_page");
session_start();
include '../database/db.php';
require_once __DIR__ . './../certificate/include/vendor/autoload.php';

if(isset($_POST['death_submit'])){
$user_id=$_SESSION['username'];
$name=$_POST['name'];
$date_of_death=$_POST['date_of_death'];
$place_of_death=$_POST['place_of_death'];
$gender=$_POST['gender'];
$age=$_POST['age'];
$name_of_father=$_POST['name_of_father'];
$address_at_death=$_POST['address_at_death'];
$permanent_address=$_POST['permanent_address'];
$registration_no=$_POST['registration_no'];
$date_of_registration=$_POST['date_of_registration'];
$remarks='NILL';
$service_name='Death Certificate Request';

$sql = "SELECT token_no FROM death_certificates ORDER BY sr DESC LIMIT 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$last_token_no=isset($row['token_no']) ? str_replace("Death", "", $row['token_no']):0;
$token_no = 'Death'. (int)$last_token_no + 1;

$target_dir = "../certificate/uploads/death/$user_id/";
$death_aadhar_path = $target_dir . "death_aadhar.jpg";

if (!file_exists($target_dir)) {
  mkdir($target_dir, 0777, true);
}
move_uploaded_file($_FILES["death_aadhar"]["tmp_name"], $death_aadhar_path);

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
        .photos {
            width: 100%;
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
             position:absolute;
            top:0;
            right:0;
        }
        .photos img {
            width: 100px;
            height: 120px;
            object-fit: cover;
            border: 1px solid black;
           
        }
        .section-title {
            font-size: 16px;
            font-weight: bold;
            text-decoration: underline;
            margin-top: 30px;
            margin-bottom: 30px;
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
        }
            th{ width:30%; text-align:left;}
            td{ width:70%;
            }
            
.documents{
  width:100vw;
}
  .document{
  width:100%;
}
    </style>
</head>
<body>

    <div class='header'>
        Government of Maharashtra <br>
        Death Application
    </div>

    <div class='photos'>
        <img src='C:/xampp/htdocs/Digi-gram/assets/user.png' alt='Deceased Photo'>
    </div>
    <hr/>

     <div class='section-title'>Deceased Details</div>
    <table class='details'>
        <tr><th>Name of Deceased:</th><td>[$name]</td></tr>
        <tr><th>Date of Death:</th><td>[$date_of_death]</td></tr>
        <tr><th>Place of Death:</th><td>[$place_of_death]</td></tr>
        <tr><th>Place of Death:</th><td>[$gender]</td></tr>
        <tr><th>Place of Death:</th><td>[$age]</td></tr>
    </table>

    <div class='section-title'>Family Details</div>
    <table class='details'>
        <tr><th>Father/Husband's Name:</th><td>[$name_of_father]</td></tr>
    </table>

    <div class='section-title'>Address Details</div>
    <table class='details'>
        <tr><th>Address at Time of Death:</th><td>[$address_at_death]</td></tr>
        <tr><th>Permanent Address:</th><td>[$permanent_address]</td></tr>
    </table>

    <div class='section-title'>Certificate Information</div>
    <table class='details'>
        <tr><th>Remarks:</th><td>[$remarks]</td></tr>
    </table>
    
    <table class='documents'>
     
     <tr class='document'><td><img src='$death_aadhar_path' alt='death_aadhar' ></img></td></tr>
     </table>
    ";
    $mpdf->WriteHTML($html);
    $pdfFileName = "C:/xampp/htdocs/Digi-gram/certificate/generated_forms/death_form/death_certificate_$token_no.pdf";
    $mpdf->Output($pdfFileName,'F');
    
    
    $application_form=$pdfFileName;
    
    
    $sql="INSERT INTO `death_certificates` (token_no, user_id, `name`, gender, date_of_death, place_of_death, father_or_husband_name, age, address_at_death, permanent_address, registration_no, registration_date, remarks, application_form,requested_date)
                                    VALUES ('$token_no','$user_id','$name','$gender','$date_of_death','$place_of_death','$name_of_father','$age','$address_at_death','$permanent_address','$registration_no','$date_of_registration','$remarks','$application_form',NOW())";
   
   $result=mysqli_query($conn,$sql);
    
    if (!$result) {
        die("Query Failed:1 " . mysqli_error($conn));
    }
    
    $sql2="INSERT INTO `document_requests` (user_id,service_name,token_no,requested_date,application_form)
    VALUES('$user_id','$service_name','$token_no',NOW(),'$application_form')";
    
    $result2 = mysqli_query($conn, $sql2);
    if (!$result) {
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
    <title>Death Certificate Form</title>
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
    </style>
  </head>
  <body>
    <div class="container">
      <h2 class="text-center mb-4">Death Certificate Form</h2>

      <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
          <label class="form-label"
            ><span class="text-danger">*</span>Name of Deceased</label
          >
          <input type="text" class="form-control" name="name"required />
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="form-label"
              ><span class="text-danger">*</span>Date of Death</label
            >
            <input type="date" class="form-control" name="date_of_death"required />
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label"
              ><span class="text-danger">*</span>Place of Death</label
            >
            <input type="text" class="form-control" name="place_of_death" required />
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
          <label class="form-label"
            ><span class="text-danger">*</span>Gender</label
          >
          <select class="form-control" name="gender" required>
            <option value="">Select</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
          </select>
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label"
              ><span class="text-danger">*</span>Age</label
            >
            <input type="text" class="form-control" name="age" required />
          </div>
        </div>


        <div class="mb-3">
          <label class="form-label"
            ><span class="text-danger">*</span>Name of Father/Husband</label
          >
          <input type="text" class="form-control" name="name_of_father" required />
        </div>

        <div class="mb-3">
          <label class="form-label"
            ><span class="text-danger">*</span>Address of Deceased at Time of
            Death</label
          >
          <textarea class="form-control" name="address_at_death" rows="2"></textarea>
        </div>

        <div class="mb-3">
          <label class="form-label"
            ><span class="text-danger">*</span>Permanent Address of
            Deceased</label
          >
          <textarea class="form-control" name="permanent_address" rows="2"></textarea>
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="form-label"
              ><span class="text-danger">*</span>Registration No.</label
            >
            <input type="text" class="form-control" name="registration_no"/>
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label">Date of Registration</label>
            <input type="date" class="form-control" name="date_of_registration"/>
          </div>
        </div>

        <h4>Documents</h4>
        <div class="mb-3">
        <span class="text-danger">*</span>  <label class="form-label"
          >Death Person Aadhar </label
          >
          <input type="file" accept=".jpg, .jpeg, .png" class="form-control border-dark" name="death_aadhar" required />
        </div>
        
        <div class="text-center mt-4">
        <input type="submit" name="death_submit" class="btn btn-primary" />
        </div>
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
