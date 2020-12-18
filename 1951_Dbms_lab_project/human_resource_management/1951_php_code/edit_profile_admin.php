<!DOCTYPE html>
<?php
include("header.php");
include("config.php");
?>



<?php 
if(isset($_GET['Admin_id']) && !empty($_GET['Admin_id'])){
	$Admin_id = $_GET['Admin_id'];
}
include ('config.php');
$sql = "SELECT * FROM admin where Admin_id = $Admin_id";
$result = $link->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$F_name = $row['F_name'];
    $L_name = $row['L_name'];
    $Address = $row['Address'];
    $Gender = $row['Gender'];
    $Contact_no = $row['Contact_no'];
    $Age = $row['Age'];
    $Password = $row['Password'];
    $Email = $row['Email'];
   		// $cduration = $row['cduration'];
	}
}
?>


   <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Edit Admin</h4>
                                </div>
                                <div class="card-body">
                                     <form action="" method="post" class="formclass">
                                    <center><div id="success"></div></center>
                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label style="color: black">First Name </label>
                                                    <input id="F_name" type="text" class="form-control" placeholder="First Name" name="F_name" disabled required="required" value="<?php echo $F_name;?>">
                                                </div>
                                            </div>
                                           
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label style="color: black">Last Name </label>
                                                    <input id="L_name" type="text" class="form-control" placeholder="Last Name" name="L_name" required="required" value="<?php echo $L_name;?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 pr-1">
                                                <div class="form-group">
                                                    <label style="color: black">Address</label>
                                                   <input id="Address" type="text" class="form-control" placeholder="Address" name="Address" required="required" value="<?php echo $Address;?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col-md-4 pl-1">
                                                <div class="form-group">
                                                    <label style="color: black">Gender</label>
                                                     <input id="Gender" type="text" class="form-control" placeholder="Gender" name="Gender" required="required" value="<?php echo $Gender;?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4 pr-1" style="color: black">
                                                <div class="form-group">
                                                    <label style="color: black">Contact no</label>
                                                   <input id="Contact_no" type="text" class="form-control" placeholder="Phone No" name="Contact_no" required="required" value="<?php echo $Contact_no;?>">
                                                </div>
                                            </div>
                                            <div class="col-md-4 px-1">
                                                <div class="form-group">
                                                    <label style="color: black">Age</label>
                                                   <input id="Age" type="text" class="form-control" placeholder="Age" name="Age" required="required" value="<?php echo $Age;?>">
                                                </div>
                                            </div>  
                                        </div>

                                        <div class="row">
                                           <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label style="color: black">Password</label>
                                                    <input id="Password" type="password" class="form-control" placeholder="Password" name="Password" required="required" value="<?php echo $Password;?>">
                                                </div>
                                            </div>
                                           
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label style="color: black">Email </label>
                                                  <input id="Email" type="email" class="form-control" placeholder="Email" name="Email" required="required" value="<?php echo $Email;?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <input type="hidden" value="<?php echo $Admin_id;?>" name="hdnId" id="hdnId" />
                                                </div>
                                            </div>
                                            
                                        </div>

                                       
                                       <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <center><input type="button" name="sign_up" id="sign_up" class="btn btn-primary" value="Submit" style="background-color: lightblue;" style="color: white;">
                                        </center>
                                        <div class="clearfix"></div>
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
        var Gender = $('#Gender').val();
        var Contact_no = $('#Contact_no').val();
        var phone =/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
        var Age = $('#Age').val();
        var Password = $('#Password').val();
        var pass=/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/;
        var Email = $('#Email').val();
        var regEx = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
        var hdnId = $('#hdnId').val();

        if((letter.test(F_name)))
        {
          if((letters.test(L_name)))
          {
            if(Address != '')
            {
              if(Gender != '')
              {  
                if(phone.test(Contact_no))
                {
                  if(Age >= 18 )
                  {
                    if(pass.test(Password))
                    {
                      if(regEx.test(Email))
                      {
                                                
                          var url = "http://localhost/human_resource_management/1951_php_code/update_admin.php";
                          $.ajax({
                             type: "POST",
                              url: url,
                              data: { F_name: F_name, L_name : L_name, Address : Address, Gender : Gender, Contact_no : Contact_no, Age : Age, Password : Password, Email : Email, hdnId: hdnId },
                                success: function(data)
                                {
                                  if(data == 1)
                                  {
                                      $('#success').html("Admin updated successfully");
                                        setTimeout(function()
                                        { 
                                            window.location = 'http://localhost/human_resource_management/1951_php_code/admin_profile.php';
                                        }, 3000);
                                  }
                                  else if(data == 2)
                                  {
                                    $('#success').html('Error occured');
                                  }
                                }
                           });
   
                      }
                      else
                      {
                        $('#success').html('Please Enter valid Email Id');
                      }
                                                   
                    }
                    else
                    {
                      $('#success').html('Please re enter your password and Password must be at least  8 character and must contain 1 capital letter, 1 small letter, 1 number');
                    }
              
                  }
                  else
                  {
                    $('#success').html('Age Should Be Above 18');
                  }
              
                }
                else
                {
                  $('#success').html('Enter 10 Digit Number Or Phone No Cannot Be Empty');
                }
                                
              }
              else
              {
                $('#success').html('Gender Cannot Be Empty');
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
                $('#success').html('First Name Cannot Be Empty');
         }
      });
        </script>
     
     </div>
   </div>
 </div>
  
</body>
  </html>
<?php
include("footer.php");
?>
