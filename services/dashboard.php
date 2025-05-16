<?php
include '../database/db.php';
$username=$_SESSION['username'];
if($_GET['key']=='Dashboard'){
    $sql = "SELECT * FROM document_requests WHERE user_id='$username'";
    $result = mysqli_query($conn, $sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- <h2 id="heading"><?php if(isset($_GET['key'])) { echo $_GET['key'];} else{ echo "Dashboard";}?></h2> -->
    <style>
    .container{
        width: 100%;
        height: 100%;
        position: relative;
    }

    .dashboard-content{
        width: 95%;
        height: 68%;
        /* padding: 50px; */
        border-bottom:2px solid black;
        overflow-x:scroll;
    }

    .d-head{
        padding: 41px 0 41px 100px;
        border-bottom: 3px solid orangered;
        margin-bottom: 20px;
        color: orangered;
    }
/* General Table Styling */
.styled-table {
    width: 90%;
    border-collapse: collapse;
    font-size: 16px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    background-color: #ffffff;
    /* border-radius: 8px; */
    overflow: hidden;
    margin: auto;
}

/* Header Styling */
.styled-table th {
    background-color:rgba(0, 0, 0, 0.81);
    color: white;
    text-transform: uppercase;
}

.styled-table th, .styled-table td {
    padding: 12px;
    text-align: center;
    border-bottom: 1px solid #ddd;
}

/* Row Hover Effect */
.styled-table tbody tr:hover {
    background-color: #f1f1f1;
}

/* Approve Button */
.approve-btn {
    background-color:rgb(21, 112, 43);
    color: white;
    border: none;
    padding: 8px 12px;
    border-radius: 5px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.approve-btn:hover {
    background-color: #218838;
}

.download-btn-disabled{
    background-color: rgba(32, 182, 32, 0.5);
    padding: 10px;
    border-radius: 5px;
    text-decoration: none;
    color: white;
    border: 1px solid green;
    pointer-events: none;
}

.download-btn-enabled{
    background-color:rgb(25, 113, 44);
    padding: 10px;
    border-radius: 5px;
    text-decoration: none;
    color: white;
    border: 1px solid green;
}

/* Responsive Design */
@media (max-width: 768px) {
    .styled-table {
        font-size: 14px;
    }
    .approve-btn {
        padding: 6px 10px;
    }
}
</style>
    
</head>
<body>
    <div class="container">
        <h1 class="d-head">Dashboard</h1>
    <?php
    echo"
<div class='dashboard-content'>
    <table class='styled-table'>
            <tr>
                <th>Sr</th>
                <th>Service</th>
                <th>Requested Date</th>
                <th>Token No</th>
                <th>Status</th>
                <th>Form</th>
                <th>Action</th>
            </tr>
        ";
        $sr=1;
        if($result){
        while($row=mysqli_fetch_assoc($result)){
            $form_pdf_url="http://localhost" . str_replace("C:/xampp/htdocs", "", $row['application_form']);
            $pdf_url = "http://localhost" . str_replace("C:/xampp/htdocs", "", $row['pdf_file_path']);
            echo"
                <tr>
                <td>$sr</td>
                <td>{$row['service_name']}</td>
                <td>{$row['requested_date']}</td>
                <td>{$row['token_no']}</td>
                <td>{$row['status']}</td>
                <td><a href='$form_pdf_url' class='download-btn-form'>View</a></td>
                <td>";
                if($row['status']=='approved'){
                    echo"
                <a href='$pdf_url' download class='download-btn-enabled'>Download</a>
                ";
            }
                else{
                    echo"
                    <a href='$pdf_url' download class='download-btn-disabled'>Download</a>
                    ";
                }
                echo"
                </td>
            </tr>";
            $sr++;
        }
            echo"
    </table>
</div>
    
";
    }
    ?>
    </div>
</body>
</html>