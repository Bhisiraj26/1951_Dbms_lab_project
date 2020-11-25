<!DOCTYPE html>
<html>
  <head>
    <title>Admin Login</title>
   <meta charset="utf-8">
        <title>user</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="Blood Donation - Activism & Campaign HTML5 Template">
        <meta name="author" content="xenioushk">
        <link rel='stylesheet' href='http://codepen.io/assets/libs/fullpage/jquery-ui.css'>
        <link rel="stylesheet" href="../assets/css/style8.css" media="screen" type="text/css" />          
  </head>

  
<body>

  
    <div class="login-form">  
    <h2>Login</h2>
    <form class="" method="post">
    <center><div id = "successmsg"></div></center>
    <input type="text" class="form-control" placeholder="Email" name="Email" id="Email" required="required">
     <br><br>
    <input type="password" name="Password" id="Password" placeholder="Password" required="required" class="form-control input-md">
    <br><br>
    <center>
    <input type="button" name="signin" id="signin" class="btnclass" value="Login">
    </center><br>
    <div class="login-f1">
   <!--  <a style="text-decoration: none; color: #187FAB;" data-toggle="tooltip" title="Create Account!" href="register.php">Don't Have An Account?</a><br> -->
    <a style="text-decoration: none; color: #187FAB;" data-toggle="tooltip" title="Signin" href="admin_forgot_password.php">Forgot Password?</a><br>
     <a style="text-decoration: none; color: #187FAB;" data-toggle="tooltip" title="Signin" href="index.php"> Go back?</a><br>
  </div>
    </div>
  </form>
  </div>
</body>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://localhost/human_resource_management/js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript">
      $('.btnclass').click(function(){
      var Email = $('#Email').val();
      var regEx = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
      var Password = $('#Password').val();
      var pass=/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/;
      
      if(regEx.test(Email))
      {
          if(pass.test(Password))
            {
                var url = "http://localhost/human_resource_management/1951_php_code/login_test.php";
                  $.ajax(
                    {
                        type: "POST",
                        url: url,
                        data: { Email : Email, Password : Password },
                        success: function(data)
                        {
                            if(data == 1)
                            {
                                window.location ="http://localhost/human_resource_management/1951_php_code/dashboard.php";
                            }
                            else if(data == 2)
                            {
                                $('#successmsg').html('Invalid Login Credentials');
                            }
                        
                        }
                    })
              }
              else
              {
                $('#successmsg').html('Please enter correct password ');
              }
      }
      else
      {
          $('#successmsg').html('Enter Valid Email id');
      }      
      
  });
         
</script>

</html>




