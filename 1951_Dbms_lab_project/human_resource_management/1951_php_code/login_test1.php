<?php
// print_r($_REQUEST);
include('config.php');
session_start();
$F_name = $_POST['F_name'];
$Password = $_POST['Password'];
$Password = md5($Password);

$sql = "SELECT * FROM employee where F_name = '$F_name' and Password = '$Password'";   
$result = $link->query($sql);
if($result->num_rows >0){
	$_SESSION['F_name'] = $F_name;
	echo 1;
}else {
	echo 2;
}

?>