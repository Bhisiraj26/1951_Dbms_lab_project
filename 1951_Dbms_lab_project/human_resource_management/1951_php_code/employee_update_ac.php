<?php
include("header.php");
include("config.php");
?>

<?php
include("config.php");

	if(isset($_GET['Employee_id']))
	{
		$Employee_id = $_GET['Employee_id'];
		
		$sql = "SELECT * FROM employee WHERE Employee_id=".$Employee_id;

                      $result = $link->query($sql);
                      if($result->num_rows>0)
                        {
                                while($row = mysqli_fetch_assoc($result))
                                {
                                	$Deduction = $row['Deduction'];
                                  $Advance = $row['Advance'];
                                	$Overtime = $row['Overtime'];
                                	$Bonus = $row['Bonus'];
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
		if (isset($_POST['Deduction']) && !empty($_POST['Deduction']))
		{
			$Deduction = $_POST['Deduction'];
		}
		else
		{
			$titleError = '<div class="alert alert-danger" role="alert">
						   <strong>Error!</strong> Please Enter the Deduction.
						   </div>';
		}


    if (isset($_POST['Advance']) && !empty($_POST['Advance']))
    {
      $Advance = $_POST['Advance'];
    }
    else
    {
      $AdvanceError = '<div class="alert alert-danger" role="alert">
               <strong>Error!</strong> Please Enter the Advance.
               </div>';
    }


		if (isset($_POST['Overtime']) && !empty($_POST['Overtime']))
		{
			$Overtime = $_POST['Overtime'];
		}
		else
		{
			$contentError = '<div class="alert alert-danger" role="alert">
						   <strong>Error!</strong> Please Enter Overtime.
						   </div>';
		}

		if (isset($_POST['Bonus']) && !empty($_POST['Bonus']))
		{
			$Bonus = $_POST['Bonus'];
		}
		else
		{
			$addressError = '<div class="alert alert-danger" role="alert">
						   <strong>Error!</strong> Please Enter Address.
						   </div>';
		}

		if(isset($Deduction) && !empty($Deduction))
		{

    if(isset($Advance) && !empty($Advance))
    {
			if(isset($Overtime)  && !empty($Overtime))
			{

				if(isset($Bonus)  && !empty($Bonus))
				{

				$Employee_id = $_POST['upda_id'];
				$sql = "UPDATE employee SET Deduction='$Deduction', Advance='$Advance', Overtime='$Overtime', Bonus='$Bonus'  WHERE Employee_id=".$Employee_id;

				if($link->query($sql) == TRUE) 
				{
					$Success = '<div class="alert alert-success" role="alert">
						   <strong>Successfull</strong> Updated Successfully.
						   </div>';
				}
				else
				{
						$Error = '<div class="alert alert-danger" role="alert">
						   <strong>Error !</strong> Failed To update.
						   </div>';
				}
				
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
                                    <h4 class="card-title">Employee Details</h4>
                                </div>
                                <div class="card-body">

                                    <form action="" method="post" class="formclass">
                                    <center><div id="success"></div></center>
                                    <?php if(isset($Success)) echo $Success; ?> 
                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label style="color: black">Deduction (Leave Taken) </label>
                                                    <input type="text" class="form-control" placeholder="Deduction" name="Deduction" id="Deduction" value="<?php if(isset($Deduction)) echo $Deduction; ?>">
                                                </div>
                                               
                                            </div>

                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label style="color: black">Advance Taken </label>
                                                    <input type="text" class="form-control" placeholder="Advance" name="Advance" id="Advance" value="<?php if(isset($Advance)) echo $Advance; ?>">
                                                </div>
                                               
                                            </div>
                                        </div>
                                        <div class="row">

                                          <div class="col-md-6 pr-1">
                                                 <div class="form-group">
                                                    <label style="color: black">Overtime</label>
                                                    <input type="text" class="form-control" placeholder="Overtime" name="Overtime" id="Overtime" value="<?php if(isset($Overtime)) echo $Overtime; ?>">
                                                </div>
                                                <?php if(isset($contentError)) echo $contentError; ?>
                                            </div>
                                            
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label style="color: black">Bonus</label>
                                                    <input type="text" class="form-control" placeholder="Bonus" name="Bonus" id="Bonus" value="<?php if(isset($Bonus)) echo $Bonus; ?>">
                                                </div>
                                                 <?php if(isset($addressError)) echo $addressError; ?>
                                            </div>
                                        </div>
                            
                                       	<input type="hidden" name="upda_id" value="<?php if(isset($Employee_id)) echo $Employee_id; ?>">
		
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
