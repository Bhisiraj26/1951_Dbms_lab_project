<?php 
include('header1.php'); 
include("config.php");
?>

<head>
  <link rel="stylesheet" type="text/css" href="../css/style6.css">
</head>
  
<div id="container">
           
            <?php

                if(isset($_GET['Notice_id']))
                {
                    $Notice_id = $_GET['Notice_id'];
                    $sql = "SELECT * FROM notice WHERE Notice_id=".$Notice_id;

                      $result = $link->query($sql);
                      if($result->num_rows>0)
                        {
                                while($row = mysqli_fetch_assoc($result))
                                {
                                     echo '<div class="card"  style="color: black;">
                                    <center><div class="card-header">
                                            '.$row["Title"].'
                                            </div></center>
                                    <div class="card-body">
                                        <p class="card-text">'.$row["Content"].'</p>
                            <a href="view_notice.php" class="btn btn-primary">Back</a>
                            </div>
                            </div>';
                                }
                        }
                        else
                        {
                            echo '<div class="alert alert-danger" role="alert">
                                    <strong>Invalid ID! </strong> No Record Found.
                                    </div>';
                        }
                   
                }
                else
                {
                   echo '<div class="alert alert-danger" role="alert">
                                    <strong>Invalid ID! </strong> No Record Found.
                                    </div>';
                }

            ?>

        <!-- This DIV will Display TinyMCE Content. -->
	

</div>


<?php
 include('footer.php'); 
 ?>