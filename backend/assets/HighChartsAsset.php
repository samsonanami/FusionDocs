<?php
namespace backend\assets;

use yii\web\AssetBundle;

class HighChartsAsset extends AssetBundle
{
  public $sourcePath = '../../bower_components/highcharts';
  public $css = [];
  public $js = [
    'highcharts.js',
    'highcharts-more.js',
    'bower_components/jquery/dist/jquery.min.js',
    'bower_components/bootstrap/dist/js/bootstrap.min.js',
    'bower_components/chart.js/Chart.js',
    'bower_components/fastclick/lib/fastclick.js',
    'dist/js/adminlte.min.js',
    'dist/js/demo.js',
    'js/file-explore.js',
  ];
}
