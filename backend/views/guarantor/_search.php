<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\controllers\GuarantorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="guarantor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'grt_id') ?>

    <?= $form->field($model, 'grt_ln_id') ?>

    <?= $form->field($model, 'grt_member_id') ?>

    <?= $form->field($model, 'grt_amount') ?>

    <?= $form->field($model, 'grt_created_at') ?>

    <?php // echo $form->field($model, 'grt_created_by') ?>

    <?php // echo $form->field($model, 'grt_last_updated') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
