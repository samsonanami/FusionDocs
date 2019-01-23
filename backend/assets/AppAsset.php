<?php

namespace backend\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        // For folder tree
        'css/AdminLTE.min.css',
        'css/site.css',
        'css/style.css',
        'css/main.css',
        'css/file-explore.css',
        'bower_components/font-awesome/css/font-awesome.min.css',
        'bower_components/Ionicons/css/ionicons.min.css',
        'bower_components/jvectormap/jquery-jvectormap.css.css',
        'dist/css/skins/_all-skins.min.css',
        'dist/css/skins/skin-green.min',
        'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic',
        'plugins/iCheck/square/blue.css',
        'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.9/css/fileinput.min.css',
    ];
    public $js = [
        'js/jquery-3.3.1.min.js',
        'jspdf/jquery/jquery-1.7.1.min.js',
        'js/main.js',
        'bower_components/fastclick/lib/fastclick.js',
        'bower_components/jquery-sparkline/dist/jquery.sparkline.min.js',
        'plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
        'plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
        'bower_components/jquery-slimscroll/jquery.slimscroll.min.js',
        'bower_components/chart.js/Chart.js',
        'dist/js/pages/dashboard2.js',
        'js/adminlte.js',
        'bower_components/chart.js/Chart.js',
        'bower_components/fastclick/lib/fastclick.js',
        'dist/js/demo.js',
        'js/file-explore.js',
        'jspdf/jspdf.js',
        'jspdf/jspdf.plugin.standard_fonts_metrics.js',
        'jspdf/jspdf.plugin.split_text_to_size.js',
        'jspdf/jspdf.plugin.from_html.js',
        
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
