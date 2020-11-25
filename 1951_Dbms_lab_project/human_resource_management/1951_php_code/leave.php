<?php
include("header1.php");
?>
<?php
include ('config.php');
$sql = "SELECT * FROM employee where Employee_id ='$Employee_id'";
$result = $link->query($sql);
?>

  <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
              <div class="card strpied-tabled-with-hover">
                  <div class="card-header ">
                    <h4 class="card-title"><a href="add_leave.php">Add Leave</a> </h4>
                  </div>
  <?php
  if(isset($_GET['delete_id']))
  {
   echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Are you sure? yo want to delete this record?</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <form target="" method="post">
  <br>
  <input type="hidden" name="h_Id" value="'.$_GET['delete_id'].'">
  <button type="submit" name="delete" class="btn btn-info">Yes</button>
      
  <button type="button" class="btn btn-danger" data-dismiss="alert">
  <span aria-hidden="true">Oops! No </span>
  </button>      
  </form>
</div>';
  }

    if(isset($_POST['h_Id']))
    {
      $Leave_id = $_POST['h_Id'];
      $sql = "DELETE FROM leaves WHERE Leave_id =".$Leave_id;

      if($link->query($sql) == TRUE) 
        {
            echo "Record Deleted Successfully";
        }
        else
        {
            echo "Error! Record not deleted".mysqli_error($link);
        }
    }
  ?>

                                </form>
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th>ID</th>
                                            <th>Employee Name</th>
                                            <th>Department Name</th>
                                            <th>Leave From</th>
                                            <th>Leave To</th>
                                            <th>Leave Description</th>
                                            <th>Status</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </thead>
                                        <tbody>
                                        <?php

          $sql = "SELECT * FROM leaves where Employee_id ='$Employee_id'";
          $result = $link->query($sql);
          if($result->num_rows>0)
          {

            while($row = mysqli_fetch_assoc($result))
            {
              echo '<tr>
                <td>'.$row["Leave_id"].'</td>
                <td>'.$row["Employee_name"].'</td>
                <td>'.$row["Dname"].'</td>
                <td>'.$row["Leave_from"].'</td>
                <td>'.$row["Leave_to"].'</td>
                <td>'.$row["Description"].'</td>
                <td>'.$row["Status"].'</td>
                <td><a href="update_leave.php?update_id='.$row["Leave_id"].'" class="btn btn-primary">Edit</a></td>
                <td><a href="leave.php?delete_id='.$row["Leave_id"].'" class="btn btn-danger">Delete </a></td>
                    </tr>  ';
            }
          }
          else
          {
            echo '<tr><td>No Record Found</td></tr>';
          }



          ?>
                                            
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