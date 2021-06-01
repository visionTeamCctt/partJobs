<?php 
// switch($_POST['submit']){
//     case 'looking for a job':
//      whereAndWhat();
//       break;
  
//      case 'display' :
//     /// display();
//       break;
//   }
  function indiLogin()

//ديري include في كل صفحة حيصير فيها اللوق ان بعدين 
// وديري call للدالة 
{echo 'shit';
  global $link;
  // Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
  // Check if username is empty
  if(empty(trim($_POST["user"]))){
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
  $sql = "SELECT  username, Upassword FROM users WHERE username =  ؟";
  if($stmt = mysqli_prepare($link, $sql)){
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "s", $param_username);
     // Set parameters
    $param_username = $username;
    
    // Attempt to execute the prepared statement
    if(mysqli_stmt_execute($stmt)){
      // Store result
      mysqli_stmt_store_result($stmt);
      // Check if username exists, if yes then verify password
         if(mysqli_stmt_num_rows($stmt) == 1){                    
        // Bind result variables
        mysqli_stmt_bind_result($stmt, $username, $hashed_password);
        if(mysqli_stmt_fetch($stmt)){
          if(password_verify($password, $hashed_password)){
            echo'<script>alert("your in")</script>';
              // Password is correct, so start a new session
              session_start();
              
              // Store data in session variables
              $_SESSION["loggedin"] = true;
              // $_SESSION["id"] = $id;
              $_SESSION["username"] = $username;                            
             
              // Redirect user to welcome page
              header("location: index.php");
          } else{
              // Password is not valid, display a generic error message
              $login_err = "Invalid username or password.";
          }
      }
  }else{
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
}
      



  
  
function whereAndWhat(){
    global $link;
    include 'db_connect.php';
    //variables for what and where
    $where= mysqli_real_escape_string($link,$_REQUEST['city']);
    $what= mysqli_real_escape_string($link,$_REQUEST['keywors']);

    //if "what"=null & where = not null search by where else do the oppiste or use both if 
    //both got value
    if($where==null && $what!=null){
        $sql="SELECT username,fname FROM individual";
    }else if ($where!=null && $what==null){
        $sql="SELECT username,Upassword, FROM individual";
    }else if($where!=null && $what!=null){
        $sql="SELECT Upassword,fname FROM individual";
    }
    $results=mysqli_query($link,$sql);

    if(mysqli_num_rows($results)>0){
        echo '<script>alert("done")</script>';
       
        
      
        }
      else{
        echo '<script>alert("NO")</script>';
      }
}
?>



