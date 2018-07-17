<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
?>
<div class="sie-login">
    <div class="login-box">
          <div class="login-logo">
            <a href="../../index2.html"><b>Fusion</b>Docs</a>
          </div>
          <!-- /.login-logo -->
          <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>

           
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                    <div class="form-group has-feedback">
                        <?= $form->field($model, 'username',['inputOptions'=>['autofocus'=>'autofocus', 'class'=>'form-control']])->textInput(['autofocus' => true])->input('username',['placeholder'=>"Username or Email"]) ?>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <?= $form->field($model, 'password',['inputOptions'=>['autofocus'=>'autofocus', 'class'=>'form-control']])->passwordInput(['autofocus' => true])->input('password',['placeholder'=>"Password"]) ?>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>

                    <?= $form->field($model, 'rememberMe')->checkbox() ?>

                    <div class="form-group">
                        <?= Html::submitButton('Sign In', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
                    </div>
                    <a href="#">I forgot my password</a><br>
                    <a href="register.html" class="text-center">Register a new membership</a>

            <?php ActiveForm::end(); ?>
            
          </div>
          <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->

</div>
