<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\controllers\LoanrepaymentsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="loanrepayments-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'lnrp_id') ?>

    <?= $form->field($model, 'lnrp_ln_id') ?>

    <?= $form->field($model, 'lnrp_payment_method') ?>

    <?= $form->field($model, 'lnrp_collected_by') ?>

    <?= $form->field($model, 'lnrp_collection_date') ?>

    <?php // echo $form->field($model, 'lnrp_paid_amount') ?>

    <?php // echo $form->field($model, 'lnrp_principal') ?>

    <?php // echo $form->field($model, 'lnrp_balance') ?>

    <?php // echo $form->field($model, 'lnrp_extra_payment') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
