<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Loanschedule */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="loanschedule-form">


    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sch_date')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sch_principal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sch_interest')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sch_fee')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sch_penalty_amount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sch_due_amt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sch_desc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sch_ln_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
