<?php
include("header.php");
include("config.php");
?>

<?php

if(isset($_GET['update_id']))
  {
    $Leave_id = $_GET['update_id'];
     $sql = "UPDATE leaves SET Status='Approved' WHERE Leave_id=".$Leave_id;

    
        if($link->query($sql) == TRUE) 
        {
          $Success = '<div class="alert alert-success" role="alert">
                leave Approved.
               </div>';
        }
        else
        {
            $Error = '<div class="alert alert-danger" role="alert">
               <strong>Error !</strong> Failed To update Department.
               </div>';
        }
  }
?>


<?php

if(isset($_GET['updat_id']))
  {
    $Leave_id = $_GET['updat_id'];
     $sql = "UPDATE leaves SET Status='Rejected' WHERE Leave_id=".$Leave_id;

    
        if($link->query($sql) == TRUE) 
        {
          $Success1 = '<div class="alert alert-success" role="alert">
                leave Rejected.
               </div>';
        }
        else
        {
            $Error = '<div class="alert alert-danger" role="alert">
               <strong>Error !</strong> Failed To update Department.
               </div>';
        }
  }
?>
  <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
              <div class="card strpied-tabled-with-hover">
                  <div class="card-header ">
                    <h4 class="card-title"><a href="add_leave.php">Add Leave</a> </h4>
                     <?php if(isset($Success)) echo $Success; ?> 
                     <?php if(isset($Success1)) echo $Success1; ?>
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
                                            <th>Department</th>
                                            <th>Leave From</th>
                                            <th>Leave To</th>
                                            <th>Leave Description</th>
                                            <th>Status</th>
                                        </thead>
                                        <tbody>
                                        <?php

          $sql = "SELECT * FROM leaves";
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
                <td><a href="view_leaves.php?update_id='.$row["Leave_id"].'" class="btn btn-primary">Accept?</a></td>
                <td><a href="view_leaves.php?updat_id='.$row["Leave_id"].'" class="btn btn-danger">Reject?</a></td>
                    </tr>

                      ';


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