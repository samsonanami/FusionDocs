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

$user = customers::find()->count();
$applied_loans = loans::find()->andWhere("ln_status!=5")->count();
// $applied_loans = loans::find()->andWhere("ln_status=3")->count();
$approved_loans = loans::find()->andWhere("ln_application_status=4")->count();
$onappraisal_loans = loans::find()->andWhere("ln_application_status=2 or ln_application_status=3")->count();
$paid_loans = loans::find()->andWhere("ln_status=2")->count();
$denied_loans = loans::find()->andWhere("ln_application_status=5")->count();

$customers = customers::find()->count();
$customersM = customers::find()->andWhere("GENDER = 'Male'")->count();
$customersF = customers::find()->andWhere("GENDER = 'Female'")->count();
$savings = savings::find()->sum('svg_bal');
$loans = loans::find()->sum("ln_principal");

$Members = customers::find()->andWhere("cust_account_type  = 'Member'")->count();
$Groups = customers::find()->andWhere("cust_account_type  = 'Group'")->count();
$Shareholders = customers::find()->andWhere("cust_account_type  = 'Shareholder'")->count();

?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
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
            <!-- small box -->
            <div class="small-box bg-aqua membr custom" style="cursor:pointer;">
              <div class="inner">
                <h3><?=$user?></h3>
                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <?= Html::a('More info <i class="fa fa-arrow-circle-right"></i>', ['customers/index'],['class' => 'small-box-footer']) ?>
            </div>
          </div>  
          <!-- ./col -->

            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box wk-progress membr custom">
                <span class="info-box-icon bg-aqua"><i class="fa fa-bank"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Savings</span>
                  <span class="info-box-number"><small></small><?=$savings?></span>
                  <!-- <span class="info-box-number"><small></small><?php $savings?></span> -->
                </div>
                <!-- /.info-box-content -->
                 <div class="pull-right">
                  <?= Html::a(' More', ['savings/index'],['class' => 'btn fa fa-list-ul']) ?>
                </div>
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box wk-progress membr custom">
                <span class="info-box-icon bg-aqua"><i class="fa fa-money"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Released loans</span>
                  <span class="info-box-number"><small></small><?=$loans?></i></span>
                </div>
                <!-- /.info-box-content -->
                 <div class="pull-right">
                  <?= Html::a(' More', ['loans/index'],['class' => 'btn fa fa-list-ul']) ?>
                </div>
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box wk-progress membr custom">
                <span class="info-box-icon bg-aqua"><i class="fa fa-cart-plus"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text"> Collections</span>
                  <span class="info-box-number"><?=$loans?></i></span>
                </div>
                <!-- <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-warning">
                    Launch Warning Modal
                  </button> -->
                <!-- /.info-box-content -->
                 <div class="pull-right">
                  <?= Html::a(' More', ['loanrepayments/index'],['class' => 'btn fa fa-list-ul']) ?>
                </div>
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
          <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box wk-progress membr custom bg-aqua" style="cursor:pointer;">
              <!-- <div class="info-box bg-aqua"> -->
                <span class="info-box-icon"><i class="fa fa-bookmark-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">applied loans</span>
                  <span class="info-box-number"><?=$applied_loans?></span>

                  <div class="progress">
                    <div class="progress-bar" style="width: <?=$applied_loans/1000*100?>%"></div>
                  </div>
                      <span class="progress-description">
                      <?=$applied_loans/1000*100?>% Increase in 30 Days
                      </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>

             <div class="col-md-3 col-sm-6 col-xs-12">

            <div class="info-box wk-progress membr custom bg-yellow" style="cursor:pointer;">
                <!-- <div class="info-box bg-yellow"> -->
                  <span class="info-box-icon"><i class="fa fa-calendar"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">On appraisal</span>
                    <span class="info-box-number"><?= round($onappraisal_loans) ?></span>

                    <div class="progress">
                      <div class="progress-bar" style="width: <?=round($onappraisal_loans/$applied_loans*100) ?>%"></div>
                    </div>
                        <span class="progress-description">
                        <?=$onappraisal_loans/$applied_loans*100?>% Increase in 30 Days
                        </span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box wk-progress membr custom bg-olive" style="cursor:pointer;">
                  <span class="info-box-icon"><i class="fa fa-thumbs-o-up"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">approved loans</span>
                    <span class="info-box-number"><?=$approved_loans?></span>

                    <div class="progress">
                      <div class="progress-bar" style="width: <?=$approved_loans/$applied_loans*100?>%"></div>
                    </div>
                        <span class="progress-description">
                        <?=$approved_loans/$applied_loans*100?>% Increase in 30 Days
                        </span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box wk-progress membr custom bg-aqua" style="cursor:pointer;">
                <!-- <div class="info-box bg-yellow"> -->
                  <span class="info-box-icon"><i class="fa fa-envelope-o"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">fully paid loans</span>
                    <span class="info-box-number"><?=$onappraisal_loans?></span>

                    <div class="progress">
                      <div class="progress-bar" style="width: <?=$paid_loans/$applied_loans*100?>%"></div>
                    </div>
                        <span class="progress-description">
                        <?=$paid_loans/$applied_loans*100?>% Increase in 30 Days
                        </span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

             
          </div>
        <!-- row 2 -->
        <div class="row">
            <div class="col-md-8">
              <!-- AREA CHART -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title text-danger">Released & Completed Loans - Monthly, Year <?=date('Y');?></h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="chart">
                    <canvas id="areaChart" style="height:250px"></canvas>
                  </div>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->

              <!-- LINE CHART -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title text-primary">Members Registration - Monthly, Year <?=date('Y');?></h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="chart">
                    <canvas id="lineChart" style="height:250px"></canvas>
                  </div>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->

              <!-- BAR CHART -->
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Members Registration - Monthly, <?= date('Y')?></h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="chart">
                    <canvas id="barChart" style="height:230px"></canvas>
                  </div>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            
            </div>
            <!-- /.col (LEFT) -->
            <div class="col-md-4">
              <!-- DONUT CHART -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Active Customers</h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-8">
                      <div class="chart-responsive">
                        <canvas id="pieChart" height="150"></canvas>
                      </div>
                      <!-- ./chart-responsive -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                      <ul class="chart-legend clearfix">
                        <li><i class="fa fa-circle-o text-aqua"></i> Male</li>
                        <li><i class="fa fa-circle-o text-yellow"></i> Female</li>
                      </ul>
                    </div>
                    <!-- /.col -->
                  </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer no-padding">
                  <ul class="nav nav-pills nav-stacked">
                    <li><a href="#">Male by percentage
                      <span class="pull-right text-aqua"><i class="fa fa-angle-up"></i> <?= round($customersM/$customers*100) ?>%</span></a></li>
                    <li><a href="#">Female by percentage <span class="pull-right text-yellow"><i class="fa fa-angle-down"></i>  <?= round($customersF/$customers*100) ?>%</span></a>
                    </li>
                  </ul>
                </div>
                <!-- /.footer -->
              </div>
              <!-- /.box -->

              <!-- Account types area -->
              <!-- DONUT CHART -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Account Types</h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-8">
                      <div class="chart-responsive">
                        <canvas id="pieChart2" height="150"></canvas>
                      </div>
                      <!-- ./chart-responsive -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                      <ul class="chart-legend clearfix">
                        <li><i class="fa fa-circle-o text-aqua"></i> Members</li>
                        <li><i class="fa fa-circle-o text-olive"></i> Groups</li>
                        <li><i class="fa fa-circle-o text-yellow"></i> Shareholders</li>
                      </ul>
                    </div>
                    <!-- /.col -->
                  </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer no-padding">
                  <ul class="nav nav-pills nav-stacked">
                    <li><a href="#">Members <span class="pull-right text-aqua"><i class="fa fa-angle-up"></i> <?= $Members ?></span></a></li>
                    <li><a href="#">Groups <span class="pull-right text-olive"><i class="fa fa-angle-up"></i>  <?= $Groups ?></span></a>
                    <li><a href="#">Shareholders <span class="pull-right text-yellow"><i class="fa fa-angle-up"></i>  <?= $Shareholders ?></span></a>
                    </li>
                  </ul>
                </div>
                <!-- /.footer -->
              </div>
              <!-- /.box -->


              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?= $denied_loans ?></h3>
                  <p>Default/Rejected Loans</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <?= Html::a('More info <i class="fa fa-arrow-circle-right"></i>', ['loans/denied'],['class' => 'small-box-footer']) ?>
        
              </div>

              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h4>Average Tenure</h4>
                  <h3>53<sup style="font-size: 20px">days</sup></h3>

                  <p>Average number of days for loans to be fully paid</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">
                  More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>

            </div>
            <!-- /.col (RIGHT) -->

          </div>
          <!-- /.row 3 -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->




<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
    // This will get the first returned node in the jQuery collection.
    var areaChart       = new Chart(areaChartCanvas)

<?php

$user = customers::find()->count();
$open_loans1 = loans::find()->andWhere("ln_status=1 AND ln_released LIKE '%".date('Y')."-01-%'")->count();
$open_loans2 = loans::find()->andWhere("ln_status=1 AND ln_released LIKE '%".date('Y')."-02-%'")->count();
$open_loans3 = loans::find()->andWhere("ln_status=1 AND ln_released LIKE '%".date('Y')."-03-%'")->count();
$open_loans4 = loans::find()->andWhere("ln_status=1 AND ln_released LIKE '%".date('Y')."-04-%'")->count();
$open_loans5 = loans::find()->andWhere("ln_status=1 AND ln_released LIKE '%".date('Y')."-05-%'")->count();
$open_loans6 = loans::find()->andWhere("ln_status=1 AND ln_released LIKE '%".date('Y')."-06-%'")->count();
$open_loans7 = loans::find()->andWhere("ln_status=1 AND ln_released LIKE '%".date('Y')."-07-%'")->count();
$open_loans8 = loans::find()->andWhere("ln_status=1 AND ln_released LIKE '%".date('Y')."-08-%'")->count();
$open_loans9 = loans::find()->andWhere("ln_status=1 AND ln_released LIKE '%".date('Y')."-09-%'")->count();
$open_loans10 = loans::find()->andWhere("ln_status=1 AND ln_released LIKE '%".date('Y')."-10-%'")->count();
$open_loans11 = loans::find()->andWhere("ln_status=1 AND ln_released LIKE '%".date('Y')."-11-%'")->count();
$open_loans12 = loans::find()->andWhere("ln_status=1 AND ln_released LIKE '%".date('Y')."-12-%'")->count();

$closed_loans1 = loans::find()->andWhere("ln_status=1 AND ln_due LIKE '%".date('Y')."-01-%'")->count();
$closed_loans2 = loans::find()->andWhere("ln_status=1 AND ln_due LIKE '%".date('Y')."-02-%'")->count();
$closed_loans3 = loans::find()->andWhere("ln_status=1 AND ln_due LIKE '%".date('Y')."-03-%'")->count();
$closed_loans4 = loans::find()->andWhere("ln_status=1 AND ln_due LIKE '%".date('Y')."-04-%'")->count();
$closed_loans5 = loans::find()->andWhere("ln_status=1 AND ln_due LIKE '%".date('Y')."-05-%'")->count();
$closed_loans6 = loans::find()->andWhere("ln_status=1 AND ln_due LIKE '%".date('Y')."-06-%'")->count();
$closed_loans7 = loans::find()->andWhere("ln_status=1 AND ln_due LIKE '%".date('Y')."-07-%'")->count();
$closed_loans8 = loans::find()->andWhere("ln_status=1 AND ln_due LIKE '%".date('Y')."-08-%'")->count();
$closed_loans9 = loans::find()->andWhere("ln_status=1 AND ln_due LIKE '%".date('Y')."-09-%'")->count();
$closed_loans10 = loans::find()->andWhere("ln_status=1 AND ln_due LIKE '%".date('Y')."-10-%'")->count();
$closed_loans11 = loans::find()->andWhere("ln_status=1 AND ln_due LIKE '%".date('Y')."-11-%'")->count();
$closed_loans12 = loans::find()->andWhere("ln_status=1 AND ln_due LIKE '%".date('Y')."-12-%'")->count();

?>
    var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July','August','September','October', 'November','December'],

      // OPEN LOANS DATA
      datasets: [
        {
          label               : 'Open Loans',
          fillColor           : 'rgba(210, 214, 222, 1)',
          strokeColor         : 'rgba(210, 214, 222, 1)',
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [<?=$open_loans1?>,<?=$open_loans2?>,<?=$open_loans3?>,<?=$open_loans4?>,<?=$open_loans5?>,<?=$open_loans6?>,<?=$open_loans7?>,<?=$open_loans8?>,<?=$open_loans9?>,<?=$open_loans10?>,<?=$open_loans11?>,<?=$open_loans12?>],
        },
        {
          label               : 'Closed Loans',
          fillColor           : 'rgba(60,141,188,0.9)',
          strokeColor         : 'rgba(60,141,188,0.8)',
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?=$closed_loans1?>,<?=$closed_loans2?>,<?=$closed_loans3?>,<?=$closed_loans4?>,<?=$closed_loans5?>,<?=$closed_loans6?>,<?=$closed_loans7?>,<?=$closed_loans8?>,<?=$closed_loans9?>,<?=$closed_loans10?>,<?=$closed_loans11?>,<?=$closed_loans12?>],
        }
      ]
    }


// SECOND CHART DATA
<?php

$user = customers::find()->count();
$open_cust1 = customers::find()->andWhere(" cust_created_at  LIKE '%".date('Y')."-01-%'")->count();
$open_cust2 = customers::find()->andWhere(" cust_created_at  LIKE '%".date('Y')."-02-%'")->count();
$open_cust3 = customers::find()->andWhere(" cust_created_at  LIKE '%".date('Y')."-03-%'")->count();
$open_cust4 = customers::find()->andWhere(" cust_created_at  LIKE '%".date('Y')."-04-%'")->count();
$open_cust5 = customers::find()->andWhere(" cust_created_at  LIKE '%".date('Y')."-05-%'")->count();
$open_cust6 = customers::find()->andWhere(" cust_created_at  LIKE '%".date('Y')."-06-%'")->count();
$open_cust7 = customers::find()->andWhere(" cust_created_at  LIKE '%".date('Y')."-07-%'")->count();
$open_cust8 = customers::find()->andWhere(" cust_created_at  LIKE '%".date('Y')."-08-%'")->count();
$open_cust9 = customers::find()->andWhere(" cust_created_at  LIKE '%".date('Y')."-09-%'")->count();
$open_cust10 = customers::find()->andWhere(" cust_created_at  LIKE '%".date('Y')."-10-%'")->count();
$open_cust11 = customers::find()->andWhere(" cust_created_at  LIKE '%".date('Y')."-11-%'")->count();
$open_cust12 = customers::find()->andWhere(" cust_created_at  LIKE '%".date('Y')."-12-%'")->count();

$closed_custF1 = customers::find()->andWhere("GENDER ='Female' AND cust_created_at LIKE '%".date('Y')."-01-%'")->count();
$closed_custF2 = customers::find()->andWhere("GENDER ='Female' AND cust_created_at  LIKE '%".date('Y')."-02-%'")->count();
$closed_custF3 = customers::find()->andWhere("GENDER ='Female' AND cust_created_at  LIKE '%".date('Y')."-03-%'")->count();
$closed_custF4 = customers::find()->andWhere("GENDER ='Female' AND cust_created_at  LIKE '%".date('Y')."-04-%'")->count();
$closed_custF5 = customers::find()->andWhere("GENDER ='Female' AND cust_created_at  LIKE '%".date('Y')."-05-%'")->count();
$closed_custF6 = customers::find()->andWhere("GENDER ='Female' AND cust_created_at  LIKE '%".date('Y')."-06-%'")->count();
$closed_custF7 = customers::find()->andWhere("GENDER ='Female' AND cust_created_at  LIKE '%".date('Y')."-07-%'")->count();
$closed_custF8 = customers::find()->andWhere("GENDER ='Female' AND cust_created_at  LIKE '%".date('Y')."-08-%'")->count();
$closed_custF9 = customers::find()->andWhere("GENDER ='Female' AND cust_created_at  LIKE '%".date('Y')."-09-%'")->count();
$closed_custF10 = customers::find()->andWhere("GENDER ='Female' AND cust_created_at LIKE '%".date('Y')."-10-%'")->count();
$closed_custF11 = customers::find()->andWhere("GENDER ='Female' AND cust_created_at  LIKE '%".date('Y')."-11-%'")->count();
$closed_custF12 = customers::find()->andWhere("GENDER ='Female' AND cust_created_at  LIKE '%".date('Y')."-12-%'")->count();

?>
    var areaChartData2 = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July','August','September','October', 'November','December'],

      // OPEN LOANS DATA
      datasets: [
        {
          label               : 'All Members',
          fillColor           : '#3c8dbc',
          strokeColor         : '#3c8dbc',
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [<?=$open_cust1?>,<?=$open_cust2?>,<?=$open_cust3?>,<?=$open_cust4?>,<?=$open_cust5?>,<?=$open_cust6?>,<?=$open_cust7?>,<?=$open_cust8?>,<?=$open_cust9?>,<?=$open_cust10?>,<?=$open_cust11?>,<?=$open_cust12?>],
        },
        {
          label               : 'Male Members',
          fillColor           : '#00a65a',
          strokeColor         : '#00a65a',
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?=$open_cust1-$closed_custF1?>,<?=$open_cust2-$closed_custF2?>,<?=$open_cust3-$closed_custF3?>,<?=$open_cust4-$closed_custF4?>,<?=$open_cust5-$closed_custF5?>,<?=$open_cust6-$closed_custF6?>,<?=$open_cust7-$closed_custF7?>,<?=$open_cust8-$closed_loans8?>,<?=$open_cust9-$closed_custF9?>,<?=$open_cust10-$closed_custF10?>,<?=$open_cust11-$closed_custF11?>,<?=$open_cust12-$closed_custF12?>],
        },
        {
          label               : 'Female Members',
          fillColor           : '#f39c12',
          strokeColor         : '#f39c12',
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?=$closed_custF1?>,<?=$closed_custF2?>,<?=$closed_custF3?>,<?=$closed_custF4?>,<?=$closed_custF5?>,<?=$closed_custF6?>,<?=$closed_custF7?>,<?=$closed_loans8?>,<?=$closed_custF9?>,<?=$closed_custF10?>,<?=$closed_custF11?>,<?=$closed_custF12?>],
        }
        
      ]
    }


    var areaChartOptions = {
      //Boolean - If we should show the scale at all
      showScale               : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - Whether the line is curved between points
      bezierCurve             : true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension      : 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot                : false,
      //Number - Radius of each point dot in pixels
      pointDotRadius          : 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth     : 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius : 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke           : true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth      : 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill             : true,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio     : true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive              : true
    }

    //Create the line chart
    areaChart.Line(areaChartData, areaChartOptions)

    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas          = $('#lineChart').get(0).getContext('2d')
    var lineChart                = new Chart(lineChartCanvas)
    var lineChartOptions         = areaChartOptions
    lineChartOptions.datasetFill = false
    lineChart.Line(areaChartData, lineChartOptions)

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieChart       = new Chart(pieChartCanvas)
    var PieData        = [
     {
        value    : <?=$customersM?>,
        color    : '#00c0ef',
        highlight: '#00c0ef',
        label    : 'Male'
      },
      {
        value    : <?=$customersF?>,
        color    : '#f39c12',
        highlight: '#3c8dbc',
        label    : 'Female'
      },
    ]


    //-------------
    //- PIE CHART 2 -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart2').get(0).getContext('2d')
    var pieChart2       = new Chart(pieChartCanvas)
    var PieData2        = [
     {
        value    : <?=$Members?>,
        color    : '#00c0ef',
        highlight: '#00c0ef',
        label    : 'Members'
      },
      {
        value    : <?=$Groups?>,
        color    : '#00a65a',
        highlight: '#00a65a',
        label    : 'Groups'
      },
      {
        value    : <?=$Shareholders?>,
        color    : '#f39c12',
        highlight: '#3c8dbc',
        label    : 'Shareholders'
      },
    ]


    var pieOptions     = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke    : true,
      //String - The colour of each segment stroke
      segmentStrokeColor   : '#fff',
      //Number - The width of each segment stroke
      segmentStrokeWidth   : 1,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps       : 100,
      //String - Animation easing effect
      animationEasing      : 'easeOutBounce',
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate        : true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale         : true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive           : true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio  : true,
      //String - A legend template
      legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions)
    pieChart2.Doughnut(PieData2, pieOptions)

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
    var barChart                         = new Chart(barChartCanvas)
    var barChartData                     = areaChartData2
    barChartData.datasets[1].fillColor   = '#00a65a'
    barChartData.datasets[1].strokeColor = '#00a65a'
    barChartData.datasets[1].pointColor  = '#00a65a'
    var barChartOptions                  = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    }

    barChartOptions.datasetFill = false
    barChart.Bar(barChartData, barChartOptions)
  })
</script>
