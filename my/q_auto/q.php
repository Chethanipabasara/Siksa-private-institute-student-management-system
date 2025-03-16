<!--This page Print you Selected Data in Product Table--> 
<?php

if (isset($_GET['id'])) { // pro_id = index.php ->> .a href
    $jobId = $_GET['id'];
    $con = mysqli_connect('localhost', 'root', '', 'demo'); // setup your database connection
    $query = "SELECT *  FROM `regist` WHERE id=$jobId";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            echo $row['product_name']; //product_name = Database Column Name
            echo $row['dealer_price']; //dealer_price = Database Column Name
            echo $row['unit_price']; //unit_price = Database Column Name
        }
    }
}
?>