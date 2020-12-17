<?php
include("header1.php");
include("config.php");
?>

  <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
              <div class="card strpied-tabled-with-hover">
  </form>
  <table class="table table-hover table-striped">
  <thead>
    <th>Notice ID</th>
    <th>Title</th>
    <th>Department Name</th>
    <th>View</th>
                                            
    </thead>
    <tbody>
      <?php
          include ('config.php');
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
                <td><a href="view_employee_notice.php?Notice_id='.$row["Notice_id"].'" class="btn btn-success">View</a></td>
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