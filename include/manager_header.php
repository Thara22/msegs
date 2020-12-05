<!DOCTYPE html>
<html>
<head>
	<title>material management system</title>
	<meta charset='utf-8'>
	<meta name='viewport' content='width=device-width initial-scale=1, shrink-to-fit=no'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/jquery-ui.min.css">
	<link rel="stylesheet" href="../css/jquery-ui.theme.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link rel='stylesheet' href='../css/style.css'>
	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/jquery-ui.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
	<script src="../js/myscript.js"></script>
</head>
<body>
	<div class="header">
	  <h1 class="text-center">MATERIAL MANAGEMENT SYSTEM</h1>
	  <h4 class="text-center">MIZORAM STATE E-GOVERNANCE SOCIETY</h4>
	  <h4 class="text-center">Welcome to District Manager's Dashboard</h4>
	</div>
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	  	<div class="col-md-2"></div>
	  	<div class="col-md-6">
	  		<ul class="nav navbar-nav">

<?php

			$id=$_SESSION['uid'];
			// $id=$_GET['id'];
			echo '<li class="active"><a href="dashboard.php?id='.$id.'">Materials</a></li>';
		    echo '<li><a href="request_history.php?id='.$id.'">Request History</a></li>';
		    echo '<li><a href="log_out.php">Sign Out</a></li>';

?>
		    </ul>
	  	</div>
	  	<div class="col-md-2"></div>
	  </div>
	</nav>