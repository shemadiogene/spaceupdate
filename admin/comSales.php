<?php
require_once("includes/db.php");
?>
<!DOCTYPE html>
<html lang="en">
<!-- basic-table.html  21 Nov 2019 03:55:20 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Admin | spaceco</title>
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

      include 'includes/headerCompany.php';
      include 'includes/left_nav2.php';
        ?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h4>ALL SALES</h4><br>
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
                            $query = mysqli_query($conn,"SELECT *FROM offices WHERE status='Sales' AND companyId = '{$_SESSION['spacecompanies']}' ORDER BY id DESC") or die(mysqli_error($conn));
                            if (mysqli_num_rows($query)>0) {
                                $idCo = $_SESSION['spacecompanies'];
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
                                            <td><a href="updateRents?idToUpdate=<?= $rows['id']."!".$idCo?>" style="color:white;" class="btn btn-flat btn-warning btn-sm">Update</a></td>
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
    function deleteProperties(id,name) {
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
        $("#spaceSala1").addClass('active');
        $("#bLink3").addClass('active');
    });
</script>