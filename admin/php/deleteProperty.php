<?php
    include '../includes/db.php';
    $id = $_GET['idDelete'];
    
    $delQuery = mysqli_query($conn,"DELETE FROM offices WHERE id = '$id'") or die(mysqli_error($conn));
    if ($delQuery) {
        //echo "<div alert='alert alert-success'>Deleted successfully</div>";
       ?>
        <script>window.location="../comRents"</script>
       <?php
    }
?>