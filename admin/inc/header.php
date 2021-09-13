<?php 
require_once '../db.php';
  include 'session.php';
  $url = $_SERVER['PHP_SELF'];
  $exp = explode('/', $url);
  $fix = end($exp);
  $adminid = $_SESSION['adminid'];
  $circle1 = 'far fa-circle nav-icon';
  $circle2 = 'fa fa-circle nav-icon';

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="assets/plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="assets/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
<?php 
  $selectN = "SELECT COUNT(*) as total FROM message WHERE notification = 'on' ";
  $noQuery = mysqli_query($conn, $selectN);
  $notificationAssoc = mysqli_fetch_assoc($noQuery);
  $selectma = "SELECT * FROM message WHERE notification = 'on' ORDER BY id DESC";
  $maq = mysqli_query($conn, $selectma);


 ?>
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">
            <?= $notificationAssoc['total'] ?>
          </span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
          <?php
          foreach ($maq as $key => $notificationMsg) {
              if ($key == 5) {
                  break;    
          } ?>
          <a href="single-message-view.php?mail=<?= $notificationMsg['id'] ?>" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <div class="media-body">
                <h3 class="dropdown-item-title font-weight-bold">
                  <?= $notificationMsg['name'] ?>
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm"><?php 
                  $message = $notificationMsg['message'];
                  $sortMsg = substr($message, 0, 40);
                  echo $sortMsg.'....';
                 ?></p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> <?= $notificationMsg['dat'] ?></p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <?php 
            }
            ?>

          <div class="dropdown-divider"></div>
          <a href="mail.php" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">
      <img src="assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">FMA</span>
    </a>
<?php 
  $selectadmin = "SELECT * FROM admin WHERE id = $adminid ";
  $adminQuery = mysqli_query($conn, $selectadmin);
  $adminAssoc = mysqli_fetch_assoc($adminQuery);
 ?>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="profile/<?= $adminAssoc['image'] ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="profile-view.php" class="d-block">F.M.A</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item menu-open">
            <a href="dashboard.php" class="nav-link <?= $fix == 'dashboard.php' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link <?= $fix == 'add-intro.php' ? 'active' : $fix == 'view-intro.php' ? 'active' : $fix == 'edit-intro.php' ? 'active' : '' ?>">
              <i class="nav-icon fa fa-address-book"></i>
              <p>
                Intro Section
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add-intro.php" class="nav-link">
                  <i class="<?= $fix == 'add-intro.php' ? $circle2 : $circle1 ?>"></i>
                  <p>Add Intro</p>
                </a>
              </li>
              <li class="nav-item text-capitalize">
                <a href="view-intro.php" class="nav-link">
                  <i class="<?= $fix == 'view-intro.php' ? $circle2 : $circle1 ?>"></i>
                  <p>View intro</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link <?= $fix == 'add-social.php' ? 'active' : $fix == 'view-social.php' ? 'active' : $fix == 'edit-social.php' ? 'active' : $fix == 'trash-social.php' ? 'active' : '' ?>">
              <i class="nav-icon fa fa-retweet"></i>
              <p>
                Social
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add-social.php" class="nav-link">
                  <i class="<?= $fix == 'add-social.php' ? $circle2 : $circle1 ?>"></i>
                  <p>Add Social</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="view-social.php" class="nav-link">
                  <i class="<?= $fix == 'view-social.php' ? $circle2 : $circle1 ?>"></i>
                  <p>View Social</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="trash-social.php" class="nav-link">
                  <i class="<?= $fix == 'trash-social.php' ? $circle2 : $circle1 ?>"></i>
                  <p>Trash Social</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link <?= $fix == 'add-about.php' ? 'active' : $fix == 'viwe-about.php' ? 'active' : $fix == 'edit-about.php' ? 'active' : '' ?>">
              <i class="nav-icon fa fa-user"></i>
              <p>
                About
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add-about.php" class="nav-link">
                  <i class="<?= $fix == 'add-about.php' ? $circle2 : $circle1 ?>"></i>
                  <p>Add About</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="viwe-about.php" class="nav-link">
                  <i class="<?= $fix == 'viwe-about.php' ? $circle2 : $circle1 ?>"></i>
                  <p>View About</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link <?= $fix == 'add-education.php' ? 'active' : $fix == 'viwe-education.php' ? 'active' : $fix == 'trash-education.php' ? 'active' : $fix == 'edit-education.php' ? 'active' : '' ?>">
              <i class="nav-icon fa fa-graduation-cap"></i>
              <p>
                Education
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add-education.php" class="nav-link">
                  <i class="<?= $fix == 'add-education.php' ? $circle2 : $circle1 ?>"></i>
                  <p>Add Education</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="viwe-education.php" class="nav-link">
                  <i class="<?= $fix == 'viwe-education.php' ? $circle2 : $circle1 ?>"></i>
                  <p>View Education</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="trash-education.php" class="nav-link">
                  <i class="<?= $fix == 'trash-education.php' ? $circle2 : $circle1 ?>"></i>
                  <p>Trash Education</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link <?= $fix == 'add-services.php' ? 'active' : $fix == 'viwe-services.php' ? 'active' : $fix == 'trash-services.php' ? 'active' : $fix == 'edit-services.php' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Services
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add-services.php" class="nav-link">
                  <i class="<?= $fix == 'add-services.php' ? $circle2 : $circle1 ?>"></i>
                  <p>Add Services</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="viwe-services.php" class="nav-link">
                  <i class="<?= $fix == 'viwe-services.php' ? $circle2 : $circle1 ?>"></i>
                  <p>View Services</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="trash-services.php" class="nav-link">
                  <i class="<?= $fix == 'trash-services.php' ? $circle2 : $circle1 ?>"></i>
                  <p>Trash Services</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link <?= $fix == 'add-portfolio.php' ? 'active' : $fix == 'view-portfolio.php' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-file-export"></i>
              <p>
                Portfolio
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add-portfolio.php" class="nav-link">
                  <i class="<?= $fix == 'add-portfolio.php' ? $circle2 : $circle1 ?>"></i>
                  <p>Add Portfolio</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="view-portfolio.php" class="nav-link">
                  <i class="<?= $fix == 'view-portfolio.php' ? $circle2 : $circle1 ?>"></i>
                  <p>View Portfolio</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link <?= $fix == 'add-counterup.php' ? 'active' : $fix == 'viwe-counterup.php' ? 'active' : $fix == 'trash-counterup.php' ? 'active' : $fix == 'edit-counterup.php' ? 'active' : '' ?>">
              <i class="nav-icon fa fa-list-ol"></i>
              <p>
                Counter Up
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add-counterup.php" class="nav-link">
                  <i class="<?= $fix == 'add-counterup.php' ? $circle2 : $circle1 ?>"></i>
                  <p>Add Counterup</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="viwe-counterup.php" class="nav-link">
                  <i class="<?= $fix == 'viwe-counterup.php' ? $circle2 : $circle1 ?>"></i>
                  <p>View Counterup</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="trash-counterup.php" class="nav-link">
                  <i class="<?= $fix == 'trash-counterup.php' ? $circle2 : $circle1 ?>"></i>
                  <p>Trash Counterup</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link <?= $fix == 'add-testimonials.php' ? 'active' : $fix == 'viwe-testimonials.php' ? 'active' : $fix == 'trash-testimonials.php' ? 'active' : $fix == 'edit-testimonials.php' ? 'active' : '' ?>">
              <i class="nav-icon far fa-bookmark"></i>
              <p>
                Testimonials
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add-testimonials.php" class="nav-link">
                  <i class="<?= $fix == 'add-testimonials.php' ? $circle2 : $circle1 ?>"></i>
                  <p>Add Testimonials</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="viwe-testimonials.php" class="nav-link">
                  <i class="<?= $fix == 'viwe-testimonials.php' ? $circle2 : $circle1 ?>"></i>
                  <p>View Testimonials</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="trash-testimonials.php" class="nav-link">
                  <i class="<?= $fix == 'trash-testimonials.php' ? $circle2 : $circle1 ?>"></i>
                  <p>Trash Testimonials</p>
                </a>
              </li>
            </ul>
          </li>

       

       
          <li class="nav-item">
            <a href="mail.php" class="nav-link <?= $fix == 'mail.php' ? 'active' : $fix == 'single-message-view.php' ? 'active' : '' ?>">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Mailbox
              </p>
            </a>
          </li>










          <!-- <li class="nav-item">
            <a href="mail.php" class="nav-link <?= $fix == 'mail.php' ? 'active' : '' ?>">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Mailbox
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li> -->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">
<?php
  if ($fix == 'dashboard.php') {
    echo "<h1 class='text-uppercase font-weight-bold'>dashboard</h1>";
  }else if ($fix == 'profile-view.php') {
    echo "<span class='text-capitalize'>profile</span>";
  }else if ($fix == 'add-intro.php') {
    echo "<h1 class='text-uppercase font-weight-bold'>Add intro</h1>";
  }else if ($fix == 'view-intro.php') {
    echo "<h1 class='text-uppercase font-weight-bold'>view intro</h1>";
  }else if ($fix == 'add-social.php') {
    echo "<h1 class='text-uppercase font-weight-bold'>Add Social</h1>";
  }else if ($fix == 'trash-social.php') {
    echo "<h1 class='text-uppercase font-weight-bold'>trash Social</h1>";
  }else if ($fix == 'view-social.php') {
    echo "<h1 class='text-uppercase font-weight-bold'>View Social</h1>";
  }else if ($fix == 'edit-social.php') {
    echo "<h1 class='text-uppercase font-weight-bold'>edit Social</h1>";
  }else if ($fix == 'edit-intro.php') {
    echo "<h1 class='text-uppercase font-weight-bold'>edit intro</h1>";
  }else if ($fix == 'add-about.php') {
    echo "<h1 class='text-uppercase font-weight-bold'>add about</h1>";
  }else if ($fix == 'viwe-about.php') {
    echo "<h1 class='text-uppercase font-weight-bold'>view about</h1>";
  }else if ($fix == 'edit-about.php') {
    echo "<h1 class='text-uppercase font-weight-bold'>edit about</h1>";
  }else if ($fix == 'add-education.php') {
    echo "<h1 class='text-uppercase font-weight-bold'>add education</h1>";
  }else if ($fix == 'viwe-education.php') {
    echo "<h1 class='text-uppercase font-weight-bold'>view education</h1>";
  }else if ($fix == 'edit-education.php') {
    echo "<h1 class='text-uppercase font-weight-bold'>edit education</h1>";
  }else if ($fix == 'trash-education.php') {
    echo "<h1 class='text-uppercase font-weight-bold'>trash education</h1>";
  }else if ($fix == 'add-services.php') {
    echo "<h1 class='text-uppercase font-weight-bold'>add service</h1>";
  }else if ($fix == 'viwe-services.php') {
    echo "<h1 class='text-uppercase font-weight-bold'>view service</h1>";
  }else if ($fix == 'edit-services.php') {
    echo "<h1 class='text-uppercase font-weight-bold'>edit service</h1>";
  }else if ($fix == 'trash-services.php') {
    echo "<h1 class='text-uppercase font-weight-bold'>trash service</h1>";
  }else if ($fix == 'add-portfolio.php') {
    echo "<h1 class='text-uppercase font-weight-bold'>add portfolio</h1>";
  }else if ($fix == 'add-counterup.php') {
    echo "<h1 class='text-uppercase font-weight-bold'>Add counterup</h1>";
  }else if ($fix == 'viwe-counterup.php') {
    echo "<h1 class='text-uppercase font-weight-bold'>view counterup</h1>";
  }else if ($fix == 'edit-counterup.php') {
    echo "<h1 class='text-uppercase font-weight-bold'>edit counterup</h1>";
  }else if ($fix == 'trash-counterup.php') {
    echo "<h1 class='text-uppercase font-weight-bold'>trash counterup</h1>";
  }else if ($fix == 'add-testimonials.php') {
    echo "<h1 class='text-uppercase font-weight-bold'>Add Testimonials</h1>";
  }else if ($fix == 'viwe-testimonials.php') {
    echo "<h1 class='text-uppercase font-weight-bold'>View Testimonials</h1>";
  }else if ($fix == 'edit-testimonials.php') {
    echo "<h1 class='text-uppercase font-weight-bold'>edit Testimonials</h1>";
  }else if ($fix == 'trash-testimonials.php') {
    echo "<h1 class='text-uppercase font-weight-bold'>trash Testimonials</h1>";
  }else if ($fix == 'mail.php') {
    echo "<h1 class='text-uppercase font-weight-bold'>Mail</h1>";
  }else if ($fix == 'single-message-view.php') {
    echo "<h1 class='text-uppercase font-weight-bold'>message</h1>";
  }else if ($fix == 'view-portfolio.php') {
    echo "<h1 class='text-uppercase font-weight-bold'>View Portfolio</h1>";
  }



  else{
    echo "";
  }
?>

            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">
<?php
/*  if ($fix == 'dashboard.php') {
    echo "<span class='text-capitalize'>dashboard</span>";
  }else if ($fix == 'profile-view.php') {
    echo "<span class='text-capitalize'>profile</span>";
  }else if ($fix == 'add-intro.php') {
    echo "<span class='text-capitalize'>add intro</span>";
  }else if ($fix == 'view-intro.php') {
    echo "<span class='text-capitalize'>view intro</span>";
  }else if ($fix == 'edit-intro.php') {
    echo "<span class='text-capitalize'>edit intro</span>";
  }else if ($fix == 'add-about.php') {
    echo "<span class='text-capitalize'>add about</span>";
  }else if ($fix == 'viwe-about.php') {
    echo "<span class='text-capitalize'>view about</span>";
  }else if ($fix == 'edit-about.php') {
    echo "<span class='text-capitalize'>edit about</span>";
  }else if ($fix == 'add-education.php') {
    echo "<span class='text-capitalize'>add education</span>";
  }else if ($fix == 'viwe-education.php') {
    echo "<span class='text-capitalize'>view education</span>";
  }else if ($fix == 'edit-education.php') {
    echo "<span class='text-capitalize'>edit education</span>";
  }else if ($fix == 'trash-education.php') {
    echo "<span class='text-capitalize'>trash education</span>";
  }else if ($fix == 'add-services.php') {
    echo "<span class='text-capitalize'>add service</span>";
  }else if ($fix == 'viwe-services.php') {
    echo "<span class='text-capitalize'>view service</span>";
  }else if ($fix == 'edit-services.php') {
    echo "<span class='text-capitalize'>edit service</span>";
  }else if ($fix == 'trash-services.php') {
    echo "<span class='text-capitalize'>trash service</span>";
  }

poer kora hobe

  else{
    echo "";
  }*/
?>
              </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
