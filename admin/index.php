<?php require_once(dirname(__FILE__).'/../vendor/autoload.php');//autoload packages

$db = new Database();
$user = new User($db->conn);
$vendor = new Vendor($db->conn);
$item = new Item($db->conn);
$unum = $user->countAll();
$vnum = $vendor->countAll();
$inum = $item->countAll();

include 'templates/header.php';
include 'templates/sidemenu.php';
?>
    <link href="<?= asset('/css/flatWeatherPlugin.css')?>" rel="stylesheet">

    <script src="<?= asset('/js/jquery.flatWeatherPlugin.js')?>"></script>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Dashboard
                    <small>Control panel</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Your Page Content Here -->
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3><?= $unum?></h3>
                                <p>User Registrations</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-android-person-add"></i>
                            </div>
                            <a href="<?=asset('/admin/user_list')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                        </div>

                        <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3><?= $vnum?></h3>
                                <p>Registered Vendors</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-android-people"></i>
                            </div>
                            <a href="<?=asset('/admin/vendor_list')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>


                    </div><!-- ./col -->

                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3><?= $inum?></h3>
                                <p>Vendor Items</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-filing"></i>
                            </div>
                            <a href="<?=asset('/admin/item_list')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>


                    </div><!-- ./col -->

                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3><?= $inum?></h3>
                                <p>Customer Appointments</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-calendar"></i>
                            </div>
                            <a href="<?=asset('/admin/calendar')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>


                    </div><!-- ./col -->
                    </div>
                        <div class="row">

                            <div id="weather"></div>
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

    <script type="text/javascript">
        $(document).ready(function() {

            //Setup the plugin, see readme for more examples
            var example = $("#weather").flatWeatherPlugin({
                location: "Nairobi", //city and region *required
                country: "Kenya",         //country *required
                //optional:
                api: "openweathermap", //default: openweathermap (openweathermap or yahoo)
                apikey: "44db6a862fba0b067b1930da0d769e98",   //optional api key for openweather
                view : "full", //default: full (partial, full, simple, today or forecast)
                displayCityNameOnly : true, //default: false (true/false) if you want to display only city name
                forecast: 5, //default: 5 (0 -5) how many days you want forecast
                render: true, //default: true (true/false) if you want plugin to generate markup
                loadingAnimation: true //default: true (true/false) if you want plugin to show loading animation
                //units : "metric" or "imperial" default: "auto"
            });

        });
    </script>

    <style>

        /* style the container however you please */
        #weather {
            color:#fff;
            background: #3C8DBC;
            padding: 10px;
            margin: 30px auto;
            width: 340px;
            border-radius: 1px;
        }

        /*!* styling for this page only, ignore *!*/
        /*body {background: #95a5a6; font-family: sans-serif; background: #ecf0f1; padding: 0; margin: 0;}*/
        /*p {color: #888; width: 340px; margin: 0 auto; text-align: center;}*/

    </style>

<?php
include 'templates/footer.php';?>