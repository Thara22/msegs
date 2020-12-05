<?php
	session_start();
		if(isset($_SESSION['user'])){
			include '../include/connect.php';
			$user_id = $_GET['id'];
			$m_id = $_GET['m_id'];


			// Get user id
			$get_id = "SELECT * FROM district WHERE id=:id";
			$stmt = $con->prepare($get_id);
			$stmt->bindParam(':id', $user_id);
			$stmt->execute();
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$uid = $row['id'];

			$count = 'SELECT COUNT(*) FROM request WHERE material_id=:m_id AND district_id=:uid';
			$cstmt=$con->prepare($count);
			$cstmt->bindParam(':m_id',$m_id);
			$cstmt->bindParam(':uid',$user_id);
			$cstmt->execute();
			$row = $cstmt->fetchColumn();
			if($row>0){
				$query = 'SELECT * FROM material WHERE id=:id';
				$statement = $con->prepare($query);
				$statement->bindParam(':id', $m_id);
				$statement->execute();
				$fetch = $statement->fetch(PDO::FETCH_ASSOC);
				$res='<div class="row">';
					$res.='<div class="col-md-4">';
						$res.='<img  class="img-responsive" src=".'.$fetch['img'].'">';
					$res.='</div>';
					$res.='<div class="col-md-6">';
					$res.='<a href="dashboard.php?id='.$uid.'">Go Back to Dashboard</a>';
						$res.='<div class="request-form">';
							$res.='<form id="requestForm">';
								$res.='<div class="form-group">';
									$res.='<h4>'.$fetch['material_name'].'</h4>';
								$res.='</div>';
								$res.='<h5>You have already made Request on this Item. Please wait for Delivery.</h5>';
								
							$res.='</form>';
						$res.='</div>';
					$res.='</div>';
				$res.='</div>';
			}else{
				$query = 'SELECT * FROM material WHERE id=:id';
				$statement = $con->prepare($query);
				$statement->bindParam(':id', $m_id);
				$statement->execute();
				$fetch = $statement->fetch(PDO::FETCH_ASSOC);
				$res='<div class="row">';
					$res.='<div class="col-md-4">';
						$res.='<img  class="img-responsive" src=".'.$fetch['img'].'">';
					$res.='</div>';
					$res.='<div class="col-md-6">';
					$res.='<a href="dashboard.php?id='.$uid.'">Go Back to Dashboard</a>';
						$res.='<div class="request-form">';
							$res.='<form id="requestForm">';
								$res.='<div class="form-group">';
									$res.='<h4>'.$fetch['material_name'].'</h4>';
								$res.='</div>';

								$res.='<div class="form-group">';
									$res.='<label>Request Quantity</label>';
									$res.='<input type="number" name="quantity" class="form-control" required>';
									$res.='<input type="hidden" name="m_id" value="'.$fetch['id'].'" required>';
									$res.='<input type="hidden" name="uid" value="'.$uid.'" required>';
								$res.='</div>';
								$res.='<div class="form-group">';
									$res.='<input type="submit" value="Place Request" class="btn btn-info">';
								$res.='</div>';
							$res.='</form>';
						$res.='</div>';
					$res.='</div>';
				$res.='</div>';
			}
			$data['content']=$res;
			echo json_encode($data);
	}else{
		echo '<h2>No permission to access this page</h2>';
	}
	
?>