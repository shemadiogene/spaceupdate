<?php
  include 'inc/connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php include("inc/header.php");?>

  <!-- =======================================================
  * Template Name: EstateAgency - v2.0.0
  * Template URL: https://bootstrapmade.com/real-estate-agency-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
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
    <!-- =======Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single">Our available Companies</h1>
              <span class="color-text-a">Grid companies</span>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="index">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  Companies Grid
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->

    <!-- ======= Agents Grid ======= -->
    <section class="agents-grid grid">
      <div class="container">
        <div class="row">
          <?php

            $page = ((isset($_GET['pageId'])) && is_numeric($_GET['pageId']))? $_GET['pageId'] :1;
            $limits = 15;
            $start = (($page-1)*$limits);

            $qu = mysqli_query($conn,"SELECT *FROM companies  WHERE coStatus='Approved' ORDER BY id DESC limit $start,$limits") or die(mysqli_error($conn));
            $size=mysqli_query($conn,"SELECT *FROM companies WHERE coStatus='Approved'") or die(mysqli_error($conn));
            $size = mysqli_num_rows($size);

            if (mysqli_num_rows($qu)>0) {
              while ($fes = mysqli_fetch_array($qu)) {
                ?>
                  <div class="col-md-4">
                    <div class="card-box-d">
                      <div class="card-img-d">
                        <img src="admin/media/companies/<?= $fes['thumbnail']?>" style="height:400px;" alt="" class="img-d img-fluid">
                      </div>
                      <div class="card-overlay card-overlay-hover">
                        <div class="card-header-d">
                          <div class="card-title-d align-self-center">
                            <h3 class="title-d">
                              <a href="company-single?comidentification=<?= rand().uniqid()."!".$fes['id']."!".rand().rand().uniqid()?>" class="link-two"><?= $fes['comName']?>
                                <br> </a>
                            </h3>
                          </div>
                        </div>
                        <div class="card-body-d">
                          <p class="content-d color-text-a">
                            For more information you can reach us on below infors
                          </p>
                          <div class="info-agents color-a">
                            <p>
                              <strong>Phone: </strong> <?= $fes['comPhone']?></p>
                            <p>
                              <strong>Email: </strong> <?= $fes['comEmail']?></p>
                          </div>
                        </div>
                        <div class="card-footer-d">
                          <div class="socials-footer d-flex justify-content-center">
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
              }
            }
          ?>
          
        </div>
        <div class="row">
          <div class="col-sm-12">
            <nav class="pagination-a">
              <ul class="pagination justify-content-end">
              <?php
                if ($page > 1) {
                  ?>
                    <li class="page-item">
                      <a class="page-link" href="?pageId=<?= $page-1;?>" tabindex="-1">
                        <span class="ion-ios-arrow-back"></span>
                      </a>
                    </li>
                  <?php
                }else{
                  ?>
                    <li class="page-item disabled">
                      <a class="page-link" href="#" tabindex="-1">
                        <span class="ion-ios-arrow-back"></span>
                      </a>
                    </li>
                  <?php
                }
                  for ($i=0; $i < ceil($size/$limits); $i++) { 
                    ?>
                      <li class="page-item">
                        <a class="page-link" href="?pageId=<?= ($i+1);?>"><?= ($i+1)?></a>
                      </li>
                    <?php
                  }
                if ($page <ceil($size/$limits)) {
                  ?>
                    <li class="page-item next">
                      <a class="page-link" href="?pageId=<?= ($page+1)?>">
                        <span class="ion-ios-arrow-forward"></span>
                      </a>
                    </li>
                  <?php
                }else{
                  ?>
                    <li class="page-item next disabled">
                      <a class="page-link" href="#">
                        <span class="ion-ios-arrow-forward"></span>
                      </a>
                    </li>
                  <?php
                }
              ?>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Agents Grid-->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include("inc/footer.php");?>
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

      $("#searchInput").keyup(function(){
        var items = $(this).val();
        //alert(items);
        $("#results").html('');
        if(items != ''){

          $.ajax({
            url:"searches.php",
            method:"POST",
            data:{search:items},
            dataType:"text",
            success:function(response){
              $("#results").html(response);
            }
          });

        }else{
          $("#results").html('');
        }
        
      });
    });
  </script>
</body>

</html>