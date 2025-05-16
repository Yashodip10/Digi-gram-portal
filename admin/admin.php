<?php
include '../database/db.php';
session_name("admin_page");
session_start();
if(!isset($_SESSION['admin'])){
    echo "<script>
window.location.href = 'login.php';
</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
            user-select: none;
        }

        body{
            overflow-x: hidden;
        }
        .main-container{
            display: flex;
            width: 100vw;
            height: 100vh;
            position: relative;
            background-color: rgba(255,255,255);
            /* padding-bottom: 20px; */
        }
        .sidebar {
            width:20vw;
            background: #333;
            color: white;
            padding: 15px;
            height: 100vh;
            overflow-y: scroll;
            padding-top: 30px;
        }

        .admin-profile{
            display: flex;
            align-items: center;
            height: 60px;
            border-bottom: 2px solid white;
            margin-bottom: 20px;
            padding: 33px 0;
        }
        .sidebar img{
            height: 50px;
            border-radius: 100%;
            margin: 0 20px 20px 20px;
            
        }

        .sidebar h2{
            text-align: center;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
        .sidebar .main-links {
            padding:0 0 0 12px;
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
            padding: 12px;
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
            height: 260px;
            /* border-bottom: 2px solid orange; */
        }

        .toggle:checked +  .users{
            height: 140px;
        }
        .toggle:checked +  .notice{
            height: 180px;
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
        width: 100%;
        padding: 8px 0px 8px 20px;
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
        }


        .content #heading{
            border-bottom: 2px solid orange;
            font-size: 32px;
            padding: 30px 50px;
            position: relative;
        }

        .btns{
            display: inline-block;
            padding:20px 20px 0 20px !important;
           font-weight: 700;
           position: absolute;
           right: 20px;
        }
        .btns a{
           font-size: 18px !important;
           text-decoration: none;
           
        }
        .hidden { display: none; }

       .copyright-container {
      width: 100%;
      height: 15vh;
      background-color: #000f1f;
      color: white;
      text-align: center;
      padding: 10px;
      font-size: 15px;
      letter-spacing: 1.2px;
      margin-top: 2px;
      /* padding-top: 5px; */
      position: absolute;
      bottom: -15vh;
      left: 0;
      border-top: 2px solid rgb(255, 225, 0);
    }

    .copyright-container a {
      color: #f2f2f2;
      text-decoration: none;
      margin: 0 5px;
    }

    .copyright-container a:hover {
      text-decoration: underline;
    }

    .copyright-container p {
      margin: 2px 0 2px;
    }
    </style>
</head>
<body>
    <div class="main-container">
    <div class="sidebar">
        <form action="" method="get">
            <div class="admin-profile">
        <img src="assets/profileimg.jpeg" alt="" > <h2> ADMIN</h2>
        
            </div>
        <ul>
        <li class="main-links"> 
            <label  for="toggle1">Documents Pendings <span class="sym1">+</span> <span class="sym2">-</span></label>
        <input type="checkbox" id="toggle1" class="toggle">
        <ul class="drop-down-container">
            <li><input type="submit" name="key" id="" value="Marriage Pendings"  ></li>
            <li><input type="submit" name="key" id="" value="Birth Pendings"  ></li>
            <li><input type="submit" name="key" id="" value="Death Pendings"  ></li>
            <li><input type="submit" name="key" id="" value="Residential Pendings"  ></li>
            <li><input type="submit" name="key" id="" value="No objection Pendings"  ></li>
            <li><input type="submit" name="key" id="" value="Senior Citizen Pendings"  ></li>
            </ul>
            </li>

        <li class="main-links"><label  for="toggle2">Documents Approved <span class="sym1">+</span> <span class="sym2">-</span></label>
        <input type="checkbox" id="toggle2" class="toggle">
            <ul class="about-links drop-down-container">
            <li><input type="submit" name="key" id="" value="Marriage Approved"  ></li>
            <li><input type="submit" name="key" id="" value="Birth Approved"  ></li>
            <li><input type="submit" name="key" id="" value="Death Approved"  ></li>
            <li><input type="submit" name="key" id="" value="Residential Approved"  ></li>
            <li><input type="submit" name="key" id="" value="No objection Approved"  ></li>
            <li><input type="submit" name="key" id="" value="Senior Citizen Approved"  ></li>
            </ul>
            </li>
        <li class="main-links"><label  for="toggle3">Documents Rejected <span class="sym1">+</span> <span class="sym2">-</span></label>
        <input type="checkbox" id="toggle3" class="toggle">
            <ul class="about-links drop-down-container">
            <li><input type="submit" name="key" id="" value="Marriage Rejected"  ></li>
            <li><input type="submit" name="key" id="" value="Birth Rejected"  ></li>
            <li><input type="submit" name="key" id="" value="Death Rejected"  ></li>
            <li><input type="submit" name="key" id="" value="Residential Rejected"  ></li>
            <li><input type="submit" name="key" id="" value="No objection Rejected"  ></li>
            <li><input type="submit" name="key" id="" value="Senior Citizen Rejected"  ></li>
            </ul>
            </li>

            <li class="main-links"> 
            <label  for="toggle4">Manage Users <span class="sym1">+</span> <span class="sym2">-</span></label>
        <input type="checkbox" id="toggle4" class="toggle">
        <ul class="about-links drop-down-container users" >
            <li><input type="submit" name="key" id="" value="Pending Requests"  ></li>
            <li><input type="submit" name="key" id="" value="Approved Requests"  ></li>
            <li><input type="submit" name="key" id="" value="Rejected Requests"  ></li>
            </ul>
            </li>
            <li class="main-links"> 
            <label  for="toggle5">Manage Notices <span class="sym1">+</span> <span class="sym2">-</span></label>
        <input type="checkbox" id="toggle5" class="toggle">
        <ul class="about-links drop-down-container notice" >
            <li><input type="submit" name="key" id="" value="View Notices"  ></li>
            <li><input type="submit" name="key" id="" value="Add Notices"  ></li>
            <li><input type="submit" name="key" id="" value="Update Notices"  ></li>
            <li><input type="submit" name="key" id="" value="Delete Notices"  ></li>
            </ul>
            </li>
        </ul>
        </form>
    </div>
    
    <div class="content">
        <h2 id="heading"><?php if(isset($_GET['key'])) { echo $_GET['key'];} else{ echo "Dashboard";}?> <div class="btns"><a href="http://localhost/digi-gram/admin/admin.php?key=Dashboard" id="home-btn">Home</a> <a href="http://localhost/digi-gram/admin/admin.php?key=logout" id="logout-btn">Logout</a></div></h2>
        
       <?php
       if(isset($_GET['key'])){

        if($_GET['key']=='logout'){
            echo "<script>window.location.href='login.php';</script>";

              }


        if($_GET['key']=='Dashboard'){

            include 'dashboard.php';
              }


        // cerificates
       if($_GET['key']=='Marriage Pendings'){

     include '../certificate/marriage.php';
       }
       if($_GET['key']=='Birth Pendings'){
     include '../certificate/birth.php';
       }
       if($_GET['key']=='Death Pendings'){
     include '../certificate/death.php';
       }
       if($_GET['key']=='Residential Pendings'){
     include '../certificate/residential.php';
       }
       if($_GET['key']=='No objection Pendings'){
     include '../certificate/no-objection.php';
       }
       if($_GET['key']=='Senior Citizen Pendings'){
     include '../certificate/senior-citizen.php';
       }
       
       
       //    approved

       if($_GET['key']=='Marriage Approved'){

        include '../certificate/marriage.php';
          }
          if($_GET['key']=='Birth Approved'){
        include '../certificate/birth.php';
          }
          if($_GET['key']=='Death Approved'){
        include '../certificate/death.php';
          }
          if($_GET['key']=='Residential Approved'){
            include '../certificate/residential.php';
          }
          if($_GET['key']=='No objection Approved'){
        include '../certificate/no-objection.php';
          }
          
          if($_GET['key']=='Senior Citizen Approved'){
            include '../certificate/senior-citizen.php';
              }
          //   rejected
          
          if($_GET['key']=='Marriage Rejected'){
            
        include '../certificate/marriage.php';
          }
          if($_GET['key']=='Birth Rejected'){
        include '../certificate/birth.php';
      }
          if($_GET['key']=='Death Rejected'){
        include '../certificate/death.php';
          }
          if($_GET['key']=='Residential Rejected'){
        include '../certificate/residential.php';
          }

          if($_GET['key']=='No objection Rejected'){
        include '../certificate/no-objection.php';
          }

          if($_GET['key']=='Senior Citizen Rejected'){
            include '../certificate/senior-citizen.php';
              }

           //    user_ids
       if($_GET['key']=='Pending Requests'){
        include 'manage_user.php';
          }
       if($_GET['key']=='Approved Requests'){
        include 'manage_user.php';
          }
       if($_GET['key']=='Rejected Requests'){
        include 'manage_user.php';
          }

        //   notices

        if($_GET['key']=='View Notices'){
            include '../notice/view_notice.php';
              }
        if($_GET['key']=='Add Notices'){
            include '../notice/add_notice.php';
              }
           if($_GET['key']=='Update Notices'){
            include '../notice/update_notice.php';
              }
           if($_GET['key']=='Delete Notices'){
            include '../notice/Delete_notice.php';
              }

    }

    
       ?>

    </div>
    </div>

    <div class="copyright-container">
    <!-- footer social links container ends here -->
    <p>
      <a href="#">Terms & Conditions</a>| <a href="#">Privacy Policy</a>|
      <a href="#">Copyright Policy</a>| <a href="#">Hyperlink Policy</a>|<a href="#">Accessibility Statement</a>|
      <a href="#">Disclaimer</a>|
      <a href="#">Help</a>
    </p>
    <p class="credites">
      Designed & Developed by <strong>Yashodip & Vijay</strong>
    </p>
    <p>Last reviewed and updated on 3rd march 2025</p>
  </div>
    
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
