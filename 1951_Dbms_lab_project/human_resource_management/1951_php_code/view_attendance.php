<?php 
include("header.php");
include("config.php");
?>

<div class="panel panel-default container">

  <div class="panel-heading">

    <h4 style="text-align: center;">Attendance Management</h1>

  </div>

<div class="panel-body">

  <a href="view_a.php" class="btn btn-primary">View</a>
 <!--  <a href="#" class="btn btn-primary pull-right">add</a> -->
<form method="post">
<table class="table">
  
  <thead>
    <tr>
      <th>Name</th>
      <th>Department</th>
      <th>Contact No</th>
      <th>Attendance</th>
    </tr>

  </thead>

  <tbody>

<?php
$query="select * from employee";
$result=$link->query($query);
while($show=$result->fetch_assoc()){
?>

    <tr>
      <td><?php echo $show['F_name']; ?></td>
     <td><?php echo $show['Department']; ?></td>
     <td><?php echo $show['Contact_no']; ?></td>
      <td>
        
       Present <input required type="radio" name="attendance[<?php echo $show['Employee_id']; ?>]" value="Present"> Absent <input required name="attendance[<?php echo $show['Employee_id']; ?>]" type="radio" value="Absent">

      </td>
    </tr>
<?php } ?>
  </tbody>



</table>
<input class="btn btn-primary" type="submit" value="Take Attendance">
</form>


<?php

  if($_SERVER['REQUEST_METHOD']=='POST'){
    $att=$_POST['attendance'];
    $date=date('d-m-y');

    $query="select distinct date from attendance";
    $result=$link->query($query);
    $b=false;
    if($result->num_rows>0){
    while($check=$result->fetch_assoc()){

      if($date==$check['date']){
      $b=true;
      echo "<div class='alert alert-danger'>
            Attedance already taken today!!
            </div>";
      }
      }
    }

    if(!$b){
      foreach ($att as $key => $value) {
        if($value=="Present"){
          $query="insert into attendance(value,employee_id,date) values('Present',$key,'$date')";
          $insertResult=$link->query($query);
        }
        else{
           $query="insert into attendance(value,employee_id,date) values('Absent',$key,'$date')";
          $insertResult=$link->query($query);
        }
      }

      if($insertResult){
        echo "<div class='alert alert-success
        '>
            Attedance taken successfully!!
            </div>";
      }


    }



  }


?>

  </div>




<div class="panel-footer">

  </div>



</div>
                       
<?php
include("footer.php");
?>