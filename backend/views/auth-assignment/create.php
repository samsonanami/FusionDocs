<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AuthAssignment */

$this->title = 'Create Auth Assignment';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="myDiv" class="animate-bottom">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
      <h1><?= Html::encode($this->title) ?></h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <small>Assign  User Rights</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">User Rights</a></li>
        <li class="active">Aunthentication</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Quick User Right Assignments</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
        <div class="auth-assignment-create">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

</div>
