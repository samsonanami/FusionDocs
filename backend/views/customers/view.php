<?php

use yii\helpers\Html;

$this->title = $model->UNIQUE_NO;

\yii\web\YiiAsset::register($this);

?>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box box-default box-solid">
        <div class="box-header with-border box-profile">
          User View
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body ">
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
                <p class="text-muted text-center"><?=$model->cust_account_type ?></p>
                <?=  Html::a(' Generate PDF', ['customers/report','id' => $model['ACCOUNT_NO']],['class' => 'fa fa-download btn btn-lg btn-block margin btn-flat bg-info']);?>                   
                <button class="btn btn-flat btn-md bg-success pull-left margin btn-block bg-info" onclick="window.print()"> <i class="fa fa-camera"></i> Snapshot</button>
               </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            </div>
            <div class="col-md-3">
            <!-- Profile Image -->
            <div class="">
                <div class="">
                <ul class="list-group">
                    <li class="list-group-item">
                       <a class="pull-right"><?=$model->UNIQUE_NO?></a>Account Number    
                    </li>
                    <li class="list-group-item">
                       <a class="pull-right"><?=$model->TITLE . ' ' . $model->FIRST_NAME . ' - ' . $model->LAST_NAME?></a>Full Name
                    </li>
                    <li class="list-group-item">
                        National ID # <a class="pull-right"><?=$model->cust_id_no?></a>
                    </li>
                    <li class="list-group-item">
                        Email Address <a class="pull-right"><?=$model->EMAIL?></a>
                    </li>
                    <li class="list-group-item">
                        Phone Number<a class="pull-right"><?=$model->MOBILE?></a>
                    </li>
                    <li class="list-group-item">
                        User System ID<a class="pull-right"><?=$model->ACCOUNT_NO?></a>
                    </li>
                    <li class="list-group-item">
                      Gender<a class="pull-right"><?=$model->GENDER?></a>
                    </li>
                    <li class="list-group-item">
                      Account Type<a class="pull-right"><?=$model->cust_account_type  ?></a>
                    </li>
                     <li class="list-group-item">
                        Address/location<a class="pull-right"><?=$model->ADDRESS ?></a>
                    </li>
                    <li class="list-group-item">
                       Working Status<a class="pull-right"><?=$model->WORKING_STATUS ?></a>
                    </li>
                    <li class="list-group-item">
                        Business Name<a class="pull-right"><?=$model->BUSINESS_NAME ?></a>
                    </li>
                    <li class="list-group-item">
                        Description<a class="pull-right"><?=$model->DESCRIPTION ?></a>
                    </li>
                    <li class="list-group-item">
                 		 Zip Code	<a class="pull-right"><?=$model->ZIPCODE ?></a>
                    </li>
                    <li class="list-group-item">
                        Date of Birth<a class="pull-right"><?=$model->DOB ?></a>
                    </li>
                    <li class="list-group-item">
                        KRA Pin<a class="pull-right"><?=$model->cust_kra_pin ?></a>
                    </li>
                    <li class="list-group-item">
                       County<a class="pull-right"><?=$model->PROVINCE_STATE ?></a></b>
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
                        <b><a class="pull-right"><?=$model->ADDRESS ?></a></b>Address/location
                    </li>
                    <li class="list-group-item">
                        <b><a class="pull-right"><?=$model->WORKING_STATUS ?></a></b>Working Status
                    </li>
                    <li class="list-group-item">
                        <b><a class="pull-right"><?=$model->BUSINESS_NAME ?></a></b>Business Name
                    </li>
                    <li class="list-group-item">
                        <b><a class="pull-right"><?=$model->DESCRIPTION ?></a></b>Description
                    </li>
                    <li class="list-group-item">
                        <b><a class="pull-right"><?=$model->ZIPCODE ?></a></b>Zip Code
                    </li>
                    <li class="list-group-item">
                        <b><a class="pull-right"><?=$model->DOB ?></a></b>Date of Birth
                    </li>
                    <li class="list-group-item">
                        <b><a class="pull-right"><?=$model->cust_kra_pin ?></a></b>KRA Pin
                    </li>
                    <li class="list-group-item">
                        <b><a class="pull-right"><?=$model->PROVINCE_STATE ?></a></b>County
                    </li>
                </ul>
                </div>
                <!-- /.box-body -->
            </div>
<!-- /.box-body -->
</div>
<div class="col-md-2">
<div class="text-right margin"> 
                <p>
                  <?=Html::a('<i class="fa fa-pencil"> </i> Update', ['update', 'id' => $model->ACCOUNT_NO], ['class' => 'btn btn-flat btn-primary'])?>
                  <?=Html::a('<i class="fa fa-trash"></i> Delete', ['delete', 'id' => $model->ACCOUNT_NO], [
                  'class' => 'btn btn-flat btn-danger',
                  'data' => [
                      'confirm' => 'Are you sure you want to delete this item?',
                      'method' => 'post',
                      ],
                  ])?>
              </p>
              <?= Html::a('<i class="fa fa-eye"></i> View Loans', ['customers/viewloans','id' => $model['ACCOUNT_NO']],['class' => 'btn btn-lg btn-block margin btn-flat bg-aqua']); ?>
                <?=  Html::a('<i class="fa fa-eye "></i> View Savings', ['customers/viewsavings','id' => $model['ACCOUNT_NO']],['class' => 'btn btn-lg btn-block margin btn-flat bg-aqua']);?>
                <?=  Html::a('<i class="fa fa-plus "></i> Add Loan', ['loans/create','id' => $model['ACCOUNT_NO']],['class' => 'btn btn-lg btn-block margin btn-flat bg-aqua']);?>                   
                <?=  Html::a('<i class="fa fa-plus "></i> Add Shares', ['savings/create','id' => $model['ACCOUNT_NO']],['class' => ' btn btn-lg btn-block margin btn-flat bg-aqua']);?>                   
                <?=  Html::a('<i class="fa fa-plus "></i> Add Repayment', ['loanrepayments/create','id' => $model['ACCOUNT_NO']],['class' => 'btn btn-lg btn-block margin btn-flat bg-aqua']);?>                   
                <?=  Html::a('<i class="fa fa-money"></i> Withdraw Cash', ['wiithdrawals/create','id' => $model['ACCOUNT_NO']],['class' => ' btn btn-lg btn-block margin btn-flat bg-aqua']);?>                   
               
<div class="box-footer">

  <!-- footer area -->
</div>
<!-- /.box-footer-->

</section>
<!-- /.content -->
</div>