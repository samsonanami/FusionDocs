<?php

use dosamigos\datepicker\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$time = time();
$date = "20" . date('y-m-d', $time);

$model->shr_created_by = Yii::$app->user->identity->username;
?>

<div class="shares-form">
<div class="row">
<div class="col-md-4">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'shr_cust_id')->textInput(['maxlength' => true, 'readonly' => true,  'value' => $modelCustomer->cust_id_no])->label('ID NO');?>
    <?= $form->field($model, 'shr_account_name')->textInput(['maxlength' => true, 'readonly' => true, 'value' => $modelCustomer->ln_account_name])->label('ACCOUNT NAME');?>
    <?= $form->field($model, 'shr_account_no')->textInput(['maxlength' => true, 'readonly' => true, 'value' => $modelCustomer->UNIQUE_NO])->label('ACCOUNT NO');?>
</div> 
<div class="col-md-4">
    <?= $form->field($model, 'shr_amount')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'shr_mobile')->textInput(['maxlength' => true, 'readonly' => false, 'value' => $modelCustomer->MOBILE])->label('PHONE');?>
    <?= $form->field($model, 'shr_date')->widget(
    DatePicker::className(), [
        'inline' => false,
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd',
        ],
        'options'=>[
            'value' => date('Y-m-d',$time),
            'editable' => true,
        ],
])->label('Date');?>
    <?= $form->field($model, 'shr_created_by')->hiddenInput(['maxlength' => true, 'value'=>Yii::$app->user->identity->username]) ?>

</div> 
<div class="col-md-4">
</div>
<div class="col-md-4">
<div class="box-body box-profile">
<img class="profile-user-img img-responsive img-circle" src="<?=$modelCustomer->logo?>" alt="User profile picture">
<h3 class="profile-username text-center"><?=$modelCustomer->TITLE . ' ' . $modelCustomer->FIRST_NAME . ' - ' . $modelCustomer->LAST_NAME?></h3>
</div>
<div class="text-center">
    <div class="form-group">
        <?= Html::submitButton('<i class="fa fa-check">Upload shares</i>', ['class' => 'btn btn-flat btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>
</div>
