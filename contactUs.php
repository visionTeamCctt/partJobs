<?php
require_once "LogIn.php";
require_once "signin.php";
require_once "sendEmail.php";
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
  <div class="contacts-mid-page mid">
    <!--main body-->
   <!--get in touch-->
    <section class="cards cardsInAbout " >

 
   <div class="inner-card other-cards " id="getInTouch">
     <div class="path-links"> <!--here goes the path -->
       
        <a href="index.php"><b>Home</b> </a><i class="fa fa-caret-right fo"></i>
       <a href="contactUs.php" id="contact">Contact</a>
       
   
     </div>
     <h2>Get in touch with us </h2>
     <p>Do you want to know more about Studentjob? Ask your question below! We will contact <br> you as
     soon as possible. Would you rather call? View our phone number details.</p>
  </div>

</section>
<!--contact form-->
<section class="cards Other-cards  " >

 
  <div class="inner-card other-cards other "id="">
    <h2>Ask your question here</h2>
    <h6>We will answer your question as soon as possible.</h6>
    <div id="">
    <!-- <h4 class="sent-notification"></h4> -->
      <form  id="contact-form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
            onsubmit="return sendEmail() ">
        <label for="name" class="search-form-label">Your name *<br>
          <input type="text" name="name" id="name" placeholder="Your name"></label><br>
        <label for="E-mail " class="search-form-label">E-mail *<br>
          <input type="text" name="E-mail" id="email" placeholder="E-mail"></label><br>
          <label for="number " class="search-form-label">Number *<br>
            <input type="text" name="number" id="number" placeholder="Number"></label><br>
            <label for="question" class="search-form-label">Question *<br>
              <textarea name="subject" id="subject" cols="30" rows="10" name="question" placeholder="Question"></textarea></label><br>
        <input type="submit"  class="submitbtn">
       
      </form>
      <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  ></script>
  <script type="text/javascript"> 
  function sendEmail(){
    
var name=$("#name");
var email=$("#email");
var number=$("#number");
var subject=$("#subject");

if(isNotEmpty(name) && isNotEmpty (number) && isNotEmpty(email) && isNotEmpty(subject)){
 return true;
}else return false;
  }
  function isNotEmpty(caller){
if(caller.val() == ""){
  alert('fill all the fields');
 
  return false;
}else
{

  return true;
}
}
  </script>
      
      

    </div>
    </div>
  </section>
  <!--fAQ-->
<section class="cards Other-cards  " >

 
  <div class="inner-card other-cards FAQ" id="FAQ">
    <h2>Frequently Asked Questions</h2>
    <p>Do you have some questions about StudentJob? We have listed the most <br> important questions and answers for you.</p>
  <a href="" >CHECK THE FAQ</a>
  </div>
</section>
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