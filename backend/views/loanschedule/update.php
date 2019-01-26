<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Loanschedule */

$this->title = 'Update Loanschedule: ' . $model->sch_id;
$this->params['breadcrumbs'][] = ['label' => 'Loanschedules', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sch_id, 'url' => ['view', 'id' => $model->sch_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="loanschedule-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
