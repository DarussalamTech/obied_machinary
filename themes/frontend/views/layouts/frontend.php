<?php $this->beginContent('//layouts/main'); ?>
<script type="text/javascript">

    /**
     * slider timings
     * @type undefined
     */
    var slider_timings = <?php echo!empty(Yii::app()->params['slider_time']) ? Yii::app()->params['slider_time'] : 3; ?>;
    jQuery(document).ready(function() {
        // dtech.makeSlider();

//            jQuery(".ten columns, li").children().each(function() {
//                jQuery('.ten columns, li').children().hover(function(){
//                jQuery('.ten columns, li').children().removeClass('active');
//                        })
//
//                    })

    });
</script>
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
                        <p>call:+ 971 4 8817541</p>
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
<div class="banner">
    <div class="row">
        <div class="banner_part">
            <div class="banner_main_part">
                <div class="twelve columns">
                    <div id="banner" style="height: 329px">
                        <?php
                        $this->widget('application.extensions.seqimage.SeqImage', array(
                            'widthImage' => 938,
                            'timeDelay' => 3500,
                            'timeDelayInitial' => 3500,
                            //'heightImage' => 360,
                            'slides' => array(
                                array(
                                    'image' => array('src' => Yii::app()->theme->baseUrl . '/images/slider/slider_1.jpg'),
                                // 'link' => array('url' => 'mypage', 'htmlOptions' => array('class' => 'main_banner_img'))
                                ),
                                array(
                                    'image' => array('src' => Yii::app()->theme->baseUrl . '/images/slider/slider_2.jpg'),
                                ),
                                array(
                                    'image' => array('src' => Yii::app()->theme->baseUrl . '/images/slider/slider_1.jpg'),
                                ),))
                        );
                        ?>
                        <!--                        <div class="banner_dots" style='position: absolute'>
                        
                                                    <a id="cs-button-coin-1" class="cs-button-coin cs-active" href="javascript:void(0)">1</a>
                                                    <a id="cs-button-coin-2" class="cs-button-coin" href="javascript:void(0)">2</a>
                                                    <a id="cs-button-coin-3" class="cs-button-coin" href="javascript:void(0)">3</a>
                        
                                                </div>-->
                        <!--                        <div id="banner_slider_1" class="banner_slider">
                                                    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/slider/slider_1.jpg" class="main_banner_img" />
                                                </div>
                                                <div id="banner_slider_2" class="banner_slider" style="display:none">
                                                    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/slider/slider_2.jpg" class="main_banner_img" />
                                                </div>
                                                <div id="banner_slider_3" class="banner_slider" style="display:none">
                                                    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/slider/slider_1.jpg" class="main_banner_img" />
                                                </div>-->

                    </div>

                </div>
                <div class="row">
                    <div class="eight columns">
                        <div class="banner_text">
                            <h1>ABOUT OBEID MACHINERY</h1>
                            <p><i>Obeid Machinery is a name synonymous to quality, trust and result. You will realize that Obeid Machinery is a bondthat is furthernurtured and nourished after each transaction.</i></p>
                        </div>
                    </div>
                    <div class="four columns">
                        <div class="big_hook">
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/truck_hook_03.png" />
                        </div>
                    </div>
                </div>
                <?php echo $content; ?>

                <?php $this->endContent(); ?>
                