<?php
session_start();
	if(isset($_SESSION['admin'])){
		include './include/connect.php';
		include_once './include/header.php';
		// $user_id=$_GET['id'];
		// echo $id;
	?>
		<div class="container">

			<h3 class="text-center">MATERIAL IN STOCK</h3>
			<div class="table-responsive">
			  <table class="table">
			    <tr>
			    	<th></th>
			    	<th>Product Name</th>
			    	<th class="text-center">Price</th>
			    	<th class="text-center">Current Price</th>
			    	<th class="text-center">Quantity</th>
			    	<th></th>
			    </tr>
	<?php
		$query = "SELECT * FROM material";
		$statement=$con->prepare($query);
		$statement->execute();

		while($row=$statement->fetch(PDO::FETCH_ASSOC)){
			echo '<tr>';
				echo '<td class="image"><img width="100px" height="100px"  src="'.$row['img'].'" class="img-responsive" alt="acer"></td>';
				echo '<td>'.$row['material_name'].'</td>';
				echo '<td class="text-center">'.$row['price'].'</td>';
				echo '<td class="text-center">'.$row['current_price'].'</td>';
				echo '<td class="text-center">'.$row['quantity'].'</td>';
				echo '<td><a href="edit_material.php" class="btn btn-primary edit-mat" id="editMat_'.$row['id'].'">Edit</a></td>';
			echo '</tr>';
		}
	?>
	</table>
		</div>

	</div>
<?php
	include "./include/footer.php";

}else{
	echo '<h2>No permission to access this page</h2>';
}
?>