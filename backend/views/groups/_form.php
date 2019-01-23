<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use backend\models\Customers;

?>

<div class="groups-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'grp_name')->textInput(['maxlength' => true]) ?>

    <?=$form->field($model, 'grp_leader_id')->dropDownList(
            ArrayHelper::map(Customers::find()->orderBy('FIRST_NAME')->asArray()->all(), 
            'ACCOUNT_NO',
            function($model) {
                return $model['FIRST_NAME'].'-'.$model['LAST_NAME'];
            }),
            ['prompt' => 'Select Leader']
            )?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-flat bg-success pull-right margin']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
