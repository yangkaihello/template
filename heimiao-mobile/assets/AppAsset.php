<?php

namespace mobile\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'template/css/reset.css',
    ];
    public $js = [
        'template/js/rem.js',
        //'static/js/jquery-1.10.1.min.js',
        'template/zepto/src/zepto.js',
        'template/zepto/src/event.js',
        'template/zepto/src/ajax.js',
    ];
    public $depends = [
        //'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];

    /**
     * @param $view View
     * @param $cssfile
     */
    public static function addCss($view, $cssfile) {
        $view->registerCssFile($cssfile, [AppAsset::className(), 'depends' => 'mobile\assets\AppAsset']);
    }

    /**
     * @param $view View
     * @param $cssfile
     */
    public static function addScript($view, $jsfile) {
        $view->registerJsFile($jsfile, [AppAsset::className(), 'depends' => 'mobile\assets\AppAsset']);
    }
}
