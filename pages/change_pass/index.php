<?php
session_start();
if ($_SESSION["cashier"]!=true) 
{
	header("location:../../");
}
$username=$_GET['username'];
$id=$_GET['id'];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Point-Of-Sale | Change Password</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../../style/change_pass.css">
	<link rel="icon" type="icon" href="../../media/logo.png">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap" rel="stylesheet">
	<script type="text/javascript" src="script.js"></script>
</head>
<body>
	<div class="container">
		<div class="alert-modals">
			<div class="alert1 alert alert-danger" role="alert">
  				<i class="fa fa-exclamation-triangle" style="margin-right: 20px;"></i>Error! Must input all fields
			</div>
			<div class="alert2 alert alert-danger" role="alert">
  					<i class="fa fa-exclamation-triangle" style="margin-right: 20px;"></i>Confirm password does not match to new password
			</div>
			<div class="alert3 alert alert-danger" role="alert">
  					<i class="fa fa-exclamation-triangle" style="margin-right: 20px;"></i>New password must range between 10 to 20 characters.
			</div>
		</div>
		<div class="row">
			<div class="left-side col">
				<img src="../../media/logo_dids.png">
			</div>
			<div class="right-side col">
				<div class="left-border">
					<h3>Change Password</h3>
					<table>
						<tr>
							<td><label>New Password</label> <br><input type="password" name="" class="form-control" id="new_pass"></td>
						</tr>
						<tr>
							<td><label>Confirm Password</label> <br><input type="password" name="" class="form-control" id="confirm_pass"></td>
						</tr>
						<tr>
							<td style="display: flex;justify-content: space-between;"> <button class="cancel btn btn-light">Cancel</button><button class="submit btn btn-success">Change Password</button></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</body>
</html>