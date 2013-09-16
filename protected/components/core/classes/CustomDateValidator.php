<?php

class CustomDateValidator extends CValidator
{

    public $compareAttribute;

    public function validateAttribute($model, $attribute)
    {

        $compareAttr=$this->compareAttribute;
        if (!empty($model->$compareAttr) && strtotime($model->$attribute) > strtotime($model->$compareAttr))
        {
            $model->addError($attribute, $model->getAttributeLabel($attribute) . " must be less than " . $model->getAttributeLabel($compareAttr));
            $res = false;
        }
    }
}
?>