<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\controllers\WithdrawalsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="withdrawals-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'wth_id') ?>

    <?= $form->field($model, 'wth_acc_no') ?>

    <?= $form->field($model, 'wth_amount') ?>

    <?= $form->field($model, 'wth_date') ?>

    <?= $form->field($model, 'wth_transacted_by') ?>

    <?php // echo $form->field($model, 'wth_ref') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
