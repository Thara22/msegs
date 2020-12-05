<?php
session_start();
	if(isset($_SESSION['admin'])){
		include './include/connect.php';
		$id=$_GET['id'];
		echo '<div class="row">';
			echo '<div class="col-md-3"></div>';
			echo '<div class="col-md-6">';
			$query = "SELECT * FROM material WHERE id=:id";
			$statement=$con->prepare($query);
			$statement->bindParam(':id', $id);
			// $statement->execute();
			if($statement->execute()){
				$row = $statement->fetch(PDO::FETCH_ASSOC);
				echo '<form id="editMat">';
					echo '<div class="form-group">';
						echo '<lable>Material Name</lable>';
						echo '<input type="hidden" name = "id" class="form-control" value="'.$row['id'].'">';
						echo '<input type="text" name = "mname" class="form-control" value="'.$row['material_name'].'">';
					echo '</div>';
					echo '<div class="form-group">';
						echo '<lable>Price</lable>';
						echo '<input type="text" name = "price" class="form-control" value="'.$row['price'].'">';
					echo '</div>';
					echo '<div class="form-group">';
						echo '<lable>Current Price</lable>';
						echo '<input type="text" name = "c_price" class="form-control" value="'.$row['current_price'].'">';
					echo '</div>';
					echo '<div class="form-group">';
						echo '<lable>Quantity</lable>';
						echo '<input type="text" name = "quan" class="form-control" value="'.$row['quantity'].'">';
					echo '</div>';
					echo '<div class="form-group">';
						echo '<input type="submit" name = "submit" class="btn btn-info" value="Update">';
					echo '</div>';
				echo '</form>';
			}
			echo '</div>';
			echo '<div class="col-md-3"></div>';
		echo '</div>';
	}
?>