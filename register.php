<?php 

//session_start();
require_once('dbcon.php');

$regname = $_POST['reg1'];
$regusername = $_POST['reg2'];
$regemail = $_POST['reg3'];
$regcontact = $_POST['reg5'];


//check connection
if ($conn->connect_error)
{
	die("Connection failed: ". $conn->connect_error);
}


if($regname == '' || $regusername == '' || $regemail == '' || $regcontact == '')
{
	$emptyfields = "fill all fields";
	//echo $emptyfields;
	echo '<div class="alert alert-primary" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>'.$emptyfields.'</div>';
}
else
{
	if (!filter_var($regemail, FILTER_VALIDATE_EMAIL)) 
	{
		$invalideemail = "Invalid email format!";
		echo '<div class="alert alert-primary" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>'.$invalideemail.'</div>';
	}
	else
	{
		$uniqueemail = "SELECT email FROM numbers WHERE email='".$regemail."' ";

		$uniqueemailresult = $conn->query($uniqueemail);

		if($uniqueemailresult->num_rows > 0)
		{
			$duplicateemail = "Email already exists, try another one!!";
			//echo $duplicateemail;
			echo '<div class="alert alert-primary" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>'.$duplicateemail.'</div>';
		}
		else
		{
			//$_SESSION['unverifiedemail'] = $regemail;
			$randompassword = rand(1000,5000);
			$encryptpassword  = md5($randompassword);
			$hash = md5(rand(0,1000));
			$active = "Not Verified";

			//insert query
			$sql = "INSERT INTO numbers(name,username,email,password,contact,hash,active) VALUES('$regname','$regusername','$regemail','$encryptpassword','$regcontact','$hash','$active')";

			//insert query status
			if(mysqli_query($conn,$sql))
			{
				include 'emailverifyuser.php';
				echo '
				<script type="text/javascript">
				alert("Your account has been made, please verify it by clicking the activation link that has been send to your email.");
				window.open("verifyaccountalert.php","_self");
				</script>
				';
			}
			else
			{
				echo $conn->error;
			}
		}
	}
}

mysqli_close($conn);

?>