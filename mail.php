<?php

$url= "PHPMailer/class.smtp.php";
include("$url"); 
// optional, gets called from within class.phpmailer.php if not 
$url2="PHPMailer/class.phpmailer.php";
require_once("$url2");

$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username   = "arogyasair@gmail.com";  // GMAIL username
$mail->Password   = "nrtj tjtr cfzf yzej";            // GMAIL password

$mail->SetFrom("arogyasair@gmail.com");
$mail->Subject = "Test Mail";
$email="devmtamakuwala2424@gmail.com";

$permitted_chars = '0123456789';
$otp=substr(str_shuffle($permitted_chars), 0, 5);

//http://127.0.0.1/hope/CodeIgniter-3.1.6//index.php/login_con/resetpass
$mail->Body = "Hello OTP is $otp";
$mail->AddAddress($email);
 if(!$mail->Send())
    {
   echo "Mailer Error: " . $mail->ErrorInfo;
    }
    else
    {
		
   echo "Message has been sent $otp";
    }
	
?>