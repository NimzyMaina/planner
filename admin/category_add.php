<?php require_once(dirname(__FILE__).'/../vendor/autoload.php');//autoload packages
$db = new Database();
$category = new Category($db->conn);

//dump($vendors);



if($_POST){
    //dump($_FILES);
    $category->name = $_POST['name'];
    $category->status = isset($_POST['status']) ? 1 : 0;
    $num = 0;
    //exit;
    $state = false;

    if($category->add()){
        $state = true;
        unset($_POST);
    }
}

include 'templates/header.php';
include 'templates/sidemenu.php';

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add vendor Item
            <small>Add New vendor Items to the system</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#"><i class="fa fa-list"></i> Categories</a></li>
            <li class="active">Add Category</li>
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
                        <h3 class="box-title">Category Details</h3>
                    </div><!-- /.box-header -->
                    <?php
                    if(isset($state)){
                        if($state){
                            echo message('success',"Category Successfully Added.");
                        }else{
                            echo message('danger',"Ooops!! Could Not Add Category");
                        }
                    }?>
                    <!-- form start -->
                    <form role="form" method="post" action="category_add" id="addCategoryItemForm">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Category Name</label>
                                <input type="name" class="form-control" value="<?=value('name')?>" id="name" name="name" placeholder="Enter Name">
                            </div>
                            <div class="checkbox icheck">
                                <label  for="status" class="control-label">
                                    <input name="status" type="checkbox"> Visible
                                </label>
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


