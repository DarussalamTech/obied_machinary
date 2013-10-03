<div class="row">
    <div class="our_services">
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
                    <h2>OUR SERVICES</h2>
                    <p>We never compromise on the quality of our products and services. Customer preference is our top priority,
                        along with maximum customer satisfaction, and relationship-building.</p>
                    <div class="left_index_service" style="width: 154%;">

                        <div class="four columns">
                            <div class="division">
                                <h3 style="font-style:normal">Rental Division</h3>
                                <?php
                                echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/trading_new.jpg", '', array('style' => 'height:157px')), $this->createUrl('/site/division', array('type' => 'Rental')));
                                ?>
                            </div>
                        </div>
                        <div class="four columns">
                            <div class="division">
                                <h3 style="font-style:normal">Sales Division</h3>
                                <?php
                                echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/rental_new1.jpg", '', array('style' => 'height:157px')), $this->createUrl('/site/division', array('type' => 'Sales')));
                                ?>
                            </div>
                        </div>
                    </div>
                    <h3>Our services include:</h3>
                    <ul>
                        <li>Trading of used construction equipment</li>
                        <li>Rental facility of any equipment required</li>
                    </ul>

                    <h3>Rental Division</h3>
                    <p>Our Rental division can provide you any equipment you are looking for, within a short period of time.</p>
                    <div class="rental_div">
                        <div class='fulltext_renttal'>
                            <p> With our skilled operators and mechanics we can also provide on-site maintenance or check-ups of our machines. </p>
                            <p>We specialize in the following equipment:</p>
                            <li>Cranes ( Kato, Tadano, Sany, Lorain, Terex, Demag)</li>
                            <li>Excavators (CAT, Kobelco, Komatsu, Soosan, Hyundai)</li>
                            <li>Loaders (JCB, FURUKAWA, KAWASAKi, CAT)</li>
                            <li>Forklifts (TCM, ETC)</li>
                        </div>
                        <a class="readmore" href="#">Read More..</a>
                    </div>


                    <h3>Sales Division</h3>
                    <p>We also have a trading division for construction equipment. And here’s the best part: Apart from the 
                        listed equipment we can arrange any equipment that you are
                        looking for, within the time frame you assign us. And we deliver it to wherever you want!</p>
                    <div class="sale_div">
                        <div class='fulltext_sale'>
                            <p>We also have a trading division for construction equipment.We have been 
                                selling used construction machinery for the past 30
                                Years in The Kingdom Of Saudi Arabia and this is what we love doing.
                                All our machines are inspected thoroughly on arrival &amp; departure 
                                to make sure you get the quality you deserve.
                                We specialize in the following equipment: </p>
                            <ol>
                                <li><h4>Cranes</h4>
                                    <ul>
                                        <li>Rough terrain</li>
                                        <li>Truck Mounted</li>
                                        <li>All-Terrain</li>
                                    </ul>
                                </li>
                                <li><h4>Excavators</h4>
                                    <ul>
                                        <li>Wheel Excavators</li>
                                        <li>Track Excavators</li>
                                        <li>Mini Excavators </li>
                                    </ul>
                                </li>
                                <li><h4>Loaders</h4>
                                    <ul>
                                        <li>Wheel Loaders</li>
                                        <li>JCB Loaders</li>
                                    </ul>
                                </li>
                                <li><h4>Road Pavement Equipment</h4></li>
                                <li><h4>Trucks</h4></li>
                                <li><h4>Man Lifts</h4></li>
                            </ol>
                        </div>
                        <a class="readmore" href="#">Read More..</a>
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
        jQuery('.fulltext_renttal').hide();
        jQuery('.fulltext_sale').hide();

        jQuery('.rental_div .readmore').click(function(event) {
            event.preventDefault();
            jQuery(this).parent().find('.fulltext_renttal').slideToggle('slow');
            jQuery(this).text(jQuery(this).text() == 'Close' ? 'More Detials' : 'Close');
        });
        jQuery('.sale_div .readmore').click(function(event) {
            event.preventDefault();
            jQuery(this).parent().find('.fulltext_sale').slideToggle('slow');
            jQuery(this).text(jQuery(this).text() == 'Close' ? 'More Detials' : 'Close');
        });
    });
</script>