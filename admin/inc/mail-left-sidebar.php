<?php 
require_once '../db.php';
  $url = $_SERVER['PHP_SELF'];
  $exp = explode('/', $url);
  $activeMsg = end($exp);
  

  ?>
<div class="row">
  <div class="col-md-3">
    <a href="#" class="btn btn-primary btn-block mb-3">Compose</a>

    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Folders</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="card-body p-0">
        <ul class="nav nav-pills flex-column">
          <li class="nav-item active">
            <a href="mail.php" class="nav-link <?= $activeMsg == 'mail.php' ? 'text-primary' : '' ?>">
              <i class="fas fa-inbox"></i> Inbox
              <span class="badge bg-primary float-right">
              	<?php 
              	if($notificationAssoc['total'] == 0) {
              		echo ''; 
              	}else{
              		echo $notificationAssoc['total'];
              	}
              	?>
              		
              	</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-envelope"></i> Sent
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-file-alt"></i> Drafts
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-filter"></i> Junk
              <span class="badge bg-warning float-right">65</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="trash-messages.php" class="nav-link <?= $activeMsg == 'trash-messages.php' ? 'text-primary' : '' ?>">
              <i class="far fa-trash-alt"></i> Trash
            </a>
          </li>
        </ul>
      </div>
      <!-- /.card-body -->