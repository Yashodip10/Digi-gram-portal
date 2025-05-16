<?php
session_name("user_page");
session_start();
include '../database/db.php';
if (!isset($_SESSION['logged'])) {
    header('location:login.php');
    exit();
}

    if(isset($_POST['new_password'])){
        $username=$_SESSION['username'];
        $current_password=$_POST['current_password'];
        $new_password=$_POST['new_password'];
        $confirm_password=$_POST['confirm_password'];
        
        $sql="SELECT * FROM `user` WHERE username='$username'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);
        if($row){
            if(!password_verify($current_password,$row['password'])){
                echo "<script>alert('Current Password does not match')</script>";
            }
            elseif(password_verify($new_password,$row['password'])){
                echo "<script>alert('New password cannot be the same as the current password!')</script>";
            }
            else{
                $new_password=password_hash($new_password,PASSWORD_DEFAULT);
                $sql="UPDATE `user`   SET password = '$new_password' WHERE username='$username'";
        $result=mysqli_query($conn,$sql);
        if($result){
            echo "<script>alert('Password updated successfully')</script>";
            echo "<script>window.location.href='../index.php';</script>";
        }
        else{
            echo "not";
        }
            }
        }
        else{
            echo "not2";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 100vw;
            background-image: url("assets/regi-bg2.jpg");
            background-size: cover;
        }
        .container {
            background: rgba(0, 0, 0, 0.46);
            backdrop-filter: blur(10px);
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 30%;
            color: white;
        }
        h2 {
            text-align: center;
            padding-bottom: 20px;
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }
        .password-container {
            position: relative;
        }
        input {
            width: 100%;
            padding: 8px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: blue;
            font-weight: 550;
        }
        .error-message {
            color: red;
            font-size: 14px;
            display: none;
        }
        .btn {
            width: 100%;
            background: #28a745;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }
        .btn:hover {
            background: #218838;
        }
    </style>
</head>
<body>

<?php include '../nav.php'; ?>

<div class="container">
    <h2>Change Password</h2>
    <form id="passwordForm" action="change_password.php" method="POST">
        <label for="current_password">Current Password</label>
        <div class="password-container">
            <input type="password" placeholder="Enter your current password" id="current_password" name="current_password" required>
            <span class="toggle-password" onclick="togglePassword('current_password')">Show</span>
        </div>

        <label for="new_password">New Password</label>
        <div class="password-container">
            <input type="password" placeholder="Enter your new password" id="new_password" name="new_password" required>
            <span class="toggle-password" onclick="togglePassword('new_password')">Show</span>
        </div>

        <label for="confirm_password">Confirm New Password</label>
        <div class="password-container">
            <input type="password" placeholder="Confirm your new password" id="confirm_password" name="confirm_password" required onkeyup="validatePassword()">
            <span class="toggle-password" onclick="togglePassword('confirm_password')">Show</span>
        </div>
        <span class="error-message" id="passwordError">Passwords do not match!</span>

        <button type="submit" class="btn" id="submitBtn" disabled>Update Password</button>
    </form>
</div>

<script>
    function togglePassword(fieldId) {
        let field = document.getElementById(fieldId);
        field.type = field.type === "password" ? "text" : "password";
    }

    function validatePassword() {
        let newPassword = document.getElementById("new_password").value;
        let confirmPassword = document.getElementById("confirm_password").value;
        let errorMessage = document.getElementById("passwordError");
        let submitBtn = document.getElementById("submitBtn");

        if (newPassword === confirmPassword && newPassword !== "") {
            errorMessage.style.display = "none";
            submitBtn.disabled = false;
        } else {
            errorMessage.style.display = "block";
            submitBtn.disabled = true;
        }
    }
</script>

</body>
</html>
