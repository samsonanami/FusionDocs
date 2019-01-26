<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Expenses */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="expenses-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'exp_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'exp_details')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'exp_amt')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-flat bg-primary pull-right']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
