<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\controllers\SearchShares */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Shares';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shares-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Shares', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'shr_id',
            'shr_cust_id',
            'shr_account_name',
            'shr_account_no',
            'shr_amount',
            //'shr_mobile',
            //'shr_created_at',
            //'shr_created_by',
            //'shr_last_updated',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
