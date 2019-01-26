<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\controllers\SearchShares */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shares-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'shr_id') ?>

    <?= $form->field($model, 'shr_cust_id') ?>

    <?= $form->field($model, 'shr_account_name') ?>

    <?= $form->field($model, 'shr_account_no') ?>

    <?= $form->field($model, 'shr_amount') ?>

    <?php // echo $form->field($model, 'shr_mobile') ?>

    <?php // echo $form->field($model, 'shr_created_at') ?>

    <?php // echo $form->field($model, 'shr_created_by') ?>

    <?php // echo $form->field($model, 'shr_last_updated') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
