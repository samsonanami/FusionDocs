<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Withdrawals */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="withdrawals-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'wth_acc_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'wth_amount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'wth_date')->textInput() ?>

    <?= $form->field($model, 'wth_transacted_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'wth_ref')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
