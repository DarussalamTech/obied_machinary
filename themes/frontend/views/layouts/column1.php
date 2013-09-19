<?php $this->beginContent('//layouts/main'); ?>

<header>
    <div class="row">
        <div id="header">
            <div class="twelve columns">
                <div class="four columns">
                    <div class="logo">
                        <?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . '/images/obeid_machinery_logo_03.png'), Yii::app()->createUrl('/site/index')); ?>
                    </div>
                </div>
                <div class="eight columns">
                    <div class="right_header">
                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/hook_img_02.png" />
                        <?php if (Yii::app()->user->id): ?>
                            <div class='logout'>
                                <?php echo CHtml::link("Admin Logout", $this->createUrl('/site/logout')); ?>
                            </div>
                        <?php endif; ?>
                        <p>call:+971 0 111 2222</p>
                    </div>
                </div>
            </div>
            <div id="navigation">
                <div class="pretty navbar row" id="nav4">
                    <a class="toggle" gumby-trigger="#nav4 > ul" href="#"><i class="icon-menu"></i></a>
                    <nav>
                        <ul class="ten columns">
                            <?php
                            $dt_menu_array = array(
                                "index" => "Home",
                                "about" => "About Us",
                                "services" => "Our Services",
                                "wanted" => "Cranes Wanted",
                                "clients" => "Clients",
                                "contact" => "Contact Us",
                            );

                            foreach ($dt_menu_array as $key => $text) {
                                echo "<li>";
                                if ($this->action->id == $key) {
                                    echo CHtml::link($text, Yii::app()->createUrl("/site/" . $key), array("class" => "active"));
                                } else {
                                    echo CHtml::link($text, Yii::app()->createUrl("/site/" . $key));
                                }

                                echo "</li>";
                            }
                            ?>


                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="about_banner">
    <div class="row">
        <div class="banner_part">
            <div class="banner_main_part">
                <div class="twelve columns">
                    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/inner-banner.png" class="main_banner_img" />
                </div>
                <div class="seven columns">
                    <div class="about_hook">
                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/truck_hook_03.png" />
                    </div>
                </div>
                <?php echo $content; ?>

                <?php $this->endContent(); ?>