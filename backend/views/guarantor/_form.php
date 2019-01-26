<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Customers;
?>

<div class="guarantor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($guarantors, 'grt_ln_id')->textInput(['value'=>$modelLoans->ln_id, 'readonly'=>true])->label('LOAN ID') ?>
    <?= $form->field($guarantors, 'grt_member_id')->dropDownList(
        ArrayHelper::map(Customers::find()->asArray()->all(), 'ACCOUNT_NO', 'ln_account_name'),
        ['promppt'=>'Select Customer']
        )?>

    <?= $form->field($guarantors, 'grt_amount')->textInput(['maxlength' => true])->label('AMOUNT TO GARANTEE') ?>

 <div class="form-group">
        <?= Html::submitButton('<i class="fa fa-plus">&nbsp;</i> Add Guarantor', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
