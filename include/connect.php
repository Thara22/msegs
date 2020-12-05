<?php
	$server='localhost';
	$username='root';
	$password='';
	// $dbname='mpscandroid';
	$dbname='msegs';

	// create connection
	try{
		$con=new PDO("mysql:host=$server;dbname=$dbname","$username","$password");
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $e){
		die('unable to connect with the database');
	}
?>