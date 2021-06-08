<?php 
session_start();

include 'db_connect.php';

if(isset($_POST["submit"])){
$JobTitle = mysqli_real_escape_string($link, $_POST['JobTitle']);
$name = mysqli_real_escape_string($link, $_POST['Name']);
$salary= mysqli_real_escape_string($link, $_POST['Salary']);
$jobType = mysqli_real_escape_string($link, $_POST['PostTypeChBx']);
$Description = mysqli_real_escape_string($link, $_POST['Description']);
$Benefits = mysqli_real_escape_string($link, $_POST['Benefits']);
$Requirements = mysqli_real_escape_string($link, $_POST['Requirements']);
$JobLocation = mysqli_real_escape_string($link, $_POST['JobLocation']);
$Expiredate = mysqli_real_escape_string($link, $_POST['Expiredate']);
echo $jobType;
$uploadDate=date('Y-m-d h:m');
// Attempt insert query execution
$sql = "INSERT INTO posts (jobTitle, jobDescription, jobType, jobLocation,
salary,uploadDate ,benefits,requirements ,expireDate) VALUES ('$JobTitle', 
'$Description',
 '$jobType', '$JobLocation', $salary,'$uploadDate','$Benefits','$Requirements','$Expiredate')";
if(mysqli_query($link, $sql)){
    ?><script > alert('Records added successfully.')</script><?php
} else{
    // echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    echo "error";
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="./postingstyle.css">
    <title>Post Form</title>
</head>

<body>

    <form class="main" method="POST"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" name="PostForm" id="PostForm">

        <section class="asset split about" id="about-section">
            <p class="title section-item"><span>upload your Post </span></p>
           
            <div class="asset-body">
                <div class="section-item">
                    <h3  style="text-align: left; margin: 10px;  margin-left: 15%; font-size: large;">Basic info</h3>
                    <p>
                        <label for="JobTitle" class="left">Job Title</label><br>
                        <input type="text" name="JobTitle" id="JobTitle">
                        <label for="Name" class="left">Name</label><br>
                        <input type="text" name="Name" id="Name">
                        <label for="Salary" class="left">Salary</label><br>
                        <input type="text" name="Salary" id="Salary">
                        <label for="Expiredate" class="left">Expire Date</label><br>
                        <input type="Date" name="Expiredate" id="Expiredate">
                    
                    
                    </p>
                </div>
                <div class="section-item">
                    <h3  style="text-align: left; margin: 10px;  margin-left: 15%; font-size: large;">Contact Info:</h3>
                    <label id="" class="left">Job Type</label><br>
           
                    <input type="radio" value="PartTimerJobs" name="PostTypeChBx" id="PartTimeJobs" checked><label for="PartTimeJobs">Part Time Jobs</label>
                   <br> <input type="radio" value="Summer Job" name="PostTypeChBx" id="SummerJobs"><label for="SummerJobs">Summer Jobs</label>
                   <br> <input type="radio" value="Weekend Jobs" name="PostTypeChBx" id="WeekendJobs"><label for="WeekendJobs">Weekend Jobs</label>
                   <br> <input type="radio"  value="Work From Home Jobs" name="PostTypeChBx" id="WorkFromHomeJobs"><label for="WorkFromHomeJobs">Work From Home Jobs</label>
                </div>
            </div>
        </section>

        <section class="asset">
             <p class="title section-item"></p>
            <h3  style="text-align: left; margin: 10px; margin-left: 10%; font-size: large;"></h3>
           
            <div class="asset-body">
                <div class="GenderPosition section-item" style="margin-left: -10%;">
                    <div class="radio"  >
                        <label class="left">Description</label><br>
                        <textarea name="Description" id="Description" cols="55" rows="10"></textarea>
                   
                        
                    </div>

                </div>
            </div>
        </section>
        <section class="asset">
            <p class="title section-item"></p>
           <h3  style="text-align: left; margin: 10px; margin-left: 10%; font-size: large;"></h3>
          
           <div class="asset-body">
               <div class="GenderPosition section-item" style="margin-left: -10%;">
                   <div class="radio"  >
                    <label class="left">Benefits</label><br>
                    <textarea name="Benefits" id="Benefits" cols="55" rows="10"></textarea>
                 
                       
                   </div>

               </div>
           </div>
       </section>
       <section class="asset">
        <p class="title section-item"></p>
       <h3  style="text-align: left; margin: 10px; margin-left: 10%; font-size: large;"></h3>
      
       <div class="asset-body">
           <div class="GenderPosition section-item" style="margin-left: -10%;">
               <div class="radio"  >
                <label for="Requirements" class="left">Requirements</label><br>
                <textarea name="Requirements" id="Requirements" cols="55" rows="10"></textarea>
              
                   
               </div>
               
           </div>
           <div class="GenderPosition section-item" style="margin-left: -10%;">
            <div class="radio"  >
               
                <label class="left">Job Location</label><br>
                <select name="JobLocation" id="JobLocation">
                    <option  value="Tripoli">Tripoli</option>
                    <option value="Sabha">Sabha</option>
                    <option value="Azzawia">Azzawia</option>
                </select>
           
                
            </div>
            
        </div>
          
       </div>
   </section>
  

        <section class="asset split" id="skills-section">
            <p class="title section-item"><span></span></p>
            <div class="asset-body">
                <center>   <div class="section-item">
                    
                    <div class="field">

                       <div class="label" id="photo"> Photo</div>
                            <input type="file" name="imgfile" id="img-file" accept="image/*" style="border: 0cm;" hidden >
                            <button type="button" id="custom-imgbutton">choose Photo</button>
                          <span id="custom-imgtext" style="color: gray;">No Photo Choosen.</span>
                       
                      </div>
                </div></center>
               
             
            </div>
               <!-- new edit    section-items-->
               <div class="ss">
                <p class="title"></p>
                <div class="field btns">
                  
                    <button trype="submit"class="submit" name="submit" id="submit" onclick="validateform()">Submit</button>
                    <br><br>
              
                
                  </div>
            </div>
        </section>

        

      

    </Form>

    <script src="postingjs.js"></script>  
</body>

</html>