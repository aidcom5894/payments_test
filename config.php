<?php 

$hostname = 'localhost';
$username = 'u445536153_financialAdmin';
$password = 'Ue*1S@i|V6279R8n^S2n4;P';
$dbname = 'u445536153_payments_demo';



$config = mysqli_connect($hostname,$username,$password,$dbname);

if($config){
	echo "";
}
else
{
	echo "Failed to Connect with Database: ".mysqli_connect_error();
}

?>