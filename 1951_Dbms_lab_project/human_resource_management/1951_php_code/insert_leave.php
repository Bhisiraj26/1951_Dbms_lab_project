<?php
include('config.php');

if(isset($_POST['Employee_id']) && !empty($_POST['Employee_id'])){
    $Employee_id = $_POST['Employee_id'];
 } 

 if(isset($_POST['Employee_name']) && !empty($_POST['Employee_name'])){
    $Employee_name = $_POST['Employee_name'];
 } 

 if(isset($_POST['Leave_type']) && !empty($_POST['Leave_type'])){
    $Leave_type = $_POST['Leave_type'];
 } 

 if(isset($_POST['Dname']) && !empty($_POST['Dname'])){
    $Dname = $_POST['Dname'];
 } 

if(isset($_POST['Leave_from']) && !empty($_POST['Leave_from'])){
    $Leave_from = $_POST['Leave_from'];
 } 
         
if(isset($_POST['Leave_to']) && !empty($_POST['Leave_to'])){
    $Leave_to = $_POST['Leave_to'];
 } 

if(isset($_POST['Description']) && !empty($_POST['Description'])){
        $Description = $_POST['Description'];  
 }

$sql = "INSERT into leaves(Employee_id,Employee_name,Leave_type,Dname,Leave_from,Leave_to,Description,Status) VALUES ('".$Employee_id."','".$Employee_name."','".$Leave_type."','".$Dname."','".$Leave_from."','".$Leave_to."','".$Description."','Pending')";

if($link->query($sql) == TRUE){
  echo 1;
}else{
  echo 2;
}
                                                             
?>