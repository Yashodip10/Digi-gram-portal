<?php
require "../database/db.php";

if (isset($_POST['submit'])) {
    $notice = mysqli_real_escape_string($conn, $_POST['notice']);
    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $upload_dir = "C:/xampp/htdocs/Digi-gram/notice/uploads/";

    if (move_uploaded_file($file_tmp, $upload_dir . $file_name)) {
        $file_path = $upload_dir . $file_name;
        $sql = "INSERT INTO notices (notice, file_path) VALUES ('$notice', '$file_path')";

        if (mysqli_query($conn, $sql)) {
            echo "<p class='success'>Notice added successfully!</p>";
        } else {
            echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
        }
    } else {
        echo "<p class='error'>File upload failed!</p>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Add Notice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            /* text-align: center; */
        }

        .container {
            width: 50%;
            margin: 50px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        
        .btn ,.file{
            padding: 10px;
            width: 90%;
            margin: 10px;
        }
        textarea {
    width: 90%;
    height: 150px; /* Fixed height */
    padding: 10px;
    margin: 10px;
    border: 1px solid rgba(0, 0, 0, 0.3);
    border-radius: 5px;
    resize: none; /* Disable resizing */
    font-size: 16px;
}

        .btn {
            background: #28a745;
            color: white;
            border: none;
            cursor: pointer;
        }

        .btn:hover {
            background: #218838;
        }

        .success {
            color: green;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Add New Notice</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <textarea type="text" name="notice" placeholder="Enter Notice" required></textarea>
            <input type="file" name="file" accept=".pdf" class="file" required>
            <button type="submit" name="submit" class="btn">Add Notice</button>
        </form>
    </div>
</body>

</html>