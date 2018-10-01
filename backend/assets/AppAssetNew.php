<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAssetNew extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        // For folder tree
        'css/bootstrap.css',
        'css/style.css',
        'font-awesome.css',
        '//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese',
        '//fonts.googleapis.com/css?family=Cairo:200,300,400,600,700,900&amp;subset=arabic,latin-ext',
        'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',
        'css/file-explore.css',
        'bower_components/bootstrap/dist/css/bootstrap.min.',
        'bower_components/font-awesome/css/font-awesome.min.css',
        'bower_components/Ionicons/css/ionicons.min.css',
        'bower_components/jvectormap/jquery-jvectormap.css.css',
        'dist/css/AdminLTE.min.css',
        'dist/css/skins/_all-skins.min.css',
        'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic',
        'plugins/iCheck/square/blue.css',

    ];
    public $js = [
        'js/bootstrap.js',
        'js/cbpFWTabs.js',
        'js/jquery.swipebox.min.js',
        'js/scrolling-nav.js',
        'js/index.js',
        'js/aos.js',
        '"js/aos1.js',
        'js/SmoothScroll.min.js',
        'js/move-top.js',
        'js/easing.js',
        'js/form-submission-handler.js',

        'bower_components/jquery/dist/jquery.min.js',
        'bower_components/bootstrap/dist/js/bootstrap.min.js',
        'bower_components/fastclick/lib/fastclick.js',
        'js/adminlte.min.js',
        'bower_components/jquery-sparkline/dist/jquery.sparkline.min.js',
        'plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
        'plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
        'bower_components/jquery-slimscroll/jquery.slimscroll.min.js',
        'bower_components/chart.js/Chart.js',
        'dist/js/pages/dashboard2.js',
        'dist/js/demo.js',
        // For folder tree
        'https://code.jquery.com/jquery-1.12.4.min.js',
        'js/file-explore.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
