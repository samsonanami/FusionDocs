<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
$this->title = 'Loans View : '. $model->ln_id;
?>
<div class="groups-update">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Loans View : <?=Html::encode($this->title)?>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="row">
            
            <div class="col-md-5"> 
                 <div class="box box-default box-solid">
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                      <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                      <i class="fa fa-times"></i></button>
                  </div>
                <div class="box-body">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'ln_id',
                        'ln_customer_id',
                        'lnp_id',
                        'ln_released',
                        'ln_maturity',
                        'ln_repayment',
                        'ln_repayment_count',
                        'ln_principal',
                        'ln_interest',
                        'ln_interest_time',
                        'ln_fees',
                        'ln_penalty',
                        'ln_due',
                       
                    ],
                ]) ?>
                <!-- /.box-body -->
                </div>
            </div>
            </div>
            <div class="col-md-5"> 
                 <div class="box box-default box-solid">
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                      <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                      <i class="fa fa-times"></i></button>
                  </div>
                <div class="box-body">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'ln_paid',
                        'ln_balance',
                        'ln_status',
                        'ln_description',
                        'ln_processing_fee_perc',
                        'ln_processing_fee',
                        'ln_insurance_fee',
                        'ln_loan_files',
                        'ln_duration',
                        'ln_duration_desc',
                        //  [
                        //     'attribute' => 'ln_status',
                        //     'label' => 'Status',
                        //     'encodeLabel' => false,
                        //     'headerOptions' => ['style' => 'text-align:center'],
                        //     'contentOptions' => function ($data, $key, $index, $column) {
                        //         if ($data->ln_status == 0) {
                        //             return ['class' => 'btn btn-block btn-flat btn-sm bg-orange'];
                        //         } else if ($data->ln_status == 1) {
                        //             return ['class' => 'btn btn-block btn-flat btn-sm bg-olive'];
                        //         } else {
                        //             return ['class' => 'btn btn-block btn-flat btn-sm bg-gray'];
                        //         }
                        //     },
                        //     'value' => function ($data, $key, $index, $column) {
                        //         if ($data->ln_status == 0) {
                        //             return 'Not paid';
                        //         } else if ($data->ln_status == 1) {
                        //             return 'Fully paid';
                        //         } else {
                        //             return 'Error';
                        //         }
                        //     },
                        // ],
                        [
                            'attribute' => 'ln_application_status',
                            'encodeLabel' => false,
                            'headerOptions' => ['style' => 'text-align:center'],
                            
                            'value' => function ($data) {
                                if ($data->ln_application_status == 1) {
                                    return 'Pending Approval';
                                }  else if ($data->ln_application_status == 2) {
                                    return 'On Appraisal';
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
                            'attribute' => 'ln_status',
                            'encodeLabel' => false,
                            'headerOptions' => ['style' => 'text-align:center'],
                            
                            'value' => function ($data) {
                                if ($data->ln_status == 1) {
                                    return 'Open';
                                }  else if ($data->ln_status == 2) {
                                    return 'Fully paid';
                                } else {
                                    return 'Error';
                                }
                            },
                        ],

                        'ln_approved_by',
                    ],
                ]) ?>
                <!-- /.box-body -->
                </div>
            </div>
            </div>
            <div class="col-md-2"> 
             <div class="box box-default box-solid">
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                      <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                      <i class="fa fa-times"></i></button>
                  </div>
                <div class="box-body">
                <?php 
                        if ($model->ln_application_status == 1) {//pending
                            echo Html::a('Reject', ['reject', 'id' => $model->ln_id], [
                                'class' => 'btn btn-flat bg-gray margin',
                                'data' => [
                                    'confirm' => 'Are you sure you want to reject this loan?',
                                    'method' => 'post',
                                ],
                            ]); 
                           echo  Html::a('Approve', ['approve', 'id' => $model->ln_id], [
                                'class' => 'btn btn-flat bg-gray margin',
                                'data' => [
                                    'confirm' => 'Are you sure you want to approve this loan?',
                                    'method' => 'post',
                                ],
                            ]) ;
                            echo Html::a('Update', ['update', 'id' => $model->ln_id], ['class' => ' btn btn-flat bg-blue margin']);
                        }  else if ($model->ln_application_status == 2) {//on appraisal
                            echo Html::a('Reject', ['reject', 'id' => $model->ln_id], [
                                'class' => 'btn btn-flat bg-gray margin',
                                'data' => [
                                    'confirm' => 'Are you sure you want to approve this loan?',
                                    'method' => 'post',
                                ],
                            ]);
                            echo  Html::a('Approve', ['approve', 'id' => $model->ln_id], [
                                'class' => 'btn btn-flat bg-gray margin',
                                'data' => [
                                    'confirm' => 'Are you sure you want to approve this loan?',
                                    'method' => 'post',
                                ],
                            ]) ;
                            echo Html::a('Update', ['update', 'id' => $model->ln_id], ['class' => ' btn btn-flat bg-blue margin']);
                        } else if ($model->ln_application_status == 3) {//approved
                            echo Html::a('Delete', ['delete', 'id' => $model->ln_id], [
                                'class' => ' btn btn-flat bg-red margin',
                                'data' => [
                                    'confirm' => 'Are you sure you want to delete this item?',
                                    'method' => 'post',
                                ],
                            ]);
                            echo Html::a('Reject', ['reject', 'id' => $model->ln_id], [
                                'class' => ' btn btn-flat bg-gray margin',
                                'data' => [
                                    'confirm' => 'Are you sure you want to reject this loan?',
                                    'method' => 'post',
                                ],
                            ]);
                        } else if ($model->ln_status == 4) {//Denied
                           echo Html::a('Delete', ['delete', 'id' => $model->ln_id], [
                                'class' => ' btn btn-flat bg-red margin',
                                'data' => [
                                    'confirm' => 'Are you sure you want to delete this item?',
                                    'method' => 'post',
                                ],
                            ]);
                        } 
                    ?>
               </div>
            </div>
            </div>
    
</section>
<!-- /.content -->


</div>