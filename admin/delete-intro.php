<?php 
	require_once '../db.php';
	session_start();
	$id = $_GET['id'];
	$delete = "DELETE FROM hero WHERE id = $id";
	$selecImg = "SELECT * FROM hero";
	$sQuery = mysqli_query($conn, $selecImg);
	$ImgAssoc = mysqli_fetch_assoc($sQuery);
	if (file_exists('intro/'.$ImgAssoc['image'])) {
		unlink('intro/'.$ImgAssoc['image']);
		if (mysqli_query($conn, $delete)) {
		$_SESSION['success'] = 'success';
		header('location:view-intro.php?id='.$id);
		}else{
			$_SESSION['errors'] = 'errors';
			header('location:view-intro.php?id='.$id);
		}
	}
	
 ?>