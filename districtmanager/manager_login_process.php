<?php
	session_start();
	include_once '../include/connect.php';
	$username = $_POST['username'];
	$pass = $_POST['pass'];

	$query = 'SELECT * FROM district WHERE user_name=:username';
	$statement = $con->prepare($query);
	$statement->bindParam(':username', $username);
	if($statement->execute()){
		$row=$statement->fetch(PDO::FETCH_ASSOC);
		$password = $pass;
		if($row['pass']===$password){
			$_SESSION['user']=$row['user_name'];
			$_SESSION['uid']=$row['id'];
			// header('location: dashboard.php?id='.$row["admin_id"]);
			$data['indicator'] = 'TRUE';
			$data['message']='dashboard.php?id='.$row["id"];
			echo json_encode($data);
		}else{
			$data['indicator'] = 'FALSE';
			$data['message']='Incorrect e-mail or Password.';
			echo json_encode($data);
		}
	}else{
		$data['indicator'] = 'FALSE';
		$data['message']='Incorrect e-mail ID.';
		echo json_encode($data);
	}


?>