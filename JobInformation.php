<?php
// Initialize the session
session_start();


include "db_connect.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="./JobInfo_style.css">
    <title>Job Information</title>
</head>

<body>
    <?php
    echo $_SESSION['postID'];;
    $postID=
$selectQuery= "SELECT * FROM posts where postID= '$postID'";
                    

                    $r=mysqli_query($link,$selectQuery);
                       
                    if($row=mysqli_fetch_assoc($r))
                    {
                    }?> 
    <form class="main" name="CvForm" onsubmit="return false">

        <section class="asset split about" id="about-section">
            <p class="title section-item"><span><?php echo $row["jobTitle"] ?></span></p>
           
            <div class="asset-body">
                <div class="section-item">
                    <h3  style="text-align: left; margin: 10px;  margin-left: 15%; font-size: large;"></h3>
                    <p>
                        <label for="JobTitle" >Job Title</label><br>
                        <p class ="field-db"id="JobTitle"><?= $row["jobTitle"];?></p><br><br>
                        <label for="JobLocation" >Job Location</label><br>
                        <p class ="field-db"id="JobLocation"><?= $row["jobLocation"];?></p><br><br>
                       
                    </p>
                </div>
               
                <div class="section-item">
                    <h3  style="text-align: left; margin: 10px;  margin-left: 15%; font-size: large;"></h3>

                    <label for="Slary" >Slary</label><br>
                    <p class ="field-db"id="Slary"><?= $row["salary"];?> per day</p><br><br>
                    <label for="ExpireDate" >ExpireDate</label><br>
                    <p class ="field-db"id="ExpireDate"><?= $row["expireDate"];?></p><br><br>
                </div>
            </div>
        </section>

        <section class="asset split about" id="about-section">
            <p class="title section-item"><span></span></p>
           
            <div class="asset-body">
                <div class="section-item">
                    <h3  style="text-align: left; margin: 10px;  margin-left: 15%; font-size: large;"></h3>
                    <p>
                        <label for="description" >description</label><br>
                        <textarea name="" id="" cols="55" rows="10"><?= $row["jobDescription"];?></textarea>
                       

                    
                    </p>
                </div>
               
            </div>
        </section>
        <section class="asset split about" id="about-section">
            <p class="title section-item"><span></span></p>
           
            <div class="asset-body">
                <div class="section-item">
                    <h3  style="text-align: left; margin: 10px;  margin-left: 15%; font-size: large;"></h3>
                    <p>
                        <label for="Benefits" >Benefits</label><br>
                        <textarea name="" id="Benefits" cols="55" rows="10"><?= $row["benefits"];?></textarea>
                       

                    
                    </p>
                </div>
               
            </div>
        </section>
        <section class="asset split about" id="about-section">
            <p class="title section-item"><span></span></p>
           
            <div class="asset-body">
                <div class="section-item">
                    <h3  style="text-align: left; margin: 10px;  margin-left: 15%; font-size: large;"></h3>
                    <p>
                        <label for="requirements" >requirements</label><br>
                        <textarea name="" id="requirements" cols="55" rows="10"><?= $row["requirements"];?></textarea>
                       

                    
                    </p>
                </div>
               
            </div>
        </section>
        <section class="asset split about" id="about-section">
            <p class="title section-item"><span></span></p>
           
            <div class="asset-body">
                <div class="section-item">
                    <h3  style="text-align: left; margin: 10px;  margin-left: 15%; font-size: large;"></h3>
                    <p>
                        <label for="Note" >Note</label><br>
                        <textarea name="" id="Note" cols="55" rows="10"><?= $row["note"];?></textarea>
                       

                    
                    </p>
                </div>
               
            </div>
        </section>

       

        <div class="ss">
      
            <div class="field btns">
                
                <button class="button" id="Back" onclick="location.href='jobs.php'"> Back</button> <button class="button" id="Apply" >Apply</button>
               
                <br><br>
          
            
              </div>
        </div>

      

    </Form>

    <script src="cvscript.js"></script>
  
</body>

</html>