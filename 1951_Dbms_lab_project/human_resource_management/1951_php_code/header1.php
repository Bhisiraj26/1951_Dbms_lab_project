<?php
include("config.php");
?>

<!DOCTYPE html>

<html lang="en">

<head>
     <?php 
        session_start();
        if(isset($_SESSION['F_name']) && !empty($_SESSION['F_name'])){
            $F_name_session = $_SESSION['F_name'];
        } else {
            header('Location: http://localhost/human_resource_management/1951_php_code/index.php');
        }
    ?>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Human Resource management</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/css/demo.css" rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-image="assets/img/sidebar-5.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="http://www.creative-tim.com" class="simple-text">
                        Human Reosurce Management
                    </a>
                </div>
                <ul class="nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="dashboard.php">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="./leave.php">
                            <i class="nc-icon nc-notes"></i>
                            <p>Take Leave</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="./employee_notice.php">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>View Notice</p>
                        </a>
                    </li>
                     <li>
                        <a class="nav-link" href="./payroll1.php">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Net Pay</p>
                        </a>
                    </li>
                    <!-- <li>
                        <a class="nav-link" href="./attend.php">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>Attendence</p>
                        </a>
                    </li> -->
                    <!-- <li>
                        <a class="nav-link" href="./view_employee.php">
                            <i class="nc-icon nc-notes"></i>
                            <p>View Employees</p>
                        </a>
                    </li> -->
                    
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#pablo"> Employee Dashboard </a>

                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                     <div class="container-fluid"><center><a class="navbar-brand" id="date" href="#pablo" style="font-weight: bold;font-size: 100%;"></a></center></div>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="nav navbar-nav mr-auto">
                            <?php
                                $Employee = $_SESSION['F_name'];
                                $get_Employee = "SELECT * FROM employee where F_name='$Employee'";
                                $run_Employee = mysqli_query($link,$get_Employee);
                                $row = mysqli_fetch_array($run_Employee);

                                $Employee_id = $row['Employee_id'];
                                $F_name = $row['F_name'];
                                $L_name = $row['L_name'];
                                $Address = $row['Address'];
                                $Contact_no = $row['Contact_no'];
                                $Age = $row['Age'];
                                $Gender = $row['Gender'];
                                $Department = $row['Department'];
                                $Designation = $row['Designation'];
                                $Email = $row['Email'];
                                $Salary = $row['Salary'];
                                $Password = $row['Password'];
                                $Deduction = $row['Deduction'];
                                $Advance = $row['Advance'];
                                $Overtime = $row['Overtime'];
                                $Bonus = $row['Bonus'];
                                $Employee_image = $row['Employee_image'];
                                $Employee_cover = $row['Employee_cover'];
                                ?>
                        </ul>
                        <a class="navbar-brand" id="time" style="font-weight: bold;font-size: 100%;font-family:'digital-clock-font';" href="#pablo"></a>
                      
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="ti-user" href='employee_profile.php?<?php echo "E_id=$Employee_id" ?>'><?php echo" $F_name"; ?>  
                                </a>
                            </li>
                                    <?php
                                    echo"
                                    <li><a href='#'></a>
                                    <ul class='dropdown'>
                                    <li>
                                    <a href='logout1.php'>Logout</a>
                                    </li>
                                    </ul>
                                    </li>
                                    ";
                                    ?>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
           