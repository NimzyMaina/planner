<?php require_once(dirname(__FILE__).'/../vendor/autoload.php');//autoload packages
$db = new Database();
$category = new Category($db->conn);
$stmt = $category->read();
$num = $stmt->rowCount();

include 'templates/header.php';
include 'templates/sidemenu.php';

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            List Categories
            <small>Manage Categories In The System</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"><i class="fa fa-users"></i> Categories</a></li>
            <li class="active">List Categories</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Your Page Content Here -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">System Categories</h3>
                    </div>
                    <?php
                    if($num>0){
                        echo "<div class='box-body'><table id='example3' class='table table-hover table-responsive table-bordered'>";
                        echo "<thead><tr>";
                        echo "<th>Id</th>";
                        echo "<th>Name</th>";
                        echo "<th>Status</th>";
                        echo "<th>Actions</th>";
                        echo "</tr></thead><tbody>";

                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

                            extract($row);

                            echo "<tr>";
                            echo "<td>{$id}</td>";
                            echo "<td id='name:$id' contenteditable=\"true\">{$name}</td>";
                            if($status == 1){
                                $temp = '<span class="toog label label-success" data-status="'.$status.'" data-id="'.$id.'" data-type="toog_category">Active</span>';
                            }else{
                                $temp = '<span class="toog label label-danger" data-status="'.$status.'" data-id="'.$id.'" data-type="toog_category">Inactive</span>';
                            }
                            echo '<td>'.$temp.'</td>';
                            echo "<td>";
                            // edit and delete button is here
                            echo "<a delete-id='{$id}' delete-type='delete_item' class='btn btn-danger delete-object'>Delete</a>";
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


