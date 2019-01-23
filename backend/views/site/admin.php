 <?php

use yii\helpers\Html;
use backend\models\Customers;
use backend\models\Loans;
use backend\models\Savings;
use backend\assets\HighChartsAsset;
HighChartsAsset::register($this);

/* @var $this yii\web\View */

$this->title = 'FusionSacco :: Home';
// getting summaries
$time = time();
$date = "20" . date('y-m-d', $time);

$customer = customers::find()->count();
$applied_loans = loans::find()->andWhere("ln_status=3")->count();
$approved_loans = loans::find()->andWhere("ln_application_status=3")->count();
$paid_loans = loans::find()->andWhere("ln_status=2")->count();
$denied_loans = loans::find()->andWhere("ln_application_status=4")->count();

$customersM = customers::find()->andWhere("GENDER = 'Male'")->count();
$customersF = customers::find()->andWhere("GENDER = 'Female'")->count();
$savings = savings::find()->sum('svg_bal');
$loans = loans::find()->sum("ln_principal");
?>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Admin Dashboard
        <small>Version 2.4.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"></li><?php echo date('Y-m-d H:i:s'); ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">


      <!-- Info boxes -->
      <div class="box box-default box-solid">
        <div class="box-body with-border box-profile">
          <div class="row"> 
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box wk-progress membr custom" style="cursor:pointer;">
                <span class="info-box-icon bg-default"><i class="fa fa-user"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text"> Users:</span>
                </div>
                <!-- /.info-box-content -->
                <div class="pull-right">
                  <?= Html::a(' List', ['user/index'],['class' => 'btn btn-flat bg-success fa fa-list-ul margin']) ?>
                  <?= Html::a(' New', ['user/create'],['class' => 'btn btn-flat bg-success fa fa-plus margin']) ?>
                </div>
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box wk-progress membr custom">
                <span class="info-box-icon bg-default"><i class="fa fa-bank"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text"> Loan Products:</span>
                </div>
                <!-- /.info-box-content -->
                <div class="pull-right">
                  <?= Html::a(' List', ['loanproducts/index'],['class' => 'btn btn-flat bg-success fa fa-list-ul margin']) ?>
                  <?= Html::a(' New', ['loanproducts/create'],['class' => 'btn btn-flat bg-success fa fa-plus margin']) ?>
                </div>
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box wk-progress membr custom">
                <span class="info-box-icon bg-default"><i class="fa fa-user-plus"></i></span>

               <div class="info-box-content">
                  <span class="info-box-text"> Permissions:</span>
                </div>
                <!-- /.info-box-content -->
                <div class="pull-right">
                  <?= Html::a(' List', ['auth-item/index'],['class' => 'btn btn-flat bg-success fa fa-list-ul margin']) ?>
                  <?= Html::a(' New', ['auth-item/create'],['class' => 'btn btn-flat bg-success fa fa-plus margin']) ?>
                </div>
              </div>
              <!-- /.info-box -->
            </div>
            
          </div>
         
        <!-- row 2 -->
       
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->


