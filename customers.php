<?php
include 'inc/connect.php';
$ids = explode("!", $_GET['ident']);
$offId = $ids[1];

$findById = mysqli_query($conn, "SELECT *FROM offices WHERE id = '$offId'") or die(mysqli_error($conn));
if (mysqli_num_rows($findById) < 0) {
?>
  <script>
    window.location = "index";
  </script>
<?php
}
$fe = mysqli_fetch_array($findById);
$comId = $fe['companyId'];
?>

<?php
$isSale = false;
$checkSale = mysqli_query($conn,"SELECT *FROM offices WHERE status = 'Sales' AND id = '$offId'");
if (mysqli_num_rows($checkSale)>0) {
  $isSale=true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include("inc/header.php"); ?>

</head>

<body>

  <!-- ======= Property Search Section ======= -->
  <div class="click-closed"></div>
  <!--/ Form Search Star /-->
  <?php include 'inc/searchForm.php'; ?>
  <!-- End Property Search Section -->>

  <!-- ======= Header/Navbar ======= -->
  <?php include("inc/nav.php"); ?>
  <!-- End Header/Navbar -->

  <main id="main">

    <!-- ======= Intro Single ======= -->
    <!-- <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single">Contact US</h1>
              <span class="color-text-a">Aut natus officia corrupti qui autem fugit consectetur quo. Et ipsum eveniet laboriosam voluptas beatae possimus qui ducimus. Et voluptatem deleniti. Voluptatum voluptatibus amet. Et esse sed omnis inventore hic culpa.</span>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="index">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  Contact
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section> -->
    <!-- End Intro Single-->

    <!-- ======= Contact Single ======= -->
    <section class="contact">
      <div class="container">
        <div class="row">
          <!-- <div class="col-sm-12">
            <div class="contact-map box">
              <div id="map" class="contact-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
              </div>
            </div>
          </div> -->
          <div class="col-sm-12 section-t8">
            <div class="row">

              <div class="col-md-5 section-md-t3">
                <img src="admin/media/spaceImages/<?= $fe['thumnail']; ?>" alt="" class="img img-fluid">
                <!-- <div class="icon-box section-b2">
                <div class="icon-box-icon">
                    <span class="ion-ios-paper-plane"></span>
                </div>
                <div class="icon-box-content table-cell">
                    <div class="icon-box-title">
                    <h4 class="icon-title">Say Hello</h4>
                    </div>
                    <div class="icon-box-content">
                    <p class="mb-1">Email.
                        <span class="color-a">contact@example.com</span>
                    </p>
                    <p class="mb-1">Phone.
                        <span class="color-a">+54 356 945234</span>
                    </p>
                    </div>
                </div>
                </div>
                <div class="icon-box section-b2">
                <div class="icon-box-icon">
                    <span class="ion-ios-pin"></span>
                </div>
                <div class="icon-box-content table-cell">
                    <div class="icon-box-title">
                    <h4 class="icon-title">Find us in</h4>
                    </div>
                    <div class="icon-box-content">
                    <p class="mb-1">
                        Manhattan, Nueva York 10036,
                        <br> EE. UU.
                    </p>
                    </div>
                </div>
                </div>
                <div class="icon-box">
                <div class="icon-box-icon">
                    <span class="ion-ios-redo"></span>
                </div>
                <div class="icon-box-content table-cell">
                    <div class="icon-box-title">
                    <h4 class="icon-title">Social networks</h4>
                    </div>
                    <div class="icon-box-content">
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
                </div> -->
              </div>
              <div class="col-md-7">
                <form method="POST" role="form">
                  <div class="row">
                    <div class="col-12">

                      <?php
                      include 'forms/reserve.php';
                      if (isset($_POST['sendMessage'])) {
                        echo $msg;
                      }
                      ?>
                    </div>
                    <div class="col-md-6 mb-3">
                      <div class="form-group">
                        <input type="text" name="cusNames" required class="form-control form-control-lg form-control-a" placeholder="Full Names" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                        <div class="validate"></div>
                      </div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <div class="form-group">
                        <input name="cusPhone" type="number" required class="form-control form-control-lg form-control-a" placeholder="Phone" data-rule="email" data-msg="Please enter a valid email">
                        <div class="validate"></div>
                      </div>
                    </div>


                    <div class="col-md-6 mb-3">
                      <div class="form-group">
                        <input type="email" name="cusEmail" required class="form-control form-control-lg form-control-a" placeholder="Email" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                        <div class="validate"></div>
                      </div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <div class="form-group">
                        <input name="cusLocation" type="text" required class="form-control form-control-lg form-control-a" placeholder="Location" data-rule="email" data-msg="Please enter a valid email">
                        <div class="validate"></div>
                      </div>
                    </div>

                    <?php
                    if ($isSale) {
                      ?>
                      
                      <div class="col-md-6 mb-3">
                        <div class="form-group">
                          <label for="check in" class="form-control-label"> Date</label>
                          <input type="date" name="cusCheckin" class="form-control form-control-lg form-control-a" placeholder="Check in" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                          <div class="validate"></div>
                        </div>
                      </div>

                      <?php
                    }else{
                      ?>
                      <div class="col-md-6 mb-3">
                        <div class="form-group">
                          <label for="check in" class="form-control-label">Check in</label>
                          <input type="date" name="cusCheckin" class="form-control form-control-lg form-control-a" placeholder="Check in" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                          <div class="validate"></div>
                        </div>
                      </div>
                    <div class="col-md-6 mb-3">
                      <div class="form-group">
                        <label for="check in" class="form-control-label">Check out</label>
                        <input name="cusCheckout" type="date" class="form-control form-control-lg form-control-a" placeholder="Check out" data-rule="email" data-msg="Please enter a valid email">
                        <div class="validate"></div>
                      </div>
                    </div>

                      <?php
                    }
                    ?>
                    
                    <!-- <div class="col-md-12 mb-3">
                      <div class="mb-3">
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your message has been sent. Thank you!</div>
                      </div>
                    </div> -->

                    <div class="col-md-12 text-center">
                      <button type="submit" class="btn btn-sm btn-flat btn-warning">Cancel</button>
                      <button type="submit" name="sendMessage" class="btn btn-sm btn-flat btn-info">Book now</button>

                    </div>
                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Contact Single-->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php
  include 'inc/footer.php';
  ?>
  <!-- End  Footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></scrip>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/scrollreveal/scrollreveal.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script type="text/javascript">
    $(function() {
      //$("#navContact").addClass('active');
    });
  </script>
</body>

</html>