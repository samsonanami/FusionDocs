<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OmDocumentsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="om-documents-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'class' => 'form-inline'
         ]
    ]); ?>

    <?= $form->field($model, 'doc_id')->textInput(['maxlength' => true,'class'=>'float-left'])->input('doc_id',['placeholder' => "Doc id e.g 7"])->label(false) ?>

    <?= $form->field($model, 'short_title')->textInput(['maxlength' => true,'class'=>'float-left'])->input('doc_id',['placeholder' => "By short title"])->label(false)  ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true,'class'=>'float-left'])->input('doc_id',['placeholder' => "By document title"])->label(false)  ?>

    <?= $form->field($model, 'categoty')->textInput(['maxlength' => true,'class'=>'float-left'])->input('doc_id',['placeholder' => "By category"])->label(false)  ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true,'class'=>'float-left'])->input('doc_id',['placeholder' => "By document type"])->label(false)  ?>

    <?php // echo $form->field($model, 'keyword') ?>

    <?php // echo $form->field($model, 'note') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'doc_link') ?>

    <?php // echo $form->field($model, 'date_created') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
