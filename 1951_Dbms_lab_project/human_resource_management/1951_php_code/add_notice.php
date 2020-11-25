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

                    $sql = "INSERT INTO notice(Title,Dname,Content) VALUES('$Title','$Dname','$Content')";

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
                                    <h4 class="card-title">Add Notice</h4>
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
                                                    <select class="form-control" name="Dname" id="Dname" type="text">
                                                    <option value="">Select</option>
                                                    <?php 
                                                     if ($result->num_rows > 0) {
                                                     while($row = $result->fetch_assoc()) {
                                                    ?>
                                                    <option value="<?php echo $row['Dname']; ?>"><?php echo $row['Dname']; ?></option>
                                                    <?php } } ?>
                                                    </select>
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
                                        <center><button class="btn btn-primary" name="submit" type="submit">Submit</button>
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