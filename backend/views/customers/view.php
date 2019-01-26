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
      <div class="margin">
      <?=  Html::a('<i class="fa fa-download">&nbsp;</i> Generate PDF', ['customers/report','id' => $model['ACCOUNT_NO']],['class' => 'btn btn-flat btn-primary']);?>&nbsp                  
<button class="btn btn-flat btn-primary" onclick="window.print()"> <i class="fa fa-camera"></i> Snapshot</button> &nbsp

      <?=Html::a('<i class="fa fa-pencil"> </i> Update', ['update', 'id' => $model->ACCOUNT_NO], ['class' => 'btn btn-flat btn-primary'])?>
                  <?=Html::a('<i class="fa fa-trash"></i> Delete', ['delete', 'id' => $model->ACCOUNT_NO], [
                  'class' => 'btn btn-flat btn-danger',
                  'data' => [
                      'confirm' => 'Are you sure you want to delete this item?',
                      'method' => 'post',
                      ],
                  ])?>
                  </div>
      <div class="box box-default box-solid">
        <div class="box-header with-border box-profile">
          User Profile
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
                <h4 class="profile-username text-center"><?=$model->FIRST_NAME . ' - ' . $model->LAST_NAME?></h4>
                <p class="text-muted text-center"></p>
                
                <div class="thumbnail">
                   <img src="<?=$model->logo?>" alt="User profile picture">
                  </div>
                <!-- /.box-body -->
            <!-- /.box -->
            </div>
            <div class="col-md-5">
            <!-- Profile Image -->
            <div class="">
                <div class="">
                <ul class="list-group">
                    <li class="list-group-item">
                    Account Number<a class="pull-right"><?=$model->UNIQUE_NO?></a>
                    </li>
                    <li class="list-group-item">
                    Account Name<a class="pull-right"><?=$model->ln_account_name?></a>
                    </li>
                    <li class="list-group-item">
                    Account Type<a class="pull-right"><?=$model->cust_account_type ?></a>
                    </li>
                    <li class="list-group-item">
                    National ID # <a class="pull-right"><?=$model->cust_id_no?></a>
                    </li>
                    <li class="list-group-item">
                        Phone Number<a class="pull-right"><?=$model->MOBILE?></a>
                    </li>
                   
                    
                </ul>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            </div>
            <div class="col-md-5">
            <!-- Profile Image -->
                <ul class="list-group">
                    <li class="list-group-item">
                      Gender<a class="pull-right"><?=$model->GENDER?></a>
                    </li>
                    <li class="list-group-item">
                        KRA Pin<a class="pull-right"><?=$model->cust_kra_pin ?></a>
                    </li>
                    <li class="list-group-item">
                        <b><a class="pull-right"><?=$model->PROVINCE_STATE ?></a></b>County
                    </li>
                </ul>
                <div class="margin">
                   </div>
                </div>
                <!-- /.box-body -->
            </div>
<!-- /.box-body -->
<div class="box-footer">
<?= Html::a('<i class="fa fa-eye"></i>Loans', ['customers/viewloans','id' => $model['ACCOUNT_NO']],['class' => 'btn btn-flat btn-info pull-left']); ?>&nbsp
<?=  Html::a('<i class="fa fa-eye"></i>Shares', ['customers/viewshares','id' => $model['ACCOUNT_NO']],['class' => 'btn btn-flat btn-info pull-left']);?>&nbsp
<?=  Html::a('<i class="fa fa-eye"></i>Savings', ['customers/viewsavings','id' => $model['ACCOUNT_NO']],['class' => 'btn btn-flat btn-info pull-left']);?>&nbsp
<?=  Html::a('<i class="fa fa-plus "></i> Add Savings', ['savings/create','id' => $model['ACCOUNT_NO']],['class' => 'btn btn-flat bg-aqua pull-right']);?>&nbsp
<?=  Html::a('<i class="fa fa-plus "></i> Add Shares', ['shares/create','id' => $model['ACCOUNT_NO']],['class' => 'btn btn-flat bg-aqua pull-right']);?>&nbsp
<?=  Html::a('<i class="fa fa-plus "></i> Add Repayment', ['loanrepayments/create','id' => $model['ACCOUNT_NO']],['class' => 'btn btn-flat btn-info pull-right']);?>&nbsp                
<?=  Html::a('<i class="fa fa-money"></i> Withdraw Cash', ['wiithdrawals/create','id' => $model['ACCOUNT_NO']],['class' => 'btn btn-flat btn-info pull-right']);?>&nbsp 
<?=  Html::a('<i class="fa fa-plus "></i> Add Loan', ['loans/create','id' => $model['ACCOUNT_NO']],['class' => 'btn btn-flat btn-info pull-right']);?>&nbsp

  <!-- footer area -->
</div>
<!-- /.box-footer-->

</section>
<!-- /.content -->
</div>