<?php
session_name('user_page');
session_start();
include '../database/db.php';

if(!isset($_SESSION['logged'])){
    header('location:/Digi-gram/user/login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Citizen Corner</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body{
            overflow-x: hidden;
        }
        .main-container{
            display: flex;
            width: 100vw;
            height: 100vh;
            position: relative;
            top:80px;
            background-color: rgba(255,255,255);
            /* padding-bottom: 20px; */
        }
        .sidebar {
            width:20vw;
            background: #333;
            color: white;
            padding: 15px;
            height: 100vh;
        }

        .admin-profile{
            display: flex;
            align-items: center;
            height: 70px;
            border-bottom: 2px solid white;
            margin-bottom: 20px;
        }
        .sidebar img{
            height: 50px;
            border-radius: 100%;
            /* scale: 1.; */
        }

        .sidebar h2{
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
        .sidebar .main-links {
            padding:5px 0 5px 12px;
            cursor: pointer;
            border-bottom: 2px solid orange;
            position: relative;
            
        }


        .main-links .sym1{
           position: absolute;
           right: 20px;
           font-size: 24px;   
           opacity: 1;     
           transform: translateY(-5px);  
        }
        .main-links .sym2{
            position: absolute;
            transform: translateY(-10px);  
           right: 22px;
           font-size: 28px; 
           opacity: 0;       
        }

        .main-links label{
            cursor: pointer;
            display: inline-block;
            width: 100%;
            padding: 14px;
        }
        .drop-down-container {
            display: block;
            height: 0;
            overflow-y: hidden;
            width: 100%;
            position: relative;
            /* background-color: red; */
        }
        .toggle:checked + .drop-down-container {
            padding-top: 10px;
            transition: height .5s;
            padding-left: 20px;
            height: 222px;
            /* border-bottom: 2px solid orange; */
        }

        .main-links:has(.toggle:checked) .sym1{
            transition: opacity .5s;
            opacity: 0;
        }
        .main-links:has(.toggle:checked) .sym2{
            transition: opacity .5s;
            opacity: 1;
            /* background-color: red; */
        }
        .main-links ul li{
            border-bottom: 1px solid white;
            border-left: 1px solid white;
        }
        .main-links ul li:hover {
            background: #555;
        }
        
    .sidebar input[type="submit"]{
        background-color: transparent;
         border: none; 
         color: white;
         font-size: 16px;
         font-weight:600;
        width: 100%;
        padding: 10px 0px 8px 20px;
        cursor: pointer;
        text-align: left;
    }

    .toggle{
        display: none;
    }
        .content {
            /* flex: 1; */
            width: 78vw;
            position: relative;
            height: 98vh;
            margin:auto;
        }


        .content #heading{
            border-bottom: 2px solid orange;
            font-size: 32px;
            padding: 20px 50px;
        }
        .hidden { display: none; }

        footer{
            position: absolute;
            bottom: -21vh;
            height: 20vh;
            width: 100vw;
            background-color: white;
        }
        .copyright {
  width: 100%;
  height: 100%;
  background-color: #1a1a1a;
  color: white;
  text-align: center;
  padding: o 5px;
  font-size: 15px;
  letter-spacing: 1.2px;
  margin-top: -2px;
  padding-top: 5px;
}

.copyright a {
  color: #f2f2f2;
  text-decoration: none;
  margin: 0 5px;
}
.copyright a:hover {
  text-decoration: underline;
}

.copyright p {
  margin: 2px 0 2px;
}
    </style>
</head>
<body>

    <?php include '../nav.php';?>

    <div class="main-container">
    <div class="sidebar">
        <form action="" method="get">
            <div class="admin-profile">
        <img src="husband_photo.png" alt="" ><h2>Citizen Corner</h2>
            </div>
        <ul>
        <li class="main-links"> <input type="submit" name="key" id="" value="Feedback"  ></li>
            <li class="main-links"><input type="submit" name="key" id="" value="Complaints"  ></li>
    </ul>
        </form>
    </div>
    
    <div class="content">
        <h2 id="heading"><?php if(isset($_GET['key'])) { echo $_GET['key'];} else{ echo "Dashboard";}?></h2>
       <?php
       if(isset($_GET['key'])){
       if($_GET['key']=='Feedback'){
     include 'feedback.php';
       }
       if($_GET['key']=='Complaints'){
        include 'Complaints.php';
       }
       
    }

    
       ?>

    </div>
    </div>

    <footer>
    <div class="copyright">
      <!-- footer social links container ends here -->
   <p><a href="#">Terms & Conditions</a>|
      <a href="#">Privacy Policy</a>|
      <a href="#">Copyright Policy</a>|
      <a href="#">Hyperlink Policy</a>|<a href="#">Accessibility Statement</a>|
     <a href="#">Disclaimer</a>|
      <a href="#">Help</a>
  </p>
  <p class="credites">
    Designed & Developed by <strong>Yashodip & Vijay</strong>
  </p>
   <p>Last reviewed and updated on 3rd march 2025</p>   
    </div>
    </footer>
    
    <script>
        function showTable(id) {
            document.querySelectorAll('.table-container').forEach(table => {
                table.classList.add('hidden');
            });
            document.getElementById(id).classList.remove('hidden');
        }
    </script>
</body>
</html>
