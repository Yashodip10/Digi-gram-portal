<?php
session_name("user_page");
session_start();
require "../database/db.php"; // Database connection
require '../vendor/autoload.php'; // Load PHPMailer

$otpverified = true;
$msg = "";
if (isset($_POST['forgot'])) {
    unset($_SESSION['otp']);
    $credintials =$_SESSION['credentials']= $_POST['credintials'];
    $sql = "SELECT email FROM `user` WHERE username='$credintials' OR email='$credintials' OR mobile='$credintials'";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $email = $row['email'];

        if (!isset($_SESSION['otp']) || isset($_POST['resend'])) {
            $_SESSION['otp']=$otp = rand(1000, 9999);



            $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
                ->setUsername('patil0005555@gmail.com')
                ->setPassword('ftql bskt tjff pgwa');
            
            $mailer = new Swift_Mailer($transport);
            
            $message = (new Swift_Message('Your OTP'))
                ->setFrom(['patil0005555@gmail.com' => 'DigiGram Portal'])
                ->setTo([$email])
                ->setBody('Your OTP is: '.$otp);
            
            $result = $mailer->send($message);
            if (!$result) {
                echo "<script>alert('Failed to send email.');</script>";
            }
            
        }
    } else {
        $msg = "No account found with these credentials!";
       
    }

}

if(isset($_POST['submit'])){
    $new_password=password_hash($_POST['new_password'],PASSWORD_DEFAULT);
    if($_POST['otp']==$_SESSION['otp']){
        $credentials=$_SESSION['credentials'];
        $otpverified=true;
        $sql="UPDATE `user`   SET password = '$new_password' WHERE email='$credentials'";
        $result=mysqli_query($conn,$sql);
        if($result){
        unset($_SESSION['otp']);
        echo "<script>alert('Password updated successfully')</script>";
        echo "<script>window.location.href='login.php';</script>";
    }
}else{
    $otpverified=false;
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
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            user-select: none;
        }
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
            width: 30%;
            color: white;
            position: relative;
        }
        h2 {
            text-align: center;
            padding-bottom: 20px;
        }
        input {
            width: 100%;
            padding: 8px;
            margin: 8px 0;
            border-radius: 4px;
        }
        .btn {
            width: 100%;
            background: #28a745;
            color: white;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }

        #resend {
            border: none;
            color: blue;
            background: none;
            font-weight: bold;
        }
        .error-message {
            color: red;
            font-size: 14px;
        }

        #passwordError{
            display: none;
        }
      
        .first_row,.second_row,.third_row{
            position: relative;
            width: 100%;
        }
        .show-btn{
            position: absolute;
            color: blue;
            top: 50%;
            right: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Change Password</h2>
    <p class="error-message"><?php echo $msg; ?></p>
    
    <?php if (!isset($_POST['forgot']) && !isset($_POST['submit'])) { ?>
        <form action="" method="post">
            <input type="text" placeholder="Enter username/email/phone" name="credintials" required>
            <input type="submit" name="forgot" value="Send OTP">
        </form>
    <?php } 
    
    if(isset($_POST['forgot']) || isset($_POST['otp'])) { ?>
        <form id="passwordForm" action="" method="POST">
        <?php if(isset($_POST['submit']) && $otpverified==false){
                    echo '<p id="msg">Invalid OTP</p>';
                }
                ?>
            <div class="first_row">
            <label for="OTP">Enter OTP</label>
            <input type="number" placeholder="Enter OTP" name="otp" required>
        </div>

        <div class="second_row">
            <label for="new_password">New Password</label>
            <input type="password" placeholder="Enter new password" id="new_password" name="new_password" required>
            <span type="button" onclick="togglePassword('new_password')" class="show-btn">Show</span>
</div>
<div class="third_row">
            <label for="confirm_password">Confirm New Password</label>
            <input type="password" placeholder="Confirm password" id="confirm_password" name="confirm_password" required onkeyup="validatePassword()">
            <sapn type="button" onclick="togglePassword('confirm_password')" class="show-btn">Show</sapn>
</div>
<div class="forth_row">
<span class="error-message" id="passwordError">Passwords do not match!</span>
<input type="submit" name="submit" value="SUBMIT">
</div>
</form>

        <form action="" method="post">
            <input type="submit" name="resend" id="resend" value="Resend OTP">
        </form>
    <?php } ?>
</div>

<script>
    function togglePassword(fieldId) {
        let field = document.getElementById(fieldId);
        field.type = (field.type === "password") ? "text" : "password";
    }

    function validatePassword() {
        let newPassword = document.getElementById("new_password").value;
        let confirmPassword = document.getElementById("confirm_password").value;
        let errorMessage = document.getElementById("passwordError");

        if (newPassword === confirmPassword && newPassword !=="") {
            errorMessage.style.display = "none";
        } else {
            errorMessage.style.display = "block";
        }
    }
</script>

</body>
</html>
