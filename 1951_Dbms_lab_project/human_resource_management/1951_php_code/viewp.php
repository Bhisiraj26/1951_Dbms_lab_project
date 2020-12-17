<?php 
include("header.php");
include("config.php");
?>

<div class="panel panel-default container">

  <div class="panel-heading">

    <h4 style="text-align: center;">Attendance Management</h1>

  </div>

<div class="panel-body">

 <!--  <a href="#" class="btn btn-primary">View</a>
  <a href="#" class="btn btn-primary pull-right">add</a> -->
<form method="post">
<table class="table">
  
  <thead>
    <tr>
      <th>Sr No.</th>
      <th>Name</th>
      <th>Department</th>
      <th>Contact No</th>
      <th>Attendance</th>
    </tr>

  </thead>

  <?php

  if($_GET['date']){
    $date=$_GET['date'];

    $query="SELECT employee.*,attendance.* FROM attendance inner join employee on attendance.employee_id=employee.Employee_id and attendance.date='$date'";
    $result=$link->query($query);

    if($result->num_rows>0){
      $i=0;
      while($val=$result->fetch_assoc()) {
        $i++;
   
  ?>

  <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $val['F_name']; ?></td>
    <td><?php echo $val['Department']; ?></td>
    <td><?php echo $val['Contact_no']; ?></td>

    <td>
      Present <input type="radio" 
      value="Present"
      <?php 
      if($val['value']=='Present')
        echo "checked";

      ?>
      >
    
      Absent <input type="radio" 
      value="Absent"
      <?php 
      if($val['value']=='Absent')
        echo "checked";

      ?>
      >

    </td>
  
  </tr>


<?php }} }?>

  </div>


</table>

<div class="panel-footer">

  </div>



</div>
                       
<?php
include("footer.php");
?>