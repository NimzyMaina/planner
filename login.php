<?php require 'vendor/autoload.php';
    if($_POST){
        $db = new Database();//db connection
        $user = new User($db->conn); //instantiate user

        $user->email = $_POST['email'];
        $user->password = $_POST['password'];

        if($user->login()){
            if($_SESSION['role'] == "admin"){
                header("Location:admin/index.php");
                //echo "good";exit;
            }else{
                header("Location:index.php");
            }
        }else{
            $error = "Wrong Email / Password Combination";
        }

    }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>The Planner | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="./bower_components/AdminLTE/bootstrap/css/bootstrap.min.css"">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./bower_components/AdminLTE/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="./bower_components/AdminLTE/plugins/iCheck/square/blue.css">
    <!-- formValidation -->
    <link rel="stylesheet" href="./bower_components/formValidation/dist/css/formValidation.min.css">

    <link rel="shortcut icon" type="image/x-icon" href="./images/favicon.ico"/>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><b>The</b>Planner</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
      <?php
      if(isset($error)){
          echo '<div class="alert alert-danger" role="alert">'.$error .'</div>';
      }?>
    <p class="login-box-msg">Sign in to start your session</p>

    <form id="loginForm" action="<?= htmlentities($_SERVER['PHP_SELF']);?>" method="post">
      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder="Email" value="<?= value('email')?>">

      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">

      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <a href="#">I forgot my password</a><br>
    <a href="register.php" class="text-center">Register a new membership</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.1.4 -->
<script src="./bower_components/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="./bower_components/AdminLTE/bootstrap/js/bootstrap.min.js"></script>
<!-- formValidation -->
<script src="./bower_components/formValidation/dist/js/formValidation.min.js"></script>
<script src="./bower_components/formValidation/dist/js/framework/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="./bower_components/AdminLTE./plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#loginForm').formValidation({
            message: 'This value is not valid',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                email: {
                    validators: {
                        notEmpty: {
                            message: 'The email address is required'
                        },
                        emailAddress: {
                            message: 'The input is not a valid email address'
                        }
                    }
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: 'The password is required'
                        },
                        different: {
                            field: 'email',
                            message: 'The password cannot be the same as email'
                        },
                        stringLength: {
                            min: 6,
                            max: 12,
                            message: 'The password must be more than 6 and less than 12 characters long'
                        }
                    }
                }
            }
        });
    });
</script>
</body>
</html>
