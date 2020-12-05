<?php
session_start();
	if(isset($_SESSION['admin'])){
		include './include/connect.php';
		$id = $_POST['id'];
		$query = "DELETE FROM district WHERE id=$id";
		$statement=$con->prepare($query);
		if($statement->execute()){
			echo 'TRUE';
		}else{
			echo 'FALSE';
		}
}else{
	echo '<h2>No permission to access this page</h2>';
}
?>