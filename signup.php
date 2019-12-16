<?php

require_once('dbcon.php');

$empname= mysqli_real_escape_string($con,$_POST['empname']);
$empemail= mysqli_real_escape_string($con,$_POST['empemail']);
$emppass= mysqli_real_escape_string($con,$_POST['emppass']);
$empcontact= mysqli_real_escape_string($con,$_POST['empcontact']);

$sql = "INSERT INTO empdata(empname,empemail,emppassword,empcontact) VALUES('".$empname."','".$empemail."','".$emppass."','".$empcontact."')";			

if(mysqli_query($con,$sql))
{
	echo "1";
}else
{

	echo $con->error;
}

mysqli_close($con);