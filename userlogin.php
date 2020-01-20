<?php 

session_start();
require_once('dbcon.php');

$loginemail = $_POST['ulog1'];
$loginpassword = md5($_POST['ulog2']);


$uloginsql = "SELECT email,password FROM numbers WHERE email='$loginemail' AND password='$loginpassword' ";

$uloginresult = $conn->query($uloginsql);

if ($uloginresult->num_rows > 0) 
{
	$_SESSION['userloginemail'] = $loginemail;
	$done = 25;
	echo $done;   
}
else
{
	$loginfailed = "Log in failed";
	//echo $loginfailed;
	echo '<div class="alert alert-primary" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>'.$loginfailed.'</div>';
}

mysqli_close($conn);

?>