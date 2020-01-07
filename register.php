<?php 

require_once('dbcon.php');

$regname = $_POST['reg1'];
$regemail = $_POST['reg2'];
$regpassword = $_POST['reg3'];
$regcontact = $_POST['reg4'];
$regrepass = $_POST['regxx'];


//check connection
if ($conn->connect_error)
{
	die("Connection failed: ". $conn->connect_error);
}

if($regname == '' || $regemail == '' || $regpassword == '' || $regcontact == '')
{
	$emptyfields = "fill all fields";
	//echo $emptyfields;
	echo '<div class="alert alert-primary" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>'.$emptyfields.'</div>';
}
else
{
	if($regpassword != $regrepass)
	{
		$mismatchpass = "passwords do not match";
		//echo $mismatchpass;
		echo '<div class="alert alert-primary" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>'.$mismatchpass.'</div>';
	}
	else
	{
		//$encryptpassword = md5($regpassword);
		$encryptpassword = $regpassword;
		
		//insert query
		$sql = "INSERT INTO numbers(name,email,password,contact) VALUES('$regname','$regemail','$encryptpassword','$regcontact')";

		//insert query status
		if(mysqli_query($conn,$sql))
		{
			$done = 25;
			echo 25;
			
		}else
		{
			echo $conn->error;
		}
	}
}

mysqli_close($conn);

?>