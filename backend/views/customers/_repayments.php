<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

$this->title = 'Repayments';
?>
<div class="box box-default box-solid">
<div class="box-header with-border">
    <h3 class="box-title">repayments</h3>

    <div class="box-tools pull-right">
    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
    </button>
    </div>
    <!-- /.box-tools -->
</div>
<!-- /.box-header -->
<div class="box-body">
    <?php Pjax::begin();?>
    <?=GridView::widget([
            'dataProvider' => $dataProvider,
            // 'filterModel' => $searchModel,
            'showPageSummary' => true,
            'layout' => '{summary}{items}{pager}',
        'columns' => [
            [
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
                'headerOptions' => ['style' => 'text-align:center'],
            ],
            [
                'encodeLabel' => false,
                'attribute' => 'lnrp_paid_amount',
                'label' => 'Amount Paid',
                'headerOptions' => ['style' => 'text-align:center'],
                'format' => ['decimal', 2],
                'pageSummary' => true,
            ],
            [
                'encodeLabel' => false,
                'attribute' => 'lnrp_principal',
                'label' => 'Princippal',
                'headerOptions' => ['style' => 'text-align:center'],
                'format' => ['decimal', 2],
                'pageSummary' => true,
            ],
            [
                'encodeLabel' => false,
                'attribute' => 'lnrp_paid_amount',
                'label' => 'Amount Paid',
                'headerOptions' => ['style' => 'text-align:center'],
                'format' => ['decimal', 2],
                'pageSummary' => true,
            ],
            [
                'encodeLabel' => false,
                'attribute' => 'lnrp_balance',
                'label' => 'Balance',
                'headerOptions' => ['style' => 'text-align:center'],
                'format' => ['decimal', 2],
                'pageSummary' => true,
            ],
            [
                'encodeLabel' => false,
                'attribute' => 'lnrp_extra_payment',
                'label' => 'Balance',
                'headerOptions' => ['style' => 'text-align:center'],
                'format' => ['decimal', 2],
                'pageSummary' => true,
            ],

            [
                'encodeLabel' => false,
                'attribute' => 'lnrp_collected_by',
                'label' => 'Cahier',
                'headerOptions' => ['style' => 'text-align:center'],
            ],
    
    ],
]);?>
    <?php Pjax::end();?>
</div>
<!-- /.box-body -->
</div>    

