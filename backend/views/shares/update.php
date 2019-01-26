<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Shares */

$this->title = 'Update Shares: ' . $model->shr_id;
$this->params['breadcrumbs'][] = ['label' => 'Shares', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->shr_id, 'url' => ['view', 'id' => $model->shr_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="shares-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
