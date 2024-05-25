<?php
$id=$_POST["id"];
$username=$_POST["username"];
$new_pass=$_POST["new_pass"];
$status="PERMANENT";
$temp_pass="";


$conn=mysqli_connect("localhost","root","","pos");
$sql1 = "UPDATE account SET password = '$new_pass' ,temp_pass = '$temp_pass', status='$status' WHERE (id = '$id' AND username='$username')";

$result = $conn -> query($sql1);
if ($result) 
	{
		echo "Successfully Edited";
	}
	else
	{
		echo "Error: Edit not complete";
	}







?>