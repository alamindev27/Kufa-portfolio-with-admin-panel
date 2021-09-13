<?php 
	require_once '../db.php';
	session_start();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$id = $_POST['id'];
		$title = mysqli_real_escape_string($conn, $_POST['title']);
		$description = mysqli_real_escape_string($conn, $_POST['description']);
		$icon = $_POST['icon'];
		$update = "UPDATE services SET title = '$title', description = '$description', icon = '$icon' WHERE id = $id";
		$query = mysqli_query($conn, $update);
		if ($query) {
			$_SESSION['success'] = 'Update Successfull';
			header('location:edit-services.php?id='.$id);
		}else{
			$_SESSION['errors'] = 'Update faield';
			header('location:edit-services.php?id='.$id);
		}
	}else{
		header('location:edit-services.php');
	}

 ?>