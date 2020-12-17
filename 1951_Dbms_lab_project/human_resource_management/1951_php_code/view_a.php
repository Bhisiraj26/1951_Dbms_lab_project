<?php 
include("header.php");
include("config.php");
?>

<div class="panel panel-default container">

  <div class="panel-heading">

    <h4 style="text-align: center;">Attendance Management</h1>

  </div>

<div class="panel-body">

  <a href="#" class="btn btn-primary">View</a>
 <!--  <a href="#" class="btn btn-primary pull-right">add</a> -->
<form method="post">
<table class="table">
  
  <thead>
    <tr>
      <th>Sr No.</th>
      <th>Date</th>
      <th>View</th>
    </tr>

  </thead>

  <?php

    $query="select distinct date from attendance";
    $result=$link->query($query);

    if($result->num_rows>0){
      $i=0;
      while($val=$result->fetch_assoc()) {
        $i++;
   
  ?>

  <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $val['date']; ?></td>
    <td><a href="viewp.php?date=<?php echo $val['date'] ?>" class="btn btn-primary">View</a></td>
  </tr>


<?php }} ?>

  </div>


</table>

<div class="panel-footer">

  </div>



</div>
                       
<?php
include("footer.php");
?>