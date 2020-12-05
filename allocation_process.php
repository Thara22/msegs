<?php
	session_start();
	if(isset($_SESSION['admin'])){
		include './include/connect.php';
		$rid=$_POST['id'];
		$action=$_POST['alloc'];
		$mid = $_POST['mid'];
		$aq = $_POST['rq'];

		$query = 'UPDATE request SET action=:action WHERE id=:id';
		$statement=$con->prepare($query);
		$statement->bindParam(':action', $action);
		$statement->bindParam(':id', $rid);
		if($statement->execute()){
			$sql = "SELECT * FROM material WHERE id=:mid";
			$stmt=$con->prepare($sql);
			$stmt->bindParam(':mid', $mid);
			$stmt->execute();
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$quan = $row['quantity'];
			$newQuan = $quan - $aq;

			$query1='UPDATE material SET quantity=:quan WHERE id=:id';
			$stmt1=$con->prepare($query1);
			$stmt1->bindParam(':quan', $newQuan);
			$stmt1->bindParam(':id', $mid);
			if($stmt1->execute()){
				echo '<p class="text-center text-success">Material has been allocated sucessfully</p>';	
			}
		}else{
			echo '<p class="text-center text-danger">Allocation Failed</p>';
		}
	}else{
		echo '<h2>No permission to access this page</h2>';
	}
?>