<?php
 require '../database/db.php';
 require_once __DIR__ . '/include/vendor/autoload.php'; // Load mPDF Library

if(isset($_GET['key'])&& $_GET['key']=='No objection Pendings'){
    $sql = "SELECT * FROM noc_certificates WHERE status='pending'";
    $result = mysqli_query($conn, $sql);
    if (isset($_POST['approved']) && isset($_POST['token_no'])) {
        $token_no=$_POST['token_no'];
        $user_id=$_POST['user_id'];
        $sql = "UPDATE noc_certificates SET status='approved' WHERE token_no='$token_no'";
        $updateResult = mysqli_query($conn, $sql);
        
        if ($updateResult) {
             
            // Fetch Data from Database
            $sql = "SELECT * FROM noc_certificates WHERE status='approved' AND user_id='$user_id' AND token_no = '$token_no'";
            $result = mysqli_query($conn, $sql);
            
            // Assign Data to Variables
                $row = mysqli_fetch_assoc($result);

            $token_no = $row['token_no'];
            $user_id = $row['user_id'];
            $full_name = $row['full_name'];
            $father_husband_name = $row['father_husband_name'];
            $date_of_birth = $row['date_of_birth'];
            $gender = $row['gender'];
            $full_address = $row['full_address'];
            $village = $row['village'];
            $district = $row['district'];
            $state = $row['state'];
            $pin_code = $row['pin_code'];
            $purpose = $row['purpose'];
            $purpose_details = $row['purpose_details'];
            $identity_proof_type = $row['identity_proof_type'];
            $identity_proof_path = $row['identity_proof_path'];
            // $supporting_document_path = $row['supporting_document_path'];
            $status = $row['status'];
            $request_date = $row['request_date'];
            date_default_timezone_set('Asia/Kolkata');
            $issue_date = date('Y-m-d H:i:s');

$mpdf = new \Mpdf\Mpdf();

$html="<style>
    body {
        font-family: freeserif,Arial, sans-serif;
    }
    .certificate {
        text-align: center;
        font-family: freeserif,Arial, sans-serif;
    }
    h2 {
        text-decoration: underline;
        font-size: 20px;
        margin-top:100px;
    }
    .content {
        font-size: 14px;
        text-align: justify;
        line-height: 1.5;
    }
    .info {
        font-weight: bold;
    }
    .signature {
        margin-top: 0px;
        text-align: right;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }
    td, th {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
    }
    .seal { text-align: center; font-size: 14px; margin-top: 10px; }

</style>

<div class='certificate'>
    <h2>नो ऑब्जेक्शन सर्टिफिकेट (NOC) / No Objection Certificate (NOC)</h2>
    <p><strong>ज्यांना हे लागू आहे / TO WHOM IT MAY CONCERN</strong></p>
</div>

<table>
    <tr>
        <th colspan='2' style='text-align:center;'>अर्जदाराचे तपशील / Applicant Details</th>
    </tr>
    <tr>
        <td><b>पूर्ण नाव / Full Name:</b></td>
        <td>$full_name</td>
    </tr>
    <tr>
        <td><b>वडील / पतीचे नाव / Father\'s / Husband\'s Name:</b></td>
        <td>$father_husband_name</td>
    </tr>
    <tr>
        <td><b>निवासी पत्ता / Residential Address:</b></td>
        <td>$full_address</td>
    </tr>
    <tr>
        <td><b>गाव / शहर / Village / Town / City:</b></td>
        <td>$village</td>
    </tr>
    <tr>
        <td><b>जिल्हा / District:</b></td>
        <td>$district</td>
    </tr>
    <tr>
        <td><b>राज्य / State:</b></td>
        <td>$state</td>
    </tr>
    <tr>
        <td><b>पिन कोड / Pin Code:</b></td>
        <td>$pin_code</td>
    </tr>
</table>

<table>
    <tr>
        <th colspan='2' style='text-align:center;'>NOC साठी कारण / Purpose of NOC</th>
    </tr>
    <tr>
        <td><b>एनओसीचे उद्दीष्ट / Purpose of NOC:</b></td>
        <td>$purpose</td>
    </tr>
    <tr>
        <td><b>उद्दीष्टाचा तपशील / Details of Purpose:</b></td>
        <td>$purpose_details</td>
    </tr>
</table>

<table>
    <tr>
        <th colspan='2'>ओळख पुरावा / Identity Proof</th>
    </tr>
    <tr>
        <td><b>सादर केलेला ओळख दस्तऐवज / Identity Document Submitted:</b></td>
        <td>$identity_proof_type</td>
    </tr>
    <tr>
        <td><b>दस्तऐवज क्रमांक / Document Number:</b></td>
        <td>1234-5678-9012</td>
    </tr>
</table>

<p class='content'>
    तपासणीअंती, <b>ग्रामपंचायत कार्यालय / Grampanchayat Office</b> यांना या प्रमाणपत्राचा अर्जदारास <b>कोणतीही हरकत नाही / no objection</b> आहे असे प्रमाणित करण्यात येते.
</p>

<p class='content'>
    हे प्रमाणपत्र दिनांक <b> $issue_date </b> रोजी अर्जदाराच्या विनंतीवरून दिले जात आहे. <br/>
    This certificate is issued on <b>$issue_date </b>, at the request of the applicant.
</p>

<div class='signature'>
<p><img src='C:/xampp/htdocs/Digi-gram/certificate/assets/sign.jpg' style='width:80px'></p>
    <p><strong>अधिकाऱ्याची स्वाक्षरी / Signature of Authority</strong></p>
    <p>हुद्दा / Designation: ग्रामपंचायत अधिकारी / Grampanchayat Officer</p>
    <div class='seal'><img src='C:/xampp/htdocs/Digi-gram/certificate/assets/stamp.jpg' style='width:80px; margin: 0 auto'><br>मुद्र / SEAL</div>
</div>
";

$mpdf->WriteHTML($html);
$pdfFileName = "C:/xampp/htdocs/Digi-gram/certificate/genrated_certificates/noobjection_certificates/no-objection_certificate_$token_no.pdf";
$mpdf->Output($pdfFileName ,'F');

$updatePDFQuery = "UPDATE document_requests SET pdf_file_path='$pdfFileName' , issue_date ='$issue_date'  WHERE token_no='$token_no'";
$result=mysqli_query($conn, $updatePDFQuery);

if(!$result){
    echo "not1";
}
$updatePDFQuery = "UPDATE noc_certificates SET pdf_file_path='$pdfFileName' , issue_date ='$issue_date' WHERE token_no='$token_no'";
$result=mysqli_query($conn, $updatePDFQuery);
if(!$result){
    echo "not2";
}
echo "<script>
window.location.href = 'admin.php?key=No+objection+Pendings';
</script>
";
} else {
echo "Error updating status: " . mysqli_error($conn);
}
        }
}


if (isset($_POST['reject']) && isset($_POST['token_no'])) {
    $token_no = $_POST['token_no'];
    $sql = "UPDATE noc_certificates SET status='rejected' WHERE token_no='$token_no'";
    $updateResult = mysqli_query($conn, $sql);

    $sql = "UPDATE document_requests SET status='rejected' WHERE token_no='$token_no'";
    $updateResult = mysqli_query($conn, $sql);
    echo "<script>
    window.location.href = 'admin.php?key=No+objection+Pendings'; 
</script>";
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
    .container{
        width: 82%;
        height: 82%;
        border-bottom: 2px solid black;
        overflow-y: scroll;
    }
    </style>

</head>
<body>
  <div class="container">
  <?php
   if(isset($_GET['key']) && $_GET['key']=='No objection Pendings'){
   echo "
   <div class='noc-content'>
       <table class='table table-bordered'>
           <tr class='table-dark'>
               <th>sr</th>
               <th>Name</th>
               <th>Gender</th>
               <th>Requested Date</th>
               <th>Token No</th>
               <th>Form </th>
               <th>Approve </th>
           </tr>";

while ($row = mysqli_fetch_assoc($result)) {
    $pdf_url="http://localhost" . str_replace("C:/xampp/htdocs", "", $row['application_form']);
   echo "
           <tr>
               <td>{$row['sr']}</td>
               <td>{$row['full_name']}</td>
                <td>{$row['gender']}</td>
                <td>{$row['request_date']}</td>
               <td>{$row['token_no']}</td>
               <td><a href='$pdf_url' class='download-btn-enabled'>Open</a></td>
                <td>
                <form action='' method='POST'>
                <input type='hidden' name='token_no' value='{$row['token_no']}'>
                <input type='hidden' name='user_id' value='{$row['user_id']}'>
                <input type='submit' name='approved' class='btn btn-success' value='Approved'>
                <input type='submit' name='reject' class='btn btn-danger ms-2' value='Reject'>
                 </form>
              </td>
           </tr>";
}

echo " </table>
</div>";
   }

   if(isset($_GET['key']) && $_GET['key']=='No objection Approved'){
    $sql = "SELECT * FROM noc_certificates WHERE status='approved' ORDER BY sr DESC";
    $result = mysqli_query($conn, $sql);
    
    echo "
    <div class='noc-content'>
        <table class='table table-bordered'>
            <tr class='table-dark'>
               <th>sr</th>
               <th>Name</th>
               <th>Gender</th>
               <th>Requested Date</th>
               <th>Issue Date</th>
               <th>Token No</th>
               <th>Approve </th>
           </tr>";
 
 while ($row = mysqli_fetch_assoc($result)) {
    $token_no=$row['token_no'];
    $pdf_url = "http://localhost" . str_replace("C:/xampp/htdocs", "", $row['pdf_file_path']);
    echo "
            <tr>
                <td>{$row['sr']}</td>
                <td>{$row['full_name']}</td>
                <td>{$row['gender']}</td>
                <td>{$row['issue_date']}</td>
                <td>{$row['request_date']}</td>
                <td>{$row['token_no']}</td>
                 <td>
                         <a href='$pdf_url' class='download-btn-enabled'>Open</a>
                        </td>
            </tr>";
 }
 
 echo " </table>
 </div>";
    }

    if(isset($_GET['key']) && $_GET['key']=='No objection Rejected'){
        $sql = "SELECT * FROM noc_certificates WHERE status='rejected'";
  $result = mysqli_query($conn, $sql);
        echo "
        <div class='noc-content'>
            <table class='table table-bordered'>
               <tr class='table-dark'>
               <th>sr</th>
               <th>Name</th>
               <th>Gender</th>
               <th>Requested Date</th>
               <th>Token No</th>
               <th>Approve </th>
           </tr>";
     
     while ($row = mysqli_fetch_assoc($result)) {
        echo "
                 <tr>
                <td>{$row['sr']}</td>
                <td>{$row['full_name']}</td>
                <td>{$row['gender']}</td>
                <td>{$row['request_date']}</td>
                <td>{$row['token_no']}</td>
                 <td>
                        <form action='' method='POST'>
                        <input type='submit' name='rejected' class='btn btn-danger'  value='Rejected' disabled>                         
                         </form>
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
            window.open('<?php echo $pdf_file_path;?>')
        }
    </script>
    </body>
    
    </html>