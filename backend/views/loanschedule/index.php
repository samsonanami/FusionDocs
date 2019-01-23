<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

$this->title = 'Loanschedules';
?>
<div class="loanschedule-index">
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
            'attribute' => 'sch_id',
            'label' => 'SERIAL',
            'headerOptions' => ['style' => 'text-align:left'],
        ],
        [
            'encodeLabel' => false,
            'attribute' => 'sch_desc',
            'label' => 'DESCRIPTION',
            'headerOptions' => ['style' => 'text-align:left'],
        ],
        [
            'encodeLabel' => false,
            'attribute' => 'sch_date',
            'label' => 'DUE DATE',
            'headerOptions' => ['style' => 'text-align:center'],
            'format' => 'DATE',
        ],

        [
            'encodeLabel' => false,
            'attribute' => 'sch_principal',
            'label' => 'RELEASED',
            'headerOptions' => ['style' => 'text-align:left'],
            'format'=>['decimal',0],
            'pageSummary' => true,
        ],
        [
            'encodeLabel' => false,
            'attribute' => 'sch_interest',
            'label' => 'INTEREST',
            'headerOptions' => ['style' => 'text-align:left'],
            'format'=>['decimal',0],
            'pageSummary' => true,
        ],
        [
            'encodeLabel' => false,
            'attribute' => 'sch_fee',
            'label' => 'FEE',
            'headerOptions' => ['style' => 'text-align:left'],
            'format'=>['decimal',0],
            'pageSummary' => true,
        ],
        [
            'encodeLabel' => false,
            'attribute' => 'sch_penalty_amount',
            'label' => 'PENALTY',
            'headerOptions' => ['style' => 'text-align:left'],
            'format' => 'integer',
            'format'=>['decimal',0],
            'pageSummary' => true,
        ], [
            'encodeLabel' => false,
            'attribute' => 'sch_interest',
            'label' => 'INTEREST',
            'headerOptions' => ['style' => 'text-align:left'],
            'format' => 'currency',
            'format'=>['decimal',0],
            'pageSummary' => true,
        ], [
            'encodeLabel' => false,
            'attribute' => 'sch_due_amt',
            'label' => 'DUE AMOUNT',
            'headerOptions' => ['style' => 'text-align:left'],
            'format' => 'currency',
            'format'=>['decimal',2],
            'pageSummary' => true,
        ],
        [
            'encodeLabel' => false,
            'attribute' => 'sch_ln_id',
            'label' => 'LOAN #',
            'headerOptions' => ['style' => 'text-align:left'],
        ],
        [
            'attribute' => 'sch_status',
            'label' => 'Status',
            'encodeLabel' => false,
            'headerOptions' => ['style' => 'text-align:center'],
            'contentOptions' => function ($data, $key, $index, $column) {
                if ($data->sch_status == 0) {
                    return ['class' => 'btn btn-block btn-flat btn-sm bg-orange'];
                } else if ($data->sch_status == 1) {
                    return ['class' => 'btn btn-block btn-flat btn-sm bg-olive'];
                } else {
                    return ['class' => 'btn btn-block btn-flat btn-sm bg-gray'];
                }
            },
            'value' => function ($data, $key, $index, $column) {
                if ($data->sch_status == 0) {
                    return 'Not paid';
                } else if ($data->sch_status == 1) {
                    return 'Fully paid';
                } else {
                    return 'Error';
                }
            },
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


