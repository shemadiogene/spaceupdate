<!DOCTYPE html>
<html lang="en">
<!-- basic-table.html  21 Nov 2019 03:55:20 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Home</title>
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
</head>
<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <?php 
      include 'includes/header.php';
      include 'includes/left_nav.php';
       ?>
    
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <?php
              $qs = mysqli_query($conn,"SELECT *FROM customers WHERE reserveStatus = 'SUCCESS'");
              $f = mysqli_num_rows($qs);
            ?>
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="card">
                  <div class="card-statistic-4">
                    <div class="align-items-center justify-content-between">
                      <div class="row ">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                          <div class="card-content">
                            <h5 class="font-15">New Booking</h5>
                            <h2 class="mb-3 font-18"><?= $f;?></h2>
                            <!-- <p class="mb-0"><span class="col-green">10%</span> Increase</p> -->
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
                            <?php
                              $fd = mysqli_query($conn,"SELECT *FROM customers");
                              $fe1= mysqli_num_rows($fd);
                            ?>
                            <h5 class="font-15"> Customers</h5>
                            <h2 class="mb-3 font-18"><?= $fe1?></h2>
                            <!-- <p class="mb-0"><span class="col-orange">09%</span> Decrease</p> -->
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
                            <h5 class="font-15">Total Spaces</h5>
                            <?php 
                             $spa = mysqli_query($conn, "SELECT COUNT(id) as totaloffices FROM offices") or die(mysqli_error($conn));
                             $ffspace = mysqli_fetch_array($spa)
                            ?>
                            <h2 class="mb-3 font-18"><?= $ffspace['totaloffices']?></h2>
                            <!-- <p class="mb-0"><span class="col-green">18%</span>
                              Increase</p> -->
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
                            <?php
                              $findRev = mysqli_query($conn,"SELECT SUM(offices.price) as summation FROM offices,customers WHERE offices.id = customers.offId") or die(mysqli_error($conn));
                              $rev = mysqli_fetch_array($findRev);
                            ?>
                            <h2 class="mb-3 font-18"> <?= $rev['summation']?>Rwf</h2>
                            <!-- <p class="mb-0"><span class="col-green">42%</span> Increase</p> -->
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
              </div>
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class="card">
                  <div class="card-header">
                    <h4>ALL SPACES</h4>
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
                            <th>Photo 1</th>
                            <th>Photo 2</th>
                            <th>Photo 3</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $id = 
                            $query = mysqli_query($conn,"SELECT *FROM offices ORDER BY id DESC") or die(mysqli_error($conn));
                            if (mysqli_num_rows($query)>0) {
                                $counter = 1;
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
                                            <td><img src="media/spaceImages/<?= $rows['photo1'];?>" class="img img-fluid" width="100" alt=""></td>
                                            <td><img src="media/spaceImages/<?= $rows['photo2'];?>" class="img img-fluid" width="100" alt=""></td>
                                            <td><img src="media/spaceImages/<?= $rows['photo3'];?>" class="img img-fluid" width="100" alt=""></td>
                                        </tr>
                                   <?php
                                $counter++;}
                            }
                        ?>
                        </tbody>
                    </table>
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
</body>

<script>
  $(function(){
      $("#mainDash").addClass('active');
  });
</script>

<!-- basic-table.html  21 Nov 2019 03:55:20 GMT -->
</html>