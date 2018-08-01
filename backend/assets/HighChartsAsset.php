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
  ];
}
