<?php
include("header.php");
?>
<?php
include("config.php");
$sql = "SELECT * FROM department";
$result = $link->query($sql);
?>

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Add Employee</h4>
                                </div>
                                <div class="card-body">
                                   <form action="" method="post" class="formclass">
                                    <center><div id="success"></div></center>
                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label style="color: black">First Name </label>
                                                    <input type="text" class="form-control" name="F_name" id="F_name" placeholder="First Name">
                                                </div>
                                            </div>
                                           
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label style="color: black">Last Name </label>
                                                    <input type="text" class="form-control" name="L_name" id="L_name" placeholder="Last Name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 pr-1">
                                                <div class="form-group">
                                                    <label style="color: black">Address</label>
                                                    <textarea type="text" class="form-control" placeholder="Address" name="Address" id="Address"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 pr-1" style="color: black">
                                                <div class="form-group">
                                                    <label style="color: black">Contact no</label>
                                                    <input type="text" class="form-control" placeholder="Phone No" name="Contact_no" id="Contact_no">
                                                </div>
                                            </div>
                                            <div class="col-md-4 px-1">
                                                <div class="form-group">
                                                    <label style="color: black">Age</label>
                                                    <input type="text" class="form-control" placeholder="Age" name="Age" id="Age">
                                                </div>
                                            </div>
                                            <div class="col-md-4 pl-1">
                                                <div class="form-group">
                                                    <label style="color: black">Gender</label>
                                                    <select class="form-control" name="Gender" id="Gender" type="text">
                                                        <option Enabled>Select your gender</option>
                                                        <option>Male</option>
                                                        <option>Female</option>
                                                        <option>Others</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                           <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label style="color: black">Department</label>
                                                    <select class="form-control" name="Department" id="Department" type="text">
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
                                           
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label style="color: black">Designation</label>
                                                    <select class="form-control" name="Designation" id="Designation" type="text">
                                                        <option Enabled>Select your Designation</option>
                                                        <option>Manager</option>
                                                        <option>junior Clerk</option>
                                                        <option>Others</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label style="color: black">Email </label>
                                                    <input type="text" class="form-control" name="Email" id="Email" placeholder="Email">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4 pr-1" style="color: black">
                                                <div class="form-group">
                                                    <label style="color: black">Salary</label>
                                                    <input type="text" class="form-control" placeholder="Salary" name="Salary" id="Salary">
                                                </div>
                                            </div>
                                            <div class="col-md-4 px-1">
                                                <div class="form-group">
                                                    <label style="color: black">Password</label>
                                                    <input type="password" class="form-control" placeholder="Password" name="Password" id="Password">
                                                </div>
                                            </div>
                                            <div class="col-md-4 px-1">
                                                <div class="form-group">
                                                    <label style="color: black">Confirm Password</label>
                                                    <input type="password" class="form-control" placeholder="Confirm Password" name="Cpassword" id="Cpassword">
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <center><input type="button" name="sign_up" id="sign_up" class="btn btn-primary" value="Submit" style="background-color: lightblue;" style="color: white;">
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
    var F_name = $('#F_name').val();
    var letter =/^[A-Za-z]+$/;
    var L_name = $('#L_name').val();
    var letters =/^[A-Za-z]+$/;
    var Address = $('#Address').val();
    var Contact_no = $('#Contact_no').val();
    var phone =/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
    var Age = $('#Age').val();
    var Gender = $('#Gender').val();
    var Department = $('#Department').val();
    var Designation = $('#Designation').val();
    var Email = $('#Email').val();
    var regEx = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
    var Salary = $('#Salary').val();
    var Password = $('#Password').val();
    var pass=/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/;
    var Cpassword = $('#Cpassword').val();
                                                        
    if((letter.test(F_name)))
    {
        if((letters.test(L_name)))
        {
            if(Address != '')
            {
                if(phone.test(Contact_no))
                {
                    if(Age != '')
                    {
                        if(Gender != '')
                        { 
                            if(Department != '')
                            {
                                if(Designation != '')
                                {
                                    if(regEx.test(Email))
                                    {   
                                        if(Salary != '')
                                        {
                                            if(pass.test(Password))
                                            {
                                                if(Cpassword != '')
                                                {
                                                    if(Password == Cpassword)
                                                    {
                                                    var url = "http://localhost/human_resource_management/1951_php_code/employee_insert.php";
                                                    $.ajax(
                                                    {
                                                        type: "POST",
                                                        url: url,
                                                        data: { F_name: F_name, L_name : L_name, Address : Address,Contact_no : Contact_no, Age : Age,Gender : Gender, Department : Department, Designation : Designation, Email : Email, Salary : Salary, Password : Password },
                                                            success: function(data)
                                                            {
                                                                if(data == 1)
                                                                {
                                                                    $('#success').html("Employee registered successfully");
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
                                                        $('#success').html('Password should be same');
                                                    }

                                                }
                                                else
                                                {
                                                    $('#success').html('Confirm Password cannot be empty');
                                                 }                                

                                            }
                                            else
                                            {
                                                $('#success').html('Password must be at least  8 character and must contain 1 capital letter, 1 small letter, 1 number');
                                            }

                                        }
                                        else
                                        {
                                            $('#success').html('Please Enter the Salary');
                                        }

                                    }
                                    else
                                    {
                                        $('#success').html('Please Enter valid Email id');
                                    }

                                }
                                else
                                {
                                    $('#success').html('Please Enter the Designation');
                                }   

                            }
                            else
                            {
                                $('#success').html('Please Enter the Department');
                            }    
                        
                        }
                        else
                        {
                            $('#success').html('Gender Cannot Be Empty');
                        }
                                        
                    }
                    else
                    {
                        $('#success').html('Enter the Age');
                    }

                }
                else
                {
                    $('#success').html('Enter 10 Digit Number Or Phone No Cannot Be Empty');
                }

            }
            else
            {
                $('#success').html('Address Cannot Be Empty');
            }

        }
        else
        {
            $('#success').html('Enter Only Letters Or Last Name Cannot Be Empty');
        } 
                                
    }
    else
    {
        $('#success').html('Enter Only Letters Or First Name Cannot Be Empty');
    }
});
</script>

<?php
include("footer.php");
?>