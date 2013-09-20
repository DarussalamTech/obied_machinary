<div class="row">
    <div class="terrain_services">
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
        <div class="nine columns">
            <div class="terrain_images">
                <h2>We specialize in <?php echo $product_service_type; ?> Products</h2>
                <?php
                if ($product_service_type == "Rental") {
                    ?>
                    <article>
                        Our Rental division can provide you any equipment you are looking for, within a short period of time. With our skilled operators and mechanics we can also provide on-site maintenance or check-ups of our machines.
                        We specialize in the following equipment:
                        - Cranes ( Kato, Tadano, Sany, Lorain, Terex, Demag)
                        - Excavators (CAT, Kobelco, Komatsu, Soosan, Hyundai)
                        - Loaders (JCB, FURUKAWA, KAWASAKi, CAT)
                        - Forklifts (TCM, ETC)
                    </article>
                    <?php
                } else {
                    ?>
                    <article>
                        We also have a trading division for construction equipment.
                        We have been selling used construction machinery for the past 30 Years in The Kingdom Of Saudi Arabia and this is what we love doing.
                        All our machines are inspected thoroughly on arrival & departure to make sure you get the quality you deserve.
                    </article>
                    <?php
                }
                ?> 
                <div class='pagination'>
                    <?php
                    /**
                     * pagination
                     */
                    $this->widget('DTPager', array(
                        'pages' => $dataProvider->pagination,
                        'ajax' => true,
                            )
                    );
                    ?>
                </div>
                <?php
                foreach ($category_products as $product):
                    $p_images = $product->getImage();
                    $category_url = str_replace(" ", "-", $product->category->category_name);
                    ?>


                    <div class="kbox"> 
                        <?php
                        //echo isset($p_images[0]) ? CHtml::link(CHtml::image($p_images[0]['image_large'], '', array('class' => 'productimage')), $this->createUrl('/site/productDetail', array('category' => $category_url, 'slug' => $product->slug))) : "";
                        echo CHtml::link(CHtml::image($p_images[0]['image_large'], '', array('class' => 'productimage')), $p_images[0]['image_large'], array("rel" => 'lightbox[_default]'));
                        ?>
                        <?php
                        echo "<div style='font-weight:bold'>";
                        echo CHtml::link((strlen($product->product_name) > 20) ? substr($product->product_name, 0, 20) . '...' : $product->product_name, $this->createUrl('/site/productDetail', array('category' => $category_url, 'slug' => $product->slug)));
                        echo "</div>";
                        ?>
                        <div class="productdescript">
                            <?php
                            echo CHtml::link((strlen($product->product_description) > 53) ? substr($product->product_description, 0, 53) . ' ...' : $product->product_description, $this->createUrl('/site/productDetail', array('category' => $category_url, 'slug' => $product->slug)));
                            ?>
                        </div>

                        <?php
                        if ($product->product_service_type == "Rental") {

                            $css_class = 'rental_price';
                            ?>
                            <div class="<?php echo $css_class; ?>"> 
                                <div class="division_type">
                                    <?php echo $product->product_service_type; ?>
                                </div>
                                <div class="rental_tag_price">
                                    <?php echo!empty($product->price) ? round($product->price) : ""; ?> USD
                                    <?php echo!empty($product->price_per_variable) ? "P&nbsp/&nbsp" . $product->price_per_variable : ""; ?>
                                </div>
                            </div> 
                            <?php
                        } else {
                            $css_class = 'trading_price';
                            ?>
                            <div class="<?php echo $css_class; ?>"> 
                                <div class="division_type">
                                    <?php echo $product->product_service_type; ?>
                                </div>
                                <div class="trading_tag_price">
                                    <?php echo!empty($product->price) ? round($product->price) : ""; ?> USD
                                </div>
                            </div> 
                            <?php
                        }
                        ?>  
                    </div>

                    <?php
                endforeach;
                ?>
            </div>
        </div>
    </div>
</div>
<?php
$this->widget('ext.lyiightbox.LyiightBox2', array(
));
?>