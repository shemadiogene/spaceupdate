<?php
    include("inc/connect.php");
    $value = $_POST['search'];
    $output = '';
    $search = mysqli_query($conn,"SELECT *FROM offices WHERE name LIKE '%$value%'") or die(mysqli_error($conn));
        if (mysqli_num_rows($search)>0) {
        $output .= '<ul>';
        while ($row = mysqli_fetch_array($search)) {
            $output.=
                '<p class="alert alert-success">
                <a href="searchResults.php?search='.rand()."2j".rand()."dd".rand()."fLksl)L!".$row['id']."!JfdL".rand()."2j".rand()."dd".rand().'">'.$row['name'].'</a>
                </p>';
        }
        echo $output;
        }else{
            echo "<span class='text-danger'>No data found please</span>";
        }
?>