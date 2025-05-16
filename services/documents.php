<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document section</title>
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

    .revenue-container {
        width: 100%;
        height: 100%;
      }

    .document-heading {
      border-bottom: 3px solid orangered;
    }

    .documents-section h2 {
      text-align: left;
      /* margin-top: 10%; */
      font-size: 30px;
      padding: 42px 0 42px 100px;
      color: orangered;
      width: 100%;
    }

    .documents {
      width: 100%;
      height: 100%;
      /* display: flex;
  justify-content: space-between;
  align-items: center; */
    }

    .documents1 {
      display: flex;
      justify-content: center;
    }

    .documents2 {
      display: flex;
      justify-content: center;
    }

    .documents3 {
      display: flex;
      justify-content: center;
    }

    .certificates {
      width: 400px;
      /* height: 50px; */
      border: 1px solid rgba(0, 0, 0, 0.356);
      margin: 30px 20px 30px;
      text-align: center;
      position: relative;
      /* padding: 15px; */
    }

    .certificates a {
      display: inline-block;
      color: black;
      text-decoration: none;
      font-size: 17px;
      width: 100%;
      height: 100%;
      padding: 20px;
      /* background-color: aqua; */

    }

    .certificates:hover {
      background-color: orangered;
      color: #ffd700;
    }
  </style>
</head>

<body>
  <div class="revenue-container">
    <!-- <div class="documents-section"> -->
      <div class="document-heading">
        <h2>Documents Section</h2>
      </div>
      <div class="documents">
        <div class="documents1">
          <div id="birth-certificate" class="certificates">
            <a href="birth_certificate_form.php">Birth-Certificate</a>
          </div>
          <div id="merriage-certificate" class="certificates">
            <a href="marriage_certificate_form.php">merriage-certificate</a>
          </div>
        </div>
        
        <div class="documents2">
          <div id="death-certificate" class="certificates">
            <a href="death_certificate_form.php">Death-Certificate</a>
          </div>
          <div id="residential-certificate" class="certificates">
            <a href="residential_certificate_form.php">residential-certificate</a>
          </div>
        </div>

        <div class="documents3">
          <div id="seniar-citizen-certificate" class="certificates">
            <a href="seniar-citizen-certificate_form.php">seniar-citizen-certificate</a>
          </div>
          <div id="no-objection-certificate" class="certificates">
            <a href="NoObjection-Certificate_form.php">NoObjection-Certificate</a>
          </div>
        </div>
      </div>
    <!-- </div> -->
  </div>
</body>

</html>