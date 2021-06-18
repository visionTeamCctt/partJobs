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
  <div class="home-mid-page mid">
    <!--main body-->
    <div id="searh-where-what">

      <div id="search-form">
        <form action="jobs.php" method="POST"  name="form" onsubmit="
        return validateForm()" id="Where-what-form" >
          <label for="city" class="search-form-label">Where<br>
            <input type="text" name="city" placeholder="City"></label><br>
          <label for="keywors" class="search-form-label">What<br>
            <input type="text" name="keywors" placeholder="keywors"></label><br>
          <input type="submit" name="searchsubmit" value="submit"   class="submitbtn" >
          <!-- Rounded switch -->
          
          <label for="switch" class="alert">Email alert?</label> 
          <label for="" id="alert-vaildation">You Have to Fill at least one field</label>
          <label class="switch">
            <input type="checkbox" name="switch" onclick="showEmail()" id="switch">
            <!--add javascript function-->
            <span class="slider round"></span>
          </label>
          <input type="text" name="EmailS" id="email-field" placeholder="fill in your Email">
        </form>
      </div>
    </div>
    <div id="are-you-looking-for">
      <h1><b> Are You Looking For?</b></h1>

      <a href="jobs.php#partTimeJobs" class="looking-for">part Time Jobs</a>
      <a href="jobs.php#weekendJobs" class="looking-for">weekend Jobs</a>
      <a href="jobs.php#eveningJobs" class="looking-for">evening Jobs</a>
      <a href="jobs.php#summerJobs" class="looking-for">summer Jobs</a>
      <a href="jobs.php#workFromHome" class="looking-for">work from home</a>
      <a href="jobs.php#internships" class="looking-for">internships</a> <br> <br>
      <div id="cv-upload">
        <h1><b> Do You Want to Upload Your CV?</b></h1>
        <button onclick="<?php if(isset($_SESSION["UserName"])){
?>location.href='CV_Form/cvForm.php' <?php }else{ ?>openIndiviualLogin();<?php }?>" id="upload-your-btn">Upload Your CVs</button>

      </div>
    </div>
    <br>




  
  <!--Cieties---------------------------------------------------------->
  <section class="cities" id="citysection">
    <p class="titlecites" style="margin-right:25rem ;">Where do you want to work?</p>
    <div class="cities-body grid">
      
   
      <div class="city-item">
        <div class="img-content">
          <img src="./imgs/Cities/tripoli.jpg" alt="image">
          <a href="jobs.html" class="more-overlay">tripoli</a>
        </div>
        
      </div>
  
    <div class="city-item">
          <div class="img-content">
              <img src="./imgs/Cities/dernah.jpg" alt="image">
              <a href="#" class="more-overlay">Dernah</a>
           </div>
      </div>
      <div class="city-item">
        <div class="img-content">
            <img src="./imgs/Cities/sabha.jpg" alt="image">
            <a href="#" class="more-overlay">sabha</a>
        </div>
      </div>
      <div class="city-item">
        <div class="img-content">
          <img src="./imgs/Cities/Misratah.jpg" alt="image">
          <a href="#" class="more-overlay">Misratah</a>
      </div>

  </div>
      <div class="show-more"><a href="#">Show all Vacnacies by city....</a></div>

     </div>
    </div>
</section>

  <!--TopVacnacies---------------------------------------------------------->
<section class="cards  TopVacnacies">

 
  <div class="inner-card TopVacnacList  " id="TV ">
    <h2>Top Vacnacies</h2>
    <?php  
       global $selectQuery;
       global $i;
       $i=0;
    



    $selectQuery= "SELECT *
    FROM posts 
    ";
  
 
  
    if($result =mysqli_query($link,$selectQuery))
		  {
        
        if ($result->num_rows > 0) {
          	   
					 while($ads=mysqli_fetch_assoc($result))
					 {if($i<4){
             ?>
    <div class="ul">
      <div class="li"> <i class="fas fa-briefcase"></i>
      <label for="li" class="title"><?= $ads["jobTitle"];?>/ <?= $ads["jobLocation"];?>  </label><i class="fas fa-chevron-circle-down" style="text-align: right;" onclick="" ></i> 
    </div><?php $i++;}
           }
      }
        }
      ?>

        <div class="a"><a href="jobs.php">Show all relative posts</a></div>
        
      </div>
  </div>

</section>


  <!---------------------------------footer starts here--------------------------------------------->
  <?php include 'footer.php'; ?>
  <!---------------------------------the end of the footer--------------------------------------------->
  <script src="js.js"></script>

</body>

</html>