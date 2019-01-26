<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\BaseArrayHelper;
use yii\helpers\ArrayHelper;
use app\backend\Site;
use backend\models\SignupForm;

$this->title = 'Signup';
?>

<div class="loanrepayments-index">

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <section class="content">
    <!-- /.box -->
    <!-- Default box -->
    <div class="box box-primary box-solid">
    <div class="box-header with-border box-profile">
        <small>New user registration</small>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
        <div class="customers-index">
             <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

              <?= $form->field($model, 'first_name')->textInput(['autofocus' => true]) ?>
              <?= $form->field($model, 'last_name') ?>
              <?= $form->field($model, 'username')?>

              <?= $form->field($model, 'email') ?>
              <?= $form->field($model, 'phone') ?>

              <?= $form->field($model, 'password')->passwordInput() ?>
              <?= $form->field($model, 'password_repeat')->passwordInput() ?>
              <?php
              $authItems= ArrayHelper::map($authItems,'name','name');
              ?>
              <?= $form->field($model, 'permissions')->checkboxList($authItems); ?>
              <?=$form->field($model, 'file')->fileInput(); ?> 

               
                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-flat bg-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
<!-- /.box-body -->
</div>

<div class="box-footer">
  <!-- footer area -->
</div>
<!-- /.box-footer-->

</section>
<!-- /.content -->

</div>