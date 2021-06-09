<?php
// Include config file
require_once "db_connect.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = $lname=$fname= $Email= $birthDate=$address= "";
$username_err = $password_err = $confirm_password_err =$Eamil_err= "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
if(isset($_POST["signin"])){
    
    //validate fname
    if(empty(trim($_POST["fname"])))
    {
        $username_err = "Please enter your first name.";
      } elseif(!preg_match('/^[a-zA-Z_]+$/', trim($_POST["fname"]))){
        $fname_err = "name can only contain letters";
     } else{echo'shit';
      
            
            // Set parameters
          $fname = trim($_POST["fname"]);
            
           
        
           
        
    }
    //last name 
    $lname = trim($_POST["lname"]);
 
    // Validate username
    if(empty(trim($_POST["user"])))
    {
        $username_err = "Please enter a username.";
      } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["user"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";
     } else{
        // Prepare a select statement
        $sql = "SELECT fname FROM individual WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["user"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["user"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["pass"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["pass"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["pass"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["Rpass"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["Rpass"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    //Email
    if(empty(trim($_POST["Email"])))
    {
        $Email_err = "Please enter an Email";
      } elseif (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
      
     } else{
        // Prepare a select statement
        $sql = "SELECT username FROM individual WHERE Email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_Email);
            
            // Set parameters
            $param_Eamil = trim($_POST["Email"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $Email_err = "This username is already taken.";
                } else{
                    $Email = trim($_POST["Email"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    //birth Date
   
        $birthDate = trim($_POST["birth"]);

//address
$address=trim($_POST["address"]);

       
        
    

    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err && empty($Email_err) && empty( $fname_err))){
        
        // Prepare an insert statement
        $sql = "INSERT INTO individual (username, Password,fname,lname ,Eamil,Address,birthDate) VALUES (?, ?,?,?,?,?,?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password,$param_fname,$param_lname,$param_Email,$param_address,$param_birth);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_fname=$fname;
            $param_lname=$lname;
            $param_Email=$Email;
            $param_address=$address;
            $param_birth=$birthDate;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
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