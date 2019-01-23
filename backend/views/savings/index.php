<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use yii\helpers\Url;
use kartik\export\ExportMenu;
use dosamigos\datepicker\DatePicker;


$this->title = 'Savings';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<div class="savings-index">
<section class="content">

<div class="row">

</div>    
<div class="row">
<div class="col-md-12">
    <!-- Default box -->
           
    <div class="box box-default box-solid">
    <div class="box-header with-border box-profile">

    <h3 class="box-title">Actions</h3>
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
        $gridColumns = [
        'ln_account_name',
        'cust_id_no',
        'cust_kra_pin',
        'MOBILE',
        'EMAIL',
        'GENDER',
        ];
        echo ExportMenu::widget([
        'dataProvider'=>$dataProvider,
        'columns'=>$gridColumns,
        ]);
      ?>
      <div class="col-md-4">
        <div class="box box-default collapsed-box" style="position:position;">
        <div class="box-header with-border">
          <h3 class="box-title">Detailed Search</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-search"></i>
            </button>
          </div>
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        <?php echo $this->render('_search', ['model' => $searchModel]); ?>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->  
    </div>    

      <hr>
    <?php Pjax::begin();?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'svg_account_name',
            'svg_account_number',
            'svg_bal',
            'svg_mobile',
            'svg_reference',
            'svg_date',
            'created_by',
             [
            'encodeLabel' => false,
            'attribute' => 'svg_date',
            'label' => 'Date Created',
            'headerOptions' => ['style' => 'text-align:left'],
            'format' => 'raw',
            'filter'=>DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'svg_date',
                    'template' => '{addon}{input}',
                        'clientOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd'
                        ]
                ]),
            ],
            //'svg_last_transaction',
            //'svg_status',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end();?>
<!-- /.box-body -->
</div>

<div class="box-footer">
  <!-- footer area -->
</div>
<!-- /.box-footer-->
</div>

</section>
<!-- /.content -->

</div>

</div>


