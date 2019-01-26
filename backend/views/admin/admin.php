 <?php

use backend\models\TrDirectories;
use backend\models\User;

use yii\widgets\Pjax;
use yii\grid\GridView;

use backend\assets\HighChartsAsset;
HighChartsAsset::register($this);

/* @var $this yii\web\View */

$this->title = 'FusionSacco :: Admin';
// getting summaries
$time = time();
$date = "20".date('y-m-d',$time);

$user = user::find()->count();

?>
<div class="loans-index">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><?=Html::encode($this->title);?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo Yii::$app->homeUrl?>"><i class="fa fa-dashboard"></i> Home</a></li>
         </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
        <div class="groups-index">
        <p>
            <?= Html::a('Create Loans', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
        
<!-- /.box-body -->
</div>

<div class="box-footer">
  <!-- footer area -->
</div>
<!-- /.box-footer-->

</section>
<!-- /.content -->


