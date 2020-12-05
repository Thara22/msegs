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

			$res .= '<h3 class="text-center">'.$row['district_name'].' District Manager Information</h3>';
			$res .= '<div class="table-responsive">';
				$res .= '<table class="table">';
					$res .= '<tr><td><strong>DISTRICT NAME</strong></td><td class="text-primary">'.$row['district_name'].'</td></tr>';
					$res .= '<tr><td><strong>DISTRICT CODE</strong></td><td class="text-primary">'.$row['district_code'].'</td></tr>';
					$res .= '<tr><td><strong>USERNAME</strong></td><td class="text-primary">'.$row['user_name'].'</td></tr>';
					$res .= '<tr><td><strong>PASSWORD</strong></td><td class="text-primary">'.$row['pass'].'</td></tr>';
				$res .= '</table>';
			$res .= '</div>';
			$data['content']=$res;
			echo json_encode($data);
	}else{
		echo '<h2>No permission to access this page</h2>';
	}
?>
