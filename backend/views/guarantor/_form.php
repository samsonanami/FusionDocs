<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="guarantor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'grt_ln_id')->textInput() ?>

    <?= $form->field($model, 'grt_member_id')->textInput() ?>

    <?= $form->field($model, 'grt_amount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'grt_created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
