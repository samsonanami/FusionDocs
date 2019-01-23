<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\controllers\CustomersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customers-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
]);?>

    <?=$form->field($model, 'UNIQUE_NO')->textInput(['class' => 'text-black form-control','placeholder'=>'Unique Number'])->label(false)?>
    <?=$form->field($model, 'ln_account_name')->textInput(['class' => 'text-black form-control','placeholder'=>'Account Name'])->label(false)?>
    <?=$form->field($model, 'MOBILE')->textInput(['class' => 'text-black form-control','placeholder'=>'Phone Number'])->label(false)?>
    <?=$form->field($model, 'cust_id_no')->textInput(['class' => 'text-black form-control','placeholder'=>'ID Number'])->label(false)?>
    <?=$form->field($model, 'cust_kra_pin')->textInput(['class' => 'text-black form-control','placeholder'=>'KRA PIN Number'])->label(false)?>

    <?php // echo $form->field($model, 'TITLE') ?>



    <?php // echo $form->field($model, 'EMAIL') ?>

    <?php // echo $form->field($model, 'UNIQUE_NO') ?>

    <?php // echo $form->field($model, 'DOB') ?>

    <?php // echo $form->field($model, 'ADDRESS') ?>

    <?php // echo $form->field($model, 'CITY') ?>

    <?php // echo $form->field($model, 'PROVINCE_STATE') ?>

    <?php // echo $form->field($model, 'ZIPCODE') ?>

    <?php // echo $form->field($model, 'LANDINE_PHONE') ?>

    <?php // echo $form->field($model, 'BUSINESS_NAME') ?>

    <?php // echo $form->field($model, 'WORKING_STATUS') ?>

    <?php // echo $form->field($model, 'DESCRIPTION') ?>

    <?php // echo $form->field($model, 'STAFF_ACCESS') ?>

    <?php // echo $form->field($model, 'logo') ?>

    <?php // echo $form->field($model, 'files') ?>


    <?php // echo $form->field($model, 'cust_grp_id') ?>

    <div class="form-group">
        <?=Html::resetButton('Reset <i class="fa fa-refresh"></i>', ['class' => 'btn btn-flat bg-default btn-outline'])?>
        <?=Html::submitButton('Search <i class="fa fa-search"></i>', ['class' => 'btn btn-flat bg-success btn-outline'])?>
    </div>

    <?php ActiveForm::end();?>

</div>
