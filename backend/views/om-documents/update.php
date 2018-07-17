<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\OmDocuments */

$this->title = 'Update Om Documents: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Om Documents', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->doc_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

		<div class="om-documents-update">

		    <h1><?= Html::encode($this->title) ?></h1>

		    <?= $this->render('_form', [
		        'model' => $model,
		    ]) ?>

		</div>
	</section>
</div>