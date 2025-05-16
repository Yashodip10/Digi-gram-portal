<?php
session_name("user_page");
session_start();
require "../database/db.php"; // Database connection file

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php'; // Load PHPMailer

$otpverified = true;
$email = $_SESSION['email'] ?? '';
// Generate OTP if not set or user requests resend
if (!isset($_SESSION['otp']) || isset($_POST['resend'])) {
    
unset($_SESSION['otp']);
    $otp= $_SESSION['otp'] = rand(1000, 9999);
     $_SESSION['otp_expiry'] = time() + 300; // OTP expires in 5 minutes



     $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
         ->setUsername('patil0005555@gmail.com')
         ->setPassword('ftql bskt tjff pgwa');
     
     $mailer = new Swift_Mailer($transport);
     
     $message = (new Swift_Message('Digi-Gram OTP'))
         ->setFrom(['patil0005555@gmail.com' => 'DigiGram Portal'])
         ->setTo([$email])
         ->setBody('Your OTP For New Registration On Digi-Gram Portal is: '.$otp . PHP_EOL ." Please Do Not Share it with anyone" .PHP_EOL. PHP_EOL. PHP_EOL . " If it is not requested by you plese inform us on digigramportal@gmail.com ");
        
     
     $result = $mailer->send($message);
     if (!$result) {
         echo "Failed to send email.";
     } 
     
 }


// Handle OTP Submission
if (isset($_POST['otp-submit-btn'])) {
    if ($_POST['otp'] == $_SESSION['otp']) {
        // Insert user data into database
        $sql = "INSERT INTO `user` (`name`,`username`, `password`, `mobile`, `email`, `image_path`, `document_path`,`document_type`) 
                VALUES ('{$_SESSION['name']}', '{$_SESSION['username']}', '{$_SESSION['password']}', '{$_SESSION['mobile']}', 
                        '{$_SESSION['email']}', '{$_SESSION['image_path']}', '{$_SESSION['document_path']}', '{$_SESSION['document_type']}')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "<script>alert('Your Request is submitted Successfully for Approval')</script>";
            unset($_SESSION['otp']);
            echo "<script>window.location.href='login.php';</script>";
            exit();
        }
    } else {
        $otpverified = false; // OTP verification failed
    }
} 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>otp verification</title>
    <!-- <link rel="stylesheet" href="../css/register.css"> -->
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Poppins';
        }

        body {
            background-image: url(assets/regi-bg1.jpg);
            /* background-position: center; */
            background-size: cover;
            /* overflow: hidden; */
            position: relative;
            overflow: hidden;
        }

        .main-container {
            height: 100vh;
            width: 100vw;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: auto;
            position: relative;

        }

        .otp-container {
            height: 100%;
            width: 100%;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .otp-container .otp-form {
            background-color: rgba(0, 0, 0, 0.338);
            height: 45%;
            width: 30%;
            padding: 150px 50px 100px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            border-radius: 10px;
            border: 2px solid rgb(255, 255, 255);
            position: relative;
            color: white;
            gap: 10px;

        }


        input {
            background-color: transparent;
            padding: 5px 20px 5px 5px;
            border: 2px solid rgba(255, 255, 255, 0.252);
            outline: none;
            border-radius: 4px;
            width: 100%;
            color: white;
            font-size: 14px;
            transition: .3s all;
           
        }

        input::-webkit-inner-spin-button{
            -webkit-appearance: none;
        }
        input::placeholder {
            color: rgba(245, 222, 179, 0.551);
            font-weight: 600;
            font-size: 14px;
        }

        input:focus{
            border:2px solid white ;
        }
        .otp-btn-box {
            width: 100%;
            display: flex;
            justify-content: space-between;

        }

        #otp-submit-btn,
        #back-btn {
            background-color: rgb(0, 102, 255);
            width: 30%;
            align-self: center;
            text-align: center;
            padding-left: 10px;
            margin: 20px 0;
        }


        #otp-submit-btn:hover,#back-btn:hover{
    transition: all .2s;
    background-color: rgba(0, 0, 0, 0.475);
    box-shadow: 0px 0px 5px white,
    0px 0px 10px rgba(255, 255, 255, 0.708);;
}


#resend{
    position:relative;
    border: none;
    color: blue;
    left: -7rem;
    cursor: pointer;
}

.otp-form h1{
    position: absolute;
    top: 10%;
    left: 50%;
    transform: translateX(-50%);
    text-align: center;
}


 #msg{
    color: rgb(255, 0, 0);
    font-weight: 500;
    font-size: 16px;
    text-shadow: 0px 0px 5px black,
    0px 0px 20px black;
    display: inline;
    position: absolute;
    top: 25%;
    /* text-align: center; */
     /* background-color: rgb(255, 0, 0); */
} 
    </style>
</head>

<body>
    <div class="main-container">
        <div class="otp-container">
            <form action="otpverification.php" method="Post" class="otp-form">
                <h1 id="otp-heading">OTP</h1>
                <?php if(isset($_POST['otp-submit-btn']) && $otpverified==false){
                    echo '<p id="msg">Invalid OTP</p>';
                }
                ?>
                <label for="otp">Enter Your OTP *</label>
                <input type="number" name="otp" id="otp" placeholder="Enter Your OTP" required>
                <div class="otp-btn-box">
                    <input type="button" name="back-btn" id="back-btn" value="⬅️BACK" onclick="window.history.back()">
                    <input type="submit" name="otp-submit-btn" value="SUBMIT" id="otp-submit-btn">
                </div>

            </form>
            <form action="otpverification.php" method="post">
                <input type="submit" name="resend" id="resend" value="resend">
            </form>
        </div>
    </div>
</body>

</html>