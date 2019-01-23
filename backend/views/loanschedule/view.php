<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Loanschedule */

$this->title = $model->sch_id;
$this->params['breadcrumbs'][] = ['label' => 'Loanschedules', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="loanschedule-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->sch_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->sch_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'sch_id',
            'sch_date',
            'sch_principal',
            'sch_interest',
            'sch_fee',
            'sch_penalty_amount',
            'sch_due_amt',
            'sch_desc',
            'sch_ln_id',
        ],
    ]) ?>

</div>
