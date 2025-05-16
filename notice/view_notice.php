
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
                .body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .container {
            text-align: center;
            width: 90%;
            margin: 50px auto;
            padding:0 20px;
            background: white;
            /* border-radius: 8px; */
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin-top: 20px;
            overflow-y: scroll;
            height: 80%;
            border-bottom: 2px  solid black;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 10px 20px;
            text-align: center;

        }
        .table th {
            background: #007bff;
            color: white;
        }

        .txt-align{
            text-align: left !important;
        }
        .delete-button {
            background: #dc3545;
            color: white;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
            border-radius: 5px;
        }
        .delete-button:hover {
            background: #c82333;
        }
        .pdf-link {
            color: #007bff;
            text-decoration: none;
        }
        .success-message {
            color: green;
            font-weight: bold;
        }
        .error-message {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
<?php

require "../database/db.php";
         
    echo "
<table class='table table-bordered text-left'>
           <tr class='table-dark'>
               <th>sr</th>
               <th>Notice</th>
               <th>Date</th>
               <th>PDF</th>
               <th>Display</th>
           </tr>
           ";
           $sql = "SELECT * FROM notices WHERE visible='yes'";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    $pdf_url="http://localhost" . str_replace("C:/xampp/htdocs", "", $row['file_path']);
    echo "
    <tr>
        <td>{$row['sr']}</td>
        <td class='txt-align'>{$row['notice']}</td>
        <td>{$row['date']}</td>
        <td><a href='$pdf_url' class='download-btn-form'>Open</a></td>
        <td>{$row['visible']}</td>
        </tr>";
}

        ?>
    </div>
</body>
</html>
