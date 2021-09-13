<?php 
	require_once '../../db.php';
	session_start();
	$adminid = $_SESSION['adminid'];
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$name = mysqli_real_escape_string($conn, $_POST['name']);
		$title = mysqli_real_escape_string($conn, $_POST['title']);
		$description = mysqli_real_escape_string($conn, $_POST['description']);
		$image = $_FILES['timg']['name'];
		$arr = explode('.', $image);
	 	$extention = end($arr);
	 	$format = ['png', 'jpg', 'jpeg', 'PNG', 'JPG', 'JPEG'];
	 	if (in_array($extention, $format)) {
	 		if ($_FILES['image']['size'] > 9000000) {
	 			$_SESSION['errors'] = 'Image to long';
	 			header('location:../add-testimonials.php');
	 		}else{
	 			$img_name = strtolower(str_replace(' ', '-', $name));
	 			$image_name = $adminid.rand(000,99999).$img_name.'.'.$extention;
	 			$uploadFolder = '../testimonial/'.$image_name;
	 			move_uploaded_file($_FILES['timg']['tmp_name'], $uploadFolder);
	 			$insert = "INSERT INTO testimonials (name,title,description,image) VALUES ('$name', '$title', '$description', '$image_name')";
	 			if (mysqli_query($conn, $insert)) {
	 				$_SESSION['success'] = 'Adding a testimonial successfull.';
	 				header('location:../add-testimonials.php');
	 			}else{
	 				$_SESSION['errors'] = 'Adding a testimonial Unsuccessfull.';
	 				header('location:../add-testimonials.php');
	 			}
	 		}
	 	}else{
	 		$_SESSION['errors'] = 'File format not allow.';
	 		header('location:../add-testimonials.php');
	 	}
	}else{
		header('location:../add-testimonials.php');
	}

 ?>