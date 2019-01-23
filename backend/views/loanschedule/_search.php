<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\controllers\LoanscheduleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="loanschedule-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'sch_id') ?>

    <?= $form->field($model, 'sch_date') ?>

    <?= $form->field($model, 'sch_principal') ?>

    <?= $form->field($model, 'sch_interest') ?>

    <?= $form->field($model, 'sch_fee') ?>

    <?php // echo $form->field($model, 'sch_penalty_amount') ?>

    <?php // echo $form->field($model, 'sch_due_amt') ?>

    <?php // echo $form->field($model, 'sch_desc') ?>

    <?php // echo $form->field($model, 'sch_ln_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
