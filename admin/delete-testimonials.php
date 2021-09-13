<?php 
	require_once '../db.php';
	session_start();
	$id = $_GET['id'];
	$delete = "UPDATE testimonials SET status = 2 WHERE id = $id";
	if (mysqli_query($conn, $delete)) {
		$_SESSION['success'] = 'Delete Successfull';
		header('location:viwe-testimonials.php?id='.$id);
	}else{
		$_SESSION['errors'] = 'Delete Unuccessfull';
		header('location:viwe-testimonials.php?id='.$id);
	}
 ?>