<?php

use dosamigos\datepicker\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
    <?php $form = ActiveForm::begin([
    'action' => ['rptpastmaturity'],
    'method' => 'get',
]);?>
    <div class="form-group pull-left margin">
        <?php echo $form->field($model, 'sch_from_date')->widget(
        DatePicker::className(), [
            // inline too, not bad
            'inline' => false,
            // modify template for custom rendering
            // 'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
            // 'options' => ['placeholder' => date('Y-m-d', strtotime('-2 days'))],
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
                // 'endDate' => date('Y-m-d'),
            ],
        ])->label('From'); ?>
        </div>
    <div class="form-group">
        <label>Actions</label><br>
        <?=Html::submitButton('<i class="fa fa-refresh"></i> Refresh', ['class' => 'btn btn-flat btn-md bg-info pull-left margin'])?>
        <?=Html::a('<i class="fa fa-download"></i> Generate PDF', ['rptpastmaturity', 'from' => $model->sch_from_date], ['class' => 'btn btn-flat btn-md bg-success pull-left margin'])?>
        <button class="btn btn-flat btn-md bg-success pull-left margin" onclick="window.print()"> <i class="fa fa-print"></i> Print</button>
        <?php ActiveForm::end();?>
    </div>

