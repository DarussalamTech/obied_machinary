<?php
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/css/custome_colorbox.css');
//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/packages/jui/js/jquery.js');
?>
<?php
$this->widget('ext.lyiightbox.LyiightBox2', array(
));
?>
<div class="popup_container">
    <div class='product_name' style='width: 500px'>
        <h3><?php echo $product_detail->product_name ?></h3>
    </div>
    <div class='product_image' style='width: 637px;height: 345px;margin:0px 0px 0px 48px'>
        <?php
        $p_images = $product_detail->getImage();
        echo CHtml::image($p_images[0]['image_large'], '', array('width' => '637px', 'height' => '345px'));
        ?>
        <?php
//        $p_images = $product_detail->getImage();
//        echo CHtml::link(CHtml::image($p_images[0]['image_large'], '', array('width' => '637px', 'height' => '350px')), $p_images[0]['image_large'], array("rel" => 'lightbox[_default]'));
        ?>
    </div>

    <div class="product_detail">
        <div class="small_detal">
            <p><b>Model</b> : <?php echo $product_detail->product_name ?></p>
            <p><b>Category</b> : <?php echo $product_detail->category->category_name ?></p>
            <p><b>Service Type</b> : <?php echo ucfirst($product_detail->product_service_type); ?></p> 
            <p><b>Status</b> : <?php echo ucfirst($product_detail->status); ?></p>
        </div>
        <div class="large_detal">
            <p><b>Description</b> : <?php echo $product_detail->product_description ?></p>


        </div>
    </div>
</div>

