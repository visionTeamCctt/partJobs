<?php

// Include config file
require_once "db_connect.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = $lname=$fname= $Email= $birthDate=$address= "";
$username_err = $password_err = $confirm_password_err=$birthDate_err =$Eamil_err= "";
$errors = array();
// Processing form data when form is submitted

if(isset($_POST["signin"])){
    $fname=mysqli_real_escape_string($link,$_POST['fname']);
    $lname=mysqli_real_escape_string($link,$_POST['lname']);
    $username=mysqli_real_escape_string($link,$_POST['user']);
    $password=mysqli_real_escape_string($link,$_POST['pass']);
    $Email=mysqli_real_escape_string($link,$_POST['Email']);
    $birthDate=mysqli_real_escape_string($link,$_POST['birth']);
    $address=mysqli_real_escape_string($link,$_POST['address']);
    $sqlInsert="INSERT INTO individual ( username, fname, Lname,PASSWORD,Email,birthDate, Address) 
    VALUES ('$username', '$fname', '$lname', '$password', '$Email','$birthDate','$address')";
    $Email_check_query = "SELECT * FROM individual WHERE Email='$Email' LIMIT 1";
    $username_check_query = "SELECT * FROM individual WHERE username='$username' LIMIT 1";
    // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$Email' LIMIT 1";
  $result = mysqli_query($link, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['Email'] === $Email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
   // session_start();
  	$password = md5($password_1);//encrypt the password before saving in the database

  	
  	mysqli_query($link,  $sqlInsert);
    $sql="SELECT * FROM individual where username= '$username'";
    $resultuserID=mysqli_query($link,$sql);
    $row=mysqli_fetch_assoc($resultuserID);
    $_SESSION['userID']=$row['userID'];
    $_SESSION['Login']=1;
  	$_SESSION['UserName'] = $username;
    
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }else { echo'<script>';
    echo 'alert("error")';
   echo '</script>';}}