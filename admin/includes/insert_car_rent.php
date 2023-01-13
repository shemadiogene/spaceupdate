<?php 
include 'db.php';
if (isset($_POST['save_car'])) {
	$carname=$_POST['car_name'];
	$transmission=$_POST['transmission'];
	$price=$_POST['price'];
	$car_type=$_POST['car_type'];
	$description=$_POST['description'];
	$car_pic=$_FILES['car_pic']['name'];

	$q="INSERT INTO `cars_rent` (`car_rent_id`, `car_rent_name`, `transmission`, `price`, `photo`, `type` ,`description`) VALUES (NULL, '$carname', '$transmission', '$price', '$car_pic','$car_type', '$description')";
	
	if (mysqli_query($conn,$q)) {
		move_uploaded_file($_FILES['car_pic']['tmp_name'], "../uploads/".$_FILES['car_pic']['name'])
		?>
		<script>
			swal('Success', 'Inserted car:<?php echo $carname; ?> !', 'success');
		</script>
<?php }} ?>