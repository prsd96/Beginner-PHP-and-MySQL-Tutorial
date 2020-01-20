<?php 

session_start();
require_once('dbcon.php');

$logemail = $_SESSION['loginemail'];
$logpwd = $_POST['pwdxx'];
$logpwdxx = $_POST['pwdyy'];

if($logpwd != $logpwdxx)
{
	$mismatchpass = "passwords do not match";
	//echo $mismatchpass;
	echo '<div class="alert alert-primary" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>'.$mismatchpass.'</div>';
}
else
{
	$encryptpwd = md5($logpwd);
	$pwdsql = "UPDATE numbers SET password = '$encryptpwd' WHERE email = '$logemail' ";
	$result = $conn->query($pwdsql);
	echo '
	<script type="text/javascript">
	window.open("sessionout.php","_self");
	</script>
	';
}

mysqli_close($conn);

?>