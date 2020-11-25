<?php
//Database Connection

$link = new mysqli ('localhost','root','','hrms');
if ($link->connect_error){
	die('could not connect:'.mysql_error());
} 
?>


