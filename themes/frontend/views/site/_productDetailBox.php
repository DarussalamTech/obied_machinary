<?php
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/css/custome_colorbox.css');
//Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/packages/jui/js/jquery.js');
?>
<?php
$this->widget('ext.lyiightbox.LyiightBox2', array(
));
?>
<script>
    // defining js base path
    var js_basePath = '<?php echo Yii::app()->theme->baseUrl; ?>';

    var yii_base_url = "<?php echo Yii::app()->baseUrl; ?>";

</script>
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
//        echo CHtml::link(CHtml::image($p_images[0]['image_large'], '', array('width' => '637px', 'height' => '345px')), $p_images[0]['image_large'], array("rel" => 'lightbox[_default]'));
        ?>
    </div>

    <div class="product_detail">
        <div class="small_detal" style="width:99%;padding:5px 4px 4px 2px">
            <div class="div_row" style="width:99%;padding-bottom: 5px">
                <div class="div_column" style=" float: left;"><b>Model :</b></div>
                <div class="div_data" style="width: 40%; float: left;padding-left: 3px;"><?php echo $product_detail->product_name ?></div>
                <div class="div_column" style="padding-left: 3px; float: left"><b>Category :</b></div>
                <div class="div_data" style=" float: left;padding-left: 3px;"><?php echo $product_detail->category->category_name ?></div>
            </div><br>
            <div class="div_row" style="width:99%;padding-bottom: 5px">
                <div class="div_column" style=" float: left"><b>Service Type :</b></div>
                <div class="div_data" style=" width: 33%; float: left;padding-left: 3px;"><?php echo ucfirst($product_detail->product_service_type); ?></div>
                <div class="div_column" style="padding-left: 3px; float: left"><b>Status :</b></div>
                <div class="div_data" style=" float: left;padding-left: 3px;"><?php echo ucfirst($product_detail->status); ?></div>
            </div><br>
            <div class="div_row" style="width:99%;padding-bottom: 5px">
                <div class="div_data" style=" float: left"><b>Description :</b><?php echo $product_detail->product_description ?></div>
            </div>
        </div>
    </div>
</div>

