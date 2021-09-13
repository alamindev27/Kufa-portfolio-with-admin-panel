<?php 
	require_once '../../db.php';
	session_start();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$heading = mysqli_real_escape_string($conn, $_POST['heading']);
		$year = $_POST['year'];
		$progress = $_POST['progress'];
		$selectcount = "SELECT COUNT(*) as total FROM education WHERE status = 1";
		$selectQuery = mysqli_query($conn, $selectcount);
		$selectAssoc = mysqli_fetch_assoc($selectQuery);
		if ($selectAssoc['total'] > 5) {
			$_SESSION['errors'] = 'Already 4 About part exits.';
			header('location:../add-education.php');
		}else{
			$insert = "INSERT INTO education (title, year, progress) VALUES ('$heading' , '$year', '$progress')";
			if (mysqli_query($conn, $insert)) {
				$_SESSION['success'] = 'Adding Successfull';
				header('location:../add-education.php');
			}else{
				$_SESSION['errors'] = 'Adding Successfull';
				header('location:../add-education.php');
			}
		}
	}else{
		header('location:../add-education.php');
	}
 ?>