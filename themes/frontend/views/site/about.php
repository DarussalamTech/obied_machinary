<div class="row">
    <div class="about_services">
        <div class="three columns">
            <div class="about_list">
                <div class="about_listing">
                    <?php
                    echo CHtml::link('All Products', $this->createUrl('/site/allProducts'));
                    ?>
                </div>
                <?php
                $allSubCats = Categories::model()->childCategories();
                foreach ($allSubCats as $cat):
                    ?>
                    <div class="about_listing">
                        <?php
                        echo CHtml::link($cat->category_name, $this->createUrl('/site/categoryProducts', array('cat_slug' => $cat->slug)), array('title' => $cat->category_name));
                        ?>
                    </div>

                    <?php
                endforeach;
                ?>
            </div>
        </div>
        <div class="six columns">
            <div class="center_about_service">
                <div class="about_upper_part">
                    <h2>ABOUT OBEID MACHINERY</h2>
                    <p>30 experience-rich years of rock-solid reputation in the industry of heavy machinery and construction equipment. 
                        That’s what Obeid Machinery is about.
                        We started our operations in 1985 by trading used equipment all over Middle East and Asia.</p>
                    <p>Today, in response to the growing demand, we have established Affiliated Offices, such that we cover the globe, to provide a wide range of services and supply specialized equipment to meet the exact requirements of customers within the time frame.</p>
                    <section>Our office locations are:</section>
                    <article>Houston, U.S.</article>
                    <article>Dubai, (U.A.E)</article>
                    <article>Seoul, Korea</article>
                </div>



                <div class="center_about_part">
                    <h3>Our Divisions</h3>
                    <article>Our aim is to provide you the highest level of service, ensure your maximum satisfaction with our
                        service and we want to build long-term relationship with you.
                        We do not believe in making one-time sales. We believe in converting business deals into relationships.</article>
                    <article>We specialize in trading</article>
                    <p> 1) Mobile cranes</p>
                    <p>2) Other earth moving equipment</p>
                    <div class="divsion_div">
                        <div class='fulltext_division'>
                            <p>These are available for trading as well as rental purpose.
                                We hold strong beliefs and work towards making them a reality.
                                Our vision & mission statements clarify our philosophy, which is simple and focused:</p>
                            <p>
                                Obeid Machinery is a name synonymous to quality, trust and result.
                                You will realize that Obeid Machinery is a bond that is further
                                nurtured and nourished after each transaction.
                            </p>
                        </div>
                        <div class="my_read_more">
                            <a class="readmore" href="#">
                                <span>Read More</span>
                                <?php echo CHtml::image(Yii::app()->theme->baseUrl . '/images/read_more.png', ''); ?>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="lower_about_part" style='border-bottom: 1px solid #BBBBBB'>
                    <h3>Our Vision and Mission</h3>
                    <article>We hold strong beliefs and work towards making them a reality.
                        We have experience of 30- years in this industry and counting. It has helped
                        us understand the actual needs of our customers.  We assure you that you will
                        be satisfied with our services.</article>
                    <div class="vision_div">
                        <div class='fulltext_vision'>
                            <article>Our vision &amp; mission statements clarify our philosophy, which is simple and focused:</article>
                            <h4>Vision:</h4>
                            <section>TO BE THE TOP PRIORITY FOR THOSE SEEKING HEAVY MACHINERY</section>
                            <h4>Mission:</h4>
                            <section>TO PROVIDE BEST QUALITY SERVICE, MAXIMUM CUSTOMER SATISFACTION &amp;   ` BUILD LONG-TERM BOND WITH OUR WORTHY CUSTOMERS</section>
                            <p>Our aim is to provide you the highest level of service, ensure your maximum satisfaction with our service and we want
                                to build long-term relationship with you. We do not believe in making one-time sales.
                                We believe in converting business deals into relationships.</p>

                        </div>
                        <div class="my_read_more">
                            <a class="readmore" href="#">
                                <span>Read More</span>
                                <?php echo CHtml::image(Yii::app()->theme->baseUrl . '/images/read_more.png', ''); ?>
                            </a>
                        </div>
                    </div>




                </div>
            </div>
        </div>
        <div class="three columns">
            <?php
            $this->newArrivalWidget['newArrivals'] = array('name' => 'OMNewArrivals',
                'attributes' => array('cObj' => $this,
                //'cssFile' => Yii::app()->theme->baseUrl . "/css/side_bar.css",'is_cat_filter' => 0,
            ));
            if (isset($this->newArrivalWidget['newArrivals'])) {

                $this->widget($this->newArrivalWidget['newArrivals']['name'], $this->newArrivalWidget['newArrivals']['attributes']);
            }
            ?>
        </div>
    </div>
</div>
<script>
    jQuery(document).ready(function() {
        jQuery('.fulltext_vision').hide();
        jQuery('.fulltext_division').hide();

        jQuery('.vision_div .my_read_more .readmore').click(function(event) {
            event.preventDefault();
            jQuery(this).parent().parent().find('.fulltext_vision').slideToggle('slow');
            jQuery(this).children().text(jQuery(this).children().text() == 'Close DetailClose Detail' ? 'Read More' : 'Close Detail');
            if (jQuery(this).children().text() == 'Read MoreRead More')
            {
                jQuery('.vision_div .my_read_more .readmore img').css("-moz-transform", "rotate(-360deg)")
            }
            else
            {
                jQuery('.vision_div .my_read_more .readmore img').css("-moz-transform", "rotate(-180deg)")
            }
        });
        jQuery('.divsion_div .my_read_more .readmore').click(function(event) {
            event.preventDefault();
            jQuery(this).parent().parent().find('.fulltext_division').slideToggle('slow');
            jQuery(this).children().text(jQuery(this).children().text() == 'Close DetailClose Detail' ? 'Read More' : 'Close Detail');
            if (jQuery(this).children().text() == 'Read MoreRead More')
            {
                jQuery('.divsion_div .my_read_more .readmore img').css("-moz-transform", "rotate(-360deg)")
            }
            else
            {
                jQuery('.divsion_div .my_read_more .readmore img').css("-moz-transform", "rotate(-180deg)")
            }
        });
    });
</script>
<script type="text/javascript" language="javascript">
//<!--Disabling right click on widget-->
    jQuery(document).ready(function()
    {
        jQuery(".kbox").bind('contextmenu', function(e) {
            return false;
        });
    });
</script>
