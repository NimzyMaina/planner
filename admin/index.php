<?php

require_once(dirname(__FILE__).'/../vendor/autoload.php');//autoload packages

// $cm = new Cmautoload;
// echo $cm->classmap();

$user = new User;
//echo $user->greet();

//echo '<br>';

//echo get_domain();

$db = new Database();
//$db = $database->getConnection();

// echo asset("/bower_components/AdminLTE/bootstrap/css/bootstrap.min.css");

// exit;
include 'templates/header.php';
include 'templates/sidemenu.php';
?>



        

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Page Header
                    <small>Optional description</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                    <li class="active">Here</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Your Page Content Here -->

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