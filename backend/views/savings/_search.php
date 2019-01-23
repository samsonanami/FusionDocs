<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SavingsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="savings-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'svg_id') ?>

    <?= $form->field($model, 'svg_account_name') ?>

    <?= $form->field($model, 'svg_account_number') ?>

    <?= $form->field($model, 'svg_product_name') ?>

    <?= $form->field($model, 'svg_bal') ?>

    <?php // echo $form->field($model, 'svg_mobile') ?>

    <?php // echo $form->field($model, 'svg_city') ?>

    <?php // echo $form->field($model, 'svg_last_transaction') ?>

    <?php // echo $form->field($model, 'svg_status') ?>

    <?php  echo $form->field($model, 'svg_reference') ?>

    <?php  echo $form->field($model, 'svg_date') ?>

    <?php  echo $form->field($model, 'created_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
