<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use backend\models\Groups;

?>

<div class="customers-form">

<?php $form = ActiveForm::begin();?>
<div class="col-md-12">
<div class="card">
    <!-- <div class="box box-default box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">Required Fields</h3>

        <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div> -->
        <!-- /.box-tools -->
    <!-- </div> -->
    <!-- /.box-header -->
    <div class="box-body">
    <h4 class="text-danger bg-info">A. APPLICANT'S DETAILS</h4>
    <div class="col-md-3">
        <?=$form->field($model, 'TITLE')->dropDownList(
            ['Mr','Mrs','Dr','Hon','Pts','Rev,']
            )->label(false);?>
        <?=$form->field($model, 'MOBILE')->textInput(['maxlength' => true,'placeholder'=>'Phone'])->label(false)?>
        <?=$form->field($model, 'EMAIL')->textInput(['maxlength' => true,'placeholder'=>'Email'])->label(false)?>
        <?= $form->field($model, 'DOB')->widget(
        DatePicker::className(), [
            // inline too, not bad
            'inline' => false,
            // modify template for custom rendering
            // 'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
            
            'value' => date('d-M-Y', strtotime('+2 days')),
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd',
                
            ],
            'options' => [
                'todayHighlight' => true,
                'endDate'=>'18d',
                'placeholder' => 'DOB < '.date('d-M-Y', strtotime('-18 years')),
            ],
        ])->label(false);?>
             
    </div>
    <div class="col-md-3">
        <?=$form->field($model, 'FIRST_NAME')->textInput(['maxlength' => true, 'placeholder'=>'First Name'])->label(false)?>
        
        <?=$form->field($model, 'cust_id_no')->textInput(['maxlength' => true, 'placeholder'=>'national ID/Passport'])->label(false)?>
        <?=$form->field($model, 'cust_kra_pin')->textInput(['maxlength' => true, 'placeholder'=>'KRA PIN'])->label(false)?>
        <?=$form->field($model, 'ADDRESS')->textInput(['maxlength' => true, 'placeholder'=>'Address'])->label(false)?>
        
        
    </div>
    <div class="col-md-3">
        <?=$form->field($model, 'LAST_NAME')->textInput(['maxlength' => true, 'placeholder'=>'Last Name'])->label(false)?>
        <?=$form->field($model, 'GENDER')->dropDownList(['Male' => 'Male', 'Female' => 'Female'], ['prompt' => 'Select gender'])->label(false)?>
        <?=$form->field($model, 'COUNTRY')->textInput(['maxlength' => true, 'placeholder'=>'Country'])->label(false)?>
        <?=$form->field($model, 'ZIPCODE')->textInput(['maxlength' => true, 'placeholder'=>'Zip Code'])->label(false)?>
       
    </div>
    <div class="col-md-3">
     <?=$form->field($model, 'LANDINE_PHONE')->textInput(['maxlength' => true, 'placeholder'=>'Landline Tel'])->label(false)?>
        <?=$form->field($model, 'CITY')->textInput(['maxlength' => true, 'placeholder'=>'City'])->label(false)?>
        <?=$form->field($model, 'PROVINCE_STATE')->textInput(['maxlength' => true, 'placeholder'=>'Province/State'])->label(false)?>
        <?php //$form->field($model, 'STAFF_ACCESS')->textInput(['maxlength' => true])?>
       <?=$form->field($model, 'cust_grp_id')->dropDownList(
            ArrayHelper::map(Groups::find()->orderBy('grp_name')->asArray()->all(), 'grp_id','grp_name'),
            ['prompt' => 'Select Group']
           )->label(false)?>
       
    </div>
    
    </div>
    <div class="row">
    <h4 class="text-danger bg-info">B. NEXT OF KING DETAILS</h4>
    <div class="col-md-4">
        <?=$form->field($model, 'nxt_of_king_name')->textInput(['maxlength' => true, 'placeholder'=>'Full Name'])->label(false)?>
        <?=$form->field($model, 'nxt_of_king_id')->textInput(['maxlength' => true, 'placeholder'=>'ID/Passport'])->label(false)?>
        
    </div>
    <div class="col-md-4">
        
        <?=$form->field($model, 'nxt_of_king_email')->textInput(['maxlength' => true, 'placeholder'=>'Email'])->label(false)?>
       <?=$form->field($model, 'nxt_of_king_phone')->textInput(['maxlength' => true, 'placeholder'=>'Phone'])->label(false)?>
    </div>
    <div class="col-md-4">
        <?=$form->field($model, 'nxt_of_king_rel')->textInput(['maxlength' => true, 'placeholder'=>'Relationship'])->label(false)?>
    </div>
    </div>
    <div class="row">
    <h4 class="text-danger bg-info">C. EMPLOYER'S DETAILS</h4>
    <div class="col-md-3">
        <?=$form->field($model, 'emp_name')->textInput(['maxlength' => true, 'placeholder'=>'Name'])->label(false)?>
        <?=$form->field($model, 'emp_designation')->textInput(['maxlength' => true, 'placeholder'=>'Designation'])->label(false)?>
        <?=$form->field($model, 'emp_department')->textInput(['maxlength' => true, 'placeholder'=>'Department'])->label(false)?>
         </div>
    <div class="col-md-3">
        <?=$form->field($model, 'emp_email')->textInput(['maxlength' => true, 'placeholder'=>'Email'])->label(false)?>
        <?=$form->field($model, 'emp_address')->textInput(['maxlength' => true, 'placeholder'=>'Address'])->label(false)?>
        <?=$form->field($model, 'emp_income')->textInput(['maxlength' => true, 'placeholder'=>'Monthly Income'])->label(false)?>
        </div>
    <div class="col-md-3">
        <?=$form->field($model, 'emp_director_name')->textInput(['maxlength' => true, 'placeholder'=>'Director\'s Name'])->label(false)?>
    <?=$form->field($model, 'emp_mobile_no')->textInput(['maxlength' => true, 'placeholder'=>'Phone'])->label(false)?>
        <?=$form->field($model, 'emp_office_no')->textInput(['maxlength' => true, 'placeholder'=>'Office No.'])->label(false)?>
       </div>
    <div class="col-md-3">
        <?=$form->field($model, 'BUSINESS_NAME')->textInput(['maxlength' => true, 'placeholder'=>'Business Name'])->label(false)?>
        <?=$form->field($model, 'WORKING_STATUS')->dropDownList(['Employee' => 'Employee', 'Owner' => 'Owner', 'Student' => 'Student', 'Overseas Worker' => 'Overseas Worker'], ['prompt' => 'Select Working Status'])->label(false)?>
       	 <?=$form->field($model, 'emp_occupation')->textInput(['maxlength' => true, 'placeholder'=>'Occupation'])->label(false)?>
  </div>
    </div>
     <div class="row">
    <h4 class="text-danger bg-info">D. ACCOUNT'S & REFEREE'S DETAILS </h4>
    <div class="col-md-4">
    <?=$form->field($model, 'cust_account_type')->dropDownList(['Member' => 'Member', 'Shareholder' => 'Shareholder', 'Group' => 'Group'], ['prompt' => 'Select Acc Type'])->label(false)?>
        
        <?=$form->field($model, 'file')->fileInput(); ?> 
        <?=$form->field($model, 'attachment')->fileInput(); ?> 
       
       
    </div>
    <div class="col-md-4">
        <?=$form->field($model, 'referee_name')->textInput(['maxlength' => true, 'placeholder'=>'Referee Name'])->label(false)?>
        <?=$form->field($model, 'referee_phone')->textInput(['maxlength' => true, 'placeholder'=>'Referee Phone'])->label(false)?>
         </div>
    <div class="col-md-4">
     <?= $form->field($model, 'DESCRIPTION')->textArea(['rows' => 6,'placeholder'=>'Account Descriptions'])->label(false) ?>
         <div class="form-group">
            <?=Html::submitButton('<i class="fa fa-check">&nbsp;</i>Submit Form', ['class' => 'btn btn-primary btn-blck btn-flat'])?>
        </div>
        </div>
    </div>
    <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
</div>
<div class="col-md-12">
    <!-- <div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Optional Fields</h3>

        <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div> -->
        <!-- /.box-tools -->
    <!-- </div> -->
    <!-- /.box-header -->
    <div class="box-body">
    <div class="col-md-3">
        
        
    </div>
    <div class="col-md-3">
        
       
    </div>    
    </div>
    <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>

<?php ActiveForm::end();?>

</div>
