<?php
include("header.php");
?>

<?php
include("config.php");
$sql = "SELECT * FROM department";
$result = $link->query($sql);
?>

<?php
include("config.php");

    if(isset($_GET['update_id']))
    {
        $Notice_id = $_GET['update_id'];
        
        $sql = "SELECT * FROM notice WHERE Notice_id=".$Notice_id;

                      $result = $link->query($sql);
                      if($result->num_rows>0)
                        {
                                while($row = mysqli_fetch_assoc($result))
                                {
                                    $Title = $row['Title'];
                                    $Dname = $row['Dname'];
                                    $Content = $row['Content'];
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


    if(isset($_POST['submit']))
    {
        if (isset($_POST['Title']) && !empty($_POST['Title']))
        {
            $Title = $_POST['Title'];
        }
        else
        {
            $titleError = '<div class="alert alert-danger" role="alert">
                           <strong>Error!</strong> Please Enter Title Field.
                           </div>';
        }

        if (isset($_POST['Dname']) && !empty($_POST['Dname']))
        {
            $Dname = $_POST['Dname'];
        }
        else
        {
            $titledname = '<div class="alert alert-danger" role="alert">
                           <strong>Error!</strong> Please Enter Department Field.
                           </div>';
        }


        if (isset($_POST['Content']) && !empty($_POST['Content']))
        {
            $Content = $_POST['Content'];
        }
        else
        {
            $contentError = '<div class="alert alert-danger" role="alert">
                           <strong>Error!</strong> Please Enter Content.
                           </div>';
        }

        if(isset($Title) && !empty($Title))
        {
            if(isset($Dname)  && !empty($Dname))
            {
                if(isset($Content)  && !empty($Content))
                {

                    $Notice_id = $_POST['upda_id'];
                    $sql = "UPDATE notice SET Title='$Title', Dname='$Dname', Content='$Content' WHERE Notice_id=".$Notice_id;

                    if($link->query($sql) == TRUE) 
                    {
                        $Success = '<div class="alert alert-success" role="alert">
                           <strong>Successfull</strong> Notice Added Successfully.
                           </div>';
                    }
                    else
                    {
                        $Error = '<div class="alert alert-danger" role="alert">
                           <strong>Error !</strong> Failed To add Notice.
                           </div>';
                    }
                
                }
            
            }
        }    
    }
?>

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Edit Notice</h4>
                                </div>
                                <div class="card-body">
                                   <form action="" method="post" class="formclass">
                                    <?php if(isset($Success)) echo $Success; ?> 
                                        <div class="row">
                                            <div class="col-md-12 pr-1">
                                                <div class="form-group">
                                                    <?php if(isset($titleError)) echo $titleError; ?> 
                                                    <label style="color: black">Title </label>
                                                    <input type="text" class="form-control" name="Title" id="Title" placeholder="Title" value="<?php if(isset($Title)) echo $Title; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 pr-1">
                                                <div class="form-group">
                                                     <?php if(isset($titledname)) echo $titledname; ?>
                                                    <label style="color: black">Department</label>
                                                    <input type="text" class="form-control" name="Dname" id="Dname" placeholder="Department Name" value="<?php if(isset($Dname)) echo $Dname; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 pr-1">
                                                <div class="form-group">
                                                     <?php if(isset($contentError)) echo $contentError; ?>
                                                    <label style="color: black">Description</label>
                                                    <textarea id="Content" name="Content" cols="60" rows="10"><?php if(isset($Content)) echo $Content; ?></textarea>
                                                </div>
                                            </div> 
                                        </div>
                                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <center><input type="hidden" name="upda_id" value="<?php if(isset($Notice_id)) echo $Notice_id; ?>">
                                        <button class="btn btn-primary" name="submit" type="submit">Submit</button>
                                        </center>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

<?php
include("footer.php");
?>