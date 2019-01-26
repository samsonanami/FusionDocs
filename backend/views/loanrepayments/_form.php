<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Loans;
use yii\helpers\ArrayHelper;
use dosamigos\datepicker\DatePicker;
use backend\models\Groups;
use backend\models\Customers;
use backend\models\Loanproducts;
?>

<div class="savings-form">
<?php $form = ActiveForm::begin();?>
<div class="row">
<div class="col-md-4">
    <div class="">
        <div class="box-body box-profile">
        <img class="profile-user-img img-responsive img-circle" src="<?=$modelCustomer->logo?>" alt="User profile picture">
        <h3 class="profile-username text-center"><?=$modelCustomer->TITLE . ' ' . $modelCustomer->FIRST_NAME . ' - ' . $modelCustomer->LAST_NAME?></h3>
        </div>
        <!-- /.box-body -->
    </div>
</div>
<?php
// SET INPORTED VALUES
// $model->lnrp_ln_id = $modelLoan->ln_id;
// $model->svg_account_name = $modelCustomer->ln_account_name;
// $model->svg_mobile = $modelCustomer->MOBILE;
// $model->svg_city = $modelCustomer->CITY;
?>

<div class="col-md-4">

<?=$form->field($model, 'lnrp_payment_method')->dropDownList(['Cash' => 'Cash','M-Pesa' => 'M-Pesa','Cheque'=>'Cheque','Bank Transfer'=>'Bank Transfer'], ['prompt' => 'Select Payment Method'])?>

<?=$form->field($model, 'lnrp_ln_id')->dropDownList(
    ArrayHelper::map(Loans::find()->andWhere("ln_status=3 AND ln_customer_id=$modelCustomer->ACCOUNT_NO")->orderBy('ln_released')->asArray()->all(), 'ln_id','ln_name'),
    [
        'prompt' => 'Select Loan',
        'onchange'=>'
        $.post("index.php?r=loanrepayments/lists&id='.'"+$(this).val(), function(data) {
            $("select#models-contact").html(data);
        });'
    ])
?>

<?= $form->field($model, 'lnrp_paid_amount')->textInput(['maxlength' => true, 'visible' => false,])?>
 
</div>
<div class="col-md-4">
<?=$form->field($model, 'lnrp_extra_payment')->textInput(['maxlength' => true])?>
<?=$form->field($model, 'lnrp_reference')->textInput(['maxlength' => true])?>
 
<div class="form-group">
    <?=Html::submitButton('Submit Application', ['class' => 'btn btn-md bg-olive btn-flat'])?>
</div>
</div>
</div>
<!-- /.box-body -->
</div>
<!-- /.box -->
</div>
        
</div>

<?php ActiveForm::end();?>

</div>
