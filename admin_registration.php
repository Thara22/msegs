<?php
session_start();
	include_once './include/connect.php';

	$name = $_POST['admin'];
	$email = $_POST['email'];
	$pass = $_POST['pass'];

	$sql = "SELECT MAX(id) AS max_id FROM admin";
	$stmt = $con->prepare($sql);
	$stmt->execute();

	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	$id = $row['max_id'];
	$id++;

	$query = 'INSERT INTO admin SET id=:id, username=:name, email=:email, pass=:pass';
	$statement=$con->prepare($query);
	$statement->bindParam(':id', $id);
	$statement->bindParam(':name', $name);
	$statement->bindParam(':email', $email);
	$statement->bindParam(':pass', $pass);
	if($statement->execute()){
		$query = "SELECT * FROM admin WHERE username=:name";
		$statement = $con->prepare($query);
		$statement->bindParam(':name', $name);
		if($statement->execute()){
			$row=$statement->fetch(PDO::FETCH_ASSOC);
			$_SESSION['admin'] = $row['username'];
			echo"material_stock.php";
		}
	}else{
		echo 'Something went wrong. Please try again later';
	}
?>