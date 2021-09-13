<?php 
	require_once '../../db.php';
	session_start();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$title = mysqli_real_escape_string($conn, $_POST['title']);
		$description = mysqli_real_escape_string($conn, $_POST['description']);		
		$c_id = mysqli_real_escape_string($conn, $_POST['c_id']);
		$sluge = mysqli_real_escape_string($conn, $_POST['sluge']);
		$thumbnails = $_FILES['thumbnails']['name'];
		$featured = $_FILES['featured']['name'];

		$tarr = explode('.', $thumbnails);
	 	$textention = end($tarr);
	 	$tformat = ['png', 'jpg', 'jpeg', 'PNG', 'JPG', 'JPEG'];

		$farr = explode('.', $featured);
	 	$fextention = end($farr);
	 	$fformat = ['png', 'jpg', 'jpeg', 'PNG', 'JPG', 'JPEG'];

		$insert = "INSERT INTO portfolios (title, description, category_id, sluge) VALUES ('$title', '$description', $c_id, '$sluge')";
		mysqli_query($conn, $insert);
		$id = mysqli_insert_id($conn);
if (in_array($textention, $tformat) && in_array($fextention, $fformat)) {
	if ($_FILES['thumbnails']['size'] > 9000000 && $_FILES['featured']['size'] > 9000000) {
		echo "file size to big";
	}else{
		$timg_name = strtolower(str_replace(' ', '-', $thumbnails));
		$timage_name = $id.$timg_name.'.'.$textention;

		$fimg_name = strtolower(str_replace(' ', '-', $featured));
		$fimage_name = $id.$fimg_name.'.'.$fextention;
		
    	$tuploadFolder = '../thumbnails/'.$timage_name;
			move_uploaded_file($_FILES['thumbnails']['tmp_name'], $tuploadFolder);

		$fuploadFolder = '../featured/'.$fimage_name;
			move_uploaded_file($_FILES['featured']['tmp_name'], $fuploadFolder);
			$update = "UPDATE portfolios SET thumbnails = '$timage_name', featurd = '$fimage_name' WHERE id = $id";
			$uq = mysqli_query($conn, $update);
			if ($uq) {
				$_SESSION['successPortfolio'] = 'Adding a Portfolio Suiccess';
				header('location:../add-portfolio.php');
			}else{
				echo "hoy nai";
			}
	}
}else{
	echo "formate not allow";
}



	}else{
		header('location:../add-portfolio.php');
	}
?>