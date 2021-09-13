<?php
  require_once 'inc/header.php'; 
  require_once '../db.php';
?>
 
<div class="card card-primary" style="width:500px;margin: 0 auto;">
  <div class="card-header">
    <h3 class="card-title text-uppercase">Add counterup</h3>
  </div>
  <form action="store/store-counterup.php" method="post">
    <div class="card-body">
      <div class="form-group">
        <label">Title</label>
        <input type="text" class="form-control" name="title" placeholder="enter title" required>
      </div>
      <div class="form-group">
        <label">Counterup</label>
        <input type="number" min="1" name="counter" placeholder="Enter counter" class="form-control">
      </div>
      <div class="form-group">
        <label">Icon</label>
          <select class="form-control" name="icon" required>
              <option value>Select Icon</option>
              <option value="fa fa-user-circle">User</option>
              <option value="fa fa-check-square">Check</option>
              <option value="fa fa-trophy">Trophy</option>
              <option value="fas fa-thumbs-up">Thumbs-up</option>
              <option value="fas fa-tasks">Tasks</option>
              <option value="fa fa-coffee">Coffee</option>
              <option value="fa fa-heart">Heart</option>
            </select>

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
      <button type="submit" class="btn btn-primary">Add Counterup</button>
    </div>
  </form>
</div>









  <?php require_once 'inc/footer.php' ?>