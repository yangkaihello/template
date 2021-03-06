<?php

namespace frontend\modules\template\assets;

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
        'template/css/style.css',
        'template/css/swiper.min.css',
        'template/css/sign2.css',
    ];
    public $js = [
        'template/js/jquery-1.11.3.min.js',
        'template/js/swiper.min.js',
        'template/js/action.js',
        'template/js/app.js',
        'template/js/calendar2.js',
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
        $view->registerCssFile($cssfile, [AppAsset::className(), 'depends' => 'frontend\modules\template\assets\AppAsset']);
    }

    /**
     * @param $view View
     * @param $jsfile
     */
    public static function addScript($view, $jsfile) {
        $view->registerJsFile($jsfile, [AppAsset::className(), 'depends' => 'frontend\modules\template\assets\AppAsset']);
    }
}
