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
                <h2>We specialize in Trading Products</h2>
                <article>30 experience-rich years of rock-solid reputation in the industry of heavy machinery and construction equipment. That’s what Obeid Machinery is about.</article>
                <article>We started our operations in 1985 by trading used equipment all over Middle East and Asia.</article>
                <?php $serial = 1;
                foreach ($category_products as $product): ?>
                    <div class="four columns">
                        <div class="right_index_service">
                            <h4>Product <?php echo $serial; ?></h4>
                            <div class="ltm_tank">
                                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/ltm_tank_img_03.jpg" />
                                <p><i><?php echo $product->product_name; ?></i></p>
                            </div>
                        </div>
                    </div>
                    <?php
                    $serial++;
                endforeach;
                ?>
                <div class="four columns">
                    <div class="right_index_service">
                        <h4>Product 1</h4>
                        <div class="ltm_tank">
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/ltm_tank_img_03.jpg" />
                            <p><i>LTM1500 with 84m Boom LTM1300</i></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>