<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div class="loanproducts-form">

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'lnp_name')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'lnp_desc')->textInput(['maxlength' => true]) ?>

<div class="center">
    <input type="checkbox" id="Loancheckbox" name="Loancheckbox" value="enable" class="toggle center">Show and Enable Parameters<br>
</div>
<div class="toggle">
<div class="row">
<div class="col-md-2">
    <span class="">
        <p class="text-danger"><b>Principal amount</b></p>
    </span>
</div>
</div>

<div class="row">
    <div class="col-md-1">
    </div>
    <div class="col-md-9">
        <?= $form->field($model, 'lnp_min_principal_amt')->textInput() ?>
        <?= $form->field($model, 'lnp_max_principal_amt')->textInput() ?>
    </div>
    <div class="col-md-2">
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <span class="">
            <p class="text-danger"><b>Interest</b></p>
        </span>
    </div>
</div>
<div class="row">
<div class="col-md-1">
</div>
<div class="col-md-3">
    <?= $form->field($model, 'lnp_min_interest')->textInput() ?>
</div>
<div class="col-md-3">
    <?= $form->field($model, 'lnp_min_interest_desc')->dropDownList([ 'Weekly' => 'Weekly', 'Monthly' => 'Monthly', 'Yearly' => 'Yearly', '' => '', ], ['prompt' => '']) ?>
</div>
</div>
<div class="row">
<div class="col-md-1">
</div>
<div class="col-md-3">
    <?= $form->field($model, 'lnp_max_interest')->textInput() ?>
</div>
<div class="col-md-3">
        <?= $form->field($model, 'lnp_max_interest_desc')->dropDownList([ 'Weekly' => 'Weekly', 'Monthly' => 'Monthly', 'Yearly' => 'Yearly', '' => '', ], ['prompt' => '']) ?>
</div>
</div>
<div class="row">
    <div class="col-md-12">
        <span class="">
            <p class="text-danger"><b>Duration</b></p>
        </span>
    </div>
</div>
<div class="row">
<div class="col-md-1">
</div>
<div class="col-md-3">
    <?= $form->field($model, 'lnp_min_duration')->textInput() ?>
</div>
<div class="col-md-3">
<?= $form->field($model, 'lnp_min_duration_desc')->dropDownList([ 'Days' => 'Days', 'Weeks' => 'Weeks', 'Years' => 'Years', '' => '', ], ['prompt' => '']) ?>
</div>
</div>
<div class="row">
<div class="col-md-1">
</div>
<div class="col-md-3">
<?= $form->field($model, 'lnp_max_duration')->textInput() ?>
</div>
<div class="col-md-3">
<?= $form->field($model, 'lnp_max_duration_desc')->dropDownList([ 'Days' => 'Days', 'Weeks' => 'Weeks', 'Years' => 'Years', '' => '', ], ['prompt' => '']) ?>
</div>
</div>
<div class="row">
    <div class="col-md-12">
        <span class="">
            <p class="text-danger"><b>Repayment</b></p>
        </span>
    </div>
</div>
<div class="row">
<div class="col-md-1">
</div>
<div class="col-md-2">
    <p class="text-default"><b>Repayment Cycle</b></p>
</div>
<div class="col-md-3">
    <?= $form->field($model, 'lnp_repayment_daily')->checkbox(); ?>
    <?= $form->field($model, 'lnp_repayment_weekly')->checkbox() ?>
    <?= $form->field($model, 'lnp_repayment_biweekly')->checkbox() ?>
    <?= $form->field($model, 'lnp_repayment_monthly')->checkbox() ?>
</div>
<div class="col-md-4">
    <?= $form->field($model, 'lnp_min_no_of_repayments')->textInput() ?>
    <?= $form->field($model, 'lnp_max_no_of_repayments')->textInput() ?>
</div>
</div>
<div class="row">
    <div class="col-md-12">
        <span class="">
            <p class="text-danger"><b>Fees</b></p>
        </span>
    </div>
</div>
<div class="row">
<div class="col-md-1">
</div>
<div class="col-md-3">
<?= $form->field($model, 'lnp_min_processing_fee')->textInput() ?>
</div>
<div class="col-md-3">
<?= $form->field($model, 'lnp_max_processing_fee')->textInput() ?>
</div>
</div>
<div class="row">
<div class="col-md-1">
</div>
<div class="col-md-3">
<?= $form->field($model, 'lnp_min_insurance_fee')->textInput(['maxlength' => true]) ?>
</div>
<div class="col-md-3">
<?= $form->field($model, 'lnp_max_insurance_fee')->textInput(['maxlength' => true]) ?>
</div>
</div>    

       
    <br>
    </div>
</div>
<div class="form-group">
    <?= Html::submitButton('Calncel', ['class' => 'btn btn-flat bg-gray btn-md']) ?>
    <?= Html::submitButton('Submit', ['class' => 'btn btn-flat bg-olive pull-right btn-md']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>
