<?php
session_start();
// Initialize the session
require_once "db_connect.php";
global $username;
global$password;
global  $username_err;
global  $password_err;

if(isset($_POST["login"])){

 $username=$_POST["user"];
  $password=$_POST["pass"];
  $selectQuery="SELECT * FROM individual WHERE
   username='$username' and Password='$password'";
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
  
}

?>