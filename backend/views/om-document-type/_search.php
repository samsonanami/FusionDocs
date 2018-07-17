<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OmDocumentTypeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="om-document-type-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'type_id') ?>

    <?= $form->field($model, 'type_no') ?>

    <?= $form->field($model, 'type_name') ?>

    <?= $form->field($model, 'type_desc') ?>

    <?= $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'date_created') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
