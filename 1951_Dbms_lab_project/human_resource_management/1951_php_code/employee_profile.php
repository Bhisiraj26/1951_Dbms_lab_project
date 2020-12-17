<!DOCTYPE html>
<?php
include("header1.php");
include("config.php");
?>
    <!-- <html>
    <head> -->
    
    <?php 
    $Employee = $_SESSION['F_name'];
    $get_Employee = "SELECT * FROM employee where F_name='$Employee'";
    $run_Employee = mysqli_query($link,$get_Employee);
    $row = mysqli_fetch_array($run_Employee);
    $F_name = $row['F_name'];
    ?>
    <title><?php echo "$F_name"; ?></title>
    
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
         <div><img id='cover-img' class='img-rounded' src='cover/$Employee_cover' alt='cover'></div>
         <form action='employee_profile.php?E_id=$Employee_id' method='post' enctype='multipart/form-data'>

         <ul class='nav pull-left' style='position:absolute;top:10px;left:40px;'>
           <li class='dropdown'>
           <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true'
                            aria-expanded='false'><span> <i class='glyphicon glyphicon-chevron-down'></i></span></a>
           <ul class='dropdown-menu'>
           <center>
           <li>
           <label class='btn btn-info' text-align: center;>Select Cover
           <input type='file' name='E_cover' size='60' />
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
         <img src='users/$Employee_image' alt='Profile' class='img-circle' width='100px' height='185px'>
         <form action='employee_profile.php?E_id='$Employee_id' method='post' enctype='multipart/form-data'>

         <label id='update_profile'> Select Profile 
         <input type='file' name='E_image' size='60' />
         </label><br><br>
         <button id='button_profile' name='update' class='btn btn-info'>Update Profile</button>
         </form>
         </div><br>
         ";
         ?>

         <?php

         if(isset($_POST['submit'])){

         $E_cover = $_FILES['E_cover']['name'];
         $image_tmp = $_FILES['E_cover']['tmp_name'];
         $random_number = rand(1,100);

         if($E_cover==''){
         echo "<script>alert('Please Select Cover Image')</script>";
         echo"<script>window.open('employee_profile.php?E_id=$Employee_id' , '_self')</script>";
         exit();
         }else{
         move_uploaded_file($image_tmp, "cover/$E_cover.$random_number");
         $update = "update employee set Employee_cover='$E_cover.$random_number' where Employee_id='$Employee_id'";
         //$u_image changed to $u_cover later in the video.
         $run = mysqli_query($link, $update);

         if($run){
         echo "<script>alert('Your Cover Updated')</script>";
         echo"<script>window.open('employee_profile.php?E_id=$Employee_id' , '_self')</script>";
         }
            }
        }
        ?>
        
        </div>
        <?php
        if(isset($_POST['update'])){

        $E_image = $_FILES['E_image']['name'];
        $image_tmp = $_FILES['E_image']['tmp_name'];
        $random_number = rand(1,100);

        if($E_image==''){
        echo "<script>alert('Please Select Profile Image on clicking on your profile image')</script>";
        echo"<script>window.open('employee_profile.php?E_id=$Employee_id' , '_self')</script>";
        exit();
        }else{
        move_uploaded_file($image_tmp, "users/$E_image.$random_number");
        $update = "update employee set Employee_image='$E_image.$random_number'where Employee_id='$Employee_id'";
        //$u_image changed to $u_cover later in the video.
        //down below closing div tag is show the few users profile details from the database you can show more from database if you want and in the blood bank project
        $run = mysqli_query($link, $update);

        if($run){
        echo "<script>alert('Your Profile Updated')</script>";
        echo"<script>window.open('employee_profile.php?E_id=$Employee_id' , '_self')</script>";
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
        <p><strong>Salary: </strong> $Salary</p><br>
        ";
        ?>
         <td style="width: 10px" colspan="2" align="center"><a href="edit_profile_employee.php?Employee_id=<?php echo $row['Employee_id']; ?>">Edit</a></td>
    </div>
</div><br><br>
<?php
include("footer.php");
?>