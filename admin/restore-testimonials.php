<?php 
    require_once '../db.php';
    session_start();
    $id = $_GET['id'];
    $restore = "UPDATE testimonials SET status = 1 WHERE id = $id";
    if (mysqli_query($conn, $restore)) {
        $_SESSION['success'] = 'Restore service successfull.';
        header('location:trash-testimonials.php?id='.$id);
    }else{
        $_SESSION['errors'] = 'Restore Failed.';
        header('location:trash-testimonials.php?id='.$id);
    }
 ?>