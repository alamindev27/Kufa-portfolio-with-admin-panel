<?php
  require_once 'inc/header.php'; 
  require_once '../db.php';
  $select = "SELECT * FROM counterup WHERE status = 1";
  $query = mysqli_query($conn, $select);
  $selectcount = "SELECT COUNT(*) as total FROM counterup WHERE status = 1";
  $selectQuery = mysqli_query($conn, $selectcount);
  $assoc = mysqli_fetch_assoc($selectQuery);
?>
<?php
        if (isset($_SESSION['success'])) { ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Successfull!</strong> Delete Successfull.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <?php
          unset($_SESSION['success']);
            } ?>

<div class="card">
  <div class="card-header bg-primary">
    <h3 class="card-title">View Counterup <?php if($assoc['total'] == 0 ){
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
                <th style="width: 1%">
                    SL
                </th>
                <th style="width: 20%">
                    Title
                </th>
                <th style="width: 20%">
                    Counter
                </th>
                <th style="width: 20%" class="text-center">
                    Icon
                </th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($query as $key => $counter): ?>
             <tr>
                <td>
                    0<?= ++$key ?>
                </td>
                <td class="text-uppercase">
                  <?php if (isset($counter['title'])) {
                    echo $counter['title'];
                  }  ?>
                    <br>
                </td>
                <td class="text-capitalize">
                    <?php if (isset($counter['counter'])) {
                    echo $counter['counter'];
                  }  ?>
                </td>
                <td class="text-capitalize text-center" style="font-size:30px; color: #8cc090; background: #ddd;">
                    <i class="<?php if (isset($counter['icon'])) {
                    echo $counter['icon'];
                  }  ?>"></i>
                </td>
                
                <?php 
                  if (isset($counter['title'])) { ?>
                    <td class="project-actions text-right">
                    <a class="btn btn-info btn-sm" href="edit-counterup.php?id=<?= $counter['id'] ?>">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Edit
                    </a>
                    <a class="btn btn-danger btn-sm" href="delete-counterup.php?id=<?= $counter['id'] ?>">
                        <i class="fa fa-ban">
                        </i>
                        Delete
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