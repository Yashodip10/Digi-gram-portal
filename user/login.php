<?php
session_name("user_page");
session_start();
unset($_SESSION['otp']);
require "../database/db.php";
$failed=false;
$reject=false;
$pending=false;

if(isset($_POST['login'])){
$username=$_POST['username'];
$password=$_POST['password'];

$sql="SELECT * FROM `user` WHERE (username='$username' OR email='$username' OR mobile='$username')";
$result=mysqli_Query($conn , $sql);

$row=mysqli_fetch_assoc($result);

if($row){
    if(password_verify($password,$row['password'])){
    if($row['approval']=='approved'){
    $_SESSION['logged']=true;
    $_SESSION['username']=$row['username'];
    $_SESSION['name']=$row['name'];
    $_SESSION['profile_image_path']=$row['image_path'];
    header("Location:../index.php");
}

elseif($row['approval']=='rejected'){
    
unset($_POST['username']);
    unset($_POST['password']);

    $reject=true;
}
elseif($row['approval']=='pending'){
    unset($_POST['username']);
    unset($_POST['password']);
    $pending=true;
}
    }
else{
    $failed=true;
    $_SESSION['logged'] ='0';
}
}
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login page</title>
    <!-- <link rel="stylesheet" href="../css/login.css"> -->

    <style>

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins';
    user-select: none;
}

body{
    background-image: url(assets/regi-bg1.jpg);
    background-position: center;
    background-size: cover;
}

.main-container{
    height: 100vh;
    width: 100vw;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: auto;
    position: relative;
}

.login-container{
    height: 100%;
    position: relative;
    display: flex;
    align-items: center;
    width: 26%;
}
.login-container form{
    background-color:rgba(0,0,0,0.5);
    height: 65%;
    width: 100%;
    padding:0 50px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    /* align-items: center; */
    border-radius: 10px;
    border: 2px solid rgb(255, 255, 255);
    position: relative;
    color: white;
}

.login-container .form-head{
    position: absolute;
    top: 50px;
    text-align: center;
    color:orange;
    left: 50%;
    transform: translateX(-50%);
    /* color: red; */
}

.password-conatainer{
    /* background-color: red; */
    position: relative;
}

.password-conatainer input{
    height: 100%;
}

#show-btn{
    position: absolute;
    right: 2%;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    user-select: none;
    color: blue;
    font-weight: 550;
}
input{
    /* display: block; */
    padding: 3px 20px 3px 5px ;
    /* margin: 12px 0 0 0 ; */
    background-color: transparent;
    border: 1px solid rgb(255, 255, 255);
    outline: none;
    border-radius: 4px ;
    width: 100%;
    color: white;
    margin-bottom:15px;
    height:47px;
    font-size:16px;
}

input::placeholder{
    color: wheat;
}


.login-container a{
    font-size: 15px;
    margin: 0 0 10px 0;
    padding: 5px 0px;
    /* color: red; */
    color: azure;
    text-decoration: none;
    
}

.login-container #log-in{
    color: rgb(255, 255, 255);
    background-color: rgb(0, 34, 255);
    margin: 26px 0 0 0;
    width: 50%;
    font-size: 16px;
    font-weight: 500;
    text-align: center;
    padding: 0px 20px;
    border: 2px solid rgb(255, 255, 255);
    align-self: center;
    box-shadow: 0px 0px 5px white;
    
}

.login-container #log-in:hover{
    transition: all .2s;
    background-color: rgba(0, 0, 0, 0.475);
    box-shadow: 0px 0px 5px white,
    0px 0px 20px rgba(255, 255, 255, 0.708);;
}

.login-container p{
    margin: 12px 0px 0px 0px;
    font-size: 14px;
}

#register{
    color: rgb(61, 145, 255);
    font-size: 16px;
    text-decoration: none;
    font-weight: 900;
}
.register-btn{
    font-size:20px;
    align-item:center;
}

.msg-box{
    margin-top: 80px;
}
.msg{
    margin: 0;
    padding: 0;
    color: red;
    position: relative;
    top: -10px;
}

.forgot-pass{
   margin:10px 0 0 5px;
}

    </style>
</head>
<body>
    <div class="main-container">
        <div class="login-container">
            
            <form action="login.php" method="POST">
                <h1 class="form-head">Digi-gram</h1>
<div class="msg-box">
                <?php 
                if($failed){
                    echo'<p class="msg">Wrong Username or Password</p>';
                    unset($_POST['username']);
                    unset($_POST['password']);
                }

                if($reject){
                    echo '<p class="msg">your username is blocked';
                    unset($_POST['username']);
                    unset($_POST['password']);
                }
                if($pending){
                    
    echo '<p class="msg">your username is under approval';
    unset($_POST['username']);
                    unset($_POST['password']);
                }
                
                ?>
                <!-- <label for="usrname">UserName</label> -->
</div>
                <input type="text"  placeholder="Phone number,username,email" name="username" id="username" required>
                <!-- <a href="#">forgot username</a> -->
             
                <!-- <label for="usrname">Password</label> -->
                <div class="password-conatainer">
                <input type="password" placeholder="Password" name="password" id="password" required><span id="show-btn" onclick="togglePassword('password')">Show</span>
            </div>
            <div class="forgot-pass">
            <a href="forgot_password.php" class="forgot-passibtn">Forgot Password ?</a>
        </div>
                <input type="submit" name="login" id="log-in" value="Log In">
                 <p style="margin:20px auto;">--------------------OR--------------------</p>
                 <br>
                <h4 class:"register-btn">dont have account : <a href="./register.php" id="register">register</a></h4>
                
                <!-- <script> 
                <?php
                //  if($failed){
                // echo 'alert("username or password is wrong")';
                // } 
                ?>
                </script> -->
               
                
            </form>
        </div>
    </div>
    <script>  
    function togglePassword(fieldId) {
        let field = document.getElementById(fieldId);
        field.type = field.type === "password" ? "text" : "password";
    }
    </script>
</body>
</html>