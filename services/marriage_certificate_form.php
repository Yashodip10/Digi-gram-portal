<?php
session_name("user_page");
session_start();
include '../database/db.php';
require_once __DIR__ . './../certificate/include/vendor/autoload.php';

if(isset($_POST['marri_submit'])){
  $user_id=$_SESSION['username'];
  $husband_name=$_POST['husband_name'];
  $husband_village=$_POST['husband_village'];
  $husband_tal=$_POST['husband_tal'];
  $husband_dist=$_POST['husband_dist'];
  $husband_father_name=$_POST['husband_father_name'];

  $wife_name=$_POST['wife_name'];
  $wife_village=$_POST['wife_village'];
  $wife_tal=$_POST['wife_tal'];
  $wife_dist=$_POST['wife_dist'];
  $wife_father_name=$_POST['wife_father_name'];
  $date_of_marriage=$_POST['date_of_marriage'];
  $place_of_marriage=$_POST['place_of_marriage'];

  $service_name='Marriage Certificate Request';
  $sql = "SELECT token_no FROM marriage_certificates ORDER BY sr DESC LIMIT 1";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $last_token_no=isset($row['token_no']) ? str_replace("Marriage", "", $row['token_no']):0;
  $token_no = 'Marriage'. (int)$last_token_no + 1;

  $target_dir = "../certificate/uploads/marriage/$user_id/";
  $husband_photo_path = $target_dir . "husband.jpg";
  $wife_photo_path = $target_dir . "wife.jpg";

$husband_aadhar_path=$target_dir . "husband_aadhar.jpg";
$wife_aadhar_path=$target_dir . "wife_aadhar.jpg";

  if (!file_exists($target_dir)) {
    mkdir($target_dir, 0777, true);
}
  move_uploaded_file($_FILES["husband_photo"]["tmp_name"], $husband_photo_path);
  move_uploaded_file($_FILES["wife_photo"]["tmp_name"], $wife_photo_path);
  move_uploaded_file($_FILES["husband_aadhar"]["tmp_name"], $husband_aadhar_path);
  move_uploaded_file($_FILES["wife_aadhar"]["tmp_name"], $wife_aadhar_path);

  $mpdf = new \Mpdf\Mpdf();

$html ="  <style>
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
            margin: 0 auto;
            margin-bottom:50px;
        }
        .photos img {
            width: 100px;
            height: 120px;
            object-fit: cover;
            border: 1px solid black;
        }
        .section-title {
            font-size: 28px;
            font-weight: bold;
            text-decoration: underline;
            margin-bottom: 30px;
            padding-left:10%;
            text-align:center;
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
        width:30%;
            font-weight: bold;
        }
        
        .value{
        border-bottom:2px solid black;
        width:500px;
        }
        .bride ,.groom{
          height:140px;
          width:110px;
          border:1px solid black;
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
        Marriage Application
    </div>
    <hr/>
    <div class='photos'>
    <table class='details'>
        <tr>
        <td><img src='$husband_photo_path' alt='Bride Photo' class='bride' ></td>
       <td style='text-align:center;'> <div class='section-title'>Marriage Details</div></td>
        <td style=text-align:right;><img src='$wife_photo_path' alt='Groom Photo' class='groom'></td>
        </tr>
        </table>
    </div>

    <table class='details'>
        <tr><td class='label'>Date of Marriage:</td><td ><div class='value'>[$date_of_marriage]</div></td></tr>
        <tr><td class='label'>Place of Marriage:</td><td ><div class='value'>[$place_of_marriage]</div></td></tr>
    </table>

    <div class='section-title'>Groom's Details</div>
    <table class='details'>
        <tr><td class='label'>Full Name:</td><td><div class='value'>[$husband_name]</div></td></tr>
        <tr><td class='label'>Father's Name:</td><td><div class='value'>[$husband_father_name]</div></td></tr>
        <tr><td class='label'>Village/Town/City:</td><td><div class='value'>[$husband_village]</div></td></tr>
        <tr><td class='label'>Taluka:</td><td><div class='value'>[$husband_tal]</div></td></tr>
        <tr><td class='label'>District:</td><td><div class='value'>[$husband_dist]</div></td></tr>
    </table>

    <div class='section-title'>Bride's Details</div>
    <table class='details'>
        <tr><td class='label'>Full Name:</td><td><div class='value'>[ $wife_name]</div></td></tr>
        <tr><td class='label'>Father's Name:</td><td><div class='value'>[$wife_father_name]</div></td></tr>
        <tr><td class='label'>Village/Town/City:</td><td><div class='value'>[$wife_village]</div></td></tr>
        <tr><td class='label'>Taluka:</td><td><div class='value'>[$wife_tal]</div></td></tr>
        <tr><td class='label'>District:</td><td><div class='value'>[$wife_dist]</div></td></tr>
    </table>
     <table class='documents'>
     
     <tr class='document'><td><img src='$husband_aadhar_path' alt='wife_adhar' ></img></td></tr>
     <tr class='document'><td><img src='$wife_aadhar_path' alt='wife_adhar'></img></td></tr>
     </table>
    ";

$mpdf->WriteHTML($html);
$pdfFileName = "C:/xampp/htdocs/Digi-gram/certificate/generated_forms/marriage_forms/marriage_form_$token_no.pdf";
$mpdf->Output($pdfFileName,'F');

$application_form=$pdfFileName;

  $sql="INSERT INTO `marriage_certificates` (husband_name,husband_village,husband_tal,husband_dist,husband_father_name,wife_name,wife_village,wife_tal,wife_dist,wife_father_name,solemnized_date,place,husband_image,wife_image,requested_date,token_no,user_id,application_form)
  VALUES('$husband_name','$husband_village','$husband_tal','$husband_dist','$husband_father_name','$wife_name','$wife_village','$wife_tal','$wife_dist','$wife_father_name','$date_of_marriage','$place_of_marriage','$husband_photo_path','$wife_photo_path' ,NOW(),'$token_no','$user_id','$application_form')";

$result=mysqli_query($conn,$sql);

$sql2="INSERT INTO `document_requests` (user_id,service_name,token_no,requested_date,application_form)
VALUES('$user_id','$service_name','$token_no',NOW(),'$application_form')";

$result2=mysqli_query($conn,$sql2);
if($result && $result2){
  echo "<script>alert('form submitted successfully');
        window.location.replace('services.php?key=Dashboard');
  </script>";

}
else{
  echo "not";
}
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Marriage Certificate Form - Maharashtra</title>
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
    <h2 class="text-center mb-4">Marriage-Certificate</h2>

    <form action="" method="POST" enctype="multipart/form-data">
      <!-- Groom Details -->
      <h4>Groom's Details</h4>
      <div class="mb-3">
        <label class="form-label"
          >Full Name <span class="required-star">*</span></label
        >
        <input type="text" class="form-control border-dark" name="husband_name" />
      </div>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label class="form-label"
            >Village/Town/City <span class="required-star">*</span></label
          >
          <input
            type="text"
            class="form-control border-dark"
            name="husband_village"
            required
          />
        </div>
        <div class="col-md-6 mb-3">
          <label class="form-label"
            >Taluka <span class="required-star">*</span></label
          >
          <input type="text" class="form-control border-dark" name="husband_tal" />
        </div>
        <div class="col-md-6 mb-3">
          <label class="form-label"
            >District <span class="required-star">*</span></label
          >
          <input
            type="text"
            class="form-control border-dark"
            name="husband_dist"
            required
          />
        </div>
      </div>
      <div class="mb-3">
        <label class="form-label"
          >Father's Name <span class="required-star">*</span></label
        >
        <input
          type="text"
          class="form-control border-dark"
          name="husband_father_name"
          required
        />
      </div>

      <!-- Bride Details -->
      <h4>Bride's Details</h4>
      <div class="mb-3">
        <label class="form-label"
          >Full Name <span class="required-star">*</span></label
        >
        <input type="text" class="form-control border-dark" name="wife_name" required />
      </div>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label class="form-label"
            >Village/Town/City <span class="required-star">*</span></label
          >
          <input
            type="text"
            class="form-control border-dark"
            name="wife_village"
            required
          />
        </div>
        <div class="col-md-6 mb-3">
          <label class="form-label"
            >Taluka <span class="required-star">*</span></label
          >
          <input type="text" class="form-control border-dark" name="wife_tal" required />
        </div>
        <div class="col-md-6 mb-3">
          <label class="form-label"
            >District <span class="required-star">*</span></label
          >
          <input
            type="text"
            class="form-control border-dark"
            name="wife_dist"
            required
          />
        </div>
      </div>

      <div class="mb-3">
        <label class="form-label"
          >Father's Name <span class="required-star">*</span></label
        >
        <input type="text" class="form-control border-dark" name="wife_father_name" required />
      </div>

      <!-- Marriage Details -->
      <h4>Marriage Details</h4>
      <div class="mb-3">
        <label class="form-label"
          >Date of Marriage <span class="required-star">*</span></label
        >
        <input type="date" class="form-control border-dark" name="date_of_marriage" required />
      </div>

      <div class="mb-3">
        <label class="form-label"
          >Place of Marriage <span class="required-star">*</span></label
        >
        <input
          type="text"
          class="form-control border-dark"
          name="place_of_marriage"
          required
        />
      </div>

      <div class="mb-3">
        <label class="form-label"
          >Upload Groom Photo <span class="required-star">*</span></label
        >
        <input type="file" accept=".jpg, .jpeg, .png" class="form-control border-dark" name="husband_photo" required />
      </div>

      <div class="mb-3">
        <label class="form-label"
          >Upload Bride Photo <span class="required-star">*</span></label
        >
        <input type="file" accept=".jpg, .jpeg, .png" class="form-control border-dark" name="wife_photo" required />
      </div>

      <h4>Documents</h4>
      <div class="mb-3">
        <label class="form-label"
          >Upload Groom Aadhar <span class="required-star">*</span></label
        >
        <input type="file" accept=".jpg, .jpeg, .png" class="form-control border-dark" name="husband_aadhar" required />
      </div>

      <div class="mb-3">
        <label class="form-label"
          >Upload Bride Aadhar <span class="required-star">*</span></label
        >
        <input type="file" accept=".jpg, .jpeg, .png" class="form-control border-dark" name="wife_aadhar" required />
      </div>

      <!-- Submit Button -->
      <div class="text-center mt-4">
        <input type="submit" name="marri_submit" class="btn btn-primary" />
      </div>
    </form>
  </body>
</html>
