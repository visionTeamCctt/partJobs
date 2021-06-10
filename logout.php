<?php 
session_start();
$_SESSION["UserName"]="";
if(session_destroy()){
    header("Location: index.php");

}
?>