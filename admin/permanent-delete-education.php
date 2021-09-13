<?php 
	require_once '../db.php';
	session_start();
	$id = $_GET['id'];
	$delete= "DELETE FROM education WHERE id = $id";
	if (mysqli_query($conn, $delete)) {
		$_SESSION['success'] = 'Permanent delete successfull.';
		header('location:trash-education.php?id='.$id);
	}
 ?>