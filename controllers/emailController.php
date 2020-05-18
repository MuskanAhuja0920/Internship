<?php
require_once 'vendor/autoload.php';
require_once 'config/constants.php';

// Create the Transport(email server )
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465 , 'ssl'))  //465 is port number for gmail
  ->setUsername(EMAIL)
  ->setPassword(PASSWORD);
$msg='';
// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

function sendVerificationEmail($userEmail,$token)
{
$body='<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <style>
    
    </style>
    <title>Verify Email</title>
</head>
<body>
    <div class="wrapper">
    <p>
    Thank you for signing up on our website. Please click on the link below to verify your email.
    </p>
    <a href="http://localhost/Internship/home.php?token=' .$token.'">
    Verify your Email address.
    </a>
    </div>
</body>
</html>';


global $mailer;
// Create a message
$message = (new Swift_Message('Verify your email address'))
  ->setFrom(EMAIL)
  ->setTo($userEmail)
  ->setBody($body,'text/html');
  

// Send the message
$result = $mailer->send($message);
}



/////////////////////////////////////////recover password///////////////////////////////////

function sendRecoveryEmail($uemail,$selector,$token)
{
  $body='<!DOCTYPE html>

  <html lang="en" xmlns="http://www.w3.org/1999/xhtml">
  <head>
      <meta charset="utf-8" />
      <style>
      
      </style>
      <title>Recover Password</title>
  </head>
  <body>
      <div class="wrapper">
      <p>
      We received a reset password request from you.Click on the link below to reset your password.<br>
      Please ignore the message if not requested.<br>
      Thank you.
      </p>
      <a href="http://localhost/Internship/recoverpass.php?selector=' .$selector. "&validator=" .bin2hex($token).'">
      Reset your password
      </a>
      </div>
  </body>
  </html>';

global $mailer;
// Create a message
$message = (new Swift_Message('Reset Password'))
  ->setFrom(EMAIL)
  ->setTo($uemail)
  ->setBody($body,'text/html');
 
  $result = $mailer->send($message);
if(!$result)
  {
      $msg='<div class="alert alert-danger text-center">
      Something Went Wrong!
      </div>';
  }
  else{
      $msg='<div class="alert alert-succes text-center">
      Email Sent Succesfully!
      </div>';
  }

}




?>