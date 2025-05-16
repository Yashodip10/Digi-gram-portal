<?php
session_name("user_page");
session_start();
include '../database/db.php';
require_once __DIR__ . './../certificate/include/vendor/autoload.php';

if(isset($_POST['submit'])){

  $user_id = $_SESSION['username']; 
$full_name = $_POST['full_name'];
$father_husband_name = $_POST['father_husband_name'];
$date_of_birth = $_POST['date_of_birth'];
$gender = $_POST['gender'];
$full_address = $_POST['full_address'];
$village = $_POST['village'];
$district = $_POST['district'];
$state = $_POST['state'];
$pin_code = $_POST['pin_code'];
$purpose = $_POST['purpose'];
$purpose_details = $_POST['purpose_details'];
$identity_proof_type = $_POST['identity_proof_type'];
$service_name = 'No Objection Certificate Request';

$sql = "SELECT token_no FROM noc_certificates ORDER BY sr DESC LIMIT 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$last_token_no=isset($row['token_no']) ? str_replace("noc", "", $row['token_no']):0;
$token_no = 'noc'. (int)$last_token_no + 1;

$target_dir = "../certificate/uploads/no-Objection/$user_id/";
$identity_proof_path = $target_dir . "idprof.jpg";
if (!file_exists($target_dir)) {
  mkdir($target_dir, 0777, true);
}
move_uploaded_file($_FILES["id_document"]["tmp_name"], $identity_proof_path);
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
            margin-bottom: 20px;
            margin-left:30%;
        }
        .details {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }
        .details th, .details td {
            padding: 8px;
            text-align: left;
        }
        .details th {
            font-weight: bold;
            width:30%;
            text-align:left;
        }
        .details td{width:70%}
        .required-star { color: red; font-weight: bold; }
        table { width: 100%; border-collapse: collapse; margin-top:50px;}
        th, td {  padding: 14px; text-align: left; }
        th { background-color: #f2f2f2; }

          .documents{
  width:100vw;
}
  .document{
  width:100%;
}
    </style>

    <div class='header'>
        Government of Maharashtra <br>
        Residential Appllication
    </div>

    <div class='photos'>
        <img src='C:/xampp/htdocs/testing/assets/user.png' alt='Applicant Photo'>
    </div>
  <hr/>
   <table class='table table-bordered'>
        <tr><th>Full Name</th><td>[$full_name]</td></tr>
        <tr><th>Father's / Husband's Name</th><td>[$father_husband_name]</td></tr>
        <tr><th>Date of Birth</th><td>[$date_of_birth]</td></tr>
        <tr><th>Gender</th><td>[$gender]</td></tr>
        <tr><th>Full Address</th><td>[$full_address]</td></tr>
        <tr><th>Village/Town/City</th><td>[$village]</td></tr>
        <tr><th>District</th><td>[$district]</td></tr>
        <tr><th>State</th><td>[$state]</td></tr>
        <tr><th>Pin Code</th><td>[$pin_code]</td></tr>
        <tr><th>Reason for Applying</th><td>[$purpose]</td></tr>
        <tr><th>Details of the Purpose</th><td>[$purpose_details]</td></tr>
        <tr><th>Identity Proof</th><td>[$identity_proof_type]</td></tr>
        <tr><th>Declaration</th><td>I hereby declare that the above information is true and correct.</td></tr>
    </table>
    
    <table class='documents'>
     
     <tr class='document'><td><img src='$identity_proof_path' alt='death_aadhar' ></img></td></tr>
     </table>
    ";

    $mpdf->WriteHTML($html);
    $pdfFileName = "C:/xampp/htdocs/Digi-gram/certificate/generated_forms/noobjection_form/noc_certificate_$token_no.pdf";
    $mpdf->Output($pdfFileName,'F');
    
    
    $application_form=$pdfFileName;
    
    
    $sql="INSERT INTO `noc_certificates`  (full_name, father_husband_name, date_of_birth, gender, full_address, village, district, state, pin_code, purpose, purpose_details, identity_proof_type, identity_proof_path, user_id, token_no, request_date,application_form)
                        VALUES ('$full_name', '$father_husband_name', '$date_of_birth', '$gender', '$full_address', '$village', '$district', '$state', '$pin_code', '$purpose', '$purpose_details', '$identity_proof_type', '$identity_proof_path', '$user_id', '$token_no', NOW(),'$application_form')";

    
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
    <title>No Objection Certificate (NOC) - Maharashtra</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <style>
      .required-star {
        color: red;
        font-weight: bold;
      }
    </style>
  </head>
  <body class="container mt-4">
    <h2 class="text-center mb-4">No Objection-Certificate</h2>

    <form action="" method="POST" enctype="multipart/form-data">
      <!-- Applicant's Personal Details -->
      <h4>Personal Details</h4>
      <div class="mb-3">
        <label class="form-label"
          >Full Name <span class="required-star">*</span></label
        >
        <input type="text" class="form-control" required name="full_name" />
      </div>

      <div class="mb-3">
        <label class="form-label"
          >Father's / Husband's Name <span class="required-star">*</span></label
        >
        <input type="text" class="form-control" required name="father_husband_name"  />
      </div>

      <div class="row">
        <div class="col-md-6 mb-3">
          <label class="form-label"
            >Date of Birth <span class="required-star">*</span></label
          >
          <input type="date" class="form-control" required name="date_of_birth"  />
        </div>
        <div class="col-md-6 mb-3">
          <label class="form-label"
            >Gender <span class="required-star">*</span></label
          >
          <select class="form-control" required name="gender" >
            <option value="">Select</option>
            <option>Male</option>
            <option>Female</option>
            <option>Other</option>
          </select>
        </div>
      </div>

      <!-- Address Details -->
      <h4>Residential Address</h4>
      <div class="mb-3">
        <label class="form-label"
          >Full Address <span class="required-star">*</span></label
        >
        <textarea class="form-control" rows="3" required name="full_address" ></textarea>
      </div>

      <div class="row">
        <div class="col-md-4 mb-3">
          <label class="form-label"
            >Village/Town/City <span class="required-star">*</span></label
          >
          <input type="text" class="form-control" required name="village"  />
        </div>
        <div class="col-md-4 mb-3">
          <label class="form-label"
            >District <span class="required-star">*</span></label
          >
          <input type="text" class="form-control" required name="district" />
        </div>
        <div class="col-md-4 mb-3">
          <label class="form-label"
            >State <span class="required-star">*</span></label
          >
          <input
            type="text"
            class="form-control"
            value="Maharashtra"
            readonly
            name="state" 
          />
        </div>
      </div>

      <div class="mb-3">
        <label class="form-label"
          >Pin Code <span class="required-star">*</span></label
        >
        <input type="number" class="form-control" required name="pin_code" />
      </div>

      <!-- Purpose of NOC -->
      <h4>Purpose of NOC</h4>
      <div class="mb-3">
        <label class="form-label"
          >Reason for Applying <span class="required-star">*</span></label
        >
        <select class="form-control" required name="purpose" >
          <option value="">Select</option>
          <option>For Job Purpose</option>
          <option>For Business</option>
          <option>For Immigration</option>
          <option>For Loan / Property</option>
          <option>Other</option>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label"
          >Details of the Purpose <span class="required-star">*</span></label
        >
        <textarea class="form-control" rows="3" required name="purpose_details" ></textarea>
      </div>

      <!-- Identity Proof -->
      <h4>Identity Proof</h4>
      <div class="mb-3">
        <label class="form-label"
          >Select Document <span class="required-star">*</span></label
        >
        <select class="form-control" required name="identity_proof_type" >
          <option value="">Select</option>
          <option>Aadhar Card</option>
          <option>PAN Card</option>
          <option>Voter ID</option>
          <option>Passport</option>
          <option>Ration Card</option>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label"
          >Upload Document (Image Only)
          <span class="required-star">*</span></label
        >
        <input
          type="file" accept=".jpg, .jpeg, .png"
          class="form-control"
          required
          name="id_document";
        />
      </div>

      <!-- Supporting Documents -->

      <!-- Declaration -->
      <h4>Declaration</h4>
      <div class="mb-3">
        <input type="checkbox" id="declaration" required />
        <label for="declaration"
          >I hereby declare that the above information is true and correct to
          the best of my knowledge. <span class="required-star">*</span></label
        >
      </div>

      <!-- Submit Button -->
      <div class="text-center mt-4">
        <input type="submit" name="submit" value="submit">
      </div>
    </form>
  </body>
</html>
