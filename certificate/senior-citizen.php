<?php
 require '../database/db.php';
 require_once __DIR__ . '/include/vendor/autoload.php'; // Load mPDF Library


if(isset($_GET['key'])&& $_GET['key']=='Senior Citizen Pendings'){
$sql = "SELECT * FROM senior_citizen_certificates WHERE status='pending'";
$result = mysqli_query($conn, $sql);
if (isset($_POST['approved']) && isset($_POST['token_no'])) {
    $token_no=$_POST['token_no'];
    $user_id=$_POST['user_id'];
    $sql = "UPDATE senior_citizen_certificates SET status='approved' WHERE token_no='$token_no'";
    $updateResult = mysqli_query($conn, $sql);
    
    if ($updateResult) {
        
        // $ = mysqli_real_escape_string($conn, $_POST['sr']);
        
        
        // Fetch Data from Database
        $sql = "SELECT * FROM senior_citizen_certificates WHERE status='approved' && user_id='$user_id' && token_no = '$token_no'";
        $result = mysqli_query($conn, $sql);
    
        
$row = mysqli_fetch_assoc($result);
$token_no = $row['token_no'];  
$user_id = $row['user_id'];
$full_name = $row['full_name'];
$date_of_birth = $row['date_of_birth'];
$age = $row['age'];
$gender = $row['gender'];
$father_husband_name = $row['father_or_husband_name'];
$residential_address = $row['full_address'];
$village = $row['village_town_city'];
$taluka = $row['taluka'];
$district = $row['district'];
$pin_code = $row['pin_code'];
$identity_proof_type = $row['identity_proof_type'];
$id_doc_no = $row['id_document_no'];
$identity_proof_document = $row['identity_proof_document'];
$age_proof_type = $row['age_proof_type'];
$age_doc_no = $row['age_document_no'];
$age_proof_document = $row['age_proof_document'];
$sign = $row['sign'];
date_default_timezone_set('Asia/Kolkata');
$issue_date = date('Y-m-d H:i:s');  

 
$mpdf = new \Mpdf\Mpdf();

$html = "
<style>
  body { font-family: freeserif,Arial, sans-serif; }
  .container { width: 100%; margin: auto; padding: 10px; position: relative; }
  table { width: 100%; border-collapse: collapse; margin-top: 5px; }
  td { border: 0.5px solid black; padding: 5px; text-align: left; width:60%; }
  th{ border: 0.5px solid black; padding: 5px; text-align: left;width:40%; }
  th { background-color: #f2f2f2; }
  .title { text-align: center; font-size: 24px; font-weight: bold; margin-bottom: 5px; }
  .section-title { font-size: 16px; font-weight: bold; margin-top: 10px; text-align:center; }
  .photo-box { position: absolute; top: 50px; right: 70px; width: 100px; height: 100px; border: 2px solid black; text-align: center; line-height: 120px; font-size: 12px; }
  .qr-box { position: absolute; top: 50px; left: 70px; width: 100px; height: 100px;  text-align: center; line-height: 120px; font-size: 12px; }
  .sign-section { margin-top: 30px; text-align: center; font-weight: bold; }
  .seal-box { width: 120px; height: 120px; text-align: center; line-height: 120px; font-size: 16px; margin: auto; border:none;}

  </style>
    <div class='qr-box'><img src='C:/xampp/htdocs/Digi-gram/certificate/assets\qr.jpeg' style='width:100%; height:100%;'></div>
  <div class='title'>वरिष्ठ नागरिक प्रमाणपत्र<br> Senior Citizen Certificate- महाराष्ट्र</div>
  
  <!-- Photo Box Section -->
  <div class='container'>
  <h2>__________________________________________________________</h2>

  <div class='section-title'>व्यक्तिगत तपशील / Personal Details</div>
  <table>
    <tr>
      <th>पूर्ण नाव / Full Name</th>
      <td>$full_name</td>
    </tr>
    <tr>
      <th>जन्म तारीख / Date of Birth</th>
      <td>$date_of_birth</td>
    </tr>
    <tr>
      <th>वय / Age</th>
      <td>$age</td>
    </tr>
    <tr>
      <th>लिंग / Gender</th>
      <td>$gender</td>
    </tr>
    <tr>
      <th>वडीलांचे / पतीचे नाव / Father\'s / Husband\'s Name</th>
      <td>$father_husband_name</td>
    </tr>
  </table>

  <div class='section-title'>निवासी पत्ता / Residential Address</div>
  <table>
    <tr>
      <th>संपूर्ण पत्ता / Full Address</th>
      <td>$residential_address</td>
    </tr>
    <tr>
      <th>गाव / शहर / Village/Town/City</th>
      <td>$village</td>
    </tr>
    <tr>
      <th>जिल्हा / District</th>
      <td>$taluka</td>
    </tr>
    <tr>
      <th>जिल्हा / District</th>
      <td>$district</td>
    </tr>
    <tr>
      <th>राज्य / State</th>
      <td>महाराष्ट्र / Maharashtra</td>
    </tr>
    <tr>
      <th>पिन कोड / Pin Code</th>
      <td>$pin_code</td>
    </tr>
  </table>

  <div class='section-title'>ओळखपत्र / Identity Proof</div>
  <table>
    <tr>
      <th>ओळख दस्तऐवज / Document Type</th>
      <td>$identity_proof_type</td>
    </tr>
    <tr>
      <th>दस्तऐवज अपलोड / Document Upload</th>
      <td>$id_doc_no</td>
    </tr>
  </table>

  <div class='section-title'>वयाचा पुरावा / Age Proof</div>
  <table>
    <tr>
      <th>पुरावा दस्तऐवज / Document Type</th>
      <td>$age_proof_type</td>
    </tr>
    <tr>
      <th>दस्तऐवज अपलोड / Document Upload</th>
      <td>$age_doc_no</td>
    </tr>
  </table>

  <div class='section-title'>स्वाक्षरी व घोषणापत्र / Declaration</div>
  <table>
    <tr>
      <td colspan='2'>
        मी, वरील सर्व माहिती खरी आणि योग्य आहे याची हमी देतो / देते. <br>
        (I hereby declare that the above information is true and correct to the best of my knowledge.)
      </td>
    </tr>
    <tr>
      <th>अर्जदाराची स्वाक्षरी / Signature of Applicant</th>
      <td><img src='C:/xampp/htdocs/Digi-gram/$sign' style='width:60px'></td>
    </tr>
  </table>
   <!-- Signature & Seal Section -->
  <div class='sign-section'>
    <table>
      <tr style=''>
        <th style='border:none;font-size:24px'>ग्रामसेवक / Gramsevak</th>
        <th style='border:none;font-size:24px'>सरपंच / Sarpanch</th>
        <th style='border:none;font-size:24px'>शासकीय शिक्का / Official Seal</th>
      </tr>
      <tr>
        <td style='border:none; font-size:34px'><img src='C:/xampp/htdocs/Digi-gram/certificate/assets/sign.jpg' style='width:120px'></td>
        <td style='border:none; font-size:34px'><img src='C:/xampp/htdocs/Digi-gram/certificate/assets/sign.jpg' style='width:120px'></td>
        <td style='border:none; font-size:24px'><div class='seal-box' style='font-size:24px'><img src='C:/xampp/htdocs/Digi-gram/certificate/assets/stamp.jpg' style='width:140px;'></div></td>
      </tr>
    </table>
  </div>
  </div>


";


$mpdf->WriteHTML($html);
$pdfFileName = "C:/xampp/htdocs/Digi-gram/certificate/genrated_certificates/seniar_citizen_certificates/seniar_citizen_certificates_$token_no.pdf";
$mpdf->Output($pdfFileName, 'F');

$updateQuery = "UPDATE document_requests SET pdf_file_path='$pdfFileName' , status='approved' WHERE user_id='$user_id' AND token_no='$token_no'";
$result=mysqli_query($conn, $updateQuery);
if (!$result) {
    die("Query Failed: " . mysqli_error($conn)); // Show error
}


$updateQuery = "UPDATE senior_citizen_certificates 
    SET date_of_issue = '$issue_date', status = 'approved' ,pdf_file='$pdfFileName'
    WHERE user_id = '$user_id' AND token_no = '$token_no'";
$result=mysqli_query($conn, $updateQuery);
if (!$result) {
    die("Query Failed: " . mysqli_error($conn)); // Show error
}

echo "<script>
window.location.href = 'admin.php?key=Senior+Citizen+Pendings';
</script>
";
} else {
echo "Error updating status: " . mysqli_error($conn);
}
}
}
if (isset($_POST['rejected']) && isset($_POST['token_no'])) {
  $token_no = $_POST['token_no'];
  $sql = "UPDATE senior_citizen_certificates SET status='rejected' WHERE token_no='$token_no'";
  $updateResult = mysqli_query($conn, $sql);

  $sql = "UPDATE document_requests SET status='rejected' WHERE token_no='$token_no'";
  $updateResult = mysqli_query($conn, $sql);

  echo "<script>
window.location.href = 'admin.php?key=Senior+Citizen+Pendings';
</script>
";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Panel</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

<style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        /* body {
            display: flex;
            height: 100vh;
        } */

        .container{
          width: 82%;
          height: 82%;
          border-bottom: 2px solid black;
          overflow-y: scroll;
        }
        .senior-citizen-content {
            /* padding:0 20px; */
            margin:0 auto;
            width: 80%;
            height: 85%;
            overflow-y: scroll;
            border-bottom: 1px solid black;
        }

        input[type='button']{
            padding: 5px 26px;
            background-color: blue;
            color: white;
            border: none;
            border-radius: 5px;
        }
    </style>

</head>
<body>
  <div class="container">
  <?php
   if(isset($_GET['key']) && $_GET['key']=='Senior Citizen Pendings'){
     echo "
     <div class='sinior-citizen-content'>
       <table class='table table-bordered'>
           <tr class='table-dark'>
               <th>sr</th>
               <th>Name</th>
               <th>Age</th>
               <th>Requested Date</th>
               <th>Token No</th>
               <th>Form</th>
               <th>Approve </th>
           </tr>";

while ($row = mysqli_fetch_assoc($result)) {
  $pdf_url = "http://localhost" . str_replace("C:/xampp/htdocs", "", $row['application_form']);
   echo "
           <tr>
               <td>{$row['sr']}</td>
               <td>{$row['full_name']}</td>
               <td>{$row['age']}</td>
               <td>{$row['requested_date']}</td>
               <td>{$row['token_no']}</td>
               <td>
               <a href='$pdf_url' class='download-btn-enabled'>Open</a>
               </td>
               <td>
               <form action='' method='POST'>
               <input type='hidden' name='token_no' value='{$row['token_no']}'>
               <input type='hidden' name='user_id' value='{$row['user_id']}'>
               <input type='submit' name='approved' class='btn btn-success' value='Approve'>
               <input type='hidden' name='sr' value='{$row['sr']}'>
               <input type='submit' name='rejected' class='btn btn-danger ms-2' value='Reject'>
                   </form>
               </td>
           </tr>";
}

echo " </table>
</div>";
   }

  if(isset($_GET['key']) && $_GET['key']=='Senior Citizen Approved'){
    $sql = "SELECT * FROM senior_citizen_certificates WHERE status='approved' ORDER BY sr DESC";
    $result = mysqli_query($conn, $sql);
    echo "
  <div class='sinior-citizen-content'>
      <table class='table table-bordered'>
          <tr class='table-dark'>
              <th>sr</th>
              <th>Name</th>
              <th>Age</th>
              <th>Token No</th>
              <th>Requested Date</th>
              <th>Approved Date</th>
              <th>Action</th>
          </tr>";
          while ($row = mysqli_fetch_assoc($result)) {

            $token_no=$row['token_no'];
            $pdf_url = "http://localhost" . str_replace("C:/xampp/htdocs", "", $row['pdf_file']);
            
            echo "

                    <tr>
                        <td>{$row['sr']}</td>
                        <td>{$row['full_name']}</td>
                        <td>{$row['age']}</td>
                        <td>{$row['token_no']}</td>
                        <td>{$row['requested_date']}</td>
                        <td>{$row['date_of_issue']}</td>
                        <td>
                <a href='$pdf_url' class='download-btn-enabled'>Open</a>
                </td>
                    </tr>";
         }

         echo " </table>
         </div>";

   
}


if(isset($_GET['key']) && $_GET['key']=='Senior Citizen Rejected'){
  $sql = "SELECT * FROM senior_citizen_certificates WHERE status='rejected'";
  $result = mysqli_query($conn, $sql);
  echo "
  <div class='sinior-citizen-content'>
      <table class='table table-bordered'>
          <tr class='table-dark'>
              <th>sr</th>
              <th>Name</th>
              <th>Age</th>
              <th>Token No</th>
              <th>Requested Date</th>
              <th>Action</th>
          </tr>";
          while ($row = mysqli_fetch_assoc($result)) {

             echo "

                     <td>{$row['sr']}</td>
                        <td>{$row['full_name']}</td>
                        <td>{$row['age']}</td>
                        <td>{$row['token_no']}</td>
                        <td>{$row['requested_date']}</td>
                        <td>
                         <form action='' method='POST'>
                        <input type='submit' name='rejected' class='btn btn-danger'  value='Rejected' disabled>                          </form>
                        </td>
                    </tr>";
         }

         echo " </table>
         </div>";
}
?>
</div>

<script>
    function openpdf(){
        window.open('<?php echo $pdf_path;?>')
    }
</script>
</body>

</html>



<!-- <div class='photo-box'><img src='C:/xampp/htdocs/Digi-gram/assets/user.jpg' style='width:100%; height:100%;'></div> line no 71 -->