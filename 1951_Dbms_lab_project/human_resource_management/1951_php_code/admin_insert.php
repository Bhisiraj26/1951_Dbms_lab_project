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

if(isset($_POST['Role']) && !empty($_POST['Role']))
{
    $Role = $_POST['Role'];
}

if(isset($_POST['Email']) && !empty($_POST['Email']))
{
    $Email = $_POST['Email'];
}
                       
if(isset($_POST['Password']) && !empty($_POST['Password']))
{
    $Password = md5($_POST['Password']);
}      
                                               
     
    $Token = rand(1, 5);                                                
                                         
    $rand = rand(1, 3); //Random number between 1 and 3

    if($rand == 1)
        $profile_pic = "head_red.jpg";
    else if($rand == 2)
        $profile_pic = "head_sun_flower.jpg";
    else if($rand == 3)
        $profile_pic = "head_turqoise.jpg";
                              

$sql = "INSERT into admin(F_name,L_name,Address,Gender,Contact_no,Age,Role,Email,Password,Admin_image,Admin_cover) VALUES ('".$F_name."','".$L_name."','".$Address."','".$Gender."','".$Contact_no."','".$Age."','".$Role."','".$Email."','".$Password."','".$profile_pic."','default_cover.jpg')"; 

    if($link->query($sql) == TRUE)
    { 
        echo  1;
    }
    else
    {
        echo 2;
    }
?>

