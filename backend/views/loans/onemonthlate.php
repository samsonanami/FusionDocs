<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

$this->title = 'Loans View';
?>
<div class="loans-index">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><?=Html::encode($this->title);?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo Yii::$app->homeUrl ?>"><i class="fa fa-dashboard"></i> Home</a></li>
         </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
        <p><?= $this->title; ?></p>

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

        <?php Pjax::begin()?>
        <?=GridView::widget([
    'dataProvider' => $dataProvider,
    // 'filterModel' => $searchModel,
   'layout' => '{items}{pager}{summary}',
   'showPageSummary' => true,

    'columns' => [
        // ['class' => 'yii\grid\SerialColumn'],

        [
            'encodeLabel' => false,
            'attribute' => 'ln_name',
            'label' => 'LOAN NAME',
            'headerOptions' => ['style' => 'text-align:left'],
        ],
        [
            'encodeLabel' => false,
            'attribute' => 'ln_id',
            'label' => 'LOAN NO',
            'headerOptions' => ['style' => 'text-align:left'],
            'format' => 'decimal',
        ],

        [
            'encodeLabel' => false,
            'attribute' => 'ln_released',
            'label' => 'RELEASED',
            'headerOptions' => ['style' => 'text-align:left'],
            'format' => 'DATE',
        ],
        [
            'encodeLabel' => false,
            'attribute' => 'ln_maturity',
            'label' => 'MATURITY',
            'headerOptions' => ['style' => 'text-align:left'],
            'format' => 'date',
        ],
        [
            'encodeLabel' => false,
            'attribute' => 'ln_principal',
            'label' => 'PRINCIPAL',
            'headerOptions' => ['style' => 'text-align:left'],
            'format'=>['decimal',0],
            // 'pageSummary' => true,
        ],
        [
            'encodeLabel' => false,
            'attribute' => 'ln_repayment_count',
            'label' => 'REPAYMENTS',
            'headerOptions' => ['style' => 'text-align:left'],
            'format' => 'integer',
            // 'format'=>['decimal',0],
            // 'pageSummary' => true,
        ], [
            'encodeLabel' => false,
            'attribute' => 'ln_interest',
            'label' => 'INTEREST',
            'headerOptions' => ['style' => 'text-align:left'],
            'format' => 'currency',
            // 'format'=>['decimal',0],
            // 'pageSummary' => true,
        ], [
            'encodeLabel' => false,
            'attribute' => 'ln_balance',
            'label' => 'BALANCE',
            'headerOptions' => ['style' => 'text-align:left'],
            'format' => 'currency',
            // 'format'=>['decimal',0],
            // 'pageSummary' => true,
        ],
        [
            'encodeLabel' => false,
            'attribute' => 'ln_due',
            'label' => 'DUE',
            'headerOptions' => ['style' => 'text-align:left'],
            'format' => 'date',
            // 'format'=>['decimal',0],
            // 'pageSummary' => true,
        ],
        [
            'encodeLabel' => false,
            'attribute' => 'ln_fees',
            'label' => 'FEES',
            'headerOptions' => ['style' => 'text-align:left'],
            'format' => 'date',
            // 'format'=>['decimal',0],
            // 'pageSummary' => true,
        ],

        ['class' => 'kartik\grid\ActionColumn'],
    ],
]);?>
    <?php Pjax::end();?>
<!-- /.box-body -->
</div>

<div class="box-footer">
  <!-- footer area -->
</div>
<!-- /.box-footer-->

</section>
<!-- /.content -->


