<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use backend\models\Groups;
use backend\models\Customers;
use backend\models\Loanproducts;

$time = time();
$date = "20" . date('y-m-d', $time);
?>

<div class="loans-form">
<?php $form = ActiveForm::begin();?>
    <div class="col-md-4">
        <div class="">
            <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="<?=$modelCustomer->logo?>" alt="User profile picture">
            <h3 class="profile-username text-center"><?=$modelCustomer->TITLE.' '.$modelCustomer->FIRST_NAME . ' - ' . $modelCustomer->LAST_NAME?></h3>
            </div>
            <!-- /.box-body -->
        </div>
        <?php
        $model->ln_customer_id=$modelCustomer->ACCOUNT_NO;
        ?>
        <small><?= $form->field($model, 'ln_customer_id')->hiddenInput(['maxlength' => true, 'visible' => false,])->label(false);?></small>
        <?=$form->field($model, 'lnp_id')->dropDownList(
            ArrayHelper::map(Loanproducts::find()->orderBy('lnp_name')->asArray()->all(), 'lnp_id','lnp_name'),
            ['prompt' => 'Select Loan Product']
            )?>
        <?= $form->field($model, 'ln_principal')->textInput(['maxlength' => true,'id'=>'principal']) ?>
        <div class="form-group">
        <button type="button" class="btn btn-flat btn-info" data-toggle="modal" data-target="#modal-info"><i class="fa fa-plus">&nbsp;</i>Add Guarantors</button>
        </div>
        
    </div>
    <div class="col-md-4"> 
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
                ],
                'options'=>[
                ],
        ]);?>
        <?= $form->field($model, 'ln_repayment')->dropDownList([ 'Daily' => 'Daily', 'Weekly' => 'Weekly', 'Biweekly' => 'Biweekly', 'Monthly' => 'Monthly', ], ['prompt' => '','class'=>'selectedValue', 'id'=>'loanRepaymentCycle']) ?>
        <?= $form->field($model, 'ln_repayment_count')->textInput(['maxlength' => false, 'id'=>'amount']) ?>
        
    </div>
    <div class="col-md-4">
        <?= $form->field($model, 'ln_duration_desc')->dropDownList([ 'Days' => 'Days', 'Weeks' => 'Weeks', 'Months' => 'Months', 'Years' => 'Years', ], ['prompt' => '','class'=>'selectedValue', 'id'=>'loanDurationCycle']) ?>
        <?= $form->field($model, 'ln_description')->textArea(['rows' => 6]) ?>
        <?= $form->field($model, 'ln_fees')->textInput(['maxlength' => true])->input('ln_fees', ['placeholder' => "e.g 500"]); ?>
   
    </div>
    <div class="form-group">
            <?=Html::submitButton('<i class="fa fa-check"></i>Submit Application', ['class' => 'btn btn-md btn-primary btn-flat pull-right margin'])?>
        </div>  
</div>
        
</div>

<?php ActiveForm::end();?>

</div>
