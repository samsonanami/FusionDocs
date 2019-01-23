<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = 'User Loans';
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
       <?php
        $mydataProvider = new ActiveDataProvider([
        'query' => Articles::find()->with('author')->where(['Name'=>'Arno Slatius']),
        ]);
        ?>
        <?php Pjax::begin() ?>
        <?= GridView::widget([
            'dataProvider' => $mydataProvider,
            // 'filterModel' => $searchModel,
            'columns' => [
                // ['class' => 'yii\grid\SerialColumn'],

                'ln_id',
                'ln_customer_id',
                // 'lnp_id',
                'ln_released',
                'ln_maturity',
                // 'ln_repayment',
                'ln_repayment_count',
                'ln_principal',
                'ln_interest',
                // 'ln_interest_time',
                'ln_fees',
                // 'ln_penalty',
                'ln_due',
                // 'ln_paid',
                'ln_balance',
                'ln_status',
                // 'ln_description',
                // 'ln_processing_fee_perc',
                'ln_processing_fee',
                'ln_insurance_fee',
                // 'ln_loan_files',
                'ln_duration',
                'ln_duration_desc',

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


