<?php
session_name("user_page");
session_start();
if(!isset($_SESSION['logged'])){
  header('location:/Digi-gram/user/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>services</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: sans-serif;
      user-select: none;
      scroll-behavior: smooth;
      border: none;
    }

    /* used for set propertiese for body */
    body {
      overflow-x: hidden;
      width: 100vw;
      background-color: #ffffffff;
    }

    .main-container {
      width: 100vw;
      height: 100vh;
      background-color: whitesmoke;
      position: relative;
      top: 67px;
      display: flex;
      justify-content: space-between;
      margin-bottom: 0px;
      /* background-color:red; */
    }

    .documents-section {
      width: 80%;
      height: 100%;
      background-color: white;
      margin: 0 auto;
      position: relative;
      overflow-y: hidden;
      /* background-color: red; */
    }

    .profile-section {
      width: 20%;
      height: 100%;
      background-color:#000f1f;
      border-bottom: 2px solid white;
      /* border-right: 2px solid rgb(85, 255, 0); */
    }

    .profile {
      width: 100%;
    }

    .profile-s1 {
      height: 120px;
      border-bottom: 2px solid white;
      padding: 20px;
    }

    .profile-s1 h2 {
      text-align: center;
      margin-top: 30px;
    }

    .profile-s1 h2 a {
      color: white;
      text-decoration: none;
    }

    .profile-option {
      margin-top: 20px;
    }

    .profile-option h3 {
      margin-top: 15px;
      margin-left: 20px;
    }

    .profile-option h3 a {
      text-decoration: none;
      color: white;
    }

    .services {
      width: 50px;
      height: auto;
    }

    .services input {
      font-size: 21px;
      padding: 5px;
      background-color: transparent;
      color: white;
      cursor: pointer;
      margin-bottom: 10px;
    }

    .dashbord input {
      font-size: 21px;
      padding: 5px;
      background-color: transparent;
      color: white;
      cursor: pointer;
    }

    .services input:hover {
      color: orange;
    }

    .dashbord input :hover {
      color: orange;
    }

    .profile_container{
      display: flex;
      justify-content: left;
      align-items: baseline;
    }

    /* _______________footer______________ */
    footer {
      background-color: #000f1f;
      display: flex;
      justify-content: space-between;
      height: 62vh;
      text-align: left;
      position: relative;
      padding: 20px 80px;
      border-top: 3px solid rgba(0, 0, 0, 0.533);
      overflow-x: hidden;
      width: 100%;
      
    }

    .copyright {
      background-color: #000f1f;
    }

    .f-info {
      display: flex;
      flex-direction: column;
      color: #ffffffff;
      padding: 25px 0;
      font-weight: 500;
      margin: 0 auto;
      width: 40%;
      text-align: left;
      font-size: 16px;
      font-family: "proximaNovaFont", "proximaNovaFont Fallback";
    }

    .f-info .f-contact-head {
      padding: 0 0 20px 0;
      font-size: 24px;
      font-weight: 700;
    }

    .f-info .f-h2 {
      font-size: 24px;
      font-weight: 600;
      letter-spacing: 1.2px;
    }

    footer .f-info .f-line {
      width: 100px;
      height: 5px;
      color: black;
    }

    .f-info .f-slog {
      font-size: 12px;
      font-weight: 600;
    }

    .f-info .f-addrs {
      font-size: 15px;
      font-weight: 400;
      padding: 10px 0;
      line-height: 1.4rem;
      letter-spacing: 1px;
    }

    .f-info .f-con-mob a {
      color: #ffffff;
      letter-spacing: 1px;
    }

    .f-info .f-con-email a {
      color: #ffffff;
      letter-spacing: 1px;
    }

    .f-info .f-con-email {
      margin-bottom: 10px;
    }

    .f-info .f-con-mob {
      margin-bottom: 10px;
    }

    .f-info .f-day {
      font-size: 15px;
      font-weight: 400;
      letter-spacing: 1px;
      margin-bottom: 10px;
    }

    .f-info .f-time {
      font-size: 15px;
      font-weight: 400;
      letter-spacing: 1px;
      margin-bottom: 10;
    }

    .f-links {
      display: flex;
      flex-direction: column;
      color: #ffffff;
      padding: 25px 0;
      font-size: 12px;
      font-weight: 500;
      width: 20%;
      margin: 0 auto;
    }

    .f-links .f-links-head {
      padding: 0 0 20px 0;
      font-size: 24px;
      font-weight: 700;
    }

    .f-links span {
      padding: 3px 0 3px 35px;
      margin: 0 0 6px 0;
    }

    .f-links span a {
      text-decoration: none;
      font-size: 16px;
      font-weight: 500;
      color: white;
      padding: 10px 10px 10px 0;
    }

    .f-links a:hover {
      /* color: rgb(255, 255, 255); */
      /* text-shadow: 0px 0px 2px rgb(255, 183, 0), 0px 0px 12px rgb(255, 183, 0); */
      color: #ffd700;
      opacity: 1;
    }

    .f-social {
      display: flex;
      flex-direction: column;
      color: rgb(0, 0, 0);
      padding: 25px 0;
      font-size: 12px;
      font-weight: 500;
      width: 20%;
      margin: 0 auto;
    }

    .f-social .f-join-head {
      padding: 0 0 20px 0;
      font-size: 24px;
      font-weight: 700;
      color: white;
    }

    .f-social span {
      padding: 3px 0 3px 35px;
      margin-bottom: 6px;
    }

    .f-social span a {
      text-decoration: none;
      font-size: 16px;
      font-weight: 500;
      color: #ffffff;
      padding: 0 10px 0 10px;
    }

    .f-social a:hover {
      color: rgb(255, 255, 255);
      color: rgba(255, 183, 0);
      opacity: 1;
    }

    .copyright {
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
  <!-- navbar starting-->
    <!-- navbar conatiner start here it contains logo and nav links -->
<?php include '../nav.php'; ?>
  <!-- navabar end -->
  <div class="main-container">
    <div class="profile-section">
      <div class="profile">
        <div class="profile-s1">
          <h2 class="profile_container"><a href="">user : <?php echo $username ;?></a></h2>
        </div>
        <div class="profile-option" id="services">
          <h3>
            <!-- <a href="../forms or tables/documents.html">Services list</a>
                -->
            <form action="" method="GET">
              <div class="services">
                <input type="submit" name="key" id="" value="Services">
              </div>
              <div class="dashbord">
                <input type="submit" name="key" id="" value="Dashboard">
              </div>
            </form>
          </h3>
        </div>
      </div>
    </div>
    <div class="documents-section">
      <?php
      if (isset($_GET['key'])) {
        if ($_GET['key'] == 'Services') {
          include 'documents.php';
        } elseif ($_GET['key'] == 'Dashboard') {
          include 'dashboard.php';
        }
      }
      ?>
    </div>
  </div>
  <!--  -->
  <!-- footer container ends here -->

  <div class="copyright">
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
</body>

</html>