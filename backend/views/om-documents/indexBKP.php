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
    </div>

<div class="row">
<div class="col col-lg-4">
<!-- tree -->
<div class=" box box-solid">    
<div class="box-header with-border">
    Directory Tree
</div>
<form class="search-form">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Search">

        <div class="input-group-btn">
        <button type="submit" name="submit" class="btn btn-warning btn-flat"><i class="fa fa-search"></i>
        </button>
        </div>
    </div>
    <!-- /.input-group -->
    </form>
<!-- /input-group -->
<br>
<ul class="file-tree">
        <?php
        $parent_one = TrDirectories::find()->where(['dir_level'=>1])->all();
         foreach($parent_one as  $parent_one){ ?>
            <li><a href="#"><?= $parent_one->dir_name; ?></a>
            <ul>
                <?php $parent_two = TrDirectories::find()->andWhere(['dir_level'=>2])->andWhere(['dir_parent_id'=>$parent_one->dir_id])->all(); 
                foreach($parent_two as $parent_two){
                ?>
                <li><a href="#"><?= $parent_two->dir_name; ?></a> 
                  <ul>
                  <?php $parent_three = TrDirectories::find()->andWhere(['dir_level'=>3])->andWhere(['dir_parent_id'=>$parent_two->dir_id])->all(); 
                    foreach($parent_three as $parent_three){
                    ?>
                    <li><a href="#"><a href="#">Hello<?= $parent_three->dir_name; ?></a>
                    <ul>
                        <?php $parent_four = TrDirectories::find()->andWhere(['dir_level'=>4])->andWhere(['dir_parent_id'=>$parent_three->dir_id])->all(); 
                            foreach($parent_four as $parent_four){
                            ?>
                            <li>
                                <a href="#link5"><a href="#"><?= $parent_four->dir_name; ?></a>
                                    <ul>
                                    <?php $parent_five = TrDirectories::find()->andWhere(['dir_level'=>5])->andWhere(['dir_parent_id'=>$parent_four->dir_id])->all(); 
                                        foreach($parent_five as $parent_five){
                                        ?>
                                        <li>
                                            <a href="#link5"><a href="#"><?= $parent_five->dir_name; ?>
                                            <ul>
                                            <?php $parent_six = TrDirectories::find()->andWhere(['dir_level'=>6])->andWhere(['dir_parent_id'=>$parent_five->dir_id])->all(); 
                                                foreach($parent_six as $parent_six){
                                                ?>
                                                <li>
                                                    <a href="#link5"><a href="#"><?= $parent_six->dir_name; ?>
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
                <?php } ?>
            </ul>
        </li>
        <?php } ?>
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
            Action Panel :::
            <div class="pull-right">
                <?php echo Html::a('New File', ['create'], ['class' => 'btn bg-olive btn-flat btn-sm']) ?>
                <?php echo Html::a('New Folder', ['create'], ['class' => 'btn bg-olive btn-flat btn-sm']) ?>
            </div>
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
        </div>
        </div>
        </div>
    </div>
        </section>
    </div>
    </div>
    

<script src="js/jquery-1.12.4.min.js"></script> 
<script src="js/file-explore.js"></script> 
<script>
$(document).ready(function() {
            $(".file-tree").filetree();
        });
</script>
