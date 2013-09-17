<div class="row">
    <div class="about_services">
        <div class="three columns">
            <div class="about_list">
                <?php
                $allSubCats = Categories::model()->childCategories();
                foreach ($allSubCats as $cat):
                    ?>
                    <div class="about_listing">
                        <?php
                        echo CHtml::link($cat->category_name, $this->createUrl('/site/allProducts', array('slug' => $cat->slug)), array('title' => $cat->category_name));
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
                    <p>30 experience-rich years of rock-solid reputation in the industry of heavy machinery and construction equipment. That’s what Obeid Machinery is about.</p>
                    <p>We started our operations in 1985 by trading used equipment all over Middle East and Asia.</p>
                    <p>Today, in response to the growing demand, we have established Affiliated Offices, such that we cover the globe, to provide a wide range of services and supply specialized equipment to meet the exact requirements of customers within the time frame.</p>
                    <section>Our office locations are:</section>
                    <article>Houston, U.S.</article>
                    <article>Dubai, (U.A.E)</article>
                    <article>Seoul, Korea</article>
                </div>
                <div class="center_about_part">
                    <h3>We specializes in trading</h3>
                    <article>Mobile cranes</article>
                    <article>Other earth moving equipment</article>
                    <p>These are available for trading as well as rental purpose. (This will confuse the customers as the machines available for rent are not for sale and vice versa)</p>
                    <h4>We hold strong beliefs and work towards making them a reality. Our vision &amp; mission statements clarify our philosophy, which is simple and focused:</h4>
                </div>
                <div class="lower_about_part">
                    <p>We hold strong beliefs and work towards making them a reality.</p>
                    <p>Our vision &amp; mission statements clarify our philosophy, which is simple and focused:</p>
                    <h4>Vision:</h4>
                    <p>TO BE THE TOP PRIORITY FOR THOSE SEEKING HEAVY MACHINERY</p>
                    <h4>Mission:</h4>
                    <p>TO PROVIDE BEST QUALITY SERVICE, MAXIMUM CUSTOMER SATISFACTION &amp; BUILD LONG-TERM BOND WITH OUR WORTHY CUSTOMERS</p>
                    <p>Our aim is to provide you the highest level of service, ensure your maximum satisfaction with our service and we want to build long-term relationship with you. We do not believe in making one-time sales. We believe in converting business deals into relationships.</p>
                </div>
            </div>
        </div>
        <div class="three columns">
            <div class="right_index_service">
                <h4>NEW ARRIVALS</h4>
                <div class="ltm_tank">
                    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/ltm_tank_img_03.jpg" />
                    <p><i>LTM1500 with 84m Boom LTM1300</i></p>
                </div>
            </div>
        </div>
    </div>
</div>
