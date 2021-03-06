<?php

/**
 * LyiightBox2 class file.
 *
 * @author Simone Gentili <sensorario@gmail.com>
 * @version 1.0
 */

/**
 * This widget encapsulates the LightBox2 script for popup images.
 *
 * ({@link https://github.com/sensorario/lyiightbox}).
 *
 * @author Simone Gentili <sensorario@gmail.com>
 */
class LyiightBox2 extends CWidget
{

    private $scripts = null;
    private $css = null;
    private $assetsFolder = null;
    private $assetsFolderName = 'assets';
    private $baseUrl = null;
    public $thumbnail = '';
    public $image = '';
    public $title = 'image';
    public $group = 'default';
    public $visible = true;

    private function populateCssArrayFiles()
    {
        $this->css = array(
            '/css/lightbox.css'
        );
    }

    private function populateJsarrayScripts()
    {
        $this->scripts = array(
            '/js/prototype.js',
            '/js/scriptaculous.js?load=effects,builder',
            '/js/lightbox.js',
        );
    }

    private function loadAllJsScript()
    {
        $this->populateJsarrayScripts();

        Yii::app()->getClientScript()->registerScript('_', 'lyiightboxAssetUrl = "' . (Yii::app()->getAssetManager()->publish($this->assetsFolder)) . '";', CClientScript::POS_HEAD);

        foreach ($this->scripts as $filename)
            Yii::app()->getClientScript()->registerScriptFile($this->baseUrl . $filename, CClientScript::POS_END);
    }

    private function loadAllCssScripts()
    {
        $this->populateCssArrayFiles();
        foreach ($this->css as $filename)
            Yii::app()->getClientScript()->registerCssFile($this->baseUrl . $filename);
    }

    private function setAssetsFolder()
    {
        $this->assetsFolder = dirname(__FILE__) . DIRECTORY_SEPARATOR . $this->assetsFolderName;
        $this->baseUrl = CHtml::asset($this->assetsFolder);
    }

    private function printImage()
    {
        return $this->visible ? '<img src="' . $this->thumbnail . '" border="0" />' : '';
    }

    private function printLink()
    {
        if (empty($this->image))
        {
            return true;
        }
        echo '<a href="' . $this->image . '" rel="lightbox[_' . $this->group . ']" title="' . $this->title . '">' . $this->printImage() . '</a>';
    }

    public function init()
    {

        $this->setAssetsFolder();
        $this->loadAllJsScript();
        $this->loadAllCssScripts();
        $this->printLink();
    }

}