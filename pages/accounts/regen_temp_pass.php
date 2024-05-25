<?php
$conn=mysqli_connect("localhost","root","","pos");

$id=$_POST["id"];
$name=$_POST["name"];
$username=$_POST["username"];
$tempass=$_POST["tempass"];
$status="TEMPORARY";

$sql1 = "UPDATE account SET temp_pass = '$tempass' , status = '$status'  WHERE id = '$id'";
$result = $conn -> query($sql1);
if ($result) 
{
	echo "Successfully Generated Temporary Password";
}
else
{
	echo "ERROR Generated Temporary Password";
}














?>