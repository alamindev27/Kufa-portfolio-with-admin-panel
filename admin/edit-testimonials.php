<?php
  require_once 'inc/header.php'; 
  require_once '../db.php';
  $id = $_GET['id'];
  $select = "SELECT * FROM Testimonials WHERE id = $id";
  $query = mysqli_query($conn, $select);
  $assoc = mysqli_fetch_assoc($query);
?>
 
<div class="card card-primary" style="width:500px;margin: 0 auto;">
  <div class="card-header">
    <h3 class="card-title text-uppercase">edit Testimonials</h3>
  </div>
  <form action="update-testimonials.php" method="post" enctype="multipart/form-data">
    <div class="card-body">
      <div class="form-group">
        <label">Name</label>
          <input type="hidden" value="<?= $id ?>" name="id">
        <input type="text" class="form-control" name="name" placeholder="Enter name" required value="<?= $assoc['name'] ?>">
      </div>
      <div class="form-group">
        <label">Title</label>
          <input type="text" class="form-control" name="title" placeholder="Enter title" required value="<?= $assoc['title'] ?>">
      </div>
      <div class="form-group">
        <label">Description</label>
          <textarea class="form-control" name="description" placeholder="Enter Description" rows="4" required><?= $assoc['description'] ?>"</textarea>
      </div>
      <div class="form-group">
        <label">Description</label>
          <input type="file" name="timg" class="form-control" required value="<?= $assoc['description'] ?>">
      </div> 
    </div>
      <?php
        if (isset($_SESSION['success'])) { ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Successfull!</strong> <?= $_SESSION['success'] ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <?php
          unset($_SESSION['success']);
            }
            if (isset($_SESSION['errors'])) { ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Opps! </strong> <?= $_SESSION['errors'] ?>
                <button  type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <?php
              unset($_SESSION['errors']);
            }
          ?>
    <div class="card-footer text-center">
      <button type="submit" class="btn btn-primary">Update Testimonials</button>
    </div>
  </form>
</div>









  <?php require_once 'inc/footer.php' ?>