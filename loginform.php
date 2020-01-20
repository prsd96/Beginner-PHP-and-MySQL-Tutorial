<!DOCTYPE html>
<html>
<head>
	<title>Log in</title>
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

		<br><a href="index.html"><button type="button" class="btn btn-warning">Go back to Home Page</button></a>
		<a href="registerform.php"><button type="button" class="btn btn-warning">Register</button></a>
		<a href="dbdata.php"><button type="button" class="btn btn-warning">Records</button></a>
		<br><br>

		<center>
			<h3>Sign up Form</h3>
			<div id="result" style="width:80%;"></div>
		</center>

		<div class="form-group">
			<label for="email">Email:</label>
			<input type="email" name="email" id="empemail" class="form-control" placeholder="Enter your email">
		</div>

		<div class="form-group">
			<label for="password">Password:</label>
			<input type="password" name="pass" id="emppassword" class="form-control" placeholder="Enter your password">
		</div>

		<div class="form-group">
			<center>
				<button id="loginbutton" class="btn btn-success"> Log in </button>
			</center>
		</div>

	</div>

	<script type="text/javascript">
		$('#loginbutton').click(function() 
		{
			$.ajax
			({
				type: 'POST',
				url: 'login.php',
				data: 
				{
					log1: $('#empemail').val(), 
					log2: $('#emppassword').val() 
				},

				success: function(response) 
				{
					if(response!=25)
					{
						$('#result').html(response);
					}
					else
					{
						alert("log in successful");
						window.open("setpasswordform.php","_self");
					}
					
				}
			});
		});
	</script>

</body>
</html>