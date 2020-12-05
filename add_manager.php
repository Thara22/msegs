<?php
	session_start();
	if(isset($_SESSION['admin'])){
		include './include/connect.php';
		$d_capital = $_POST['district-capital'];
		$username = $_POST['username'];
		$pass = $_POST['pass'];
		$code = $_POST['code'];

		$query = "SELECT MAX(id) AS max_id FROM district";
		$statement = $con->prepare($query);
		$statement->execute();

		$row = $statement->fetch(PDO::FETCH_ASSOC);
		$max_id = $row['max_id'];
		$max_id++;

		$sql = 'INSERT INTO district SET id=:id, district_name=:dist_cap,user_name=:username, pass=:pass, district_code=:dist_code';
		$statement=$con->prepare($sql);
		$statement->bindParam(':id',$max_id);
		$statement->bindParam(':dist_cap',$d_capital);
		$statement->bindParam(':username',$username);
		$statement->bindParam(':pass',$pass);
		$statement->bindParam(':dist_code',$code);
		if($statement->execute()){
			echo '<p class="text-center text-info">District Manager added successfully</p>';
		}else{
			echo '<p class="text-center">Failed to add District Manager!!!!</p>';
		}
	}else{
		echo '<h2>No permission to access this page</h2>';
	}
?>