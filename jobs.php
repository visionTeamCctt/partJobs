<?php
// Initialize the session
session_start();
include "signin.php";
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){

    
    
}
 
// Include config file
require_once "db_connect.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 //start checking for login
// Processing form data when form is submitted
if(isset($_POST["login"])){
 
    // Check if username is empty
    if(empty(trim($_POST['user']))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["user"]);
    }
    
    
    // Check if password is empty
    if(empty(trim($_POST["pass"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["pass"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT username, Password FROM individual WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){   
                                
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $username, $password);
                    if(mysqli_stmt_fetch($stmt)){
                    
                        if(password_verify($password, $hashed_password)){
                          
                          // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["user"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: redircet.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
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
  <title>Document</title>
</head>

<body id="body">
  <?php
  
  // switch($_GET['submit']){
  //   case 'looking for a job':
  //    whereAndWhat();
  //     break;
  
  //    case 'display' :
  //   /// display();
  //     break;
  // }
// function whereAndWhat(){
//     global $link;
//     //include 'db_connect.php';
//     //variables for what and where
//     $where= mysqli_real_escape_string($link,$_REQUEST['city']);
//     $what= mysqli_real_escape_string($link,$_REQUEST['keywors']);

//     //if "what"=null & where = not null search by where else do the oppiste or use both if 
//     //both got value
//     if($where==null && $what!=null){
//         $sql="SELECT username,fname FROM individual";
//     }else if ($where!=null && $what==null){
//         $sql="SELECT username,Upassword, FROM individual";
//     }else if($where!=null && $what!=null){
//         $sql="SELECT Upassword,fname FROM individual";
//     }
//     $results=mysqli_query($link,$sql);

//     if(mysqli_num_rows($results)>0){
//         echo '<script>alert("done")</script>';
       
        
      
//         }
//       else{
//         echo '<script>alert("NO")</script>';
//       }
// }
//   ?>
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
                <td> <a href="#partTimeJobs" id="part-t-j" class="jobs" >part time jobs </a></td>
                <td> <a href="cvs.php">students</a></td>
              </tr>
              <tr>
                <td> <a href="#summerJobs" id="summer-job" class="jobs">summer jobs </a></td>
                <td> <a href="c">unemployed</a></td>
              </tr>
              <tr>
                <td> <a href="#weekendJobs" id="weekend-jobs" class="jobs">weekend jobs</a></td>
                <td> <a href="">Experience seekers</a></td>
              </tr>
              <tr>
                <td><a href="#workFromHome" id="work-from-home" class="jobs">work from home jobs</a></td>
              </tr>
              <tr>
                <td> <a href="#eveningJobs" id="evening-jobs" class="jobs">evening jobs</a></td>
              </tr>
              <tr>
                <td> <a href="#internships" id="internships-" class="jobs">internships</a></td>
              </tr>
              <tr>
                <td><a href="#apprenticeship" id="apprenticeship-" class="jobs">Apprenticeship</a></td>
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
    </div>
 <!--sign in log in block-->
    <div class="back" id="logSignOverlayy">
      <div class="login-wrap" >
      <div class="login-html ">
        <span class="closebtn" onclick="closeSignin()" title="Close Overlay">×</span>
        <input id="tab-1" type="radio" name="tab" class="sign-in" ><label for="tab-1" class="tab">Sign In</label>
        <input id="tab-2" type="radio" name="tab" class="sign-up" checked><label for="tab-2" class="tab">Sign Up</label>
        <div class="login-form">
          <form class="sign-in-htm" id="IndivisualLog" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  onsubmit="return true">
            <div class="group">
            <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>
              <label for="user" class="label">Username</label>
              <input name="user" id="in-userf"  value="" type="text" class="userf input" require class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span> 
              
              <label for="user" id="in-user"  class=" label" >username is required</label>
              
            </div>
            <div class="group">
              <label for="pass" class="label">Password</label>
              <input name="pass" id="in-passf" type="password" class="passf input" data-type="password" minlength="6" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
              <label for="pass" id="in-pass" class="pass label" >password is required</label>
             

            
            </div>
            <div class="group">
              <input name="check" type="checkbox" class="check" checked>
              <label for="check"><span class="icon"></span> Keep me Signed in</label>
            </div>
            <div class="group">
              <input type="submit" name="login" class="button"  value="Sign In" >
            </div>
            <div class="hr"></div>
            <div class="foot-lnk">
              <a href="#forgot">Forgot Password?</a>
            </div>
          </form>
          <form class="sign-in-htm" id="companyLog" >
            <div class="group">
              <label for="user" class="label">companyname</label>
              <input name="user" id="co-userf" type="text" class="input userf" 
               required>
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
          <form class="sign-up-htm " method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  id="IndiviualSign" onsubmit="return true" >
            <div class="group">
              <label for="fname" class="label">First Name</label>
              <input name="fname" id="in-fnamef" type="text" class="input" require class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
              <label for="fname" id="in-fname" class="label" >First Name is required</label>

            </div>
            <div class="group">
              <label for="lname" id="in-lnamef" class="label">Last Name</label>
              <input name="lname" type="text" class="input">

            </div>
            <div class="group">
              <label for="user" class="label">username</label>
              <input name="user" id="in-S-userf" type="text" class="input" 
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
              <input name="Rpass" id="in-passRf" type="password" class="input" data-type="password" >
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
              <input type="submit" class="button" name="signin" value="Sign Up" >
            </div>
            <div class="hr"></div>
            <div class="foot-lnk">
              <label for="tab-1" onclick="openIndiviualLogin()">Already Member?</label>
            </div>
          </form>
          <form class="sign-up-htm "  id="companySign" onsubmit="return false" >
            <div class="group">
              <label for="birth"  class="label">Company name</label>
              <input name="birth" id="co-birthDatef" type="text" class="input" data-type="number" required >
              <label for="birth" id="co-birthDate" class="label">Company ID is required</label>
            
            </div>
            <div class="group">
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
<div class="jobs-mid-page mid">


     <!--main body-->
     
  <!--part time jobs---------------------------------------------------------->
<section class="cards PartTimeJobs ">

 
  <div class="inner-card partTimeJobs" id="partTimejobs" >
    <div class="path-links"> <!--here goes the path -->
       
      <a href="home.html"><b>Home</b> </a><i class="fa fa-caret-right fo"></i>
     <a href="jobs.html" id="jobs">Jobs</a>
     

   </div>
    <h2>Part Time Jobs</h2>

    <?php  
       global $selectQuery;
 
    if(isset($_POST["city"]))
{
      $city = $_POST["city"];
      $selectQuery= "SELECT *
      FROM individual
      RIGHT JOIN posts
      ON individual.username = posts.username and posts.jobLocation='$city'";
          

  }
  else
  {


    $selectQuery= "SELECT *
    FROM individual
    RIGHT JOIN posts
    ON individual.username = posts.username; ";
  }
 
  print_r($selectQuery);
    if($result =mysqli_query($link,$selectQuery))
		  {
        
        if ($result->num_rows > 0) {
          	   
					 while($ads=mysqli_fetch_assoc($result))
					 {?>
     
    <div class="ul">
   
           
           <div class="li"><img src="imgs/logo.png" class="span" alt=""><label for="li" id="Job-title" class="title"><?= $ads["jobTitle"];?></label><br>
        <p class="descrption"><?= $ads["jobDescription"];?></p>
      <br><label for="li" class="info"><?= $ads["fname"];?></label><label for="li" class="info" data-type="date" ><?= $ads["uploadDate"];?></label>
      <label for="li" class="info" ><i class="fas fa-map-marker-alt"></i><?= $ads["jobLocation"];?></label>
      <label for="li" class="info"><i class="fas fa-dollar-sign"></i><?= $ads["salary"];?> per hour</label>
      <label for="li" class="info"><i class="far fa-bookmark"></i> <?= $ads["jobType"];?></label><i class="fas fa-chevron-circle-down" onclick="openJobDetails()"></i></div>
      <section class="post-overlay" id="postOverlay">
     

     <div class="post-container">
      <span class="closebtn" onclick="closeJobDetails()" title="Close Overlay">×</span>
       <h5><?= $ads["jobTitle"];?></h5>
     
<div class="JobDetails">
  <span></span>
     <label for="post-overlay" class="post-nav"><?= $ads["fname"];?></label>
     <label for="post-overlay" class="post-nav"><?= $ads["uploadDate"];?></label>
     
     <label for="post-overlay" class="post-nav"><i class="fas fa-map-marker-alt"></i><?= $ads["jobLocation"];?></label>
     <label for="post-overlay" class="post-nav"><i class="far fa-bookmark"></i> <?= $ads["jobType"];?></label>
     <br><br><br><br>
     <ul class="details-list">
   <li><label for="details-list" >Expire date:</label> <?= $ads["expireDate"];?></li>
 <li> <label for="details-list">salary:</label> <?= $ads["salary"];?> per day</li>  </ul>
     <br> 
     <table>
       <tr>
 <td><br><label for="description" class="details" >Description:</label></td> <td><p id="description"><?= $ads["jobDescription"];?></p></td></tr>
 <tr><td><label for="benefits" class="details">Benefits:</label></td><td><br><p  id="benefits"><?= $ads["benefits"];?></p></td></tr> 
  <tr> <td><label for="requirements" class="details">requirements:</label></td><td><br><br><br><br><p id="requirements"><?= $ads["requirements"];?></p></td></tr>
 <tr><td><br><br> <br><label for="location" class="details">job location:</label></td><td><p class="location"><?= $ads["jobLocation"];?></p></td></tr> 
  <tr><td><br><br><label for="note" class="details">note:</label></td><td><p class="note"><?= $ads["note"];?></p></td></tr>
</table></div>
<button class="post-btn" id="cancelbtn" onclick="closeJobDetails()" >cancel</button>
<button  class="post-btn">Apply for this job</button>
    </div>
   </section>
           <?php 
           }
      }
        }
      ?>

      <!-- <div class="li"><img src="imgs/logo.png" class="span" alt=""><label for="li" id="Job-title" class="title">Job Title</label><br>
        <p class="descrption">description</p>
      <br><label for="li" class="info">company/indivdual name</label><label for="li" class="info" data-type="date" >2021/2/1</label>
      <label for="li" class="info" ><i class="fas fa-map-marker-alt"></i> where</label>
      <label for="li" class="info"><i class="fas fa-dollar-sign"></i> per hour</label>
      <label for="li" class="info"><i class="far fa-bookmark"></i> job type</label><i class="fas fa-chevron-circle-down" onclick="openJobDetails()"></i></div> -->
     
      <!-- <div class="li"><img src="imgs/logo.png" class="span" alt=""><label for="li" id="Job-title" class="title">Job Title</label><br>
        <p class="descrption">description</p>
      <br><label for="li" class="info">company/indivdual name</label><label for="li" class="info" data-type="date" >2021/2/1</label>
      <label for="li" class="info" ><i class="fas fa-map-marker-alt"></i> where</label>
      <label for="li" class="info"><i class="fas fa-dollar-sign"></i> per hour</label>
      <label for="li" class="info"><i class="far fa-bookmark"></i> job type</label><i class="fas fa-chevron-circle-down" onclick="openJobDetails()"></i></div> -->
      <!-- <div class="li"><img src="imgs/logo.png" class="span" alt=""><label for="li" id="Job-title" class="title">Job Title</label><br>
        <p class="descrption">description</p>
      <br><label for="li" class="info">company/indivdual name</label><label for="li" class="info" data-type="date" >2021/2/1</label>
      <label for="li" class="info" ><i class="fas fa-map-marker-alt"></i> where</label>
      <label for="li" class="info"><i class="fas fa-dollar-sign"></i> per hour</label>
      <label for="li" class="info"><i class="far fa-bookmark"></i> job type</label><i class="fas fa-chevron-circle-down" onclick="openJobDetails()"></i></div> -->
        <div class="a"><a href="#">Show all relative posts</a></div>
        
      </div>
    
  </div>

</section>
<!--summer jobs-->
<section class="cards Other-cards SummerJobs " >

 
  <div class="inner-card other-cards summerJobs"id="summerJobs">
    <h2>Summer Jobs</h2>
    <div class="ul">
      <div class="li"><img src="imgs/logo.png" class="span" alt=""><label for="li" id="Job-title" class="title">Job Title</label><br>
        <p class="descrption">description</p>
      <br><label for="li" class="info">company/indivdual name</label><label for="li" class="info" data-type="date" >2021/2/1</label>
      <label for="li" class="info" ><i class="fas fa-map-marker-alt"></i> where</label>
      <label for="li" class="info"><i class="fas fa-dollar-sign"></i> per hour</label>
      <label for="li" class="info"><i class="far fa-bookmark"></i> job type</label><i class="fas fa-chevron-circle-down" onclick="openJobDetails()"></i></div>
      
      <div class="li"><img src="imgs/logo.png" class="span" alt=""><label for="li" id="Job-title" class="title">Job Title</label><br>
        <p class="descrption">description</p>
      <br><label for="li" class="info">company/indivdual name</label><label for="li" class="info" data-type="date" >2021/2/1</label>
      <label for="li" class="info" ><i class="fas fa-map-marker-alt"></i> where</label>
      <label for="li" class="info"><i class="fas fa-dollar-sign"></i> per hour</label>
      <label for="li" class="info"><i class="far fa-bookmark"></i> job type</label><i class="fas fa-chevron-circle-down" onclick="openJobDetails()"></i></div>
     
      <div class="li"><img src="imgs/logo.png" class="span" alt=""><label for="li" id="Job-title" class="title">Job Title</label><br>
        <p class="descrption">description</p>
      <br><label for="li" class="info">company/indivdual name</label><label for="li" class="info" data-type="date" >2021/2/1</label>
      <label for="li" class="info" ><i class="fas fa-map-marker-alt"></i> where</label>
      <label for="li" class="info"><i class="fas fa-dollar-sign"></i> per hour</label>
      <label for="li" class="info"><i class="far fa-bookmark"></i> job type</label><i class="fas fa-chevron-circle-down" onclick="openJobDetails()"></i></div>
      <div class="li"><img src="imgs/logo.png" class="span" alt=""><label for="li" id="Job-title" class="title">Job Title</label><br>
        <p class="descrption">description</p>
      <br><label for="li" class="info">company/indivdual name</label><label for="li" class="info" data-type="date" >2021/2/1</label>
      <label for="li" class="info" ><i class="fas fa-map-marker-alt"></i> where</label>
      <label for="li" class="info"><i class="fas fa-dollar-sign"></i> per hour</label>
      <label for="li" class="info"><i class="far fa-bookmark"></i> job type</label><i class="fas fa-chevron-circle-down" onclick="openJobDetails()"></i></div>
        <div class="a"><a href="#">Show all relative posts</a></div>
        
      </div>
  </div>

</section>
<!--weekend jobs-->
<section class="cards Other-cards WeekendJobs " id="weekendJobs">

 
  <div class="inner-card other-cards weekendJobs">
    <h2>Weekend Jobs</h2>
    <div class="ul">
      <div class="li"><img src="imgs/logo.png" class="span" alt=""><label for="li" id="Job-title" class="title">Job Title</label><br>
        <p class="descrption">description</p>
      <br><label for="li" class="info">company/indivdual name</label><label for="li" class="info" data-type="date" >2021/2/1</label>
      <label for="li" class="info" ><i class="fas fa-map-marker-alt"></i> where</label>
      <label for="li" class="info"><i class="fas fa-dollar-sign"></i> per hour</label>
      <label for="li" class="info"><i class="far fa-bookmark"></i> job type</label><i class="fas fa-chevron-circle-down" onclick="openJobDetails()"></i></div>
      
      <div class="li"><img src="imgs/logo.png" class="span" alt=""><label for="li" id="Job-title" class="title">Job Title</label><br>
        <p class="descrption">description</p>
      <br><label for="li" class="info">company/indivdual name</label><label for="li" class="info" data-type="date" >2021/2/1</label>
      <label for="li" class="info" ><i class="fas fa-map-marker-alt"></i> where</label>
      <label for="li" class="info"><i class="fas fa-dollar-sign"></i> per hour</label>
      <label for="li" class="info"><i class="far fa-bookmark"></i> job type</label><i class="fas fa-chevron-circle-down" onclick="openJobDetails()"></i></div>
     
      <div class="li"><img src="imgs/logo.png" class="span" alt=""><label for="li" id="Job-title" class="title">Job Title</label><br>
        <p class="descrption">description</p>
      <br><label for="li" class="info">company/indivdual name</label><label for="li" class="info" data-type="date" >2021/2/1</label>
      <label for="li" class="info" ><i class="fas fa-map-marker-alt"></i> where</label>
      <label for="li" class="info"><i class="fas fa-dollar-sign"></i> per hour</label>
      <label for="li" class="info"><i class="far fa-bookmark"></i> job type</label><i class="fas fa-chevron-circle-down" onclick="openJobDetails()"></i></div>
      <div class="li"><img src="imgs/logo.png" class="span" alt=""><label for="li" id="Job-title" class="title">Job Title</label><br>
        <p class="descrption">description</p>
      <br><label for="li" class="info">company/indivdual name</label><label for="li" class="info" data-type="date" >2021/2/1</label>
      <label for="li" class="info" ><i class="fas fa-map-marker-alt"></i> where</label>
      <label for="li" class="info"><i class="fas fa-dollar-sign"></i> per hour</label>
      <label for="li" class="info"><i class="far fa-bookmark"></i> job type</label><i class="fas fa-chevron-circle-down" onclick="openJobDetails()"></i></div>
        <div class="a"><a href="#">Show all relative posts</a></div>
        
      </div>
  </div>

</section>
<!--work from home jobs-->
<section class="cards Other-cards FromHomeJobs " >

 
  <div class="inner-card other-cards fromHomeJobs" id="workFromHome">
    <h2>Work From Home Jobs</h2>
    <div class="ul">
      <div class="li"><img src="imgs/logo.png" class="span" alt=""><label for="li" id="Job-title" class="title">Job Title</label><br>
        <p class="descrption">description</p>
      <br><label for="li" class="info">company/indivdual name</label><label for="li" class="info" data-type="date" >2021/2/1</label>
      <label for="li" class="info" ><i class="fas fa-map-marker-alt"></i> where</label>
      <label for="li" class="info"><i class="fas fa-dollar-sign"></i> per hour</label>
      <label for="li" class="info"><i class="far fa-bookmark"></i> job type</label><i class="fas fa-chevron-circle-down" onclick="openJobDetails()"></i></div>
      
      <div class="li"><img src="imgs/logo.png" class="span" alt=""><label for="li" id="Job-title" class="title">Job Title</label><br>
        <p class="descrption">description</p>
      <br><label for="li" class="info">company/indivdual name</label><label for="li" class="info" data-type="date" >2021/2/1</label>
      <label for="li" class="info" ><i class="fas fa-map-marker-alt"></i> where</label>
      <label for="li" class="info"><i class="fas fa-dollar-sign"></i> per hour</label>
      <label for="li" class="info"><i class="far fa-bookmark"></i> job type</label><i class="fas fa-chevron-circle-down" onclick="openJobDetails()"></i></div>
     
      <div class="li"><img src="imgs/logo.png" class="span" alt=""><label for="li" id="Job-title" class="title">Job Title</label><br>
        <p class="descrption">description</p>
      <br><label for="li" class="info">company/indivdual name</label><label for="li" class="info" data-type="date" >2021/2/1</label>
      <label for="li" class="info" ><i class="fas fa-map-marker-alt"></i> where</label>
      <label for="li" class="info"><i class="fas fa-dollar-sign"></i> per hour</label>
      <label for="li" class="info"><i class="far fa-bookmark"></i> job type</label><i class="fas fa-chevron-circle-down" onclick="openJobDetails()"></i></div>
      <div class="li"><img src="imgs/logo.png" class="span" alt=""><label for="li" id="Job-title" class="title">Job Title</label><br>
        <p class="descrption">description</p>
      <br><label for="li" class="info">company/indivdual name</label><label for="li" class="info" data-type="date" >2021/2/1</label>
      <label for="li" class="info" ><i class="fas fa-map-marker-alt"></i> where</label>
      <label for="li" class="info"><i class="fas fa-dollar-sign"></i> per hour</label>
      <label for="li" class="info"><i class="far fa-bookmark"></i> job type</label><i class="fas fa-chevron-circle-down" onclick="openJobDetails()"></i></div>
        <div class="a"><a href="#">Show all relative posts</a></div>
        
      </div>
  </div>

</section>
<!--evening jobs-->
<section class="cards Other-cards EveningJobs ">

 
  <div class="inner-card other-cards eveningJobs" id="eveningJobs">
    <h2>Evening Jobs</h2>
    <div class="ul">
      <div class="li"><img src="imgs/logo.png" class="span" alt=""><label for="li" id="Job-title" class="title">Job Title</label><br>
        <p class="descrption">description</p>
      <br><label for="li" class="info">company/indivdual name</label><label for="li" class="info" data-type="date" >2021/2/1</label>
      <label for="li" class="info" ><i class="fas fa-map-marker-alt"></i> where</label>
      <label for="li" class="info"><i class="fas fa-dollar-sign"></i> per hour</label>
      <label for="li" class="info"><i class="far fa-bookmark"></i> job type</label><i class="fas fa-chevron-circle-down" onclick="openJobDetails()"></i></div>
      
      <div class="li"><img src="imgs/logo.png" class="span" alt=""><label for="li" id="Job-title" class="title">Job Title</label><br>
        <p class="descrption">description</p>
      <br><label for="li" class="info">company/indivdual name</label><label for="li" class="info" data-type="date" >2021/2/1</label>
      <label for="li" class="info" ><i class="fas fa-map-marker-alt"></i> where</label>
      <label for="li" class="info"><i class="fas fa-dollar-sign"></i> per hour</label>
      <label for="li" class="info"><i class="far fa-bookmark"></i> job type</label><i class="fas fa-chevron-circle-down" onclick="openJobDetails()"></i></div>
     
      <div class="li"><img src="imgs/logo.png" class="span" alt=""><label for="li" id="Job-title" class="title">Job Title</label><br>
        <p class="descrption">description</p>
      <br><label for="li" class="info">company/indivdual name</label><label for="li" class="info" data-type="date" >2021/2/1</label>
      <label for="li" class="info" ><i class="fas fa-map-marker-alt"></i> where</label>
      <label for="li" class="info"><i class="fas fa-dollar-sign"></i> per hour</label>
      <label for="li" class="info"><i class="far fa-bookmark"></i> job type</label><i class="fas fa-chevron-circle-down" onclick="openJobDetails()"></i></div>
      <div class="li"><img src="imgs/logo.png" class="span" alt=""><label for="li" id="Job-title" class="title">Job Title</label><br>
        <p class="descrption">description</p>
      <br><label for="li" class="info">company/indivdual name</label><label for="li" class="info" data-type="date" >2021/2/1</label>
      <label for="li" class="info" ><i class="fas fa-map-marker-alt"></i> where</label>
      <label for="li" class="info"><i class="fas fa-dollar-sign"></i> per hour</label>
      <label for="li" class="info"><i class="far fa-bookmark"></i> job type</label><i class="fas fa-chevron-circle-down" onclick="openJobDetails()"></i></div>
        <div class="a"><a href="#">Show all relative posts</a></div>
        
      </div>
  </div>

</section>
<!--internships-->
<section class="cards Other-cards internships " >

 
  <div class="inner-card other-cards internships"id="internships">
    <h2>internships Jobs</h2>
    <div class="ul">
      <div class="li"><img src="imgs/logo.png" class="span" alt=""><label for="li" id="Job-title" class="title">Job Title</label><br>
        <p class="descrption">description</p>
      <br><label for="li" class="info">company/indivdual name</label><label for="li" class="info" data-type="date" >2021/2/1</label>
      <label for="li" class="info" ><i class="fas fa-map-marker-alt"></i> where</label>
      <label for="li" class="info"><i class="fas fa-dollar-sign"></i> per hour</label>
      <label for="li" class="info"><i class="far fa-bookmark"></i> job type</label><i class="fas fa-chevron-circle-down" onclick="openJobDetails()"></i></div>
      
      <div class="li"><img src="imgs/logo.png" class="span" alt=""><label for="li" id="Job-title" class="title">Job Title</label><br>
        <p class="descrption">description</p>
      <br><label for="li" class="info">company/indivdual name</label><label for="li" class="info" data-type="date" >2021/2/1</label>
      <label for="li" class="info" ><i class="fas fa-map-marker-alt"></i> where</label>
      <label for="li" class="info"><i class="fas fa-dollar-sign"></i> per hour</label>
      <label for="li" class="info"><i class="far fa-bookmark"></i> job type</label><i class="fas fa-chevron-circle-down" onclick="openJobDetails()"></i></div>
     
      <div class="li"><img src="imgs/logo.png" class="span" alt=""><label for="li" id="Job-title" class="title">Job Title</label><br>
        <p class="descrption">description</p>
      <br><label for="li" class="info">company/indivdual name</label><label for="li" class="info" data-type="date" >2021/2/1</label>
      <label for="li" class="info" ><i class="fas fa-map-marker-alt"></i> where</label>
      <label for="li" class="info"><i class="fas fa-dollar-sign"></i> per hour</label>
      <label for="li" class="info"><i class="far fa-bookmark"></i> job type</label><i class="fas fa-chevron-circle-down" onclick="openJobDetails()"></i></div>
      <div class="li"><img src="imgs/logo.png" class="span" alt=""><label for="li" id="Job-title" class="title">Job Title</label><br>
        <p class="descrption">description</p>
      <br><label for="li" class="info">company/indivdual name</label><label for="li" class="info" data-type="date" >2021/2/1</label>
      <label for="li" class="info" ><i class="fas fa-map-marker-alt"></i> where</label>
      <label for="li" class="info"><i class="fas fa-dollar-sign"></i> per hour</label>
      <label for="li" class="info"><i class="far fa-bookmark"></i> job type</label><i class="fas fa-chevron-circle-down" onclick="openJobDetails()"></i></div>
        <div class="a"><a href="#">Show all relative posts</a></div>
        
      </div>
  </div>

</section>
<!--appernitships-->
<section class="cards Other-cards Apprenticeship ">

 
  <div class="inner-card other-cards apprenticeship"  id="apprenticeship">
    <h2>Apprenticeship</h2>
    <div class="ul">
      <div class="li"><img src="imgs/logo.png" class="span" alt=""><label for="li" id="Job-title" class="title">Job Title</label><br>
        <p class="descrption">description</p>
      <br><label for="li" class="info">company/indivdual name</label><label for="li" class="info" data-type="date" >2021/2/1</label>
      <label for="li" class="info" ><i class="fas fa-map-marker-alt"></i> where</label>
      <label for="li" class="info"><i class="fas fa-dollar-sign"></i> per hour</label>
      <label for="li" class="info"><i class="far fa-bookmark"></i> job type</label><i class="fas fa-chevron-circle-down" onclick="openJobDetails()"></i></div>
      
      <div class="li"><img src="imgs/logo.png" class="span" alt=""><label for="li" id="Job-title" class="title">Job Title</label><br>
        <p class="descrption">description</p>
      <br><label for="li" class="info">company/indivdual name</label><label for="li" class="info" data-type="date" >2021/2/1</label>
      <label for="li" class="info" ><i class="fas fa-map-marker-alt"></i> where</label>
      <label for="li" class="info"><i class="fas fa-dollar-sign"></i> per hour</label>
      <label for="li" class="info"><i class="far fa-bookmark"></i> job type</label><i class="fas fa-chevron-circle-down" onclick="openJobDetails()"></i></div>
     
      <div class="li"><img src="imgs/logo.png" class="span" alt=""><label for="li" id="Job-title" class="title">Job Title</label><br>
        <p class="descrption">description</p>
      <br><label for="li" class="info">company/indivdual name</label><label for="li" class="info" data-type="date" >2021/2/1</label>
      <label for="li" class="info" ><i class="fas fa-map-marker-alt"></i> where</label>
      <label for="li" class="info"><i class="fas fa-dollar-sign"></i> per hour</label>
      <label for="li" class="info"><i class="far fa-bookmark"></i> job type</label><i class="fas fa-chevron-circle-down" onclick="openJobDetails()"></i></div>
      <div class="li"><img src="imgs/logo.png" class="span" alt=""><label for="li" id="Job-title" class="title">Job Title</label><br>
        <p class="descrption">description</p>
      <br><label for="li" class="info">company/indivdual name</label><label for="li" class="info" data-type="date" >2021/2/1</label>
      <label for="li" class="info" ><i class="fas fa-map-marker-alt"></i> where</label>
      <label for="li" class="info"><i class="fas fa-dollar-sign"></i> per hour</label>
      <label for="li" class="info"><i class="far fa-bookmark"></i> job type</label><i class="fas fa-chevron-circle-down" onclick="openJobDetails()"></i></div>
        <div class="a"><a href="#">Show all relative posts</a></div>
        
      </div>
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