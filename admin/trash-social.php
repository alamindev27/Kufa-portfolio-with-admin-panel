<?php
  require_once 'inc/header.php'; 
  require_once '../db.php';
  $select = "SELECT * FROM social WHERE status = 2";
  $query = mysqli_query($conn, $select);
  $selectcount = "SELECT COUNT(*) as total FROM social WHERE status = 2";
  $selectQuery = mysqli_query($conn, $selectcount);
  $assoc = mysqli_fetch_assoc($selectQuery);
?>
    <?php
        if (isset($_SESSION['success'])) { ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?php echo $_SESSION['success'] ?>!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <?php
          unset($_SESSION['success']);
            } ?>

<div class="card">
  <div class="card-header bg-primary">
    <h3 class="card-title">View Social <?php if($assoc['total'] == 0 ){
        echo ''; }else{echo '('.$assoc['total'].')'; } ?></h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <div class="card-body p-0">
    <table class="table table-striped projects">
        <thead>
            <tr>
                <th style="width: 10%">
                    SL
                </th>
                <th style="width: 20%">
                    Icon
                </th>
                <th style="width: 20%">
                    Link
                </th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($query as $key => $social): ?>
             <tr>
                <td>
                    0<?= ++$key ?>
                </td>
                <td class="text-center" style="font-size:30px; color: #8cc090; background: #ddd;">
                    <i class="<?php if (isset($social['icon'])) {
                    echo $social['icon'];
                  }  ?>"></i>
                  
                    <br>
                </td>
                <td>
                    <a target="blank" href="<?= $social['link'] ?>"><?= $social['link'] ?></a>
                </td>
                
                <?php 
                  if (isset($social['icon'])) { ?>
                    <td class="project-actions text-right">
                    <a class="btn btn-info btn-sm" href="restore-social.php?id=<?= $social['id'] ?>">
                        <i class="fa fa-undo">
                        </i>
                        Restore
                    </a>
                    <a class="btn btn-danger btn-sm" href="delete-permanent-social.php?id=<?= $social['id'] ?>">
                        <i class="fas fa-trash">
                        </i>
                        Delete permanent
                    </a>
                </td>
                    <?php
                  }
                 ?>
            </tr>   
            <?php endforeach ?>
        </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>
  <?php require_once 'inc/footer.php' ?>