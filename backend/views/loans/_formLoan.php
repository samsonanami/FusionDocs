<?php
use backend\models\Customers;
use backend\models\Loanproducts;
use backend\models\Loans;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$modelLoanprod = new Loanproducts();
$modelLoan = new Loans();
$modelCust = new Customers();
?>

<div class="loans-form">
<?php $form = ActiveForm::begin();?>
<div class="col-md-12">
    <div class="box box-default box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">Required 9 Fields</h3>
        <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
        <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    <div class="col-md-4">
        <?=$form->field($modelCust, 'ACCOUNT_NO')->dropDownList(
    ArrayHelper::map(Customers::find()->orderBy('FIRST_NAME')->asArray()->all(),
        'ACCOUNT_NO',
        function ($modelCust) {
            return $modelCust['FIRST_NAME'] . '-' . $modelCust['LAST_NAME'];
        }),
    ['prompt' => 'Select Customer']
)?>
        <?=$form->field($modelLoanprod, 'lnp_id')->dropDownList(
    ArrayHelper::map(Loanproducts::find()->orderBy('lnp_name')->asArray()->all(), 'lnp_id', 'lnp_name'),
    ['prompt' => 'Select Loan Product']
)?>
        <?=$form->field($modelLoan, 'ln_principal')->textInput(['maxlength' => true, 'id' => 'principal'])?>
    </div>
    <div class="col-md-2">
       <?=$form->field($modelLoan, 'ln_released')->widget(
    DatePicker::className(), [
        // inline too, not bad
        'inline' => false,
        // modify template for custom rendering
        // 'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd',
        ],
    ]);?>

    </div>
    <div class="col-md-3">
        <?=$form->field($modelLoan, 'ln_description')->textArea(['rows' => 4])?>
    </div>
    </div>
    <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
<div class="col-md-12">
    <div class="box box-default box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">Loan Action</h3>
        <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
        <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    <div class="col-md-6">
    <div class="form-group">
        <?=Html::submitButton('Submit Details', ['class' => 'btn btn-lg btn-flat bg-green'])?>
        <?=Html::submitButton('View Schedule', ['class' => 'btn btn-lg btn-flat bg-purple'])?>
    </div>
    </div>
    </div>
    <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>

<?php ActiveForm::end();?>

</div>
