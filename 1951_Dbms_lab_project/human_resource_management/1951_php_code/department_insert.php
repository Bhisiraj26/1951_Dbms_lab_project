<?php
include('config.php');
         
if(isset($_POST['Dname']) && !empty($_POST['Dname']))
{
    $Dname = $_POST['Dname'];
} 

if(isset($_POST['Contact_no']) && !empty($_POST['Contact_no']))
{
    $Contact_no = $_POST['Contact_no'];  
}

if(isset($_POST['Address']) && !empty($_POST['Address']))
{
    $Address = $_POST['Address'];
}                            

$sql = "INSERT into department(Dname,Contact_no,Address) VALUES ('".$Dname."','".$Contact_no."','".$Address."')"; 

    if($link->query($sql) == TRUE)
    { 
        echo  1;
    }
    else
    {
        echo 2;
    }
?>

