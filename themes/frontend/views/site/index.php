
<div class="row">
    <div class="truck_images">
        <?php foreach ($child_categorie as $child): ?>
            <div class="three columns">
                <div class="under_truck">
                    <?php
                    // CVarDumper::dump($child->category_image_path, 30, TRUE);
                    echo CHtml::link(CHtml::image($child->show_image, '', array('calss' => 'crawel_cranes', 'style' => 'height:170px')), $this->createUrl('/site/allProducts', array('category_id' => $child->id)), array('title' => $child->category_name));
                    ?>
                    <h1>
                        <i><?php echo $child->category_name; ?></i>
                    </h1>
                </div>
            </div>
        <?php endforeach; ?>

        <!--                        <div class="three columns">
                                    <div class="under_truck">
                                        <a href="#">
                                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/crawler_cranes_03.png" class="crawel_cranes" /></a>
                                        <h1><i>Crawler Cranes</i></h1>
                                    </div>
                                </div>-->
    </div>
</div>
<div class="row">
    <div class="index_services">
        <div class="nine columns">
            <div class="left_index_service">
                <h2>OUR SERVICES</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                <div class="four columns">
                    <div class="division">
                        <h3>Rental Division</h3>
                        <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/rental_division_03.jpg" width="181" height="116" /></a>
                    </div>
                </div>
                <div class="four columns">
                    <div class="division">
                        <h3>Trading Division</h3>
                        <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/trading_division_03.jpg" width="181" height="116" /></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="three columns">
            <div class="right_index_service">
                <h4>NEW ARRIVALS</h4>
                <div class="ltm_tank">
                    <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/ltm_tank_img_03.jpg" /></a>
                    <p><i>LTM1500 with 84m Boom LTM1300</i></p>
                </div>
            </div>
        </div>
    </div>
</div>
