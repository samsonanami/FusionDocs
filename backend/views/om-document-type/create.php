<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\OmDocumentType */

$this->title = 'Create Om Document Type';
$this->params['breadcrumbs'][] = ['label' => 'Om Document Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="om-document-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
