<div class="row">
    <div class="our_services">
        <div class="three columns">
            <div class="about_list">
                <?php
                $allSubCats = Categories::model()->childCategories();
                foreach ($allSubCats as $cat):
                    ?>
                    <div class="about_listing">
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
            <div class="center_about_service">
                <h2>OBEID PARTNERS</h2>
                <p>30 experience-rich years of rock-solid reputation in the industry of heavy machinery and construction equipment. That’s what Obeid Machinery is about. We started our operations in 1985 by trading used equipment all over Middle East and Asia.
                </p>
                <div class="three columns">
                    <div class="clients_img">
                        <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/cat_img_03.jpg" /></a>
                    </div>
                </div>
                <div class="three columns">
                    <div class="clients_img">
                        <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/hyundai_img_03.jpg" /></a>
                    </div>
                </div>
                <div class="three columns">
                    <div class="clients_img">
                        <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/kawasaki_img_03.jpg" /></a>
                    </div>
                </div>
                <div class="three columns">
                    <div class="clients_img">
                        <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/demag_img_03.jpg" /></a>
                    </div>
                </div>
                <div class="three columns">
                    <div class="clients_img">
                        <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/kato_img_03.jpg" /></a>
                    </div>
                </div>
                <div class="three columns">
                    <div class="clients_img">
                        <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/tadano_img_03.jpg" /></a>
                    </div>
                </div>
                <div class="three columns">
                    <div class="clients_img">
                        <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/sany_img_03.jpg" /></a>
                    </div>
                </div>
                <div class="three columns">
                    <div class="clients_img">
                        <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/lorain_img_03.jpg" /></a>
                    </div>
                </div>
                <div class="three columns">
                    <div class="clients_img">
                        <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/terex_img_03.jpg" /></a>
                    </div>
                </div>
                <div class="three columns">
                    <div class="clients_img">
                        <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/kobelco_img_03.jpg" /></a>
                    </div>
                </div>
                <div class="three columns">
                    <div class="clients_img">
                        <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/komatsu_img_03.jpg" /></a>
                    </div>
                </div>
                <div class="three columns">
                    <div class="clients_img">
                        <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/soosan_img_03.jpg" /></a>
                    </div>
                </div>
                <div class="three columns">
                    <div class="clients_img">
                        <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/jcb_img_03.jpg" /></a>
                    </div>
                </div>
                <div class="three columns">
                    <div class="clients_img">
                        <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/farukawa_img_03.jpg" /></a>
                    </div>
                </div>
                <div class="three columns">
                    <div class="clients_img">
                        <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/tcm_img_03.jpg" /></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>