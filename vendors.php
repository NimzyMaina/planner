<?php require_once(dirname(__FILE__).'./vendor/autoload.php');//autoload packages
$db = new Database();
$item = new Item($db->conn);
$category = new Category($db->conn);
$stmt = $item->readAll();
$num = $stmt->rowCount();



//while ($row = $categories->fetch(PDO::FETCH_ASSOC)){  extract($row);
//echo $name;
//}
//dump($categories);
// page given in URL parameter, default page is one
$page = isset($_GET['page']) ? $_GET['page'] : 1;

$cat = isset($_GET['category']) ? $_GET['category'] : '';


// set number of records per page
$records_per_page = 3;

// calculate for the query LIMIT clause
$from_record_num = ($records_per_page * $page) - $records_per_page;

if($cat != ''){

}else{
    $categories = $category->readAll();
}

$categories = $category->readAll();
$categoriess = $category->readAll();




require 'templates/header.php';
?>

<!--gallery-->
<div class="gallery">
    <div class="container">
        <h3 class="title">Vendors</h3>
        <div class="sap_tabs">
            <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
                <ul class="resp-tabs-list">
                    <li class="resp-tab-item"><span>All</span></li>
                    <?php while ($row = $categories->fetch(PDO::FETCH_ASSOC)){  extract($row);?>
                    <li class="resp-tab-item"><span><?php echo ucfirst($name);?></span></li>
                     <?php }?>
                </ul>
                <div class="clearfix"> </div>
                <div class="resp-tabs-container">

<!--all-->
                    <div class="tab-1 resp-tab-content">
                        <?php $i = 1;
                    $count = $stmt->rowCount();
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){  extract($row);
                                $img = json_decode($images);?>

                            <?php if($i == 1){ ?>
                                <div class="tab_img">
                            <?php }?>

    <div class="col-md-3 img-top ">
        <a href="#">
            <img height="640px" width="426px" src="<?=asset('/uploads/items')?>/<?=$img[0]?>" class="img-responsive" alt=""/>
            <div class="link-top">
            </div>
        </a>
    </div>

    <?php if($i == 4 || $i == $count){ $i = 0; ?>
        </div>
<!--                                end img_tab-->
    <?php } ?>

                            <?php $i++; }?>

                    </div>
<!--                    end all-->

<!--                    categories-->

                    <?php while ($rows = $categoriess->fetch(PDO::FETCH_ASSOC)){  extract($rows);
                        $smt = $item->getByIdCat($id);
                        $count = $smt->rowCount();?>
                        <div class="tab-1 resp-tab-content">

                            <?php $i = 1; while ($temp = $smt->fetch(PDO::FETCH_ASSOC)){
                                extract($temp);
                                $img = json_decode($images);
                                ?>

                                <?php if($i == 1){ ?>
                                    <div class="tab_img">
                                <?php }?>

                                <div class="col-md-3 img-top ">
                                    <a href="<?=asset('/uploads/items')?>/<?=$img[0]?>">
                                        <img height="640" width="426" src="<?=asset('/uploads/items')?>/<?=$img[0]?>" class="img-responsive" alt=""/>
                                        <div class="link-top">
                                        </div>
                                    </a>
                                </div>

                                <?php if($i == 4 || $i == $count){ $i = 0?>
                                    </div>
                                    <div class="clearfix"> </div>
                                <?php } ?>


                                <?php $i++;  } ?>
                        </div>
                    <?php } ?>

<!--                    end categotries-->



                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!--//gallery-->


<?php
require 'templates/footer.php';
?>