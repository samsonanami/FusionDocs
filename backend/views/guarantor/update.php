<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Guarantor */

$this->title = 'Update Guarantor: ' . $model->grt_id;
$this->params['breadcrumbs'][] = ['label' => 'Guarantors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->grt_id, 'url' => ['view', 'id' => $model->grt_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="guarantor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
