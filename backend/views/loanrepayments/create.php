<?php

use yii\helpers\Html;
use backend\models\Loans;
use backend\models\Customers;

$this->title = 'Create Loanrepayments';
?>
<div class="loanrepayments-create">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box box-primary box-solid">
      <div class="box-header with-border box-profile">
          <p>Loan Repayment</p>

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
         $modelCustomer = new Customers();
         $modelLoans = new Loans();
         $id = $_GET['id'];
         $modelCustomer = Customers::findOne($id);
         $modelLoan = Loans::findOne($id);
         ?>

        <?=$this->render('_form', [
          'model' => $model,
          'modelCustomer' => $modelCustomer,
          'modelLoan' => $modelLoan,
       ])?>
<!-- /.box-body -->
</div>

<div class="box-footer">
  <!-- footer area -->
</div>
<!-- /.box-footer-->

</section>
<!-- /.content -->
