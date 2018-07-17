<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\TrDirectories;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OmDocumentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Documents';
?>


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper gradient-border">
    <!-- Main content -->
    <section class="content">
    <div class="row">
    <section class="content-header">
        <h4>
        <i class="fa fa-files-o"></i><span>File Manager</span> 
            <small>Control panel</small>
        </h4>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Documents</li>
        </ol>
        </section>
        
    <div class="col col-lg-12">
    <div class=" box box-solid">    
        <div class="box-header with-border">
            Quick Links:
        </div>
        <?php //echo Html::a('Upload Documents >>', ['create'], ['class' => 'btn btn-success']) ?>
        <?php  //echo $this->render('_search', ['model' => $searchModel]); ?>
    </div>
    </div>
        
        </div>
        <div class="card-body">
               

        <div class="row">
        <div class="col col-lg-4">
        <!-- tree -->
        <div class=" box box-solid">    
        <div class="box-header with-border">
            Directory Tree
        </div><br>
        <!-- /btn-group -->
        <div class="input-group">
            <input id="new-event" type="text" class="form-control" placeholder="Folder Title">
            <div class="input-group-btn">
                <button id="add-new-event" type="button" class="btn btn-primary btn-flat">Search</button>
            </div>
        <!-- /btn-group -->
        </div>
        <!-- /input-group -->
        <br>
        <ul class="file-tree">
        <?php foreach($parent_one as  $parent_one){ ?>
            <li><a href="#"><?= $parent_one->dir_name; ?></a>
            <ul>
                <?php $parent_two = TrDirectories::find()->andWhere(['dir_level'=>2])->andWhere(['dir_parent_id'=>$parent_one->dir_id])->all(); 
                foreach($parent_two as $parent_two){
                ?>
                <li><a href="#"><?= $parent_two->dir_name; ?></a> 
                  <ul>
                  <?php $parent_three = TrDirectories::find()->andWhere(['dir_level'=>2])->andWhere(['dir_parent_id'=>$parent_two->dir_id])->all(); 
                    foreach($parent_three as $parent_three){
                    ?>
                    <li><a href="#"><a href="#"><?= $parent_three->dir_name; ?></a>
                    <ul>
                        <?php $parent_four = TrDirectories::find()->andWhere(['dir_level'=>2])->andWhere(['dir_parent_id'=>$parent_two->dir_id])->all(); 
                            foreach($parent_four as $parent_four){
                            ?>
                            <li>
                                <a href="#link5"><a href="#"><?= $parent_four->dir_name; ?></a>
                                    <ul>
                                    <?php $parent_five = TrDirectories::find()->andWhere(['dir_level'=>2])->andWhere(['dir_parent_id'=>$parent_two->dir_id])->all(); 
                                        foreach($parent_five as $parent_five){
                                        ?>
                                        <li>
                                            <a href="#link5"><a href="#"><?= $parent_five->dir_name; ?>
                                        </li>
                                        <?php } ?>
                                    </ul>
                            </li>
                        <?php } ?>
                        </ul>
                    </li>
                    <?php } ?>
                    </ul>
                </li>
                <?php } ?>
            </ul>
        </li>
        <?php } ?>\
        </ul>
        <!-- end of tree -->
        <div class="box-footer with-border">
            Directory Tree
        </div>
        </div>
     </div>
     <!-- right nav -->
    <div class="col col-lg-8">
    <div class="box box-primary">
        <div class="box-header with-border">
            Action Panel
        </div>
        <div class="box-body ">
            <div class="om-documents-index">
            
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    // 'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'short_title',
                        // 'doc_id',
                        'title',
                        // 'categoty',
                        // 'type',
                        //'keyword',
                        //'note',
                        //'created_by',
                        //'doc_link:ntext',
                        'date_created',
                        

                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
            </div>
            
        </div>
        <div class="card-footer text-muted">
            2 days ago
        </div>
        </div>
        </div>
    </div>
        </section>
    </div>
    </div>
    </div>

        <script src="js/jquery-1.12.4.min.js"></script> 
        <script src="js/file-explore.js"></script> 
        <script>
        $(document).ready(function() {
                    $(".file-tree").filetree();
                });
        </script>
