<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Loanrepayments */

$this->title = 'Update Loanrepayments: ' . $model->lnrp_id;
$this->params['breadcrumbs'][] = ['label' => 'Loanrepayments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->lnrp_id, 'url' => ['view', 'id' => $model->lnrp_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="loanrepayments-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
