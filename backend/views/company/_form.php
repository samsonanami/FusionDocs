<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Company */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="company-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'com_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'com_address')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'com_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'com_email')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
