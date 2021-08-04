<?php
require_once "LogIn.php";
require_once "signin.php";
require_once "searchByForm.php";
require_once "sendAdEmail.php";

//---------------------------------------------
global $city;
global $keywors;
global $_SESSION;
// $_SESSION['jobsT'];
// $_SESSION['jobsD'];
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

<body id="body">
<button onclick="<?php if(isset($_SESSION["UserName"])){
?>location.href='./Indiv_Profile.php' <?php }else{ ?>openIndiviualLogin();<?php }?>
"class="Profile-icon floating-btn"><?php if(isset($_SESSION["UserName"])){
  ?><img class="cat-icon" src="cat_profile_96px.png" alt="">
  <?php }else{ ?><i class="fas fa-user"></i><?php }?></button>

<!-- <a href="./Indiv_Profile.html" class="Profile-icon floating-btn"><i class="fas fa-user"></i></a> -->
<?php include 'header.php';?>
  
  
<div class="jobs-mid-page mid">


     <!--main body-->
     
  <!--part time jobs---------------------------------------------------------->
      <section class="cards PartTimeJobs ">

        
                  <div class="inner-card partTimeJobs" id="partTimejobs" >
                          <div class="path-links"> <!--here goes the path -->
                      
                            <a href="index.php"><b>Home</b> </a><i class="fa fa-caret-right fo"></i>
                            <a href="jobs.php" id="jobs">Jobs</a>
                  
                          </div>
                    <h2>Part Time Jobs</h2>
                    <?php  
                      // global $selectQuery;
                      // global $i;
                      // $i=0;
                
                        if (isset($_POST['searchsubmit']) && empty($_POST['EmailS'])){
                       $city=$_POST["city"];
                        $keywors=$_POST["keywors"];
                        if(!empty($city)&& !empty($keywors)){
                        $sql="SELECT * from individual  JOIN posts on individual.userID=posts.userID and posts.jobType='Part Time job' and posts.jobLocation='$city' and  posts.jobTitle Like '%$keywors%'";


                        // switch(isset($_POST['searchsubmit'])){
                        // case isset($city):  $selectQuery="SELECT * from individual inner JOIN posts on individual.userID=posts.userID and posts.jobType='Part Time job' and posts.jobLocation='$city'"; break;
                        // case isset($keywors):  $selectQuery="SELECT * from individual inner JOIN posts on individual.userID=posts.userID and posts.jobType='Part Time job' and  posts.jobTitle Like '%$keywors%' "; break;
                        //   case isset($city)&& isset($keywors): $selectQuery="SELECT * from individual inner JOIN posts on individual.userID=posts.userID and posts.jobType='Part Time job' and posts.jobLocation='$city' or  posts.jobTitle Like '%$keywors%'";
                        // }
posts($sql);
}
else if(!empty($_POST["city"]) && empty($_POST["keywors"])){
  $sql="SELECT * from individual JOIN posts on individual.userID=posts.userID and posts.jobType='Part Time job' and posts.jobLocation='$city'";
posts($sql);
}else if(empty($_POST["city"]) && !empty($_POST["keywors"])) {           
               $sql="SELECT * from individual  JOIN posts on individual.userID=posts.userID and posts.jobType='Part Time job' and posts.jobTitle Like '%$keywors%'";
  posts($sql);
}
                  
                        }   
                else  if (isset($_POST['searchsubmit']) && isset($_POST['EmailS'])){ 
                   $ToEmail = $_POST['EmailS'];//where to send the email
    $ToName  ='job seeker';

    $MessageHTML ='Hi, you searched a job through our site here is some ads:'.'';//trying to insert the next var to the next line!!
     
      
    $MessageTEXT="ads";
    $body = "<html>\n"; 
    $body .= "<body style=\"font-family:Verdana, Verdana, Geneva, sans-serif; font-size:12px; color:#666666;\">\n"; 
    $body = $MessageHTML; 
    $body .= "</body>\n"; 
    $body .= "</html>\n"; 

    $headers  = "From:Part Time Jobs<n@example.com>\r\n"; 
    $headers .= "Reply-To:".$_POST['EmailS']." \r\n"; 
  
    $headers .= $_SESSION['jobsT']."\n"; 
    $headers .=  $_SESSION['jobsD'] . "\n"; 
    $headers .= 'visit jobs.php for more info' . "\r\n"; 

    $Send = SendMail( $ToEmail, $MessageHTML, $MessageTEXT,$body,$headers);
    if ( $Send ) {
        header('Location:jobs.php');
    
      
    }
    else {
     
    }
    die;
    

  }
                else
                  {

                    
                    $sql= "SELECT * FROM individual JOIN posts ON individual.userID= posts.userID AND posts.jobType='Part Time job'
                    ORDER by posts.uploadDate DESC ";

                posts($sql);
                  
                    // if($result =mysqli_query($link,$selectQuery))
                    //   {
                        
                    //     if ($result->num_rows > 0) {
                          
                    //       while($ads=mysqli_fetch_assoc($result)  )
                    //       { if($i<4){
                            ?>
                    
                    
                  
                  
                    <!-- <div class="ul">

                                  
                        <div class="li"><img src="imgs/logo.png" class="span" alt=""><label for="li" id="Job-title" class="title"><?//= $ads["jobTitle"];?></label><br>
                                    <p class="descrption"><?//= $ads["jobDescription"];?></p>
                                    <br><label for="li" class="info"><?//= $ads["fname"];?></label><label for="li" class="info" data-type="date" ><?//= $ads["uploadDate"];?></label>
                                    <label for="li" class="info" ><i class="fas fa-map-marker-alt"></i><?//= $ads["jobLocation"];?></label>
                                    <label for="li" class="info"><i class="fas fa-dollar-sign"></i><?//= $ads["salary"];?> per hour</label>
                                    <label for="li" class="info"><i class="far fa-bookmark"></i> <?//= $ads["jobType"];?></label><i class="fas fa-chevron-circle-down" onclick="openJobDetails()"></i>
                        </div>
                        <section class="post-overlay" id="postOverlay">
                                      

                              <div class="post-container">
                                      <span class="closebtn" onclick="closeJobDetails()" title="Close Overlay">×</span>
                                      <b>  <h5><?//= $ads["jobTitle"];?></h5></b>
                                      
                                    <div class="JobDetails">
                                              <span></span>
                                                <label for="post-overlay" class="post-nav"><//?= $ads["fname"];?></label>
                                                <label for="post-overlay" class="post-nav"><?//= $ads["uploadDate"];?></label>
                                                
                                                <label for="post-overlay" class="post-nav"><i class="fas fa-map-marker-alt"></i><?//= $ads["jobLocation"];?></label>
                                                <label for="post-overlay" class="post-nav"><i class="far fa-bookmark"></i> <?//= $ads["jobType"];?></label>
                                                <br><br><br><br>
                                                <ul class="details-list">
                                              <li><label for="details-list" >Expire date:</label> <?//= $ads["expireDate"];?></li>
                                              <li> <label for="details-list">salary:</label> <?//= $ads["salary"];?> $ per day</li>  </ul>
                                                <br> 
                                                <table>
                                                  <tr>
                                              <td><label for="description" class="details" >Description:</label></td> <td><p id="description"><?//= $ads["jobDescription"];?></p></td></tr><br>
                                              <tr><td><label for="benefits" class="details">Benefits:</label></td><td><p  id="benefits"><?//= $ads["benefits"];?></p></td></tr> 
                                              <tr> <td><label for="requirements" class="details">requirements:</label></td><td><p id="requirements"><?//= $ads["requirements"];?></p></td></tr>
                                              <tr><td> <label for="location" class="details">job location:</label></td><td><p class="location"><?//= $ads["jobLocation"];?></p></td></tr> <br>
                                              <tr><td><label for="note" class="details">note:</label></td><td><p class="note"><?//= $ads["note"];?></p></td></tr>
                                              </table>
                                    </div>
                                    <button class="post-btn" id="cancelbtn" onclick="closeJobDetails()" >cancel</button>
                                    <button  class="post-btn">Apply for this job</button>
                                    </div>
                        </section>
                    </div> -->
                    
                          <?php 
                        //  $i++; } 
                      }
                      
                      

                
                      ?>
                        <div class="a"><a href="#">Show all relative posts</a></div>

                    </div>
                        
            


        </section>

<!--summer jobs-->
      <section class="cards Other-cards SummerJobs " >

      
        <div class="inner-card other-cards summerJobs"id="summerJobs">
          <h2>Summer Jobs</h2>
          <?php                          

// global $selectQuery;
// global $i;
// $i=0;

  if (isset($_POST['searchsubmit'])){
 $city=$_POST["city"];
  $keywors=$_POST["keywors"];
  if(!empty($city)&& !empty($keywors)){
    $sql="SELECT * from individual  JOIN posts on individual.userID=posts.userID and posts.jobType='Summer job' and posts.jobLocation='$city' and  posts.jobTitle Like '%$keywors%' ";

  // switch(isset($_POST['searchsubmit'])){
  // case isset($city):  $selectQuery="SELECT * from individual inner JOIN posts on individual.userID=posts.userID and posts.jobType='Part Time job' and posts.jobLocation='$city'"; break;
  // case isset($keywors):  $selectQuery="SELECT * from individual inner JOIN posts on individual.userID=posts.userID and posts.jobType='Part Time job' and  posts.jobTitle Like '%$keywors%' "; break;
  //   case isset($city)&& isset($keywors): $selectQuery="SELECT * from individual inner JOIN posts on individual.userID=posts.userID and posts.jobType='Part Time job' and posts.jobLocation='$city' or  posts.jobTitle Like '%$keywors%'";
  // }
posts($sql);
}
else if(!empty($_POST["city"]) && empty($_POST["keywors"])){
  $sql="SELECT * from individual  JOIN posts on individual.userID=posts.userID and posts.jobType='Summer job' and posts.jobLocation='$city' ";
  posts($sql);
}else if(empty($_POST["city"]) && !empty($_POST["keywors"])) {           
  $sql="SELECT * from individual  JOIN posts on individual.userID=posts.userID and posts.jobType='Summer job' and  posts.jobTitle Like '%$keywors%' ";
  posts($sql);
}

  }   
else
{


$sql= "SELECT * FROM individual JOIN posts ON individual.userID= posts.userID AND posts.jobType='Summer job'
ORDER by posts.uploadDate DESC ";

posts($sql);

// if($result =mysqli_query($link,$selectQuery))
//   {
  
//     if ($result->num_rows > 0) {
    
//       while($ads=mysqli_fetch_assoc($result)  )
//       { if($i<4){
      ?>




<!-- <div class="ul">

            
  <div class="li"><img src="imgs/logo.png" class="span" alt=""><label for="li" id="Job-title" class="title"><?//= $ads["jobTitle"];?></label><br>
              <p class="descrption"><?//= $ads["jobDescription"];?></p>
              <br><label for="li" class="info"><?//= $ads["fname"];?></label><label for="li" class="info" data-type="date" ><?//= $ads["uploadDate"];?></label>
              <label for="li" class="info" ><i class="fas fa-map-marker-alt"></i><?//= $ads["jobLocation"];?></label>
              <label for="li" class="info"><i class="fas fa-dollar-sign"></i><?//= $ads["salary"];?> per hour</label>
              <label for="li" class="info"><i class="far fa-bookmark"></i> <?//= $ads["jobType"];?></label><i class="fas fa-chevron-circle-down" onclick="openJobDetails()"></i>
  </div>
  <section class="post-overlay" id="postOverlay">
                

        <div class="post-container">
                <span class="closebtn" onclick="closeJobDetails()" title="Close Overlay">×</span>
                <b>  <h5><?//= $ads["jobTitle"];?></h5></b>
                
              <div class="JobDetails">
                        <span></span>
                          <label for="post-overlay" class="post-nav"><//?= $ads["fname"];?></label>
                          <label for="post-overlay" class="post-nav"><?//= $ads["uploadDate"];?></label>
                          
                          <label for="post-overlay" class="post-nav"><i class="fas fa-map-marker-alt"></i><?//= $ads["jobLocation"];?></label>
                          <label for="post-overlay" class="post-nav"><i class="far fa-bookmark"></i> <?//= $ads["jobType"];?></label>
                          <br><br><br><br>
                          <ul class="details-list">
                        <li><label for="details-list" >Expire date:</label> <?//= $ads["expireDate"];?></li>
                        <li> <label for="details-list">salary:</label> <?//= $ads["salary"];?> $ per day</li>  </ul>
                          <br> 
                          <table>
                            <tr>
                        <td><label for="description" class="details" >Description:</label></td> <td><p id="description"><?//= $ads["jobDescription"];?></p></td></tr><br>
                        <tr><td><label for="benefits" class="details">Benefits:</label></td><td><p  id="benefits"><?//= $ads["benefits"];?></p></td></tr> 
                        <tr> <td><label for="requirements" class="details">requirements:</label></td><td><p id="requirements"><?//= $ads["requirements"];?></p></td></tr>
                        <tr><td> <label for="location" class="details">job location:</label></td><td><p class="location"><?//= $ads["jobLocation"];?></p></td></tr> <br>
                        <tr><td><label for="note" class="details">note:</label></td><td><p class="note"><?//= $ads["note"];?></p></td></tr>
                        </table>
              </div>
              <button class="post-btn" id="cancelbtn" onclick="closeJobDetails()" >cancel</button>
              <button  class="post-btn">Apply for this job</button>
              </div>
  </section>
</div> -->

    <?php 
}
                  
                      ?>
                        <div class="a"><a href="#">Show all relative posts</a></div>
                        </div>
      </section>
          <!--weekend jobs-->
          <section class="cards Other-cards WeekendJobs " id="weekendJobs">

          
            <div class="inner-card other-cards weekendJobs">
              <h2>Weekend Jobs</h2>                       

              <?php                          

// global $selectQuery;
// global $i;
// $i=0;

  if (isset($_POST['searchsubmit'])){
 $city=$_POST["city"];
  $keywors=$_POST["keywors"];
  if(!empty($city)&& !empty($keywors)){
    $sql="SELECT * from individual JOIN posts on individual.userID=posts.userID and posts.jobType='Weekend job' and posts.jobLocation='$city' and  posts.jobTitle Like '%$keywors%' ";
  // switch(isset($_POST['searchsubmit'])){
  // case isset($city):  $selectQuery="SELECT * from individual inner JOIN posts on individual.userID=posts.userID and posts.jobType='Part Time job' and posts.jobLocation='$city'"; break;
  // case isset($keywors):  $selectQuery="SELECT * from individual inner JOIN posts on individual.userID=posts.userID and posts.jobType='Part Time job' and  posts.jobTitle Like '%$keywors%' "; break;
  //   case isset($city)&& isset($keywors): $selectQuery="SELECT * from individual inner JOIN posts on individual.userID=posts.userID and posts.jobType='Part Time job' and posts.jobLocation='$city' or  posts.jobTitle Like '%$keywors%'";
  // }
posts($sql);
}
else if(!empty($_POST["city"]) && empty($_POST["keywors"])){
  $sql="SELECT * from individual JOIN posts on individual.userID=posts.userID and posts.jobType='Weekend job' and posts.jobLocation='$city' ";
  posts($sql);
}else if(empty($_POST["city"]) && !empty($_POST["keywors"])) {           
  $sql="SELECT * from individual  JOIN posts on individual.userID=posts.userID and posts.jobType='Weekend job' and  posts.jobTitle Like '%$keywors%' ";
  posts($sql);
}

  }   
else
{


$sql= "SELECT * FROM individual JOIN posts ON individual.userID= posts.userID AND posts.jobType='Weekend job'
ORDER by posts.uploadDate DESC ";

posts($sql);

// if($result =mysqli_query($link,$selectQuery))
//   {
  
//     if ($result->num_rows > 0) {
    
//       while($ads=mysqli_fetch_assoc($result)  )
//       { if($i<4){
      ?>




<!-- <div class="ul">

            
  <div class="li"><img src="imgs/logo.png" class="span" alt=""><label for="li" id="Job-title" class="title"><?//= $ads["jobTitle"];?></label><br>
              <p class="descrption"><?//= $ads["jobDescription"];?></p>
              <br><label for="li" class="info"><?//= $ads["fname"];?></label><label for="li" class="info" data-type="date" ><?//= $ads["uploadDate"];?></label>
              <label for="li" class="info" ><i class="fas fa-map-marker-alt"></i><?//= $ads["jobLocation"];?></label>
              <label for="li" class="info"><i class="fas fa-dollar-sign"></i><?//= $ads["salary"];?> per hour</label>
              <label for="li" class="info"><i class="far fa-bookmark"></i> <?//= $ads["jobType"];?></label><i class="fas fa-chevron-circle-down" onclick="openJobDetails()"></i>
  </div>
  <section class="post-overlay" id="postOverlay">
                

        <div class="post-container">
                <span class="closebtn" onclick="closeJobDetails()" title="Close Overlay">×</span>
                <b>  <h5><?//= $ads["jobTitle"];?></h5></b>
                
              <div class="JobDetails">
                        <span></span>
                          <label for="post-overlay" class="post-nav"><//?= $ads["fname"];?></label>
                          <label for="post-overlay" class="post-nav"><?//= $ads["uploadDate"];?></label>
                          
                          <label for="post-overlay" class="post-nav"><i class="fas fa-map-marker-alt"></i><?//= $ads["jobLocation"];?></label>
                          <label for="post-overlay" class="post-nav"><i class="far fa-bookmark"></i> <?//= $ads["jobType"];?></label>
                          <br><br><br><br>
                          <ul class="details-list">
                        <li><label for="details-list" >Expire date:</label> <?//= $ads["expireDate"];?></li>
                        <li> <label for="details-list">salary:</label> <?//= $ads["salary"];?> $ per day</li>  </ul>
                          <br> 
                          <table>
                            <tr>
                        <td><label for="description" class="details" >Description:</label></td> <td><p id="description"><?//= $ads["jobDescription"];?></p></td></tr><br>
                        <tr><td><label for="benefits" class="details">Benefits:</label></td><td><p  id="benefits"><?//= $ads["benefits"];?></p></td></tr> 
                        <tr> <td><label for="requirements" class="details">requirements:</label></td><td><p id="requirements"><?//= $ads["requirements"];?></p></td></tr>
                        <tr><td> <label for="location" class="details">job location:</label></td><td><p class="location"><?//= $ads["jobLocation"];?></p></td></tr> <br>
                        <tr><td><label for="note" class="details">note:</label></td><td><p class="note"><?//= $ads["note"];?></p></td></tr>
                        </table>
              </div>
              <button class="post-btn" id="cancelbtn" onclick="closeJobDetails()" >cancel</button>
              <button  class="post-btn">Apply for this job</button>
              </div>
  </section>
</div> -->

    <?php 
}
                  
                      ?>
                        <div class="a"><a href="#">Show all relative posts</a></div>
                        </div>
      </section>
          <!--work from home jobs-->                        $selectQuery="SELECT * from individual inner JOIN posts on individual.userID=posts.userID and posts.jobType='' and posts.jobLocation='$city' and  posts.jobTitle Like '%$keywors%' ";

          <section class="cards Other-cards FromHomeJobs " >

          
            <div class="inner-card other-cards fromHomeJobs" id="workFromHome">
              <h2>Work From Home Jobs</h2>
              <?php                          

// global $selectQuery;
// global $i;
// $i=0;

  if (isset($_POST['searchsubmit'])){
 $city=$_POST["city"];
  $keywors=$_POST["keywors"];
  if(!empty($city)&& !empty($keywors)){
    $sql="SELECT * from individual JOIN posts on individual.userID=posts.userID and posts.jobType='Work from home' and posts.jobLocation='$city' and  posts.jobTitle Like '%$keywors%' ";
  // switch(isset($_POST['searchsubmit'])){
  // case isset($city):  $selectQuery="SELECT * from individual inner JOIN posts on individual.userID=posts.userID and posts.jobType='Part Time job' and posts.jobLocation='$city'"; break;
  // case isset($keywors):  $selectQuery="SELECT * from individual inner JOIN posts on individual.userID=posts.userID and posts.jobType='Part Time job' and  posts.jobTitle Like '%$keywors%' "; break;
  //   case isset($city)&& isset($keywors): $selectQuery="SELECT * from individual inner JOIN posts on individual.userID=posts.userID and posts.jobType='Part Time job' and posts.jobLocation='$city' or  posts.jobTitle Like '%$keywors%'";
  // }
posts($sql);
}
else if(!empty($_POST["city"]) && empty($_POST["keywors"])){
  $sql="SELECT * from individual JOIN posts on individual.userID=posts.userID and posts.jobType='Weekend job' and posts.jobLocation='$city' ";
  posts($sql);
}else if(empty($_POST["city"]) && !empty($_POST["keywors"])) {           
  $sql="SELECT * from individual  JOIN posts on individual.userID=posts.userID and posts.jobType='Work from home' and  posts.jobTitle Like '%$keywors%' ";
  posts($sql);
}

  }   
else
{


$sql= "SELECT * FROM individual JOIN posts ON individual.userID= posts.userID AND posts.jobType='Work from home'
ORDER by posts.uploadDate DESC ";

posts($sql);

// if($result =mysqli_query($link,$selectQuery))
//   {
  
//     if ($result->num_rows > 0) {
    
//       while($ads=mysqli_fetch_assoc($result)  )
//       { if($i<4){
      ?>




<!-- <div class="ul">

            
  <div class="li"><img src="imgs/logo.png" class="span" alt=""><label for="li" id="Job-title" class="title"><?//= $ads["jobTitle"];?></label><br>
              <p class="descrption"><?//= $ads["jobDescription"];?></p>
              <br><label for="li" class="info"><?//= $ads["fname"];?></label><label for="li" class="info" data-type="date" ><?//= $ads["uploadDate"];?></label>
              <label for="li" class="info" ><i class="fas fa-map-marker-alt"></i><?//= $ads["jobLocation"];?></label>
              <label for="li" class="info"><i class="fas fa-dollar-sign"></i><?//= $ads["salary"];?> per hour</label>
              <label for="li" class="info"><i class="far fa-bookmark"></i> <?//= $ads["jobType"];?></label><i class="fas fa-chevron-circle-down" onclick="openJobDetails()"></i>
  </div>
  <section class="post-overlay" id="postOverlay">
                

        <div class="post-container">
                <span class="closebtn" onclick="closeJobDetails()" title="Close Overlay">×</span>
                <b>  <h5><?//= $ads["jobTitle"];?></h5></b>
                
              <div class="JobDetails">
                        <span></span>
                          <label for="post-overlay" class="post-nav"><//?= $ads["fname"];?></label>
                          <label for="post-overlay" class="post-nav"><?//= $ads["uploadDate"];?></label>
                          
                          <label for="post-overlay" class="post-nav"><i class="fas fa-map-marker-alt"></i><?//= $ads["jobLocation"];?></label>
                          <label for="post-overlay" class="post-nav"><i class="far fa-bookmark"></i> <?//= $ads["jobType"];?></label>
                          <br><br><br><br>
                          <ul class="details-list">
                        <li><label for="details-list" >Expire date:</label> <?//= $ads["expireDate"];?></li>
                        <li> <label for="details-list">salary:</label> <?//= $ads["salary"];?> $ per day</li>  </ul>
                          <br> 
                          <table>
                            <tr>
                        <td><label for="description" class="details" >Description:</label></td> <td><p id="description"><?//= $ads["jobDescription"];?></p></td></tr><br>
                        <tr><td><label for="benefits" class="details">Benefits:</label></td><td><p  id="benefits"><?//= $ads["benefits"];?></p></td></tr> 
                        <tr> <td><label for="requirements" class="details">requirements:</label></td><td><p id="requirements"><?//= $ads["requirements"];?></p></td></tr>
                        <tr><td> <label for="location" class="details">job location:</label></td><td><p class="location"><?//= $ads["jobLocation"];?></p></td></tr> <br>
                        <tr><td><label for="note" class="details">note:</label></td><td><p class="note"><?//= $ads["note"];?></p></td></tr>
                        </table>
              </div>
              <button class="post-btn" id="cancelbtn" onclick="closeJobDetails()" >cancel</button>
              <button  class="post-btn">Apply for this job</button>
              </div>
  </section>
</div> -->

    <?php 
}
                  
                      ?>
                        <div class="a"><a href="#">Show all relative posts</a></div>
                        </div>
      </section>
          <!--evening jobs-->
          <section class="cards Other-cards EveningJobs ">

          
            <div class="inner-card other-cards eveningJobs" id="eveningJobs">
              <h2>Evening Jobs</h2>
              <?php  
                      global $selectQuery;
                global $i;
                $i=0;
                        if (isset($_POST['searchsubmit'])){
                        $city=$_POST["city"];
                        $keywors=$_POST["keywors"];

                  
                        $selectQuery="SELECT * from individual inner JOIN posts on individual.userID=posts.userID and posts.jobType='Evening job' and posts.jobLocation='$city' and  posts.jobTitle Like '%$keywors%' ";
                          if($result =mysqli_query($link,$selectQuery))
                          {
                            
                            if ($result->num_rows > 0) {
                                    
                                while($ads=mysqli_fetch_assoc($result))
                                
                                {if($i<4){
                                 
                                  ?>
          <div class="ul">
          <div class="li"><img src="imgs/logo.png" class="span" alt=""><label for="li" id="Job-title" class="title"><?= $ads["jobTitle"];?></label><br>
                                                <p class="descrption"><?= $ads["jobDescription"];?></p>
                                                <br><label for="li" class="info"><?= $ads["fname"];?></label><label for="li" class="info" data-type="date" ><?= $ads["uploadDate"];?></label>
                                                <label for="li" class="info" ><i class="fas fa-map-marker-alt"></i><?= $ads["jobLocation"];?></label>
                                                <label for="li" class="info"><i class="fas fa-dollar-sign"></i><?= $ads["salary"];?> per hour</label>
                                                <label for="li" class="info"><i class="far fa-bookmark"></i> <?= $ads["jobType"];?></label><i class="fas fa-chevron-circle-down" onclick=""></i>
                                    </div>
            
            
              
            </div>
       
        <?php 
                                  }  }
                      }
                        }

                      }
                      else
                  {

                    
                    $selectQuery= "SELECT * FROM individual inner JOIN posts ON individual.userID= posts.userID AND posts.jobType='Evening job'
                    ORDER by posts.uploadDate DESC ";

                
                  
                    if($result =mysqli_query($link,$selectQuery))
                      {
                        
                        if ($result->num_rows > 0) {
                              
                          while($ads=mysqli_fetch_assoc($result))
                          {if($i<4){
                            ?>
                    
                    
                  
                  
                    <div class="ul">

                                  
                        <div class="li"><img src="imgs/logo.png" class="span" alt=""><label for="li" id="Job-title" class="title"><?= $ads["jobTitle"];?></label><br>
                                    <p class="descrption"><?= $ads["jobDescription"];?></p>
                                    <br><label for="li" class="info"><?= $ads["fname"];?></label><label for="li" class="info" data-type="date" ><?= $ads["uploadDate"];?></label>
                                    <label for="li" class="info" ><i class="fas fa-map-marker-alt"></i><?= $ads["jobLocation"];?></label>
                                    <label for="li" class="info"><i class="fas fa-dollar-sign"></i><?= $ads["salary"];?> per hour</label>
                                    <label for="li" class="info"><i class="far fa-bookmark"></i> <?= $ads["jobType"];?></label><i class="fas fa-chevron-circle-down" onclick="openJobDetails()"></i>
                        </div>
                        
                    </div>
                    
                          <?php 
                           } }
                      }
                        }

                      }
                      ?>
                        <div class="a"><a href="#">Show all relative posts</a></div>
                        </div>
      </section>
          <!--internships-->
          <section class="cards Other-cards internships " >

          
            <div class="inner-card other-cards internships"id="internships">
              <h2>internships Jobs</h2>
              <?php  
                      global $selectQuery;
                global $i;
                $i=0;
                        if (isset($_POST['searchsubmit'])){
                        $city=$_POST["city"];
                        $keywors=$_POST["keywors"];

                  
                        $selectQuery="SELECT * from individual inner JOIN posts on individual.userID=posts.userID and posts.jobType='intrenship' and posts.jobLocation='$city' and  posts.jobTitle Like '%$keywors%' ";
                          if($result =mysqli_query($link,$selectQuery))
                          {
                            
                            if ($result->num_rows > 0) {
                                    
                                while($ads=mysqli_fetch_assoc($result))
                                
                                {if($i<4){
                                  ?>
          <div class="ul">
          <div class="li"><img src="imgs/logo.png" class="span" alt=""><label for="li" id="Job-title" class="title"><?= $ads["jobTitle"];?></label><br>
                                                <p class="descrption"><?= $ads["jobDescription"];?></p>
                                                <br><label for="li" class="info"><?= $ads["fname"];?></label><label for="li" class="info" data-type="date" ><?= $ads["uploadDate"];?></label>
                                                <label for="li" class="info" ><i class="fas fa-map-marker-alt"></i><?= $ads["jobLocation"];?></label>
                                                <label for="li" class="info"><i class="fas fa-dollar-sign"></i><?= $ads["salary"];?> per hour</label>
                                                <label for="li" class="info"><i class="far fa-bookmark"></i> <?= $ads["jobType"];?></label><i class="fas fa-chevron-circle-down" onclick=""></i>
                                    </div>
            
            
              
            </div>
       
        <?php 
                                  }  }
                      }
                        }

                      }
                      else
                  {

                    
                    $selectQuery= "SELECT * FROM individual inner JOIN posts ON individual.userID= posts.userID AND posts.jobType='intrenship'
                    ORDER by posts.uploadDate DESC ";

                
                  
                    if($result =mysqli_query($link,$selectQuery))
                      {
                        
                        if ($result->num_rows > 0) {
                              
                          while($ads=mysqli_fetch_assoc($result))
                          {if($i<4){
                            ?>
                    
                    
                  
                  
                    <div class="ul">

                                  
                        <div class="li"><img src="imgs/logo.png" class="span" alt=""><label for="li" id="Job-title" class="title"><?= $ads["jobTitle"];?></label><br>
                                    <p class="descrption"><?= $ads["jobDescription"];?></p>
                                    <br><label for="li" class="info"><?= $ads["fname"];?></label><label for="li" class="info" data-type="date" ><?= $ads["uploadDate"];?></label>
                                    <label for="li" class="info" ><i class="fas fa-map-marker-alt"></i><?= $ads["jobLocation"];?></label>
                                    <label for="li" class="info"><i class="fas fa-dollar-sign"></i><?= $ads["salary"];?> per hour</label>
                                    <label for="li" class="info"><i class="far fa-bookmark"></i> <?= $ads["jobType"];?></label><i class="fas fa-chevron-circle-down" onclick="openJobDetails()"></i>
                        </div>
                        
                    </div>
                    
                          <?php 
                           } }
                      }
                        }

                      }
                      ?>
                        <div class="a"><a href="#">Show all relative posts</a></div>
                        </div>
      </section>
          <!--appernitships-->
          
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
