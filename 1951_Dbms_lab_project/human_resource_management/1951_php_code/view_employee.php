<?php
include("header.php");
?>

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
                                    <h4 class="card-title">View Employees</h4>
                                    <p class="card-category">Enter the department below to search the Employee</p>
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <form action="" method="POST">
                                    <div class="col-md-6">
                                        <input type="text" name="Department" placeholder="Department" required>
                                        <button type="submit" name="search_by_dname" class="btn btn-primary">Search</button>
                                    </div>
                                      <div class="card-header ">
                    <h6 class="card-title"><a href="deductions_details.php">Display Salary Deductions details</a> </h6>
                  </div>
                                
                                <?php
                                include('config.php');
                                if(isset($_POST['search_by_dname'])) 
                                {
                                    $Department = $_POST["Department"];
                                    $sql = "SELECT * FROM employee WHERE Department='$Department' ";
                                    $result = $link->query($sql);

                                    
                              
                                ?>
                                </form>
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th>ID</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Address</th>
                                            <th>Contact no</th>
                                            <th>Age</th>
                                            <th>Gender</th>
                                            <th>Department</th>
                                            <th>Designation</th>
                                            <th>Account</th>
                                        </thead>
                                        <tbody>
                                        <?php
                                        if(mysqli_num_rows($result) > 0)
                                        {
                                            while($row = mysqli_fetch_array($result))
                                            {
                                        ?>
                                            <tr>
                                                <td><?php echo $row['Employee_id']; ?></td>
                                                <td><?php echo $row['F_name']; ?></td>
                                                <td><?php echo $row['L_name']; ?></td>
                                                <td><?php echo $row['Address']; ?></td>
                                                <td><?php echo $row['Contact_no']; ?></td>
                                                <td><?php echo $row['Age']; ?></td>
                                                <td><?php echo $row['Gender']; ?></td>
                                                <td><?php echo $row['Department']; ?></td>
                                                <td><?php echo $row['Designation']; ?></td>
                                                <td><a class="btn btn-primary" href="employee_update_ac.php?Employee_id=<?php echo $row['Employee_id']; ?>">Edit</a></td>
                                            </tr>
                                            <?php
                                                }
                                            }
                                            else
                                            {
                                                ?>
                                                <tr>
                                                    <td colspan="6">No Records Found</td>
                                                </tr>
                                                <?php
                                                
                                            }
                                            ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                                <?php
                                 }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
                       
           
<?php
include("footer.php");
?>
