<?php require_once(dirname(__FILE__).'/../vendor/autoload.php');//autoload packages
$db = new Database();
$user = new User($db->conn);
$stmt = $user->readAll();
$num = $stmt->rowCount();

include 'templates/header.php';
include 'templates/sidemenu.php';

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            List Users
            <small>Manage Users In The System</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"><i class="fa fa-users"></i> Users</a></li>
            <li class="active">List Users</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Your Page Content Here -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">System Users</h3>
                    </div>
        <?php
        if($num>0){
            echo "<div class='box-body'><table id='example1' class='table table-hover table-responsive table-bordered'>";
            echo "<thead><tr>";
            echo "<th>First Name</th>";
            echo "<th>Last Name</th>";
            echo "<th>Email</th>";
            echo "<th>Phone</th>";
            echo "<th>Role</th>";
            echo "<th>Status</th>";
            echo "<th>Actions</th>";
            echo "</tr></thead><tbody>";

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

                extract($row);

                echo "<tr>";
                echo "<td id='first_name:$id' contenteditable=\"true\">{$first_name}</td>";
                echo "<td id='last_name:$id' contenteditable=\"true\">{$last_name}</td>";
                echo "<td id='email:$id' contenteditable=\"true\">{$email}</td>";
                echo "<td id='phone:$id' contenteditable=\"true\">{$phone}</td>";
                echo "<td>{$role}</td>";
                echo "<td>{$status}</td>";
                echo "<td>";
                // edit and delete button is here
                echo "<a href='update_product.php?id={$id}' class='btn btn-default left-margin'>Edit</a>";
                echo "<a delete-id='{$id}' delete-type='delete_user' class='btn btn-default delete-object'>Delete</a>";
                echo "</td>";

                echo "</tr>";

            }


            echo "</tbody></table></div>";
        }
        ?>
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


