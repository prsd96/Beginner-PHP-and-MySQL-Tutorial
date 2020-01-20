<?php 
session_start();
require 'dbcon.php';

$autodetails = $_SESSION['loginemail'];

if (!isset($autodetails)) 
{
	header('Location: loginform.php');
}

$autodetailssql = "SELECT * FROM numbers WHERE email = '$autodetails' ";
$autodetailssqldata = $conn-> query($autodetailssql);
$autodetailssqldataresults = $autodetailssqldata->fetch_assoc();

?>


<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="stylecode.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

	<div class="container" style="width: 50%">

		<center>
			<h3>Reset Password</h3>
			<div id="result" style="width:80%;"></div>
		</center>

		<div class="form-group">
			<label for="name">Username:  
				<strong>
					<?php echo $autodetailssqldataresults["username"] ?>
				</strong>
			</label>
		</div>

		<div class="form-group">
			<label for="email">Email:  
				<strong>
					<?php echo $autodetailssqldataresults["email"] ?>
				</strong>
			</label>
		</div>

		<div class="form-group">
			<label for="password">Password:</label>
			<input type="password" name="pass" id="emppassword" class="form-control" placeholder="Enter your password">
		</div>

		<div class="form-group">
			<label for="confirmpassword">Confirm Password:</label>
			<input type="password" name="confirmpassword" id="confirmpass" class="form-control" placeholder="Reenter your password">
		</div>

		<div class="form-group">
			<center>
				<button id="chngpwd" class="btn btn-success"> Change Password </button> 
			</center>
		</div>

	</div>

	<script type="text/javascript">
		$('#chngpwd').click(function() 
		{
			$.ajax
			({
				type: 'POST',
				url: 'setpassword.php',
				data: 
				{
					pwdxx: $('#emppassword').val(), 
					pwdyy: $('#confirmpass').val() 
				},

				success: function(response) 
				{
					if(response!=25)
					{
						$('#result').html(response);
					}
				}
			});
		});
	</script>

</body>
</html>