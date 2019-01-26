<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Withdrawals */

$this->title = 'Update Withdrawals: ' . $model->wth_id;
$this->params['breadcrumbs'][] = ['label' => 'Withdrawals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->wth_id, 'url' => ['view', 'id' => $model->wth_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="withdrawals-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
