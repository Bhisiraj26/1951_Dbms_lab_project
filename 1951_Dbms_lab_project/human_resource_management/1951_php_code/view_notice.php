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
                    <h4 class="card-title"><a href="add_notice.php">Add Notice</a> </h4>
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
      $Notice_id = $_POST['h_Id'];
      $sql = "DELETE FROM notice WHERE Notice_id =".$Notice_id;

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
    <th>Notice ID</th>
    <th>Title</th>
    <th>Department Name</th>
    <th>View</th>
    <th>Edit</th>
    <th>Delete</th>
                                            
    </thead>
    <tbody>
      <?php

          $sql = "SELECT * FROM notice";
          $result = $link->query($sql);
          if($result->num_rows>0)
          {

            while($row = mysqli_fetch_assoc($result))
            {
              echo '<tr>
                <td>'.$row["Notice_id"].'</td>
                <td>'.$row["Title"].'</td>
                <td>'.$row["Dname"].'</td>
                <td><a href="view_admin_notice.php?Notice_id='.$row["Notice_id"].'" class="btn btn-success">View</a></td>
                <td><a href="update_notice.php?update_id='.$row["Notice_id"].'" class="btn btn-primary">Edit</a></td>
                <td><a href="view_notice.php?delete_id='.$row["Notice_id"].'" class="btn btn-danger">Delete</a></td>
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