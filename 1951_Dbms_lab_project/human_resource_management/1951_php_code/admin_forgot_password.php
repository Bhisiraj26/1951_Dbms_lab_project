<!DOCTYPE html>
<?php
session_start();
include("config.php");


?>
<html lang="en"> 
<meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />

 <head>
 <title>Forgot Password</title>
   <meta charset="utf-8">
       
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="Blood Donation - Activism & Campaign HTML5 Template">
        <meta name="author" content="xenioushk">
        <link rel='stylesheet' href='http://codepen.io/assets/libs/fullpage/jquery-ui.css'>
        <link rel="stylesheet" href="../assets/css/fstyle3.css" media="screen" type="text/css" />      
        
  </head>

    <body> 
    <div class="forgot-form">  
    <h3><center>Forgot Password</center></h3>
    <form action="" method="post">
    <center><div id = "successmsg"></div></center>
    <input  id="Email" type="text" class="form-control" name="Email" placeholder="Enter your Email" required>
    <hr>
    <p class="text">Enter your Last name down below?</p>
    <input  id="L_name" type="text" class="form-control" placeholder="Last Name" name="L_name" required>
    <center><br>
    <button id="signin" name="signin" class="btnclass" name="signin">Submit</button>
    </center><br>

    <div class="forgot-f1">
     <a style="text-decoration: none;float: right;color: #187FAB;" data-toggle="tooltip" title="signin.php" href="admin_login.php">Back to log in?</a><br>
 </div>
    </form>
                 
                 <?php
                        
   
                include("config.php");

                if(isset($_POST['signin'])) {
                    $Email = htmlentities(mysqli_real_escape_string($link, $_POST['Email']));
                    $L_name = htmlentities(mysqli_real_escape_string($link, $_POST['L_name']));

                    $select_user = "SELECT * FROM admin where Email='$Email' AND L_name ='$L_name'";
                    $query = mysqli_query($link, $select_user);
                    $check_user = mysqli_num_rows($query);

                    if($check_user == 1){
                        $_SESSION['Email'] = $Email;
                    echo "<script>window.open('http://localhost/human_resource_management/1951_php_code/admin_change_password.php','_self')</script>";
                    }else{
                        echo"<script>alert('Your First Name or Last Name is incorrect')</script>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>

</html>