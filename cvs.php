<?php
session_start();
// Initialize the session
require_once "db_connect.php";
if(isset($_POST["login"])){

$username=$_POST["user"];
$password=$_POST["pass"];
$selectQuery="SELECT * FROM individual WHERE username='$username' and Password='$password'";
if($resultlogin=mysqli_query($link,$selectQuery)){
  $rowcount=mysqli_num_rows($resultlogin);
  if($rowcount>0){
    $row=mysqli_fetch_array($resultlogin);
    $_SESSION['Login']=1;
    $_SESSION['userID']=$row['userID'];
    $_SESSION['UserName']=$row["username"];

    header("Location: index.php");
  }else{

    echo'<script>';
    echo 'alert("error")';
   echo '</script>';
  }

}

}?>
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

  <header class="H-F" id="header">

    <!--logo-->
    <!--navbar as select * edit-->
    <div class="navbar">

      <!----------------------------navbar----------------------------->
      <!-- Indivisual --------------------1-->

      <div class="dropdown">
        <!--drop down list I found in w3schools-->
        <button class="dropbtn">Indiviual
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <table>

            <div>
              <tr class="head-0f-drop">
                <td><a href="jobs.php"><b>Jobs</b></a></td>
                <td> <a href="cvs.php"><b>CVs</b></a></td>
              </tr>
              <!--check if this is a link-->
              <tr>
                <td> <a href="jobs.php#partTimejobs" id="part-t-j" class="jobs" >part time jobs </a></td>
                <td> <a href="#">students</a></td>
              </tr>
              <tr>
                <td> <a href="jobs.php#summerJobs" id="summer-job" class="jobs">summer jobs </a></td>
                <td> <a href="#">unemployed</a></td>
              </tr>
              <tr>
                <td> <a href="jobs.php#weekendJobs" id="weekend-jobs" class="jobs">weekend jobs</a></td>
                <td> <a href="">Experience seekers</a></td>
              </tr>
              <tr>
                <td><a href="jobs.php#workFromHome" id="work-from-home" class="jobs">work from home jobs</a></td>
              </tr>
              <tr>
                <td> <a href="jobs.php#eveningJobs" id="evening-jobs" class="jobs">evening jobs</a></td>
              </tr>
              <tr>
                <td> <a href="jobs.php#internships" id="internships-" class="jobs">internships</a></td>
              </tr>
              <tr>
                <td><a href="jobs.php#apprenticeship" id="apprenticeship-" class="jobs">Apprenticeship</a></td>
              </tr>
            </div>

            <!-------------------------------------->
          </table>
        </div>
      </div>
       <!-- Employers -------------------------------2--->
      <div class="dropdown">
        <!--drop down list -->
        <!--Use any element to open the dropdown menu, e.g. a <button>, <a> or <p> element.
        Use a container element (like <div>) to create the dropdown menu and add the dropdown links inside it.
        Wrap a <div> element around the button and the <div> to position the dropdown menu correctly with CSS.-->
        <button class="dropbtn">Employers
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <div class="in-drop" id="jobs-drop">

            <table>

              <div>
                <tr class="head-0f-drop">
                  <!-- <td><a href="#"><b>Jobs</b></a></td> -->
                  <td> <a href="cvs.php"><b>CVs</b></td></a>
                </tr>
                <!--check if this is a link-->
                <tr>
                  <!-- <td> <a href="#">part time jobs </a></td> -->
                  <td> <a href="">unemployed</a></td>
                </tr>
                <tr>
                  <!-- <td> <a href="#">summer jobs </a></td> -->
                  <td> <a href="">Experience seekers</a></td>
                </tr>
                <tr>
                  <!-- <td> <a href="#">weekend jobs</a></td> -->
                </tr>
                <tr>
                  <!-- <td><a href="#">work from home jobs</a></td> -->
                </tr>

              </div>

              <!-------------------------------------->


              
            </table>

          </div>

        </div>
      </div>

      <a href="aboutUs.html">About us</a>
      <a href="contactUs.html">Contact</a>
    </div>
    <a href="index.php"><img src="imgs/logoSample (1).png" alt=""></a>
    <!--here goes the sign in and log in lists-->
    <div class="sign-log-in">
      <div class="dropdown"> 
        <!-- ad button to create an ad -->
        <button class="dropbtn" onclick="checkForLog()">Create Your Ad
          
        </button>
       
      </div>
      <?php

if(isset($_SESSION["UserName"])){


?>
<div class="dropdown"> 
        <!-- ad button to create an ad -->
       
        
      </div>
      <div class="dropdown"> 
        <!-- ad button to create an ad -->
        <button class="dropbtn">
        
          
        <a class="dropbtn"  href="logout.php">Singout</a>
        </button>
      </div>
<?php 
}else{
?>
      <div class="dropdown"><!--sign in by clicking on the a tag -->
        <button class="dropbtn" >Sign in
          <i class="fa fa-caret-down" onclick="openSearch"></i>
        </button>
        <div class="dropdown-content">
          <a onclick="openIndiviualSignin()">Student</a><!--note : you can't have both href and onclick in a tag-->
          <a onclick="openCompanySignin()">Employer</a>
        </div>
      </div>
      <div class="dropdown">
        <button class="dropbtn">Log in
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <a onclick="openIndiviualLogin()">Student</a>
          <a onclick="openCompanyLogin()">Employer</a>
        </div>
    
      </div>
      <?php }?>
    </div>
<!--sign in log in block-->
    <div class="back" id="logSignOverlayy">
      <div class="login-wrap" >
      <div class="login-html ">
        <span class="closebtn" onclick="closeSignin()" title="Close Overlay">×</span>
        <input id="tab-1" type="radio" name="tab" class="sign-in" ><label for="tab-1" class="tab">Sign In</label>
        <input id="tab-2" type="radio" name="tab" class="sign-up" checked><label for="tab-2" class="tab">Sign Up</label>
        <div class="login-form">
          <form class="sign-in-htm" id="IndivisualLog" onsubmit="return false" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="group">
              <label for="user" class="label">Username</label>
              <input name="user" id="in-userf"  value="" type="text" class="userf input"
               required>  <span class="invalid-feedback"><?php echo $username_err; ?></span> 
              <label for="user" id="in-user"  class=" label" >username is required</label>
              
            </div>
            <div class="group">
              <label for="pass" class="label">Password</label>
              <input name="pass" id="in-passf" type="password" class="passf input" data-type="password" minlength="6" required>
              <label for="pass" id="in-pass" class="pass label" >password is required</label>
             

            
            </div>
            <div class="group">
              <input name="check" type="checkbox" class="check" checked>
              <label for="check"><span class="icon"></span> Keep me Signed in</label>
            </div>
            <div class="group">
              <input type="submit" class="button" value="Sign In" >
            </div>
            <div class="hr"></div>
            <div class="foot-lnk">
              <a href="#forgot">Forgot Password?</a>
            </div>
          </form>
          <form class="sign-in-htm" id="companyLog" onsubmit="return false">
            <div class="group">
              <label for="user" class="label">companyname</label>
              <input name="user" id="co-userf" type="text" class="input userf" pattern="^[a-z0-9]{5,15}$"
              title="Usernames may only contain letters and numbers and must be between 5 and 15 characters" required>
              <label for="user" id="co-user" class=" user label " >username is required</label>
           
            </div>
            <div class="group">
              <label for="pass" class="label">Password</label>
              <input name="pass" id="co-passf" type="password" class="input passf" data-type="password" minlength="6" required>
              <label for="pass" id="co-pass" class="pass label " >password is required</label>
             
           
            </div>
            <div class="group">
              <input name="check" type="checkbox" class="check" checked>
              <label for="check"><span class="icon"></span> Keep me Signed in</label>
            </div>
            <div class="group">
              <input type="submit" class="button" value="Sign In">
            </div>
            <div class="hr"></div>
            <div class="foot-lnk">
              <a href="#forgot">Forgot Password?</a>
            </div>
          </form>
          <!--sign in-->
          <form class="sign-up-htm "  id="IndiviualSign" onsubmit="return false" >
            <div class="group">
              <label for="fname" class="label">First Name</label>
              <input name="fname" id="in-fnamef" type="text" class="input" pattern="^[a-z]{5,15}$" title="names may only contain letters must be between 5 and 15 characters" required>
              <label for="fname" id="in-fname" class="label" >First Name is required</label>

            </div>
            <div class="group">
              <label for="lname" id="in-lnamef" class="label">Last Name</label>
              <input name="lname" type="text" class="input">

            </div>
            <div class="group">
              <label for="user" class="label">username</label>
              <input name="user" id="in-S-userf" type="text" class="input" pattern="^[a-z0-9]{5,15}$"
               title="Usernames may only contain letters and numbers and must be between 5 and 15 characters" required>
              <label for="user" id="in-S-user" class="label">username is required</label>

            </div>
            <div class="group">
              <label for="pass" class="label">Create Password</label>
              <input name="pass" id="in-S-passf" type="password" class="input" data-type="password" minlength="6">
              <label for="pass" id="in-S-pass" class="label">Please Create a Password</label>
               
            </div>
            <div class="group">
              <label for="pass"  class="label">Repeat Password</label>
              <input name="pass" id="in-passRf" type="password" class="input" data-type="password" >
              <label for="pass" id="in-passR" class="label">you have to Repeat Password</label>
           
            </div>
            <div class="group">
              <label for="Email"  class="label">Email Address</label>
              <input name="Email" id="in-Emailf" type="email" class="input" required >
             

            </div>
            <div class="group">
              <label for="birth"  class="label">Birth Date</label>
              <input name="birth" id="in-birthDatef" type="date" class="input" data-type="date" required >
              <label for="birth" id="in-birthDate" class="label">Birth Date is required</label>
            
            </div>
            <div class="group">
              <label for="address"  class="label">Address</label>
              <input name="address" id="in-addressf" type="text" class="input" required>
              <label for="address" id="in-address" class="label">Addressis required</label>
            
            </div>
            <div class="group">
              <input type="submit" class="button" value="Sign Up" >
            </div>
            <div class="hr"></div>
            <div class="foot-lnk">
              <label for="tab-1" onclick="openIndiviualLogin()">Already Member?</label>
            </div>
          </form>
          <form class="sign-up-htm "  id="companySign" onsubmit="return false" >
            <div class="group">
              <div class="group">
                <label for="birth"  class="label">Company Number</label>
                <input name="birth" id="co-birthDatef" type="number" class="input" data-type="number" required >
                <label for="birth" id="co-birthDate" class="label">Company ID is required</label>
              
              </div>
              <label for="user" class="label">username</label>
              <input name="user" id="co-S-userf" type="text" class="input" pattern="^[a-z0-9]{5,15}$"
               title="Usernames may only contain letters and numbers and must be between 5 and 15 characters" required>
              <label for="user" id="co-S-user" class="label">username is required</label>

            </div>
            <div class="group">
              <label for="pass" class="label">Create Password</label>
              <input name="pass" id="co-S-passf" type="password" class="input" data-type="password" minlength="6" required>
              <label for="pass" id="co-S-pass" class="label">Please Create a Password</label>
               
            </div>
            <div class="group">
              <label for="pass"  class="label">Repeat Password</label>
              <input name="pass" id="co-passRf" type="password" class="input" data-type="password" required>
              
              <label for="pass" id="co-passR" class="label">you have to Repeat Password</label>
            </div>
            <div class="group">
              <label for="Email"  class="label">Company Email Address</label>
              <input name="Email" id="co-Emailf" type="email" class="input" required >
             

            </div>
            
            <div class="group">
              <label for="address"  class="label">Address</label>
              <input name="address" id="co-addressf" type="text" class="input" required>
              <label for="address" id="co-address" class="label">Address is required</label>
            
            </div>
            <div class="group">
              <input type="submit" class="button" value="Sign Up" >
            </div>
            
            <div class="foot-lnk">
              <label for="tab-1">Already Member?</a>
            </div>
            <div class="hr"></div>
          </form>
        </div>
      </div>
    </div></div>
    <Form dir="rtl" align="right"  method="Post" enctype="multipart/form-data">
            <div class="form-group">
                    <label for="exampleInputFile">  شعار الشركة </label>
					<input type="file" name="uploaded_file" size="57">
                    <!--<input type="file" id="OffiecLogo11" name="OffiecLogo11" onchange="updateImage(this)">-->
                </div>
            <button type="submit" name="submitfile" class="btn btn-default" style="margin-right: 300px">انشاء</button>
            </Form>
            <?php
            if($_SERVER["REQUEST_METHOD"]=='POST')
            {
                if(isset($_POST['submitfile'])){

                    echo'<script>';
                    echo 'alert("error")';
                   echo '</script>';
            
            if(is_uploaded_file($_FILES["uploaded_file"]["tmp_name"]))
                {
                    
                    move_uploaded_file($_FILES['uploaded_file']['tmp_name'],"uploads/".$_FILES["uploaded_file"]["name"]);
                    $file2_path="uploads/".$_FILES["uploaded_file"]["name"];
                            
                    echo $file2_path;
                }
            }
}
        
  	
            ?>


    <button class="openBtn" onclick="openSearch()"> <i class="fa fa-search fa-lg " onclick="openSearch()"></i></button>
    <!--search bar on the whole screen-->
    <div id="myOverlay" class="overlay">
      <span class="closebtn" onclick="closeSearch()" title="Close Overlay">×</span>
      <div class="overlay-content">
        <form action="/action_page.php">
          <input type="text" placeholder="Search..use keywors like:Tripoli,marketing..." name="search">
          <button type="submit"><i class="fa fa-search"></i></button>
        </form>
      </div>
    </div>
  </header>
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