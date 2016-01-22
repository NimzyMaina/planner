<?php require 'vendor/autoload.php';
if($_POST){
    $db = new Database();//db connection
    $user = new User($db->conn); //instantiate user

    $user->first_name = $_POST['first_name'];
    $user->last_name = $_POST['last_name'];
    $user->phone = $_POST['phone'];
    $user->email = $_POST['email'];
    $user->password = $_POST['password'];
    $state = false;

    if($user->register()){
       $state = true;
        //send account activation link
        $url = asset("/activation.php?code=$user->confirm_code");
        $message = "Welcome to The planner. Please click the following link to activate your account <a href='$url'>Link</a> ";
        sendmail($user->email,$user->first_name.' '.$user->last_name,'Account Activation',$message);
    }

}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>The Planner | Registration Page</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="./bower_components/AdminLTE/bootstrap/css/bootstrap.min.css">
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
<body class="hold-transition register-page">
<div class="register-box">
    <div class="register-logo">
        <a href="index.php"><b>The</b>Planner</a>
    </div>

    <div class="register-box-body">

        <?php
        if(isset($state)){
            if($state){
            echo message('success',"User Successfully Registered. An email has been sent to your account with the activation link.");
            }else{
                echo message('danger',"Ooops!! Could Not register User");
            }
        }?>
        <p class="login-box-msg">Register a new membership</p>

        <form action="register.php" id="registerForm" method="post">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="first_name" value="<?=value('first_name')?>" placeholder="First name">
            </div>
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="last_name" value="<?=value('last_name')?>" placeholder="Last name">
            </div>
            <div class="form-group has-feedback">
                <input type="email" class="form-control" name="email" value="<?=value('email')?>" placeholder="Email">
            </div>
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="phone" value="<?=value('phone')?>" placeholder="Phone (+254 123 456 789)">
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="confirm" placeholder="Retype password">
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input name="agree" type="checkbox"> I agree to the <a href="#">terms</a>
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <a href="login.php" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 2.1.4 -->
<script src="./bower_components/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="./bower_components/AdminLTE/bootstrap/js/bootstrap.min.js"></script>
<!-- formValidation -->
<script src="./bower_components/formValidation/dist/js/formValidation.min.js"></script>
<script src="./bower_components/formValidation/dist/js/framework/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="./bower_components/AdminLTE/plugins/iCheck/icheck.min.js"></script>
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
        $('#registerForm').formValidation({
            message: 'This value is not valid',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                first_name: {
                    validators: {
                        notEmpty: {
                            message: 'The First Name is required'
                        }
                    }
                },
                last_name: {
                    validators: {
                        notEmpty: {
                            message: 'The Last Name is required'
                        }
                    }
                },
                phone: {
                    threshold: 7,
                    validators: {
                        phone: {
                            message: 'The input is not a valid KE phone number',
                            country: 'SK'
                        },
                        remote: {
                            message: 'The phone number is already registered',
                            url: '<?= asset('/ajax.php')?>',
                            data: {
                                type: 'phone'
                            },
                            type: 'POST',
                            delay: 4000
                        }
                    }
                },
                email: {
                    threshold: 5,
                    validators: {
                        notEmpty: {
                            message: 'The email address is required'
                        },
                        emailAddress: {
                            message: 'The input is not a valid email address'
                        },
                        remote: {
                            message: 'The email is not available',
                            url: '<?= asset('/ajax.php')?>',
                            data: {
                                type: 'email'
                            },
                            type: 'POST',
                            delay: 4000
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
                },
                confirm: {
                    validators: {
                        notEmpty: {
                            message: 'The re-type password is required and can\'t be empty'
                        },
                        identical: {
                            field: 'password',
                            message: 'The password and its confirm are not the same'
                        }
                    }
                },
                agree: {
                    icon: 'false',
                    validators: {
                        notEmpty: {
                            message: 'You have to accept the terms and policies'
                        }
                    }
                }
            }
        });
    });
</script>
</body>
</html>
