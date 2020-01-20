<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="stylecode.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

	<br><a href="index.html"><button type="button" class="btn btn-warning">Go back to Home Page</button></a>
	<a href="registerform.php"><button type="button" class="btn btn-warning">Register</button></a>
	<a href="userloginform.php"><button type="button" class="btn btn-warning">Log in</button></a>
	<a href="deletedata.php"><button type="button" class="btn btn-warning">Delete All Records</button></a>
	<br><br>

	<center><div id="result" style="width:80%;"></div></center>

	<div class="table-responsive">
		<h3 align="center">Data Records</h3><br>
		<center>
			<table id="tabledata" style="width: 98%" class="table table-bordered table-hover text-center">
				<thead>
					<tr class="success text-center">
						<th><center>Sr. No.</center></th>
						<th><center>Name</center></th>
						<th><center>Username</center></th>
						<th><center>Email</center></th>
						<th><center>Password = vbnm</center></th>
						<th><center>Contact</center></th>
						<th><center>Hash</center></th>
						<th><center>Active</center></th>
					</tr>
				</thead>

				<tbody>
					<?php

					//database connection
					require('dbcon.php');
					
					$sql = "SELECT * from numbers";
					
					$result = $conn-> query($sql);

					if ($result-> num_rows > 0)
					{
						$i=1;
						while ($row = $result->fetch_assoc()) 
						{
							echo "
							<tr>
							<td>".$i++."</td>
							<td>".$row["name"]."</td>
							<td>".$row["username"]."</td>
							<td>".$row["email"]."</td>
							<td>".$row["password"]."</td>
							<td>".$row["contact"]."</td>
							<td>".$row["hash"]."</td>
							<td>".$row["active"]."</td>
							</tr>
							";
						}
						echo "</table>";
					}
					else
					{
						echo '
						<script type="text/javascript">
						window.open("index.html","_self");
						alert("No Results!!");
						</script>';
					}

					$conn->close();

					?>

				</tbody>

			</table>
		</center>
	</div>


</body>
</html>
