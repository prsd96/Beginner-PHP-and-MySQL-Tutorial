<?php 
require "dbcon.php";

$empname= mysqli_real_escape_string($con,$_POST['empname']);
$empemail= mysqli_real_escape_string($con,$_POST['empemail']);
$emppass= mysqli_real_escape_string($con,$_POST['emppass']);

$sql = "SELECT empname,empemail,emppass from empdata where empname='".$empname."' and empemail='".$empemail."' and emppassword='".$emppass."' ";


$result = $con->query($sql);

if ($result->num_rows > 0) 
{
	
	if (isset($_POST['empname'], $_POST['empemail'], $_POST['emppass'])) 
	{
		$empname = $_POST['empname'];
		$empemail = $_POST['empemail'];
		$emppass = $_POST['emppass'];
	}
	echo "1";   
}
else
{
	echo "0";
}