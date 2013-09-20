<?php
/* @var $this CategoriesController */
/* @var $model Categories */

$this->breadcrumbs = array(
    'Categories' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'Create Sub Categories', 'url' => array('create')),
    array('label' => 'List Sub Categories', 'url' => array('index')),
    array('label' => 'Create Categories', 'url' => array('createParent')),
    array('label' => 'List Categories', 'url' => array('indexParent')),
);
?>
<div class="pading-bottom-5">
    <div class="left_float">
        <h1>View Categories #<?php echo $model->id; ?></h1>
    </div>

    <?php /* Convert to Monitoring Log Buttons */ ?>
    <div class = "right_float">
        <span class="creatdate">
            <?php
            $url = "update";
            if($model->parent_id == 0){
                $url = "updateParent";
            }
            echo CHtml::link("Edit", $this->createUrl($url, array("id" => $model->primaryKey)), array('class' => "print_link_btn"));
            ?>
        </span>
    </div>
</div>


<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'category_name',
        'category_description',
        array(
            'name' => 'category_image',
            'value' => CHtml::link(CHtml::image($model->show_image,"",array('width'=>'100')),$model->show_image,array("target"=>"blank")),
            "type" => "raw"
        ),
        array(
            'name' => 'parent_id',
            'value' => isset($model->parent_cat) ? $model->parent_cat->category_name : "",
            'visible'=> isset($model->parent_cat)?true:false,
        ),
    ),
));
?>
