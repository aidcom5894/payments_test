<?php 

$hostname = 'localhost';
$username = 'root';
$password = 'Admin1234#@';
$dbname = 'test_db';



$config = mysqli_connect($hostname,$username,$password,$dbname);

if($config){
	echo "";
}
else
{
	echo "Failed to Connect with Database: ".mysqli_connect_error();
}

?>