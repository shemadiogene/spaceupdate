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

      include 'includes/header.php';
      include 'includes/left_nav.php';
        ?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h4>ALL COMPANIES</h4><br>
            </div>
              <div class="col-sm-12 col-md-12 col-lg-12">
              <div class="card">
                <div class="card-header">
                  <div class="col-sm-12 col-md-12 col-lg-12">
                    <button class="btn btn-info" data-target="#newUserModal-modal-large" data-toggle="modal" style="float:right;">Add New</button>
                  </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                        <thead>
                        <tr>
                            <th>N<sup><u>o</u></sup></th>
                            <th>Name</th>
                            <th>Profile</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>location</th>
                            <th>Dob</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Update</th>
                            <!-- <th>Delete</th> -->
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $query = mysqli_query($conn,"SELECT *FROM users ORDER BY id DESC") or die(mysqli_error($conn));
                            if (mysqli_num_rows($query)>0) {
                                $counter = 1;
                                while ($rows = mysqli_fetch_array($query)) {
                                   ?>
                                        <tr>
                                            <td><?= $counter;?></td>
                                            <td><?= $rows['names'];?></td>
                                            <td><img src="assets/img/<?= $rows['profile'];?>" class="img img-fluid" width="100" alt="No"></td>
                                            <td><?= $rows['email'];?></td>
                                            <td><?= $rows['phone'];?></td>
                                            <td><?= $rows['address'];?></td>
                                            <td><?= $rows['dob'];?></td>
                                            <td><?= $rows['username'];?></td>
                                            <td><?= $rows['passwords'];?></td>
                                            <td><a href="updateCompanies?identification=<?=$rows['id']?>" style="color:white;" class="btn btn-flat btn-warning btn-sm">Update</a></td>
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


        <!-- Modal with form -->
        <div class="modal fade" id="newUserModal-modal-large" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">Register New User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="forms" method="POST">
                    <div class="response">
                        
                    </div>
                  <div class="form-group">
                    <!-- <label>Full Names</label> -->
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-user"></i>
                        </div>
                      </div>
                      <input type="text" class="form-control" placeholder="Full Names" name="names">
                    </div>
                  </div>

                  
                  <div class="form-group">
                    <!-- <label></label> -->
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-envelope-open"></i>
                        </div>
                      </div>
                      <input type="email" class="form-control" placeholder="Email" name="email">
                    </div>
                  </div>

                  <div class="form-group">
                    <!-- <label></label> -->
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-phone"></i>
                        </div>
                      </div>
                      <input type="text" class="form-control" placeholder="Phone" name="phone">
                    </div>
                  </div>
                
                  <div class="form-group">
                    <!-- <label></label> -->
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="far fa-address-book"></i>
                        </div>
                      </div>
                      <input type="radio" name="gender" class="form-control">Male
                      <input type="radio" name="gender" class="form-control">Female
                    </div>
                  </div>
                
                  <div class="form-group">
                    <!-- <label></label> -->
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="far fa-address-book"></i>
                        </div>
                      </div>
                      <input type="text" class="form-control" placeholder="Address" name="address">
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Date of Birth</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-calendar"></i>
                        </div>
                      </div>
                      <input type="date" class="form-control" name="dob">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label>Username</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-user-circle"></i>
                        </div>
                      </div>
                      <input type="text" class="form-control" placeholder="Username" name="username">
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Password</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-lock"></i>
                        </div>
                      </div>
                      <input type="password" class="form-control" placeholder="Password" name="password">
                    </div>
                  </div>
                  <button name="saveUser" type="submit" class="btn btn-primary m-t-15">Save</button>
                </form>

              </div>
            </div>
          </div>
        </div>


        <?php include'includes/settings.php' ?>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          <a href="">&copy spaceco | Rwanda</a></a>
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
<!-- <script type="text/javascript">
    function deleteCompany(id,name) {
       var confirmFirst = confirm("Do you really want to remove "+name+"??");
       if (confirmFirst) {
           window.location = "php/deleteCompany?idDelete="+id;
       }
    }
</script> -->
<script type="text/javascript">
  $(function(){
    $("#openReg").click(function(){
      window.location= "newCompany";
    });
  });
</script>
<script>
  $(function(){
      //$("#companiesNav").addClass('active');
      $("#users").addClass('active');
  });
</script>

                
<script type="text/javascript">
    $(function(){
        $(".forms").on('submit',function(e){
            e.preventDefault();
           //alert("Submitted");
           $.ajax({
            type:"POST",
            url:"includes/users.php",
            data:$(".forms").serialize(),
            success:function(response){
                //console.log(response)
                $(".response").html(response).addClass('alert alert-success');
            },
            error:function(responses){
                //console.log(response)
                $(".response").html(response).addClass('alert alert-danger');
            }
           });
        });
    });
</script>
