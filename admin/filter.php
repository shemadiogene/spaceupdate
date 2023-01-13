<?php
require_once("includes/db.php");
?>
<!DOCTYPE html>
<html lang="en">
<!-- basic-table.html  21 Nov 2019 03:55:20 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Admin | spaceBooking</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
    <link rel="stylesheet" href="assets/bundles/datatables/datatables.min.css">
  <link rel="stylesheet" href="assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
    <script src="assets/bundles/sweetalert/sweetalert.min.js"></script>
</head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <?php 
    
      // include_once 'includes/insert_car_rent.php';

      include 'includes/header.php';
      include 'includes/left_nav.php';
        ?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12">
              <div class="card">
                <div class="card-header">
                  <div class="col-sm-12 col-md-12 col-lg-12">
                  <form action="" method="post">
                    <div class="row col-md-12">
                        For Rent
                        <div class="col-md-3">
                            <input type="date" class="form-control" id="day1">
                        </div>
                        <div class="col-md-3">
                            <input type="date" class="form-control" id="day2">
                        </div>
                        <div class="col-md-3">
                            <button type="button" id="between" onclick="periodic()" class="btn btn-success">View</button>
                        </div>
                        <br><br>
                        <div class="row col-md-12">
                            For Sale
                            <div class="col-md-3">
                                <input type="date" class="form-control" id="day11">
                            </div>
                            <div class="col-md-3">
                                <input type="date" class="form-control" id="day22">
                            </div>
                            <div class="col-md-3">
                                <button type="button" id="between" onclick="periodic2()" class="btn btn-success">View</button>
                            </div>
                        </div>
                        
                    </div>
                    </form>
                     &nbsp &nbsp
                    

                  </div>
                </div>
                <!-- card starts -->
                <div class="card-body" id="period">
                    
                </div>
                <!-- card ends -->
                </div>
            </div>
                
              </div>
            </div>
          </div>
        </section>
        <?php include'includes/settings.php' ?>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          <a href="">&copy spaceBooking | Rwanda</a></a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
    <script src="assets/bundles/datatables/datatables.min.js"></script>
  <script src="assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="assets/js/page/datatables.js"></script>
  <!-- <script src="assets/js/app.min.js"></script> -->
  <!-- JS Libraies -->
  <script src="assets/bundles/cleave-js/dist/cleave.min.js"></script>
  <script src="assets/bundles/cleave-js/dist/addons/cleave-phone.us.js"></script>
  <script src="assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="assets/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="assets/bundles/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
  <script src="assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
  <script src="assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>

  <!-- Page Specific JS File -->  <script src="assets/js/page/forms-advanced-forms.js"></script>
  <!-- Template JS File -->

  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
</body>
<!-- basic-table.html  21 Nov 2019 03:55:20 GMT -->
</html>
<script type="text/javascript">
  $(function(){
    $("#openReg").click(function(){
      window.location= "newCompany";
    });
  });

  function periodic(){
      var day1= $('#day1').val();
      var day2= $('#day2').val();
      
      if(day1=='')
      {
        $('#day1').css('border-bottom-color', '#c00');
        $('#day1').css('color', '#c00');
      }
      else if(day2=='')
      {
        $('#day2').css('border-bottom-color', '#c00');
        $('#day2').css('color', '#c00');  
      }
      else{
          $('#period').load('load_between.php?day1='+day1+'&day2='+day2);
      }
  }

  function periodic2(){
      var day11= $('#day11').val();
      var day22= $('#day22').val();
      
      if(day11=='')
      {
        $('#day11').css('border-bottom-color', '#c00');
        $('#day11').css('color', '#c00');
      }
      else if(day22=='')
      {
        $('#day22').css('border-bottom-color', '#c00');
        $('#day22').css('color', '#c00');  
      }
      else{
          $('#period').load('load_between.php?day1='+day11+'&day2='+day22);
      }
  }
</script>

<script>
  $(function(){
      $("#mainFilter").addClass('active');
  });
</script>