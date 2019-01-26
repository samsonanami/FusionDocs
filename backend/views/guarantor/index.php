<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\controllers\GuarantorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Guarantors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guarantor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Guarantor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'grt_id',
            'grt_ln_id',
            'grt_member_id',
            'grt_amount',
            'grt_created_at',
            //'grt_created_by',
            //'grt_last_updated',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
