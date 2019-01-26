<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\controllers\LoanproductsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="loanproducts-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'lnp_id') ?>

    <?= $form->field($model, 'lnp_name') ?>

    <?= $form->field($model, 'lnp_desc') ?>

    <?= $form->field($model, 'lnp_min_interest') ?>

    <?= $form->field($model, 'lnp_min_interest_desc') ?>

    <?php // echo $form->field($model, 'lnp_max_interest') ?>

    <?php // echo $form->field($model, 'lnp_max_interest_desc') ?>

    <?php // echo $form->field($model, 'lnp_min_duration') ?>

    <?php // echo $form->field($model, 'lnp_min_duration_desc') ?>

    <?php // echo $form->field($model, 'lnp_max_duration') ?>

    <?php // echo $form->field($model, 'lnp_max_duration_desc') ?>

    <?php // echo $form->field($model, 'lnp_repayment_daily') ?>

    <?php // echo $form->field($model, 'lnp_repayment_weekly') ?>

    <?php // echo $form->field($model, 'lnp_repayment_biweekly') ?>

    <?php // echo $form->field($model, 'lnp_repayment_monthly') ?>

    <?php // echo $form->field($model, 'lnp_min_processing_fee') ?>

    <?php // echo $form->field($model, 'lnp_max_processing_fee') ?>

    <?php // echo $form->field($model, 'lnp_min_insurance_fee') ?>

    <?php // echo $form->field($model, 'lnp_max_insurance_fee') ?>

    <?php // echo $form->field($model, 'lnp_min_no_of_repayments') ?>

    <?php // echo $form->field($model, 'lnp_max_no_of_repayments') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
