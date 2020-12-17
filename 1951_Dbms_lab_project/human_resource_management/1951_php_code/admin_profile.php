<!DOCTYPE html>
<?php
include("header.php");
include("config.php");
?>
    <!-- <html>
    <head> -->
    
    <?php 
    $Admin = $_SESSION['Email'];
    $get_Admin = "SELECT * FROM admin where Email='$Admin'";
    $run_Admin = mysqli_query($link,$get_Admin);
    $row = mysqli_fetch_array($run_Admin);
    $Email = $row['Email'];
    ?>
    <title><?php echo "$Email"; ?></title>
    
    <link rel="stylesheet" type="text/css" href="../assets/css/home_style2.css">
  <!--   <link rel="stylesheet" href="css/styles.css" />
    -->

<style>
    #cover-img{
        height: 400px;
        width: 100%;
    }#profile-img{
        position: absolute;
        width: 35%;
        top: 160px;
        left:30px;

    }
    #update_profile{
        position: relative;
        top: -33px;
        cursor: pointer;
        left: 93px;
        border-radius: 4px;
        background-color: rgba(0,0,0,0.1);
        transform: translate(-50%, -50%);
    }
    #button_profile{
        position: absolute;
        top: 75%;
        left: 50%;
        cursor: pointer;
        transform: translate(-50%, -50%);
    }
</style><br><br>
<body>
<div class="row">
<div class="col-sm-2">
</div>
<div class="col-sm-8">

    

         <?php
         echo"
         <div>
         <div><img id='cover-img' class='img-rounded' src='cover/$Admin_cover' alt='cover'></div>
         <form action='admin_profile.php?A_id=$Admin_id' method='post' enctype='multipart/form-data'>

         <ul class='nav pull-left' style='position:absolute;top:10px;left:40px;'>
           <li class='dropdown'>
           <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true'
            aria-expanded='false'><span> <i class='glyphicon glyphicon-chevron-down'></i></span></a>
           <ul class='dropdown-menu'>
           <center>
           <li>
           <label class='btn btn-info' text-align: center;>Select Cover
           <input type='file' name='A_cover' size='60' />
           </label><br><br>
           </li>
           <li>
           <button name='submit' class='btn btn-info'>Update Cover</button>
           </li>
           </center>
           </ul>
           </li>
         </ul>
         </form> 
         </div>
         
         <div id='profile-img'>
         <img src='users/$Admin_image' alt='Profile' class='img-circle' width='100px' height='185px'>
         <form action='admin_profile.php?A_id='$Admin_id' method='post' enctype='multipart/form-data'>

         <label id='update_profile'> Select Profile 
         <input type='file' name='A_image' size='60' />
         </label><br><br>
         <button id='button_profile' name='update' class='btn btn-info'>Update Profile</button>
         </form>
         </div><br>
         ";
         ?>

         <?php

         if(isset($_POST['submit'])){

         $A_cover = $_FILES['A_cover']['name'];
         $image_tmp = $_FILES['A_cover']['tmp_name'];
         $random_number = rand(1,100);

         if($A_cover==''){
         echo "<script>alert('Please Select Cover Image')</script>";
         echo"<script>window.open('admin_profile.php?A_id=$Admin_id' , '_self')</script>";
         exit();
         }else{
         move_uploaded_file($image_tmp, "cover/$A_cover.$random_number");
         $update = "update admin set Admin_cover='$A_cover.$random_number' where Admin_id='$Admin_id'";
         //$u_image changed to $u_cover later in the video.
         $run = mysqli_query($link, $update);

         if($run){
         echo "<script>alert('Your Cover Updated')</script>";
         echo"<script>window.open('admin_profile.php?A_id=$Admin_id' , '_self')</script>";
         }
            }
        }
        ?>
        
        </div>
        <?php
        if(isset($_POST['update'])){

        $A_image = $_FILES['A_image']['name'];
        $image_tmp = $_FILES['A_image']['tmp_name'];
        $random_number = rand(1,100);

        if($A_image==''){
        echo "<script>alert('Please Select Profile Image on clicking on your profile image')</script>";
        echo"<script>window.open('admin_profile.php?A_id=$Admin_id' , '_self')</script>";
        exit();
        }else{
        move_uploaded_file($image_tmp, "users/$A_image.$random_number");
        $update = "update admin set Admin_image='$A_image.$random_number'where Admin_id='$Admin_id'";
        //$u_image changed to $u_cover later in the video.
        //down below closing div tag is show the few users profile details from the database you can show more from database if you want and in the blood bank project
        $run = mysqli_query($link, $update);

        if($run){
        echo "<script>alert('Your Profile Updated')</script>";
        echo"<script>window.open('admin_profile.php?A_id=$Admin_id' , '_self')</script>";
                }
            }
        }
    ?>
    <div class="col-sm-2">
    </div>
    </div>
    <div class="row">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-2" style="background-color: #e6e6e6;text-align: center;left: 0.9%;border-radius: 5px;">
        <?php
        echo"
        <center><h4><strong>About</strong></h4></center>
        <center><h5><strong>$F_name $L_name</strong></h5></center><br>
        <p><strong>Address: <i style='color:grey;'></i></strong>$Address</p><br>
        <p><strong>Gender: </strong> $Gender</p><br>
        <p><strong>Phone No: </strong> $Contact_no</p><br>
        <p><strong>Age: </strong> $Age</p><br>
        <p><strong>Email: </strong> $Email</p><br>
        ";
        ?>
         <td style="width: 10px" colspan="2" align="center"><a href="edit_profile_admin.php?Admin_id=<?php echo $row['Admin_id']; ?>">Edit</a></td>
    </div>
</div><br><br>
<?php
include("footer.php");
?>