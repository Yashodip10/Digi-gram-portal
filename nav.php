<?php
// session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        

.navbar {
  display: flex;
  justify-content: space-between;
  align-items: center !important;
  height: 12vh;
  position: fixed;
  top: 0;
  padding: 0 20px 0 50px;
  background-color: #000f1f;
  backdrop-filter: blur(2px);
  width: 100%;
  z-index: 5;
  border-bottom: 2px solid rgb(149, 255, 0);
}

.navbar .logo h1 {
  color: white;
  font-weight: 700;
  text-shadow: 0px 0px 12px rgba(255, 253, 0, 1);
  font-size: 24px;
}

/* .nav-links{
  padding: 25px 50px 25px 100px;
  background-color: rgba(27, 27, 27, 0.271);
  border-radius: 0px 0px 0px 500px;
  backdrop-filter: blur(5px);
} */
.nav-links ul {
  display: flex;
  list-style: none;
  align-items: center;
  /* background-color: red; */
}
.nav-links ul li a {
  text-decoration: none;
  color: white;
  text-decoration: none;
  padding: 10px 14px;
  font-weight: 550;
  font-size: 17px;
}

.nav-links ul li a:hover {
  color: rgb(255, 183, 0);
  text-shadow: 0px 0px 2px rgb(0, 0, 0);
}


/* Profile container styles */
.profile-container {
  cursor: pointer;
}

.profile-container img {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  border: 2px solid white;
}

/* Dropdown Menu */
.dropdown-menu {
  display: none;
  position: absolute;
  top: 85px;
  right: 30px;
  background-color:rgba(0, 0, 0, 0.67);
  border-radius: 5px;
  box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
  min-width: 170px;
  z-index: 1000;
  padding-bottom: 5px;
  /* color: black !important; */
  overflow-y: hidden;
}

.dropdown-menu .profile-links {
  display: block;
  padding: 10px;
  text-decoration: none;
  color: rgb(255, 255, 255) !important;
  /* border-radius: 5px; */
}

.dropdown-menu .profile-links:hover {
  color: orange !important;
  background-color: #787777ce;
  text-shadow: none;
  border-bottom: 1px solid rgb(255, 255, 255) !important;
}

.show {
  display: block;
}

    </style>
</head>
<body>
<nav class="navbar">
            <div class="logo"><h1>I ❤️ LON PIRACHE</h1></div>
            <div class="nav-links">
                <ul>
                    <li><a href="/Digi-gram/index.php#main"><i class="fa-solid fa-house"></i></i> Home</a></li>
                    <li><a href="/Digi-gram/index.php#about"> <i class="fa-solid fa-circle-info"></i> About</a></li>
                    <li><a href="/Digi-gram/index.php#gallary"> <i class="fa-solid fa-image"></i> Gallery</a></li>
                    <li><a href="/Digi-gram/notice/notice.php"> <i class="fa-solid fa-bullhorn"></i> Notice</a></li>
                    <li><a href="/Digi-gram/services/services.php?key=Services"><i class="fa-solid fa-desktop"></i> Services</a></li>
                    <!-- <li><a href="/Digi-gram/reports/reports.php"><i class="fa-solid fa-briefcase"></i> Reports</a></li> -->
                    <li><a href="/Digi-gram/citizen-corner/citizen-corner.php"><i class="fa-solid fa-users"> </i> Citizen Corner</a></li>
                    <li>
                      <?php if(isset($_SESSION['logged'])){
                        $username=$_SESSION['name'];
                        $profile_pic=$_SESSION['profile_image_path'];
                        echo "
                        <div class='profile-container' onclick='toggleDropdown()'>
                        <img src='/Digi-gram/user/$profile_pic' alt='Profile'>
                      <div class='dropdown-menu' id='dropdownMenu'>
                          <a href='/Digi-gram/user/dashboard.php' class='profile-links' style='pointer-events: none;''><i class='fa-solid fa-user'> </i> $username</a>
                          <a href='/Digi-gram/user/change_password.php' class='profile-links'><i class='fa-solid fa-gears'> </i> Change Password</a>
                          <a href='/Digi-gram/user/logout.php' class='profile-links'><i class='fa-solid fa-right-from-bracket'> </i> Logout</a>
                      </div>
                  </div>
                  ";}
                  else{
                    echo "<a href='/Digi-gram/user/login.php'>Login</a>";
                  }
                   ?></li>
                </ul>
            </div>
           </nav>
           <script>
             function toggleDropdown() {
      document.getElementById("dropdownMenu").classList.toggle("show");
  }
  </script>
</body>
</html>