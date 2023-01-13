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
                <div class="col-md-7">
                    
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-4 section-md-t3">
                <?php 
                  include("inc/loginFile.php");
                ?>
                    <form method="POST" role="form" name="forms" class="forms">
                        <div class="row">

                            <div class="col-md-12 mb-3">
                                <?php
                                  if (isset($_POST['login'])) {
                                    echo $msg;
                                  }
                                ?>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <input type="text" required id="uname" name="uname" class="form-control form-control-lg form-control" placeholder="Username" data-rule="minlen:3" data-msg="Please enter at least 3 characters username">
                                    <div class="validateUser"></div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <input type="password" required id="pass" name="pass" class="form-control form-control-lg form-control" placeholder="Password" data-rule="minlen:6" data-msg="Please enter at least 6 characters of Password">
                                    <div class="validate"></div>
                                </div>
                            </div>
                            <div class="col-md-12 text-right">
                                <button name="login" id="submits" type="submit" class="btn btn-sm btn-primary">Login</button>
                            </div>
                            <div class="col-md-12 text-center">
                                Need new Account? <a href="newCompany">Sign up</a>
                            </div>
                        </div>
                    </form>
                </div>
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