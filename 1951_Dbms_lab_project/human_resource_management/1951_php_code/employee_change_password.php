<!DOCTYPE html>
<?php
session_start();
include("config.php");
?>
<html lang="en"> 
<meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />
<head>
        <meta charset="utf-8">
        <title>Change Password</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="Blood Donation - Activism & Campaign HTML5 Template">
        <meta name="author" content="xenioushk">
        <link rel='stylesheet' href='http://codepen.io/assets/libs/fullpage/jquery-ui.css'>
        <link rel="stylesheet" href="../assets/css/fstyle4.css" media="screen" type="text/css" />  
</head>

    <body> 

<div class="change-form">  
    <h3><center>Change Password</center></h3>
        <form action="" method="post">
            <center><div id = "success"></div></center>
            <input  id="Password" type="password" class="form-control" name="Password" placeholder="New Password" required>
            <input id="Cpassword" type="password" class="form-control" placeholder="Re-enter New Password" name="Cpassword" required>
            <center>  
            <button id="signin" class="btnclass" value="submit" name="signin">Change Password</button>
            </center><br><br>

            <div class="change-f1">
            <a style="text-decoration: none;float: right;color: #187FAB;" data-toggle="tooltip" title="signin.php" href="admin_login.php">Back to log in?</a><br>
            </div>
        </form>               
</div>

<?php
                  
if(isset($_POST['signin'])){

    $Employee = $_SESSION['F_name'];
    $get_Employee = "select * from employee where F_name='$Employee'";
    $run_Employee = mysqli_query($link, $get_Employee);
    $row = mysqli_fetch_array($run_Employee);

    $Employee_id = $row['Employee_id'];

     if(isset($_POST['Password']) && !empty($_POST['Password'])){
         $Password = md5($_POST['Password']);
                                              }  

    if(isset($_POST['Cpassword']) && !empty($_POST['Cpassword'])){
         $Cpassword = md5($_POST['Cpassword']);
                                              }  

    if($Password == $Cpassword){
        if(strlen($Password) >= 6 && strlen($Password) <= 60){
            $update = "update employee set Password='$Password' where Employee_id='$Employee_id'";
            $run = mysqli_query($link, $update);
            echo"<script>alert('Your Password is changed a moment ago')</script>";

            echo"<script>window.open('Dashboard1.php','_self')</script>";
        }
        else{
            echo"<script>alert('Your Password should be greater than 6 words')</script>";
            }
        }
        else{
            echo"<script>alert('Your Password did not match')</script>";
            echo"<script>window.open('employee_change_password.php', '_self')</script>";
    }
    }
?>
          
</html>