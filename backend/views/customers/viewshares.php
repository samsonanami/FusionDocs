<?php
\yii\web\YiiAsset::register($this);
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use backend\models\Loans;
use kartik\grid\GridView;
use backend\controllers\LoanscheduleSearch;

$this->title = 'Shares view';

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="margin">
      <?=  Html::a('<i class="fa fa-download">&nbsp;</i> Generate PDF', ['customers/report','id' => $modelCustomer['ACCOUNT_NO']],['class' => 'btn btn-flat btn-primary']);?>&nbsp                  
	  <button class="btn btn-flat btn-primary" onclick="window.print()"> <i class="fa fa-camera"></i> Snapshot</button> &nbsp

      <?=Html::a('<i class="fa fa-pencil"> </i> Update', ['update', 'id' => $modelCustomer->ACCOUNT_NO], ['class' => 'btn btn-flat btn-primary'])?>
                  <?=Html::a('<i class="fa fa-trash"></i> Delete', ['delete', 'id' => $modelCustomer->ACCOUNT_NO], [
                  'class' => 'btn btn-flat btn-danger',
                  'data' => [
                      'confirm' => 'Are you sure you want to delete this item?',
                      'method' => 'post',
                      ],
                  ])?>
                  </div>
      <div class="box box-default box-solid">
        <div class="box-header with-border box-profile">
          User Profile
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
            <br>
             <div class="row">
            <div class="col-md-2">
            <!-- Profile Image -->
                <h4 class="profile-username text-center"><?=$modelCustomer->FIRST_NAME . ' - ' . $modelCustomer->LAST_NAME?></h4>
                <p class="text-muted text-center"></p>
                
                <div class="thumbnail">
                   <img src="<?=$modelCustomer->logo?>" alt="User profile picture">
                  </div>
                <!-- /.box-body -->
            <!-- /.box -->
            </div>
            <div class="col-md-5">
            <!-- Profile Image -->
            <div class="">
                <div class="">
                <ul class="list-group">
                    <li class="list-group-item">
                    Account Number<a class="pull-right"><?=$modelCustomer->UNIQUE_NO?></a>
                    </li>
                    <li class="list-group-item">
                    Account Name<a class="pull-right"><?=$modelCustomer->ln_account_name?></a>
                    </li>
                    <li class="list-group-item">
                    Account Type<a class="pull-right"><?=$modelCustomer->cust_account_type ?></a>
                    </li>
                    <li class="list-group-item">
                    National ID # <a class="pull-right"><?=$modelCustomer->cust_id_no?></a>
                    </li>
                    <li class="list-group-item">
                        Phone Number<a class="pull-right"><?=$modelCustomer->MOBILE?></a>
                    </li>
                </ul>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            </div>
            <div class="col-md-5">
            <!-- Profile Image -->
                <ul class="list-group">
                    <li class="list-group-item">
                      Gender<a class="pull-right"><?=$modelCustomer->GENDER?></a>
                    </li>
                    <li class="list-group-item">
                        KRA Pin<a class="pull-right"><?=$modelCustomer->cust_kra_pin ?></a>
                    </li>
                    <li class="list-group-item">
                        <b><a class="pull-right"><?=$modelCustomer->PROVINCE_STATE ?></a></b>County
                    </li>
                </ul>
                <div class="margin">
                   </div>
                </div>
                <!-- /.box-body -->
            </div>
<!-- /.box-body -->
<div class="box-footer">
<?= Html::a('<i class="fa fa-eye"></i>&nbsp; Loans', ['customers/viewloans','id' => $modelCustomer['ACCOUNT_NO']],['class' => 'btn  btn-flat btn-info pull-left']); ?>
<?=  Html::a('<i class="fa fa-eye"></i>&nbsp; Shares', ['customers/viewshares','id' => $modelCustomer['ACCOUNT_NO']],['class' => 'btn  btn-flat btn-primary pull-left']);?>
<?=  Html::a('<i class="fa fa-eye"></i>&nbsp;Savings', ['customers/viewsavings','id' => $modelCustomer['ACCOUNT_NO']],['class' => 'btn  btn-flat btn-info pull-left']);?>
<?=  Html::a('<i class="fa fa-plus "></i>&nbsp; Add Repayment', ['loanrepayments/create','id' => $modelCustomer['ACCOUNT_NO']],['class' => 'btn  btn-flat btn-info pull-right']);?>               
<?=  Html::a('<i class="fa fa-plus "></i>&nbsp; Add Savings', ['savings/create','id' => $modelCustomer['ACCOUNT_NO']],['class' => 'btn  btn-flat btn-info  pull-right']);?>              
<?=  Html::a('<i class="fa fa-plus "></i>&nbsp; Add Shares', ['shares/create','id' => $modelCustomer['ACCOUNT_NO']],['class' => 'btn  btn-flat btn-info pull-right']);?>              
<?=  Html::a('<i class="fa fa-plus "></i>&nbsp; Add Loan', ['loans/create','id' => $modelCustomer['ACCOUNT_NO']],['class' => 'btn btn-flat btn-info  pull-right']);?>
<?=  Html::a('<i class="fa fa-money"></i>&nbsp; Withdraw Cash', ['wiithdrawals/create','id' => $modelCustomer['ACCOUNT_NO']],['class' => 'btn btn-flat btn-info  pull-right']);?>
     
<!-- footer area -->
<br>
<!-- Loan detaisl -->
<span class="margin"></span>
<div class="box box-primary box-solid">
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
            'attribute' => 'shr_id',
            'label' => 'Account Name',
            'headerOptions' => ['style' => 'text-align:left'],
            // 'footer' => 'my footer',
        ],
        [
            'encodeLabel' => false,
            'attribute' => 'shr_cust_id',
            'label' => 'Acc #',
            'headerOptions' => ['style' => 'text-align:left'],
        ],

        [
            'encodeLabel' => false,
            'attribute' => 'shr_account_name',
            'label' => 'Phone',
            'headerOptions' => ['style' => 'text-align:left'],
        ],
       
        [
            'encodeLabel' => false,
            'attribute' => 'shr_account_no',
            'label' => 'Reference',
            'headerOptions' => ['style' => 'text-align:left'],
        ],
        [
            'encodeLabel' => false,
            'attribute' => 'shr_amount',
            'label' => 'Date',
            'headerOptions' => ['style' => 'text-align:left'],
            'format'=>'date',
        ],
        [
            'encodeLabel' => false,
            'attribute' => 'shr_mobile',
            'label' => 'Cashier',
            'headerOptions' => ['style' => 'text-align:left'],
        ],
        [
            'encodeLabel' => false,
            'attribute' => 'shr_created_at',
            'label' => 'Transacted by',
            'headerOptions' => ['style' => 'text-align:left'],
        ],
        [
            'encodeLabel' => false,
            'attribute' => 'shr_created_by',
            'label' => 'Trans ID #',
            'headerOptions' => ['style' => 'text-align:left'],
        ],
        [
            'encodeLabel' => false,
            'attribute' => 'shr_amount',
            'label' => 'Amount (Ksh)',
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
            'template' => '{print}',
            // 'template' => '{btnLoans} {btnSavings} {viewLoans}',  // the default buttons + your custom button
            'buttons' => [
                'print' => function($url, $model) {
                return Html::a('<span class="btn btn-md btn-flat bg-info"><b class="fa fa-print"></b> Print Receipt</span>', ['shares/viewreceipt', 'id' => $model['shr_id']], ['title' => 'Print', 'class' => '', 'data' => ['confirm' => 'Are you absolutely sure ?', 'method' => 'post', 'data-pjax' => false],]);
               }
           ],
          ],

            // ['class' => 'kartik\grid\ActionColumn'],
    ],
]);?>
    <?php Pjax::end();?>
</div>
    <!-- loan details end -->
</div>
<!-- /.box-footer-->

</section>
<!-- /.content -->
</div>
