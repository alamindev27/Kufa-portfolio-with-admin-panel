<?php 
	require_once '../db.php';
	session_start();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$id = $_POST['id'];
		$heading = mysqli_real_escape_string($conn, $_POST['heading']);
		$year = $_POST['year'];
		$progress = $_POST['progress'];
		$update = "UPDATE education SET title = '$heading', year = '$year', progress = '$progress' WHERE id = $id ";
		if (mysqli_query($conn, $update)) {
			$_SESSION['success'] = 'Update Successfull.';
			header('location:edit-education.php?id='.$id);
		}else{
			$_SESSION['errors'] = 'Update Successfull.';
			header('location:edit-education.php?id='.$id);
		}
	}else{
		header('location:edit-education.php?id='.$id);
	}
 ?>