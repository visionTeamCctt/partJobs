<?php
 use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST['searchsubmit']) && isset($_POST['EmailS'])){
   
require_once ("PHPMailer/PHPMailer.php");
require_once ("PHPMailer/SMTP.php");
require_once ("PHPMailer/Exception.php");
function SendMail( $ToEmail, $MessageHTML, $MessageTEXT ) {
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
    $Mail->Subject     = 'Ad:Part Time Jobs';
    $Mail->ContentType = 'text/html; charset=utf-8\r\n';
    $Mail->From   = $_POST['EmailS'];//'wemookok12@gmail.com';//from database
    $Mail->FromName    ='job Seeker'; // 'GMail Test';
    $Mail->WordWrap    = 900; // RFC 2822 Compliant for Max 998 characters per line
  
    $Mail->AddAddress( $ToEmail ); // To:
    $Mail->isHTML( TRUE );
    $Mail->CharSet = 'UTF-8';
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
    
    if(isset($_POST['EmailS']) ){
      if(isset($_POST['searchsubmit'])){
      $ToEmail = $_POST['EmailS'];//where to send the email
    $ToName  ='job seeker';

    $MessageHTML ='Hi, you searched a job through our site here is some ads:'.'';//trying to insert the next var to the next line!!
     
      
    $MessageTEXT="ads";
    $body = "<html>\n"; 
    $body .= "<body style=\"font-family:Verdana, Verdana, Geneva, sans-serif; font-size:12px; color:#666666;\">\n"; 
    $body = $MessageHTML; 
    $body .= "</body>\n"; 
    $body .= "</html>\n"; 

    $headers  = "From:Part Time Jobs<n@example.com>\r\n"; 
    $headers .= "Reply-To:".$_POST['EmailS']." \r\n"; 
  
    $headers .= $_SESSION['jobsT']."\n"; 
    $headers .=  $_SESSION['jobsD'] . "\n"; 
    $headers .= 'visit jobs.php for more info' . "\r\n"; 

    $Send = SendMail( $ToEmail, $MessageHTML, $MessageTEXT,$body,$headers);
    if ( $Send ) {
        header('Location:jobs.php');
    
      
    }}
    else {
     
    }
    die;
    
}}
?>