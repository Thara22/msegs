<?php

	session_start();
	if(isset($_SESSION['admin'])){
		include './include/connect.php';
		$id = $_GET['id'];
		$res = '<a href="dist_list.php" class="move-back"><span class="glyphicon glyphicon-arrow-left"></span></a>';
		// $res .= $id;
		$query = "SELECT * FROM district WHERE id=$id";
		$statement=$con->prepare($query);
		$statement->execute();
		$row = $statement->fetch(PDO::FETCH_ASSOC);

		$res .= '<h3 class="text-center">Edit '.$row['district_name'].' District Manager Information</h3>';
		$res .= '<div class="edit-form">';
			$res.='<form id="editDist">';
				$res.='<div class="form-group">';
					$res.='<input type="hidden" name="id" value="'.$row['id'].'">';
					$res.='<label>District Name</label>';
					$res.='<input  type="text" name="dist_name" class="form-control edit-field" value="'.$row['district_name'].'">';
				$res.='</div>';
				$res.='<div class="form-group">';
					$res.='<label>District Code</label>';
					$res.='<input  type="text" name="dist_code" class="form-control edit-field" value="'.$row['district_code'].'">';
				$res.='</div>';
				$res.='<div class="form-group">';
					$res.='<label>Username</label>';
					$res.='<input  type="text" name="username" class="form-control edit-field" value="'.$row['user_name'].'">';
				$res.='</div>';
				$res.='<div class="form-group">';
					$res.='<a href="dist_list.php" class="move-back btn btn-default">Cancel</a>';
					$res.='<input  type="submit" name="submit" class="btn btn-info edit-btn" value="Save">';
				$res.='</div>';

			$res.='</form>';
		$res .= '</div>';
		$data['content']=$res;
		echo json_encode($data);
	}else{
		echo '<h2>No permission to access this page</h2>';
	}
?>