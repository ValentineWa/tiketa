<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
      "css/bootstrap.min.css",
        "css/font-awesome.min.css",
        "css/barfiller.css",
        "css/nowfont.css",
        "css/rockville.css",
        "css/magnific-popup.css",
        "css/owl.carousel.min.css",
        "css/slicknav.min.css",
        "css/style.css",
    ];
    public $js = [
        "js/jquery-3.3.1.min.js",
         "js/bootstrap.min.js",
        "js/jquery.magnific-popup.min.js",
        "js/jquery.nicescroll.min.js",
        "js/jquery.barfiller.js",
        "js/jquery.countdown.min.js",
        "js/jquery.slicknav.js",
        "js/owl.carousel.min.js",
        "js/main.js",
        "js/jquery.jplayer.min.js",
        "js/jplayerInit.js",

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
