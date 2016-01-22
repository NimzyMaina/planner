<?php require_once(dirname(__FILE__).'/../vendor/autoload.php');//autoload packages
$db = new Database();
$user = new User($db->conn);

include 'templates/header.php';
include 'templates/sidemenu.php';

if($_POST){
    $user->first_name = $_POST['first_name'];
    $user->last_name = $_POST['last_name'];
    $user->phone = $_POST['phone'];
    $user->email = $_POST['email'];
    $user->password = $_POST['password'];
    $user->role = $_POST['role'];
    $state = false;

    if($user->register()){
        $state = true;
        //send account activation link
        $url = asset("/activation.php?code=$user->confirm_code");
        $message = "Welcome to The planner. Please click the following link to activate your account <a href='$url'>Link</a>
        <br>
        Your password is $user->password
";
        sendmail($user->email,$user->first_name.' '.$user->last_name,'Account Activation',$message);
        unset($_POST);
    }
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add User
            <small>Add new users to the system</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#"><i class="fa fa-users"></i> Users</a></li>
            <li class="active">Add User</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Your Page Content Here -->

        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">User Details</h3>
                    </div><!-- /.box-header -->
                    <?php
                    if(isset($state)){
                        if($state){
                            echo message('success',"User Successfully Registered. An email has been sent to your account with the activation link.");
                        }else{
                            echo message('danger',"Ooops!! Could Not register User");
                        }
                    }?>
                    <!-- form start -->
                    <form role="form" method="post" action="user_add" id="addUserForm">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="first_name" class="form-control" value="<?=value('first_name')?>" id="first_name" name="first_name" placeholder="Enter First Name">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="last_name" class="form-control" value="<?=value('last_name')?>" id="last_name" name="last_name" placeholder="Enter Last Name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" value="<?=value('email')?>" id="email" name="email" placeholder="Enter Email">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="phone" class="form-control" value="<?=value('phone')?>" id="phone" name="phone" placeholder="Enter Phone">
                            </div>
                            <div class="form-group">
                                <label>Role</label>
                                <select name="role" class="form-control">
                                    <option value="">Select User Role</option>
                                    <option value="admin">Administrator</option>
                                    <option value="standard">Standard User</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="confirm">Password</label>
                                <input type="password" class="form-control" id="confirm" name="confirm" placeholder="Re-Type Password">
                            </div>
                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btn-flat">Submit</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
        Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright © 2015 <a href="#">Planner</a>.</strong> All rights reserved.
</footer>

</div><!-- ./wrapper -->



<?php
include 'templates/footer.php';?>


