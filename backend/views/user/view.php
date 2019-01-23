<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
$this->title = "View User :".$model->id;
// $this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
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
        <div class="box-body">
        <div class="customers-index">
             <div class="row">
            <div class="col-md-2">
            <!-- Profile Image -->
            <div class="">
                <div class="">
                  <div class="thumbnail">
                   <img src="<?= $model->image_link ?>" alt="User profile picture">
                  </div>

                <h3 class="profile-username text-center"><?= $model->first_name." ".$model->last_name ?></h3>
                <p class="text-muted text-center">Employee</p>
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
                    Full Name<b> <a class="pull-right"><?= $model->first_name." ".$model->last_name ?></a></b>
                    </li>
                    <li class="list-group-item">
                    Email<b><a class="pull-right"> <?= $model->email ?></a></b>
                    </li>
                    <li class="list-group-item">
                    Phone Number<b> <a class="pull-right"><?=$model->phone?></a></b>
                    </li>
                    <li class="list-group-item">
                    Member Since<b><a class="pull-right"><?= $model->created_at ?></a></b>
                    </li>
                    <li class="list-group-item">
                    Usage Status<b><a class="pull-right"><?php if($model->status==10){echo "Active";}else{echo "Disabled";} ?></a></b>
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
                
                </div>
                <!-- /.box-body -->
            </div>
<!-- /.box-body -->
</div>
<div class="col-md-2">
<div class=""> 
    <p>
        
    </p>
<div class="box-footer">

<!-- footer area -->
</div>
<!-- /.box-footer-->

</section>
<!-- /.content -->
</div>