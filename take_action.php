<?php
session_start();
	if(isset($_SESSION['admin'])){
		include_once './include/connect.php';
		$id = $_GET['id'];

		$query="SELECT * FROM `material`INNER JOIN request ON material.id = request.material_id INNER JOIN district ON request.district_id = district.id WHERE request.id=$id";
		$statement=$con->prepare($query);
		$statement->execute();
		$row = $statement->fetch(PDO::FETCH_ASSOC);

		$idle = $row['quantity'];
		$req = $row['req_quantity'];

		
		$sql = "SELECT * FROM request WHERE id=:id";
		$stmt=$con->prepare($sql);
		$stmt->bindParam(':id',$id);
		$stmt->execute();

		$getId = $stmt->fetch(PDO::FETCH_ASSOC);
		$rid = $getId['id'];
		$m_id = $getId['material_id'];
		$rquan = $getId['req_quantity'];

		$res='<div class = "row">'; 
			$res.='<div class="col-md-4">';
				$res.='<img src="'.$row['img'].'" class="img-responsive">';
				
				if($idle<$req){
					$res.='<p class="text-danger">You do not have enough materials.Please make Qoutation for Material Supply.</p>';
				}else{
					$res.='<div class="alloc-wrapper">';
						$res.='<form id="allocateForm">';
							$res.='<div class="form-group">';
								$res.='<input type="hidden" name="id" value="'.$rid.'">';
								$res.='<input type="hidden" name="mid" value="'.$m_id.'">';
								$res.='<input type="hidden" name="rq" value="'.$rquan.'">';
								$res.='<select name="alloc" class="form-control alloc-option" id="alloc">';
									$res.='<option value="2">Allocate</option>';
									$res.='<option value="1">Object</option>';
								$res.=' </select>';
							$res.='</div>';
							$res.='<div class="form-group">';
								$res.='<input type="submit" value="Take Action" class="btn btn-info">';
							$res.='</div>';
						$res.'</form>';
					$res.='</div>';
				}
			$res.='</div>';
			
			$res.='<div class="col-md-6">';
				$res.='<h4 class="text-info">'.$row['material_name'].'</h4>';
				$res.='<table class="table table-striped">';
					$res.='<tr>';
						$res.='<th>PRODUCT CODE</th><td>'.$row['product_code'].'</td>';
					$res.='</tr>';
					$res.='<tr>';
						$res.='<th>PRICE</th><td>Rs.'.$row['price'].'</td>';
					$res.='</tr>';
					$res.='<tr>';
						$res.='<th>CURRENT PRICE</th><td>Rs.'.$row['current_price'].'</td>';
					$res.='</tr>';
					$res.='<tr>';
						$res.='<th>IDLE QUANTITY</th><td>'.$row['quantity'].'</td>';
					$res.='</tr>';
					$res.='<tr>';
						$res.='<th>REQUEST DATE</th><td>'.$row['req_date'].'</td>';
					$res.='</tr>';
					$res.='<tr>';
						$res.='<th>REQUEST QUANTITY</th><td>'.$row['req_quantity'].'</td>';
					$res.='</tr>';
					$res.='<tr>';
						$res.='<th>REQUESTED BY</th><td>'.$row['district_name'].' District</td>';
					$res.='</tr>';
				$res.='</table>';
				$res.='<a href="request_material.php">Go Back</a>';
			$res.='</div>';
		$res.='</div>';


		$data['content']=$res;
		echo json_encode($data); 
	}else{
		echo '<h2>No permission to access this page</h2>';
	}
	
?>