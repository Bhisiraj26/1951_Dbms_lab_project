<?php
include("header1.php");
?>

<?php
include("config.php");
$sql = "SELECT * FROM leave_type";
$result = $link->query($sql);
?>


            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Add Leave</h4>
                                </div>
                                <div class="card-body">
                                    <form action="" method="post" class="formclass">
                                    <center><div id="success"></div></center>
                                     <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <input type="hidden" name="Employee_id" id="Employee_id" class="form-control" value="<?php echo $Employee_id; ?>" >
                                                <div class="form-group">
                                                    <label style="color: black">Employee Name </label>
                                                    <input type="text" name="Employee_name" id="Employee_name" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label style="color: black">Leave Type</label>
                                                    <select class="form-control" name="Leave_type" id="Leave_type" type="text">
                                                    <option value="">Select</option>
                                                    <?php 
                                                     if ($result->num_rows > 0) {
                                                     while($row = $result->fetch_assoc()) {
                                                    ?>
                                                    <option value="<?php echo $row['Leave_type']; ?>"><?php echo $row['Leave_type']; ?></option>
                                                    <?php } } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 pr-1">
                                                <div class="form-group">
                                                    <label style="color: black">Department</label>
                                                    <input id="Dname" type="text" disabled class="form-control" placeholder="Department Name" name="Dname" required="required" value="<?php echo $Department; ?>">
                                                </div>
                                            </div>
                                        </div>


                                     <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label style="color: black">Leave From </label>
                                                    <input type="date" name="Leave_from" id="Leave_from" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label style="color: black">Leave To </label>
                                                    <input type="date" name="Leave_to" id="Leave_to" class="form-control">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-12 pr-1">
                                                <div class="form-group">
                                                    <label style="color: black">Description</label>
                                                    <textarea type="text" class="form-control" placeholder="Description" name="Description" id="Description"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <center><input type="button" name="sign_up" id="sign_up" class="btn-primary" value="Submit" style="background-color: lightblue;">
                                        </center>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        


                    </div>
                </div>
            </div>

            <script src="http://localhost/human_resource_management/js/jquery-1.11.3.min.js"></script>
            <script type="text/javascript">
                // var email = $('#email').val();
                  $('.btn-primary').click(function(){
                    var Employee_id = $('#Employee_id').val();
                    var Employee_name = $('#Employee_name').val();
                    var Leave_type = $('#Leave_type').val();
                    var Dname = $('#Dname').val();
                    var Leave_from = $('#Leave_from').val();
                    var Leave_to = $('#Leave_to').val();
                    var Description = $('#Description').val();

                                                        
                   if(Employee_id != '')
                   {
                    if(Employee_name != '')
                    {  
                     if(Leave_type != '')
                    {                        
                     if(Dname != '')
                        {                                      
                        if(Leave_from != '')
                        {                         
                            if(Leave_to != '')
                            {
                                if(Description != '')
                                {               
                                    var url = "http://localhost/human_resource_management/1951_php_code/insert_leave.php";
                                $.ajax(
                                {
                                    type: "POST",
                                    url: url,
                                    data: { Employee_id: Employee_id, Employee_name: Employee_name, Leave_type: Leave_type, Dname : Dname,Leave_from : Leave_from, Leave_to : Leave_to, Description: Description },
                                    success: function(data)
                                    {
                                        if(data == 1)
                                        {
                                            $('#success').html("Leave Submitted successfully");
                                        }
                                        else if(data == 2)
                                        {
                                            $('#success').html('error occured');
                                        }
                                    }
                                })
                                }
                                else
                                {
                                    $('#success').html('Description Cannot Be Empty');
                                }
                            }
                            else
                            {
                                $('#success').html('Leave To Cannot Be Empty');
                            }                                

                        }
                        else
                        {
                            $('#success').html('Leave From Cannot Be Empty');
                        }

                        }
                    else
                    {
                        $('#success').html('Department Name Cannot Be Empty');
                    }

                     }
                    else
                    {
                        $('#success').html('Leave Type Cannot Be Empty');
                    }

                    }
                    else
                    {
                        $('#success').html('Employee Name Cannot Be Empty');
                    }

                    }
                    else
                    {
                        $('#success').html('Employee Cannot Be Empty');
                    }
                           
            });
            </script>

<?php
include("footer.php");
?>