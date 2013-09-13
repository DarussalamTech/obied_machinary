<?php $this->beginContent('//layouts/main'); ?>
<header>
    <div class="row">
        <div id="header">
            <div class="twelve columns">
                <div class="three columns">
                    <div class="logo">
                        <?php echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . '/images/obeid_machinery_logo_03.png'), Yii::app()->createUrl('/site/index')); ?>
                    </div>
                </div>
                <div class="nine columns">
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
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Cranes Wanted</a></li>
                            <li><a href="#">Clients</a></li>
                            <li><?php echo CHtml::link('Contact Us', Yii::app()->createUrl('/site/contact')); ?></li>
                            <li style='text-align: right'><?php echo CHtml::link('Admin', Yii::app()->createUrl('/site/contact')); ?></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<?php echo $content; ?>

<?php $this->endContent(); ?>