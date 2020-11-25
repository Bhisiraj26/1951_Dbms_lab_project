<?php
include("header1.php");
include("config.php");

	if(isset($_GET['update_id']))
	{
		$Leave_id = $_GET['update_id'];
		
		$sql = "SELECT * FROM leaves WHERE Leave_id=".$Leave_id;

                      $result = $link->query($sql);
                      if($result->num_rows>0)
                        {
                                while($row = mysqli_fetch_assoc($result))
                                {
                                	$Leave_from = $row['Leave_from'];
                                	$Leave_to = $row['Leave_to'];
                                	$Description = $row['Description'];
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
		if (isset($_POST['Leave_from']) && !empty($_POST['Leave_from']))
		{
			$Leave_from = $_POST['Leave_from'];
		}
		else
		{
			$LeaveError = '<div class="alert alert-danger" role="alert">
						   <strong>Error!</strong> Please Enter the Department Name.
						   </div>';
		}


		if (isset($_POST['Leave_to']) && !empty($_POST['Leave_to']))
		{
			$Leave_to = $_POST['Leave_to'];
		}
		else
		{
			$toError = '<div class="alert alert-danger" role="alert">
						   <strong>Error!</strong> Please Enter Contact no.
						   </div>';
		}

		if (isset($_POST['Description']) && !empty($_POST['Description']))
		{
			$Description = $_POST['Description'];
		}
		else
		{
			$DescriptionError = '<div class="alert alert-danger" role="alert">
						   <strong>Error!</strong> Please Enter Address.
						   </div>';
		}

		if(isset($Leave_from) && !empty($Leave_from))
		{
			if(isset($Leave_to)  && !empty($Leave_to))
			{

				if(isset($Description)  && !empty($Description))
				{

				$Leave_id = $_POST['upda_id'];
				$sql = "UPDATE leaves SET Leave_from='$Leave_from', Leave_to='$Leave_to', Description='$Description'  WHERE Leave_id=".$Leave_id;

				if($link->query($sql) == TRUE) 
				{
					$Success = '<div class="alert alert-success" role="alert">
						   <strong>Successfull</strong> leave Updated Successfully.
						   </div>';
				}
				else
				{
						$Error = '<div class="alert alert-danger" role="alert">
						   <strong>Error !</strong> Failed To update Department.
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
                                    <h4 class="card-title">Edit Leave Details</h4>
                                </div>
                                <div class="card-body">
                                    <form action="" method="post" class="formclass">
                                    <center><div id="success"></div></center>
                                    <?php if(isset($Success)) echo $Success; ?> 
                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label style="color: black">Leave From </label>
                                                    <input type="text" class="form-control" name="Leave_from" id="Leave_from" placeholder="Leave From Name " value="<?php if(isset($Leave_from)) echo $Leave_from; ?>">
                                                </div>
                                                <?php if(isset($LeaveError)) echo $LeaveError; ?> 
                                            </div>
                                           
                                            <div class="col-md-6 pr-1">
                                                 <div class="form-group">
                                                    <label style="color: black">Leave To</label>
                                                    <input type="text" class="form-control" placeholder="Leave To" name="Leave_to" id="Leave_to" value="<?php if(isset($Leave_to)) echo $Leave_to; ?>">
                                                </div>
                                                <?php if(isset($toError)) echo $toError; ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 pr-1">
                                                <div class="form-group">
                                                    <label style="color: black">Description</label>
                                                    <textarea type="text" class="form-control" placeholder="Description" name="Description" id="Description"><?php if(isset($Description)) echo $Description; ?></textarea>
                                                </div>
                                                 <?php if(isset($DescriptionError)) echo $DescriptionError; ?>
                                            </div>
                                        </div>
                                        
                                        <!-- <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label style="color: black">Email </label>
                                                    <input type="text" class="form-control" name="Email" id="Email" placeholder="Email">
                                                </div>
                                            </div>
                                        </div> -->
                                       	<input type="hidden" name="upda_id" value="<?php if(isset($Leave_id)) echo $Leave_id; ?>">
		
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
include('footer.php');
?>