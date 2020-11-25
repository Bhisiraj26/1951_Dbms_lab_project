<?php
// print_r($_REQUEST);
include('config.php');
session_start();
$Email = $_POST['Email'];
$Password = $_POST['Password'];
$Password = md5($Password);

$sql = "SELECT * FROM admin where Email = '$Email' and Password = '$Password'";   
$result = $link->query($sql);
if($result->num_rows >0){
	$_SESSION['Email'] = $Email;
	echo 1;
}else {
	echo 2;
}

?>