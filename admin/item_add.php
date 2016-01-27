<?php require_once(dirname(__FILE__).'/../vendor/autoload.php');//autoload packages
$db = new Database();
$item = new Item($db->conn);
$vendor = new Vendor($db->conn);
$category = new Category($db->conn);

$vendors = $vendor->readAll();
$categories = $category->readAll();

//dump($vendors);



if($_POST){
    //dump($_FILES);
    $item->name = $_POST['name'];
    $item->article = $_POST['article'];
    $item->vendor_id = $_POST['vendor_id'];
    $item->category_id = $_POST['category_id'];
    $item->images = json_encode($_FILES['images']['name']);
    $item->status = isset($_POST['status']) ? 1 : 0;
    $num = 0;
    foreach($_FILES['images']['name'] as $file){
        upload('images',$num,'items');
        $num++;
    }
    //exit;
    $state = false;

    if($item->add()){
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
            <li><a href="#"><i class="fa fa-list"></i> Vendor Items</a></li>
            <li class="active">Add vendor Item</li>
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
                        <h3 class="box-title">vendor Item Details</h3>
                    </div><!-- /.box-header -->
                    <?php
                    if(isset($state)){
                        if($state){
                            echo message('success',"Vendor Item Successfully Added.");
                        }else{
                            echo message('danger',"Ooops!! Could Not Add vendor Item");
                        }
                    }?>
                    <!-- form start -->
                    <form role="form" method="post" action="item_add" id="addVendorItemForm" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Item Name</label>
                                <input type="name" class="form-control" value="<?=value('name')?>" id="name" name="name" placeholder="Enter Name">
                            </div>
                            <div class="form-group">
                                <label for="vendor_id">Vendor</label>
                                <select name="vendor_id" class="form-control">
                                    <option value="">Select Vendor</option>
                                    <?php while ($row = $vendors->fetch(PDO::FETCH_ASSOC)){
                                        extract($row);
                                        ?>
                                    <option value="<?=$id?>" <?php if(value('vendor_id') == $id){echo 'selected';}?>><?=$name?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select name="category_id" class="form-control">
                                    <option value="">Select Category</option>
                                    <?php while ($row = $categories->fetch(PDO::FETCH_ASSOC)){
                                        extract($row);
                                        ?>
                                        <option value="<?=$id?>" <?php if(value('category_id') == $id){echo 'selected';}?>><?=$name?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="article">Article</label>
                                <textarea class="form-control" name="article"><?=value('article')?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="images[]">Images</label>
                                <input type="file" name="images[]" multiple="true">
                            </div>
                            <div class="checkbox icheck">
                                <label  for="status" class="control-label">
                                    <input name="status" type="checkbox"> Visible
                                </label>
                            </div><!--
                            <div class="form-group">
                                <label for="img2">Image 2</label>
                                <input type="file" name="img2">
                            </div>
                            <div class="form-group">
                                <label for="img3">Image 3</label>
                                <input type="file" name="img3">
                            </div> -->
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


