<?php
include '../database/db.php';
require_once __DIR__ . '../../vendor/autoload.php'; // Load mPDF Library
if($_GET['key']=='Birth Pendings'){
$sql = "SELECT * FROM birth_certificates WHERE status='pending'";
$result = mysqli_query($conn, $sql);

if (isset($_POST['approved']) && isset($_POST['token_no'])) {
    $token_no=$_POST['token_no'];
    $user_id=$_POST['user_id'];
    $sql = "UPDATE birth_certificates SET status='approved' WHERE token_no='$token_no'";
    $updateResult = mysqli_query($conn, $sql);
    if ($updateResult) {
        echo "cliked";
        
    
        $sql = "SELECT * FROM birth_certificates WHERE status='approved' && user_id='$user_id' && token_no = '$token_no'";
        $result = mysqli_query($conn, $sql);
        
        $row = mysqli_fetch_assoc($result);
        $sr=$row['sr'];
        $name_of_child=$row['name_of_child'];
        $sex=$row['sex'];
        $date_of_birth=$row['date_of_birth'];
        $place_of_birth=$row['place_of_birth'];
        $village_of_birth=$row['village_of_birth'];
        $birth_tal=$row['birth_tal'];
        $birth_dist=$row['birth_dist'];
        $name_of_mother=$row['name_of_mother'];
        $name_of_father=$row['name_of_father'];
        $father_aadhar_no=$row['father_aadhar_no'];
        $mother_aadhar_no=$row['mother_aadhar_no'];
        $permanent_address=$row['permanent_address'];
        $registered_date=$row['requested_date'];
        $pin_code=$row['pin_code'];
        $mobile_no=$row['mobile_no'];
        date_default_timezone_set('Asia/Kolkata');
        $issue_date = date('Y-m-d H:i:s');
        $status = $row['status'];
        $token_no=$row['token_no'];

        if($status=='approved'){
        $mpdf = new \Mpdf\Mpdf();
        
        $html = "

        <div style='font-family: Arial, sans-serif; padding:20px 10px; border: 3px solid black; max-width: 800px; margin: auto;'>

    <table style='width: 100%; padding:0 30px'>
        <tr>
            <td style='width: 120px; text-align: center; vertical-align: middle;'>
                <img src='C:/xampp/htdocs/Digi-gram/certificate/assets/logo.jpeg' alt='Maharashtra Govt Logo' style='width: 100px;'>
                </td>
                <td style='text-align: center;'>
                <img src='C:/xampp/htdocs/Digi-gram/certificate/assets/ashok.jpeg' alt='Maharashtra Govt Logo' style='width: 100px; height:80px'>
                <h2 style='margin: 5px; font-family: freeserif; color:#FF2156;'>महाराष्ट्र शासन</h2>
                <h3 style='margin: 5px; color:#FF2156;'>Government of Maharashtra</h3>
                <h2 style='margin: 5px; font-family: freeserif; color:#FF2156;'>आरोग्य विभाग <br>Department of Health</h2>
                <p style='font-size: 18px; font-weight: bold; font-family: freeserif;'>जन्म प्रमाणपत्र | Birth Certificate</p>

            </td>
            <td style='width: 120px; text-align: center; vertical-align: middle;'>
                <img src='C:/xampp/htdocs/Digi-gram/certificate/assets/birth_logo.jpg' alt='Maharashtra Govt Logo' style='width: 100px;'>
            </td>
        </tr>
    </table>

    <hr style='height:2px; color:black;'>

    <p style='font-family:freeserif; font-size:10px' >जन्म व मृत्यु नोंदणी अधिनियम, 1969 च्या कलम 12/17 आणि महाराष्ट्र जन्म आणि मृत्यू नोंदणी नियम, 2000 चे नियम 8/13 अन्वये हे प्रमाणपत्र देण्यात आले आहे. <br>
(ISSUED UNDER SECTION 12/17 OF THE REGISTRATION OF BIRTHS & DEATHS ACT, 1969 AND RULE 8/13 OF THE MAHARASHTRA REGISTRATION OF BIRTHS & DEATHS RULES 2000)</p>


<p style='font-family:freeserif; font-size:10px' >प्रमाणित करण्यात येत आहे की, खालील माहिती जन्माच्या मूळ अभिलेखाच्या नोंदवहीतून घेण्यात आली आहे , जी की Lon Pirache (स्थानिक क्षेत्र) आहे , जी की तालुका <b> Bhadgaon </b> , जिल्हा <b> Jalgaon </b> , महाराष्ट्र राज्याच्या नोंदवहीत उपलब्ध आहे.<br>
THIS IS TO CERTIFY THAT THE FOLLOWING INFORMATION HAS BEEN TAKEN FROM THE ORIGINAL RECORD OF BIRTH WHICH IS THE REGISTER FOR MUNICIPALITY <b> Lon Pirache </b> OF TAHSIL/BLOCK <b> Bhadgaon </b> OF DISTRICT <b> Jalgaon </b> OF STATE/UNION TERRITORY MAHARASHTRA, INDIA.</p>
    <table style='width: 100%; margin-top: 10px;'>
        <tr>

        <td style='width: 50%; vertical-align: top; padding: 5px; font-size: 14px; font-family:freeserif'>
            <b>बाळाचे नाव :</b> <span style='border-bottom: 1px dotted black; display: inline-block; width: 200px;'></span><br>
            <b>Name of Child :</b> <span style='border-bottom: 1px dotted black; display: inline-block; width: 200px;'>$name_of_child</span><br><br>

            <b>जन्म दिनांक :</b> <span style='border-bottom: 1px dotted black; display: inline-block; width: 200px;'> </span><br>
            <b>Date of Birth :</b> <span style='border-bottom: 1px dotted black; display: inline-block; width: 200px;'>$date_of_birth</span><br><br>

            <b>आईचे पूर्ण नाव :</b> <span style='border-bottom: 1px dotted black; display: inline-block; width: 200px;'> </span><br>
            <b>Name of Mother :</b> <span style='border-bottom: 1px dotted black; display: inline-block; width: 200px;'>$name_of_mother</span><br><br>

            <b>बाळाच्या जन्माचे वेळी आई वडिलांचा पत्ता : <br> Address of parents at the time of birth of the child : </b> <span style='border-bottom: 1px dotted black; display: inline-block; width: 200px;'><br>$place_of_birth , $village_of_birth, $birth_tal ,$birth_dist<br> <br> <br></span>
        </td>

        <td style='width: 50%; vertical-align: top; padding: 5px; font-size: 14px; font-family:freeserif'>
            <b>लिंग :</b> <span style='border-bottom: 1px dotted black; display: inline-block; width: 200px;'> </span><br>
            <b>Sex :</b> <span style='border-bottom: 1px dotted black; display: inline-block; width: 200px;'>$sex</span><br><br>

            <b>जन्म ठिकाण :</b> <span style='border-bottom: 1px dotted black; display: inline-block; width: 200px;'> </span><br>
            <b>Place of Birth :</b> <span style='border-bottom: 1px dotted black; display: inline-block; width: 200px;'>$place_of_birth</span><br><br>

            <b>वडिलांचे पूर्ण नाव :</b> <span style='border-bottom: 1px dotted black; display: inline-block; width: 200px;'> </span><br>
            <b>Name of Father :</b> <span style='border-bottom: 1px dotted black; display: inline-block; width: 200px;'>$name_of_father</span><br><br>

            <b>आई वडिलांचा कायमचा पत्ता : <br> Permanent address of parents : </b> <span style='border-bottom: 1px dotted black; display: inline-block; width: 200px;'><br>$permanent_address</span>
        </td>
    </tr>

    <tr>
        <td style='width: 50%; vertical-align: top; padding: 5px; font-size: 14px; font-family:freeserif'>
            <b>नोंदणी क्रमांक :</b> <span style='border-bottom: 1px dotted black; display: inline-block; width: 200px;'> </span><br>
            <b>Registration No. :</b> <span style='border-bottom: 1px dotted black; display: inline-block; width: 200px;'>$sr</span><br><br>

            <b>शेरा :</b> <span style='border-bottom: 1px dotted black; display: inline-block; width: 200px;'> </span><br>
            <b>Remarks (If any) :</b> <span style='border-bottom: 1px dotted black; display: inline-block; width: 200px;'>NILL</span><br><br>

            <b>प्रमाणपत्र दिल्याचा दिनांक :</b> <span style='border-bottom: 1px dotted black; display: inline-block; width: 200px;'> </span><br>
            <b>Date of Issue :</b> <span style='border-bottom: 1px dotted black; display: inline-block; width: 200px;'>$issue_date</span>
        </td>

        <td style='width: 50%; vertical-align: top; padding: 5px; font-size: 14px; font-family:freeserif'>
            <b>नोंदणी दिनांक :</b> <span style='border-bottom: 1px dotted black; display: inline-block; width: 200px;'> </span><br>
            <b>Date of Registration :</b> <span style='border-bottom: 1px dotted black; display: inline-block; width: 200px;'>$registered_date</span><br><br>

            <b>निर्गमित करणाऱ्या प्राधिकाऱ्याची सही</b><br>
            <b>Signature of the Issuing Authority :</b><br><br>

            <b>प्राधिकाऱ्याचा पत्ता :</b> <span style='border-bottom: 1px dotted black; display: inline-block; width: 200px;'> </span><br>
            <b>Address of the Issuing Authority :</b> <span style='border-bottom: 1px dotted black; display: inline-block; width: 200px;'> </span><br><br>
        </td>
    </tr>
    </table>

    <table style='width: 100%; margin-top: 10px;'>
        <tr>
            <td style='text-align: left;'>
                <img src='C:/xampp/htdocs/Digi-gram/certificate/assets/qr.jpeg' alt='Official Stamp' style='width: 100px;'>
            </td>

            <td style='text-align: center; padding-left:150px'>
                <img src='C:/xampp/htdocs/Digi-gram/certificate/assets/stamp.jpg' alt='Seal' style='width: 100px;'>
            </td>
            <td style='text-align: right;'>
                <img src='C:/xampp/htdocs/Digi-gram/certificate/assets/sign.jpg' alt='Seal' style='width: 100px;  padding-right:50px'><br>
                <strong>Registrar of Births & Deaths</strong>
            </td>
        </tr>
    </table>

    
    <table style='width: 100%; margin-top: 20px;'>
        <tr>
        <td style='text-align: center; font-size: 8px; font-weight: bold; margin-top: 20px;'>
    'THIS IS A COMPUTER GENERATED CERTIFICATE.' <br>
    'THE GOVT. OF INDIA VIDE CIRCULAR NO. 1/12/2014-VS(CRS) DATED 27-JULY-2015 HAS<br>
    APPROVED THIS CERTIFICATE AS A VALID LEGAL DOCUMENT FOR ALL OFFICIAL PURPOSES'.
</td>
</tr>
<tr>
<td style='text-align: center; font-size: 12px; font-weight: bold; margin-top: 10px; font-family:freeserif'>
    * प्रत्येक जन्म आणि मृत्यूची घटना नोंदवण्याची खात्री करा * / ENSURE REGISTRATION OF EVERY BIRTH AND DEATH *
</td>
</tr>
        
    </table>

</div>";
        
$mpdf->WriteHTML($html);
$pdfFileName = "C:/xampp/htdocs/Digi-gram/certificate/genrated_certificates/birth_certificates/birth_certificate_$token_no.pdf";
$mpdf->Output($pdfFileName, 'F');
$updateQuery = "UPDATE document_requests SET pdf_file_path='$pdfFileName' , status='approved' WHERE user_id='$user_id' AND token_no='$token_no'";
$result=mysqli_query($conn, $updateQuery);
if (!$result) {
    die("Query Failed: " . mysqli_error($conn)); // Show error
}


$updateQuery = "UPDATE birth_certificates 
    SET issue_date = '$issue_date', status = 'approved' ,pdf_file='$pdfFileName'
    WHERE user_id = '$user_id' AND token_no = '$token_no'";
$result=mysqli_query($conn, $updateQuery);
if (!$result) {
    die("Query Failed: " . mysqli_error($conn)); // Show error
}
echo "<script>
window.location.href = 'admin.php?key=Birth+Pendings'; // Redirects to another page
</script>
";
}
}
}
}

if (isset($_POST['reject']) && isset($_POST['token_no'])) {
    $token_no = $_POST['token_no'];
    $sql = "UPDATE birth_certificates SET status='rejected' WHERE token_no='$token_no'";
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
        width: 100%;
        height: 85%;
        overflow-y: scroll;
        border-bottom: 2px solid black;
    }
</style>
</head>
<body>
    <div class="container">
<?php
    if($_GET['key']=='Birth Pendings'){
   echo "
   <div class='marriage-content'>
       <table class='table table-bordered text-center'>
           <tr class='table-dark'>
               <th>sr</th>
               <th>Name of Child</th>
               <th>Gender</th>
               <th>Father</th>
               <th>Mother</th>
               <th>Requested date</th>
               <th>Token No</th>
               <th>Form</th>
               <th>Action</th>
           </tr>";

           $sql = "SELECT * FROM birth_certificates WHERE status='pending'";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    $form_pdf_url="http://localhost" . str_replace("C:/xampp/htdocs", "", $row['application_form']);
   echo "
           <tr>
               <td>{$row['sr']}</td>
               <td>{$row['name_of_child']}</td>
               <td>{$row['sex']}</td>
               <td>{$row['name_of_father']}</td>
               <td>{$row['name_of_mother']}</td>
               <td>{$row['requested_date']}</td>
               <td>{$row['token_no']}</td>
               <td><a href='$form_pdf_url' class='download-btn-form'>Open</a></td>
               <td>
               <form action='' method='POST'>
               <input type='hidden' name='token_no' value='{$row['token_no']}'>
               <input type='hidden' name='user_id' value='{$row['user_id']}'>
               <input type='submit' name='approved' class='btn btn-success' value='Approve'>
                <input type='submit' name='reject' class='btn btn-danger ms-2' value='Reject'>
               </form>
               
               </td>
               </tr>";
}


echo "  </table>
   </div>";

    }

    if($_GET['key']=='Birth Approved'){
        $sql = "SELECT * FROM birth_certificates WHERE status='approved' ORDER BY sr DESC";
        $result = mysqli_query($conn, $sql);
        echo "
        <div class='marriage-content'>
        <table class='table table-bordered text-center'>
        <tr class='table-dark'>
                 <th>sr</th>
               <th>Name of Child</th>
               <th>Gender</th>
               <th>Father</th>
               <th>Mother</th>
               <th>Requested date</th>
                <th>Action</th>
            </tr>";
 
 while ($row = mysqli_fetch_assoc($result)) {
    // $sr=$row['sr'];
    $token_no=$row['token_no'];
    $pdf_url = "http://localhost" . str_replace("C:/xampp/htdocs", "", $row['pdf_file']);
     echo "
     <tr>
     <td>{$row['sr']}</td>
     <td>{$row['name_of_child']}</td>
     <td>{$row['sex']}</td>
     <td>{$row['name_of_father']}</td>
     <td>{$row['name_of_mother']}</td>
     <td>{$row['requested_date']}</td>
                <td>
                <a href='$pdf_url' class='download-btn-enabled'>Open</a>
                </td>
            </tr>";
         
 }
 
 echo "  </table>
    </div>";
   
}




    if($_GET['key']=='Birth Rejected'){
        $sql = "SELECT * FROM birth_certificates WHERE status='rejected'";
        $result = mysqli_query($conn, $sql);

   echo "
   <div class='marriage-content'>
       <table class='table table-bordered text-center'>
           <tr class='table-dark'>
  <th>sr</th>
               <th>Name of Child</th>
               <th>Gender</th>
               <th>Father</th>
               <th>Mother</th>
               <th>Requested date</th>
                <th>Action</th>
            </tr>";

while ($row = mysqli_fetch_assoc($result)) {
   echo "
           <tr>
              <td>{$row['sr']}</td>
     <td>{$row['name_of_child']}</td>
     <td>{$row['sex']}</td>
     <td>{$row['name_of_father']}</td>
     <td>{$row['name_of_mother']}</td>
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
