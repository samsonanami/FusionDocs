<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Groups */

$this->title = $model->grp_id;
\yii\web\YiiAsset::register($this);
?>
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
      <div class="box box-default box-solid">
        <div class="box-header with-border box-profile">
           <small>Update Group</small>
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
                <?= Html::a('Update', ['update', 'id' => $model->grp_id], ['class' => 'btn btn-flat bg-success']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->grp_id], [
                    'class' => 'btn btn-flat bg-danger',
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
            'grp_id',
            'grp_name',
            'grp_leader_id'
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


