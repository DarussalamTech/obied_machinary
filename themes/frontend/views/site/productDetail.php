<div class="row">
    <div class="terrain_services">
        <div class="three columns">
            <div class="about_list">
                <?php
                $allSubCats = Categories::model()->childCategories();
                foreach ($allSubCats as $cat):
                    ?>
                    <div class="about_listing <?php echo ($cat->id == $cat_id) ? "terrain_list" : "" ?>">
                        <?php
                        echo CHtml::link($cat->category_name, $this->createUrl('/site/allProducts', array('cat_slug' => $cat->slug)), array('title' => $cat->category_name));
                        ?>
                    </div>

                    <?php
                endforeach;
                ?>
            </div>
        </div>
        <div class="nine columns">
            <div class="terrain_images">
                <h2><?php echo $product_detail->product_name ?></h2>
                <div class="four columns">
                    <div class="terrain_imgs">

                        <?php
                        $p_images = $product_detail->getImage();
                        echo CHtml::link(CHtml::image($p_images[0]['image_small']), $p_images[0]['image_large'], array("rel" => 'lightbox[_default]'));
                        ?>
                        <p>Description : <?php echo $product_detail->product_description ?></p>
                        <p>Overview : <?php echo ucfirst($product_detail->product_overview); ?></p>
                        <p>Trade : <?php echo ucfirst($product_detail->product_service_type); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$this->widget('ext.lyiightbox.LyiightBox2', array(
));
?>