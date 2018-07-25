<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TrDirectories */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tr-directories-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dir_parent_id')->textInput() ?>

    <?= $form->field($model, 'dir_level')->textInput() ?>

    <?= $form->field($model, 'dir_name')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'dir_created_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Create Directory', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
