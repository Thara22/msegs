<?php
	session_start();
	include './include/connect.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>material management system</title>
	<meta charset='utf-8'>
	<meta name='viewport' content='width=device-width initial-scale=1, shrink-to-fit=no'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="./css/jquery-ui.min.css">
	<link rel="stylesheet" href="./css/jquery-ui.theme.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link rel='stylesheet' href='./css/style.css'>
	<script src="./js/jquery.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<script src="./js/jquery-ui.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
	<script src="./js/myscript.js"></script>
</head>
<body>

<?php

	$query = 'SELECT COUNT(*) FROM admin';
	$stmt= $con->prepare($query);
	$stmt->execute();

	$row = $stmt->fetchColumn();
	if($row>0){
?>

		<div class="background">
			<div class="login-box">
				<h3 class="text-center">Admin Login</h3>
				<form id="adminLogin">
					<div class="form-group">
						<label>Username</label>
						<input type="text" name="username" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="Password" name="pass" class="form-control" required>
					</div>
					<div class="form-group">
						<input type="submit" name="submit" value="Log In" class="btn btn-info">
					</div>
				</form>
			</div>
		</div>

<?php
	}else{
?>

		<div class="background">
			<div class="signup-box">
				<h3 class="text-center">Register</h3>
				<form id="adminRegistration">
					<div class="form-group">
						<label >email</label>
						<input type="email" name="email" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Username</label>
						<input type="text" name="admin" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="Password" name="pass" class="form-control" required>
					</div>
					<div class="form-group">
						<input type="submit" name="submit" value="Register" class="btn btn-info">
					</div>
				</form>
			</div>
		</div>
<?php
	}
?>
</body>
</html>