<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->exp_id;

\yii\web\YiiAsset::register($this);
?>
<div class="expenses-view">
<div class="groups-update">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Groupt View : <?=Html::encode($this->title)?>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
           
    <div class="box box-primary box-solid">
    <div class="box-header with-border box-profile">
          Update Expenses
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
           <p>
            <?= Html::a('Update', ['update', 'id' => $model->exp_id], ['class' => 'btn btn-flat bg-aqua']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->exp_id], [
                'class' => 'btn btn-flat bg-maroon',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
        <div class="groups-view">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'exp_id',
                'exp_name',
                'exp_details:ntext',
                'exp_amt',
            ],
        ]) ?>
<!-- /.box-body -->
</div>

<div class="box-footer">
  <!-- footer area -->
</div>
<!-- /.box-footer-->

</section>
<!-- /.content -->


</div>


