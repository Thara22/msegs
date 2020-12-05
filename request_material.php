<?php
	session_start();
	if(isset($_SESSION['admin'])){
		include './include/header.php';
		include './include/connect.php';
?>

	<div class="container">
		
		<div class="table-responsive">
			<table class="table">

<?php
	$query = 'SELECT material.id as mid, material.material_name as mname, material.img as img, material.price as price, request.req_date as rdate, request.req_quantity as rquant, request.id as rid, district.id as did, district.district_name as user FROM `material`INNER JOIN request ON material.id = request.material_id INNER JOIN district ON request.district_id = district.id WHERE request.action=0 OR request.action=1';
	$stmt=$con->prepare($query);
	$stmt->execute();

	echo '<tr>';
		echo '<th></th>';
		echo '<th>Product Name</th>';
		echo '<th class="text-center">Price</th>';
		echo '<th class="text-center">Request Date</th>';
		echo '<th class="text-center">Quantity</th>';
		echo '<th class="text-center">Requested By</th>';
		echo '<th>Action</th>';
	echo '</tr>';

	while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
		echo '<tr>';
			echo  '<td><img width="100" height="100"  src="'.$row['img'].'" class="img-responsive" alt="acer"></td>';
			echo  '<td>'.$row['mname'].'</td>';
			echo  '<td class="text-center">'.$row['price'].'</td>';
			echo  '<td class="text-center">'.$row['rdate'].'</td>';
			echo  '<td class="text-center">'.$row['rquant'].'</td>';
			echo  '<td class="text-center">'.$row['user'].' District</td>';
			echo  '<td><a href="take_action.php" class="btn btn-info action-page" id="action_'.$row['rid'].'">Take Action</a></td>';
		echo '</tr>';
	}

?>
			</table>
		</div>

	</div>

<?php
	include './include/footer.php';

	}else{
		echo '<h2>No permission to access this page</h2>';
	}
?>