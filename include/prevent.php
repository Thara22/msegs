<?php
	include './include/connect.php';
	function prevent($prevent){
		global $con;
		$prevent = stripslashes($prevent);
		$prevent = mysqli_real_escape_string($con, trim($prevent));
	}
?>