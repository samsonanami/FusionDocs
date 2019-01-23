<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->lnrp_id;

\yii\web\YiiAsset::register($this);
?>
<div class="content-wrapper">
      <div class="box">
        <div class="box-header with-border">
          <p>Loan Repayment</p>
          <p>
            <?=Html::a('Update', ['update', 'id' => $model->lnrp_id], ['class' => 'btn btn-flat bt-md bg-aqua margin pull-left'])?>
            <?=Html::a('Delete', ['delete', 'id' => $model->lnrp_id], [
                'class' => 'btn btn-flat bg-maroon margin',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])?>
            </p>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'lnrp_id',
                'lnrp_ln_id',
                'lnrp_payment_method',
                'lnrp_collection_date',
                'lnrp_paid_amount',
                'lnrp_extra_payment',
                'lnrp_collected_by',
                'lnrp_reference',
            ],
        ]) ?>
        <!-- /.box-body -->
        </div>
</div>
</div>
