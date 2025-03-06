<?php 

include('config.php');

$fetchMyQuery = mysqli_query($config,"SELECT * FROM site_payments");
$totalCount = mysqli_num_rows($fetchMyQuery);

echo $totalCount;
?>