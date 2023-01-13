<?php
include 'includes/db.php';
?>
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
      include 'includes/headerCompany.php';
      include 'includes/left_nav2.php';
      ?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4><a href="includes/approveAll?id=<?= $_SESSION['spacecompanies']; ?>" class="btn btn-sm btn-outline-info">Approve All</a></h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                        <thead>
                          <tr>
                            <th>N<sup><u>o</u></sup></th>
                            <th>Property Id</th>
                            <th>Customer Name</th>
                            <th>Phone Number</th>
                            <th>#CODE</th>
                            <th>Email</th>
                            <th>Customer Location</th>
                            <th>Check in</th>
                            <th>Check out</th>
                            <th>Status</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $id =
                            $query = mysqli_query($conn, "SELECT *FROM customers,offices WHERE customers.companyId='{$_SESSION['spacecompanies']}' AND customers.reserveStatus='Pending'
                            AND customers.companyId=offices.companyId AND offices.id = customers.offId AND offices.status='Rent' ORDER BY customers.id DESC") or die(mysqli_error($conn));
                          if (mysqli_num_rows($query) > 0) {
                            $counter = 1;
                            while ($rows = mysqli_fetch_array($query)) {
                          ?>
                              <tr>
                                <td><?= $counter; ?></td>
                                <td><?= $rows['propertyId']; ?></td>
                                <td><?= $rows['fullnames']; ?></td>
                                <td><?= $rows['phoneNumber']; ?></td>
                                <td><?= $rows['reserveId']; ?></td>
                                <td><?= $rows['email']; ?></td>
                                <td><?= $rows['cusLocation']; ?></td>
                                <td><?= $rows['checkin']; ?></td>
                                <td><?= $rows['checkout']; ?></td>
                                <?php
                                if ($rows['reserveStatus'] != 'SUCCESS') {
                                ?>
                                  <td><button onClick="updateResStatus('<?= $rows['reserveId'] ?>','<?= $rows['id'] ?>')" style="color:white;" class="btn btn-flat btn-info btn-sm">Approve</button></td>
                                <?php
                                } else {
                                ?>
                                  <td><button onClick="updateResStatus('<?= $rows['reserveId'] ?>')" style="color:white;" class="btn btn-flat btn-success btn-sm"><?= $rows['reserveStatus'] ?></button></td>
                                <?php
                                }
                                ?>
                                

                              </tr>
                          <?php
                              $counter++;
                            }
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
      <?php include 'includes/settings.php' ?>
    </div>
    <footer class="main-footer">
      <div class="footer-left">
        <a href="">&copy SpaceBsooking | Rwanda</a></a>
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
<!-- basic-table.html  21 Nov 2019 03:55:20 GMT -->

</html>
<script type="text/javascript">
  function deleteReservation(id, name) {
    var com = confirm("Do you really want to remove this reservation " + name + " ?");
    if (com) {
      window.location = "php/deleteReservation?identification=" + id;
    }
  }

  function updateResStatus(id, officeId) {
    window.location = "php/updateReservation?identifications=" + id + "!" + officeId;
  }
</script>
<script>
  $(function() {
    $("#spaceRent").addClass('active');
    $("#spaceRent1").addClass('active');
  });
</script>