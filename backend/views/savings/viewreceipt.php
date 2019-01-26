<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->svg_account_name;
?>

<div class="savings-update">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <!-- title row z-->
      <div class="row">
        <div class="col-md-3">
        <div class="box box-default box-solid margin text-center membr custom">
            <hr>
            <?= $modelCompany->com_name; ?><br>
            Address: <?= $modelCompany->com_address; ?><br>
            Phone: <?= $modelCompany->com_phone; ?><br>
            Email: <?= $modelCompany->com_email; ?><br>
            --------------------------------------------------------------<br>
            Transaction  Summary:<br>
            --------------------------------------------------------------<br>
            Transaction #: <?= $model->svg_id ?><br>
            Date & Time: <?= $model->svg_date ?><br>
            Customer Name: <br>
            <?= $model->svg_account_name?><br>
            Identification #:<br>
            <?= $model->svg_cust_id ?><br>
            Amount (Ksh): <br>
            <?= $model->svg_bal?><br>
            Reference #: <br>
            <?= $model->svg_reference?><br>
            Transaction Type: Shares Deposit<br>
            --------------------------------------------------------------<br>
            I/We acknowledge the receipt of the above<br>

            Customer Name:<br>
            ________________________________<br>
            Customer Sign:<br>

            ________________________________<br>
             Customer ID #:<br>

            ________________________________<br>
            Customer Phone:<br>

            ________________________________<br>


            Transacted by: <?= $model->created_by ?>
            <hr>
            </div>
           
      </div>
      <div class="col-md-9">
      <button class="btn btn-flat btn-md bg-success pull-left margin" onclick="window.print()"> <i class="fa fa-print"></i> Print Receipt</button>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
  <!-- /.content-wrapper -->


</div>