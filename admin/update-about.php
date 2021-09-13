<?php 
	require_once '../db.php';
	session_start();
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$id = $_POST['id'];
		$heading = mysqli_real_escape_string($conn, $_POST['heading']);
		$description = mysqli_real_escape_string($conn, $_POST['description']);
		$update = "UPDATE about SET heading = '$heading', description = '$description' WHERE id = $id ";
		if (mysqli_query($conn, $update)) {
			$_SESSION['success'] = "Update Successfull";
			header('location:edit-about.php?id='.$id);
		}else{
			$_SESSION['errors'] = "Update Unseccessfull";
			header('location:edit-about.php?id='.$id);
		}
	}else{
		header('location:edit-about.php?id='.$id);
	}
 ?>