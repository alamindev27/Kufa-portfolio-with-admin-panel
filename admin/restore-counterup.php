<?php 
	require_once '../db.php';
	session_start();
	$id = $_GET['id'];
	$restore = "UPDATE counterup SET status = 1 WHERE id = $id";
	if (mysqli_query($conn, $restore)) {
		$_SESSION['success'] = 'Restore counterup successfull.';
		header('location:trash-counterup.php?id='.$id);
	}else{
		$_SESSION['errors'] = 'Restore Failed.';
		header('location:trash-counterup.php?id='.$id);
	}
 ?>