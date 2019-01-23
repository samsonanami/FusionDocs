<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Customers */
$this->title = $model->FIRST_NAME . '-' . $model->LAST_NAME;
?>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <p> User View </p>
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
             
            <br>

             <div class="row">
            <div class="col-md-2">
            <!-- Profile Image -->
            <div class="">
                <div class="">
                  <div class="thumbnail">
                   <img src="<?=$model->logo?>" alt="User profile picture">
                  </div>

                <h3 class="profile-username text-center"><?=$model->FIRST_NAME . ' - ' . $model->LAST_NAME?></h3>
                <p class="text-muted text-center">Customer</p>

                <?= Html::a(' View Loans', ['customers/viewloans','id' => $model['ACCOUNT_NO']],['class' => 'fa fa-money btn btn-lg btn-block margin btn-flat bg-olive']); ?>
                <?=  Html::a(' View Savings', ['customers/viewsavings','id' => $model['ACCOUNT_NO']],['class' => 'fa fa-money btn btn-lg btn-block margin btn-flat bg-purple']);?>
                <?=  Html::a(' Generate PDF', ['customers/gen-pdf','id' => $model['ACCOUNT_NO']],['class' => 'fa fa-money btn btn-lg btn-block margin btn-flat bg-purple']);?>                   
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            </div>
            <div class="col-md-4">
            <!-- Profile Image -->
            <div class="">
                <div class="">
                <ul class="list-group">
                    <li class="list-group-item">
                    <b>Full Name</b> <a class="pull-right"><?=$model->TITLE . ' ' . $model->FIRST_NAME . ' - ' . $model->LAST_NAME?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Email</b> <a class="pull-right"><?=$model->EMAIL?></a>
                    </li>
                    <li class="list-group-item">
                    <b> <a class="pull-right"><?=$model->MOBILE?></a></b>Phone Number
                    </li>
                    <li class="list-group-item">
                    <b>Account number</b> <a class="pull-right"><?=$model->ACCOUNT_NO?></a>
                    </li>
                    <li class="list-group-item">
                    <b>Gender</b> <a class="pull-right"><?=$model->GENDER?></a>
                    </li>
                    <li class="list-group-item">
                    <b>Country of Origin</b> <a class="pull-right"><?=$model->COUNTRY?></a>
                    </li>
                    
                </ul>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            </div>
            <div class="col-md-4">
            <!-- Profile Image -->
            <div class="">
                <div class=" ">
                <ul class="list-group">
                    <li class="list-group-item">
                    <b>Address/location</b> <a class="pull-right"><?=$model->ADDRESS?></a>
                    </li>
                    <li class="list-group-item">
                    <b>Working Status</b> <a class="pull-right"><?=$model->WORKING_STATUS?></a>
                    </li>
                    <li class="list-group-item">
                    <b>Business Name</b> <a class="pull-right"><?=$model->BUSINESS_NAME?></a>
                    </li>
                    <li class="list-group-item">
                    <b>Description</b> <a class="pull-right"><?=$model->DESCRIPTION?></a>
                    </li>
                    <li class="list-group-item">
                    <b>Zip Code</b> <a class="pull-right"><?=$model->ZIPCODE?></a>
                    </li>
                    <li class="list-group-item">
                    <b>Date of Birth</b> <a class="pull-right"><?=$model->DOB?></a>
                    </li>
                    <li class="list-group-item">
                    <b>KRA Pin</b> <a class="pull-right"><?=$model->cust_kra_pin?></a>
                    </li>
                </ul>
                </div>
                <!-- /.box-body -->
            </div>
<!-- /.box-body -->
</div>
<div class="col-md-2">
<div class=""> 
                <p>
                  <?=Html::a('Update', ['update', 'id' => $model->ACCOUNT_NO], ['class' => 'btn btn-primary'])?>
                  <?=Html::a('Delete', ['delete', 'id' => $model->ACCOUNT_NO], [
                  'class' => 'btn btn-danger',
                  'data' => [
                      'confirm' => 'Are you sure you want to delete this item?',
                      'method' => 'post',
                      ],
                  ])?>
              </p>
<div class="box-footer">

  <!-- footer area -->
</div>
<!-- /.box-footer-->

</section>
<!-- /.content -->


