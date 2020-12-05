<?php

	session_start();
	if(isset($_SESSION['admin'])){
		include "./include/header.php";
		?>

		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h3 class="text-center">ADD DISTRICT'S MANAGER</h3>
					<div class="dist-form-wrapper">
						<form id="AddManager">
							<div class="form-group">
								<label>District Capital :</label>
								<input type="text" name="district-capital" class="form-control" id="DistCap" required>
							</div>
							<div class="form-group">
								<label>User Name :</label>
								<input type="text" name="username" class="form-control" id="DistUser" required>
							</div>
							<div class="form-group">
								<label>Enter Password</label>
								<input type="password" name="pass" class="form-control" id="DistPass" required>
							</div>
							<div class="form-group">
								<label>District Code</label>
								<input type="text" name="code" class="form-control" id="DistCode" required>
							</div>
							<div class="form-group">
								<input type="submit" name="submit" class="btn btn-success">
							</div>
						</form>
					</div>
					<!-- <div class="linear-loading"></div> -->
				</div>
				<div class="col-md-6">
					<div class="dist-list-wrapper">
						<!-- load dist_list.php  -->
					</div>
				</div>
			</div>
		</div>

	<?php
		include "./include/footer.php";
	}else{
		echo '<h2>No permission to access this page</h2>';
	}
?>

	