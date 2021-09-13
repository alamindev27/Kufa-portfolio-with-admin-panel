<?php 
	require_once '../db.php';
	session_start();
	$id = $_GET['id'];
	$delete= "DELETE FROM counterup WHERE id = $id";
	if (mysqli_query($conn, $delete)) {
		$_SESSION['success'] = 'Permanent delete successfull.';
		header('location:trash-counterup.php?id='.$id);
	}
 ?>