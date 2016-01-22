<?php require_once(dirname(__FILE__).'/../vendor/autoload.php');//autoload packages
$db = new Database();
$user = new User($db);

include 'templates/header.php';
include 'templates/sidemenu.php';

?>

<!-- fullCalendar 2.2.5-->
<link href="<?= asset('/bower_components/AdminLTE/plugins/fullcalendar/fullcalendar.min.css')?>" rel="stylesheet" type="text/css" />
<link href="<?= asset('/bower_components/AdminLTE/plugins/fullcalendar/fullcalendar.print.css')?>" rel="stylesheet" type="text/css" media='print' />

<script>

</script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Calendar
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Calendar</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Your Page Content Here -->
        <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-body no-padding">
                    <!-- THE CALENDAR -->
                    <div id='loading'>loading...</div>
                    <div id="calendar"></div>
                </div><!-- /.box-body -->
            </div><!-- /. box -->
        </div><!-- /.col -->
        </div><!-- /.row -->

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



