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
                            <li><?php echo CHtml::link('Home', Yii::app()->createUrl('/site/index')); ?></li>
                            <li><?php echo CHtml::link('About Us', Yii::app()->createUrl('/site/page?view=about')); ?></li>
                            <li><?php echo CHtml::link('Our Services', Yii::app()->createUrl('/site/services')); ?></li>
                            <li><a href="#">Cranes Wanted</a></li>
                            <li><?php echo CHtml::link('Clients', Yii::app()->createUrl('/site/clients')); ?></li>
                            <li><?php echo CHtml::link('Contact Us', Yii::app()->createUrl('/site/contact')); ?></li>
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
                    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/banner_1_03.png" class="main_banner_img" />
                </div>
                <div class="row">
                    <div class="eight columns">
                        <div class="banner_text">
                            <h1>ABOUT OBEID MACHINERY</h1>
                            <p><i>30 experience-rich years of rock-solid reputation in the industry of heavy machinery and construction equipment. That’s what Obeid Machinery is about.</i></p>
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