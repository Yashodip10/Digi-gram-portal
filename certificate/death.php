<?php
 require '../database/db.php';
 require_once __DIR__ . '/include/vendor/autoload.php'; // Load mPDF Library
// Fetch pending death requests

if(isset($_GET['key'])&& $_GET['key']=='Death Pendings'){
$sql = "SELECT * FROM death_certificates WHERE status='pending'";
$result = mysqli_query($conn, $sql);
if (isset($_POST['approved']) && isset($_POST['token_no'])) {
    $token_no=$_POST['token_no'];
    $user_id=$_POST['user_id'];
    $sql = "UPDATE death_certificates SET status='approved' WHERE token_no='$token_no'";
    $updateResult = mysqli_query($conn, $sql);
    
    if ($updateResult) {
        
        // $ = mysqli_real_escape_string($conn, $_POST['sr']);
        
        
        // Fetch Data from Database
        $sql = "SELECT * FROM death_certificates WHERE status='approved' AND user_id='$user_id' && token_no = '$token_no'";
        $result = mysqli_query($conn, $sql);
    
        
        $row = mysqli_fetch_assoc($result);
        $token_no = $row['token_no'];  
$user_id = $row['user_id'];  
$name = $row['name'];  
$gender = $row['gender'];  
$date_of_death = $row['date_of_death'];  
$place_of_death = $row['place_of_death'];  
$father_husband_name = $row['father_or_husband_name'];  
$age = $row['age'];  
$address_at_death = $row['address_at_death'];  
$permanent_address = $row['permanent_address'];  
$registration_no = $row['registration_no'];  
$registration_date = $row['registration_date'];  
$remarks = $row['remarks'];  
date_default_timezone_set('Asia/Kolkata');
        $issue_date = date('Y-m-d H:i:s'); 
$status = $row['status'];  
$requested_date = $row['requested_date'];  


        $mpdf = new \Mpdf\Mpdf();

// Certificate Content (HTML)
$html =  "
<style>
    body { font-family:freeserif, DejaVu Sans, sans-serif; }
    .container { width: 100%; border: 1px solid black; padding: 20px; }
    .header { text-align: center; font-weight: bold; font-size: 18px; }
    .sub-header { text-align: center; font-size: 16px; margin-bottom: 10px; }
    .section-title { font-weight: bold; font-size: 14px; }
    .table { width: 100%; border-collapse: collapse; margin-top: 10px; }
    .table td { padding: 8px; font-size: 14px; margin-top:20px;}
    .bold { font-weight: bold;}
    .seal { text-align: center; font-size: 14px; margin-top: 30px; }
    .logo-left { position: absolute; top: 10px; left: 10px; width: 80px; }
    .logo-right { margin-left :74%; width: 80px; }
</style>

<div class='container'>
<img src='C:/xampp/htdocs/Digi-gram/certificate/assets/ashok.jpeg' class='logo-left'>
<img src='C:/xampp/htdocs/Digi-gram/certificate/assets/logo.jpeg' class='logo-right'>
    <div class='header'>फॉर्म क्र. 6 | FORM NO. 6</div>
    <div class='sub-header'><h2>मृत्यु प्रमाण-पत्र | DEATH CERTIFICATE</h2></div>
    <p style='text-align: center;'>
        (Issued under Section 12/17 of the Registration of deaths and Deaths Act, 1969 and Rule 8/13 of the Rajasthan Registration of deaths and Deaths Rules, 2000)
    </p>
    
    <p>
        <strong>असे प्रमाणित केले आहे:</strong> The following information has been taken from the original record of death which is the register for :
           
    </p>
    <p>
     <b class=>_______________________________________________________________________________________</b></p>

    <table class='table'>
        <tr>
            <td class='bold'>नाव/ Name:</td>
            <td>$name</td>
            <td class='bold'>लिंग / Sex:</td>
            <td>$gender</td>
        </tr>
        <tr>
            <td class='bold'>मृत्यूची तारीख/ Date of Death:</td>
            <td>$date_of_death</td>
            <td class='bold'>मृत्यु स्थान / Place of Death:</td>
            <td>$place_of_death</td>
        </tr>
        <tr>
            <td class='bold'>वडिलांचे/पतीचे नाव / Name of Father/Husband:</td>
            <td>$father_husband_name</td>
            <td class='bold'>वय / Age :</td>
            <td>$age</td>
            
        </tr>
       
         <tr>
            <td class='bold'>मृत्यूसमयी मृत व्यक्तीचा पत्ता/ Address of the deceased at the time of death:</td>
            <td colspan='3'>$address_at_death</td>
         </tr>
        <tr>
            <td class='bold'>मृत व्यक्तीचा कायमचा पत्ता / Permanent Address of the deceased:</td>
            <td colspan='3'>a$permanent_address</td>
        </tr>
        <tr>
            <td class='bold'>नोंदणी क्रमांक / Registration No.:</td>
            <td>$registration_no</td>
            <td class='bold'>नोंदणी दिनांक / Date of Registration:</td>
            <td>$registration_date</td>
        </tr>
        <tr>
            <td class='bold'>टिप्पणी / Remarks (if any):</td>
            <td colspan='3'>$remarks</td>
        </tr>
        <tr>
            <td class='bold'>प्रमाणपत्र दिल्याचा दिनांक / Date of Issue:</td>
            <td>$issue_date</td>
          
        </tr>
        <tr style='pading-top:30px;'>
        <td><img src='C:/xampp/htdocs/Digi-gram/certificate/assets/qr.jpeg' alt='Official Stamp' style='width: 100px;'></td>
        <td><div class='seal'><img src='C:/xampp/htdocs/Digi-gram/certificate/assets/stamp.jpg' style='width:100px; margin:0 auto'><br>मुद्र / SEAL</div></td>
        <td class='bold' colspan='2'>निर्गमित करणाऱ्या प्राधिकाऱ्याची सही/Signature of Issuing Authority: <br>
        
        <img src='C:/xampp/htdocs/Digi-gram/certificate/assets/sign.jpg' style='width:80px; border-bottom:1px dashed black'></td>
        </tr>
    </table>
    
       
</div>
";

  $mpdf->WriteHTML($html);
$pdfFileName = "C:/xampp/htdocs/Digi-gram/certificate/genrated_certificates/death_certificates/death_certificate_$token_no.pdf";
$mpdf->Output($pdfFileName, 'F');

$updateQuery = "UPDATE document_requests SET pdf_file_path='$pdfFileName' , status='approved' WHERE user_id='$user_id' AND token_no='$token_no'";
$result=mysqli_query($conn, $updateQuery);
if (!$result) {
    die("Query Failed: " . mysqli_error($conn)); // Show error
}


$updateQuery = "UPDATE death_certificates 
    SET date_of_issue = '$issue_date', status = 'approved' ,pdf_file_path='$pdfFileName'
    WHERE user_id = '$user_id' AND token_no = '$token_no'";
$result=mysqli_query($conn, $updateQuery);
if (!$result) {
    die("Query Failed: " . mysqli_error($conn)); // Show error
}
echo "<script>
window.location.href = 'admin.php?key=Death+Pendings'; // Redirects to another page
</script>
";
}
}
}
if (isset($_POST['reject']) && isset($_POST['token_no'])) {
    $token_no = $_POST['token_no'];
    $sql = "UPDATE death_certificates SET status='rejected' WHERE token_no='$token_no'";
    $updateResult = mysqli_query($conn, $sql);

    $sql = "UPDATE document_requests SET status='rejected' WHERE token_no='$token_no'";
    $updateResult = mysqli_query($conn, $sql);
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
    .container{
        width: 95%;
        height: 85%;
        overflow-y: scroll;
        border-bottom: 2px solid black;
    }
</style>
</head>
<body>
<div class="container">
    <?php
   if(isset($_GET['key']) && $_GET['key']=='Death Pendings'){
   echo "
   <div class='death-content'>
       <table class='table table-bordered '>
           <tr class='table-dark text-center'>
               <th>sr</th>
               <th>Name</th>
               <th>Gender</th>
               <th>Requested Date</th>
               <th>Token No</th>
               <th>Form</th>
               <th>Action</th>
           </tr>";
           $sql = "SELECT * FROM death_certificates WHERE status='pending'";
           $result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $form_pdf_url="http://localhost" . str_replace("C:/xampp/htdocs", "", $row['application_form']);
   echo "
           <tr class='text-center'>
               <td>{$row['sr']}</td>
               <td>{$row['name']}</td>
               <td>{$row['gender']}</td>
               <td>{$row['date_of_death']}</td>
               <td>{$row['token_no']}</td>
                <td><a href='$form_pdf_url' class='download-btn-form'>View</a></td>
               <td>
               <form action='' method='POST'>
               <input type='hidden' name='token_no' value='{$row['token_no']}'>
               <input type='hidden' name='user_id' value='{$row['user_id']}'>
               <input type='submit' name='approved' class='btn btn-success' value='Approve'>
               <input type='hidden' name='sr' value='{$row['sr']}'>
               <input type='submit' name='reject' class='btn btn-danger ms-2' value='Reject'>
                   </form>
               </td>
           </tr>";
}


echo "  </table>
   </div>";

    }
    if(isset($_GET['key']) && $_GET['key']=='Death Approved'){
        $sql = "SELECT * FROM death_certificates WHERE status='approved' ORDER BY sr DESC";
        $result = mysqli_query($conn, $sql);
        echo "
        <div class='death-content'>
        <table class='table table-bordered text-center'>
        <tr class='table-dark'>
                <th>sr</th>
               <th>Name</th>
               <th>Gender</th>
               <th> Date of death</th>
               <th>Token No</th>
               <th>Requested D  ate</th>
                <th>Action</th>
            </tr>";
 
 while ($row = mysqli_fetch_assoc($result)) {
    // $sr=$row['sr'];
    $token_no=$row['token_no'];
    $pdf_url = "http://localhost" . str_replace("C:/xampp/htdocs", "", $row['pdf_file_path']);
     echo "
     <tr>
              <td>{$row['sr']}</td>
               <td>{$row['name']}</td>
               <td>{$row['gender']}</td>
               <td>{$row['date_of_death']}</td>
               <td>{$row['token_no']}</td>
               <td>{$row['requested_date']}</td>
               
               <td>
                <a href='$pdf_url' class='download-btn-enabled'>Open</a>
                </td>
            </tr>";
         
 }
 
 echo "  </table>
    </div>";
   
}




if(isset($_GET['key']) && $_GET['key']=='Death Rejected'){
        $sql = "SELECT * FROM death_certificates WHERE status='rejected'";
        $result = mysqli_query($conn, $sql);

   echo "
   <div class='death-content'>
       <table class='table table-bordered text-center'>
           <tr class='table-dark'>
              <th>sr</th>
               <th>Name</th>
               <th>Gender</th>
               <th> Date of death</th>
               <th>Token No</th>
               <th>Requested Date</th>
                <th>Action</th>
            </tr>";

while ($row = mysqli_fetch_assoc($result)) {
   echo "
            <tr>
              <td>{$row['sr']}</td>
     <td>{$row['name']}</td>
     <td>{$row['gender']}</td>
     <td>{$row['date_of_death']}</td>
     <td>{$row['token_no']}</td>
     <td>{$row['requested_date']}</td>
               <td>
                   <form action='' method='POST'>
                       <input type='hidden' name='sr' value='{$row['sr']}'>
                       <input type='submit' name='rejected' class='btn btn-danger' value='Rejected' disabled>
                   </form>
               </td>
           </tr>";
}

    
echo "  </table>
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