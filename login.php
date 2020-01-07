<?php 

require_once('dbcon.php');

$logemail = $_POST['log1'];
$logpassword = $_POST['log2'];


$sql = "SELECT email,password from numbers where email='".$logemail."' and password='".$logpassword."' ";


$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
	
	if (isset($_POST['log1'], $_POST['log2'])) 
	{
		$logemail = $_POST['log1'];
		$logpassword = $_POST['log2'];
	}
	
	$done = 25;
	echo 25;   
}
else
{
	$loginfailed = "error occured, try again";
	//echo $loginfailed;
	echo '<div class="alert alert-primary" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>'.$loginfailed.'</div>';
}

mysqli_close($conn);

?>