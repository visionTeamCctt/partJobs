<?php
use PHPMailer\PHPMailer\PHPMailer;
require_once ("PHPMailer/PHPMailer.php");
require_once ("PHPMailer/SMTP.php");
require_once ("PHPMailer/Exception.php");
function SendMail( $ToEmail, $MessageHTML, $MessageTEXT ) {

  
   // Add the path as appropriate
  $Mail = new PHPMailer();
  $Mail->IsSMTP(); // Use SMTP
  $Mail->Host        = "smtp.gmail.com"; // Sets SMTP server
  $Mail->SMTPDebug   = 2; // 2 to enable SMTP debug information
  $Mail->SMTPAuth    = TRUE; // enable SMTP authentication
  $Mail->SMTPSecure  = "tls"; //Secure conection
  $Mail->Port        = 587; // set the SMTP port
  $Mail->Username    = 'wowcool56789@gmail.com'; // SMTP account username
  $Mail->Password    = 'wemookok12'; // SMTP account password
  $Mail->Priority    = 1; // Highest priority - Email priority (1 = High, 3 = Normal, 5 = low)
  $Mail->CharSet     = 'UTF-8';
  $Mail->Encoding    = '8bit';
  $Mail->Subject     = 'Contacting Email';
  $Mail->ContentType = 'text/html; charset=utf-8\r\n';
  $Mail->From        = $_POST['E-mail'];//'wemookok12@gmail.com';//from database
  $Mail->FromName    =$_POST['name']; // 'GMail Test';
  $Mail->WordWrap    = 900; // RFC 2822 Compliant for Max 998 characters per line

  $Mail->AddAddress( $ToEmail ); // To:
  $Mail->isHTML( TRUE );
  $Mail->Body    = $MessageHTML;
  $Mail->AltBody = $MessageTEXT;
  $Mail->Send();
  $Mail->SmtpClose();

  if ( $Mail->IsError() ) { // ADDED - This error checking was missing
  
    return FALSE;}

  else
    return TRUE;
  
}



//isset

if(isset($_POST['name']) && isset($_POST['E-mail']) && isset($_POST['subject'])){
  $ToEmail = $_POST['E-mail'];//where to send the email
$ToName  =$_POST['name'];//'Name';//from from
 
  $MessageHTML=$_POST['subject'];
$MessageTEXT=$_POST['subject'];
$Send = SendMail( $ToEmail, $MessageHTML, $MessageTEXT );
if ( $Send ) {

  header('Location:index.php');
   ?><script>alert('Email sent successfully!')</script><?php

}
else {
  ?><script>alert('Email sent successfully!')</script><?php
}
die;
}
?>