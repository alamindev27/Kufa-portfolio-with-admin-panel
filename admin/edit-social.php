<?php
  require_once 'inc/header.php'; 
  require_once '../db.php';
  $id = $_GET['id'];
  $select = "SELECT * FROM social WHERE id = $id";
  $query = mysqli_query($conn, $select);
  $assoc = mysqli_fetch_assoc($query);
?>
 
<div class="card card-primary" style="width:500px;margin: 0 auto;">
  <div class="card-header">
    <h3 class="card-title text-uppercase">Edit Social</h3>
  </div>
  <form action="update-social.php" method="post">
    <div class="card-body">
      <div class="form-group">
        <label">Link</label>
        <input type="text" class="form-control" name="link" placeholder="enter link" required value="<?= $assoc['link'] ?>">
        <input type="hidden" value="<?= $id ?>" name="id">
      </div>
      <div class="form-group">
        <label">Icon</label>
          <select class="form-control" name="icon" required>
            <option value="">Select Icon</option>
            <option value="fab fa-facebook-f">Facebook</option>
            <option value="fab fa-twitter">Twitter</option>
            <option value="fab fa-instagram">Instagram</option>
            <option value="fab fa-pinterest">Pinterest</option>
            <option value="fab fa-linkedin-in">Linkedin</option>
            <option value="fab fa-whatsapp">Whatsapp</option>
            <option value="fab fa-skype">Skype</option>
            <option value="fab fa-telegram-plane">Telegram</option>
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
      <button type="submit" class="btn btn-primary">Update Icon</button>
    </div>
  </form>
</div>









  <?php require_once 'inc/footer.php' ?>