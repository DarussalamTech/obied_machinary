<div class="row">
    <div class="terrain_services">
        <div class="three columns">
            <div class="about_list">
                <div class="about_listing terrain_list">
                    All Terrain Cranes
                </div>
                <div class="about_listing">
                    Truck Mounted Cranes
                </div>
                <div class="about_listing">
                    Rough Terrain Cranes
                </div>
                <div class="about_listing">
                    Crawler Cranes
                </div>
            </div>
        </div>
        <div class="nine columns">
            <div class="terrain_images">
                <h2>All Terrain Cranes</h2>
                <?php foreach ($category_products as $product): ?>
                    <div class="four columns">
                        <div class="terrain_imgs">
                            <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/all_terrain_cranes_03.png" /></a>
                            <p><?php echo $product->product_name; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>

                <div class="four columns">
                    <div class="terrain_imgs">
                        <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/all_terrain_cranes_03.png" /></a>
                        <p>All Terrain Cranes</p>
                    </div>
                </div>
                <div class="four columns">
                    <div class="terrain_imgs">
                        <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/all_terrain_cranes_03.png" /></a>
                        <p>All Terrain Cranes</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
