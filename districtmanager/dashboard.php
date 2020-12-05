<?php

	session_start();
		if(isset($_SESSION['user'])){
			$id = $_GET['id'];
			include '../include/manager_header.php';
			include_once '../include/connect.php';
			$sql = "SELECT * FROM district WHERE id=:id";
			$statement=$con->prepare($sql);
			$statement->bindParam(':id',$id);
			$statement->execute();

			$val = $statement->fetch(PDO::FETCH_ASSOC);
			$user_id = $val['id'];
			// echo '<h3 class="text-center">'.$user_id.'</h3>';
			

			$query = "SELECT * FROM material";
			$stmt = $con->prepare($query);
			$stmt->execute();

			echo '<div class="container">';
				echo '<h3 class="text-center">MATERIALS IN STOCK</h3>';
				echo '<div class="table-responsive">';
					echo '<table class="table">';
						echo '<tr>';
							echo '<th></th>';
							echo '<th class="text-center">Product Code</th>';
							echo '<th class="text-center">Product Name</th>';
							echo '<th class="text-center">Price</th>';
							echo '<th class="text-center">Available Quantity</th>';
							echo '<th class="text-center"></th>';
						echo '</tr>';


						while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
							echo '<tr>';
								echo '<td><img width="100" height="100"  src=".'.$row['img'].'" class="img-responsive" alt="acer"></td>';
								echo '<td class="text-center">'.$row['product_code'].'</td>';
								echo '<td>'.$row['material_name'].'</td>';
								echo '<td class="text-center">'.$row['price'].'</td>';
								echo '<td class="text-center">'.$row['quantity'].'</td>';
								echo '<td><a href="request_materials.php" class="btn btn-primary request" id="request_'.$user_id.'-'.$row['id'].'">Request</a></td>';
							echo '</tr>';
						}
					echo '</table>';
				echo '</div>';
			echo '</div>';
		?>

		<?php
			include '../include/footer.php';
		
	}else{
		echo '<h2>No permission to access this page</h2>';
	}
?>

	