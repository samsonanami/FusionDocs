<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = 'Loanproducts';
?>
<div class="loanproducts-index">
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
      
    <div class="box box-default box-solid">
    <div class="box-header with-border box-profile">
          <small>Loan Product List</small>
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
            <?= Html::a('Create Loanproducts', ['create'], ['class' => 'btn btn-flat btn-md bg-olive']) ?>
        </p>
        <?php Pjax::begin(); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                // ['class' => 'yii\grid\SerialColumn'],

                'lnp_id',
                'lnp_name',
                'lnp_desc',
                // 'lnp_min_interest',
                // 'lnp_min_interest_desc',
                //'lnp_max_interest',
                //'lnp_max_interest_desc',
                //'lnp_min_duration',
                //'lnp_min_duration_desc',
                //'lnp_max_duration',
                //'lnp_max_duration_desc',
                //'lnp_repayment_daily',
                //'lnp_repayment_weekly',
                //'lnp_repayment_biweekly',
                //'lnp_repayment_monthly',
                //'lnp_min_processing_fee',
                //'lnp_max_processing_fee',
                //'lnp_min_insurance_fee',
                //'lnp_max_insurance_fee',
                //'lnp_min_no_of_repayments',
                //'lnp_max_no_of_repayments',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
        <?php Pjax::end();?>
<!-- /.box-body -->
</div>

<div class="box-footer">
  <!-- footer area -->
</div>
<!-- /.box-footer-->

</section>
<!-- /.content -->

</div>