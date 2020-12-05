<?php
session_start();
	if(isset($_SESSION['user'])){
		include '../include/manager_header.php';
		include '../include/connect.php';

		// $id=$_GET['id'];
		// echo $id;

		$sql = 'SELECT material.id as m_id, material.material_name as m_name, material.product_code as p_code, material.img as img, request.id as r_id, request.req_date as r_date, request.req_quantity as req_quantity, request.status as stats FROM material INNER JOIN request ON material.id=request.material_id WHERE request.district_id='.$id;
		$stmt=$con->prepare($sql);
		$stmt->execute();

		echo '<div class="container">';
			echo '<div class="table-responsive">';
				echo '<table class="table">';
					echo "<tr>";
						echo '<th></th>';
						echo '<th>Product Code</th>';
						echo '<th class="text-center">Product Name</th>';
						echo '<th class="text-center">Request Date</th>';
						echo '<th class="text-center">Request Quantity</th>';
						echo '<th>Update Status</th>';
					echo "</tr>";
		while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
		echo '<tr>';
				echo  '<td><img width="100" height="100"  src=".'.$row['img'].'" class="img-responsive" alt="acer"></td>';
				echo  '<td>'.$row['p_code'].'</td>';
				echo  '<td class="text-center">'.$row['m_name'].'</td>';
				echo  '<td class="text-center">'.$row['r_date'].'</td>';
				echo  '<td class="text-center">'.$row['req_quantity'].'</td>';
				if($row['stats']==0){
					echo  '<td><a href="update_stats.php" class="btn btn-info update-stats" id="update_'.$row['r_id'].'">Receive</a></td>';
				}else{
					echo '<td>Received</td>';
				}
			echo '</tr>';
		}
				echo '</table>';
			echo "</div>";
		echo '</div>';

		include '../include/footer.php';
	}else{
		echo '<h2>No permission to access this page</h2>';
	}
?>