<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\OmUserLogs */

$this->title = 'Update Om User Logs: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Om User Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="om-user-logs-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
