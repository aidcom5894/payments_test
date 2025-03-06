<?php 

include('config.php');

$totalCost = 0;
$fetchMonths = mysqli_query($config,"SELECT * FROM site_payments");
while($row = mysqli_fetch_assoc($fetchMonths))
{
	$feesSubtotal = intval($row['total_amount']);
	$totalCost += $feesSubtotal;
}

echo $totalCost;
?>