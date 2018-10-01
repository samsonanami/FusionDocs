<?php

use yii\helpers\Html;
use yii\grid\GridView;

?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <!-- Main content -->
      <section class="content">
       <!-- Default box -->
       <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Title</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
<?php

// VIEW - views/product/index.php
use kartik\tree\TreeView;
use app\models\Product;
use kartik\file\FileInput;


 
echo TreeView::widget([
  'query' => \app\models\Product::find()->addOrderBy('root, lft'),
  'headingOptions' => ['label' => 'Store'],
  'rootOptions' => ['label'=>'<span class="text-primary">Directories</span>'],
  'topRootAsHeading' => true, // this will override the headingOptions
  'fontAwesome' => true,
  'isAdmin' => true,
  'iconEditSettings'=> [
      'show' => 'list',
      'listData' => [
          'folder' => 'Folder',
          'file' => 'File',
          'mobile' => 'Phone',
          'bell' => 'Bell',
      ]
  ],
  'softDelete' => true,
  'cacheSettings' => ['enableCache' => true]
]);

?>
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
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

