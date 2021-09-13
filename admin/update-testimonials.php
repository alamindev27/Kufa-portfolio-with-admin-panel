<?php 
	require_once '../db.php';
	session_start();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$id = $_POST['id'];
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
	 			header('location:edit-testimonials.php?id='.$id);
	 		}else{
	 			$img_name = strtolower(str_replace(' ', '-', $name));
	 			$image_name = $adminid.rand(000,99999).$img_name.'.'.$extention;
 			    $select = "SELECT * FROM Testimonials WHERE id = $id";
			    $query = mysqli_query($conn, $select);
			    $assoc = mysqli_fetch_assoc($query);
			    if (file_exists('testimonial/'.$assoc['image'])) {
			    	unlink('testimonial/'.$assoc['image']);
			    }
	 			$uploadFolder = 'testimonial/'.$image_name;
	 			move_uploaded_file($_FILES['timg']['tmp_name'], $uploadFolder);
	 			$update = "UPDATE testimonials SET name = '$name', title = '$title', description = '$description', image = '$image_name' WHERE id = $id"; 
	 			if (mysqli_query($conn, $update)) {
	 				$_SESSION['success'] = 'Update a testimonial successfull.';
	 				header('location:edit-testimonials.php?id='.$id);
	 			}else{
	 				$_SESSION['errors'] = 'Adding a testimonial Unsuccessfull.';
	 				header('location:edit-testimonials.php?id='.$id);
	 			}
	 		}
	 	}else{
	 		$_SESSION['errors'] = 'File format not allow.';
	 		header('location:edit-testimonials.php?id='.$id);
	 	}
	}else{
		header('location:edit-testimonials.php?id='.$id);
	}
 ?>