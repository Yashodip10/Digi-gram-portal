<?php
 require '../database/db.php';
 require_once __DIR__ . '/include/vendor/autoload.php'; // Load mPDF Library

 if(isset($_GET['key'])&& $_GET['key']=='Residential Pendings'){
    $sql = "SELECT * FROM residential_certificates WHERE status='pending'";
    $result = mysqli_query($conn, $sql);
    if (isset($_POST['approved']) && isset($_POST['token_no'])) {
        $token_no=$_POST['token_no'];
        $user_id=$_POST['user_id'];
        $sql = "UPDATE residential_certificates SET status='approved' WHERE token_no='$token_no'";
        $updateResult = mysqli_query($conn, $sql);
        
        if ($updateResult) {
            
           
            $sql = "SELECT * FROM residential_certificates WHERE status='approved' && user_id='$user_id' && token_no = '$token_no'";
            $result = mysqli_query($conn, $sql);

            $row = mysqli_fetch_assoc($result);         
 $token_no = $row['token_no'];
 $user_id = $row['user_id'];
 $grampanchayat_office = $row['grampanchayat_office'];
 $taluka = $row['taluka'];
 $district = $row['district'];
 $request_date = $row['request_date'];
 $full_name = $row['full_name'];
 $aadhaar_number = $row['aadhaar_number'];
 $village = $row['village'];
 $residence_taluka = $row['residence_taluka'];
 $residence_district = $row['residence_district'];
 $full_address = $row['full_address'];
 $pin_code = $row['pin_code'];
 $residency_status = $row['residency_status'];
 $proof_document_type = $row['proof_document_type'];
 $file_path = $row['proof_document_path'];
 $status = $row['status'];
 date_default_timezone_set('Asia/Kolkata');
 $issue_date = date('Y-m-d H:i:s');  

$mpdf = new \Mpdf\Mpdf();

$html=" 
<style>
    body { font-family: freeserif, DejaVu Sans, sans-serif; }
    .container { width: 100%; border: 2px solid black; padding: 20px; text-align: center;}
    .header { font-weight: bold; font-size: 20px; text-align: center; }
    .sub-header { font-size: 18px; margin-bottom: 10px; text-align: center; }
    .content { font-size: 16px; text-align: justify; margin: 10px 0; }
    .table { width: 100%; border-collapse: collapse; margin-top: 10px;}
    .table, .table th, .table td { border: 1px solid black; padding: 10px; font-size: 16px; }
    .table th { width: 40%; text-align: right; padding-right: 10px; } 
    .table td { width: 60%; text-align: left; padding-left: 20px; height: 40px; } 
   
</style>

<div class='container'>
    <div class='header'>ग्रामपंचायत कार्यालय लोण | Grampanchayat Office Lon</div>
    <div class='sub-header'><h2>रहिवासी दाखला | Residence Certificate</h2></div>

    <table class='table'>
        <tr>
            <th>जा़क्र. / Reference No.</th>
            <td>$token_no</td>
        </tr>
        <tr>
            <th>दिनांक / Date</th>
            <td>$issue_date</td>
        </tr>
        <tr>
            <th>श्री./श्रीमती / Mr./Mrs.</th>
            <td>$full_name</td>
        </tr>
     
        <tr>
            <th>आधार क्रमांक / Aadhar Number</th>
            <td>$aadhaar_number</td>
        </tr>
        <tr>
            <th>पत्ता / Address</th>
            <td>$full_address</td>
        </tr>
        <tr>
            <th>गाव / Village</th>
            <td>  $village</td>
        </tr>
        <tr>
            <th>तालुका / Taluka</th>
            <td>$taluka</td>
        </tr>
        <tr>
            <th>जिल्हा / District</th>
            <td>$district</td>
        </tr>
        <tr>
        <td colspan=2>
            सदर दाखला त्यांच्या विनंती अर्जावरून देण्यात आला आहे.<br>This certificate is issued upon their request.
            </td>
        </tr>
    </table>

    <div class='content'>
        <p>वरील नमूद व्यक्ती हा / हि आमच्या गावाचा / गावची रहिवासी असून, सदरचा दाखला त्यांच्या अर्जावरून देण्यात आला आहे.</p>
        <p>The above-mentioned person is a resident of our village and this certificate is issued upon their request.</p>
    </div>

      <div class='seal'>
      <p><img src='C:/xampp/htdocs/Digi-gram/certificate/assets/sign.jpg' style='width:80px'></p>
        <p><strong>सही / Signature</strong></p>
        <p>सरपंच / ग्रामसेवक / ग्रामविकास अधिकारी</p>
    </div>
   <div class='seal2'><img src='C:/xampp/htdocs/Digi-gram/certificate/assets/stamp.jpg' style='width:80px; margin: 0 auto'><br>मुद्र / SEAL
   </br></div>
</div>   ";

$mpdf->WriteHTML($html);
$pdfFileName = "C:/xampp/htdocs/Digi-gram/certificate/genrated_certificates/residential_certificates/residential_certificate_$token_no.pdf";
$mpdf->Output($pdfFileName, 'F');

$updateQuery = "UPDATE document_requests SET pdf_file_path='$pdfFileName' , status='approved' WHERE user_id='$user_id' AND token_no='$token_no'";
$result=mysqli_query($conn, $updateQuery);
if (!$result) {
    die("Query Failed: " . mysqli_error($conn)); // Show error
}


$updateQuery = "UPDATE residential_certificates 
    SET issue_date = '$issue_date', status = 'approved' ,pdf_file_path='$pdfFileName'
    WHERE user_id = '$user_id' AND token_no = '$token_no'";
$result=mysqli_query($conn, $updateQuery);
if (!$result) {
    die("Query Failed: " . mysqli_error($conn)); // Show error
}

echo "<script>
window.location.href = 'admin.php?key=Residential+Pendings';
</script>
";
} else {
echo "Error updating status: " . mysqli_error($conn);
}
}
}

if (isset($_POST['rejected']) && isset($_POST['token_no'])) {
    $token_no = $_POST['token_no'];
    $sql = "UPDATE residential_certificates SET status='rejected' WHERE token_no='$token_no'";
    $updateResult = mysqli_query($conn, $sql);

    $sql = "UPDATE document_requests SET status='rejected' WHERE token_no='$token_no'";
    $updateResult = mysqli_query($conn, $sql);

    echo "<script>
window.location.href = 'admin.php?key=Residential+Pendings';
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

        .residential-content {
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
   
<?php
   if(isset($_GET['key']) && $_GET['key']=='Residential Pendings'){
   echo "
   <div class='residential-content'>
       <table class='table table-bordered'>
           <tr class='table-dark'>
               <th>sr</th>
               <th>Name</th>
               <th>Village</th>
               <th>Aadhar No</th>
               <th>Token No</th>
               <th>Form </th>
               <th>Action</th>
           </tr>";

while ($row = mysqli_fetch_assoc($result)) {
    $pdf_url="http://localhost" . str_replace("C:/xampp/htdocs", "", $row['application_form']);
   echo "
           <tr>
               <td>{$row['sr']}</td>
               <td>{$row['full_name']}</td>
               <td>{$row['village']}</td>
               <td>{$row['aadhaar_number']}</td>
               <td>{$row['token_no']}</td>
               <td>
               <a href='$pdf_url' class='download-btn-enabled'>Open</a>
               </td>
              <td> <form action='' method='POST'>
               <input type='hidden' name='token_no' value='{$row['token_no']}'>
               <input type='hidden' name='user_id' value='{$row['user_id']}'>
               <input type='submit' name='approved' class='btn btn-success' value='Approved'>

               <input type='submit' name='rejected' class='btn btn-danger ms-2' value='Rejected'>
                   </form>
               </td>
           </tr>";
}

echo " </table>
</div>";
   }

   if(isset($_GET['key']) && $_GET['key']=='Residential Approved'){
    $sql = "SELECT * FROM residential_certificates WHERE status='approved' ORDER BY sr DESC";
    $result = mysqli_query($conn, $sql);
    echo "
    <div class='residential-content'>
        <table class='table table-bordered'>
            <tr class='table-dark'>
                <th>sr</th>
                <th>Name</th>
                <th>Village</th>
                <th>Aadhar No</th>
                <th>Token No</th>
                <th>Requested Date</th>
                <th>Action </th>
            </tr>";
 
 while ($row = mysqli_fetch_assoc($result)) {
    $token_no=$row['token_no'];
    $pdf_url = "http://localhost" . str_replace("C:/xampp/htdocs", "", $row['pdf_file_path']);
    echo "
            <tr>
                <td>{$row['sr']}</td>
                <td>{$row['full_name']}</td>
                <td>{$row['village']}</td>
                <td>{$row['aadhaar_number']}</td>
                <td>{$row['token_no']}</td>
                <td>{$row['request_date']}</td>
                <td>
                <a href='$pdf_url' class='download-btn-enabled'>Open</a>
                </td>
            </tr>";
 }
 
 echo " </table>
 </div>";
    }

    if(isset($_GET['key']) && $_GET['key']=='Residential Rejected'){
        $sql = "SELECT * FROM residential_certificates WHERE status='rejected'";
        $result = mysqli_query($conn, $sql);
        echo "
        <div class='residential-content'>
            <table class='table table-bordered'>
                <tr class='table-dark'>
                    <th>sr</th>
                    <th>Name</th>
                    <th>Village</th>
                    <th>Aadhar no</th>
                    <th>Requested date </th>
                    <th>Action</th>
                </tr>";
     
     while ($row = mysqli_fetch_assoc($result)) {
        echo "
                <tr>
                    <td>{$row['sr']}</td>
                    <td>{$row['full_name']}</td>
                    <td>{$row['village']}</td>
                    <td>{$row['aadhaar_number']}</td>
                    <td>{$row['request_date']}</td>
                    <td>

                       <form action='' method='POST'>
                        <input type='hidden' name='sr' value='{$row['sr']}'>
                        <input type='submit' name='rejected' class='btn btn-danger'  value='Rejected' disabled>                       
                       </form>
                      
                       </td>
                </tr>";
     }
     
     echo " </table>
     </div>";
        }
?>

<script>
    function openpdf(){
        window.open('<?php echo $pdf_path;?>')
    }
</script>
</body>

</html>