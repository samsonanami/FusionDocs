<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use backend\models\Groups;
use backend\models\Customers;
use backend\models\Loanproducts;
?>

<div class="loans-form">
<?php $form = ActiveForm::begin();?>
<div class="col-md-12">
    <div class="box box-default box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">Required Fields</h3>

        <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
        <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    <div class="col-md-4">
        <?=$form->field($model, 'ln_customer_id')->dropDownList(
            ArrayHelper::map(Customers::find()->orderBy('FIRST_NAME')->asArray()->all(), 
            'ACCOUNT_NO',
            function($model) {
                return $model['FIRST_NAME'].'-'.$model['LAST_NAME'];
            }),
            ['prompt' => 'Select Customer']
            )?>
        <?=$form->field($model, 'lnp_id')->dropDownList(
            ArrayHelper::map(Loanproducts::find()->orderBy('lnp_name')->asArray()->all(), 'lnp_id','lnp_name'),
            ['prompt' => 'Select Loan Product']
            )?>
        <?= $form->field($model, 'ln_principal')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-4"> 
        <?= $form->field($model, 'ln_interest')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'ln_duration')->dropDownList(
            ['1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9',
            '10'=>'10','11'=>'11','12'=>'12','13'=>'13','14'=>'14','15'=>'15','16'=>'16','17'=>'17','18'=>'18','19'=>'19',
            '20'=>'20','21'=>'21','22'=>'22','23'=>'23','24'=>'24','25'=>'25','26'=>'26','27'=>'27','28'=>'28','29'=>'29',
            '30'=>'30','31'=>'31','32'=>'32','33'=>'33','34'=>'34','35'=>'35','36'=>'36','37'=>'37','38'=>'38','39'=>'39',
            '40'=>'40','41'=>'41','42'=>'42','43'=>'43','44'=>'44','45'=>'45','46'=>'46','47'=>'47','48'=>'48','49'=>'49','50'=>'50',],
            ['prompt' => '','class'=>'selectedValue', 'id'=>'loanDuration']) ?>
        <?= $form->field($model, 'ln_released')->widget(
            DatePicker::className(), [
                // inline too, not bad
                'inline' => false, 
                // modify template for custom rendering
                // 'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
        ]);?>
        
    </div>
    <div class="col-md-4">
         <?= $form->field($model, 'ln_interest_time')->dropDownList([ 'Per Day' => 'Per Day', 'Per Week' => 'Per Week', 'Per Month' => 'Per Month', 'Per Year' => 'Per Year', ], ['prompt' => '']) ?>
        <?= $form->field($model, 'ln_duration_desc')->dropDownList([ 'Days' => 'Days', 'Weeks' => 'Weeks', 'Months' => 'Months', 'Years' => 'Years', ], ['prompt' => '','class'=>'selectedValue', 'id'=>'loanDurationCycle']) ?>

    </div>
    </div>
    <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
<div class="col-md-12">
    <div class="box box-default box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">Loan Modifier Fields</h3>

        <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
        <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    <div class="col-md-6">
    <?= $form->field($model, 'ln_penalty')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'ln_due')->widget(
            DatePicker::className(), [
                // inline too, not bad
                'inline' => false, 
                // modify template for custom rendering
                // 'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
        ]);?>

    <?= $form->field($model, 'ln_paid')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'ln_balance')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'ln_status')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'ln_repayment')->dropDownList([ 'Daily' => 'Daily', 'Weekly' => 'Weekly', 'Biweekly' => 'Biweekly', 'Monthly' => 'Monthly', ], ['prompt' => '','class'=>'selectedValue', 'id'=>'loanRepaymentCycle']) ?>
    <?= $form->field($model, 'ln_maturity')->widget(
            DatePicker::className(), [
                // inline too, not bad
                'inline' => false, 
                // modify template for custom rendering
                // 'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
        ]);?>
    </div>
    <div class="col-md-6">
    <?= $form->field($model, 'ln_description')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'ln_processing_fee_perc')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'ln_processing_fee')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'ln_insurance_fee')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'ln_fees')->textInput(['maxlength' => true])->input('email', ['placeholder' => "Percentage"]); ?>
   
    <?= $form->field($model, 'ln_repayment_count')->textInput(['maxlength' => false, 'id'=>'amount']) ?>
        <div class="form-group">
            <?=Html::submitButton('Save Details', ['class' => 'btn btn-success'])?>
        </div>
    </div>    
    </div>
    <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>

<?php ActiveForm::end();?>

</div>
