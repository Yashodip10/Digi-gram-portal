<?php
session_name("user_page");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GramPanchayat Lon Pirache</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<style>
  
  /* universal selector which is used for set common propertiese to all elements */
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
  position: relative;
  margin: 0;
  padding: 0;
}
.main-container {
  width: 100vw;
  height: 100vh;
  position: relative;
  margin: 0;
  padding: 0;
}

/* Show dropdown on click */
.show {
  display: block;
}
.slide-show {
  width: 100vw;
  height: 100vh;
  position: relative;
  top: 76px;
  left: 0;
  /* background-color: red; */
  /* background-image: linear-gradient(to bottom,rgba(0,0, 0),rgba(0,0,0)); */
}
.mySlides {
  /* display: none; */
  /* opacity: 0; */
  width: 100%;
  height: 94vh;
  transition: all 1s ease-in-out;
  position: absolute;
  /* margin: auto; */
  left: 0;
}
.button-left {
  position: absolute;
  top: 50%;
  left: 10px;
  font-size: 20px;
  font-weight: 600;
  padding: 5px 15px 5px 8px;
  background-color: rgba(0, 0, 0, 0.712);
  color: white;
  outline: none;
  border: none;
  transform: translateY(-50%);
}

.button-right {
  position: absolute;
  top: 50%;
  right: 30px;
  font-size: 20px;
  font-weight: 600;
  padding: 5px 8px 5px 15px;
  background-color: rgba(0, 0, 0, 0.712);
  color: white;
  outline: none;
  border: none;

  transform: translateY(-50%);
}
.firstpage {
  position: relative;
  width: 100%;
  height: auto;
}
.header-content {
  position: absolute;
  top: 50%;
  left: 50%;
  margin-right: 20px;
  transform: translate(-50%, -50%);
  color: rgb(255, 255, 255);
  text-align: center;
  background-color: #000;
  opacity: 1;
  padding: 10px 20px;
  backdrop-filter: blur(5px);
  text-align: center;
  width: 80%;
  height: 25%;
  border-radius: 20px;
  transform: translate(-50%,-50%);
}
.header-content .wlc {
  font-size: 34px;
  font-weight: 750;
}
.header-content .wlc2 {
  font-size: 17px;
  font-weight: 500;
  font-family: proximaNovaFont, "proximaNovaFont Fallback";
  letter-spacing: 0.8px;
}
.header-content p .digi-gram {
  font-weight: 900;
  color: #000;
}

.header-content p .digi-gram a {
  text-decoration: none;
}

.header-content p .digi-gram a:hover {
  text-decoration: underline;
}

.header-content p .digi-gram a:active {
  color: #000;
}
.slog {
  padding: 25px 0 0 0;
  font-size: 16px;
  font-weight: 400;
  font-style: italic;
}
/* used for set navbar propertiese like width and other propertiese */

.office-heading {
  margin: 0 auto;
}

.office-heading :hover {
  color: rgba(255, 183, 0, 1);
}
.colored-line {
  width: 100px;
  height: 5px;
  display: flex;
  justify-content: center;
  margin: 0 auto;
}

.colored-line .left {
  width: 50%;
  background-color: rgb(255, 6, 151);
}
.colored-line .right {
  width: 50%;
  background-color: black;
}
#office-heading {
  font-family: Lora, "Lora Fallback";
  font-size: 28px;
  letter-spacing: 0.03em;
  text-align: center;
  line-height: 52px;
  font-weight: 300;
}

.smart-village-office {
  background-color: #ffffff;
  padding:90px 50px;
  width: 100vw;
}
.smart-village-content {
  width: 90%;
  background-color: #0000;
  display: flex;
  position: relative;
  justify-content: space-between;
  margin:0 auto;
  align-items: center;
  
  /* background-color: red; */
/* background-color: red; */
}

.office-para {
  width: 60%;
  font-size: 16px;
  letter-spacing: 1px;
  font-family: "proximaNovaFont", "proximaNovaFont Fallback";
  font-weight: 700px;
  position: relative;
  letter-spacing: 0.5px;
  text-align: justify;
  /* padding: 20px; */
  padding-left: 50px;
  color: rgba(0, 0, 0, 1);
  font-family: "proximaNovaFont", "proximaNovaFont Fallback";
}

.office-img-container {
  width: 40%;
  display: flex;
  flex-wrap: wrap;
  margin-top: 45px;
  padding-left: 6%;
  position: relative;
  /* top: -10%; */
}
#info-icon {
  font-size: 32px;
  vertical-align: middle;
}

.office-img {
  width: 45%;
  height: 170px;
  margin: 10px 10px 10px 10px;
  padding: 5px;
  border-radius: 5px;
  position: relative;
}
.off-img {
  width: 100%;
  height: 100%;
  border: 1px solid rgba(0, 0, 0, 0.226);
  padding: 5px;
  border-radius: 5px;
}
/* .office-img:hover{
  border-color: rgb(39, 39, 246);
} */

.off-img:hover {
  border-color: rgb(0, 0, 0);
}
.off-para {
  padding: 10px 0;
}

.village-history {
  background-color:rgb(216, 244, 206);
  padding: 50px;
  width: 100vw;
  /* max-width: 100%; */
  overflow: hidden;
  position: relative;
  
  /* background-color: red; */
}
.history-heading h2 {
  text-align: center;
  margin-top: 0px;
  padding: 20px 0 0px 0;
}

.history-heading{
  padding-top: 26px;
}
.history-heading h2 .about-head1 {
  margin:0 auto;
  font-family: Lora, "Lora Fallback";
  font-size: 32px;
  letter-spacing: 0.03em;
  line-height: 52px;
  font-weight: 200;
  text-transform: capitalize;
  text-align: center;
}
.history-heading :hover {
  color: rgba(255, 183, 0, 1);
}
/* .history-heading .about-head1 {
  background-color: white;
  border: 2px solid black;
  border-right: none;
  padding: 8px 2px 8px 20px;
  color: orange;
}

.history-heading .about-head2 {
  background-color: orange;
  color: white;
  border: 2px solid black;
  border-left: none;
  padding: 8px 20px;
} */

.history-content {
  width: 90%;
  background-color:rgba(255, 255, 255, 0);
  display: flex;
  position: relative;
  justify-content: space-between;
  margin: auto;
  align-items: center;

}

.history-content .history-imges-container {
  width: 40%;
  height: auto;
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  padding-left: 20px;
}

.hist-img {
  width: 40%;
  height: 170px;
  margin: 20px 10px 10px 10px;
  padding: 5px;
  border-radius: 5px;
  position: relative;
  display: flex;
}
.hist-img2 {
  width: 40%;
  height: 170px;
  margin: 10px 10px 10px 10px;
  padding: 5px;
  border-radius: 5px;
  position: relative;
  display: flex;
}

.hist-img-class {
  width: 100%;
  height: 100%;
  border: 1px solid rgba(0, 0, 0, 0.226);
  padding: 5px;
  border-radius: 5px;
}

.hist-img-class :hover {
  border-color: rgb(0, 0, 0);
}
.history-content .history-text-content {
  width: 60%;
  padding: 0 20px;
  font-size: 16px;
  font-weight: 700px;
  /* background-color: aqua; */
  /* position: absolute; */
  /* top: 0; */
  /* left: 40%; */
  letter-spacing: 0.5px;
  text-align: justify;
  padding: 20px;
  color: rgba(0, 0, 0, 1);
  font-family: proximaNovaFont, "proximaNovaFont Fallback";
}

.history-para {
  margin-bottom: 15px;
  line-height: 1.5;
}
/*
*/
.geography {
  background-color: #ffffff;
  padding:90px 50px;
  width: 100vw;
  margin-top: 10px;
}
.geo-head {
  margin-bottom: 10px;
  margin-left: auto;
  text-align: center;
}
.geo-head:hover {
  color: rgba(255, 183, 0, 1);
}

.geography h2 {
  text-align: center;
  margin-top: 10px;
  padding: 20px 0 10px 0;
}

.geo-head h2 .about-head1 {
  margin:0 auto;
  font-family: Lora, "Lora Fallback";
  font-size: 32px;
  letter-spacing: 0.03em;
  line-height: 52px;
  font-weight: 200;
  text-transform: capitalize;
  text-align: center;
}

.geography-container {
  width: 90%;
  background-color: #ffffff00;
  display: flex;
  position: relative;
  justify-content: space-between;
  margin: auto;
  align-items: center;
}
.geography-text {
  width: 60%;
  height: 100%;
  padding: 0 20px;
  font-size: 16px;
  font-weight: 700px;
  /* background-color: aqua; */
  /* position: absolute; */
  /* top: 0;
  left: 40%; */
  letter-spacing: 0.5px;
  text-align: justify;
  padding: 20px;
  padding-left: 60px;
  color: rgba(0, 0, 0, 1);
  font-family: proximaNovaFont, "proximaNovaFont Fallback";
}
.geography-map {
  width: 40%;
  padding-left: 80px;
  margin-top: 0px;
}

.geography-text p {
  margin-bottom: 10px;
}
.geography-text ul li {
  list-style-type: disc;
}
.members {
  /* padding: 60px; */
  /* margin: 10px 0px 0px 20px; */
  width: 100vw;
  height: 700px;
  /* background-color:rgb(216, 244, 206); */
  border: none;
  position: relative;
  /* margin: 0;
  padding: 0;
  box-sizing: border-box; */
}

.members-head h2 {
  margin-top: 50px;
  padding: 20px 0 10px 0;
  text-align: center;
}

.members-head:hover {
  color: rgba(255, 183, 0, 1);
}

.members-head h2 .about-head1 {
  margin: 0px auto;
  font-family: Lora, "Lora Fallback";
  font-size: 32px;
  letter-spacing: 0.03em;
  line-height: 52px;
  font-weight: 200;
  text-transform: capitalize;
  text-align: center;
}


.members .members-content {
  width: 85%;
  height: auto;
  display: flex;
  padding: 40px 20px;
  align-items: center;
  justify-content: center;
  font-size: 16px;
  font-weight: 500;
  position: relative;
  box-shadow: 8px 8px rba(0, 0, 0);
  margin: 30px auto;
  /* box-shadow: 1px 0 black; */
  background-color:rgba(224, 224, 223, 0.83);
  border-right: 0px;
  overflow: hidden;
  /* margin-right: 60px; */
}

.mem-card {
  width: 23%;
  text-align: center;
  color: rgb(0, 0, 0);
  margin: 10px 20px 10px 20px;
  border-radius: 12px;
  padding: 40px 0px;
  box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  background-color: #ffffff;
  font-family: proximaNovaFont, "proximaNovaFont Fallback";
}

.mem-card:hover {
  transform: translate((-10px));
  box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.4);
}
.mem-card img {
  border-radius: 50%;
  width: 50%;
  margin: 0 0 20px 0;
  border: 3px solid white;
  /* box-shadow: 0px 0px 3px rgb(255, 89, 0), 0px 0px 8px rgb(255, 85, 0),
    0px 0px 15px rgb(255, 85, 0); */
  pointer-events: none;
}

.mem-card img:hover {
  transition: all 0.2s;
  scale: 1.02;
}

.mem-card .mem-name {
  padding: 5px 0;
  font-weight: 700;
  font-size: 20px;
}

.mem-card .mem-post {
  padding: 3px 0;
  font-weight: 600;
  font-size: 16px;
  color: #f57251;
}
.mem-card .mem-mob a {
  padding: 5px 0;
  font-size: 16px;
  font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
  font-weight: 400;
  margin-top: 8px;
}

.mem-card .mem-email a {
  font-size: 14px;
  margin-top: 8px;
}

/* .members #mem-see-more {
  position: absolute;
  bottom: 10px;
  right: 30px;
} */

.about-us-content a {
  color: blueviolet;
  font-size: 20px;
  /* text-decoration: none; */
}
/*-------------- gallary css start here ----------------*/

.container h2 {
  text-align: center;
  margin: 0 auto;
  text-align: center;
}

.container h2 .gallary-head {
  margin: 0px;
  font-family: Lora, "Lora Fallback";
  font-size: 32px;
  letter-spacing: 0.03em;
  line-height: 52px;
  font-weight: 200;
  text-transform: capitalize;
  text-align: center;
}

.gallary-head-div:hover {
  color: rgba(255, 183, 0, 1);
}
.container {
  width: 80%;
  margin: auto;
  height: 90%;
  position: relative;
  overflow: hidden;
  border-radius: 20px;
}

.gallery {
  display: flex;
  width: 100%;
  height: auto;
  padding: 0px 0 50px 0;
  transition: transform 0.5s ease-in-out;
  background-color:rgb(255, 255, 255);
}
.gallary {
  background-color:rgb(216, 244, 206);
  width: 100%;
  height: 100vh;
  padding-top: 100px;
}
.photo-card {
  flex: 0 0 33.33%;
  text-align: center;
  padding: 10px;
  height: 500px;
  border-radius: 20px;
}

.photo-card img {
  width: 100%;
  height: auto;
  border-radius: 10px;
}

.next {
  position: absolute;
  top: 65%;
  right: 20px;
  transform: translateY(-50%);
  background-color: rgba(0, 0, 0, 0.5);
  color: white;
  border: none;
  padding: 10px;
  cursor: pointer;
  font-size: 20px;
  z-index: 10;
} 

.prev {
  position: absolute;
  top: 65%;
  left: 20px;
  transform: translateY(-50%);
  background-color: rgba(0, 0, 0, 0.5);
  color: white;
  border: none;
  padding: 10px;
  cursor: pointer;
  font-size: 20px;
  z-index: 10;
}

/*-------------- gallary css ends here ----------------*/

/* .video-gallary {
  background-color: #faf7f0;
  margin: 80px auto;
  box-shadow: 0px 0px 2px rgb(0, 0, 0), 9px 9px 8px rgba(0, 0, 0, 0.499);
  border-radius: 9px;
  padding: 50px;
  padding-bottom: 150px;
  position: relative;
  overflow: hidden;
  width: 100%;
  height: 600px;
} */

/* }

.video-gallary .gallary-head1 {
  font-size: 30px;
  font-weight: 300;
  border: 2px solid black;
  border-bottom: 4px solid black;
  background-color: white;
  color: orange;
  border-right: none;
  padding: 5px 5px 5px 30px;
}

.video-gallary .gallary-head2 {
  font-size: 30px;
  border: 2px solid black;
  border-bottom: 4px solid black;
  background-color: orange;
  color: white;
  border-left: none;
  padding: 5px 30px 5px 5px;
} */
.video-gallary {
  width: 100%;
  height: auto;
  margin: 0 auto;
  background-color: white;
}
.video-gallary h2 {
  text-align: center;
  margin: 0 auto;
  margin-bottom: 4px;
}

.video-gallary h2 .gallary-head1 {
  margin: 0px;
  font-family: Lora, "Lora Fallback";
  font-size: 32px;
  letter-spacing: 0.03em;
  line-height: 52px;
  font-weight: 200;
  text-transform: capitalize;
}
.video-head:hover {
  color: rgba(255, 183, 0, 1);
}
.video-container {
  width: 70%;
  margin: 40px auto;
  display: flex;
  justify-content: space-between;
  max-height: 100%;
  padding: 30px 0;
  display: flex;
  justify-content: center;
  align-items: center;
  /* background-color: red; */
}

#video-container video {
  border-radius: 15px;
  max-width: 60%;
  object-fit: cover;
  margin: 0 auto;
}

.video-container video:hover {
  box-shadow: 0px 0px 3px rgb(255, 89, 0), 0px 0px 6px rgb(255, 89, 0),
    0px 0px 10px rgb(255, 85, 0);
}

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
  height: 90px;
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

/* Services.html Styling from here */

.revenue-container {
  width: 100%;
  height: 100vh;
  background-color: whitesmoke;
  position: relative;
  top: 75px;
  display: flex;
  justify-content: space-between;
  margin-bottom: 80px;
}

.profile-section {
  width: 20%;
  height: 98%;
  background-color: #0000008e;
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
.documents-section {
  width: 77%;
  height: 98%;
  background-color: white;
  margin: 0 auto;
}

.document-heading {
  border-bottom: 3px solid orangered;
}
.documents-section h2 {
  text-align: left;
  margin-top: 20px;
  font-size: 30px;
  padding: 20px 0 20px 100px;
  color: orangered;
}

.documents {
  width: 100%;
  height: auto;
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
  height: 50px;
  border: 1px solid rgba(0, 0, 0, 0.356);
  margin: 30px 20px 30px;
  text-align: center;
  padding: 15px;
}

.certificates a {
  color: black;
  text-decoration: none;
  font-size: 17px;
}

.certificates:hover {
  background-color: orangered;
  color: #ffd700;
}

</style>
</head>

<body>


    <!-- main conatiner start here it contains whole page from nav to footer -->
    <div class="main-container" id="main">

        

        <!-- header conatiner start here it contains navbar and heading content and bg image-->

        <header class="header">
            <!-- navbar conatiner start here it contains logo and nav links -->
          <?php include 'nav.php'; ?>
          </header>
            <!-- nav container ends here -->

            <!-- headings container starts here  it contains headings and background image-->
            <div class="slide-show">
                <img class="mySlides" src="assets/slide0.1.jpg" alt="slide-1" >
                <img class="mySlides" src="assets/slide1.jpg" alt="slide-1" >
                <img class="mySlides" src="assets/slide2.jpg" alt="slide-1" >
                <img class="mySlides" src="assets/slide3.jpg" alt="slide-2" >
                <img class="mySlides" src="assets/slide6.jpg" alt="slide-3" >
            </div>
            <div class="header-content">
            <p class="wlc">WELCOME TO <strong class="digi-gram"><a href="#">DIGI-GRAM</a></strong> PORTAL</p>
            <br>
            <p class="wlc2">Digi-Gram Portal is a revolutionary initiative aimed at transforming villages with digital connectivity, 
              smart governance, and modern technology. Our mission is to bridge the gap between rural and urban 
              communities by providing easy access to essential services, education, and employment opportunities.</p>
           </div>
            <div class="slide-button">
            <button class="w3-button w3-display-left w3-black button-left" onclick="bacword()">&#10094;</button>
            <button class="w3-button w3-display-right w3-black button-right" onclick="forword()">&#10095;</button>
        </div>
      
       <!-- headings container ends here -->
      

        <!-- header container ends here -->

        <!-- second container starts here it  contains about container and gallary container -->
            <!-- about container starts here it contains about & history and geographiic info container -->

            <!-- <div class="about-us-content">
                <h2><span class="about-heading">
                        Well Come</h2> -->

                <!-- about village and history container starts here -->
             
             
             <div class="smart-village-office" >
                    <div class="office-heading"><h2 id="office-heading"> Smart Village Office</h2></div> 
                    <div class="colored-line"><span class="left"></span>
                    <span class="right"></span></div>
                   
                    
                  <!--   <br>
                <br>
                <br> -->
                <div class="smart-village-content">
                <div class="office-para">
                 <p class="off-para">Being the grass-root-level entity of the State Revenue Administration, the Village Office is responsible for multifarious tasks like the protection of Government land, the collection of various types of taxes, the issuance of various certificates, attending to matters related to General Administration, Elections, Disaster Management and so on. Till date the Village Offices were not equipped to effectively implement these tasks,most of which called for efficient multi-tasking by the Village staff.</p>
                 <p class="off-para">An initiative is under way to transform the Village Offices of the State into Smart Village Offices, fully equipped for fast, paperless, digital delivery of all the services at the Village level. The Smart VO scheme envisages construction of new buildings with an area of 120 Sq M fully equipped with digital equipment and networking facilities to tie seamlessly into the Revenue Department Hub, modern facilities like safe and secure Record Rooms, a user-friendly Front Office, waiting spaces for the Public, Parking Area and other infrastructure.</p>
                 <p class="off-para">Already 103 Village Offices have been converted into Smart Village Offices and work is under way to complete the task of conversion at the earliest. The conversion has brought in much-needed efficiency and speed in delivering the services to the public at the Village level.</p>
                </div>
                <div class="office-img-container">
                    
                    <div class="office-img"><img src="assets/gl1.jpg" alt="" class="off-img"></div>
                    <div class="office-img"><img src="assets/gl2.jpg" alt="" class="off-img"></div>
                    <div class="office-img"><img src="assets/gl5.jpg" alt="" class="off-img"></div>
                    <div class="office-img"><img src="assets/gram-office.jpg" alt="" class="off-img"></div>
                </div>
                </div>
              </div>

                <div class="village-history"  id="about">
                   <div class="history-heading" ><h2><span class="about-head1">About village</span></h2></div>
                   <div class="colored-line"><span class="left"></span>
                    <span class="right"></span></div>
                    <br>
                    <br>
                    <br>  
                   <div class="history-content">
                     
                     <!-- history images start here -->
                      <div class="history-imges-container">
                        <div class="hist-img"><img src="assets/g11.jpg" alt="" class="hist-img-class"></div>
                        <div class="hist-img"><img src="assets/g12.jpg" alt="" class="hist-img-class"></div>
                        <div class="hist-img2"><img src="assets/g7.jpg" alt="" class="hist-img-class"></div>
                        <div class="hist-img2"><img src="assets/g14.jpg" alt="" class="hist-img-class"></div>
                      </div>
                    <!-- history inner container starts here -->

                    <div class="history-text-content">
                        <!-- geography text-info container starts here -->
                       <p class="history-para">
                       <b>Geographical Location:</b> Lon Pirache is situated in the Bhadgaon taluka of Jalgaon district in the Khandesh region of Maharashtra. The village is located approximately 70 kilometers west of the district headquarters, Jalgaon, and about 7 kilometers from the sub-district headquarters, Bhadgaon. </p>
                       <p class="history-para">
                       <strong>Demographics:</strong>  As per the 2011 Census, Lon Pirache has a population of 1,328 residents, comprising 668 males and 660 females. The village consists of 299 households. The literacy rate stands at 73.21%, with male literacy at 82.74% and female literacy at 63.54%. 
                       </p>
                       <p class="history-para">
                       <strong>Economy: </strong> The primary economic activity in Lon Pirache is agriculture. The fertile lands support the cultivation of various crops, with a notable emphasis on banana farming, which is a significant contributor to the village's economy.
                       </p>
                       <p class="history-para">
                        <strong>Infrastructure:</strong> The village is equipped with essential infrastructure, including public bus services within the village and private bus services available within a 10+ km radius. The nearest railway station is within a 5 to 10 km distance. 
                       </p>
                       
                        <!-- <p> 
                            <a href="about.html" target="_blank"><i class="fa-solid fa-circle-arrow-right"></i> &nbsp;
                                &nbsp;</i>see more</i></a>
                        </p> -->
                    </div>
                        <!-- history text-info container ends here -->

                        <!-- history image container starts here -->

                        <!-- history image container ends here -->

                </div>    
                </div>

                <!-- about village container ends here -->

                <!-- geography container starts here -->

                <div class="geography">
                   <div class="geo-head"><h2><span class="about-head1">Geographical </span></h2></div> 
                   <div class="colored-line"><span class="left"></span>
                    <span class="right"></span></div>
                    <br>
          
                    <!-- geography inner container starts here -->

                    <div class="geography-container">

                       <div class="geography-text">
                        <ul>
                         <li><p>Lon Pirache is a peaceful village that offers a refreshing escape from the hustle and bustle of urban life. Situated at an elevation of approximately 550 meters above sea level, the village is surrounded by a beautiful landscape of rolling plains and distant hills, making it a perfect getaway for nature lovers and those seeking tranquility.</p></li>
                         <li><p>Lon Pirache enjoys a strategic location that is well-connected to nearby towns like Jalgaon and Chalisgaon, yet it maintains its rustic charm, offering a quiet, rural atmosphere. The village is accessible via well-maintained roads, and the journey here is marked by picturesque views of the surrounding fields and farmland.</p></li>
                         <li><p>The climate in Lon Pirache is typically hot and dry in the summer, with temperatures rising during the peak months. However, the winter months bring a cool breeze, making it a comfortable time to visit. The monsoon season brings a refreshing change, with the rains nourishing the landscape and turning the village into a lush green paradise.</p></li>
                         <li><p>The agricultural lands around Lon Pirache are rich and fertile, with the village economy largely driven by farming. Crops like cotton, wheat, groundnut, and sugarcane are the primary produce, and the villagers follow traditional farming practices that have been passed down through generations.</p></li>
                        <li><p>Whether youre visiting to escape the stress of city life or looking to connect with nature and rural culture, Lon Pirache promises an unforgettable experience, leaving visitors with a sense of calm and a deep appreciation for the natural beauty of Jalgaon district</p></li>
                      </ul>
                    </div>
    <div class="geography-map">
      <iframe 
      id="map" 
      src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3379.222437850267!2d75.1425500820007!3d20.62223837229747!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bd95142f5c0d005%3A0x1fd65ab0f38477d!2sGram%20Panchayat!5e1!3m2!1sen!2sin!4v1738435106968!5m2!1sen!2sin"
      width="400" 
      height="350" 
      allowfullscreen="" 
      loading="lazy" 
      referrerpolicy="no-referrer-when-downgrade" 
      onload="map_loaded()" 
      onerror="map_img_visible()">
    </iframe>
    <img src="assets/map3.png" alt="" id="map-img" style="display:none;">
    </div>
    
                        <!-- geography text-info container ends here -->
    </div>

                    <!-- geography inner container ends here -->

    </div>

                <!-- geography container ends here -->

                <!-- members container starts here -->

                <div class="members" id="members">
          <div class="members-head"><h2><span class="about-head1">Elected Members </span></h2></div>
                  <div class="colored-line"><span class="left"></span>
                    <span class="right"></span></div>
                    <!-- members inner container starts here -->
                    <div class="members-content">

                        <!-- member card 1 starts here -->
                        <div class="mem-card">
                            <img src="assets/user.jpg" alt="" draggable="false">

                            <p class="mem-name">Mr. Mayur Patil </p>
                            <p class="mem-post">Gram Sewak</p>
                            <p class="mem-mob"><i class="fa-solid fa-phone"></i> : <a href="tel:+917620435349"> 7620435349</a></p>
                            <p class="mem-email"><i class="fa-solid fa-envelope"> </i> : <a href="mailto:vijay@gmail.com">
                                    mayurpatil@gmail.com</a></p>
                        </div>
                        <!-- member card 1 ends here -->

                        <!-- member card 2 starts here -->
                        <div class="mem-card">
                            <img src="assets/user.jpg" alt="" draggable="false">
                            <p class="mem-name"> Mr. Ashok Patil</p>
                            <p class="mem-post">Sarpanch</p>
                            <p class="mem-mob"><i class="fa-solid fa-phone"></i> : <a href="tel:+917822996982"> 7822996982</a></p>
                            <p class="mem-email"><i class="fa-solid fa-envelope"></i> : <a href="mailto:yashodip@gmail.com">
                                    ashokpatil@gmail.com</a></p>
                        </div>

                        <!-- member card 2 ends here -->

                        <!-- member card 3 starts here -->


                        <div class="mem-card">
                            <img src="assets/user.jpg" alt="" draggable="false">
                            <p class="mem-name">Mr. Digambar Khavale</p>
                            <p class="mem-post">Deputy Sarpanch</p>
                            <p class="mem-mob"><i class="fa-solid fa-phone"></i> : <a href="tel:+919322746650"> 9322746650</a> </p>
                            <p class="mem-email"><i class="fa-solid fa-envelope"></i> : <a href="mailto:harshal@gmail.com">
                                    Digambarkhavale@gmail.com</a></p>
                        </div>

                        <!-- member card 3 ends here -->

                    </div>
                    <!-- members inner container ends here -->
                    <!-- <a href="about.html" id="mem-see-more" target="_blank"><i
                            class="fa-solid fa-circle-arrow-right"></i> &nbsp;</i>see more<i
                            class="fa-solid fa-paper-plane"></i></a> -->
                </div>


                <!-- member container ends here -->

                <!-- gallary  starts here -->


                <!----------- gallary container starts here -------------------------->
                <div class="gallary" id="gallary">
                  
                <div class="container">
                  <button class="prev">&#10094;</button>
                  <div gallary-head-div><h2><span class="gallary-head">Gallery</span></h2></div>
                  <div class="colored-line"><span class="left"></span>
                    <span class="right"></span></div>
                    <br>
                    <br>
                  
                  <div class="gallery">
                    <div class="photo-card">
                      <img src="assets/g1.jpg" alt="Image 1" />
                    </div>
                    <div class="photo-card">
                      <img src="assets/g6.jpg" alt="Image 2" />
                    </div>
                    <div class="photo-card">
                      <img src="assets/g8.jpg" alt="Image 3" />
                    </div>
                    <div class="photo-card">
                      <img src="assets/g9.jpg" alt="Image 4" />
                    </div>
                    <div class="photo-card">
                      <img src="assets/g10.jpg" alt="Image 5" />
                    </div>
                    <div class="photo-card">
                      <img src="assets/g11.jpg" alt="Image 6" />
                    </div>
                    <div class="photo-card">
                      <img src="assets/g17.jpg" alt="Image 7" />
                    </div>
                    <div class="photo-card">
                      <img src="assets/g13.jpg" alt="Image 8" />
                    </div>
                    <div class="photo-card">
                      <img src="assets/g14.jpg" alt="Image 9" />
                    </div>
                  </div>
                  <button class="next">&#10095;</button>
                </div>
               
              </div>
                <!----------- gallary container ends here -------------------------->


        <!-- ----------------video gallary starts here ------------------->
         <br>
         <br>
         <br>
         <br>
         <br>
                    <div class="video-gallary" id="video-container">
                      <div class="video-head"><h2><span class="gallary-head1">Video </span></h2></div> 
                        <div class="colored-line"><span class="left"></span>
                          <span class="right"></span></div>
                        
                          <div class="video-container">
                            <video src="assets/video01.mp4" controls muted></video>
                          </div>

                          <div class="video-container" id="second-video">
                            <video src="assets/video02.mp4" controls muted></video>
                          </div>
                
                </div>

        </section>
    <br>
    <br>
    <br>

        <!-- second container ends here -->


        <!-- footer start here  -->
        <footer>
            <!-- footer contact us container starts here -->
            <div class="f-info" id="footer">
                <!-- <p class="f-contact-head">Contact us : <i class="fa-sharp fa-solid fa-user"></i></h3> -->
                <h2  class="f-h2">Gram-Panchayat <strike>-</strike> Lon Pirache </h2>
                <br>
                <div class="f-line"></div>
                <!-- <p class="f-slog">Smart Panchayat , Bright Future </p> -->
                <p class="f-addrs"><i class="fa-solid fa-location-dot"></i><strong>&nbsp; &nbsp;Address : </strong>Gram
                    Panchayat Office, Lon Pirache, Maharashtra,
                    India
                </p>
                <p class="f-con-mob"><i class="fa-solid fa-phone"> </i><strong>&nbsp; Phone: </strong> <a href="#">
                        +91-7620435349</a> </p>
        
                <p class="f-con-email"><strong><i class="fa-regular fa-envelope"></i> &nbsp;Email:</strong>
                    <a href="mailto:info@grampanchayat.in"> info@grampanchayat.in</a>
                </p>
               
                <p class="f-day"><strong>Office-day :</strong> Monday to friday</p>
                <p class="f-time"><strong>Time :</strong> 9.30am to 5.45pm </p>

            </div>
            <!-- footer contact us container ends here -->

            <!-- footer quick links container starts here -->
            <div class="f-links">
                <p class="f-links-head">Quick Links : <i class="fa-sharp fa-solid fa-link"></i></p>
                <span><a href="index.php#main"><i class="fa-sharp fa-solid fa-house"></i><strong>Home</strong></a></span>
                <span><a href="index.php#about" ><i class="fa-solid fa-circle-info"></i> About Us</a></span>
                <span><a href="index.php#gallary" ><i class="fa-solid fa-image"></i> Gallery</a></span>
                <span><a href="/Digi-gram/notice/notice.php"><i class="fa-solid fa-person-digging"></i> Notice</a></span>
                <span><a href="/Digi-gram/services/services.php"><i class="fa-solid fa-desktop"></i> Services</a></span>
                <span><a href="index.php#members"><i class="fa-solid fa-user"></i> Contact Us</a></span>
            </div>
            <!-- footer quick links container end here -->

            <!-- footer social links container starts here -->
            <div class="f-social">
                <p class="f-join-head">Join Us On : <i class="fa-sharp fa-solid fa-thumbs-up"></i></p>
                <span><a href="#"><i class="fa-brands fa-facebook"></i> Facebook</a> </span>
                <span><a href="#"> <i class="fa-brands fa-instagram"></i> Instagram</a></span>
                <span><a href="#"><i class="fa-brands fa-twitter"></i> Twitter X</a></span>
                <span><a href="#"><i class="fa-brands fa-youtube"></i> Youtube</a> </span>
                <span><a href="#"><i class="fa-brands fa-whatsapp"></i> Whatsapp </a></span>
                <span><a href="#"><i class="fa-brands fa-threads"></i> Threads </a></span>

            </div>
        
          </footer>
        <!-- footer container ends here -->
    
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
    <!-- main container ends here -->
  </div>
</body>
<script src="app.js"></script>
</html>