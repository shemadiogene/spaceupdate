<?php
require_once("includes/db.php");
$id = $_GET['editCar'];
?>
<!DOCTYPE html>
<html lang="en">
<!-- basic-table.html  21 Nov 2019 03:55:20 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>SpaceBooking</title>
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
                    <h4>Register a new car</h4>
                  </div>
                  <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <?php
                                $quer = mysqli_query($conn,"SELECT *FROM car_rent WHERE carId='$id'") or die(mysql_error($conn));
                                if (mysqli_num_rows($quer)>0) {
                                    $fet = mysqli_fetch_array($quer);
                                   ?>
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Car Names</label>
                                            <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                <i class="fas fa-car"></i>
                                                </div>
                                            </div>
                                            <input type="text" name="car_name" value="<?= $fet['carName']?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Transmission</label>
                                            <select class="form-control" name="transmission">
                                            <option value="<?= $fet['carTransimission']?>"><?= $fet['carTransimission']?></option>
                                            <option value="Automatic">Automatic</option>
                                            <option value="Manual">Manual</option>
                                            <option value="Manual">Both</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Car Air Condition</label>
                                            <select class="form-control" name="airCondition">
                                            <option selected disabled><?= $fet['carAirCondition']?></option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Car Seats</label>
                                            <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                <i class="fas fa-car"></i>
                                                </div>
                                            </div>
                                            <input type="number" name="car_seats" value="<?= $fet['carSeats']?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>KM /Litre</label>
                                            <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                <i class="fas fa-car"></i>
                                                </div>
                                            </div>
                                            <input type="number" name="kmLitre" value="<?= $fet['kmPerLitre']?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Doors</label>
                                            <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                <i class="fas fa-car"></i>
                                                </div>
                                            </div>
                                            <input type="number" name="car_doors" value="<?= $fet['doors']?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Fuel / Diesel</label>
                                            <select class="form-control" name="car_fuel">
                                            <option selected disabled><?= $fet['fuelType']?></option>
                                            <option value="Fuel">Fuel</option>
                                            <option value="Diesel">Diesel</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Price (:From)</label>
                                            <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                $
                                                </div>
                                            </div>
                                            <input name="price" type="number" value="<?= $fet['carPrice']?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Car type</label>
                                            <div class="selectgroup w-100">
                                            <label class="selectgroup-item">
                                                <input type="radio" name="car_type" value="Premium" class="selectgroup-input-radio"  <?php if($fet['carType'] == 'Premium'){ echo "checked";}?>>
                                                <span class="selectgroup-button">Premium</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="car_type" value="Large" class="selectgroup-input-radio" <?php if($fet['carType'] == 'Large'){ echo "checked";}?>>
                                                <span class="selectgroup-button">Large</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="car_type" value="Medium" class="selectgroup-input-radio" <?php if($fet['carType'] == 'Medium'){ echo "checked";}?>>
                                                <span class="selectgroup-button">Medium</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="car_type" value="Small" class="selectgroup-input-radio" <?php if($fet['carType'] == 'Small'){ echo "checked";}?>>
                                                <span class="selectgroup-button">Small</span>
                                            </label>
                                            <label class="selectgroup-item">
                                              <input type="radio" name="car_type" value="Vans And Trucks" class="selectgroup-input-radio" <?php if($fet['carType'] == 'Vans And Trucks'){ echo "checked";}?>>
                                              <span class="selectgroup-button">Vans And Trucks</span>
                                            </label>
                                        </div>       
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea name="description" class="form-control"><?= $fet['carDesc']?></textarea>
                                            </div>
                                        </div>
                                        <label>Thumbnail</label>
                                        <div class="custom-file">
                                            <input type="file" name="thumbs" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                        <br><br>
                                        <label><b>Other photos</b></label>
                                        <div class="custom-file">
                                            <input type="file" name="photo1" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                        <br><br>
                                        <div class="custom-file">
                                            <input type="file" name="photo2" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                        <br><br>
                                        <div class="custom-file">
                                            <input type="file" name="photo3" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                        <br><br>
                                        
                                        <div class="form-group">
                                            <button type="submit" name="updateCar" class="btn btn-icon icon-left btn-outline-primary"><i class="fas fa-check"></i> Edit</a>
                                        </div>
                                    </form>
                                   <?php
                                }
                            ?>
                        </div>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </section>
        <?php include'includes/settings.php' ?>
      </div>
      <?php
        if (isset($_POST["updateCar"])) {
          $a = mysqli_real_escape_string($conn,$_POST['car_name']);
          $b = mysqli_real_escape_string($conn,$_POST['transmission']);     
          $c = mysqli_real_escape_string($conn,$_POST['airCondition']);      
          $d = mysqli_real_escape_string($conn,$_POST['car_seats']);
          $p = mysqli_real_escape_string($conn,$_POST['kmLitre']);                            
          $e = mysqli_real_escape_string($conn,$_POST['car_doors']);
          $f = mysqli_real_escape_string($conn,$_POST['car_fuel']);  
          $g = mysqli_real_escape_string($conn,$_POST['price']);
          $h = mysqli_real_escape_string($conn,$_POST['car_type']);          
          $i = mysqli_real_escape_string($conn,$_POST['description']);

          //images

          $tj = mysqli_real_escape_string($conn,$_FILES['thumbs']["name"]);
          $tk = mysqli_real_escape_string($conn,$_FILES['photo1']["name"]);          
          $tl = mysqli_real_escape_string($conn,$_FILES['photo2']["name"]);          
          $tm = mysqli_real_escape_string($conn,$_FILES['photo3']["name"]);

          $ext = explode(".",$tj);
          $ext1 = explode(".",$tk);
          $ext2 = explode(".",$tl);
          $ext3 = explode(".",$tm);
          
          $j = uniqid().".".$ext[1];
          $k = uniqid().".".$ext1[1];
          $l = uniqid().".".$ext2[1];
          $m = uniqid().".".$ext3[1];

          if (empty($tj) && empty($tk) && empty($tl) && empty($tm)) {
            $query1 = mysqli_query($conn,"UPDATE car_rent SET
            carName='$a',carTransimission='$b',carAirCondition='$c',carSeats='$d',kmPerLitre='$p',doors='$e',fuelType='$f',
            carPrice='$g',carType='$h',carDesc='$i' WHERE carId = '$id'")or die(mysqli_error($conn));
            if ($query1) {
              // echo "<script>alert('hELLO')</script>";
              // die();
              echo "<script>window.location = 'rentCars.php';</script>";
              # code...
            }

          }else{
            $query = mysqli_query($conn,"UPDATE car_rent SET
            carName='$a',carTransimission='$b',carAirCondition='$c',carSeats='$d',kmPerLitre='$p',doors='$e',fuelType='$f',
            carPrice='$g',carType='$h',carDesc='$i',thumbnail='$j',photo1='$k',photo2='$l',photo3='$m'
            WHERE carId = '$id'")or die(mysqli_error($conn));
          if ($query) {
            move_uploaded_file($_FILES['thumbs']["tmp_name"],"media/imagesRent/".$j);
            move_uploaded_file($_FILES['photo1']["tmp_name"],"media/imagesRent/".$k);
            move_uploaded_file($_FILES['photo2']["tmp_name"],"media/imagesRent/".$l);
            move_uploaded_file($_FILES['photo3']["tmp_name"],"media/imagesRent/".$m);                       
            echo "<script>window.location = 'rentCars.php';</script>";
          }
          }
        }
      ?>
      <footer class="main-footer">
        <div class="footer-left">
          <a href="">&copy SpaceBooking | Rwanda</a></a>
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
 <script src="assets/js/app.min.js"></script>
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