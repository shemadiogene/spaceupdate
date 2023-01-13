<?php
require_once("includes/db.php");
?>
<!DOCTYPE html>
<html lang="en">
<!-- basic-table.html  21 Nov 2019 03:55:20 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Admin | spacebooking</title>
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

      include 'includes/headerCompany.php';
      include 'includes/left_nav2.php';
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
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h4>ALL RENTS</h4><br>
            </div>
              <div class="col-sm-12 col-md-12 col-lg-12">
              <div class="card">
                <div class="card-header">
                  <div class="col-sm-12 col-md-12 col-lg-12">
                    <button class="btn btn-info" style="float:right;" id="openReg">Add New</button>
                  </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                        <thead>
                        <tr>
                            <th>N<sup><u>o</u></sup></th>
                            <th>Name</th>
                            <th>#CODE</th>
                            <th>Thumbnail</th>
                            <th>Location</th>
                            <th>Contact</th>
                            <th>Price</th>
                            <th>Room</th>
                            <th>Area</th>
                            <th>Status</th>
                            <th>Update</th>
                           
                            <th>Photo 1</th>
                            <th>Photo 2</th>
                            <th>Photo 3</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $id = 
                            $query = mysqli_query($conn,"SELECT *FROM offices WHERE status='Rent' AND companyId = '{$_SESSION['spacecompanies']}' ORDER BY id DESC") or die(mysqli_error($conn));
                            if (mysqli_num_rows($query)>0) {
                                $counter = 1;
                                $idCo = $_SESSION['spacecompanies'];
                                while ($rows = mysqli_fetch_array($query)) {
                                   ?>
                                        <tr>
                                            <td><?= $counter;?></td>
                                            <td><?= $rows['name'];?></td>
                                            <td><?= $rows['propertyId'];?></td>
                                            <td><img src="media/spaceImages/<?= $rows['thumnail'];?>" class="img img-fluid" width="100" alt=""></td>
                                            <td><?= $rows['location'];?></td>
                                            <td><?= $rows['contact'];?></td>
                                            <td><?= $rows['price'];?></td>
                                            <td><?= $rows['rooms'];?></td>
                                            <td><?= $rows['area'];?></td>
                                            <td><?= $rows['status'];?></td>
                                            <td><a href="updateRents?idToUpdate=<?= $rows['id']."!".$idCo;?>" style="color:white;" class="btn btn-flat btn-warning btn-sm">Update</a></td>
                                               
                                            <td><img src="media/spaceImages/<?= $rows['photo1'];?>" class="img img-fluid" width="100" alt=""></td>
                                            <td><img src="media/spaceImages/<?= $rows['photo2'];?>" class="img img-fluid" width="100" alt=""></td>
                                            <td><img src="media/spaceImages/<?= $rows['photo3'];?>" class="img img-fluid" width="100" alt=""></td>
                                        </tr>
                                   <?php
                                $counter++;}
                            }
                        ?>
                        </tbody>
                        
                        <!-- Modals -->

                        <div class="modal fade" id="<?= "updateRents";?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                          aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="myLargeModalLabel">Register new space</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="card card-primary">
                                  <div class="card-header">
                                    <h4></h4>
                                  </div>
                                  
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>


                    </table>
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
    function deleteProperty(id,name) {
       var confirmFirst = confirm("Do you really want to remove "+name+"??");
       if (confirmFirst) {
           window.location = "php/deleteProperty?idDelete="+id;
       }
    }
</script>
<script type="text/javascript">
  $(function(){
    $("#openReg").click(function(){
      window.location= "registerNewSpace";
    });
  });
</script>
<script>
  $(function(){
      $("#spaceRent").addClass('active');
      $("#spaceRent3").addClass('active');
  });
</script>