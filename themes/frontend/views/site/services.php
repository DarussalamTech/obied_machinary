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
        <div class="six columns">
            <div class="center_about_service">
                <div class="about_upper_part">
                    <h2>OUR SERVICES</h2>
                    <p>We never compromise on the quality of our products and services. Customer preference is our top priority, along with maximum customer satisfaction, and relationship-building.</p>
                    <p>Our services include:</p>
                    <p>Trading of used construction equipment</p>
                    <p>Rental facility of any equipment required</p>
                    <p>On-site maintenance of our machines <span>(please specify that this is only for the rental equipment)</span></p>
                    <p>On-site check-ups of our machines <span>(please specify that this is only for the rental equipment)</span></p>
                    <h3>Rental Division</h3>
                    <p>Our Rental division can provide you any equipment you are looking for, within a short period of time. With our skilled operators and mechanics we can also provide on-site maintenance or check-ups of our machines. </p>
                    <p>We specialize in the following equipment:</p>
                    <p>- Cranes ( Kato, Tadano, Sany, Lorain, Terex, Demag)</p>
                    <p>- Excavators (CAT, Kobelco, Komatsu, Soosan, Hyundai)</p>
                    <p>- Loaders (JCB, FURUKAWA, KAWASAKi, CAT)</p>
                    <p>- Forklifts (TCM, ETC)</p>
                    <h3>Trading Division</h3>
                    <p>We also have a trading division for construction equipment.</p>
                    <p>We have been selling used construction machinery for the past 30 Years in The Kingdom Of Saudi Arabia and this is what we love doing.</p>
                    <p>All our machines are inspected thoroughly on arrival &amp; departure to make sure you get the quality you deserve.</p>
                    <p>We specialize in the following equipment: </p>
                    <h4>1)	Cranes</h4>
                    <li>Rough terrain</li>
                    <li>Truck Mounted</li>
                    <li>All-Terrain</li>
                    <h4>2)	Excavators</h4>
                    <li>Wheel Excavators</li>
                    <li>Track Excavators</li>
                    <li>Mini Excavators </li>
                    <h4>3)	Loaders </h4>
                    <li>Wheel Loaders</li>
                    <li>JCB Loaders</li>
                    <h4>4)	Road Pavement Equipment</h4>
                    <h4>5)	Trucks</h4>
                    <h4>6)	Man Lifts</h4>
                    <p>And here’s the best part: Apart from the listed equipment we can arrange any equipment that you are looking for, within the time frame you assign us. And we deliver it to wherever you want!</p>
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