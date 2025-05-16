<?php
session_name("user_page");
session_start();
require "../database/db.php";

if (isset($_POST["register"])) {
    $_SESSION['form-data'] = $_POST;
    $name = $_SESSION['name'] = $_POST['name'];
    $username = $_SESSION['username'] = $_POST['username'];
    $email = $_SESSION['email'] = $_POST['email'];
    $mobile = $_SESSION['mobile'] = $_POST['mobile'];
    $photo = $_SESSION['photo'] = $_FILES['photo'];
    $document = $_SESSION['document'] = $_FILES['document'];
    $document_type = $_SESSION['document_type'] = $_POST['document_type'];
    $password = $_SESSION['password'] = password_hash($_POST['password'],PASSWORD_DEFAULT);

    // Define Upload Directories
    $imageDir = "uploads/images/";
    $documentDir = "uploads/documents/";

    // Create Directories if Not Exists
    if (!file_exists($imageDir)) {
        mkdir($imageDir, 0777, true);
    }
    if (!file_exists($documentDir)) {
        mkdir($documentDir, 0777, true);
    }

    // File Upload Handling for Photo
    if (!empty($_FILES["photo"]["name"])) {
        $photoType = strtolower(pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION));
        $allowedImageTypes = array("jpg", "jpeg", "png");

        if (in_array($photoType, $allowedImageTypes)) {
            // Change file name to profile_username
            $newPhotoName = "profile_" . $username . "." . $photoType;
            $photoPath = $imageDir . $newPhotoName;

            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $photoPath)) {
                $_SESSION['image_path'] = $photoPath; 
            } else {
                echo "Error uploading image!";
                exit;
            }
        } else {
            echo "<script>alert('Please upload olny png, jpeg, and jpg formate into Photo ')";
            exit;
        }
    } else {
        echo "Please upload a profile picture.";
        exit;
    }

    // File Upload Handling for Document
    if (!empty($_FILES["document"]["name"])) {
        $documentType = strtolower(pathinfo($_FILES["document"]["name"], PATHINFO_EXTENSION));
        $allowedDocTypes = array("pdf", "doc", "docx", "jpg", "png");

        if (in_array($documentType, $allowedDocTypes)) {
            // Change file name to document_username
            $newDocumentName = "document_" . $username . "." . $documentType;
            $documentPath = $documentDir . $newDocumentName;

            if (move_uploaded_file($_FILES["document"]["tmp_name"], $documentPath)) {
                $_SESSION['document_path'] = $documentPath; 
            } else {
                echo "Error uploading document!";
                exit;
            }
        } else {
            echo "Invalid document format!";
            exit;
        }
    } else {
        echo "Please upload a document.";
        exit;
    }

    // Check if the user already exists
    $sql = "SELECT * FROM `user` WHERE username='$username' OR email='$email' OR mobile='$mobile'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($row > 0) {
        $exist=true;
    } else {
        header("location:otpverification.php");
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register page</title>

    <style>
        *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins';
}

    body{
    background-image: url(assets/regi-bg5.jpeg);
    background-position: center;
    background-size: cover;
    /* overflow: hidden; */
    position: relative;
  
}

.form-container {
            width: 55%;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background:white;
            margin-top:100px;
        }
        .form-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            padding-left:40px;
        }
        .form-group {
            width: 48%; /* Adjust width for spacing */
            position: relative;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
    
        input text {
            color:black;
        }
        button{
            width:100px;
        }
        button > input {
            width:100%;
            padding: 10px;
            background: blue;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    .center-container {
       display: flex;
       justify-content: center; /* Align horizontally */
       align-items: center; 
       margin:20px 0 20px 0;/* Align vertically (optional) */ /* Full viewport height (optional) */
      }

        button:hover {
            background: darkblue;
        }
.form-container h1{
    /* position: absolute;
    top: 40px;
    left: 50%;
    transform: translateX(-50%); */
    position: relative;
    top: -5%;
    text-align: center;
    margin:0 auto;
    margin-top:20px;
    margin-bottom:30px;
    color:orange;
    /* margin-bottom:13px; */
   
    /* color: red; */
}

#msg{
    padding-left:40px;
    color:red !important;
}
input{
    /* display: block; */
    padding: 3px 20px 3px 5px ;
    /* margin: 12px 0 0 0 ; */
    background-color: transparent;
    border: 1px solid rgba(0, 0, 0,0.5);
    outline: none;
    border-radius: 4px ;
    width: 270px;
    color: black;
}

input::placeholder{
    color: grey;
}

.para{
    display: flex;
       justify-content: center; /* Align horizontally */
       align-items: center; 
}

.show-btn{
    position: relative;
    right: 50px;
    cursor: pointer;
    user-select: none;
    color: blue;
    font-weight: 550;
}
.error-message {
    display: block;
            color: red;
            font-size: 14px;
            display: none;
        }
    </style>
</head>
<body>
    <div class="form-container">
  

            
    <form action="register.php" method="post" enctype="multipart/form-data">

                <h1>Register</h1>
                

                <?php
                if(isset($_POST['register'])){
                if($exist){
                if($row['username']==$username){
        $_SESSION['username']='';
     echo '<p id="msg">username is already exist</p>';
        
     } 

     elseif($row['email']==$email){
        $_SESSION['email']='';
         echo '<p id="msg">email is already exist</p>';
         } 

         elseif($row['mobile']==$mobile){
            $_POST['mobile']= "";
             echo '<p id="msg">mobile is already exist</p>';
         }
                }
            //    else{
            //     echo '<script>alert("registration successful")</script>';
            //    }
            }
        ?>
      
            <!-- row.. -->
            <div class="form-row">
                <div class="form-group">
                <label for="usrname">Name:</label>
                <input type="text"  placeholder="Enter your Full name" name="name" id="name" required value="<?php if(isset($_POST['register'])){echo $_SESSION['name'];}else{ echo '';}?>">
                </div>
                <div class="form-group">
                <label for="usrname">UserName: </label> 
                <input type="text"  placeholder="Enter your username" name="username" id="username" required value="<?php if(isset($_POST['register'])){echo $_SESSION['username'];}else{ echo '';}?>">

                </div>
        </div>
     
       
        <div class="form-row">
            <div class="form-group">
                <label for="usrname">Email:</label>
               <input type="email"  placeholder="Enter your email" name="email" id="email" required value="<?php if(isset($_POST['register'])){echo $_SESSION['email'];}else{ echo '';}?>">
            </div>
           
           <div class="form-group">
           <label for="usrname">Mobile Number:</label>
           <input type="number"  placeholder="Enter your Mobile" name="mobile" id="mobile" required value="<?php if(isset($_POST['register'])){echo $_SESSION['mobile'];}else{ echo '';}?>">
           </div>
        </div>


        <div class="form-row">
            <div class="form-group">
            <label for="photo">Upload photo:</label>
            <input type="file" name="photo" id="photo"  accept=".jpg,.png,.jpeg" required value="">

            </div>

            <div class="form-group">
               <label for="photo">Upload Document:</label>
               <select name="document_type" id="select" class="select" required>
        <option value="" disabled selected>Select one document</option>
        <option value="aadhar">Aadhar Card</option>
        <option value="pan">PAN Card</option>
        <option value="ration">Ration Card</option>
    </select>
                <br>
                <input type="file"  accept=".pdf,.jpg,.png,.jpeg" id="document" name="document" required value="">
            </div>
        </div>



        <div class="form-row">
            <div class="form-group">
            <label for="usrname">Password</label>
            <input type="password" placeholder="Enter your password" name="password" id="new_password" required ><span id="show-btn" class="show-btn" onclick="togglePassword('new_password')">Show</span>
            </div>

            <div class="form-group">
            <label for="usrname">Confirm Password</label>
            <input type="password" placeholder="Confirm password" name="cmpass" id="confirm_password" required onkeyup="validatePassword()"><span id="show-btn" class="show-btn" onclick="togglePassword('confirm_password')">Show</span>
            <span class="error-message" id="passwordError">Passwords do not match!</span>
            </div>
        </div>
             
             <div class="center-container">
             <button><input type="submit" name="register" id="submitBtn" value="Register" ></button>   
             </div>
             <div class="para">
                <p>Already have account : <a href="./login.php" id="login">Login</a></p>
                </div>
            </form>
           
        </div>
    </div>
   
</body>
<script>

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


  document.getElementById("photo").addEventListener("change", function() {
    let file = this.files[0];
    if (file) {
        document.getElementById("file-name").innerText = "Selected File: " + file.name;
    } else {
        document.getElementById("file-name").innerText = "";
    }
});


function togglePassword(fieldId) {
        let field = document.getElementById(fieldId);
        field.type = field.type === "password" ? "text" : "password";
    }
</script>
</html>


