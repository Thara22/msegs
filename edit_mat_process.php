<?php
	session_start();
	if(ISSET($_SESSION['admin'])){
		include './include/connect.php';
		$id=$_POST['id'];
		$mname=$_POST['mname'];
		$price=$_POST['price'];
		$cprice=$_POST['c_price'];
		$quan=$_POST['quan'];

		$sql = "UPDATE material SET material_name=:mname, price=:price, current_price=:cprice, quantity=:quan WHERE id=:id";
		$stmt=$con->prepare($sql);
		$stmt->bindParam(':id', $id);
		$stmt->bindParam(':mname', $mname);
		$stmt->bindParam(':price', $price);
		$stmt->bindParam(':cprice', $cprice);
		$stmt->bindParam(':quan', $quan);
		if($stmt->execute()){
			echo '<p class="text-center text-success">Update Success</p>';	
			echo '<a href="material_stock.php" class="text-center text-success">Move Back</a>';	
		}else{
			echo '<p class="text-center text-danger">Update Failed</p>';
		}
	}
?>