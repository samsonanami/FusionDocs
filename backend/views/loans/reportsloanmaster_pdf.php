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
$model=new Loans();
?>

<div class="loans-index">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <button class="btn btn-flat btn-md bg-primary margin" onclick="window.print()"> <i class="fa fa-print"></i> Snapshot</button>
    <?=Html::a('<i class="fa fa-download"></i> Generate PDF', ['reportpdf'], ['class' => 'btn btn-flat btn-md bg-olive pull-left margin'])?>
    </section>
    <!-- Main content -->
    <section class="invoice "  id="content">
    <div class="box box-default box-solid">
      <!-- title row z-->
      <div class="row margin">
        <div class="col-xs-12 text-center">
          <h2 class="pag-header">
            <i class="fa fa-text"></i> <?= $modelCompany->com_name; ?>
          </h2>
            Address: <?= $modelCompany->com_address; ?><br>
            Phone: <?= $modelCompany->com_phone; ?><br>
            Email: <?= $modelCompany->com_email; ?><br>
          <h3>Daily Collection Sheet</h3>
          <small class="pull-left">Date: <?= $date ?></small>
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
                    //   [
                    //       'pageSummary'=>'Grand Totals',
                    //       'encodeLabel' => false,
                    //       'label' => 'LOAN NAME',
                    //       'headerOptions' => [ 'class'=>'text-left'],
                    //       'value' => function($model){
                    //         $loan=Loans::find()->where(['ln_id'=>$model->sch_ln_id])->one();
                    //         // return $loan_name->ln_name;
                    //         return $loan->ln_name;  
                    //       }
                    //   ],
                    [
                          'encodeLabel' => false,
                          'label' => 'ACCOUNT NO.',
                          'headerOptions' => [ 'class'=>'text-left'],
                          'value' => function($model){
                            $customer=Customers::find()->where(['ACCOUNT_NO'=>$model->ln_customer_id])->one();
                            return $customer->UNIQUE_NO;
                          }
                      ],
                      [
                          'encodeLabel' => false,
                          'label' => 'ACCOUNT HOLDER',
                          'headerOptions' => [ 'class'=>'text-left'],
                          'value' => function($model){
                            $customer=Customers::find()->where(['ACCOUNT_NO'=>$model->ln_customer_id])->one();
                            return $customer->ln_account_name;
                          }
                      ],
                      [
                        'pageSummary'=>'Grand Totals',
                        'encodeLabel' => false,
                        'label' => 'PHONE',
                        'headerOptions' => [ 'class'=>'text-left'],
                        'value' => function($model){
                          $customer=Customers::find()->where(['ACCOUNT_NO'=>$model->ln_customer_id])->one();
                          return $customer->MOBILE;
                        }
                    ],
                      [
                        'value' => 'ln_principal',
                        'label' => 'PRINCIPAL DISBURSED',
                        'hAlign' => 'right',
                        'format'=>['decimal',2],
                        'pageSummary' => true,
                      ],
                      [
                        'encodeLabel' => false,
                        'value' => 'ln_interest',
                        'label' => 'INTEREST',
                        'hAlign' => 'right',
                        'format'=>['decimal',2],
                        'pageSummary' => true,
                    ],
                    [
                          'encodeLabel' => false,
                          'value' => 'ln_fees',
                          'label' => 'OTHER CHARGES',
                          'hAlign' => 'right',
                          'format'=>['decimal',2],
                          'pageSummary' => true,
                      ],
                      // [
                      //     'encodeLabel' => false,
                      //     'value' => 'ln_due_amt',
                      //     'label' => 'TOTAL',
                      //     'headerOptions' => ['style' => 'text-align:left'],
                      //     'format'=>['decimal',2],
                      //     'pageSummary' => true,
                      // ],
                      [
                          'encodeLabel' => false,
                          'value' => 'ln_paid',
                          'label' => 'PRINCIPLE PAID ',
                          'hAlign' => 'right',
                          'format'=>['decimal',2],
                          'pageSummary' => true,
                      ],
                      [
                          'encodeLabel' => false,
                          'value' => 'ln_penalty',
                          'label' => 'OTHER PAYMENTS',
                          'format'=>['decimal',2],
                          'pageSummary' => true,
                          'hAlign' => 'right',
                      ],
                      [
                          'encodeLabel' => false,
                          'value' => 'ln_balance',
                          'label' => 'LOAN BALANCE',
                          'hAlign' => 'right',
                          'format'=>['decimal',2],
                          'pageSummary' => true,
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


