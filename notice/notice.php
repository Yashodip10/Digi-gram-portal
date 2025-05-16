<?php
include '../database/db.php';
session_name("user_page");
session_start();
if (!isset($_SESSION['logged'])) {
    header('Location:../user/login.php');
}

$sql = "SELECT * FROM `notices` ORDER BY sr DESC";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notices</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: sans-serif;
        }
        .notices-heading {
            margin: 120px auto 0 auto;
            text-align: center;
        }
        .notice-container {
            width: 70%;
            height: 72vh;
            overflow: hidden;
            border: 2px solid #ffbf00;
            position: relative;
            border-radius: 3px;
            padding: 10px;
            margin: 10px auto;
            text-align: left;
            background-color: white;
            box-shadow: 0px 0px 2px orange, 0px 0px 55px rgba(255, 153, 0, 0.523);
            border-radius: 5px;
        }
        .notice-box {
            display: flex;
            flex-direction: column;
            position: relative;
            padding: 10px 30px;
        }
        .notice-box p {
            padding: 10px 10px;
            border-bottom: 2px solid rgb(255, 72, 0);
            cursor: pointer;
        }
        .notice-box p a {
            color: rgb(255, 72, 0);
            text-decoration: none;
        }
        .notice-box p a:hover {
            background-color: rgba(255, 255, 255, 0.23);
            color: blueviolet;
        }
        .notice-box i{
                color: rgba(0, 0, 0, 0.6);
        }
        .notice-box p:hover i {
            color: red;
        }
        /* Dynamic Animation */
        .scroll-animation {
            animation: scroll-up linear infinite;
        }
        .scroll-animation:hover{
                animation-play-state: paused;
        }
        @keyframes scroll-up {
            0% { transform: translateY(70vh); }
            100% { transform: translateY(-100%); }
        }
    </style>
</head>
<body>
<?php include '../nav.php'; ?>

<h1 class="notices-heading">Notices</h1>

<div class="notice-container">
    <div class="notice-box" id="noticeBox">
        <?php
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $file_path = "http://localhost" . str_replace("C:/xampp/htdocs", "", $row['file_path']);
                $notice = $row['notice'];
                $date = $row['date'];
                echo "<p><a href=\"$file_path\">$notice ($date) <i class='fa-regular fa-file-pdf'></i></a></p>";
            }
        }
        ?>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let noticeBox = document.getElementById("noticeBox");
        let noticeContainer = document.querySelector(".notice-container");
        let notices = noticeBox.children.length;

        if (notices > 0) {
            let totalHeight = noticeBox.scrollHeight;
            let duration = Math.max(10, totalHeight / 40); // Adjust speed dynamically

            noticeBox.style.animationDuration = duration + "s";
            noticeBox.classList.add("scroll-animation");
        }
    });
</script>

</body>
</html>
