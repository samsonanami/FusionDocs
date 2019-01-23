<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\controllers\LoansSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="loans-search">

    <?php $form = ActiveForm::begin([
    'action' => ['reports'],
    'method' => 'get',
]);?>
<div class="row">
    <div class="col-md-3">
        <?php echo $form->field($model, 'ln_due')->widget(
            DatePicker::className(), [
                // inline too, not bad
                'inline' => false,
                // modify template for custom rendering
                // 'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd',
                ],
        ])->label('Select Collection Date here');?>
    <div class="form-group">
        <?=Html::submitButton('Refresh', ['class' => 'btn btn-flat bg-olive'])?>
    </div>
    </div>
</div>
   
   

    <?php ActiveForm::end();?>

</div>
