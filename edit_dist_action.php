<?php
	session_start();
	if(isset($_SESSION['admin'])){
		include './include/connect.php';
		$d_name=$_POST['dist_name'];
		$d_code=$_POST['dist_code'];
		$username = $_POST['username'];
		$id = $_POST['id'];

		$query = 'UPDATE district SET district_name=:d_name, district_code=:d_code, user_name=:user WHERE id=:id';
		$statement=$con->prepare($query);
		$statement->bindParam(':d_name', $d_name);
		$statement->bindParam(':d_code', $d_code);
		$statement->bindParam(':user', $username);
		$statement->bindParam(':id', $id);
		if($statement->execute()){
			echo '<p class="text-center text-success">Update Success</p>';	
		}else{
			echo '<p class="text-center text-danger">Update Failed</p>';
		}

	}else{
		echo '<h2>No permission to access this page</h2>';
	}
?>