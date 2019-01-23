<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;
use backend\models\Company;
$time = time();
$date = "20" . date('y-m-d', $time);

$this->title = 'Loans View';

?>
<div class="loans-index">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <?php echo $this->render('_searchbydate', ['model' => $searchModel]); ?>
      
    </section>
    <hr>
    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12 text-center">
          <h2 class="pag-header">
            <i class="fa fa-text"></i> <?= $modelCompany->com_name; ?>
          </h2>
          <strong><?= $modelCompany->com_name; ?></strong><br>
            Address: <?= $modelCompany->com_address; ?><br>
            Phone: <?= $modelCompany->com_phone; ?><br>
            Email: <?= $modelCompany->com_email; ?><br>
          <h3>Daily Collection Sheet</h3>
          <small class="pull-right">Date: <?= $date ?></small>
          <hr>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
      <?=GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'layout' => '{summary}{items}{pager}',
        'showPageSummary' => true,

            'columns' => [
                // ['class' => 'yii\grid\SerialColumn'],
               // ['class' => 'yii\grid\SerialColumn'],
                [
                    'encodeLabel' => false,
                    'label' => 'ACCOUNT NAME',
                    'value' => 'lnCustomer.ln_account_name',
                    'headerOptions' => [ 'class'=>'text-left t'],
                ],
                [
                    'encodeLabel' => false,
                    'value' => 'lnCustomer.MOBILE',
                    'label' => 'PHONE NUMBER',
                    'headerOptions' => [ 'class'=>'text-left '],
                ],
        
                [
                    'encodeLabel' => false,
                    'value' => 'ln_released',
                    'label' => 'RELEASED',
                    'headerOptions' => ['style' => 'text-align:left'],
                    'format' => 'date',
                ],
                [
                    'encodeLabel' => false,
                    'value' => 'ln_maturity',
                    'label' => 'MATURITY',
                    'headerOptions' => ['style' => 'text-align:left'],
                    'format' => 'date',
                ],
                [
                    'encodeLabel' => false,
                    'value' => 'ln_due',
                    'label' => 'DUE',
                    'headerOptions' => ['style' => 'text-align:left'],
                    'format' => 'date',
                ],
                [
                    'encodeLabel' => false,
                    'value' => 'ln_repayment_count',
                    'label' => 'REPAYMENTS',
                    'headerOptions' => ['style' => 'text-align:left'],
                    'format' => 'integer',
                    // 'format'=>['decimal',0],
                    // 'pageSummary' => true,
                ],
                [
                    'encodeLabel' => false,
                    'value' => 'ln_fees',
                    'label' => 'FEES',
                    'headerOptions' => ['style' => 'text-align:left'],
                    // 'format' => 'date',
                    'format'=>['decimal',2],
                    'pageSummary' => true,
                ],
               [
                    'encodeLabel' => false,
                    'value' => 'ln_maturity',
                    'label' => 'MATURITY',
                    'headerOptions' => ['style' => 'text-align:left'],
                    'format' => 'date',
                ],
                [
                    'encodeLabel' => false,
                    'value' => 'ln_due',
                    'label' => 'DUE',
                    'headerOptions' => ['style' => 'text-align:left'],
                    'format' => 'date',
                ],
               

            ],
        ]);?>
      </div>
      <!-- /.row -->
        <hr>
      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <p class="lead">Payment Methods:</p>
          <img src="../../dist/img/credit/visa.png" alt="Visa">
          <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
          <img src="../../dist/img/credit/american-express.png" alt="American Express">
          <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

          <!-- <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg
            dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
          </p> -->
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <!-- <p class="lead">Amount Due 2/22/2014</p> -->

          <!-- <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Subtotal:</th>
                <td>$250.30</td>
              </tr>
              <tr>
                <th>Tax (9.3%)</th>
                <td>$10.34</td>
              </tr>
              <tr>
                <th>Shipping:</th>
                <td>$5.80</td>
              </tr>
              <tr>
                <th>Total:</th>
                <td>$265.24</td>
              </tr>
            </table>
          </div> -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="invoice-print.html" target="_blank" class="btn btn-flat bg-gray"><i class="fa fa-print"></i> Print</a>
          <button type="button" class="btn btn-flat bg-olive pull-right"><i class="fa fa-mail-forward"></i> Share
          </button>
          <button type="button" class="btn btn-flat bg-aqua pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
        </div>
      </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
  <!-- /.content-wrapper -->