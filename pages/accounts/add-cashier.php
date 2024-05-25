<?php
$conn=mysqli_connect("localhost","root","","pos");
$name=$_POST['name'];
$username=$_POST['username'];
$tempass=$_POST['tempass'];
$position=$_POST['position'];
$status="TEMPORARY";


$sql = "SELECT * FROM account WHERE username='$username'";
$result=mysqli_query($conn,$sql);
$count=mysqli_num_rows($result);

if ($count>0) 
{
	echo "Username already taken!";
}
else
{
	$sql ="INSERT INTO `account`(`username`, `temp_pass`, `name`, `position`,`status`) VALUES ('$username','$tempass','$name','$position','$status')";

	$result = $conn -> query($sql);
	if ($result) 
	{
		echo "Account Added Successfully";
	}
	else
	{
		echo "Error Account add failed";
	}
}
?>