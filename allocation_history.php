<?php
	session_start();
		if(isset($_SESSION['admin'])){
			include './include/header.php';
			include './include/connect.php';
?>
		<div class="container">

		<h3 class="text-center">ALLOCATION HISTORY</h3>
		<div class="table-responsive">
			<table class="table table-striped">
<?php
	$query = 'SELECT material.id as mid, material.material_name as mname, material.product_code as p_code, request.req_quantity as rquant, request.id as rid, district.id as did, district.district_name as user, request.status as status FROM `material`INNER JOIN request ON material.id = request.material_id INNER JOIN district ON request.district_id = district.id WHERE request.action=2';
	$stmt=$con->prepare($query);
	$stmt->execute();

	echo '<tr>';
		echo '<th class="text-center">Product Code</th>';
		echo '<th class="text-center">Product Name</th>';
		echo '<th class="text-center">Request Quantity</th>';
		echo '<th class="text-center">Allocation Destiny</th>';
		echo '<th class="text-center">Status</th>';
	echo '</tr>';

	while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
		echo '<tr>';
			echo  '<td class="text-center">'.$row['p_code'].'</td>';
			echo  '<td class="text-center">'.$row['mname'].'</td>';
			echo  '<td class="text-center">'.$row['rquant'].'</td>';
			echo  '<td class="text-center">'.$row['user'].'</td>';
			if($row['status']==0){
				echo  '<td class="text-center text-danger">In Transit</td>';
			}else{
				echo  '<td class="text-center text-info">Delivered</td>';
			}
		echo '</tr>';
	}

?>
			</table>
		</div>
	</div>

<?php
	include './include/footer.php';
?>

<?php
	}else{
		echo '<h2>No permission to access this page</h2>';
	}
?>