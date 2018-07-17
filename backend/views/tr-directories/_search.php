<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TrDirectoriesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tr-directories-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'dir_id') ?>

    <?= $form->field($model, 'dir_parent_id') ?>

    <?= $form->field($model, 'dir_level') ?>

    <?= $form->field($model, 'dir_name') ?>

    <?= $form->field($model, 'dir_date_created') ?>

    <?php // echo $form->field($model, 'dir_created_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
