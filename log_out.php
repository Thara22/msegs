<?php
	session_start();
	if(isset($_SESSION['admin'])){
		session_unset();
		header('location: index.php');
	}
?>