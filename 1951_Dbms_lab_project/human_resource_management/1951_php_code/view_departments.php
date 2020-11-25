<?php 
include("header.php");
include("config.php");
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header ">
                    <h4 class="card-title">View Departments</h4>
                    <p class="card-category">Enter the department below to search the Employee</p>
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
      $Department_id = $_POST['h_Id'];
      $sql = "DELETE FROM department WHERE Department_id =".$Department_id;

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
                                            <th>Department Name</th>
                                            <th>Contact no</th>
                                            <th>Address</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </thead>
                                        <tbody>
                                        <?php

          $sql = "SELECT * FROM department";
          $result = $link->query($sql);
          if($result->num_rows>0)
          {

            while($row = mysqli_fetch_assoc($result))
            {
              echo '<tr>
                <td>'.$row["Department_id"].'</td>
                <td>'.$row["Dname"].'</td>
                <td>'.$row["Contact_no"].'</td>
                <td>'.$row["Address"].'</td>
                <td><a href="update_department.php?update_id='.$row["Department_id"].'" class="btn btn-primary">Edit</a></td>
                <td><a href="view_departments.php?delete_id='.$row["Department_id"].'" class="btn btn-danger">Delete </a></td>
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