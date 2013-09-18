<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle = Yii::app()->name . ' - Error';
$this->breadcrumbs = array(
    'Error',
);
?>



<div class="error">
    <?php
    echo '.';
    ?>
    <div class="error_code">
        <?php
        echo 'Ooops ! Error : '.$error['code'];
        echo '<br>';
        echo '<br>';
        ?>
    </div>
    <?php
    echo CHtml::encode($error['message']);
    ?>
</div>