<?php

use yii\helpers\Html;
use backend\models\Loans;


/* @var $this yii\web\View */
/* @var $model backend\models\Loanrepayments */

$this->title = 'Create Loanrepayments';
$this->params['breadcrumbs'][] = ['label' => 'Loanrepayments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loanrepayments-create">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><?=Html::encode($this->title)?>
        <small>Fill the Form to apply</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo Yii::$app->homeUrl ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <p>Loan Application Form</p>

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
        <?php
        //  $modelCustomer = Customers::findOne($id);
         $modelCustomer = new Loans();         
         ?>
         
        <?=$this->render('_form', [
          'model' => $model,
          'modelCustomer' => $modelCustomer,
       ])?>
<!-- /.box-body -->
</div>

<div class="box-footer">
  <!-- footer area -->
</div>
<!-- /.box-footer-->

</section>
<!-- /.content -->
