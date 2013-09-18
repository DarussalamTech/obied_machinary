<div class="row">
    <div class="terrain_services">
        <div class="three columns">
            <div class="about_list">
                <?php
                $allSubCats = Categories::model()->childCategories();
                foreach ($allSubCats as $cat):
                    ?>
                    <div class="about_listing <?php echo ($cat->id == $cat_id) ? "terrain_list" : "" ?>">
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
                <h2>We specialize in Trading Products</h2>
                <article>30 experience-rich years of rock-solid reputation in the industry of heavy machinery and construction equipment. That’s what Obeid Machinery is about.</article>
                <article>We started our operations in 1985 by trading used equipment all over Middle East and Asia.</article>
                <?php
                $serial = 1;
                foreach ($category_products as $product):
                    $p_images = $product->getImage();
                    $category_url = str_replace(" ", "-", $product->category->category_name);
                    ?>
                    <div class="four columns">
                        <div class="right_index_service">

                            <h4>Product <?php echo $serial; ?></h4>
                            <div class="ltm_tank">
                                <?php
                                echo isset($p_images[0]) ? CHtml::link(CHtml::image($p_images[0]['image_small']), $this->createUrl('/site/productDetail', array('category' => $category_url, 'slug' => $product->slug))) : "";
                                ?>
                                <p><i><?php echo $product->product_name; ?></i></p>
                            </div>
                        </div>
                    </div>
                    <?php
                    $serial++;
                endforeach;
                ?>
            </div>
        </div>
    </div>
</div>