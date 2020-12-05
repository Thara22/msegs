<?php
	session_start();
		if(isset($_SESSION['admin'])){
			include './include/connect.php';

	$query = 'SELECT COUNT(*) FROM district';
	$stmt= $con->prepare($query);
	$stmt->execute();

	$row = $stmt->fetchColumn();
	if($row>0){
?>
		<h3 class="text-center">LIST OF DISTRICTS</h3>
		<div class="table-resposive">
			<table class="table">
			
<?php
	$sql = "SELECT * FROM district";
	$statement= $con->prepare($sql);
	$statement->execute();
	while($row=$statement->fetch(PDO::FETCH_ASSOC)){
		echo '<tr>';
			echo '<td>'.$row["district_name"].'</td>';
			echo '<td class="text-center"><a href="dist_info.php" class="btn btn-info dist-info" id="distDetail_'.$row['id'].'">View Details</a></td>';
			echo '<td class="text-center"><a href="edit_dist_info.php" class="btn btn-primary edit-dist" id="Editdist_'.$row['id'].'">Edit</a></td>';
			echo '<td class="text-center"><a href="del_dist.php" class="btn btn-danger del-dist" id="Deldist_'.$row['id'].'">Delete</a></td>';
		echo '</tr>';
	}
?>


			</table>
		</div>



<?php
		}else{
			echo '<h3 class="text-center">No records have been made yet.</h3>';
		}
	}else{
		echo '<h2>No permission to access this page</h2>';
	}
?>
			