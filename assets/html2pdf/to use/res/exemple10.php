
<page >
<h5>
<?php

require 'connection.php';
$sel_school=mysqli_query($connection,"select * from school where school_id='".$_COOKIE['darasa_user_school']."'");
$get_schl=mysqli_fetch_assoc($sel_school);

$sel_names=mysqli_query($connection,"select * from school_user where school_user_id='".$_COOKIE['darasa_user_id']."'");
$get_names=mysqli_fetch_assoc($sel_names);?>
 
 <?php echo $get_schl['school_name'];?>
 &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; 
Teacher &nbsp;&nbsp; <?php echo $get_names['school_user_fname']." ".$get_names['school_user_lname'];?>
</h5>
<table border="1" class="table table-striped table-bordered nowrap" style="width:100%;border-collapse:collapse;
    border:1px solid #000;margin-left:2em;">
<tbody>

<?php 
require 'connection.php';

$sel_days=mysqli_query($connection,"select * from days");

while($get_days=mysqli_fetch_assoc($sel_days))
{
?>

<tr>
<td style="width:20%;"><?php echo $get_days['day_name'];?></td>
<td style="width:80%;">
<table>
<tr>
<?php
require 'connection.php';

$sel_table=mysqli_query($connection,"select * from class_timetable,subject,school_class where class_timetable.subject_id=subject.subject_id and class_timetable.school_class_id=school_class.school_class_id and class_timetable.school_user_id='".$_COOKIE['darasa_user_id']."' and timetable_day='".$get_days['day_name']."'") or die(mysqli_error($connection));

while($fec_tmt=mysqli_fetch_assoc($sel_table))
{
?>
<td style="border-right:1px solid black;">
<p><?php echo wordwrap($fec_tmt['subject_name'],18,"<br>\n");?></p>
<h1><?php echo $fec_tmt['class_name'];?></h1>
<p><?php echo $fec_tmt['start_time'];?>&nbsp;&nbsp;<?php echo $fec_tmt['end_time'];?></p>
</td>
<?php
}
?>
</tr>
</table> 
</td>

</tr>
<?php
}
?>

</tbody>
</table>
    
</page>
