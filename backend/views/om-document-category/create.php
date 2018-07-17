<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\OmDocumentCategory */

$this->title = 'Create Om Document Category';
$this->params['breadcrumbs'][] = ['label' => 'Om Document Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="om-document-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
