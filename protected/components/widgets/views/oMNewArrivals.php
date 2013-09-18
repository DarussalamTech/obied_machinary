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
    ?>
    <div class="right_index_service">
        <h4>NEW ARRIVALS</h4>
        <div class="ltm_tank">
            <?php
            $new_img = $new->getImage();
            echo isset($new_img[0]) ? CHtml::link(CHtml::image($new_img[0]['image_small']), Yii::app()->createUrl('/site/productDetail', array('category' => $category_url, 'slug' => $new->slug))) : "";
            ?>
            <p><i>
                    <?php echo $new->product_name; ?>
                </i>
            </p>
        </div>
    </div>
<?php } ?>