<?php
	session_start();
	if(isset($_SESSION['admin'])){
		include './include/header.php';
?>

	<div class="container">
		
		<h3 class="text-center">ADD MATERIAL</h3>
		<form id="AddMaterial" class="add-material" enctype="multipart/formd-ata">
			<div class="form-group">
				<label>Product Name:</label>
				<input type="text" name="p_name" class="form-control" id="Pname" required="">
			</div>
			<div class="form-group">
				<label>Price (in Rs.):</label>
				<input type="number" name="price" class="form-control" id="price" required="">
			</div>
			<div class="form-group">
				<label>Quantity:</label>
				<input type="number" name="quantity" class="form-control" id="quantity" required="">
			</div>
			<div class="form-group">
				<label>Product Image:</label>
				<input type="file" name="p_image" class="form-control" id="PImage" required="">
			</div>
			<div class="form-group">
				<input type="submit" name="add" class="btn btn-default" value="Add Product">
			</div>
		</form>

	</div><!--End container-->
	<!-- <div class="loading-wrapper"></div> -->
<?php
	include './include/footer.php';
?>
<?php
	}else{
		echo '<h2>No permission to access this page</h2>';
	}
?>
