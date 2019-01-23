<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

$this->title = 'Pending Loans View';
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
      <div class="box box-default box-solid">
        <div class="box-header with-border box-profile">
            <small>List of all pending loans</small>
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
        'layout' => '{summary}{items}{pager}',
        'showPageSummary' => true,

        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            [
                'encodeLabel' => false,
                'attribute' => 'ln_name',
                'label' => 'Loan Name',
                'headerOptions' => ['class' => 'text-primary'],
                'pageSummary'=>"Grand Totals",
            ],
            [
                'encodeLabel' => false,
                'attribute' => 'ln_id',
                'label' => 'Loan #',
                'headerOptions' => ['class' => 'text-primary'],            // 'format' => 'decimal',
            ],

            [
                'encodeLabel' => false,
                'attribute' => 'ln_released',
                'label' => 'Release Date',
                'headerOptions' => ['class' => 'text-primary'],
                'format' => 'DATE',
            ],
            [
                'encodeLabel' => false,
                'attribute' => 'ln_maturity',
                'label' => 'Maturity Date',
                'headerOptions' => ['class' => 'text-primary'],
                'format' => 'date',
            ],
            [
                'encodeLabel' => false,
                'attribute' => 'ln_due',
                'label' => 'Due Date',
                'headerOptions' => ['class' => 'text-primary'],
                'format' => 'date',
                // 'format'=>['decimal',0],
                // 'pageSummary' => true,
                
            ],
            [
                'encodeLabel' => false,
                'attribute' => 'ln_principal',
                'label' => 'Principal Amt',
                'headerOptions' => ['class' => 'text-primary'],
                'format'=>['decimal',0],
                'pageSummary' => true,
            ],
            [
                'encodeLabel' => false,
                'attribute' => 'ln_repayment_count',
                'label' => 'Repayments',
                'headerOptions' => ['class' => 'text-primary'],
                'format' => 'integer',
                'format'=>['decimal',0],
                'pageSummary' => true,
            ], [
                'encodeLabel' => false,
                'attribute' => 'ln_interest',
                'label' => 'Interest',
                'headerOptions' => ['class' => 'text-primary'],
                'format' => 'currency',
                'format'=>['decimal',0],
                'pageSummary' => true,
            ], [
                'encodeLabel' => false,
                'attribute' => 'ln_balance',
                'header' => 'Balance',
                'headerOptions' => ['class' => 'text-primary'],
                'format' => 'currency',
                'format'=>['decimal',0],
                'pageSummary' => true,
            ],
            
            // [
            //     'encodeLabel' => false,
            //     'attribute' => 'ln_fees',
            //     'label' => 'FEES',
            //     'headerOptions' => ['style' => 'text-align:left'],
            //     // 'format' => 'date',
            //     'format'=>['decimal',0],
            //     'pageSummary' => true,
            // ],
            [
            'header' => 'Available Allowed Loan Actions',
                'headerOptions' => ['class' => 'text-primary'],
            'class' => 'kartik\grid\ActionColumn',
            'template' => '{view}{update}{approve}{delete}',
            // 'template' => '{btnLoans} {btnSavings} {viewLoans}',  // the default buttons + your custom button
            'buttons' => [
                'approve' => function($url, $model) {
                    return Html::a('<span class="btn btn-md btn-flat bg-olive"><b class="fa fa-check"></b> Approve</span>', ['appraise2', 'id' => $model['ln_id']], ['title' => 'Delete', 'class' => '', 'data' => ['confirm' => 'Are you absolutely sure ? You will change the status information about this loan with this action.', 'method' => 'post', 'data-pjax' => false],]);
                },
                    'view' => function($url, $model) {
                    return Html::a('<span class="btn btn-md btn-flat bg-gray"><b class="fa fa-eye"></b></span>', ['view', 'id' => $model['ln_id']], ['title' => 'View', 'id' => 'modal-btn-view']);
                },
                'update' => function($id, $model) {
                    return Html::a('<span class="btn btn-md btn-flat bg-gray"><b class="fa fa-pencil"></b></span>', ['update', 'id' => $model['ln_id']], ['title' => 'Update', 'id' => 'modal-btn-view']);
                },
                'delete' => function($url, $model) {
                    return Html::a('<span class="btn btn-md btn-danger"><b class="fa fa-trash"></b></span>', ['delete', 'id' => $model['ln_id']], ['title' => 'Delete', 'class' => '', 'data' => ['confirm' => 'Are you absolutely sure ? You will lose all the information about this loan with this action.', 'method' => 'post', 'data-pjax' => false],]);
                }
                ],
            ],
            // ['class' => 'kartik\grid\ActionColumn'],
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
</div>