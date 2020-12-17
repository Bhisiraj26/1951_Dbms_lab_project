<?php
include("header1.php");
?>


<?php
  $query  = "SELECT * from overtime";
  $result = $link->query($query);
  while($row=mysqli_fetch_assoc($result))
  {
    @$rate           = $row['rate'];
  }

?>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
                                    <h4 class="card-title">Payroll</h4>
                                    <p class="pull-right">Overtime rate per hour: <big><b><?php echo $rate; ?>.00</b></big></p><br>
                                </div>
                                <table class="table table-hover table-striped">
                                        <thead>
                                            <th><p align="center">Name</p></th>
                                            <th><p align="center">Deduction (leave)</p></th>
                                            <th><p align="center">Advance Taken</p></th>
                                            <th><p align="center">Overtime</p></th>
                                            <th><p align="center">Bonus</p></th>
                                            <th><p align="center">Net Pay</p></th>
                                        </thead>
                                        <tbody>
                                         <tbody>
                        <?php
                          $query  = "SELECT * from overtime";
                          $result = $link->query($query);
                          while($row=mysqli_fetch_assoc($result))
                          {
                            $rate   = $row['rate'];
                          }

                          $query  = "SELECT Salary from employee";
                          $result = $link->query($query);
                          while($row=mysqli_fetch_assoc($result))
                          {
                            $Salary   = $row['Salary'];
                          }

                          $query  = "SELECT * from employee where Employee_id='$Employee_id'";
                          $result = $link->query($query);
                          while($row=mysqli_fetch_assoc($result))
                          {
                            $F_name           = $row['F_name'];
                            $L_name           = $row['L_name'];
                            $Salary       = $row['Salary'];
                            $Deduction       = $row['Deduction'];
                            $Advance       = $row['Advance'];
                            $Overtime        = $row['Overtime'];
                            $Bonus           = $row['Bonus'];

                            $Over     = $row['Overtime'] * $rate;
                            $Bonus     = $row['Bonus'];
                            $Deduction  = $row['Deduction'];
                            $Income   = $Over + $Bonus + $Salary;
                           $Netpay   = $Income - $Deduction - $Advance;
                        ?>
                        <tr>
                          <td align="center"><?php echo $F_name?> <?php echo $L_name?></td>
                          <td align="center"><big><b><?php echo $Deduction?></b></big>.00</td>
                          <td align="center"><big><b><?php echo $Advance?></b></big>.00</td>
                          <td align="center"><big><b><?php echo $Overtime?></b></big> hrs</td>
                          <td align="center"><big><b><?php echo $Bonus?></b></big>.00</td>
                          <td align="center"><big><b><?php echo $Netpay?></b></big>.00</td>
                        </tr>
                        <?php } ?>
                      </tbody>
                                        </tbody>
                                    </table>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
                       
           
<?php
include("footer.php");
?>
