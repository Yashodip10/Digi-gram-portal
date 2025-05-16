<?php
include '../database/db.php';
    // if(isset($_POST['user_id'])){
        $sql = "SELECT * from document_requests where user_id='vijay'
";
$result = mysqli_query($conn, $sql);

echo "
<div class='marriage-content'>
<table class='table table-bordered'>
<tr class='bg-dark'>
<th>ID</th>
               <th>Service</th>
               <th>Stutas</th>
           </tr>";

           while ($row = mysqli_fetch_assoc($result)) {
            $token_no=$row['token_no'];
$pdf_path="http://localhost/Digi-gram/certificate/genrated_certificates/marriage_certificates/marriage_certificate_$token_no.pdf";
   echo "
           <tr>
               <td></td>
               <td>{$row['service_name']}</td>
               <td>{$row['status']}</td>
               <td>
               <form action='' method='POST'>
               <input type=\"button\" onclick=\"window.open('" . $pdf_path . "', '_Self')\" value=\"Open\">

                   </form>
               </td>
           </tr>";
}


echo "  </table>
   </div>";
// }
   ?>