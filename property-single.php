<!DOCTYPE html>
<html lang="en">
<?php
  include 'inc/connect.php';
  $all = explode("!",$_GET['identification']);
  $id = $all[1];

  $finds = mysqli_query($conn,"SELECT *FROM offices,companies WHERE offices.id='$id'") or die(mysqli_error($conn));
  $fePro = mysqli_fetch_array($finds);
?>
<head>
  <?php include("inc/header.php");?>
</head>

<body>

  <!-- ======= Property Search Section ======= -->
  <div class="click-closed"></div>
  <!--/ Form Search Star /-->
  <?php include 'inc/searchForm.php';?>
  <!-- End Property Search Section -->

  <!-- ======= Header/Navbar ======= -->
    <?php 
      include("inc/nav.php");
    ?>
  <!-- End Header/Navbar -->

  <main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single"> <?= $fePro['name'];?></h1>
              <span class="color-text-a"><?= $fePro['location'];?></span>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item">
                  <a href="spaces">Space</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                   <?= $fePro['name'];?>
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->
    <!-- ======= Property Single ======= -->
    <section class="property-single nav-arrow-b">
      <div class="container">
        <div class="row">
        <div class="col-sm-12">
          <a href="customers?ident=<?= rand().uniqid().rand()."!".$id."!".rand().uniqid().rand();?>" id="customers" class="btn btn-flat btn-outline-warning">Book</a>
          </div>&nbsp
          <div class="col-sm-12">
            <div id="property-single-carousel" class="owl-carousel owl-arrow gallery-property">
              <div class="carousel-item-b">
              <img style="height:500px;" src="admin/media/spaceImages/<?= $fePro['thumnail'];?>" alt="">
              </div>
              <div class="carousel-item-b">
                <img style="height:500px;" src="admin/media/spaceImages/<?= $fePro['photo1'];?>" alt="">
              </div>
              <div class="carousel-item-b">
                <img style="height:500px;" src="admin/media/spaceImages/<?= $fePro['photo2'];?>" alt="">
              </div>
              <div class="carousel-item-b">
                <img style="height:500px;" src="admin/media/spaceImages/<?= $fePro['photo3'];?>" alt="">
              </div>
            </div>
            
            <div class="row justify-content-between">
              <div class="col-md-5 col-lg-4">
                <div class="property-price d-flex justify-content-center foo">
                  <div class="card-header-c d-flex">
                    <div class="card-box-ico">
                      <span class="ion-money">Rwf</span>
                  
                    <div class="card-title-c align-self-center">
                      <h6 class="title-c"><?= $fePro['price'];?> </h6>
                    </div>
                    </div>
                  </div>
                </div>
                <div class="property-summary">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="title-box-d section-t4">
                        <h3 class="title-d">Quick Summary</h3>
                      </div>
                    </div>
                  </div>
                  <div class="summary-list">
                    <ul class="list">
                      <li class="d-flex justify-content-between">
                        <strong>Space ID:</strong>
                        <span><?= $fePro['id'];?></span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Location:</strong>
                        <span><?= $fePro['location'];?></span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Status:</strong>
                        <span><?= $fePro['status'];?></span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Area:</strong>
                        <span><?= $fePro['area'];?>m
                          <sup>2</sup>
                        </span>
                      </li>
                      <!-- <li class="d-flex justify-content-between">
                        <strong>Beds:</strong>
                        <span>4</span>
                      </li> -->
                      <li class="d-flex justify-content-between">
                        <strong>Room:</strong>
                        <span><?= $fePro['rooms'];?></span>
                      </li>
                      <li class="d-flex justify-content-between">
                        <strong>Contact:</strong>
                        <span><?= $fePro['contact'];?></span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              
              <div class="col-md-7 col-lg-7 section-md-t3">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="title-box-d">
                      <h3 class="title-d">Spaces Description</h3>
                    </div>
                  </div>
                </div>
                <div class="property-description">
                  <p class="description color-text-a">
                    <?= $fePro['descriptions'];?>
                  </p>
                  <p class="description color-text-a no-margin">
                    
                  </p>
                </div>
                
              </div>
            </div>
          </div>
          <!-- <div class="col-md-10 offset-md-1">
            <ul class="nav nav-pills-a nav-pills mb-3 section-t3" id="pills-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="pills-video-tab" data-toggle="pill" href="#pills-video" role="tab" aria-controls="pills-video" aria-selected="true">Video</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-plans-tab" data-toggle="pill" href="#pills-plans" role="tab" aria-controls="pills-plans" aria-selected="false">Floor Plans</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-map-tab" data-toggle="pill" href="#pills-map" role="tab" aria-controls="pills-map" aria-selected="false">Ubication</a>
              </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-video" role="tabpanel" aria-labelledby="pills-video-tab">
                <iframe src="https://player.vimeo.com/video/73221098" width="100%" height="460" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
              </div>
              <div class="tab-pane fade" id="pills-plans" role="tabpanel" aria-labelledby="pills-plans-tab">
                <img src="assets/img/plan2.jpg" alt="" class="img-fluid">
              </div>
              <div class="tab-pane fade" id="pills-map" role="tabpanel" aria-labelledby="pills-map-tab">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834" width="100%" height="460" frameborder="0" style="border:0" allowfullscreen></iframe>
              </div>
            </div>
          </div> -->
          <div class="col-md-12">
            <div class="row section-t3">
              <div class="col-sm-12">
                <div class="title-box-d">
                  <h3 class="title-d">Contact Company</h3>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-lg-4">
              <img style="height:350px;" width="350px;" src="admin/media/spaceImages/<?= $fePro['thumnail'];?>" alt="">              </div>
              <div class="col-md-6 col-lg-4">
                <div class="property-agent">
                  <h4 class="title-agent"><?= $fePro['name'];?></h4>
                  <p class="color-text-a">
                  <?= $fePro['descriptions'];?>
                  </p>
                  <ul class="list-unstyled">
                    <li class="d-flex justify-content-between">
                      <strong>Location</strong>
                      <span class="color-text-a"><?= $fePro['location'];?></span>
                    </li>
                    <li class="d-flex justify-content-between">
                      <strong>Mobile:</strong>
                      <span class="color-text-a"><?= $fePro['contact'];?></span>
                    </li>
                    <!-- <li class="d-flex justify-content-between">
                      <strong>Email:</strong>
                      <span class="color-text-a"><?= $fePro ['comEmail'];?></span>
                    </li> -->
                    <!-- <li class="d-flex justify-content-between">
                      <strong>Skype:</strong>
                      <span class="color-text-a">skype</span>
                    </li> -->
                  </ul>
                  <div class="socials-a">
                    <ul class="list-inline">
                      <li class="list-inline-item">
                        <a href="#">
                          <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#">
                          <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#">
                          <i class="fa fa-instagram" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#">
                          <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#">
                          <i class="fa fa-dribbble" aria-hidden="true"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-12 col-lg-4">
                <div class="property-contact">
                  <form class="form-a" method="POST">
                    <div class="row">
                    <div class="col-md-12 mb-1">
                      <?php
                        include 'inc/contactCompany.php';
                        if (isset($_POST['sendMessages'])) {
                          echo $msg;
                        }
                      ?>
                    </div>
                      <div class="col-md-12 mb-1">
                        <div class="form-group">
                          <input type="text" name="cusNames" class="form-control form-control-lg form-control-a" id="inputName" placeholder="Name *" required>
                        </div>
                      </div>
                      <div class="col-md-12 mb-1">
                        <div class="form-group">
                          <input type="email" name="cusEmail" class="form-control form-control-lg form-control-a" id="inputEmail1" placeholder="Email *" required>
                        </div>
                      </div>
                      <div class="col-md-12 mb-1">
                        <div class="form-group">
                          <textarea id="textMessage" name="cusComments" class="form-control" placeholder="Comment *" name="message" cols="45" rows="8" required></textarea>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <button type="submit" name="sendMessages" class="btn btn-a">Send Message</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Property Single-->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
      <?php
        include 'inc/footer.php'
      ?>
  <!-- End  Footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/scrollreveal/scrollreveal.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  
  <script type="text/javascript">
    $(function(){
      $("#navRent").addClass('active');
    });
  </script>

</body>

</html>