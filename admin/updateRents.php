<?php
require_once("includes/db.php");
$idall = $_GET['idToUpdate'];
$ex = explode("!",$_GET['idToUpdate']);
$id = $ex[0];
$id1 = $ex[1];
//die();
$se = mysqli_query($conn,"SELECT *FROM offices WHERE id='$id'") or die(mysqli_error($conn));
$fe = mysqli_fetch_array($se);
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

        //include 'includes/headerCompany.php';
        include 'includes/left_nav2.php';
        ?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-sm-2 col-md-2 col-lg-2">
                <!-- <button class="btn btn-outline-info btn-sm" id="backHome">Back</button> -->
              </div>
              <div class="col-sm-8 col-md-8 col-lg-8">
                <div class="card card-primary">
                  <div class="card-header">
                    <h4>Update New Space</h4>
                  </div>
                  <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                      <div class="row">
                        <div class="col-12 text-white" style="text-align:center;color:white;">
                            <?php
                               include 'php/updateRent.php';
                            ?>
                            <?php
                                if (isset($_POST['updateRent'])) {
                                echo $msg;
                                }
                            ?>
                        </div>
                        <div class="form-group col-6">
                          <input id="names" type="text" class="form-control" name="offName" value="<?= $fe['name'];?>" autofocus>
                        </div>
                        <div class="form-group col-6">
                          <input id="locations" type="text" class="form-control" value="<?= $fe['location'];?>"  name="offLocation">
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-6">
                          <input id="phoneNumber" type="number" class="form-control" name="offPhoneNumber"  value="<?= $fe['contact'];?>" autofocus>
                        </div>
                        <div class="form-group col-6">
                          <input id="price" type="number" class="form-control" value="<?= $fe['price'];?>" name="offPrices">
                        </div>
                      </div>
                      
                      <div class="row">
                        <div class="form-group col-6">
                          <input id="rooms" type="number" class="form-control" value="<?= $fe['rooms'];?>" name="offRooms" autofocus>
                        </div>
                        <div class="form-group col-6">
                            <div class="input-group">
                                <input type="number" name="offArea" class="form-control text-left" id="inlineFormInputGroup2" value="<?= $fe['area'];?>">
                                <div class="input-group-append">
                                <div class="input-group-text"><b>m</b><sup><small><b>2</b></small></sup></div>
                                </div>
                            </div>
                        </div>
                      </div>
                      
                      <div class="row">
                        <div class="form-group col-6">
                          <select name="offStatus" id="status" class="custom-select">
                              <option value="Rent">Rent</option>
                              <option value="Sales">Sales</option>
                          </select>
                        </div>
                        <div class="form-group col-6">
                           <textarea name="descs" id="" cols="30" class="form-control" rows="3"><?= $fe['descriptions'];?></textarea>
                        </div>
                        <div class="form-group col-12">
                            <div class="custom-file">
                                <input type="file" name="thumbnails" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose thumbnail</label>
                            </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-6">
                            <div class="custom-file">
                                <input type="file" name="img1" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose image 1</label>
                            </div>
                        </div>
                        <div class="form-group col-6">
                            <div class="custom-file">
                                <input type="file" name="img2" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose image 2</label>
                            </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="form-group col-6">
                            <div class="custom-file">
                                <input type="file" name="img3" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose image 3</label>
                            </div>
                            <!-- <input id="customFile" type="file" class="custom-file-input" name="img3" autofocus> -->
                        </div>
                        <div class="form-group col-6">
                          <input id="img4" type="file" class="custom-file-input" name="img4">
                          <div class="invalid-feedback"></div>
                        </div>
                      </div>

                      <div class="form-group">
                        <button type="submit" name="updateRent" class="btn btn-primary btn-lg btn-block">
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
//   $(function(){
//     $("#backHome").click(function(){
//       window.location="listOfRents";
//     });
//   });
</script>