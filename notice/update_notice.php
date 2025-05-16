<?php
require "../database/db.php";

$notice = "";
$sr = "";
$file_path = "";

if (isset($_POST['fetch'])) {
    $sr = intval($_POST['sr']);
    $query = "SELECT * FROM notices WHERE sr=$sr";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $notice = $row['notice'];
         $file_path="http://localhost" . str_replace("C:/xampp/htdocs", "",$row['file_path']);
    } else {
        echo "<p class='error-message'>Notice not found!</p>";
    }
}

if (isset($_POST['update'])) {
    $sr = intval($_POST['sr']);
    $notice = mysqli_real_escape_string($conn, $_POST['notice']);
    $uploadDir = "C:/xampp/htdocs/Digi-gram/notice/uploads/";

    // Handle PDF Upload
    if (!empty($_FILES['pdf']['name'])) {
        $fileName = basename($_FILES["pdf"]["name"]);
        $targetFilePath = $uploadDir . $fileName;
        $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

        if ($fileType != "pdf") {
            echo "<p class='error-message'>Only PDF files are allowed!</p>";
        } else {
            if (move_uploaded_file($_FILES["pdf"]["tmp_name"], $targetFilePath)) {
                $file_path = $targetFilePath;
            } else {
                echo "<p class='error-message'>Error uploading PDF file.</p>";
            }
        }
    }

    // Update Database
    $sql = "UPDATE notices SET notice='$notice', file_path='$file_path' WHERE sr=$sr";
    if (mysqli_query($conn, $sql)) {
        echo "<p class='success-message'>Notice updated successfully!</p>";
    } else {
        echo "<p class='error-message'>Error: " . mysqli_error($conn) . "</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Notice</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .container {
            width: 50%;
            margin: 50px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        .input-field {
            width: 90%;
            padding: 10px;
            margin: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .textarea-field {
            width: 90%;
            height: 150px; /* Fixed height */
            padding: 10px;
            margin: 10px;
            border: 1px solid rgba(0, 0, 0, 0.3);
            border-radius: 5px;
            resize: none; /* Disable resizing */
            font-size: 16px;
        }
        .submit-button {
            width: 90%;
            padding: 10px;
            border: none;
            cursor: pointer;
            color: white;
            background: #28a745;
            border-radius: 5px;
            margin: 10px;
        }
        .success-message {
            color: green;
            font-weight: bold;
        }
        .error-message {
            color: red;
            font-weight: bold;
        }
        .pdf-link {
            display: block;
            margin-top: 10px;
            font-size: 14px;
            color: #007bff;
        }
    </style>
</head>
<body class="body">
    <div class="container">
        <h2>Update Notice</h2>
        <div class="first-container">
        <!-- Step 1: Enter SR No -->
        <form method="POST">
            <input type="number" name="sr" class="input-field" value="<?php echo htmlspecialchars($sr); ?>" placeholder="Enter Notice SR No" required>
            <button type="submit" name="fetch" class="submit-button">Fetch Notice</button>
            <a href=""></a>
        </form>

        <!-- Step 2: Update Notice & Upload PDF -->
        <?php if($notice !== ""): ?>
        <form method="POST" enctype="multipart/form-data">
            <input type="hidden" name="sr" value="<?php echo htmlspecialchars($sr); ?>">
            <textarea name="notice" class="textarea-field" required><?php echo htmlspecialchars($notice); ?></textarea>
            <input type="file" name="pdf" accept=".pdf" class="input-field">
            
            <!-- Show Existing PDF Link -->
            <?php if (!empty($file_path)): ?>
                <a href="<?php echo $file_path; ?>" target="_blank" class="pdf-link">View Current PDF</a>
            <?php endif; ?>

            <button type="submit" name="update" class="submit-button">Update Notice</button>
        </form>
        <?php endif; ?>
        
    </div>
</body>
</html>
