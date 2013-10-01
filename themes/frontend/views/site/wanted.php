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
                    <h2>Cranes Wanted</h2>
                    <p> Purchasing inappropriate equipment is a business decision with several repercussions along with the obvious shocks.
                        Choosing dealers and suppliers from the cluttered market often proves to be a hassle. </p>
                    <p>Here’s the list of machinery we are looking out for:</p>
                    <ol>
                        <?php foreach ($product_wanted as $wanted): ?>
                            <li style="font-size: 12px; color: #171717;">
                                <span style='font-weight: bold; font-size: 14px;color: #2C2C2C'>
                                    <?php echo!empty($wanted->wanted_name) ? $wanted->wanted_name : ""; ?>
                                </span><br>
                                <span style='font-weight: bold; font-size: 12px; color: #2C2C2C'>Description : </span>
                                <?php echo!empty($wanted->wanted_description) ? $wanted->wanted_description : ""; ?>
                                <br>
                            </li>
                        <?php endforeach; ?>
                    </ol>
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
