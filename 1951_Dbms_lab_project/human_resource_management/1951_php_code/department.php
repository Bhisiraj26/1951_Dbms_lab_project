<?php
include("header.php");
?>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Add Department</h4>
                                </div>
                                <div class="card-body">
                                    <form action="" method="post" class="formclass">
                                    <center><div id="success"></div></center>
                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label style="color: black">Department Name </label>
                                                    <input type="text" class="form-control" name="Dname" id="Dname" placeholder="Department Name ">
                                                </div>
                                            </div>
                                           
                                            <div class="col-md-6 pr-1">
                                                 <div class="form-group">
                                                    <label style="color: black">Contact no</label>
                                                    <input type="text" class="form-control" placeholder="Phone No" name="Contact_no" id="Contact_no">
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
                                        
                                        <!-- <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label style="color: black">Email </label>
                                                    <input type="text" class="form-control" name="Email" id="Email" placeholder="Email">
                                                </div>
                                            </div>
                                        </div> -->
                                       
                                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <center><input type="button" name="sign_up" id="sign_up" class="btn btn-primary" value="Submit" style="background-color: lightblue;">
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
                    var Dname = $('#Dname').val();
                    var letter =/^[A-Za-z]+$/;
                    var Contact_no = $('#Contact_no').val();
                    var phone =/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
                    var Address = $('#Address').val();

                                                        
                    if((letter.test(Dname)))
                    {
                        if(phone.test(Contact_no))
                        {
                            if(Address != '')
                            {                     
                                var url = "http://localhost/human_resource_management/1951_php_code/department_insert.php";
                                $.ajax(
                                {
                                    type: "POST",
                                    url: url,
                                    data: { Dname: Dname, Contact_no : Contact_no, Address : Address },
                                    success: function(data)
                                    {
                                        if(data == 1)
                                        {
                                            $('#success').html("Department Added successfully");
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
                                $('#success').html('Address Cannot Be Empty');
                            }
                        }
                        else
                        {
                            $('#success').html('Enter 10 Digit Number Or Phone No Cannot Be Empty');
                        }                                

                    }
                    else
                    {
                        $('#success').html('Enter Only Letters Or Department Name Cannot Be Empty');
                    }
                           
            });
            </script>

<?php
include("footer.php");
?>