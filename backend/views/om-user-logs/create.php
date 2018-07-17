<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\OmUserLogs */

$this->title = 'Create Om User Logs';
$this->params['breadcrumbs'][] = ['label' => 'Om User Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="om-user-logs-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
