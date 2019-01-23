<?php
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use backend\models\Loanschedule;

$this->title = 'Loans';
// getting summaries
$time = time();
$date = "20" . date('y-m-d', $time);
?>
<div class="box box-default box-solid">
<div class="box-header with-border">
    <h3 class="box-title">Loan Schedule</h3>
    <div class="box-tools pull-right">
    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
    </button>
    </div>
    <!-- /.box-tools -->
</div>
    <!-- /.box-header -->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'showPageSummary' => true,
        'layout' => '{items}{pager}{summary}',

        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],
            [
                'encodeLabel' => false,
                'attribute' => 'sch_date',
                'label' => 'Due Date',
                'headerOptions' => ['style' => 'text-align:left'],
                'format'=>['date'],
                'contentOptions' => function ($data, $key, $index, $column) {
                    if ($data->sch_date < Yii::$app->formatter->asDate('now')) {
                        return ['class' => 'label label-danger  text-black btn'];
                    } else {
                        return ['class' => 'label label-info text-black btn'];
                    }
                },
                'pageSummary'=>"Grand Totals",
            ],
            [
                'encodeLabel' => false,
                'attribute' => 'sch_principal',
                'label' => 'Principal',
                'headerOptions' => ['style' => 'text-align:left'],
                'format'=>['decimal',0],
                'pageSummary' => true,
            ],
            [
                'encodeLabel' => false,
                'attribute' => 'sch_interest',
                'label' => 'Interest (Ksh)',
                'headerOptions' => ['style' => 'text-align:left'],
                'format'=>['decimal',0],
                'pageSummary' => true,
            ],
            [
                'encodeLabel' => false,
                'attribute' => 'sch_due_amt',
                'label' => 'Due Amount',
                'headerOptions' => ['style' => 'text-align:left'],
                'format' => 'decimal',
                // 'format'=>['decimal',0],
                'pageSummary' => true,
            ],
            [
                'attribute' => 'sch_due_amt',
                'format' => 'decimal',
                // 'format' => 'decimal',
                'hAlign' => 'right',
                'pageSummary' => true,
            ],
            [
                'attribute' => 'sch_paid_amount',
                'label'=>'Paid',
                'format' => 'decimal',
                // 'format' => 'decimal',
                'hAlign' => 'right',
                'pageSummary' => true,
            ],
            [
                'encodeLabel' => false,
                'attribute' => 'sch_desc',
                'label' => 'Description',
                'headerOptions' => ['style' => 'text-align:left'],
            ],
            
            //'',
            //'',
            //'',
            //'sch_ln_id',
            [
                'attribute' => 'sch_status',
                'label' => 'Status',
                'encodeLabel' => false,
                'headerOptions' => ['style' => 'text-align:center'],
                'contentOptions' => function ($data, $key, $index, $column) {
                    if ($data->sch_status == 0) {
                        return ['class' => 'btn btn-block btn-flat btn-sm bg-gray'];
                    } else if ($data->sch_status == 1) {
                        return ['class' => 'btn btn-block btn-flat btn-sm bg-aqua'];
                    } else {
                        return ['class' => 'btn btn-block btn-flat btn-sm bg-primary'];
                    }
                },
                'value' => function ($data, $key, $index, $column) {
                    if ($data->sch_status == 0) {
                        return 'Not paid';
                    } else if ($data->sch_status == 1) {
                        return 'Fully paid';
                    } else if ($data->sch_status == 2) {
                        return 'Partially Paid';
                    }
                },
            ],
            // [
            //     'header' => '',
            //     'class' => 'kartik\grid\ActionColumn',
            //     'headerOptions' => ['style' => 'text-align:right'],
            //     'template' => '{paynow}',
            //     // 'template' => '{btnLoans} {btnSavings} {viewLoans}',  // the default buttons + your custom button
            //     'buttons' => [
            //         'paynow' => function ($url, $model) {
            //             return Html::a('<span class="btn btn-block btn-flat btn-sm bg-blue"><b class="fa fa-money"> Pay now</b></span>', ['loanschedule/pay', 'id' => $model['sch_id']], ['title' => 'Pay', 'class' => '', 'data' => ['confirm' => 'Are you absolutely sure ? This action cannot be undone.', 'method' => 'post', 'data-pjax' => false]]);
            //         }
            //     ],
            //     'contentOptions' => ['class' => 'text-right'],
            // ],

        ],
    ]); ?>
</div>
<!-- /.box-body -->
</div>    