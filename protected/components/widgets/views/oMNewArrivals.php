<?php
/**
 * OMNewArrivals class to handle 
 * the new arrivals of the products
 * 
 * @author ubaid
 */
$criteria = new CDbCriteria();
$criteria->select = "*";
$criteria->limit = '1';
$criteria->order = 'id DESC';
$new_arrivals = Products::model()->findAll($criteria);
foreach ($new_arrivals as $new) {
    $category_url = str_replace(" ", "-", $new->category->category_name);
    $new_img = $new->getImage();
    ?>
    <div class="right_index_service">
        <h4>NEW ARRIVALS</h4>
        <div class="kbox" style ="margin:4px;"> 
            <?php
            //echo isset($p_images[0]) ? CHtml::link(CHtml::image($p_images[0]['image_large'], '', array('class' => 'productimage')), $this->createUrl('/site/productDetail', array('category' => $category_url, 'slug' => $product->slug))) : "";
            echo CHtml::link(CHtml::image($new_img[0]['image_large'], '', array('class' => 'productimage')), $new_img[0]['image_large'], array("rel" => 'lightbox[_default]'));
            ?>
            <?php
            echo "<div style='font-weight:bold'>";
            echo CHtml::link((strlen($new->product_name) > 20) ? substr($new->product_name, 0, 20) . '...' : $new->product_name, Yii::app()->createUrl('/site/productDetail', array('category' => $category_url, 'slug' => $new->slug)));
            echo "</div>";
            ?>
            <div class="productdescript">
                <?php
                echo CHtml::link((strlen($new->product_description) > 53) ? substr($new->product_description, 0, 53) . ' ...' : $new->product_description, Yii::app()->createUrl('/site/productDetail', array('category' => $category_url, 'slug' => $new->slug)));
                ?>
            </div>

            <?php
            if ($new->product_service_type == "Rental") {

                $css_class = 'rental_price';
                ?>
                <div class="<?php echo $css_class; ?>"> 
                    <div class="division_type">
                        <?php echo $new->product_service_type; ?>
                    </div>
                    <div class="rental_tag_price">
                        <?php echo!empty($new->price) ? round($new->price) : ""; ?> USD
                        <?php 
                        if(!empty($new->price) && $new->price != 0){
                        echo!empty($new->price_per_variable) ? "P&nbsp/&nbsp" . $new->price_per_variable : "";
                        }
                        ?>
                    </div>
                </div> 
                <?php
            } else {
                $css_class = 'trading_price';
                ?>
                <div class="<?php echo $css_class; ?>"> 
                    <div class="division_type">
                        <?php echo $new->product_service_type; ?>
                    </div>
                    <div class="trading_tag_price">
                        <?php echo!empty($new->price) ? round($new->price) : ""; ?> USD
                    </div>
                </div> 
                <?php
            }
            ?> 
        </div>
    </div>
<?php } ?>
<?php
$this->widget('ext.lyiightbox.LyiightBox2', array(
));
?>