<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Savings */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="savings-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'svg_account_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'svg_account_number')->textInput() ?>

    <?= $form->field($model, 'svg_product_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'svg_bal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'svg_mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'svg_city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'svg_last_transaction')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'svg_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'svg_reference')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'svg_date')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn bg-olive btn-md btn-flat ']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
