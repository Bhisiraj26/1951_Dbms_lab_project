<!DOCTYPE html>
<html>
  <head>
    <title>Employee Login</title>
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
    <center><div id="success"></div></center>
    <input type="text" class="form-control" placeholder="First Name" name="F_name" id="F_name" required="required">
     <br><br>
    <input type="password" name="Password" id="Password" placeholder="Password" required="required" class="form-control input-md">
    <br><br>
    <center>
    <input type="button" name="signin" id="signin" class="btnclass" value="Login">
    </center><br>
    <div class="login-f1">
   <!--  <a style="text-decoration: none; color: #187FAB;" data-toggle="tooltip" title="Create Account!" href="register.php">Don't Have An Account?</a><br> -->
    <a style="text-decoration: none; color: #187FAB;" data-toggle="tooltip" title="Signin" href="employee_forgot_password.php">Forgot Password?</a><br>
     <a style="text-decoration: none; color: #187FAB;" data-toggle="tooltip" title="Signin" href="index.php"> Go back?</a><br>
  </div>
    </div>
  </form>
  </div>
</body>
   <script src="http://localhost/human_resource_management/js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript">
      $('.btnclass').click(function(){
      var F_name = $('#F_name').val();
      var letter =/^[A-Za-z]+$/;
      var Password = $('#Password').val();
      
      if((letter.test(F_name)))
      {
          if(Password != '')
            {
                var url = "http://localhost/human_resource_management/1951_php_code/login_test1.php";
                  $.ajax(
                    {
                        type: "POST",
                        url: url,
                        data: { F_name : F_name, Password : Password },
                        success: function(data)
                        {
                            if(data == 1)
                            {
                                window.location ="http://localhost/human_resource_management/1951_php_code/dashboard1.php";
                            }
                            else if(data == 2)
                            {
                                $('#success').html('Invalid Login Credentials');
                            }
                        
                        }
                    })
            }
            else
            {
                $('#success').html('Please enter correct password ');
            }
      }
      else
      {
          $('#success').html('Enter Valid Name');
      }      
      
  });
         
</script>
</html>




