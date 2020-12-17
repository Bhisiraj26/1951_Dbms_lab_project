<?php
include('config.php');
if(isset($_POST['Deduction']) && !empty($_POST['Deduction'])) {
	$Deduction = $_POST['Deduction'];
}

if(isset($_POST['Overtime']) && !empty($_POST['Overtime'])) {
	$Overtime = $_POST['Overtime'];
}

if(isset($_POST['Bonus']) && !empty($_POST['Bonus'])) {
	$Bonus = $_POST['Bonus'];
}

if(isset($_POST['hdnId']) && !empty($_POST['hdnId'])) {
	$hdnId = $_POST['hdnId'];
}
 
$query = "UPDATE employee set Deduction = '$Deduction' and Overtime = '$Overtime' and Bonus = '$Bonus' where Employee_id = '$hdnId'";

if($link->query($query) == TRUE){
	echo 1;
} else {
	echo 2;
}


?>