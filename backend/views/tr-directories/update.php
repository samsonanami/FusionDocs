<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TrDirectories */

$this->title = 'Update Tr Directories: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Tr Directories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->dir_id, 'url' => ['view', 'id' => $model->dir_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tr-directories-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
