<?php
use backend\assets\AppAsset;
use odaialali\yii2toastr\ToastrFlash;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\helpers\Url;

AppAsset::register($this);

\yii\web\YiiAsset::register($this);

$time = time();
$date = "20" . date('y-m-d', $time);
?>

<?php $this->beginPage()?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <?php include_once 'notification.php';?>

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


  <?=Html::csrfMetaTags()?>
    <title><?=Html::encode($this->title)?></title>
    <?php $this->head()?>
    <link rel="shortcut icon" href="favicon.ico">
    <script>
    var myVar;
    function myFunction() {
        myVar = setTimeout(showPage, 1000);
    }

    function showPage() {
      document.getElementById("loader").style.display = "none";
      document.getElementById("myDiv").style.display = "block";
    }
    </script>
    <script>
    $(document).ready(function() {
                $(".file-tree").filetree();
                });
    </script>

    <style>
    .example-modal .modal {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
    }
    .example-modal .modal {
      background: transparent !important;
    }
  </style>
  <script src="js/jquery-3.3.1.min.js"></script>
 
</head>
<?php $this->beginBody()?>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo Yii::$app->homeUrl ?>" class="logo">
      <?php ['label' => 'Home', 'url' => ['/site/index']]?>
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><?php echo Yii::$app->name ?></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b><?php echo Yii::$app->name ?></b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->

      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        <?php
         if(Yii::$app->user->can('view-dashboard')){
          echo '<li class="pull-left">'. Html::a('<i class="fa fa-wrench"></i> Administrator', ['site/admin'], ['class' => 'text-white']) .'</a></li>';
          // echo '<li class="pull-left">'. Html::a('Administrator', ['user/create'], ['class' => 'fa fa-users']) .'</a></li>';
         }
         ?>
         <!-- Messages: style can be found in dropdown.less-->
          
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs text-yellow">User: <?=Yii::$app->user->identity->username?></span>
              <img src="<?=Yii::$app->user->identity->image_link?>" class="user-image pull-right margin" alt="User Image">
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?=Yii::$app->user->identity->image_link?>" class="img-circle" alt="User Image">

                <p>
                  <?=Yii::$app->user->identity->first_name . " - " . Yii::$app->user->identity->last_name?><br>
                  <p5>Created at :</p5>
                  <small><?=Yii::$app->user->identity->created_at?></small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">

                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <span class="btn btn-default btn-flat"><?=Html::a('Profile', ['user/view', 'id' => Yii::$app->user->identity->id], ['data' => ['method' => 'post']])?></span>
                  <!-- <a href="#" class="btn btn-default btn-flat">Profile</a> -->
                </div>
                <div class="pull-right">
                  <span class="btn btn-default btn-flat"><?=Html::a('Sign Out', ['site/logout'], ['data' => ['method' => 'post']])?></span>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
</header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
        <img src="<?= Yii::$app->user->identity->image_link ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
        <p><?= Yii::$app->user->identity->first_name." ".Yii::$app->user->identity->last_name ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>


      <!-- search form -->
     <!--  <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      < -->/form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <?php
         if(Yii::$app->user->can('view-dashboard')){
          echo '<li><a href="'. Url::toRoute('/site/index') .'"><i class="fa fa-th text-primary"></i> <span>Dashboard</span></a></li>';
         }
         ?>
        
    
        <li class="treeview">
            <a href="#">
                <i class="fa  fa-users text-primary"></i>
                <span>Customers</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>  
                </span>
            </a>
            <ul class="treeview-menu">
                <li><?= Html::a(' - View Customers', ['customers/index'],['class' => 'fa fa-users']) ?></li>
                <li><?= Html::a(' - View Customers Groups', ['groups/index'],['class' => 'fa  fa-user-plus']) ?></li>
                <?php
                if(Yii::$app->user->can('create-customer')){
                echo '<li>'. Html::a(' - New Customers', ['customers/create'],['class' => 'fa  fa-user-plus']) .'</li>';
                echo '<li>'. Html::a(' - New Customers Groups', ['groups/create'],['class' => 'fa  fa-user-plus']).'</li>';
                }
                ?>
            </ul>
        </li>
        <li class="treeview">
        <a href="#">
                <i class="fa  fa-credit-card  text-primary"></i>
                <span>Loans</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>  
                </span>
            </a>
            <ul class="treeview-menu">
            <?php
              if(Yii::$app->user->can('view-loans')){
              echo'
              <li>'. Html::a(' - All Loans', ['loans/index'],['class' => 'fa fa-credit-card']) .'</li>
              <li>'. Html::a(' - Approved Loans', ['loans/approved'],['class' => 'fa fa-credit-card']) .'</li>
              <li>'. Html::a(' - Pending Loans', ['loans/pending'],['class' => 'fa fa-credit-card']) .'</li>';
              }
              if(Yii::$app->user->can('view-appraisal-one')){
              echo
              '<li>'.  Html::a(' - Loans Appraisal Lv1', ['loans/onappraisal1'],['class' => 'fa fa-credit-card']) .'</li>';
              }
              if(Yii::$app->user->can('view-appraisal-two')){
                echo
                '<li>'.  Html::a(' - Loans Appraisal Lv2', ['loans/onappraisal2'],['class' => 'fa fa-credit-card']) .'</li>';
              }
              if(Yii::$app->user->can('view-loans')){
                echo
                '<li>'. Html::a(' - Denied Loans', ['loans/denied'],['class' => 'fa fa-credit-card']) .'</li>';
              }
              if(Yii::$app->user->can('view-loans')){
                echo
                '<li>'. Html::a(' - Past Maturity Date', ['loans/pastmaturity'],['class' => 'fa fa-credit-card']) .'</li>
                <li>'.  Html::a(' - 1 Month Late Loans', ['loans/onemonthlate'],['class' => 'fa fa-credit-card']) .'</li>
                <li>'.  Html::a(' - 3 Months Late Loan', ['loans/threemonthlate'],['class' => 'fa fa-credit-card']) .'</li>
                <li>'.  Html::a(' - Today Released Loans', ['loans/todayloans'],['class' => 'fa fa-credit-card']) .'</li>';
              }
              ?>
            </ul>
        </li>

        <li class="treeview">
            <a href="#">
                <i class="fa  fa-money text-primary"></i>
                <span>Repayments</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>  
                </span>
            </a>
            <ul class="treeview-menu">
                <li><?= Html::a(' - View Repayments', ['loanrepayments/index'],['class' => 'fa fa-money ']) ?></li>
            </ul>
        </li>
        
        <li class="treeview">
            <a href="#">
                <i class="fa  fa-bank  text-primary"></i>
                <span>Savings</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>  
                </span>
            </a>
            <ul class="treeview-menu">
                <li><?= Html::a(' - View Savings Accounts', ['savings/index'],['class' => 'fa fa-bank']) ?></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-cart-plus  text-primary"></i>
                <span>Withdrawals</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>  
                </span>
            </a>
            <ul class="treeview-menu">
                <li><?= Html::a(' - View Withdraws', ['wiithdrawals/index'],['class' => 'fa fa-cart-plus']) ?></li>
            </ul>
        </li>
        <li class="treeview ">
            <a href="#">
                <i class="fa  fa fa-mail-forward  text-primary"></i>
                <span>Expenses</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>  
                </span>
            </a>
            <ul class="treeview-menu">
                <li><?= Html::a(' - Add Expenses', ['expenses/create'],['class' => 'fa fa-search-plus']) ?></li>
                <li><?= Html::a(' - View Expenses', ['expenses/index'],['class' => 'fa fa-mail-forward']) ?></li>
            </ul>
        </li>
        
        
        
       
        <li class="header">REPORTS PANEL</li>

            <li class="treeview">
                <a href="#">
                    <i class="fa  fa-file-text text-primary"></i>
                    <span>Collection Sheets</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>  
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><?= Html::a(' - Daily Collection Sheet', ['loanschedule/rptcollection'],['class' => 'fa fa-file-text']) ?></li>
                    <li><?= Html::a(' - Past Maturity Date Loans', ['loanschedule/rptpastmaturity', 'from'=>date('Y-m-d')],['class' => 'fa  fa-file-text']) ?></li>
                    <li><?= Html::a(' - Send SMS', ['customer-groups/index'],['class' => 'fa fa-envelope-o']) ?></li>
                    </ul>
            </li>
            <?php
            if(Yii::$app->user->can('view-loans')){
            echo
            '<li class="treeview">
            <a href="#">
                    <i class="fa  fa-credit-card  text-primary"></i>
                    <span>Loans Related</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>  
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>'. Html::a(' - Loans Master', ['loans/reportsloanmaster'],['class' => 'fa fa-credit-card']) .'</li>
                    <li>'. Html::a(' - Approved Loans', ['loans/approved'],['class' => 'fa fa-credit-card']) .'</li>
                    <li>'. Html::a(' - Pending Loans', ['loans/pending'],['class' => 'fa fa-credit-card']) .'</li>
                    <li>'.  Html::a(' - On Appraisal Loans', ['loans/onappraisal'],['class' => 'fa fa-credit-card']) .'</li>
                    <li>'. Html::a(' - Denied Loans', ['loans/denied'],['class' => 'fa fa-credit-card']) .'</li>
                    <li>'. Html::a(' - Past Maturity Date', ['loans/pastmaturity'],['class' => 'fa fa-credit-card']) .'</li>
                    <li>'.  Html::a(' - 1 Month Late Loans', ['loans/onemonthlate'],['class' => 'fa fa-credit-card']) .'</li>
                    <li>'.  Html::a(' - 3 Months Late Loan', ['loans/threemonthlate'],['class' => 'fa fa-credit-card']) .'</li>
                    <li>'.  Html::a(' - Today Released Loans', ['loans/todayloans'],['class' => 'fa fa-credit-card']) .'</li>
                </ul>
            </li>
            <li>';
            }
            ?>
            <li class="treeview ">
                <a href="#">
                    <i class="fa  fa-area-chart text-primary"></i>
                    <span>Reports</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>  
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><?= Html::a(' - Loans Due', ['loans/reports'],['class' => 'fa fa-file']) ?></li>
                    <li><?= Html::a(' - Collection Report', ['loans/reports'],['class' => 'fa fa-file']) ?></li>
                    <li><?= Html::a(' - Cash Flow', ['customers/create'],['class' => 'fa  fa-file']) ?></li>
                    <li><?= Html::a(' - Profit / Loss', ['customer-groups/index'],['class' => 'fa  fa-file']) ?></li>
                    <li><?= Html::a(' - Portfolio at Risk (PAR)', ['customer-groups/create'],['class' => 'fa  fa-file']) ?></li>
                    <li><?= Html::a(' - All Entries', ['customer-groups/create'],['class' => 'fa  fa-file']) ?></li>
                
                </ul>
            </li>
        
            <li class="header">ADMINISTRATION PANEL</li>
            
            <li><a href="<?php echo Url::toRoute('loanproducts/index'); ?>"><i class="fa fa-circle-o text-primary"></i> <span>Loan Products</span></a></li>
            <li><a href="<?php echo Url::toRoute('user/index'); ?>"><i class="fa fa-circle-o text-primary"></i> <span>System User</span></a></li>
            <li><a href="<?php echo Url::toRoute('site/signup'); ?>"><i class="fa fa-plus text-primary"></i> <span>New User</span></a></li>
            <li><a href="<?php echo Url::toRoute('auth-item/create'); ?>"><i class="fa fa-plus text-primary"></i> <span>New Auth Item</span></a></li>


        <li class="header">ACTIONS</li> 
            <li><?= Html::a('<i class="fa fa-sign-out text-danger"></i>  Sign Out ', ['site/logout'],['data' => ['method' => 'post']]) ?></li>
            <li><a href="https://fusionsolutions.co.ke"><i class="fa fa-book text-primary"></i> <span>Documentation</span></a></li>
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <?= Breadcrumbs::widget([
      'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
  ]) ?>
  <?= ToastrFlash::widget([
        'options' => [
            "closeButton" => true,
            "debug" => false,
            "newestOnTop" => true,
            "progressBar" => false,
            "positionClass" => 'toast-top-right',
            "preventDuplicates" => false,
            "onclick" => null,
            "showDuration" => "1000",
            "hideDuration" => "1000",
            "timeOut" => "6000",
            "extendedTimeOut" => "1000",
            "showEasing" => "swing",
            "hideEasing" => "linear",
            "showMethod" => "fadeIn",
            "hideMethod" => "fadeOut"
        ]
    ]);?>
  <?= $content ?>

  <!-- /.content-wrapper -->

  <!-- =============================================== -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></strong>Fusion Sacco | All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- SlimScroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
</body>



 <!-- /.content-wrapper -->
 <?php $this->endBody() ?>
  <!-- /.modal -->
          <div class="modal modal-warning fade" id="modal-warning">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Warning Modal</h4>
                </div>
                <div class="modal-body">
                <p>Sorry, no sufficient right to access this action&hellip;</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-outline">Save changes</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->

  </html>
  <?php $this->endPage() ?>
