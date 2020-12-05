<?php
	session_start();
	include '../include/connect.php';

	$id = $_GET['id'];
	$update_status = 1;

	$sql= 'UPDATE request SET status=:status WHERE id=:id';
	$stmt=$con->prepare($sql);
	$stmt->bindParam(':status', $update_status);
	$stmt->bindParam(':id', $id);
	$stmt->execute();
?>