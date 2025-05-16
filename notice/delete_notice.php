<?php
require "../database/db.php";

if (isset($_POST['delete'])) {
    $sr = intval($_POST['sr']);

    // Fetch file path before deleting
    $query = "SELECT file_path FROM notices WHERE sr=$sr";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $file_path = $row['file_path'];

        // Delete notice from the database
        $sql = "DELETE FROM notices WHERE sr=$sr";
        if (mysqli_query($conn, $sql)) {
            echo "<p class='success-message'>Notice deleted successfully!</p>";

            // Delete the PDF file if it exists
            if (!empty($file_path) && file_exists($file_path)) {
                unlink($file_path);
                echo "<script>window.open('admin.php?key=Delete+Notices')</script>";
            }
        } else {
            echo "<p class='error-message'>Error deleting notice: " . mysqli_error($conn) . "</p>";
        }
    } 
}

// Fetch all notices
$query = "SELECT * FROM notices ORDER BY sr DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Notice</title>
    <style>
        .body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .container {
            text-align: center;
            width: 80%;
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
            padding: 10px;
            text-align: center;
        }
        .table th {
            background: #007bff;
            color: white;
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
<body class="body">
    <div class="container">
        <h2>Delete Notice</h2>

        <table class="table">
            <tr>
                <th>SR No</th>
                <th>Notice</th>
                <th>PDF</th>
                <th>Action</th>
            </tr>
            <?php
            if($result){ while ($row = mysqli_fetch_assoc($result)){ 
                
                $pdf_url = "http://localhost" . str_replace("C:/xampp/htdocs", "", $row['file_path']);
                ?>
            <tr>
                <td><?php echo $row['sr']; ?></td>
                <td><?php echo htmlspecialchars($row['notice']); ?></td>
                <td>
                    <?php if (!empty($row['file_path'])): ?>
                        <a href="<?php echo $pdf_url ?>" target="_blank" class="pdf-link">View PDF</a>
                    <?php else: ?>
                        No PDF
                    <?php endif; ?>
                </td>
                <td>
                    <form method="POST" onsubmit="return confirm('Are you sure you want to delete this notice?');">
                        <input type="hidden" name="sr" value="<?php echo $row['sr']; ?>">
                        <button type="submit" name="delete" class="delete-button">Delete</button>
                    </form>
                </td>
            </tr>
            <?php };} ?>
        </table>
    </div>
</body>
</html>
