<?php 
	require_once '../db.php';
	session_start();
	$id = $_GET['id'];
	$delete = "UPDATE education SET status = 2 WHERE id = $id";
	if(mysqli_query($conn, $delete)){
		$_SESSION['success'] = 'Education delete successfull';
		header('location:viwe-education.php');
	}else{
		$_SESSION['errors'] = 'Education delete Unsuccessfull';
		header('location:viwe-education.php');
	}
 ?>