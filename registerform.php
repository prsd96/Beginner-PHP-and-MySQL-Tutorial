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

		<br><a href="index.html"><button type="button" class="btn btn-warning">Go back to Home Page</button></a>
		<a href="userloginform.php"><button type="button" class="btn btn-warning">Log  in</button></a>
		<a href="dbdata.php"><button type="button" class="btn btn-warning">Records</button></a>
		<br><br>

		<center><h3>Sign up Form</h3>

		<div id="result" style="width:80%;"></div></center>

		
		<div class="form-group">
			<label for="name">Name:</label>
			<input type="text" name="name" id="empname" class="form-control" placeholder="Enter your name">
		</div>

		<div class="form-group">
			<label for="name">Username:</label>
			<input type="text" name="username" id="empusername" class="form-control" placeholder="Enter your username">
		</div>

		<div class="form-group">
			<label for="email">Email:</label>
			<input type="email" name="email" id="empemail" class="form-control" placeholder="Enter your email">
		</div>

		<div class="form-group">
			<label for="contact">Contact:</label>
			<input type="text" name="contact" id="empcontact" class="form-control" placeholder="Enter your contact">
		</div>

		<div class="form-group">
			<center>
				<p>We will be sending you an Verification email to verify your account once you submit the form!</p>
			</center>
		</div>

		<div class="form-group">
			<center>
				<button id="registerbutton" class="btn btn-success"> Submit </button>
			</center>
		</div>

	</div>


	<script type="text/javascript">
		$('#registerbutton').click(function() 
		{
			$.ajax
			({
				type: 'POST',
				url: 'register.php',
				data: 
				{ 
					reg1: $('#empname').val(), 
					reg2: $('#empusername').val(), 
					reg3: $('#empemail').val(), 
					reg5: $('#empcontact').val()				 
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