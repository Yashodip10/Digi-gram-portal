<?php
 require '../database/db.php';
 require_once __DIR__ . '/include/vendor/autoload.php'; // Load mPDF Library
// Fetch pending marriage requests

if($_GET['key']=='Marriage Pendings'){
$sql = "SELECT * FROM marriage_certificates WHERE status='pending'";
$result = mysqli_query($conn, $sql);
if (isset($_POST['approved']) && isset($_POST['token_no'])) {
    $token_no=$_POST['token_no'];
    $user_id=$_POST['user_id'];
    $sql = "UPDATE marriage_certificates SET status='approved' WHERE token_no='$token_no'";
    $updateResult = mysqli_query($conn, $sql);
    
    if ($updateResult) {
        
        // $ = mysqli_real_escape_string($conn, $_POST['sr']);
        
        
        // Fetch Data from Database
        $sql = "SELECT * FROM marriage_certificates WHERE status='approved' && user_id='$user_id' && token_no = '$token_no'";
        $result = mysqli_query($conn, $sql);
        
        // Assign Data to Variables
        $row = mysqli_fetch_assoc($result);
        $husband_name = $row['husband_name'];
        $husband_father_name = $row['husband_father_name'];
        $husband_village = $row['husband_village'];
        $husband_tal = $row['husband_tal'];
        $husband_dist = $row['husband_dist'];

        $wife_name = $row['wife_name'];
        $wife_father_name = $row['wife_father_name'];
        $wife_village = $row['wife_village'];
        $wife_tal = $row['wife_tal'];
        $wife_dist = $row['wife_dist'];

        $solemnized_date = $row['solemnized_date'];
        $registered_date = $row['registered_date'];
        $serial_no = $row['sr'];
        $place = $row['place'];
        date_default_timezone_set('Asia/Kolkata');
        $issue_date = date('Y-m-d H:i:s');;

        $husband_image = $row['husband_image'];
        $wife_image = $row['wife_image'];
        $qr_code = $row['qr_code'];

        $status = $row['status'];
        $token_no=$row['token_no'];
        if ($status == 'approved') {
            $mpdf = new \Mpdf\Mpdf();

            $html = "
<!-- Wrapper Div for Full Page Border -->
<div style='font-family:arial, sans-serif; padding: 30px; border: 3px solid black; max-width: 800px; margin: auto;'>

    <!-- Table for Image Alignment with Passport-Size Photos -->
 <table style='width: 100%; border-collapse: collapse;'>
    <tr>
        <!-- Husband Photo -->
      <td style='width: 120px; text-align: center; vertical-align: middle;'>
    <div style='width: 100px; height: 120px; border: 1px solid black; padding: 0; display: flex; justify-content: center; align-items: center;'>
        <img src='$husband_image' alt='Husband Photo' style='width: 100px; height: 120px; object-fit: cover; display: block; border: 1px solid black;'>
    </div>
</td>

        <!-- Centered Title -->
        <td style='width: 60%; text-align: center; vertical-align: middle;'>
            <img src='C:/xampp/htdocs/Digi-gram/certificate/assets/ashok.jpeg' alt='logo' style='width: 70px; height: 70px;'>
            <h2 style='margin: 5px; font-family: freeserif; color:#FF2156; font-size: 32px;'>महाराष्ट्र शासन</h2>
            <h3 style='margin: 5px; color:#FF2156; font-size: 19px; font-family:arial, sans-serif;'>GOVERNMENT OF MAHARASHTRA</h3>
            <p style='margin: 5px 0px; font-family: freeserif; color:#FF2156; font-size: 16px;'>नमुना इ <br> Form E</p>
            <p style='color:#FF2156; font-size: 20px; font-weight: bold; font-family:freeserif;'>विवाह नोंदणी प्रमाणपत्र</p>
            <p style='color:#FF2156; font-size: 16px; font-weight: bold; font-family:arial, sans-serif;'>Certificate of Registration of Marriage</p>
            <p style='color:#FF2156; font-size: 14px; font-weight: bold; font-family:freeserif;'>(पहा कलम ६ (१) आणि नियम ५) See Section 6 (1) and Rule</p>
        </td>

        <!-- Wife Photo -->
     <td style='width: 120px; text-align: center; vertical-align: middle;'>
    <div style='width: 100px; height: 120px; border: 1px solid black; padding: 0; display: flex; justify-content: center; align-items: center;'>
        <img src='$wife_image' alt='Husband Photo' style='width: 100px; height: 120px; object-fit: cover; display: block; border: 1px solid black;'>
    </div>
</td>


    </tr>
</table>

<hr style='height:2px; color:black;'>


<p style='text-align:center; font-size:20px; color:red; font-family:freeserif; margin-top:-8px;'><strong>प्रमाणित करण्यात येते की, <br>Certificate that Marriage Between</strong></p>

    <!-- Husband`s Details with Underlined Name -->
    <div style='margin-top: 0px;'>
        
         <table style='width: 100%; margin-top: 10px;'>
    <tr>
        <td style='width: 180px; font-size:18px; font-family:freeserif;'><strong>Husband`s Name: <br> वराचे नाव</strong></td>
        <td style='border-bottom: 2px solid black; width: 100%; font-family:freeserif; font-size:22px; margin vertical-align:top; text-transform: uppercase;'>$husband_name</td>
    </tr>
</table>

         <table style='width: 100%; margin-top: 15px;'>
    <tr>
       <td style='width: 110px; font-size:16px; font-family:freeserif;'><strong>Residing At: <br>राहणार</strong></td>
        <td style='border-bottom: 1px solid black; width: 20%; font-family:freeserif; font-size:18px; padding:0 0 0 5px; text-transform: uppercase;'>$husband_village </td>
        <td style='width: 55px; font-size:18px'> &nbsp;Tal. : </td>
        <td style='border-bottom: 1px solid black; width: 20%; font-family:freeserif; font-size:18px; padding:0 0 0 5px; text-transform: uppercase;'>$husband_tal</td>
        <td style='width: 65px; font-size:18px'> &nbsp;Dist. : </td>
        <td style='border-bottom: 1px solid black; width: 20%; font-family:freeserif; font-size:18px; padding:0 0 0 5px; text-transform: uppercase;'>$husband_dist</td>
    </tr>
</table>

              <table style='width: 100%; margin-top: 15px;'>
    <tr>
        <td style='width: 160px; font-size:18px;font-family:freeserif;'><strong>Fathers`s Name: <br>वडिलांचे नाव</strong></td>
        <td style='border-bottom: 2px solid black; width: 100%; font-family:freeserif; font-size:22px; padding:0 0 0 20px; text-transform: uppercase;'>$husband_father_name</td>
    </tr>
</table>
    </div>

      <div style='margin-top: 10px;'>
        
         <table style='width: 100%; margin-top: 0px;'>
    <tr>
        <td style='width: 130px; font-size:18px; font-family:freeserif;'><strong>Wife`s Name: <br> वधूचे नाव</strong></td>
        <td style='border-bottom: 2px solid black; width: 100%; font-family:freeserif; font-size:22px; padding:0 0 0 20px; text-transform: uppercase;'>$wife_name</td>
    </tr>
</table>

         <table style='width: 100%; margin-top: 15px;'>
    <tr>
        <td style='width: 110px; font-size:16px; font-family:freeserif;'><strong>Residing At: <br>राहणार</strong></td>
        <td style='border-bottom: 1px solid black; width: 20%; font-family:freeserif; font-size:18px; padding:0 0 0 5px; text-transform: uppercase;'>$wife_village </td>
        <td style='width: 55px; font-size:18px'> &nbsp;Tal. : </td>
        <td style='border-bottom: 1px solid black; width: 20%; font-family:freeserif; font-size:18px; padding:0 0 0 5px; text-transform: uppercase;'>$wife_tal</td>
        <td style='width: 65px; font-size:18px'> &nbsp;Dist. : </td>
        <td style='border-bottom: 1px solid black; width: 20%; font-family:freeserif; font-size:18px; padding:0 0 0 5px; text-transform: uppercase;'>$wife_dist</td>
    </tr>
</table>

              <table style='width: 100%; margin-top: 15px;'>
    <tr>
        <td style='width: 160px; font-size:18px;font-family:freeserif;'><strong>Fathers`s Name: <br>वडिलांचे नाव</strong></td>
        <td style='border-bottom: 2px solid black; width: 100%; font-family:freeserif; font-size:22px; padding:0 0 0 20px;text-transform: uppercase;'>$wife_father_name</td>
    </tr>
</table>
    </div>

 
     <table style='width: 100%; margin-top: 15px;'>
    <tr>
        <td style='text-align: left; line-height:30px;'>Solemnized on $solemnized_date at (place) is registered by me on <br> $registered_date  at Serial No. $serial_no Of Volume 1 Of Register of Marriages maintained</td>
        <td style='text-align: center;'>
            <img src='C:/xampp/htdocs/Digi-gram/certificate/assets/qr.jpeg' alt='Seal' style='width: 120px;'>
        </td>
       
    </tr>
</table>
        <p style='font-size:13px;'>Under the Maharashtra Regulation of Marriage Bureaus and Registration of Marriages ACT 1998.</p>

      <table style='width: 100%; margin-top: 15px;'>
    <tr>
        <td style='text-align: left; line-height:30px;'>Place: $place <br>Date: '$issue_date' </td>
        <td style='text-align: center;'>
            <img src='C:/xampp/htdocs/Digi-gram/certificate/assets/stamp.jpg' alt='Seal' style='width: 100px;'>
        </td>
        <td style='text-align: right; vertical-align: bottom;'>
            <img src='C:/xampp/htdocs/Digi-gram/certificate/assets/sign.jpg' alt='Signature' style='width: 100px; padding-right:30px'> <br>
            Registrar of Marriages
        </td>
    </tr>
</table>

</div>";

            $mpdf->WriteHTML($html);
            $pdfFileName = "C:/xampp/htdocs/Digi-gram/certificate/genrated_certificates/marriage_certificates/marriage_certificate_$token_no.pdf";
            $mpdf->Output($pdfFileName, 'F');
            $updateQuery = "UPDATE document_requests SET pdf_file_path='$pdfFileName' , status='approved' WHERE user_id='$user_id' AND token_no='$token_no'";
            mysqli_query($conn, $updateQuery);

            $updateQuery = "UPDATE marriage_certificates 
                SET issue_date = '$issue_date', status = 'approved' ,pdf_file_path='$pdfFileName'
                WHERE user_id = '$user_id' AND token_no = '$token_no'";
mysqli_query($conn, $updateQuery);

            echo "<script>
    window.location.href = 'admin.php?key=Marriage+Pendings'; // Redirects to another page
</script>
";
        }
    }
}
}

        if (isset($_POST['reject']) && isset($_POST['token_no'])) {
            $token_no = $_POST['token_no'];
            $sql = "UPDATE marriage_certificates SET status='rejected' WHERE token_no='$token_no'";
            $updateResult = mysqli_query($conn, $sql);

            $sql = "UPDATE document_requests SET status='rejected' WHERE token_no='$token_no'";
            $updateResult = mysqli_query($conn, $sql);
            echo "<script>
            window.location.href = 'admin.php?key=Marriage+Pendings'; 
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
        /* body {
            display: flex;
            height: 100vh;
        } */

        .marriage-content {
            /* padding:0 20px; */
            margin:0 auto;
            width: 90%;
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

    <!-- Main Content -->
    <?php
    if($_GET['key']=='Marriage Pendings'){
   echo "
   <div class='marriage-content'>
       <table class='table table-bordered text-center'>
           <tr class='table-dark'>
               <th>sr</th>
               <th>Husband</th>
               <th>Wife</th>
               <th>Requested Date</th>
               <th>Token No</th>
               <th>Form</th>
               <th>Action</th>
           </tr>";

while ($row = mysqli_fetch_assoc($result)) {
    $form_pdf_url="http://localhost" . str_replace("C:/xampp/htdocs", "", $row['application_form']);
   echo "
           <tr>
               <td>{$row['sr']}</td>
               <td>{$row['husband_name']}</td>
               <td>{$row['wife_name']}</td>
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
    if($_GET['key']=='Marriage Approved'){
        $sql = "SELECT * FROM marriage_certificates WHERE status='approved' ORDER BY sr DESC";
        $result = mysqli_query($conn, $sql);
        echo "
        <div class='marriage-content'>
        <table class='table table-bordered text-center'>
        <tr class='table-dark'>
                <th>Sr</th>
                <th>Husband</th>
                <th>Wife</th>
                <th>Requested Date</th>
                <th>Token No</th>
                
                <th>Approved date</th>
                <th>Action</th>
            </tr>";
 
 while ($row = mysqli_fetch_assoc($result)) {
    // $sr=$row['sr'];
    $token_no=$row['token_no'];
    $pdf_url = "http://localhost" . str_replace("C:/xampp/htdocs", "", $row['pdf_file_path']);
     echo "
     <tr>
     <td>{$row['sr']}</td>
     <td>{$row['husband_name']}</td>
     <td>{$row['wife_name']}</td>
     <td>{$row['requested_date']}</td>
     <td>{$row['token_no']}</td>
     <td>{$row['issue_date']}</td>
                <td>
                <a href='$pdf_url' class='download-btn-enabled'>Open</a>
                </td>
            </tr>";
         
 }
 
 echo "  </table>
    </div>";
   
}




    if($_GET['key']=='Marriage Rejected'){
        $sql = "SELECT * FROM marriage_certificates WHERE status='rejected'";
        $result = mysqli_query($conn, $sql);

   echo "
   <div class='marriage-content'>
       <table class='table table-bordered text-center'>
           <tr class='table-dark'>
               <th>Sr</th>
               <th>Husband</th>
               <th>Wife</th>
               <th>Requested Date</th>
               <th>Token No</th>
               <th>Action</th>
           </tr>";

while ($row = mysqli_fetch_assoc($result)) {
   echo "
           <tr>
               <td>{$row['sr']}</td>
               <td>{$row['husband_name']}</td>
               <td>{$row['wife_name']}</td>
               <td>{$row['requested_date']}</td>
               <td>{$row['token_no']}</td>
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
       
<script>
    function openpdf(){
        window.open('<?php echo $pdf_path;?>')
    }
</script>
</body>

</html>