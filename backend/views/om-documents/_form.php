<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OmDocuments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="om-documents-form">
            <!-- Get the doc id -->
              <?php
                $request = Yii::$app->request;
                $id = $request->get('id', 1);
              ?>

                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'dir_id')->textInput(['maxlength' => true, 'class'=>'form-control float-left', 'value'=>$id]) ?>

                <?= $form->field($model, 'attachment')->fileInput(['maxlength' => true, 'class'=>'form-control']); ?>

                <?= $form->field($model, 'short_title')->textInput(['maxlength' => true, 'class'=>'form-control float-left']) ?>

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
