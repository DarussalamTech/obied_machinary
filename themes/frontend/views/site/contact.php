<div class="row">
    <div class="our_services">
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
                <div class="contact_about_upper_part">
                    <div class="contact_us_contact">

                        <h2>CONTACT US</h2>
                        <h3>Office</h3>
                        <p>P.O. Box 89056,</p>
                        <p>Malaz, Shara Siteen,</p>
                        <p>Riyadh, Saudi Arabia</p>
                        <p><span>Tel:</span> + 966-114765659</p>
                        <p><span>Fax:</span> + 966-11476187 </p>
                        <h3>Contact Persons</h3><p></p>
                        <p>Mr Khalid Bhatti: +966-505442998</p>
                        <p>Mr Fahad Bhatti: +966-506516724 </p>


                        <table>
                            <?php
                            $form = $this->beginWidget('CActiveForm', array(
                                'id' => 'contact-formf',
                                'enableClientValidation' => FALSE,
                                'clientOptions' => array(
                                    'validateOnSubmit' => FALSE,
                                ),
                            ));
                            ?>
                            <tr>
                            <span style="color: red; font-size: 12px">
                                <?php
                                if ($model->hasErrors()):

                                    echo "* These fields cannot be empty";
                                endif;

                                if (!Yii::app()->user->hasFlash('contact') && !($model->hasErrors())):
                                    echo ' * Fields are Required';
                                endif;
                                ?>
                                <?php if (Yii::app()->user->hasFlash('contact')): ?>

                                    <div class="flash-success" style="color:green">
                                        <?php echo '<br/>' . Yii::app()->user->getFlash('contact'); ?>
                                    </div>

                                <?php endif; ?>
                            </span>
                            </tr>
                            <tr>
                                <td class="left_contact">
                                    <?php echo $form->labelEx($model, 'name'); ?>
                                </td>
                                <td class="right_contact">
                                    <?php echo $form->textField($model, 'name'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="left_contact">
                                    <?php echo $form->labelEx($model, 'email'); ?>
                                </td>
                                <td class="right_contact">
                                    <?php echo $form->textField($model, 'email'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="left_contact">
                                    <?php echo $form->labelEx($model, 'subject'); ?>
                                </td>
                                <td class="right_contact">
                                    <?php echo $form->textField($model, 'subject'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="left_contact">
                                    <?php echo $form->labelEx($model, 'body'); ?>
                                </td>
                                <td class="right_contact">
                                    <?php echo $form->textArea($model, 'body', array('rows' => 5, 'cols' => "")); ?>
                                </td>

                            </tr>
                            <?php if (CCaptcha::checkRequirements()): ?>
                                <tr>
                                    <td class="left_contact">
                                        <?php echo $form->labelEx($model, 'verifyCode'); ?>
                                    </td>
                                    <td class="right_contact">
                                        <?php $this->widget('CCaptcha', array('buttonLabel' => 'Refresh Code', 'buttonType' => 'link')); ?>

                                        <p style="font-size: 9px">Please enter the letters  shown in the above image</p>
                                        <?php echo $form->textField($model, 'verifyCode', array('class' => 'form_name')); ?>
                                    </td>
                                </tr>
                            <?php endif; ?>
                            <tr>
                                <td class="left_contact">
                                    <?php echo $form->labelEx($model, 'customer_copy_check'); ?>
                                </td>
                                <td class="right_contact" style='padding-top:11px'>
                                    <?php echo $form->checkBox($model, 'customer_copy_check'); ?>
                                </td>

                            </tr>
                            <tr>
                                <td class="left_contact">
                                    <?php //echo CHtml::submitButton('Send', array('class' => 'send_btn'));  ?>
                                </td><br>
                            <td class="right_contact"  style='padding-top:7px'>
                                <?php echo CHtml::submitButton('Send', array('class' => 'send_btn')); ?>
                            </td>

                            </tr>
                            <?php $this->endWidget(); ?>
                        </table>


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
<script type="text/javascript">
    jQuery(document).ready(function() {
        /*
         * snippet to clear the 
         * captcha value when 
         * validation failed..ubd
         */
        jQuery("#ContactForm_verifyCode").val("");
    })
    window.onload = function() {
        /*
         * code to change the captcha value on each page refresh after page load
         */
        jQuery('#yw0_button').trigger('click');
    }
</script>