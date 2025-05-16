<?php
session_name("user_page");
session_start();
include '../database/db.php';
require_once __DIR__ . './../certificate/include/vendor/autoload.php';

if(isset($_POST['residential_submit'])){
    $user_id=$_SESSION['username'];
    $grampanchayat_office = $_POST['grampanchayat_office'];
    $taluka = $_POST['taluka'];
    $district = $_POST['district'];
    $request_date =$_POST['request_date'];
    $full_name = $_POST['full_name'];
    $aadhaar_number = $_POST['aadhaar_number'];
    $village = $_POST['village'];
    $residence_taluka = $_POST['residence_taluka'];
    $residence_district = $_POST['residence_district'];
    $full_address =$_POST['full_address'];
    $pin_code = $_POST['pin_code'];
    $residency_status = $_POST['residency_status'];
    $proof_document_type =$_POST['proof_document_type'];
    $service_name='Residential cerificate Request';
    // $file_path =$_POST['proof_document_path'];

    
    $sql = "SELECT token_no FROM residential_certificates ORDER BY sr DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $last_token_no=isset($row['token_no']) ? str_replace("Residential", "", $row['token_no']):0;
    $token_no = 'Residential'. (int)$last_token_no + 1;
    
    $target_dir = "../certificate/uploads/residential/$user_id/";
    $file_path= $target_dir . "document.jpg";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
      move_uploaded_file($_FILES["Document_photo"]["tmp_name"], $file_path);


      $mpdf = new \Mpdf\Mpdf();

      $html="
      <style>
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

  
  <hr/>

    <div class='section-title'>Grampanchayat Office Details</div>
    <table class='details'>
        <tr><th>Grampanchayat Office:</th><td>[$grampanchayat_office]</td></tr>
        <tr><th>Taluka:</th><td>[$taluka]</td></tr>
        <tr><th>District:</th><td>[$district]</td></tr>
    </table>

    <div class='section-title'>Applicant Details</div>
    <table class='details'>
        <tr><th>Full Name:</th><td>[$full_name]</td></tr>
        <tr><th>Aadhaar Card Number:</th><td>[$aadhaar_number]</td></tr>
    </table>

    <div class='section-title'>Residential Address</div>
    <table class='details'>
        <tr><th>Village:</th><td>[$village]</td></tr>
        <tr><th>Taluka:</th><td>[$residence_taluka]</td></tr>
        <tr><th>District:</th><td>[$residence_taluka]</td></tr>
        <tr><th>Full Address:</th><td>[$full_address]</td></tr>
        <tr><th>Pin Code:</th><td>[$pin_code]</td></tr>
    </table>

    <div class='section-title'>Residency Status</div>
    <table class='details'>
        <tr><th>Resident Type:</th><td>[$residency_status]</td></tr>
    </table>

    <div class='section-title'>Proof of Residency</div>
    <table class='details'>
        <tr><th>Document Type:</th><td>[$proof_document_type]</td></tr>
    </table>

    <table class='documents'>
     
     <tr class='document'><td><img src='$file_path' alt='death_aadhar' ></img></td></tr>
     </table>
";

$mpdf->WriteHTML($html);
$pdfFileName = "C:/xampp/htdocs/Digi-gram/certificate/generated_forms/residential_forms/residential_form_$token_no.pdf";
$mpdf->Output($pdfFileName, 'F');

$application_form=$pdfFileName;


$sql="INSERT INTO `residential_certificates` (`token_no`, `user_id`, `grampanchayat_office`, `taluka`, `district`, `request_date`, `full_name`, `aadhaar_number`, `village`, `residence_taluka`, `residence_district`, `full_address`, `pin_code`, `residency_status`, `proof_document_type`, `proof_document_path`,`application_form`) 
VALUES ('$token_no', '$user_id', '$grampanchayat_office', '$taluka', '$district', '$request_date', '$full_name', '$aadhaar_number', '$village', '$residence_taluka', '$residence_district', '$full_address', '$pin_code', '$residency_status', '$proof_document_type', '$file_path','$application_form')";
$result=mysqli_query($conn,$sql);
if($result){
    
}
else{
  echo "Error inserting into document_requests: " . mysqli_error($conn);
   
}
$sql2="INSERT INTO `document_requests` (user_id,service_name,token_no,requested_date,application_form)
VALUES('$user_id','$service_name','$token_no',NOW(),'$application_form')";
$result2=mysqli_query($conn,$sql2);
if($result2){
}
else{
    
}
if($result && $result2){
  echo "<script>alert('form submitted successfully');
        window.location.replace('services.php?key=Dashboard');
  </script>";
  
} else {
echo "not" ;
}
}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Residential Certificate Form - Maharashtra</title>
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
    <h2 class="text-center mb-4">Residential Certificate Application</h2>

    <form action="" method="POST" enctype="multipart/form-data">
      <!-- Grampanchayat Details -->
      <h4>Grampanchayat Office Details</h4>
      <div class="row">
        <div class="col-md-4 mb-3">
          <label class="form-label"
            >Grampanchayat Office <span class="required-star">*</span></label
          >
          <input type="text" class="form-control" name="grampanchayat_office" required />
        </div>
        <div class="col-md-4 mb-3">
          <label class="form-label"
            >Taluka <span class="required-star">*</span></label
          >
          <input type="text" class="form-control" name="taluka" required />
        </div>
        <div class="col-md-4 mb-3">
          <label class="form-label"
            >District <span class="required-star">*</span></label
          >
          <input type="text" class="form-control" name="district" required />
        </div>
      </div>

      <!-- Dispatch Number & Date -->
        <div class="col-md-6 mb-3">
          <label class="form-label"
            >Date <span class="required-star">*</span></label
          >
          <input type="date" class="form-control" name="request_date" required />
        </div>
      </div>

      <!-- Applicant Details -->
      <h4>Applicant's Personal Details</h4>
      <div class="mb-3">
        <label class="form-label"
          >Full Name <span class="required-star">*</span></label
        >
        <input type="text" class="form-control" name="full_name" required />
      </div>

      <div class="mb-3">
        <label class="form-label"
          >Aadhaar Card Number <span class="required-star">*</span></label
        >
        <input type="number" class="form-control" name="aadhaar_number" required />
      </div>

      <!-- Residential Address -->
      <h4>Residential Address</h4>
      <div class="row">
        <div class="col-md-4 mb-3">
          <label class="form-label"
            >Village <span class="required-star">*</span></label
          >
          <input type="text" class="form-control" name="village" required />
        </div>
        <div class="col-md-4 mb-3">
          <label class="form-label"
            >Taluka <span class="required-star">*</span></label
          >
          <input type="text" class="form-control" name="residence_taluka" required />
        </div>
        <div class="col-md-4 mb-3">
          <label class="form-label"
            >District <span class="required-star">*</span></label
          >
          <input type="text" class="form-control" name="residence_district" required />
        </div>
      </div>

      <div class="mb-3">
        <label class="form-label"
          >Full Address <span class="required-star">*</span></label
        >
        <textarea class="form-control" rows="3" name="full_address" required></textarea>
      </div>

      <div class="mb-3">
        <label class="form-label"
          >Pin Code <span class="required-star">*</span></label
        >
        <input type="number" class="form-control" name="pin_code" required />
      </div>

      <!-- Residency Type -->
      <h4>Residency Status</h4>
      <div class="mb-3">
        <label class="form-label"
          >Are you a permanent or temporary resident?
          <span class="required-star">*</span></label
        >
        <select class="form-control" name="residency_status" required>
          <option value="">Select</option>
          <option>Permanent</option>
          <option>Temporary</option>
        </select>
      </div>

      <!-- Proof of Residency -->
      <h4>Proof of Residency</h4>
      <div class="mb-3">
        <label class="form-label"
          >Select Document <span class="required-star">*</span></label
        >
        <select class="form-control" name="proof_document_type" required>
          <option value="">Select</option>
          <option>Ration Card</option>
          <option>Aadhar Card</option>
          <option>Electricity Bill</option>
          <option>Water Bill</option>
          <option>Voter ID</option>
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
          name="Document_photo"
          required
        />
      </div>

      <!-- Declaration -->
      <h4>Declaration</h4>
      <div class="mb-3">
        <input type="checkbox" id="declaration" required />
        <label for="declaration">
          I hereby declare that the above information is true and correct to the
          best of my knowledge.
          <span class="required-star">*</span>
        </label>
      </div>

      <!-- Submit Button -->
      <div class="text-center mt-4">
        <button type="submit" name="residential_submit" class="btn btn-primary">
          Submit Application
        </button>
      </div>
    </form>
  </body>
</html>
