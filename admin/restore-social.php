<?php 
    require_once '../db.php';
    session_start();
    $id = $_GET['id'];
    $restore = "UPDATE social SET status = 1 WHERE id = $id";
    if (mysqli_query($conn, $restore)) {
        $_SESSION['success'] = 'Restore Icon successfull.';
        header('location:trash-social.php?id='.$id);
    }else{
        $_SESSION['errors'] = 'Restore Failed.';
        header('location:trash-social.php?id='.$id);
    }
 ?>