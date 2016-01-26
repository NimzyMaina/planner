<?php require_once(dirname(__FILE__).'/../vendor/autoload.php');//autoload packages
$db = new Database();
$vendor = new Vendor($db->conn);

include 'templates/header.php';
include 'templates/sidemenu.php';

if($_POST){
    $vendor->name = $_POST['name'];
    $vendor->phone = $_POST['phone'];
    $vendor->email = $_POST['email'];
    $vendor->details = $_POST['details'];
    $vendor->website = $_POST['website'];
    $state = false;

    if($vendor->register()){
        $state = true;
        //send notice
        $message = "Welcome to The planner. This is to notify you of ur successful enrolment to our system";
        sendmail($vendor->email,$vendor->name ,'Successful Registration',$message);
        unset($_POST);
    }
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add vendor
            <small>Add new vendors to the system</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#"><i class="fa fa-shopping-cart"></i> vendors</a></li>
            <li class="active">Add vendor</li>
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
                        <h3 class="box-title">vendor Details</h3>
                    </div><!-- /.box-header -->
                    <?php
                    if(isset($state)){
                        if($state){
                            echo message('success',"vendor Successfully Registered. An email has been sent to their account to notify them.");
                        }else{
                            echo message('danger',"Ooops!! Could Not register vendor");
                        }
                    }?>
                    <!-- form start -->
                    <form role="form" method="post" action="vendor_add" id="addVendorForm">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Vendor Name</label>
                                <input type="name" class="form-control" value="<?=value('name')?>" id="name" name="name" placeholder="Enter Name">
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
                                <label for="website">Website</label>
                                <input type="website" class="form-control" value="<?=value('website')?>" id="website" name="website" placeholder="http://">
                            </div>
                            <div class="form-group">
                                <label for="details">Details</label>
                                <textarea class="form-control" name="details"><?=value('details')?></textarea>
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


