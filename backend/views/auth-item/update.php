<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AuthItem */

$this->title = 'Update Auth Item: ' . $model->name;
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
           
    <div class="box box-default box-solid">
    <div class="box-header with-border box-profile">
         Auth Item  Registration Form
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
        <div class="customers-index">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
<!-- /.box-body -->
</div>

</section>
<!-- /.content -->
</div>