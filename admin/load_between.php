<?php
require "includes/db.php";

if(isset($_GET['day1']))
{
    $day1=$_GET['day1'];
    $day2=$_GET['day2'];
}

// $si = mysqli_query($conn,"SELECT DAY(resTime) FROM customers") or die(mysqli_error($conn));
// $fe = mysqli_fetch_array($si);
///$real = strtotime($fe['resTime']);
// echo date('Y')==$fe['resTime'];
//echo $fe['DAY(resTime)'];

?>
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
            <th>Date</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $id = 
            $query = mysqli_query($conn,"SELECT *FROM customers,offices WHERE customers.companyId=offices.companyId AND offices.id = customers.offId AND offices.status='Rent' AND customers.reserveStatus='SUCCESS' AND customers.approvedAt BETWEEN '$day1' AND '$day2'") or die(mysqli_error($conn));
            if (mysqli_num_rows($query)>0) {
                $counter = 1;
                while ($rows = mysqli_fetch_array($query)) {
                    ?>
                    <tr>
                        <td><?= $counter;?></td>
                        <td><?= $rows['propertyId'];?></td>
                        <td><?= $rows['fullnames'];?></td>
                        <td><?= $rows['phoneNumber'];?></td>
                        <td><?= $rows['reserveId'];?></td>
                        <td><?= $rows['email'];?></td>
                        <td><?= $rows['cusLocation'];?></td>
                        <td><?= $rows['approvedAt'];?></td>
                    </tr>
                    <?php
                $counter++;}
            }else{
                $query2 = mysqli_query($conn,"SELECT *FROM customers,offices WHERE customers.companyId=offices.companyId AND offices.id = customers.offId AND offices.status='Sales' AND customers.reserveStatus='SUCCESS' AND customers.approvedAt BETWEEN '$day1' AND '$day2'") or die(mysqli_error($conn));
                if (mysqli_num_rows($query2)) {
                    $counter2=1;
                    while ($rows1 = mysqli_fetch_array($query2)) {
                        ?>
                        <tr>
                            <td><?= $counter2;?></td>
                            <td><?= $rows1['propertyId'];?></td>
                            <td><?= $rows1['fullnames'];?></td>
                            <td><?= $rows1['phoneNumber'];?></td>
                            <td><?= $rows1['reserveId'];?></td>
                            <td><?= $rows1['email'];?></td>
                            <td><?= $rows1['cusLocation'];?></td>
                            <td><?= $rows1['approvedAt'];?></td>
                        </tr>
                        <?php
                    $counter2++;}
                }
            }
        ?>
        </tbody>
    </table>
</div>

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