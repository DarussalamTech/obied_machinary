
<div class="row">
    <div class="truck_images">
        <?php foreach ($child_categorie as $child): ?>
            <div class="three columns">
                <div class="under_truck">
                    <?php
                    echo CHtml::link(CHtml::image($child->show_image, '', array('calss' => 'crawel_cranes', 'style' => 'height:170px')), $this->createUrl('/site/allProducts', array('cat_slug' => $child->slug)), array('title' => $child->category_name));
                    ?>
                    <h1>
                        <i><?php echo $child->category_name; ?></i>
                    </h1>
                </div>
            </div>
        <?php endforeach; ?>


    </div>
</div>
<div class="row">
    <div class="index_services">
        <div class="nine columns">
            <div class="left_index_service">
                <h2>OUR SERVICES</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                <div class="four columns">
                    <div class="division">
                        <h3>Rental Division</h3>
                        <?php
                        echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/rental_division_03.jpg"), $this->createUrl('/site/division', array('type' => 'Rental')));
                        ?>
                    </div>
                </div>
                <div class="four columns">
                    <div class="division">
                        <h3>Trading Division</h3>
                        <?php
                        echo CHtml::link(CHtml::image(Yii::app()->theme->baseUrl . "/images/trading_division_03.jpg"), $this->createUrl('/site/division', array('type' => 'Trading')));
                        ?>
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
