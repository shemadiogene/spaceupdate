<?php
require_once("includes/db.php");
?>
<!DOCTYPE html>
<html lang="en">
<!-- basic-table.html  21 Nov 2019 03:55:20 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Admin | Spaceco</title>
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
              <!-- <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="card">
                  <div class="card-statistic-4">
                    <div class="align-items-center justify-content-between">
                      <div class="row ">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                          <div class="card-content">
                            <h5 class="font-15">New Booking</h5>
                            <h2 class="mb-3 font-18">258</h2>
                            <p class="mb-0"><span class="col-green">10%</span> Increase</p>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                          <div class="banner-img">
                            <img src="assets/img/banner/1.png" alt="">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="card">
                  <div class="card-statistic-4">
                    <div class="align-items-center justify-content-between">
                      <div class="row ">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                          <div class="card-content">
                            <h5 class="font-15"> Customers</h5>
                            <h2 class="mb-3 font-18">1,287</h2>
                            <p class="mb-0"><span class="col-orange">09%</span> Decrease</p>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                          <div class="banner-img">
                            <img src="assets/img/banner/2.png" alt="">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="card">
                  <div class="card-statistic-4">
                    <div class="align-items-center justify-content-between">
                      <div class="row ">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                          <div class="card-content">
                            <h5 class="font-15">New Project</h5>
                            <h2 class="mb-3 font-18">128</h2>
                            <p class="mb-0"><span class="col-green">18%</span>
                              Increase</p>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                          <div class="banner-img">
                            <img src="assets/img/banner/3.png" alt="">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">Revenue</h5>
                          <h2 class="mb-3 font-18">$48,697</h2>
                          <p class="mb-0"><span class="col-green">42%</span> Increase</p>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/4.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
              <div class="col-sm-2 col-md-2 col-lg-2">
                <button class="btn btn-outline-info btn-sm" id="backHome">Back</button>
              </div>
              <div class="col-sm-8 col-md-8 col-lg-8">
                <div class="card card-primary">
                  <div class="card-header">
                    <h4>Register new Company</h4>
                  </div>
                  <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                      <?php
                        if (isset($_POST['save'])) {
                            $a = mysqli_real_escape_string($conn,$_POST['comNames']);
                            $b = mysqli_real_escape_string($conn,$_POST['comEmail']);
                            $c = mysqli_real_escape_string($conn,$_POST['location']);
                            $d = mysqli_real_escape_string($conn,$_POST['phone_number']);
                            $e = $b;
                            $f = $d.uniqid();
                            $g = mysqli_real_escape_string($conn,$_POST['comTin']);
                        
                            //images
                        
                            $tk = mysqli_real_escape_string($conn,$_FILES['thumbnails']['name']);
                            
                        
                            $ext1 = explode(".",$tk);
                            
                            $i = uniqid().".".$ext1[1];
                        
                        
                            $check = mysqli_query($conn,"SELECT *FROM companies WHERE comName='$a' AND comTIN = '$g' ") or die(mysqli_error());
                            if (mysqli_num_rows($check)>0) {
                                echo $msg="<div class='alert alert-danger alert-dismissible' role='alert'>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                <h3>Your company already registered</h3>
                                </div>";
                            }else{
                                
                                $insert  = mysqli_query($conn,"INSERT INTO companies (id,comName,comEmail,comLocation,comPhone,comUsername,comPassword,comTIN,thumbnail,coStatus) VALUES
                                ('','$a','$b','$c','$d','$e','$f','$g','$i','Approved')") or die(mysqli_error($conn));
                                move_uploaded_file($_FILES['thumbnails']['tmp_name'],"media/companies/".$i);
                                if ($insert) {
                                    echo $msg="<div class='alert alert-success alert-dismissible' role='alert'>
                                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                                <h3>New Company Registered successfully</h3>
                                                </div>";
                                }else {
                                    echo $msg="<div class='alert alert-danger alert-dismissible' role='alert'>
                                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                            <h3>Failed to be saved</h3>
                                            </div>";
                                }
                        
                            }
                        }
                      ?>
                      <div class="row">
                        <div class="form-group col-6">
                          <label for="frist_name">Company Name</label>
                          <input id="frist_name" type="text" class="form-control" name="comNames" autofocus>
                        </div>
                        <div class="form-group col-6">
                          <label for="last_name">Company Email</label>
                          <input id="last_name" type="text" class="form-control" name="comEmail">
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-6">
                          <label for="frist_name">Company Location</label>
                          <input id="frist_name" type="text" class="form-control" name="location" autofocus>
                        </div>
                        <div class="form-group col-6">
                          <label for="last_name">Phone Number</label>
                          <input id="last_name" type="text" class="form-control" name="phone_number">
                        </div>
                      </div>
                      
                      <div class="row">
                        <div class="form-group col-6">
                          <label for="frist_name">Company TIN</label>
                          <input id="frist_name" type="text" class="form-control" name="comTin" autofocus>
                        </div>
                        <div class="form-group col-6">
                          <label for="thum">Thumbnail</label>
                          <input id="thum" type="file" class="form-control" name="thumbnails">
                          <div class="invalid-feedback"></div>
                        </div>
                      </div>
                      <div class="form-group">
                        <button type="submit" name="save" class="btn btn-primary btn-lg btn-block">
                          Register
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="col-sm-2 col-md-2 col-lg-2">
              </div>
            </div>
          </div>
        </section>
        <?php include'includes/settings.php' ?>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          <a href="">&copy Spececo</a></a>
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
  <!-- <script src="assets/js/page/datatables.js"></script>-->
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
    $("#backHome").click(function(){
      window.location="listOfRents";
    });
  });
</script>