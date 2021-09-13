<?php 
	require_once '../db.php';
	session_start();
	$id = $_GET['id'];
	$delete = "UPDATE counterup SET status = 2 WHERE id = $id";
	if(mysqli_query($conn, $delete)){
		$_SESSION['success'] = 'Education delete successfull';
		header('location:viwe-counterup.php');
	}else{
		$_SESSION['errors'] = 'counterup delete Unsuccessfull';
		header('location:viwe-counterup.php');
	}
 ?>