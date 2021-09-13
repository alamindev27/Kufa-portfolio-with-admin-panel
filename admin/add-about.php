<?php
  require_once 'inc/header.php'; 
  require_once '../db.php';
?>
 
<div class="card card-primary" style="width:500px;margin: 0 auto;">
  <div class="card-header">
    <h3 class="card-title text-uppercase">Add about</h3>
  </div>
  <form action="store/store-about.php" method="post">
    <div class="card-body">
      <div class="form-group">
        <label">Heading</label>
        <input type="text" class="form-control" name="heading" placeholder="enter heading" required>
      </div>
      <div class="form-group">
        <label">Description</label>
        <textarea class="form-control" name="description" rows="3" required placeholder="Enter Description"></textarea>
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
      <button type="submit" class="btn btn-primary">Add About</button>
    </div>
  </form>
</div>









  <?php require_once 'inc/footer.php' ?>