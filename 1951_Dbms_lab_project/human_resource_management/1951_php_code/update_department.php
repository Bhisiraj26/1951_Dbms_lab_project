<?php
include("header.php");
include("config.php");

	if(isset($_GET['update_id']))
	{
		$Department_id = $_GET['update_id'];
		
		$sql = "SELECT * FROM department WHERE Department_id=".$Department_id;

                      $result = $link->query($sql);
                      if($result->num_rows>0)
                        {
                                while($row = mysqli_fetch_assoc($result))
                                {
                                	$Dname = $row['Dname'];
                                	$Contact_no = $row['Contact_no'];
                                	$Address = $row['Address'];
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
		if (isset($_POST['Dname']) && !empty($_POST['Dname']))
		{
			$Dname = $_POST['Dname'];
		}
		else
		{
			$titleError = '<div class="alert alert-danger" role="alert">
						   <strong>Error!</strong> Please Enter the Department Name.
						   </div>';
		}


		if (isset($_POST['Contact_no']) && !empty($_POST['Contact_no']))
		{
			$Contact_no = $_POST['Contact_no'];
		}
		else
		{
			$contentError = '<div class="alert alert-danger" role="alert">
						   <strong>Error!</strong> Please Enter Contact no.
						   </div>';
		}

		if (isset($_POST['Address']) && !empty($_POST['Address']))
		{
			$Address = $_POST['Address'];
		}
		else
		{
			$addressError = '<div class="alert alert-danger" role="alert">
						   <strong>Error!</strong> Please Enter Address.
						   </div>';
		}

		if(isset($Dname) && !empty($Dname))
		{
			if(isset($Contact_no)  && !empty($Contact_no))
			{

				if(isset($Address)  && !empty($Address))
				{

				$Department_id = $_POST['upda_id'];
				$sql = "UPDATE department SET Dname='$Dname', Contact_no='$Contact_no', Address='$Address'  WHERE Department_id=".$Department_id;

				if($link->query($sql) == TRUE) 
				{
					$Success = '<div class="alert alert-success" role="alert">
						   <strong>Successfull</strong> Department Updated Successfully.
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
                                    <h4 class="card-title">Edit Department Details</h4>
                                </div>
                                <div class="card-body">
                                    <form action="" method="post" class="formclass">
                                    <center><div id="success"></div></center>
                                    <?php if(isset($Success)) echo $Success; ?> 
                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label style="color: black">Department Name </label>
                                                    <input type="text" class="form-control" name="Dname" id="Dname" placeholder="Department Name " value="<?php if(isset($Dname)) echo $Dname; ?>">
                                                </div>
                                                <?php if(isset($titleError)) echo $titleError; ?> 
                                            </div>
                                           
                                            <div class="col-md-6 pr-1">
                                                 <div class="form-group">
                                                    <label style="color: black">Contact no</label>
                                                    <input type="text" class="form-control" placeholder="Phone No" name="Contact_no" id="Contact_no" value="<?php if(isset($Contact_no)) echo $Contact_no; ?>">
                                                </div>
                                                <?php if(isset($contentError)) echo $contentError; ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 pr-1">
                                                <div class="form-group">
                                                    <label style="color: black">Address</label>
                                                    <textarea type="text" class="form-control" placeholder="Address" name="Address" id="Address"><?php if(isset($Address)) echo $Address; ?></textarea>
                                                </div>
                                                 <?php if(isset($addressError)) echo $addressError; ?>
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
                                       	<input type="hidden" name="upda_id" value="<?php if(isset($Department_id)) echo $Department_id; ?>">
		
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
