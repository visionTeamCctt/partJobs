<?php
session_start();
// Initialize the session
require_once "db_connect.php";

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
    <meta name="viewport" content="width=device-width, initial-scale=1.0 , maximum-scale=1, user-scalable=no">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="./profileStyle.css">
    <title>individual Profile</title>
</head>

<body>
    <section class="menu">
        <a class="menu-item active" id="Individual"> <i class="fas fa-user"></i> Profile</a>
        <a class="menu-item" id="skills" href="index.php">  Home</a>
        <a class="menu-item" id="resume"href="jobs.php">  Jobs</a>
        <a class="menu-item" id="storys" href="./jobs.php"> My Posts</a> 
        <a class="menu-item" id="myTeam" href="./Indiv_Cvs.html">  My CVs</a> 
    </section>
  <?php
  $userid=$_SESSION["userID"];
    $selectQuery= "SELECT * FROM individual where userID= '$userid'";
                    

    $r=mysqli_query($link,$selectQuery);
       
    if($row=mysqli_fetch_assoc($r))
    {
    }?>        
                  
        
                
                    
    <section class="profile">
        <div class="img-container"></div>
        <div class="profile-body">
            <p class="name"><?php echo $row['fname'] ,$row['Lname'] ?></p>
            <p class="role"><?php echo $row['domain'] ?></p>
            <div class="socials">
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                <a href="#"><i class="fab fa-github"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
            </div>
        </div>
        <div class="actions">
            
            <button>Contact me</button>
        </div>
    </section>

    <section class="main">

        <section class="asset split about" id="about-section">
            <p class="title section-item"><span>About</span> me</p>
            <div class="asset-body">
                <div class="section-item">
                    <p><?php echo $row['bio']  ?>.</p>
                </div>
                <div class="section-item">
                    <div class="item">
                        <label>Age <span></span></label>
                        <p class="value"><?php $age=date("Y")- $row['birthDate']; echo $age ?></p>
                    </div>
                    <div class="item">
                        <label>Gender <span>.....</span></label>
                        <p class="value"><?php echo $row['gender']  ?></p>
                    </div>
                    <div class="item">
                        <label> <span>.....</span></label>
                        <p class="value">Tripoli</p>
                    </div>
                    <div class="item">
                        <label>college   <span>......</span></label>
                        <p class="value"><?php echo $row['collegeOrCompany']  ?></p>
                    </div>
                </div>
            </div>
        </section>

        <section class="asset">
            <p class="title section-item"><span>Main</span> Domains</p>
            <div class="asset-body">
                <div class="domains section-item">
                    <div class="domain-item">
                        <i class="fas fa-code"></i>
                        <p class="domain-name"><?php echo $row['domain']  ?></p>
                        
                    </div>
                    <div class="domain-item">
                        <i class="fas fa-mobile-alt"></i>
                        <p class="domain-name">Software Dev</p>
                        
                    </div>

                </div>
            </div>
        </section>

       
       
    </section>


    <script>
        var aboutSection = document.getElementById("about-section");
      
        const menuLinks = document.querySelectorAll('.menu .menu-item');
        menuLinks.forEach(el => {
            el.addEventListener('click', function () {

                let sectionToGo = aboutSection;

          
                // Scroll smoothly to section
                sectionToGo.scrollIntoView({behavior: 'smooth'});
            })
        })

    </script>
</body>

</html>