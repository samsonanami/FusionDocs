<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Savings */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="savings-form">

<?php $form = ActiveForm::begin();?>
<div class="">
    <div class="box-body box-profile">
    <img class="profile-user-img img-responsive img-circle" src="<?=$modelCustomer->logo?>" alt="User profile picture">
    <h3 class="profile-username text-center"><?=$modelCustomer->TITLE . ' ' . $modelCustomer->FIRST_NAME . ' - ' . $modelCustomer->LAST_NAME?></h3>
</div>        
<?php
// SET INPORTED VALUES
$model->svg_account_number = $modelCustomer->ACCOUNT_NO;
$model->svg_account_unique_number = $modelCustomer->UNIQUE_NO;
$model->svg_account_name = $modelCustomer->ln_account_name;
$model->svg_mobile = $modelCustomer->MOBILE;
$model->svg_city = $modelCustomer->CITY;
$model->svg_cust_id = $modelCustomer->cust_id_no;
?>


<?= $form->field($model, 'svg_transacted_by')->textInput(['maxlength' => true, 'visible' => true,])?>

<?= $form->field($model, 'svg_id_no')->textInput(['maxlength' => true, 'visible' => true,])?>

<?= $form->field($model, 'svg_phone_no')->textInput(['maxlength' => true, 'visible' => true,])?>
 
<?=$form->field($model, 'svg_reference')->textInput(['maxlength' => true])?>

<?= $form->field($model, 'svg_account_number')->hiddenInput(['maxlength' => true, 'visible' => false,])->label(false);?>

<?= $form->field($model, 'svg_account_unique_number')->hiddenInput(['maxlength' => true, 'visible' => false,])->label(false);?>
 
<?= $form->field($model, 'svg_account_name')->hiddenInput(['maxlength' => true, 'visible' => false,])->label(false);?>
 
<?= $form->field($model, 'svg_mobile')->hiddenInput(['maxlength' => true, 'visible' => false,])->label(false);?>
 
<?= $form->field($model, 'svg_city')->hiddenInput(['maxlength' => true, 'visible' => false,])->label(false);?>

<?= $form->field($model, 'svg_cust_id')->hiddenInput(['maxlength' => true, 'visible' => false,])->label(false);?>
 


<?=$form->field($model, 'svg_bal')->textInput(['maxlength' => true])?>

<div class="form-group">
    <?=Html::submitButton('Submit Application', ['class' => 'btn btn-md bg-success btn-flat'])?>
</div>
<?php ActiveForm::end();?>

</div>
