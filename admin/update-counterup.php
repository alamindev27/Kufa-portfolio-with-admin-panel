<?php 
	require_once '../db.php';
	session_start();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$id = $_POST['id'];
		$title = mysqli_real_escape_string($conn, $_POST['title']);
		$counter = $_POST['counter'];
		$icon = $_POST['icon'];
		$update = "UPDATE counterup SET title = '$title', counter = '$counter', icon = '$icon' WHERE id = $id";
		if (mysqli_query($conn, $update)) {
			$_SESSION['success'] = 'Update successful';
			header('location:edit-counterup.php?id='.$id);
		}else{
			$_SESSION['errors'] = 'Update Faield.';
			header('location:edit-counterup.php?id='.$id);
		}
	}else{
		header('location:edit-counterup.php?id='.$id);
	} ?>



	