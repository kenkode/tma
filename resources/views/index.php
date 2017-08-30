<?php
require ("includes/config.php");

if(isset($_SESSION['ID']) || isset($_SESSION['manager'])) {
        header("location: dashboard.php");
        exit();
}
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>TMA</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="loginColumns animated fadeInDown">
        <div class="row">

            <div class="col-md-3">
                <h2 class="font-bold">TMA</h2>

                <p>
                    Welcome to project TMA
                </p>

            </div>
            <div class="col-md-6">
                <div class="ibox-content">
                <h5 style="color: green">
                <?php
                 if(isset($_SESSION['message'])){
                 $success = $_SESSION['message'];
                 session_unset($_SESSION['message']);
                 }else{
                 $success = "";
                 }
                 echo $success;

                 ?>
                     
                 </h5>

                 <p id="error" style="color:red"></p><br>
                    <form class="m-t" role="form" id="form">
                        <div class="form-group">
                            <input type="username" class="form-control" id="username" placeholder="Username or Email" required="">
                        </div>
                        <div class="form-group">
                            <input type="password" id="password" class="form-control" placeholder="Password" required="">
                        </div>
                        <button type="button" id="submit" class="btn btn-primary block full-width m-b">Login</button>

                        <a href="#">
                            <small>Forgot password?</small>
                        </a>

                        <p class="text-muted text-center">
                            <small>Do not have an account?</small>
                        </p>
                        <a class="btn btn-sm btn-white btn-block" href="register.php">Create an account</a>
                    </form>
                    <p class="m-t">
                        <small>Tma &copy; <?php echo date('Y');?></small>
                    </p>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-3">
                
            </div>
            <div class="col-md-6 text-center">
               <small>Copyright Upstridge©2017</small>
            </div>
        </div>
    </div>

    <script src="js/jquery-2.1.1.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#submit').click(function(){
                    var username = $('#username').val();
                    var password = $('#password').val();
                    var page     = 'login';

                    var dataString = 'username='+ username + '&password=' + password +'&page=login';
                    //alert (dataString);return false;
                    $.ajax({
                      type: "POST",
                      url: "submit.php",
                      data: {username:username,password:password,page:page},
                      success: function(response) {
                      //alert(response);
                      if(response != ""){
                      $('#error').html(response);
                      }else{
                      window.location.href = "http://localhost/tma/dashboard.php";
                      }
                     }
                     });
            });
        });
    </script>

</body>

</html>
