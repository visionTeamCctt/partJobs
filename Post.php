<?php
session_start();
include 'db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="postingstyle.css">
    <title>Document</title>
</head>
<body>
<img class="back-icn" src="imgs/left_4_96px.png" width="40rem" height="40rem" alt="" onclick="history.back()">
<div class="outer-window">

    
    <form class="main" action="<?php ?>" method="post">
   
   
    <section class="asset split about" id="about-section">
    <h2 class="title section-item">create post</h2>
    
    <div class="asset-body">
                <div class="section-item">
                    <h3  style="text-align: left; margin: 10px;  margin-left: 0%; font-size: large;">required info</h3>
                    <p>
        <label for="jobTitle">Job Title</label>
    <input type="text" name="jobTitle" id="" required>
    <label for="salary">salary</label>
    <input type="number" name="salary" id="">
    <label for="expireDate">Expire Date</label>
    <input type="date" name="expireDate" id="">
    </p>
                </div>
                <div class="section-item">
                <h3  style="text-align: left; margin: 10px;  margin-left: 0%; font-size: large;">Job Type:</h3>

    <input type="radio" value="Part Time job" name="jobType" id="r" checked>Part Time job
  <br>  <input type="radio" value="Summer job" name="jobType" id="t">Summer job
   <br> <input type="radio" value="Evening job" name="jobType" id="c">Evening job
    <br><input type="radio" value="Work from home" name="jobType" id="b">Work from home
   <br> <input type="radio" value="Weekend job" name="jobType" id="a">Weekend job
   <br> <input type="radio" value="intrenship" name="jobType" id="d">intrenship
   </div>
            </div>
        </section>

        <section class="asset">
        <p class="title section-item"></p>
            <h3  style="text-align: left; margin: 10px; margin-left: 10%; font-size: large;"></h3>
           
            <div class="asset-body">
                <div class="GenderPosition section-item" style="margin-left: -10%;">
    <label for="description" class="left">Description</label>
    <textarea name="description" id="" cols="30" rows="10" required></textarea><br>
    
            
    </div>

</div>

</section>
       <section class="asset">
            <p class="title section-item"></p>
           <h3  style="text-align: left; margin: 10px; margin-left: 10%; font-size: large;"></h3>
          
           <div class="asset-body">
               <div class="GenderPosition section-item" style="margin-left: -10%;">
    <label for="benefits" class="left">Benefits</label>
   
    <textarea name="benefits" id="" cols="30" rows="10"></textarea><br>
    </div>
       </section>
       <section class="asset">
        <p class="title section-item"></p>
       <h3  style="text-align: left; margin: 10px; margin-left: 10%; font-size: large;"></h3>
      
       <div class="asset-body">
           <div class="GenderPosition section-item" style="margin-left: -10%;">
    <label for="requirmenets" class="left" style="">Requerment</label>
    <textarea name="requirmenets" id="" cols="30" rows="10" required></textarea><br>

    </div>
    <section class="asset">
            <p class="title section-item"></p>
           <h3  style="text-align: left; margin: 10px; margin-left: 10%; font-size: large;"></h3>
          
           <div class="asset-body">
               <div class="GenderPosition section-item" style="margin-left: -10%;">
    <label for="note" class="left">Note</label>
   
    <textarea name="note" id="" cols="30" rows="10"></textarea><br>
    </div>
       </section>
               
               
               <div class="GenderPosition section-item" style="margin-left: -30%;">
            <div class="radio">   
                 <label class="left">Job Location</label>
                <select name="JobLocation" id="JobLocation" style=""  >
                    <option value="Tripoli">Tripoli</option>
                    <option value="Sabha">Sabha</option>
                    <option value="zawiah">zawiah</option>
                    <option value="benghazi">benghazi</option>
                    <option value="khoms">khoms</option>
                </select>
            </div>  </div>
        
            </section>
            
              
          
    
            <div class="ss">
                <p class="title"></p>
                <div class="field btns">
                  
                    <button type="submit"class="submit" name="submit" id="submit" onclick="validateform()">Submit</button>
              
                    <br><br>
                </div></div>
     
</form>
    </div>
    <?php 
     if (isset($_POST['submit'])){
    $jbTitl=mysqli_real_escape_string($link,$_POST['jobTitle']);
    $slry=mysqli_real_escape_string($link,$_POST['salary']);
    $expirdt=mysqli_real_escape_string($link,$_POST['expireDate']);
    $jbtyp=mysqli_real_escape_string($link,$_POST['jobType']);
    $dscrp=mysqli_real_escape_string($link,$_POST['description']);
    $bnfts=mysqli_real_escape_string($link,$_POST['benefits']);
    $rq=mysqli_real_escape_string($link,$_POST['requirmenets']);
    $note=mysqli_real_escape_string($link,$_POST['note']);
    $jblcation=mysqli_real_escape_string($link,$_POST['JobLocation']);

    $userID=$_SESSION['userID'];

   
    
    $sql = "INSERT INTO posts (jobTitle, jobDescription, jobType,jobLocation,
    salary,uploadDate ,benefits,requirements ,note,expireDate,userID) VALUES
     ('$jbTitl', '$dscrp','$jbtyp', '$jblcation', $slry,NOW(),
     '$bnfts','$rq','$note','$expirdt','$userID')";
    if(mysqli_query($link, $sql)){
   
   $_SESSION['submit']=1;

       
        ?><script > if (window.confirm('Records added successfully.'))
        {
            location.href='jobs.php';
        }
        else
        { location.href='index.php'
        }</script><?php
      
    } else{
         echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        echo "error";
    }
    
    
}
    ?>
    <script src="postingjs.js"></script>
</body>
</html>