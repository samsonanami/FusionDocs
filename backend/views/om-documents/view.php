<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\OmDocuments */

// $this->title = $model->title;
// $this->params['breadcrumbs'][] = ['label' => 'Om Documents', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" id="myDiv" class="animate-bottom">
    <!-- Main content -->
    <section class="content">

            <div class="om-documents-view">
                <h1><?= Html::encode($this->title) ?></h1>
                <p>
                    <?= Html::a('Update', ['update', 'id' => $model->doc_id], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('Delete', ['delete', 'id' => $model->doc_id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]) ?>
                    <?= Html::a('Download', ['download', 'id' => $model->doc_id], ['class' => 'btn btn-success']) ?>                    
                </p>
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'doc_id',
                        'short_title',
                        'title',
                        'categoty',
                        'type',
                        'keyword',
                        'note',
                        'created_by',
                        'doc_link:ntext',
                        'date_created',
                    ],
                ]) ?>

            </div>
        </section>
    </div>

