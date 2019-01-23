<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;
use backend\models\Company;
use backend\models\Loanschedule;
use backend\models\Loans;
use backend\models\Customers;

$time = time();
$date = "20" . date('y-m-d', $time);

$this->title = 'Loans View';

$model=new Loanschedule();
?>
<div class="loans-index">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <?php // echo $this->render('_searchbydate_from', ['model' => $searchModel]); ?>
        <button class="btn btn-flat btn-md bg-success margin" onclick="window.print()"> <i class="fa fa-print"></i> Print Report</button>
    </section><br>
    <!-- Main content -->

    <section class="invoice "  id="content">
    <div class="box box-default box-solid">
      <!-- title row z-->
      <div class="row margin">
        <div class="col-xs-12 text-center">
          <h2 class="pag-header">
            <i class="fa fa-text"></i> <?= $modelCompany->com_name; ?>
          </h2>
          <strong><?= $model->sch_from_date; ?></strong><br>
          <strong><?= $modelCompany->com_name; ?></strong><br>
            Address: <?= $modelCompany->com_address; ?><br>
            Phone: <?= $modelCompany->com_phone; ?><br>
            Email: <?= $modelCompany->com_email; ?><br>
          <h3>Daily Collection Sheet</h3>
          <small class="pull-right">Date: <?= $date ?></small>
          <hr>
        </div>
        <!-- /.col -->
      </div>

      <!-- Table row -->
      <div class="row margin">
        <div class="col-xs-12 ">
          <?=GridView::widget([
            'dataProvider' => $dataProvider,
            // 'filterModel' => $searchModel,
            'layout' => '{items}{pager}{summary}',
            'showPageSummary' => true,
            'tableOptions' => ['class' => 'table table-bordered table-hover dataTable'],

                'columns' => [
                      [
                        'class' => 'kartik\grid\SerialColumn',
                      
                      ],
                      [
                          'encodeLabel' => false,
                          'label' => 'LOAN NAME',
                          'headerOptions' => [ 'class'=>'text-left'],
                          'value' => function($model){
                            $loan=Loans::find()->where(['ln_id'=>$model->sch_ln_id])->one();
                            // return $loan_name->ln_name;
                            return $loan->ln_name;  
                          }
                      ],
                      [
                          'encodeLabel' => false,
                          'label' => 'CUSTOMER NAME',
                          'headerOptions' => [ 'class'=>'text-left'],
                          'value' => function($model){
                            $loan=Loans::find()->where(['ln_id'=>$model->sch_ln_id])->one();
                            $customer=Customers::find()->where(['ACCOUNT_NO'=>$loan->ln_customer_id])->one();
                            return $customer->ln_account_name;
                          }
                      ],
                       [
                          'encodeLabel' => false,
                          'label' => 'PHONE',
                          'headerOptions' => [ 'class'=>'text-left'],
                          'value' => function($model){
                            $loan=Loans::find()->where(['ln_id'=>$model->sch_ln_id])->one();
                            $customer=Customers::find()->where(['ACCOUNT_NO'=>$loan->ln_customer_id])->one();
                            return $customer->MOBILE;

                          }
                      ],
                    [
                        'value' => 'sch_date',
                        'label' => 'DUE DATE',
                        'headerOptions' => ['style' => 'text-align:left'],
                        'format' => 'date',
                    ],
                    [
                        'encodeLabel' => false,
                        'value' => 'sch_desc',
                        'label' => 'TRANSACTION',
                        'headerOptions' => ['style' => 'text-align:left'],
                        'pageSummary'=>'Grand Totals',
                    ],
                
                    // [
                    //     'encodeLabel' => false,
                    //     'value' => 'lnCustomer.MOBILE',
                    //     'label' => 'PHONE NUMBER',
                    //     'headerOptions' => [ 'class'=>'text-left text-primary'],
                    // ],
                    // [
                    //     'encodeLabel' => false,
                    //     'attribute' => 'ln_released',
                    //     'label' => 'RELEASED',
                    //     'headerOptions' => ['style' => 'text-align:left'],
                    //     'format' => 'date',
                    // ],
                    // [
                    //     'encodeLabel' => false,
                    //     'attribute' => 'ln_maturity',
                    //     'label' => 'MATURITY',
                    //     'headerOptions' => ['style' => 'text-align:left'],
                    //     'format' => 'date',
                    // ],
                    // [
                    //     'encodeLabel' => false,
                    //     'attribute' => 'sch_date',
                    //     'label' => 'DUE',
                    //     'headerOptions' => ['style' => 'text-align:left'],
                    //     'format' => 'date',
                    // ],
                    // [
                    //     'encodeLabel' => false,
                    //     'attribute' => 'ln_repayment_count',
                    //     'label' => 'REPAYMENTS',
                    //     'headerOptions' => ['style' => 'text-align:left'],
                    //     'format' => 'integer',
                    //     // 'format'=>['decimal',0],
                    //     // 'pageSummary' => true,
                    // ],
                    // [
                    //     'encodeLabel' => false,
                    //     'attribute' => 'ln_fees',
                    //     'label' => 'FEES',
                    //     'headerOptions' => ['style' => 'text-align:left'],
                    //     // 'format' => 'date',
                    //     'format'=>['decimal',2],
                    //     'pageSummary' => true,
                    // ],
                    [
                        'encodeLabel' => false,
                        'value' => 'sch_principal',
                        'label' => 'PRINCIPAL',
                        'headerOptions' => ['style' => 'text-align:left'],
                        'format' => ['decimal', 2],
                        'pageSummary' => true,
                    ],
                    [
                        'encodeLabel' => false,
                        'value' => 'sch_interest',
                        'label' => 'INTEREST',
                        'headerOptions' => ['style' => 'text-align:left'],
                        'format' => 'currency',
                        'format' => ['decimal', 2],
                        'pageSummary' => true,
                    ], [
                        'encodeLabel' => false,
                        'value' => 'sch_due_amt',
                        'label' => 'BALANCE',
                        'headerOptions' => ['style' => 'text-align:right'],
                        'format' => 'currency',
                        'format' => ['decimal', 2],
                        'pageSummary' => true,
                        'hAlign' => 'right',
                    ],

                ],
            ]);?>
            </div>
      </div>
      <!-- /.row -->
      <hr>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
  <!-- /.content-wrapper -->


