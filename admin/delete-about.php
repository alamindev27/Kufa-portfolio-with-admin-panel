<?php require_once '../db.php';
	session_start();
	$id = $_GET['id'];
	$delete = "DELETE FROM about WHERE id = $id";
	if (mysqli_query($conn, $delete)) {
		$_SESSION['success'] = 'Delete Successfull';
		header('location:viwe-about.php?id='.$id);
	}else{
		$_SESSION['errors'] = 'Delete Unuccessfull';
		header('location:viwe-about.php?id='.$id);
	}
 ?>