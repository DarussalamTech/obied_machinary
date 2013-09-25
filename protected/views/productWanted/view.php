<?php
/* @var $this ProductWantedController */
/* @var $model ProductWanted */

$this->breadcrumbs = array(
    'Product Wanteds' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'List Product Wanted', 'url' => array('index')),
    array('label' => 'Create Product Wanted', 'url' => array('create')),
);
?>

<h1>View ProductWanted #<?php echo $model->id; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'wanted_name',
        'wanted_description',
        array(
            'name' => 'wanted_image',
            'value' => CHtml::link(CHtml::image($model->show_image, "", array('width' => '150px', 'height' => '100px')), $model->show_image, array("target" => "blank", "rel" => 'lightbox[_default]')),
            "type" => "raw"
        ),
    ),
));
?>
<?php
$this->widget('ext.lyiightbox.LyiightBox2', array(
));
?>
