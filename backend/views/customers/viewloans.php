<?php

use backend\controllers\LoanscheduleSearch;
use kartik\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

$this->title = 'View Loans';

\yii\web\YiiAsset::register($this);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
      <!-- Default box -->

    <div class="box box-default box-solid">
    <div class="box-header with-border box-profile">
          <small>Customer Loans View</small>
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

             <div class="row">
            <div class="col-md-6">
            <!-- Profile Image -->
            <div class="box box-default box-solid">
                <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="<?=$modelCustomer->logo?>" alt="User profile picture">
                <h3 class="profile-username text-center"><?=$modelCustomer->FIRST_NAME . ' - ' . $modelCustomer->LAST_NAME?></h3>
                <p class="text-muted text-center">Customer</p>
                <?=Html::a('<span class="btn btn-flat bg-success margin"><b class="fa fa-plus"> Add Loan</b></span>', ['loans/create', 'id' => $modelCustomer['ACCOUNT_NO']], ['title' => 'View', 'id' => 'modal-btn-view']);?>
                 <?=Html::a('<span class="btn btn-flat bg-success margin"><b class="fa fa-money"> Add Shares</b></span>', ['savings/create', 'id' => $modelCustomer['ACCOUNT_NO']], ['title' => 'View', 'id' => 'modal-btn-view']);?>
                 <?=Html::a('<span class="btn btn-flat bg-success margin"><b class="fa fa-money"> Add Repayment</b></span>', ['loanrepayments/create', 'id' => $modelCustomer['ACCOUNT_NO']], ['title' => 'View', 'id' => 'modal-btn-view']);?>

                 </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            </div>
            <div class="col-md-6">
            <!-- Profile Image -->
            
            <div class="box box-default box-solid">
                <div class="box-body box-profile"></div>
                <?=DetailView::widget([
                    'model' => $modelCustomer,
                    'attributes' => [
                        'FIRST_NAME', // title attribute (in plain text)
                        'LAST_NAME', // description attribute in HTML
                        'COUNTRY',
                        'MOBILE',
                        'EMAIL:email',
                    ],
                ]);?>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            </div>

<!-- /.box-body -->
</div>

<div class="box-footer">

  <!-- footer area -->
</div>
<!-- /.box-footer-->

<div class="box box-default box-solid">

<!-- /.box-header -->
<div class="box-body">
<?php Pjax::begin();?>
<?php
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'showPageSummary' => true,
    'layout' => '{summary}{items}{pager}',
    'containerOptions' => ['style' => 'overflow: auto'], // only set when $responsive = false
    'beforeHeader' => [
        [
            'columns' => [
                ['content' => 'List of Loans given to customer', 'options' => ['colspan' => 16, 'class' => 'text-center warning']],
                // ['content'=>'Header Before 2', 'options'=>['colspan'=>4, 'class'=>'text-center warning']],
                // ['content'=>'Header Before 3', 'options'=>['colspan'=>3, 'class'=>'text-center warning']],
            ],
            'options' => ['class' => 'skip-export'], // remove this row from export
        ],
    ],
    'pjax' => true,
    'bordered' => true,
    'striped' => false,
    'condensed' => true,
    'responsive' => true,
    'hover' => true,
    'floatHeader' => false,
    'showPageSummary' => true,
    'panel' => [
        // 'type' => GridView::TYPE_PRIMARY
    ],

    'columns' => [
        // ['class' => 'yii\grid\SerialColumn'],

        [
            'label' => 'Schedule',
            'class' => 'kartik\grid\ExpandRowColumn',
            'value' => function ($model, $key, $index, $column) {
                return GridView::ROW_COLLAPSED;
            },
            'detail' => function ($model, $key, $index, $column) {
                $searchModel = new LoanscheduleSearch();
                $searchModel->sch_ln_id = $model->ln_id;
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                return Yii::$app->controller->renderPartial('_loanschedule', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ]);
            },
            'pageSummary' => 'Grand Total',
        ],
        [
            'attribute' => 'ln_application_status',
            'label' => 'Application',
            'encodeLabel' => false,
            'headerOptions' => ['style' => 'text-align:left'],
            'contentOptions' => function ($data, $key, $index, $column) {
                if ($data->ln_application_status == 1) {
                    return ['class' => 'btn btn-block btn-flat btn-sm bg-gray'];
                } else if ($data->ln_application_status == 2) {
                    return ['class' => 'btn btn-block btn-flat btn-sm'];
                } else if ($data->ln_application_status == 3) {
                    return ['class' => 'btn btn-block btn-flat btn-sm'];
                } else if ($data->ln_application_status == 4) {
                    return ['class' => 'btn btn-block btn-flat btn-sm'];
                } else {
                    return ['class' => 'btn btn-block btn-flat btn-sm'];
                }
            },
            'value' => function ($data, $key, $index, $column) {
                if ($data->ln_application_status == 1) {
                    return 'Pending';
                } else if ($data->ln_application_status == 2) {
                    return 'On appraisal';
                } else if ($data->ln_application_status == 3) {
                    return 'Approved';
                } else if ($data->ln_application_status == 4) {
                    return 'Denied';
                } else {
                    return 'Error';
                }
            },
        ],
        [
            'encodeLabel' => false,
            'attribute' => 'ln_name',
            'label' => 'Loan Name',
            'headerOptions' => ['style' => 'text-align:center'],
        ],
        [
            'encodeLabel' => false,
            'attribute' => 'ln_released',
            'label' => 'Released',
            'headerOptions' => ['style' => 'text-align:center'],
        ],

        [
            'encodeLabel' => false,
            'attribute' => 'ln_maturity',
            'label' => 'Maturity',
            'headerOptions' => ['style' => 'text-align:center'],
        ],
        [
            'encodeLabel' => false,
            'attribute' => 'ln_due',
            'label' => 'Due Date',
            'headerOptions' => ['style' => 'text-align:center;'],
        ],
        [
            'encodeLabel' => false,
            'attribute' => 'ln_interest',
            'label' => 'Interest%',
            'headerOptions' => ['style' => 'text-align:center'],
            'format' => ['integer'],
        ],
        [
            'encodeLabel' => false,
            'attribute' => 'ln_principal',
            'label' => 'Principal',
            'headerOptions' => ['style' => 'text-align:center'],
            'format' => ['decimal', 0],
            'pageSummary' => true,
        ],

        [
            'encodeLabel' => false,
            'attribute' => 'ln_fees',
            'label' => 'Fees',
            'headerOptions' => ['style' => 'text-align:center'],
            'format' => ['decimal', 0],
            'pageSummary' => true,
        ],
        [
            'encodeLabel' => false,
            'attribute' => 'ln_penalty',
            'label' => 'Penalty',
            'headerOptions' => ['style' => 'text-align:center'],
            'format' => ['decimal', 0],
            'pageSummary' => true,
        ],
        [
            'encodeLabel' => false,
            'attribute' => 'ln_paid',
            'label' => 'Paid',
            'headerOptions' => ['style' => 'text-align:center'],
            'format' => ['decimal', 0],
            'pageSummary' => true,
        ],
        
        [
            'encodeLabel' => false,
            'attribute' => 'ln_balance',
            'label' => 'Balance',
            'headerOptions' => ['style' => 'text-align:center'],
            'format' => ['decimal', 2],
            'pageSummary' => true,
        ],
        [
            'header' => 'Actions',
            'class' => 'kartik\grid\ActionColumn',
            'headerOptions' => ['style' => 'text-align:right'],
            'template' => '{view}{delete}',
            // 'template' => '{btnLoans} {btnSavings} {viewLoans}',  // the default buttons + your custom button
            'buttons' => [
                'view' => function ($url, $model) {
                    return Html::a('<span class="margin"><b class="fa fa-search-plus margin">View</b></span>', ['loans/view', 'id' => $model['ln_id']], ['title' => 'View', 'id' => 'modal-btn-view']);
                    // return Html::a(' - View All Loans', ['customers/viewloans','id' => $model['ln_id']],['class' => 'fa fa-opencart']);
                },
                'delete' => function ($url, $model) {
                    return Html::a('<span class=" float-left"><b class="fa fa-trash margin">Delete</b></span>', ['loans/view', 'id' => $model['ln_id']], ['title' => 'Delete', 'class' => '', 'data' => ['confirm' => 'Are you absolutely sure ? You will lose all the information about this user with this action.', 'method' => 'post', 'data-pjax' => false]]);
                },
                'approve' => function ($url, $model) {
                    return Html::a('<span class="btn-tbl btn-tbl-success btn-flat"><b class="fa fa-check">Approve</b></span>', ['loans/view', 'id' => $model['ln_id']], ['title' => 'Approve', 'class' => '', 'data' => ['confirm' => 'Are you absolutely sure ? You will lose all the information about this user with this action.', 'method' => 'post', 'data-pjax' => false]]);
                },
            ],
            'contentOptions' => ['class' => 'text-right'],
        ],
        // [
        //     'header' => '',
        //     'class' => 'kartik\grid\ActionColumn',
        //     'headerOptions' => ['style' => 'text-align:right'],
        //     'template' => '{delete}',
        //     // 'template' => '{btnLoans} {btnSavings} {viewLoans}',  // the default buttons + your custom button
        //     'buttons' => [
        //         'view' => function ($url, $model) {
        //             return Html::a('<span class="margin"><b class="fa fa-search-plus">View</b></span>', ['loans/view', 'id' => $model['ln_id']], ['title' => 'View', 'id' => 'modal-btn-view']);
        //             // return Html::a(' - View All Loans', ['customers/viewloans','id' => $model['ln_id']],['class' => 'fa fa-opencart']);
        //         },
        //         'delete' => function ($url, $model) {
        //             return Html::a('<span class=" float-left"><b class="fa fa-trash">Delete</b></span>', ['loans/view', 'id' => $model['ln_id']], ['title' => 'Delete', 'class' => '', 'data' => ['confirm' => 'Are you absolutely sure ? You will lose all the information about this user with this action.', 'method' => 'post', 'data-pjax' => false]]);
        //         },
        //         'approve' => function ($url, $model) {
        //             return Html::a('<span class="btn-tbl btn-tbl-success btn-flat"><b class="fa fa-check">Approve</b></span>', ['loans/view', 'id' => $model['ln_id']], ['title' => 'Approve', 'class' => '', 'data' => ['confirm' => 'Are you absolutely sure ? You will lose all the information about this user with this action.', 'method' => 'post', 'data-pjax' => false]]);
        //         },
        //     ],
        //     'contentOptions' => ['class' => 'text-right'],
        // ],
        [
            'attribute' => 'ln_status',
            'label' => 'Status',
            'encodeLabel' => false,
            'headerOptions' => ['style' => 'text-align:center'],
            'contentOptions' => function ($data, $key, $index, $column) {
                if ($data->ln_status == 1) {
                    return ['class' => 'btn btn-block btn-flat btn-sm'];
                } else if ($data->ln_status == 2) {
                    return ['class' => 'btn btn-block btn-flat btn-sm'];
                } else {
                    return ['class' => 'btn btn-block btn-flat btn-sm '];
                }
            },
            'value' => function ($data, $key, $index, $column) {
                if ($data->ln_status == 1) {
                    return 'Open';
                } else if ($data->ln_status == 2) {
                    return 'Fully paid';
                } else {
                    return 'Error';
                }
            },
        ],

    ],
]);?>
    <?php Pjax::end();?>
</div>
<!-- /.box-body -->
</div>

</section>
</div>