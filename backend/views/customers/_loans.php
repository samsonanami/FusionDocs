<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = 'Loans';
?>


<div class="box box-default box-solid">
<div class="box-header with-border">
    <h3 class="box-title">Loans</h3>

    <div class="box-tools pull-right">
    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
    </button>
    </div>
    <!-- /.box-tools -->
</div>
<!-- /.box-header -->
<div class="box-body">
    <?php Pjax::begin();?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],
            // 'ln_id',
            // 'ln_customer_id',
            // 'lnp_id',
            'ln_released',
            'ln_maturity',
            // 'ln_repayment',
            'ln_repayment_count',
            'ln_principal',
            'ln_interest',
            // 'ln_interest_time',
            'ln_fees',
            // 'ln_penalty',
            'ln_due',
            // 'ln_paid',
            'ln_balance',
            'ln_status',
            // 'ln_description',
            // 'ln_processing_fee_perc',
            'ln_processing_fee',
            'ln_insurance_fee',
            // 'ln_loan_files',
            'ln_duration',
            'ln_duration_desc',

        ],
    ]); ?>
    <?php Pjax::end();?>
</div>
<!-- /.box-body -->
</div>    