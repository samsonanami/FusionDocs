<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';

include_once 'notification.php';
?>
<script>
toastr.options = {
    'closeButton': false,
    'debug': false,
    'newestOnTop': false,
    'progressBar': false,
    'positionClass': 'toast-bottom-right',
    'preventDuplicates': false,
    'onclick': null,
    'showDuration': '300',
    'hideDuration': '1000',
    'timeOut': '5200',
    'extendedTimeOut': '1000',
    'showEasing': 'swing',
    'hideEasing': 'linear',
    'showMethod': 'fadeIn',
    'hideMethod': 'fadeOut'
}

toastr.success('" . $message . "', 'Success Alert');
</script>


<div class="sie-login" >
    <div class="login-box" id="myDiv" class="animate-bottom">
         
          <!-- /.login-logo -->
          <div class="box box-primary box-solid">
          <div class="box-header">
          	 <div class="login-logo">
                <p><b>INVESTOBRAIN</b></p>
              </div>
          </div>
          <div class="login-box-body">
          	 <p class="login-box-msg">Sign in to start your session</p>

            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                    <div class="form-group has-feedback">
                        <?= $form->field($model, 'username',['inputOptions'=>['autofocus'=>'autofocus', 'class'=>'form-control']])->textInput(['autofocus' => true])->input('username',['placeholder'=>"Username or Email"]) ?>
                        <!-- <span class="glyphicon glyphicon-envelope form-control-feedback"></span> -->
                    </div>
                    <div class="form-group has-feedback">
                        <?= $form->field($model, 'password',['inputOptions'=>['autofocus'=>'autofocus', 'class'=>'form-control']])->passwordInput(['autofocus' => true])->input('password',['placeholder'=>"Password"]) ?>
                        <!-- <span class="glyphicon glyphicon-lock form-control-feedback"></span> -->
                    </div>
                    <div class="form-group">
                        <?= Html::submitButton('Sign In', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
                    </div>
                   
            <?php ActiveForm::end(); ?>
            
          </div>
          <!-- /.login-box-body -->
          
          
          </div>
           
        </div>
        <!-- /.login-box -->

</div>
