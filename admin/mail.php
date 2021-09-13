<?php
  require_once 'inc/header.php'; 
  require_once '../db.php';
  require_once 'inc/mail-left-sidebar.php';
  $sN = "SELECT COUNT(*) as total FROM message WHERE notification = 'on' ";
  $nQuery = mysqli_query($conn, $sN);
  $nAssoc = mysqli_fetch_assoc($nQuery);

  $selectma = "SELECT * FROM message WHERE status = 1 ORDER BY id DESC";
  $maq = mysqli_query($conn, $selectma);

  $totalcount = "SELECT COUNT(*) as total_message FROM message WHERE status = 1";
  $totalquery = mysqli_query($conn, $totalcount);
  $totalassoc = mysqli_fetch_assoc($totalquery);
?>

    </div>
  </div>
  <!-- /.col -->
  <div class="col-md-9">
     <?php
        if (isset($_SESSION['success'])) { ?>
          <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong><?= $_SESSION['success'] ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <?php
          unset($_SESSION['success']);
            } ?>
    <div class="card card-primary card-outline">
      <div class="card-header">
        <h3 class="card-title">Inbox <?php echo '('. $totalassoc['total_message'].')'; ?></h3>
        <div class="card-tools">
          <div class="input-group input-group-sm">
            <input type="text" class="form-control" placeholder="Search Mail">
            <div class="input-group-append">
              <div class="btn btn-primary">
                <i class="fas fa-search"></i>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-tools -->
      </div>
      <!-- /.card-header -->
      <div class="card-body p-0">
        <div class="mailbox-controls">
          <!-- Check all button -->

        <form action="delete-message.php" method="post">
           <label class="btn btn-default btn-sm mt-2">
                  <input  type="checkbox" name="" id="checkAll">
                </label>
            <div class="btn-group">
            <?php 
            if ($totalassoc['total_message'] < 1) {
              echo '';
            }else{
              ?>
               
                
              <button class="btn btn-default btn-sm">
                <i class="far fa-trash-alt"></i>
              </button>
              <?php
            }

             ?>
            <button type="button" class="btn btn-default btn-sm">
              <i class="fas fa-reply"></i>
            </button>
            <button type="button" class="btn btn-default btn-sm">
              <i class="fas fa-share"></i>
            </button>

          </div>
          <!-- /.btn-group -->
          <button type="button" class="btn btn-default btn-sm">
            <i class="fas fa-sync-alt"></i>
          </button >
          
          <div class="float-right">
            1-50/200
            <div class="btn-group">
              <button type="button" class="btn btn-default btn-sm">
                <i class="fas fa-chevron-left"></i>
              </button>
              <button type="button" class="btn btn-default btn-sm">
                <i class="fas fa-chevron-right"></i>
              </button>
            </div>
            <!-- /.btn-group -->
          </div>
          <!-- /.float-right -->
        </div>
        <div class="table-responsive mailbox-messages">
          <table class="table table-hover table-striped">
            <tbody>
<?php foreach ($maq as $key => $message): ?>
            <tr>
              <td>
                <label id="checkall">
                  <input type="checkbox" name="msg_id[]" value="<?= $message['id'] ?>">
                </label>
              </td>

              <td class="mailbox-star">
                <i class="fas fa-star <?= $message['notification'] == 'on' ? 'text-danger' : 'text-muted' ?>"></i>
              </td>
              
              <td style="cursor:pointer;" class="mailbox-name">
               <a class="<?= $message['notification'] == 'on' ? 'text-primary' : 'text-muted' ?>" href="single-message-view.php?mail=<?= $message['id'] ?>"><?= $message['email'] ?> <br> <?= $message['dat'] ?></a>
              </td>
              
              <td class="mailbox-subject">
                <b><?= $message['name'] ?></b> - 
                <?php 
                  $message = $message['message'];
                  $sortMsg = substr($message, 0, 30);
                  echo $sortMsg.'....';
                 ?>
              </td>
            </tr>
<?php endforeach ?>
            </tbody>
          </table>
          <!-- /.table -->
        </div>
      </form>
        <!-- /.mail-box-messages -->
      </div>
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>
    
  <?php require_once 'inc/footer.php' ?>