<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AuthItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-item-form">
<div class="row">
<div class="col-md-4">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save Item', ['class' => 'btn btn-flat btn-md bg-olive pull-right']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
<div class="col-md-8">

</div>
  
</div>
