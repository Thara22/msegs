<?php
	session_start();
	if(isset($_SESSION['admin'])){
		include "./include/connect.php";
		$p_name = $_POST['p_name'];
		$price = $_POST['price'];
		$quantity = $_POST['quantity'];
		$file = basename($_FILES['p_image']['name']);
		$ext = pathinfo($file, PATHINFO_EXTENSION);
		if(stripos($file, ' ')){
			$file = str_replace(' ', '_', $file);
		}
		$upload_path = './upload/'.$file;
		// $link = './upload/'.$file;

		$query = "SELECT MAX(id) AS max_id FROM material";
		$statement = $con->prepare($query);
		$statement->execute();

		$row = $statement->fetch(PDO::FETCH_ASSOC);
		$max_id = $row['max_id'];
		$max_id++;
		$year = date("Y");
		$p_code = 'msegs'.$year.$max_id;

		if(move_uploaded_file($_FILES['p_image']['tmp_name'], $upload_path)){
			$sql = 'INSERT INTO material SET id=:id, material_name=:material_name,price=:price, current_price=:current_price, quantity=:quantity, product_code=:product_code, img= :img';
			$statement=$con->prepare($sql);
			$statement->bindParam(':id',$max_id);
			$statement->bindParam(':material_name',$p_name);
			$statement->bindParam(':price',$price);
			$statement->bindParam(':current_price',$price);
			$statement->bindParam(':quantity',$quantity);
			$statement->bindParam(':product_code',$p_code);
			$statement->bindParam(':img',$upload_path);
			if($statement->execute()){
				echo '<p class="text-center text-white">Material added successfully</p>';
			}else{
				echo '<p class="text-center text-white"Failed to add material!!!!</p>';
			}
		}else {
			echo 'Failed';
		}
	}else{
		echo '<h2>No permission to access this page</h2>';
	}
?>