<?php 
include('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $studentsName = $_POST['students_name'];
    $monthName = $_POST['month']; 
    $totalAmt = $_POST['total_amount']; 
    $transactionID = $_POST['transaction_id']; 

   $insertData = mysqli_query($config,"INSERT INTO site_payments(students_name,month,total_amount,transaction_id)VALUES('$studentsName','$monthName','$totalAmt','$transactionID')");
}

?>