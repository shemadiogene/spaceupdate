<?php
  include 'inc/connect.php';
  $ids = explode("!",$_GET['comidentification']);
  $id = $ids[1];
  $quer = mysqli_query($conn,"SELECT *FROM companies WHERE id='$id'") or die(mysqli_error($conn));
  $feCo = mysqli_fetch_array($quer);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include("inc/header.php");?>
</head>

<body>

  <!-- ======= Property Search Section ======= -->
  <div class="click-closed"></div>
  <!--/ Form Search Star /-->
  <?php include 'inc/searchForm.php';?>
  <!-- End Property Search Section -->>

  <!-- ======= Header/Navbar ======= -->
    <?php include("inc/nav.php");?>
  <!-- End Header/Navbar -->

  <main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single"><?= $feCo['comName'];?></h1>
              <span class="color-text-a"><?= $feCo['comName'];?></span>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="#">Home</a>
                </li>
                <li class="breadcrumb-item">
                  <a href="companies">Companies</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single -->

    <!-- ======= Agent Single ======= -->
    <section class="agent-single">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="row">
              <div class="col-md-6">
                <div class="agent-avatar-box">
                  <img src="admin/media/companies/<?= $feCo['thumbnail'] ?>" style="height:400px;" alt="" class="agent-avatar img-fluid">
                </div>
              </div>
              <div class="col-md-5 section-md-t3">
                <div class="agent-info-box">
                  <div class="agent-title">
                    <div class="title-box-d">
                      <h3 class="title-d"><?= $feCo['comName'];?>
                        <br> </h3>
                    </div>
                  </div>
                  <div class="agent-content mb-3">
                    <p class="content-d color-text-a">
                     For mor information you can reach us on below infors
                    </p>
                    <div class="info-agents color-a">
                      <p>
                        <strong>Phone: </strong>
                        <span class="color-text-a"> <?= $feCo['comPhone'];?> </span>
                      </p>
                      <p>
                        <strong>Email: </strong>
                        <span class="color-text-a"> <?= $feCo['comEmail'];?></span>
                      </p>
                      <p>
                        <strong>skype: </strong>
                        <span class="color-text-a"> <a href="">skype</a></span>
                      </p>
                    </div>
                  </div>
                  <div class="socials-footer">
                    <ul class="list-inline">
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="fa fa-instagram" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                        </a>
                      </li>
                      <li class="list-inline-item">
                        <a href="#" class="link-one">
                          <i class="fa fa-dribbble" aria-hidden="true"></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php
            $query = mysqli_query($conn,"SELECT *FROM offices WHERE companyId='$id'") or die(mysqli_error($conn));
            $size = mysqli_num_rows($query);
          ?>
          <div class="col-md-12 section-t8">
            <div class="title-box-d">
              <h3 class="title-d">Our Spaces (<?= $size;?> m<sup>2</sup>)</h3>
            </div>
          </div>
          <div class="row property-grid grid">
            <div class="col-sm-12">
              <div class="grid-option">
                <form>
                  <select class="custom-select">
                    <option selected>All</option>
                    <option value="1">New to Old</option>
                    <option value="2">For Rent</option>
                    <option value="3">For Sale</option>
                  </select>
                </form>
              </div>
            </div>
            <?php
              if (mysqli_num_rows($query)>0) {
                while ($fes = mysqli_fetch_array($query)) {
                  ?>
                    <div class="col-md-4">
                      <div class="card-box-a card-shadow">
                        <div class="img-box-a">
                          <img src="admin/media/spaceImages/<?= $fes['thumnail']?>" style="height:400px;"width="600px" alt="" class="img-a img-fluid">
                        </div>
                        <div class="card-overlay">
                          <div class="card-overlay-a-content">
                            <div class="card-header-a">
                              <h2 class="card-title-a">
                                <a href="property-single?identification=<?= rand().uniqid()."!".$fes['id']."!".rand().uniqid().rand();?>"> <?= $fes['name']?>
                                  <br /> </a>
                                  <a href="customers?ident=<?= rand().uniqid().rand()."!".$fes['id']."!".rand().uniqid().rand();?>" id="customers" class="btn btn-sm btn-outline-warning">Book</a>
                              </h2>
                            </div>
                            <div class="card-body-a">
                              <div class="price-box d-flex">
                                <span class="price-a"><?= $fes['status']?> | $ <?= $fes['price']?></span>
                              </div>
                              <a href="property-single?identification=<?= rand().uniqid()."!".$fes['id']."!".rand().uniqid().rand();?>" class="link-a">Click here to view
                                <span class="ion-ios-arrow-forward"></span>
                              </a>
                            </div>
                            <div class="card-footer-a">
                              <ul class="card-info d-flex justify-content-around">
                                <li>
                                  <h4 class="card-info-title">Area</h4>
                                  <span><?= $fes['area']?>m
                                    <sup>2</sup>
                                  </span>
                                </li>
                                <li>
                                  <h4 class="card-info-title">Contact</h4>
                                  <span><?= $fes['contact'];?></span>
                                </li>
                                <li>
                                  <h4 class="card-info-title">Price</h4>
                                  <span><?= $fes['price'];?></span>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php
                }
              }else{
                ?>
                  <h3 class='alert alert-danger'>No space uploaded by this company yet</h3>
                <?php
              }
            ?>
            
            
          </div>
        </div>
      </div>
    </section><!-- End Agent Single -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
      <?php
        include 'inc/footer.php';
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
      $("#navCompanies").addClass('active');
    });
  </script>
</body>

</html>