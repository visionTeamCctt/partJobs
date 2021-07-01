<?php
require_once "LogIn.php";
require_once "signin.php";
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
  <div class="CVs-mid-page mid">
    <!--main body-->
   <!--get in touch-->
   <div class="cv-img">
    <div class="cv-grig-page">
       
 
      <div class="cv-countainer">
          
          <div class="cv-post-card">
             <div class="cv-content">
              <img src="./imgs/no_img.jpg" alt="John" style="width:100%">
              <h1 class="indevisual-name">John Doe</h1>
              <p class="Main-Domain">CEO & Founder, Example</p>
              <p>Harvard University</p>
              <div class="cv-sosialMedia">
                <a href="#"><img src="./imgs/socialMedia/facebook1.png" alt=""></a>
                <a href="#"><img src="./imgs/socialMedia/twitter.png" alt=""></a>
              <a href="#"><img src="./imgs/socialMedia/github.png" alt=""></a>
              <a href="#"><img src="./imgs/socialMedia/linkedin.png" alt=""></a>
              
              </div>
              
             
              <P class="cv-date">Day dd/mm/yyy</P>
             </div> 
                      <p ><button class="download-cv">download CV</button></p>
            </div>
            <div class="cv-post-card">
              <div class="cv-content">
                  <img src="./imgs/no_img.jpg" alt="John" style="width:100%">
                  <h1 class="indevisual-name">John Doe</h1>
                  <p class="Main-Domain">CEO & Founder, Example</p>
                  <p>Harvard University</p>
                  <div class="cv-sosialMedia">
                    <a href="#"><img src="./imgs/socialMedia/facebook1.png" alt=""></a>
                    <a href="#"><img src="./imgs/socialMedia/twitter.png" alt=""></a>
                  <a href="#"><img src="./imgs/socialMedia/github.png" alt=""></a>
                  <a href="#"><img src="./imgs/socialMedia/linkedin.png" alt=""></a>
                  
                  </div>
                 
                  <P class="cv-date">Day dd/mm/yyy</P>
                 </div> 
                          <p ><button class="download-cv">download CV</button></p>
            </div>
            <!---->
            <div class="cv-post-card">
              <div class="cv-content">
                  <img src="./imgs/no_img.jpg" alt="John" style="width:100%">
                  <h1 class="indevisual-name">John Doe</h1>
                  <p class="Main-Domain">CEO & Founder, Example</p>
                  <p>Harvard University</p>
                  <div class="cv-sosialMedia">
                    <a href="#"><img src="./imgs/socialMedia/facebook1.png" alt=""></a>
                    <a href="#"><img src="./imgs/socialMedia/twitter.png" alt=""></a>
                  <a href="#"><img src="./imgs/socialMedia/github.png" alt=""></a>
                  <a href="#"><img src="./imgs/socialMedia/linkedin.png" alt=""></a>
                  
                  </div>
                 
                  <P class="cv-date">Day dd/mm/yyy</P>
                 </div> 
                          <p ><button class="download-cv">download CV</button></p>
            </div>
  
            <!---->
          </div>
          <div class="upload-cv">
              <p class="do-upload">Do you want to upload  your CV? <br>
                  click here!</p>
                  
              <p id="uploadurcv"> <button class="uploadurcv" onclick="<?php if(isset($_SESSION["UserName"])){
?>location.href='CV_Form/cvForm.php' <?php }else{ ?>openIndiviualLogin();<?php }?>" id="">Upload Your CVs</button>
</p>
          </div>
  
    
      </div>
    
   </div>
  
</div>

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