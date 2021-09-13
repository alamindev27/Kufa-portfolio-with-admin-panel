<?php 
	require_once '../../db.php';
	session_start();
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$heading = mysqli_real_escape_string($conn, $_POST['heading']);
		$description = mysqli_real_escape_string($conn, $_POST['description']);
		$selectcount = "SELECT COUNT(*) as total FROM about";
		$selectQuery = mysqli_query($conn, $selectcount);
		$selectAssoc = mysqli_fetch_assoc($selectQuery);
		if ($selectAssoc['total'] > 0) {
			$_SESSION['errors'] = 'Already About';
			header('location:../add-about.php');
		}else{
			$insert = "INSERT INTO about (heading, description) VALUES ('$heading', '$description') ";
			if (mysqli_query($conn, $insert)) {
				$_SESSION['success'] = 'Adding a new about successful.';
				header('location:../add-about.php');
			}else{
				$_SESSION['erorrs'] = 'Adding Faield.';
				header('location:../add-about.php');
			}
		}
		
	}else{
		header('location:../add-about.php');
	}
 ?>