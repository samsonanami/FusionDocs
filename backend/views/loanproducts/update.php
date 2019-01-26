<?php

use yii\helpers\Html;


$this->title = 'Update Loanproducts: ' . $model->lnp_id;
?>
<div class="loanproducts-update">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><?=Html::encode($this->title)?>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      
    <div class="box box-primary box-solid">
    <div class="box-header with-border box-profile">

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
        <div class="customers-index">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
<!-- /.box-body -->
</div>

<div class="box-footer">
  <!-- footer area -->
</div>
<!-- /.box-footer-->

</section>
<!-- /.content -->


</div>

