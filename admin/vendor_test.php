<?php require_once(dirname(__FILE__).'/../vendor/autoload.php');//autoload packages
$db = new Database();
$user = new User($db);

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

        <?php
        $name = basename($_SERVER['PHP_SELF']);

        print_r (explode(" ",$name));

        //echo child('test');

        echo $val = strip_tags(trim("+254 724 844 94"));
        ?>

        <span contenteditable onfocus="useIt()" editor="edit">Admin</span>


        <div id="container"></div>
        <script>
            function useIt() {
                var content = document.querySelector('template').content;
                // Update something in the template DOM.
//                var span = content.querySelector('span');
//                span.textContent = parseInt(span.textContent) + 1;
                document.querySelector('#container').appendChild(
                    document.importNode(content, true));
            }
        </script>

        <template id='edit'>
            <select>
                <option name='admin'>Admin</option>
                <option name='standard'>Standard</option>
            </select>
        </template>

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


