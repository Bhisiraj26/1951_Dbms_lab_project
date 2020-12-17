<?php
include('config.php');
         
if(isset($_POST['F_name']) && !empty($_POST['F_name']))
{
  $F_name = $_POST['F_name'];
} 

if(isset($_POST['L_name']) && !empty($_POST['L_name']))
{
  $L_name = $_POST['L_name'];  
}

if(isset($_POST['Address']) && !empty($_POST['Address']))
{
  $Address = $_POST['Address'];
}

if(isset($_POST['Gender']) && !empty($_POST['Gender']))
{
  $Gender = $_POST['Gender']; 
}

if(isset($_POST['Contact_no']) && !empty($_POST['Contact_no']))
{
  $Contact_no = $_POST['Contact_no'];
}

if(isset($_POST['Age']) && !empty($_POST['Age']))
{
  $Age = $_POST['Age'];
}
      
if(isset($_POST['Password']) && !empty($_POST['Password']))
{
  $Password = md5($_POST['Password']);
}      

if(isset($_POST['Email']) && !empty($_POST['Email']))
{
  $Email = $_POST['Email']; 
}                    

if(isset($_POST['hdnId']) && !empty($_POST['hdnId']))
{
	$hdnId = $_POST['hdnId'];
}
 
$query = "UPDATE admin set F_name = '$F_name', L_name = '$L_name' , Address = '$Address' , Gender = '$Gender', Contact_no = '$Contact_no' , Age = '$Age' , Password = '$Password' , Email = '$Email' where Admin_id = '$hdnId'";

if($link->query($query) == TRUE){
	echo 1;
} else {
	echo 2;
}

?>