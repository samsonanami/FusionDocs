<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\OmDocumentCategory */

$this->title = 'Update Om Document Category: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Om Document Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cat_id, 'url' => ['view', 'id' => $model->cat_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="om-document-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
