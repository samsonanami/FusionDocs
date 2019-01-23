<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->lnp_id;
\yii\web\YiiAsset::register($this);
?>

<div class="loanproducts-view">

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
      <div class="box">
        <div class="box-header with-border">
        <p>
        <?= Html::a('Update', ['update', 'id' => $model->lnp_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->lnp_id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
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
        <div class="groups-view">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'lnp_id',
                'lnp_name',
                'lnp_desc',
                'lnp_min_interest',
                'lnp_min_interest_desc',
                'lnp_max_interest',
                'lnp_max_interest_desc',
                'lnp_min_duration',
                'lnp_min_duration_desc',
                'lnp_max_duration',
                'lnp_max_duration_desc',
                'lnp_repayment_daily',
                'lnp_repayment_weekly',
                'lnp_repayment_biweekly',
                'lnp_repayment_monthly',
                'lnp_min_processing_fee',
                'lnp_max_processing_fee',
                'lnp_min_insurance_fee',
                'lnp_max_insurance_fee',
                'lnp_min_no_of_repayments',
                'lnp_max_no_of_repayments',
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


