<?php 

require_once('dbcon.php');

$name = $_POST['text1'];
$email = $_POST['text2'];
$password = $_POST['text3'];
$contact = $_POST['text4'];
$repass = $_POST['textxx'];


//check connection
if ($conn->connect_error)
{
	die("Connection failed: ". $conn->connect_error);
}

if($name == '' || $email == '' || $password == '' || $contact == '')
{
	$fields = "fill all fields";
	echo $fields;
}
else
{
	if($password != $repass)
	{
		$mismatch = "passwords do not match";
		echo $mismatch;
	}
	else
	{
		$encryptpassword = md5($password);
		//insert query
		$sql = "INSERT INTO numbers(name,email,password,contact) VALUES('$name','$email','$encryptpassword','$contact')";

		//insert query status
		if(mysqli_query($conn,$sql))
		{
			$done = "successful!!";
			echo $done;
		}else
		{
			echo $conn->error;
		}
	}
}

mysqli_close($conn);

?>

