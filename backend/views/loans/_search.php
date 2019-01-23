<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\controllers\LoansSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="loans-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ln_id') ?>

    <?= $form->field($model, 'ln_customer_id') ?>

    <?= $form->field($model, 'lnp_id') ?>

    <?= $form->field($model, 'ln_released') ?>

    <?= $form->field($model, 'ln_maturity') ?>

    <?php // echo $form->field($model, 'ln_repayment') ?>

    <?php // echo $form->field($model, 'ln_repayment_count') ?>

    <?php // echo $form->field($model, 'ln_principal') ?>

    <?php // echo $form->field($model, 'ln_interest') ?>

    <?php // echo $form->field($model, 'ln_interest_time') ?>

    <?php // echo $form->field($model, 'ln_fees') ?>

    <?php // echo $form->field($model, 'ln_penalty') ?>

    <?php // echo $form->field($model, 'ln_due') ?>

    <?php // echo $form->field($model, 'ln_paid') ?>

    <?php // echo $form->field($model, 'ln_balance') ?>

    <?php // echo $form->field($model, 'ln_status') ?>

    <?php // echo $form->field($model, 'ln_description') ?>

    <?php // echo $form->field($model, 'ln_processing_fee_perc') ?>

    <?php // echo $form->field($model, 'ln_processing_fee') ?>

    <?php // echo $form->field($model, 'ln_insurance_fee') ?>

    <?php // echo $form->field($model, 'ln_loan_files') ?>

    <?php // echo $form->field($model, 'ln_duration') ?>

    <?php // echo $form->field($model, 'ln_duration_desc') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
