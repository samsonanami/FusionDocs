<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\OmDocumentType */

$this->title = 'Update Om Document Type: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Om Document Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->type_id, 'url' => ['view', 'id' => $model->type_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="om-document-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
