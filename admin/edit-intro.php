<?php
  require_once 'inc/header.php'; 
  require_once '../db.php';
  $id = $_GET['id'];
  $select = "SELECT * FROM hero WHERE id = $id";
  $query = mysqli_query($conn, $select);
  $assoc = mysqli_fetch_assoc($query);
?>
 
<div class="card card-primary" style="width:500px;margin: 0 auto;">
  <div class="card-header">
    <h3 class="card-title text-uppercase">edit intro</h3>
  </div>
  <form action="update-intro.php" method="post" enctype="multipart/form-data">
    <input type="hidden" value="<?= $id ?>" name="id">
    <div class="card-body">
      <div class="form-group">
        <label">Intro</label>
        <input type="text" class="form-control" name="intro" placeholder="enter intro" required value="<?= $assoc['intro'] ?>">
      </div>
      <div class="form-group">
        <label">Name</label>
        <input type="text" class="form-control" name="name" placeholder="enter name" required value="<?= $assoc['name'] ?>">
      </div>
      <div class="form-group">
        <label">Description</label>
        <textarea class="form-control" name="description" rows="3" required placeholder="enter sort Description"><?= $assoc['sort_description'] ?></textarea>
      </div>

      <div class="form-group">
        <label">Image</label>
        <input type="file" name="image" required class="form-control">

      </div>

    </div>
    <img src="intro/<?= $assoc['image'] ?>" style="width: 100px;float: right;">
      <?php
        if (isset($_SESSION['success'])) { ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Successfull!</strong> Update intro successful
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
      <button type="submit" class="btn btn-primary">Save Change</button>
    </div>
  </form>
</div>









  <?php require_once 'inc/footer.php' ?>