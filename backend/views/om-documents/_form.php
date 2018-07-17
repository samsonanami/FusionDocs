<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OmDocuments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="om-documents-form">
                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'attachment')->fileInput(); ?>

                <?= $form->field($model, 'short_title')->textInput(['maxlength' => true, 'class'=>'float-left']) ?>

                <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'categoty')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'keyword')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'note')->textArea(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Upload Document >>', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
