<?php 
session_start();
require 'dbcon.php';

$loggedinuser = $_SESSION['userloginemail'];

if (!isset($loggedinuser)) 
{
	header('Location: userloginform.php');
}

//$autodetailssql = "SELECT * FROM numbers WHERE email = '$autodetails' ";
//$autodetailssqldata = $conn-> query($autodetailssql);
//$autodetailssqldataresults = $autodetailssqldata->fetch_assoc();

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<h1>Ho HO Ho!!</h1>
	<br>
	<a href="userlogoutpage.php">Log out is here</a>

</body>
</html>