<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;
use dosamigos\datepicker\DatePicker;

$this->title = 'Loanrepayments';
?>
<div class="loanrepayments-index">

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><?=Html::encode($this->title)?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Document Category</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <!-- /.box -->

      <!-- Default box -->
           
    <div class="box box-primary box-solid">
    <div class="box-header with-border box-profile">
        <h3 class="box-title">Loans Repyment Transactions List</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
        <div class="customers-index">
            <?php Pjax::begin();?>
            <?=GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'showPageSummary' => true,
            'layout' => '{summary}{items}{pager}',
        'columns' => [
            [
                'pageSummary'=>'Grand Totals',
                'encodeLabel' => false,
                'attribute' => 'lnrp_id',
                'label' => 'Serial',
                'headerOptions' => ['style' => 'text-align:left;'],
            ],
            [
                'encodeLabel' => false,
                'attribute' => 'lnrp_ln_id',
                'label' => 'Loan No',
                'headerOptions' => ['style' => 'text-align:center'],
                'format' => ['integer'],
            ],
            [
                'encodeLabel' => false,
                'attribute' => 'lnrp_payment_method',
                'label' => 'Mode of Payment',
                'headerOptions' => ['style' => 'text-align:center'],
            ],
            [
            'encodeLabel' => false,
            'attribute' => 'lnrp_collection_date',
            'label' => 'Date Collected',
            'headerOptions' => ['style' => 'text-align:left'],
            'format' => 'raw',
            'filter'=>DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'lnrp_collection_date',
                    'template' => '{addon}{input}',
                        'clientOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd'
                        ]
                ]),
            ],
            [
                'encodeLabel' => false,
                'attribute' => 'lnrp_paid_amount',
                'label' => 'Amount Paid',
                'headerOptions' => ['style' => 'text-align:left'],
                'format' => ['decimal', 2],
                'pageSummary' => true,
            ],
            [
                'encodeLabel' => false,
                'attribute' => 'lnrp_principal',
                'label' => 'Princippal',
                'headerOptions' => ['style' => 'text-align:left'],
                'format' => ['decimal', 2],
                'pageSummary' => true,
            ],
            [
                'encodeLabel' => false,
                'attribute' => 'lnrp_paid_amount',
                'label' => 'Amount Paid',
                'headerOptions' => ['style' => 'text-align:left'],
                'format' => ['decimal', 2],
                'pageSummary' => true,
            ],
            [
                'encodeLabel' => false,
                'attribute' => 'lnrp_balance',
                'label' => 'Balance',
                'headerOptions' => ['style' => 'text-align:left'],
                'format' => ['decimal', 2],
                'pageSummary' => true,
            ],
            [
                'encodeLabel' => false,
                'attribute' => 'lnrp_extra_payment',
                'label' => 'Other Payments',
                'headerOptions' => ['style' => 'text-align:left'],
                'format' => ['decimal', 2],
                'pageSummary' => true,
            ],

            [
                'encodeLabel' => false,
                'attribute' => 'lnrp_collected_by',
                'label' => 'Cashier',
                'headerOptions' => ['style' => 'text-align:left'],
            ],
    
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