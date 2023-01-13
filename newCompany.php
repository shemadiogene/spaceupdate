<?php 
  session_start();
  include 'inc/connect.php';
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
  <!-- End Property Search Section -->

  <!-- ======= Header/Navbar ======= -->
  <?php 
    include("inc/nav.php");
    include("forms/signup.php");
    
  ?>
  <!-- End Header/Navbar -->

  <main id="main">

    <!-- ======= Intro Single ======= -->
    
    <!-- End Intro Single-->

    <!-- ======= Contact Single ======= -->
    <br><br><br><br><br><br><br><br>
    <section class="contact">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 section-8">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <form method="POST" role="form" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div style="text-align:center;">
                                    <?php
                                        if (isset($_POST['save'])) {
                                            echo $msg;
                                        }
                                    ?>
                                </div>
                                
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <input type="text" required name="coName" class="form-control form-control-lg form-control" placeholder="Company Name" data-rule="minlen:3" data-msg="Please enter at least 3 chars">
                                    <div class="validate"></div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <input name="coEmail" required type="email" class="form-control form-control-lg form-control" placeholder="Company Email" data-rule="email" data-msg="Please enter a valid email">
                                    <div class="validate"></div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <input type="text" required name="coLocation" class="form-control form-control-lg form-control" placeholder="Company location" data-rule="minlen:4" data-msg="At least 4 characters of location">
                                    <div class="validate"></div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <input name="phoneNumber" required type="number" class="form-control form-control-lg form-control" placeholder="Phone Number" data-rule="minlen:10" data-msg="Please enter valid phone">
                                    <div class="validate"></div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <input type="text" required name="cousername" class="form-control form-control-lg form-control" placeholder="Username" data-rule="minlen:3" data-msg="Please enter at least 3 chars">
                                    <div class="validate"></div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <input name="copassword" required type="password" class="form-control form-control-lg form-control" placeholder="Password" data-rule="minlen:6" data-msg="Please enter a valid Password">
                                    <div class="validate"></div>
                                </div>
                            </div>
                            
                            
                            <div class="col-md-6 mb-3">
                              <div class="form-group">
                                  <input type="text" name="coTin" required class="form-control form-control-lg form-control" placeholder="Company's TIN" data-rule="minlen:3" data-msg="Please enter at least 3 characters of TIN">
                                  <div class="validate"></div>
                              </div>
                            </div>

                            
                            <div class="col-md-6 mb-3">
                              <div class="form-group">
                                  <input type="file" name="thumbnails" class="form-control form-control-lg form-control" placeholder="Company's TIN" data-rule="minlen:3" data-msg="Please enter at least 3 characters of TIN">
                                  <div class="validate"></div>
                              </div>
                            </div>

                            <div class="col-md-12 text-right">
                            <input type="submit" name="save" class="btn btn-primary" value="Register">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-3 section-md-t3"></div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Contact Single-->

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
      $("#navLogin").addClass('active');
    });
  </script>
</body>

</html>