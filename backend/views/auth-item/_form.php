<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AuthItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?php //$form->field($model, 'rule_name')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'data')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save item', ['class' => 'btn btn-flat bg-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
