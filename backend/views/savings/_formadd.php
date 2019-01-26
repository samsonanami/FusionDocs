<?php

use dosamigos\datepicker\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$time = time();
$date = "20" . date('y-m-d', $time);
?>
<div class="savings-form">

<div class="row">
<div class="col-md-4">
<?php $form = ActiveForm::begin();?>

<?= $form->field($model, 'svg_account_number')->textInput(['maxlength' => true, 'readonly' => true, 'value' => $modelCustomer->ACCOUNT_NO])->label('ACCOUNT NO')?>

<?= $form->field($model, 'svg_account_unique_number')->textInput(['maxlength' => true, 'readonly' => true, 'value' => $modelCustomer->UNIQUE_NO])->label('UNIQUE NO');?>
 
<?= $form->field($model, 'svg_account_name')->textInput(['maxlength' => true, 'readonly' => true, 'value' => $modelCustomer->UNIQUE_NO])->label('ACCOUNT NAME');?>
 
<?= $form->field($model, 'svg_mobile')->textInput(['maxlength' => true, 'readonly' => true, 'value' => $modelCustomer->MOBILE])->label('PHONE');?>
 
<?= $form->field($model, 'svg_city')->textInput(['maxlength' => true, 'readonly' => true, 'value' => $modelCustomer->CITY])->label('CITY');?>

<?= $form->field($model, 'svg_cust_id')->textInput(['maxlength' => true, 'readonly' => true,  'value' => $modelCustomer->cust_id_no])->label('ID NO');?>

</div> 
<div class="col-md-4">
<?= $form->field($model, 'svg_transacted_by')->textInput(['maxlength' => true, 'visible' => true,])?>

<?= $form->field($model, 'svg_id_no')->textInput(['maxlength' => true, 'visible' => true,])?>

<?= $form->field($model, 'svg_phone_no')->textInput(['maxlength' => true, 'visible' => true,])?>
 
<?=$form->field($model, 'svg_reference')->textInput(['maxlength' => true])?>

<?=$form->field($model, 'svg_bal')->textInput(['maxlength' => true])?>
	
</div>
<div class="col-md-4">
<div class="box-body box-profile">
<img class="profile-user-img img-responsive img-circle" src="<?=$modelCustomer->logo?>" alt="User profile picture">
<h3 class="profile-username text-center"><?=$modelCustomer->TITLE . ' ' . $modelCustomer->FIRST_NAME . ' - ' . $modelCustomer->LAST_NAME?></h3>
</div>
<div class="text-center">
	<?= $form->field($model, 'svg_date')->widget(
    DatePicker::className(), [
        'inline' => false,
        'value' => $date,
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd',
        ],
        'options'=>[
            'value' => date('Y-m-d',$time)
        ],
])->label('Date');?>


<div class="form-group">
    <?=Html::submitButton('<i class="fa fa-check"></i>Submit Savings', ['class' => 'btn btn-md btn-primary btn-flat'])?>
</div>
</div>
</div>
</div>       










<?php ActiveForm::end();?>

</div>
