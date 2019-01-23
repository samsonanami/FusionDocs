<?php

\yii\web\YiiAsset::register($this);

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use backend\models\Loans;
use kartik\grid\GridView;
use backend\controllers\LoanscheduleSearch;

$this->title = 'Savings View';


?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content">
      <!-- Default box -->
      <div class="box box-default box-solid">
        <div class="box-header with-border box-profile">
          Savings View
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
            <div class="col-md-4">
            <!-- Profile Image -->
            <div class="box box-default box-solid  text-center">
                <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="<?=$modelCustomer->logo?>" alt="User profile picture">
                <h3 class="profile-username text-center"><?=$modelCustomer->FIRST_NAME . ' - ' . $modelCustomer->LAST_NAME?></h3>
                <p class="text-muted text-center">Customer</p>
                <?=Html::a('<span class="btn btn-sm btn-flat bg-info margin"><b class="fa fa-plus"> Add Loan</b></span>', ['loans/create', 'id' => $modelCustomer['ACCOUNT_NO']], ['title' => 'View', 'id' => 'modal-btn-view']);?>
                <?=Html::a('<span class="btn btn-sm btn-flat bg-info"><b class="fa fa-money"> Add Shares</b></span>', ['savings/create', 'id' => $modelCustomer['ACCOUNT_NO']], ['title' => 'View', 'id' => 'modal-btn-view']);?>
               </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            </div>
            <div class="col-md-8">
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

<div class="box box-default box-solid">
<div class="box-header with-border">
    Savings

    <div class="box-tools pull-right">
    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
    </button>
    </div>
    <!-- /.box-tools -->
</div>
<!-- /.box-header -->
<div class="box-body box-default box-solid">
    <?php Pjax::begin();?>
    <?=GridView::widget([
    'dataProvider' => $dataProvider,
    // 'filterModel' => $searchModel,
    'showPageSummary' => true,
    
    'id' => 'kv-grid-demo',
    'containerOptions' => ['style' => 'overflow: auto'], // only set when $responsive = false
    'headerRowOptions' => ['class' => 'kartik-sheet-style'],
    'filterRowOptions' => ['class' => 'kartik-sheet-style'],
    'pjax' => true, // pjax is set to always true for this demo
    

    'showFooter' => true,
    'columns' => [
        // ['class' => 'yii\grid\SerialColumn'],
            
        
        [
            'encodeLabel' => false,
            'attribute' => 'svg_account_name',
            'label' => 'Account Name',
            'headerOptions' => ['style' => 'text-align:left'],
            // 'footer' => 'my footer',
        ],
        [
            'encodeLabel' => false,
            'attribute' => 'svg_account_number',
            'label' => 'Acc #',
            'headerOptions' => ['style' => 'text-align:left'],
        ],

        [
            'encodeLabel' => false,
            'attribute' => 'svg_mobile',
            'label' => 'Phone',
            'headerOptions' => ['style' => 'text-align:left'],
        ],
       
        [
            'encodeLabel' => false,
            'attribute' => 'svg_reference',
            'label' => 'Reference',
            'headerOptions' => ['style' => 'text-align:left'],
        ],
        [
            'encodeLabel' => false,
            'attribute' => 'svg_date',
            'label' => 'Date',
            'headerOptions' => ['style' => 'text-align:left'],
            'format'=>'date',
        ],
        [
            'encodeLabel' => false,
            'attribute' => 'created_by',
            'label' => 'Cashier',
            'headerOptions' => ['style' => 'text-align:left'],
        ],
        [
            'encodeLabel' => false,
            'attribute' => 'svg_transacted_by',
            'label' => 'Transacted by',
            'headerOptions' => ['style' => 'text-align:left'],
        ],
        [
            'encodeLabel' => false,
            'attribute' => 'svg_id_no',
            'label' => 'Trans ID #',
            'headerOptions' => ['style' => 'text-align:left'],
        ],
        [
            'encodeLabel' => false,
            'attribute' => 'svg_phone_no',
            'label' => 'Trans Phone #',
            'headerOptions' => ['style' => 'text-align:left'],
            'pageSummary' => 'Grand Total',
        ],

        [
            'encodeLabel' => false,
            'attribute' => 'svg_bal',
            'label' => 'Saving Amount (Ksh)',
            'headerOptions' => ['style' => 'text-align:left'],
            'contentOptions' => ['style' => 'text-align:left'],
            'format'=>['decimal',2],
            'pageSummary'=>true,
        ],
        [
            'pageSummary' => 'in Ksh',
            'header' => 'Actions',
            'headerOptions' => ['class' => 'text-primary'],
            'class' => 'kartik\grid\ActionColumn',
            'template' => '{approve}',
            // 'template' => '{btnLoans} {btnSavings} {viewLoans}',  // the default buttons + your custom button
            'buttons' => [
                'approve' => function($url, $model) {
                    return Html::a('<span class="btn btn-md btn-flat bg-info"><b class="fa fa-print"></b> Print Receipt</span>', ['savings/viewreceipt', 'id' => $model['svg_id']], ['title' => 'Print', 'class' => '', 'data' => ['confirm' => 'Are you absolutely sure ?', 'method' => 'post', 'data-pjax' => false],]);
                },
                    'view' => function($url, $model) {
                    return Html::a('<span class="btn btn-md btn-flat bg-gray"><b class="fa fa-eye"></b></span>', ['view', 'id' => $model['svg_id']], ['title' => 'View', 'id' => 'modal-btn-view']);
                },
                'update' => function($id, $model) {
                    return Html::a('<span class="btn btn-md btn-flat bg-gray"><b class="fa fa-pencil"></b></span>', ['update', 'id' => $model['svg_id']], ['title' => 'Update', 'id' => 'modal-btn-view']);
                },
                'delete' => function($url, $model) {
                    return Html::a('<span class="btn btn-md btn-danger"><b class="fa fa-trash"></b></span>', ['delete', 'id' => $model['svg_id']], ['title' => 'Delete', 'class' => '', 'data' => ['confirm' => 'Are you absolutely sure ? You will lose all the information about this loan with this action.', 'method' => 'post', 'data-pjax' => false],]);
                }   
                ],
            ],

            // ['class' => 'kartik\grid\ActionColumn'],
    ],
]);?>
    <?php Pjax::end();?>
</div>
<!-- /.box-body -->
</div>

</section>
</div>