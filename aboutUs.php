<?php
require_once "LogIn.php";
?>
 
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <script src="https://kit.fontawesome.com/a81649cedd.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="porfileBookmark.css">
  <title>Document</title>
</head>

<body>
<button onclick="<?php if(isset($_SESSION["UserName"])){
?>location.href='./Indiv_Profile.php' <?php }else{ ?>openIndiviualLogin();<?php }?>"class="Profile-icon floating-btn"><?php if(isset($_SESSION["UserName"])){
  ?><img class="cat-icon" src="cat_profile_96px.png" alt=""><?php }else{ ?><i class="fas fa-user"></i><?php }?></button>
  <?php include 'header.php';?>
  <div class="about-mid-page mid">
    <!--main body-->

    <section class="cards cardsInAbout " >

 
      <div class="inner-card other-cards " id="aboutUs">
        <div class="path-links"> <!--here goes the path -->
          
           <a href="index.php"><b>Home</b> </a><i class="fa fa-caret-right fo"></i>
          <a href="aboutUs.php" id="about">About us</a>
          
      
        </div>
        <h2>How it all started </h2>
        <p>In 2021, two libyan students;Alla almgalesh and Weaam okok started Part Time jobs as college project for web development subject, so the project is about 
          website where students, Experience seekers or emlpoyees can find a part time job so they can make money in thier free time as well as building up thier Experience.
          we thought that it would be helpful to build up such a project so we started up, it was such a fun Experience to go through though it has it's own ups and downs
          however the project still in progress and we hope our users find it as helpful as we thought it would be. </p>
     </div>
     <div class="inner-card other-cards secondPara " id="getInTouch">
      
      <h2>where we are now </h2>
      <p>we are trying so hard to develop this site and to get the 
        best results to our custmers, since our project still in progress and 
        we still working on the features of
        it we hope to achive the greatest service ever. </p>
   </div>
   
   </section>

   
   

 

  <!---------------------------------footer starts here--------------------------------------------->
  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="footer-col">
          <h4>Indivisual cities</h4>
          <ul>
            <li><a href="#">Tripoli</a></li>
            <li><a href="#">Sabha</a></li>
            <li><a href="#"> benghazi</a></li>
            <li><a href="#">Sirt</a></li>
            <li><a href="#">AZ zawia</a></li>
            <li><a href="#">mesrata</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>Employers</h4>
          <ul>
            <li><a href="#">Sign Up</a></li>
            <li><a href="#">candidate Search</a></li>
            <li><a href="#"> Advertise with us</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>Indivisual</h4>
          <ul>
            <li><a href="#">Sign Up</a></li>
            <li><a href="#">Jobs</a></li>
            <li><a href="#"> find Part time jobs</a></li>
            <li><a href="#">find holiday jobs</a></li>
            <li><a href="#">find intern ships</a></li>
            <li><a href="#">find weekend jobs</a></li>
          </ul>
        </div>
        <div class="footer-col">

          <h4>follow us</h4>
          <div class="social-links">
            <a href="#"><img src="imgs/socialMedia/facebook1.png"></a>
            <a href="#"><img src="imgs/socialMedia/github.png"></a>
            <a href="#"><img src="imgs/socialMedia/linkedin.png"></a>
            <a href="#"><img src="imgs/socialMedia/twitter.png"></a>
          </div>
        </div>
      </div>
    </div>
    <div class="copyright">
      <p>All right reseved 2021<span>&copy;</span></p>
    </div>
  </footer>
  <!---------------------------------the end of the footer--------------------------------------------->
  <!-- Script------------>
 <script src="js.js"></script>

</body>

</html>