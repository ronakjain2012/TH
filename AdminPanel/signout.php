<?php 
session_start();
date_default_timezone_set('Asia/Kolkata');
		$host = "localhost";
		$user = "root";
		$pwd = "root";
		$db = "adminp";
		$url = "http://localhost/Try1/adminP.php";
		$con = new MySQLi($host,$user,$pwd);		
		$con->select_db($db);
		$id = session_id();
		$tm = time();
		session_destroy();
		$query = "update user_details set th_session_end='".$tm."' where th_session_id='".$id."'";
		$con->query($query);
		header("Location: ".$url);
		die();
		exit();
?>