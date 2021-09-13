<?php require_once 'db.php'; session_start(); ?>
<!doctype html>
<html class="no-js" lang="en">

<!-- Mirrored from themebeyond.com/html/kufa/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Feb 2020 06:27:43 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Personal Portfolio - FMA-Developer</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
        <!-- Place favicon.ico in the root directory -->

		<!-- CSS here -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/animate.min.css">
        <link rel="stylesheet" href="assets/css/magnific-popup.css">
        <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
        <link rel="stylesheet" href="assets/css/flaticon.css">
        <link rel="stylesheet" href="assets/css/slick.css">
        <link rel="stylesheet" href="assets/css/aos.css">
        <link rel="stylesheet" href="assets/css/default.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/responsive.css">
    </head>
    <body class="theme-bg">

        <!-- preloader -->
        <div id="preloader">
            <div id="loading-center">
                <div id="loading-center-absolute">
                    <div class="object" id="object_one"></div>
                    <div class="object" id="object_two"></div>
                    <div class="object" id="object_three"></div>
                </div>
            </div>
        </div>
        <!-- preloader-end -->

        <!-- header-start -->
        <header>
           <?php require_once 'inc/header.php'; ?>
            
<?php
  $sSelect = "SELECT * FROM social WHERE status = 1";
  $qSocial = mysqli_query($conn, $sSelect);
 ?>
                <div class="social-icon-right mt-20">
                    <?php foreach ($qSocial as $key => $s): ?>
                        <a target="blank" href="<?= $s['link'] ?>"><i class="<?= $s['icon'] ?>"></i></a>
                    <?php endforeach ?>
                    
                    
                </div>
            </div>
            <div class="offcanvas-overly"></div>
            <!-- offcanvas-end -->
        </header>
        <!-- header-end -->

        <!-- main-area -->
        <main>
<?php 
  $select = "SELECT * FROM hero";
  $query = mysqli_query($conn, $select);
  $assoc = mysqli_fetch_assoc($query);

?>
            <!-- banner-area -->
            <section id="home" class="banner-area banner-bg fix">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-7 col-lg-6">
                            <div class="banner-content">
                                <h6 class="wow fadeInUp text-uppercase" data-wow-delay="0.2s">
                                    <?php if (isset($assoc['intro'])) {
                                        echo $assoc['intro'];
                                      } ?>
                                </h6>
                                <h2 class="wow fadeInUp text-uppercase" data-wow-delay="0.4s">
                                    <?php if (isset($assoc['name'])) {
                                        echo $assoc['name'];
                                      } ?>
                                </h2>
                                <p class="wow fadeInUp text-capitalize" data-wow-delay="0.6s">
                                    <?php if (isset($assoc['sort_description'])) {
                                        echo $assoc['sort_description'];
                                      } ?>
                                </p>
                                <div class="banner-social wow fadeInUp" data-wow-delay="0.8s">
<?php
  $socialSelect = "SELECT * FROM social WHERE status = 1";
  $querySocial = mysqli_query($conn, $socialSelect);
 ?>
                                <ul>
                                    <?php foreach ($querySocial as $key => $social): ?>
                                        <li>
                                            <a target="blank" href="<?php echo $social['link'] ?>">
                                                <i class="<?php echo $social['icon'] ?>"></i>
                                            </a>
                                        </li>
                                    <?php endforeach ?>
                                </ul>
                                </div>
                                <a href="#" class="btn wow fadeInUp" data-wow-delay="1s">SEE PORTFOLIOS</a>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-6 d-none d-lg-block">
                            <div class="banner-assets/ text-right">
                                <img style="width: 530px;"  src="admin/intro/<?= $assoc['image'] ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="banner-shape"><img src="assets/img/shape/dot_circle.png" class="rotateme" alt="img"></div>
            </section>
            <!-- banner-area-end -->

<?php 
  $selectabout = "SELECT * FROM about";
  $queryabout = mysqli_query($conn, $selectabout);
  $assocabout = mysqli_fetch_assoc($queryabout);
?>
            <!-- about-area-->
            <section id="about" class="about-area primary-bg pt-120 pb-120">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="about-assets/">
                                <img src="assets/img/banner/banner_img2.png" title="me-01" alt="me-01">
                            </div>
                        </div>
                        <div class="col-lg-6 pr-90">
                            <div class="section-title mb-25">
                                <span>Introduction</span>
                                <h2><?php 
                                if (isset($assocabout['heading'])) {
                                    echo $assocabout['heading'];
                                }
                                 ?></h2>
                            </div>
                            <div class="about-content">
                                <p>
                                    <?php 
                                        if (isset($assocabout['description'])) {
                                            echo $assocabout['description'];
                                        }
                                     ?>
                                </p>
                                <h3>Education:</h3>
                            </div>
<?php 
  $selecteducation = "SELECT * FROM education WHERE status = 1";
  $queryeducation = mysqli_query($conn, $selecteducation);
                               foreach ($queryeducation as $key => $education):
?>
                                <!-- Education Item -->
                                <div class="education">
                                    <div class="year">
                                        <?php
                                        if (isset($education['year'])) {
                                            echo $education['year'];
                                        }
                                        ?>
                                    </div>
                                    <div class="line"></div>
                                    <div class="location">
                                        <span><?php
                                        if (isset($education['title'])) {
                                            echo $education['title'];
                                        }
                                        ?></span>
                                        <div class="progressWrapper">
                                            <div class="progress">
                                                <div class="progress-bar wow slideInLefts" data-wow-delay="0.2s" data-wow-duration="2s" role="progressbar" style="width:<?php
                                                        if (isset($education['progress'])) {
                                                            echo $education['progress'].'%';
                                                        }
                                        ?>;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Education Item -->
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </section>
            <!-- about-area-end -->
<?php 
    $selectservices = "SELECT * FROM services WHERE status = 1";
    $queryservices = mysqli_query($conn, $selectservices);
 ?>
            <!-- Services-area -->
            <section id="service" class="services-area pt-120 pb-50">
				<div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span>WHAT WE DO</span>
                                <h2>Services and Solutions</h2>
                            </div>
                        </div>
                    </div>
					<div class="row">
                        <?php foreach ($queryservices as $key => $services): ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="icon_box_01 wow fadeInLeft" data-wow-delay="0.2s">
                                <i class="<?= $services['icon'] ?>"></i>
                                <h3><?= $services['title'] ?></h3>
                                <p><?= $services['description'] ?></p>
                            </div>
                        </div>
                        <?php endforeach ?>
						
					</div>
				</div>
			</section>
            <!-- Services-area-end -->
<?php 
    $selectPortfolio = "SELECT portfolios.title, portfolios.thumbnails, portfolios.sluge, category.c_name as cname FROM portfolios INNER JOIN category ON portfolios.category_id = category.id";
    $queryPortfolio = mysqli_query($conn, $selectPortfolio);
 ?>
            <!-- Portfolios-area -->
            <section id="portfolio" class="portfolio-area primary-bg pt-120 pb-90">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span>Portfolio Showcase</span>
                                <h2>My Recent Best Works</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php foreach ($queryPortfolio as $key => $portfolio): ?>
                        <div class="col-lg-4 col-md-6 pitem">
                            <div class="speaker-box">
								<div class="speaker-thumb">
									<img src="admin/thumbnails/<?= $portfolio['thumbnails'] ?>" alt="<?= $portfolio['title'] ?>">
								</div>
								<div class="speaker-overlay">
									<span><?= $portfolio['cname'] ?></span>
									<h4>
<a href="portfolio-datels.php?sluge=<?= $portfolio['sluge'] ?>"><?= $portfolio['title'] ?></a>
                                    </h4>
									<a href="" class="arrow-btn">More information <span></span></a>
								</div>
							</div>
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </section>
            <!-- services-area-end -->

<?php 
    $selectcounter = "SELECT * FROM counterup WHERE status = 1";
    $querycounter = mysqli_query($conn, $selectcounter);
 ?>
            <!-- fact-area -->
            <section class="fact-area">
                <div class="container">
                    <div class="fact-wrap">
                        <div class="row justify-content-between">
    <?php foreach ($querycounter as $key => $counter): ?>
                            <div class="col-xl-2 col-lg-3 col-sm-6">
                                <div class="fact-box text-center mb-50">
                                    <div class="fact-icon">
                                    <i class="<?= $counter['icon'] ?>"></i>
                                    </div>
                                    <div class="fact-content">
                                        <h2><span class="count"><?= $counter['counter'] ?></span></h2>
                                        <span><?= $counter['title'] ?></span>
                                    </div>
                                </div>
                            </div>
    <?php endforeach ?>
                            
                        </div>
                    </div>
                </div>
            </section>
            <!-- fact-area-end -->
<?php 
    $selecttestimonials = "SELECT * FROM Testimonials WHERE status = 1";
    $querytestimonials = mysqli_query($conn, $selecttestimonials);
 ?>
            <!-- testimonial-area -->
            <section class="testimonial-area primary-bg pt-115 pb-115">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span>testimonial</span>
                                <h2>happy customer quotes</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-xl-9 col-lg-10">
                            <div class="testimonial-active">
                            <?php foreach ($querytestimonials as $key => $testimonials): ?>
                                <div class="single-testimonial text-center">
                                    <div class="testi-avatar">
                                        <img style="width:120px;height:120px;border-radius: 50%;border: 2px solid #aaa;" src="admin/testimonial/<?= $testimonials['image'] ?>" alt="img">
                                    </div>
                                    <div class="testi-content">
                                        <h4><span>“</span> <?= $testimonials['description'] ?> <span>”</span></h4>
                                        <div class="testi-avatar-info">
                                            <h5><?= $testimonials['name'] ?></h5>
                                            <span><?= $testimonials['title'] ?></span>
                                        </div>
                                    </div>
                                </div>        
                            <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- testimonial-area-end -->

            <!-- brand-area -->
            <div class="barnd-area pt-100 pb-100">
                <div class="container">
                    <div class="row brand-active">
                        <div class="col-xl-2">
                            <div class="single-brand">
                                <img src="assets/img/brand/brand_img01.png" alt="img">
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="single-brand">
                                <img src="assets/img/brand/brand_img02.png" alt="img">
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="single-brand">
                                <img src="assets/img/brand/brand_img03.png" alt="img">
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="single-brand">
                                <img src="assets/img/brand/brand_img04.png" alt="img">
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="single-brand">
                                <img src="assets/img/brand/brand_img05.png" alt="img">
                            </div>
                        </div>
                        <div class="col-xl-2">
                            <div class="single-brand">
                                <img src="assets/img/brand/brand_img03.png" alt="img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- brand-area-end -->

<!-- contact-area -->
<section id="contact" class="contact-area primary-bg pt-120 pb-120">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="section-title mb-20">
                    <span>information</span>
                    <h2>Contact Information</h2>
                </div>
                <div class="contact-content">
                    <p>Event definition is - somthing that happens occurre How evesnt sentence. Synonym when an unknown printer took a galley.</p>
                    <h5>OFFICE IN <span>NEW YORK</span></h5>
                    <div class="contact-list">
                        <ul>
                            <li><i class="fas fa-map-marker"></i><span>Address :</span>Event Center park WT 22 New York</li>
                            <li><i class="fas fa-headphones"></i><span>Phone :</span>+9 125 645 8654</li>
                            <li><i class="fas fa-globe-asia"></i><span>e-mail :</span>info@exemple.com</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="contact-form">
                    <form action="admin/message.php" method="post">
                        <input type="text" name="name" placeholder="your name *" required>
                        <input type="email" name="email" placeholder="your email *" required>
                        <textarea name="message" name="message" id="message" placeholder="your message *" required></textarea>
                        <?php
                        if (isset($_SESSION['success'])) { ?>
                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong><?= $_SESSION['success'] ?></strong>                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>

                          <?php
                          unset($_SESSION['success']);
                            }


                         if (isset($_SESSION['errors'])) { ?>
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong><?= $_SESSION['errors'] ?></strong>                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>

                          <?php
                          unset($_SESSION['errors']);
                            } ?>
                        <button type="submit" class="btn">SEND</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact-area-end -->

        </main>
        <!-- main-area-end -->

        <?php require_once 'inc/footer.php'; ?>