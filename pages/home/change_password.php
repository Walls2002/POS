<?php
$conn=mysqli_connect("localhost","root","","pos");
$username=$_POST["username"];
$old_pass=$_POST["old_pass"];
$new_pass=$_POST["new_pass"];

$sql=mysqli_query($conn,"SELECT * FROM account WHERE username='$username'");
$row = mysqli_fetch_array($sql);

if ($row["password"]==$old_pass)
	{
		$sql1 = "UPDATE account SET password = '$new_pass' WHERE username = '$username'";
		$result=$conn->query($sql1);
		echo "EDIT SUCCESSFULLY";
	}
	else
	{
		echo "EDIT FAILED";
	}





?>