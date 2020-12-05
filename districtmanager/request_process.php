<?php
	session_start();
	if(isset($_SESSION['user'])){
		include_once '../include/connect.php';
		$rq = $_POST['quantity'];
		$mid = $_POST['m_id'];
		$uid = $_POST['uid'];
		$action = 0;
		date_default_timezone_set('Asia/Kolkata');
		$r_date = date("Y-m-d");

		// echo $r_date;

		$query = "SELECT MAX(id) AS max_id FROM request";
		$statement = $con->prepare($query);
		$statement->execute();

		$row = $statement->fetch(PDO::FETCH_ASSOC);
		$max_id = $row['max_id'];
		$max_id++;

		$sql = 'INSERT INTO request SET id=:id, material_id=:mid,req_date=:rdate, req_quantity=:quantity, district_id=:uid, action=:action';
		$statement=$con->prepare($sql);
		$statement->bindParam(':id',$max_id);
		$statement->bindParam(':mid',$mid);
		$statement->bindParam(':rdate',$r_date);
		$statement->bindParam(':quantity',$rq);
		$statement->bindParam(':uid',$uid);
		$statement->bindParam(':action',$action);
		if($statement->execute()){
			echo '<p class="text-center text-info">Request Placed Succesfully.</p>';
		}else{
			echo '<p class="text-center">Failed to add District Manager!!!!</p>';
		}
	}else{
		echo '<h2>No permission to access this page</h2>';
	}
?>