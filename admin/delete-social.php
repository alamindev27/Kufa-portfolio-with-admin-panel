<?php require_once '../db.php';
	session_start();
	$id = $_GET['id'];
	$delete = "UPDATE social SET status = 2 WHERE id = $id";
	if (mysqli_query($conn, $delete)) {
		$_SESSION['success'] = 'Delete Successfull.';
		header('location:view-social.php?id='.$id);
	}else{
		$_SESSION['errors'] = 'Delete Faield.';
		header('location:view-social.php?id='.$id);
	}
 ?>