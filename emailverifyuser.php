<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'phpmailer/vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

//Server settings

$mail->isSMTP();    // Send using SMTP

$mail->Host = 'smtp.gmail.com';    
// Set the SMTP server to send through

$mail->SMTPAuth = true;  // Enable SMTP authentication
    
$mail->Username = 'proirache@gmail.com';   // SMTP username
$mail->Password = 'prasad 18598';   // SMTP password

$mail->SMTPSecure = 'tls';    
// Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    

$mail->Port = 587;    // TCP port to connect to

//Recipients
$mail->setFrom('proirache@gmail.com', '192.168.43.171');

$mail->addAddress($regemail,$regusername); // Add a recipient
    

$emailcontent = '
<p>Thanks for signing up <strong>'.$regname.'!</strong><br>
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.<br><br>

------------------------<br>
Username:  <strong>'.$regusername.'</strong><br>
Email:  <strong>'.$regemail.'</strong><br>
Password:  <strong>'.$randompassword.'</strong><br>
------------------------<br><br>

Please click this link to activate your account:<br>
192.168.43.171/codescodescodes/GitHubProjects/Beginner-PHP-and-MySQL-Tutorial/verifysignup.php?email='.$regemail.'&hash='.$hash.'
<br></p>

';


// Content
$mail->isHTML(true);  // Set email format to HTML
$mail->Subject = 'Signup | Verification';
$mail->Body    = $emailcontent;
$mail->AltBody = strip_tags($emailcontent);

$mail->send();
// echo '
// <script type="text/javascript">
// alert("Your account has been made, please verify it by clicking the activation link that has been send to your email.");
// window.open("verifyaccountalert.php","_self");
// </script>
// ';