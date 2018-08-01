<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */
$this->title = "View User :".$model->id;
// $this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="myDiv" class="animate-bottom">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      <h1><?= Html::encode($this->title) ?></h1>
        <small>User Profile View</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Documents</a></li>
        <li class="active">New Document</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-md-4">
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?= $model->image_link ?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?= $model->first_name." ".$model->last_name ?></h3>

              <p class="text-muted text-center">Username : <?= $model->username ?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Documents Uploaded</b> <a class="pull-right">0</a>
                </li>
                <li class="list-group-item">
                  <b>Directories Created</b> <a class="pull-right">0</a>
                </li>
                <li class="list-group-item">
                  <b>Member Since</b> <a class="pull-right"><?= $model->created_at ?></a>
                </li>
                <li class="list-group-item">
                  <b>Usage Status</b> <a class="pull-right"><?php if($model->status==10){echo "Active";}else{echo "Disabled";} ?></a>
                </li>
              </ul>
              
              <a href="#" class="btn btn-success btn-block"><b>Send Message</b></a>
            </div>
            <!-- /.box-body -->
            </div>
            <!-- /.box -->
       
            <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-8">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                <li class="active"><a href="#activity" data-toggle="tab">About Me</a></li>
                <li><a href="#timeline" data-toggle="tab">Timeline</a></li>
                <li><a href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
                <div class="tab-content">
                <div class="active tab-pane" id="activity">
                    <!-- First nav content -->
                    <div class="box-primary">
                        <div class="box-header">
                        <h3 class="box-title">Contact Information</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                        <strong><i class="fa fa-envelope margin-r-5"></i> Email</strong>
                        <p class="text-muted">
                        <?= $model->email ?>
                        </p>
                        <hr>
                        <strong><i class="fa fa-phone-square margin-r-5"></i> Phone</strong>
                        <p class="text-muted"> - <?= $model->phone ?></p>
                        <hr>
                        <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>
                        <p>Not set.</p>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <ul class="timeline timeline-inverse">
                    <!-- timeline time label -->
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <li>
                        <i class="fa fa-camera bg-purple"></i>

                        <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                        <h3 class="timeline-header"><a href="#"My Phots</a> Profile Uploads </h3>

                        <div class="timeline-body">
                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                        </div>
                        </div>
                    </li>
                    <!-- END timeline item -->
                    
                    </ul>
                </div>
                <!-- /.tab-pane -->

                <div class="tab-pane" id="settings">
                    <form class="form-horizontal">
                    <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Name</label>

                        <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputName" placeholder="Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                        <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Name</label>

                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName" placeholder="Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                        <div class="col-sm-10">
                        <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label>
                            <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                            </label>
                        </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                        <p>
                            <span class="label">
                                <button type="submit" class="btn btn-warning">Submit</button>
                            </span>
                            <span class="label">
                            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                                    'class' => 'btn btn-danger',
                                    'data' => [
                                        'confirm' => 'Are you sure you want to delete this item?',
                                        'method' => 'post',
                                    ],
                                ]) ?>
                            </span>
                            <span class="label">
                                <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                            </span>
                        </p>
                        
                        </div>
                    </div>
                    </form>
                </div>
                <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
