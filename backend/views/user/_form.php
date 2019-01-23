<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\AuthItem;

$authItems = AuthItem::find()->all();
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
        
    <?php
    $authItems= ArrayHelper::map($authItems,'name','name');
    ?>
    <?= $form->field($model, 'permissions')->checkboxList($authItems); ?>

    <div class="form-group">
        <?= Html::submitButton('Save New User', ['class' => 'btn btn-flat bg-olive pull-right']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
