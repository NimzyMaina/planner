<?php require_once(dirname(__FILE__).'/../vendor/autoload.php');//autoload packages
$db = new Database();
$item = new Item($db->conn);
$vendor = new Vendor($db->conn);
$category = new Category($db->conn);

$vendors = $vendor->readAll();
$categories = $category->readAll();
if(isset($_GET['id'])){
    $item->id = $_GET['id'];
}else{
    header("Location : asset('/admin/item_list')");
}
$vendor_item = $item->readOne();
$vendor->id = $item->vendor_id;
$vendor->readName();
$category->id = $item->category_id;
$category->readName();

//dump($vendors);



if($_POST){
    //dump($_FILES);
    $item->name = $_POST['name'];
    $item->article = $_POST['article'];
    $item->vendor_id = $_POST['vendor_id'];
    $item->category_id = $_POST['category_id'];
    $item->images = $_FILES['images']['name'];
    $item->status = isset($_POST['status']) ? 1 : 0;
    $num = 0;
    if(isset($_FILES) && count($_FILES) > 0){
    foreach($_FILES['images']['name'] as $file){
        upload('images',$num,'items');
        $num++;
    }
    }
    //exit;
    $state = false;

    if($item->update()){
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

        <div class="row">
            <div class="col-md-12">
                <!-- Custom Tabs -->
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_1" data-toggle="tab"><b>Form Details</b>  <i class="fa fa-pencil-square-o"></i></a></li>
                        <li><a href="#tab_2" data-toggle="tab"><b>Item Images</b>   <i class="fa fa-camera"></i></a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <?php
                            if(isset($state)){
                                if($state){
                                    echo message('success',"Vendor Item Successfully Edited.");
                                }else{
                                    echo message('danger',"Ooops!! Could Not Edit vendor Item");
                                }
                            }?>
                            <!-- form start -->
                            <form role="form" method="post" action="item_add" id="addVendorItemForm" enctype="multipart/form-data">
                                    <div class="form-group col-md-7">
                                        <label for="name">Item Name</label>
                                        <input type="name" class="form-control" value="<?=value($item->name,true,'name')?>" id="name" name="name" placeholder="Enter Name">
                                    </div>
                                    <div class="form-group col-md-7">
                                        <label for="vendor_id">Vendor</label>
                                        <select name="vendor_id" class="form-control">
                                            <option value="">Select Vendor</option>
                                            <?php while ($row = $vendors->fetch(PDO::FETCH_ASSOC)){
                                                extract($row);
                                                ?>
                                                <option value="<?=$id?>" <?php if(value($item->vendor_id,true,'vendor_id') == $id){echo 'selected';}?>><?=$name?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-7">
                                        <label for="category_id">Category</label>
                                        <select name="category_id" class="form-control">
                                            <option value="">Select Category</option>
                                            <?php while ($row = $categories->fetch(PDO::FETCH_ASSOC)){
                                                extract($row);
                                                ?>
                                                <option value="<?=$id?>" <?php if(value($item->category_id,true,'category_id') == $id){echo 'selected';}?>><?=$name?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                <div class="row" style="margin-left: 3px;">
                                    <div class="form-group col-md-7">
                                        <label for="article">Article</label>
                                        <textarea class="form-control" name="article"><?=value($item->article,true,'article')?></textarea>
                                    </div>
                                </div>
                                    <div class="row"  style="padding-left: 34px;">
                                    <div class="form-group">
                                        <label for="images[]">Add Images</label>
                                        <input type="file" name="images[]" multiple="true">
                                    </div>
                                    </div>
                                    <div class="form-group checkbox icheck col-md-7" style="margin-left: 3px;">
                                        <label  for="status" class="control-label">
                                            <input name="status" type="checkbox" checked> Visible
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
                                <div class="row" style="margin-left: 3px;">
                                    <div class="form-group col-md-7">
                                        <button type="submit" class="btn btn-primary btn-flat">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div><!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_2">
                            <style>
                                table .img-responsive2{
                                    width: 100%;
                                }
                            </style>
                            <table class="table table-bordered" id="imgTable">
                                <thead>
                                <th class="col-md-3">Image</th>
                                <th>Name</th>
                                <th>Mime</th>
                                <th>Actions</th>
                                </thead>
                            <?php
                            $id = 0;
                            foreach(json_decode($item->images) as $image){?>
                              <tr>
                                  <td><img width="200" height="200" class="img-responsive2" src="<?=asset("/uploads/items/$image")?>"></td>
                                  <td><?php $name = explode('.',$image); echo $name[0];?></td>
                                  <td><?=$name[1]?></td>
                                  <td>
                                      <a delete-id='<?=$id?>' delete-type='delete_image' class="btn btn-danger btn-flat delete-object">Delete Image <i class="fa fa-remove"></i></a>
                                  </td>
                              </tr>
                            <?php $id ++;}

                            ?>
                            </table>
                        </div><!-- /.tab-pane -->
                    </div><!-- /.tab-content -->
                </div><!-- nav-tabs-custom -->
            </div><!-- /.col -->
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


