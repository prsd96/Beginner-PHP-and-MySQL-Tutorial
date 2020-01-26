<?php 

// check if passwords are the same

if($regpassword != $regrepass)
{
	$mismatchpass = "passwords do not match";
	//echo $mismatchpass;
	echo '<div class="alert alert-primary" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>'.$mismatchpass.'</div>';
}

// if fields are left empty

if($regname == '' || $regusername == '' || $regemail == '' || $regpassword == '' || $regcontact == '')



// ----------------------------------------
// mail function

$to = $regemail; // Send email to our user
$subject = 'Signup | Verification'; // Give the email a subject
$message = '
Thanks for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.

------------------------
Username: '.$regusername.'
Email: '.$regemail.'
Password: '.$randompassword.'
------------------------

Please click this link to activate your account:
192.168.43.171/Beginner-PHP-and-MySQL-Tutorial/emailverifyuser.php?email='.$regemail.'&hash='.$hash.'

'; // Our message above including the link

$headers = 'From: proirache@gmail.com' . "\r\n"; // Set from headers

//mail($to, $subject, $message, $headers); // Send our email

if (mail($to, $subject, $message, $headers))
{
	echo 25;
}
else
{
	//echo "Email sending failed...";
	$emailsendingfailed = "Email sending failed, please try again!!";
	//echo $emailsendingfailed;
	echo '<div class="alert alert-primary" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>'.$emailsendingfailed.'</div>';
}

//--------------------------------------------------

try {
    //Server settings

    //$mail->SMTPDebug = 1;  // Enable verbose debug output

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
    $mail->setFrom('proirache@gmail.com', 'Pro');
    $mail->addAddress('prasadirache96@gmail.com'); // Add a recipient
    
    //$mail->addAddress('ellen@example.com');  // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    $body = '<p><strong>Hello,</strong> this is my forst email using PHPMailer.</p>';

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Sign Up | Verification Email';
    $mail->Body    = $body;
    $mail->AltBody = strip_tags($body);

    $mail->send();
    echo '
    <script type="text/javascript">
    window.open("index.html","_self");
    alert("Email has been sent!!");
    </script>';
} 
catch (Exception $e) 
{
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

//-------------------------------------------------




    //-------------------------------------------------





?>

<!-- dropdown in navbar -->
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Dropdown
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Something else here</a>
    </div>
</li>


<!-- search option in navbar -->
<form class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</form>