<?php 

session_start();
require_once('dbcon.php');

$logemail = $_POST['log1'];
$logpassword = md5($_POST['log2']);


$sql = "SELECT email,password,active FROM numbers WHERE email='$logemail' AND password='$logpassword' AND active = 'Verified' ";

$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
	$_SESSION['loginemail'] = $logemail;
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