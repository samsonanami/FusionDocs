<?php
// use yii\grid\GridView;
use backend\controllers\LoanrepaymentsSearch;
use backend\controllers\LoansSearch;
use kartik\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;
$this->title = 'Customers';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

<div class="customers-index">
<section class="content">
<div class="row">

<div class="modal modal-primary fade" id="modal-info">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Detailed Search</h4>
              </div>
              <div class="modal-body">
              <?php echo $this->render('_search', ['model' => $searchModel]); ?>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-right btn-flat" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

</div>
<div class="row">
<div class="col-md-12">
<?=Html::a('<i class="fa fa-user-plus"></i> Add New Customer', ['create'], ['class' => 'btn btn-flat btn-md btn-primary margin'])?>
<button type="button" class="btn btn-flat btn-info" data-toggle="modal" data-target="#modal-info"><i class="fa fa-search"></i> Detailed Search</button>
    <!-- Default box -->
    <div class="box box-default box-solid">
    <div class="box-header with-border box-profile">
    <h3 class="box-title">Customers Master</h3>
    <div class="box-tools pull-left">
    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
          title="Collapse">
    <i class="fa fa-minus"></i></button>
    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
    <i class="fa fa-times"></i></button>
    </div>
    </div>
    <div class="box-body">
 
<div class="box box-default box-solid">
<div class="box-body with-border box-profile  bg-succes">


<?php Pjax::begin();?>
<?php
echo GridView::widget([
    'dataProvider' => $dataProvider,
    // 'filterModel' => $searchModel,
    'columns' => [
        [
            'attribute' => 'img',
            'format' => 'html',
            'label' => 'Portrait',
            'value' => function ($data, $model) {
                return Html::img('' . $model['logo'] . '' . $data['logo'],
                    ['class' => 'img thumbnail-sm']);
            },
        ],
        [
            'header' => 'ACC NAME',
            'attribute' => 'ln_account_name',
        ],
        [
            'header' => 'ACC NO.',
            'attribute' => 'UNIQUE_NO',
        ],
        [
            'header' => 'KRA PIN',
            'attribute' => 'cust_kra_pin',
        ],
        [
            'header' => 'PHONE',
            'attribute' => 'MOBILE',
        ],
        [
            'header' => 'EMAIL',
            'attribute' => 'EMAIL',
        ],

        // 'COUNTRY',
        //'TITLE',
        [
          'header'=>'GENDER',
          'attribute'=>'GENDER',
          'label'=>false,
          'value'=>function($data, $key, $index, $column){
            if($data->GENDER=='Male'){
              return 'M';
            }else{
              return 'F';
            }
          }
        ],
//         [
//           'header' => 'Loans/Savings',
//           'class' => 'yii\grid\ActionColumn',
//           'template' => '{loans}{savings}',
//           // 'template' => '{btnLoans} {btnSavings} {viewLoans}',  // the default buttons + your custom button
//           'buttons' => [
//             'loans' => function($url, $model) {
//                   // return Html::a('<span class="btn btn-sm btn-default"><b class="fa fa-search-plus"></b></span>', ['customers/viewloans', 'id' => $model['ACCOUNT_NO']], ['title' => 'View', 'id' => 'modal-btn-view']);
//                   //return Html::a('Loans', ['customers/viewloans','id' => $model['ACCOUNT_NO']],['class' => 'fa fa-money btn btn-md btn-default']);
//                  return Html::a('Loans', ['customers/viewloans','id' => $model['ACCOUNT_NO']],['target' => '_blank','class' => 'fa fa-money btn btn-md btn-default']);

//               },
//               'savings' => function($id, $model) {
//                 return Html::a(' Savings', ['customers/viewsavings','id' => $model['ACCOUNT_NO']],['class' => 'fa fa-money btn btn-flat btn-default']);
//               },
//               // 'delete' => function($url, $model) {
//               //     return Html::a('<span class="btn btn-sm btn-danger"><b class="fa fa-trash"></b></span>', ['delete', 'id' => $model['ACCOUNT_NO']], ['title' => 'Delete', 'class' => '', 'data' => ['confirm' => 'Are you absolutely sure ? You will lose all the information about this user with this action.', 'method' => 'post', 'data-pjax' => false],]);
//               // }
//             ],
//           ],
        
        ['class' => 'kartik\grid\ActionColumn'],
        [
            'header' => 'LOANS',
            'label' => 'Loans',
            'class' => 'kartik\grid\ExpandRowColumn',
            'value' => function ($model, $key, $index, $column) {
                return GridView::ROW_COLLAPSED;
            },
            'detail' => function ($model, $key, $index, $column) {
                $searchModel = new LoansSearch();
                $searchModel->ln_customer_id = $model->ACCOUNT_NO;
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                return Yii::$app->controller->renderPartial('_loans', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ]);
            },
        ],
        // ['class' => 'yii\grid\SerialColumn'],
        [
            'header' => 'SAVINGS',
            'label' => 'Repayments',
            'class' => 'kartik\grid\ExpandRowColumn',
            'value' => function ($model, $key, $index, $column) {
                return GridView::ROW_COLLAPSED;
            },
            'detail' => function ($model, $key, $index, $column) {
                $searchModel = new LoanrepaymentsSearch();
                $searchModel->lnrp_ln_id = $model->ACCOUNT_NO;
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                return Yii::$app->controller->renderPartial('_repayments', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ]);
            },
        ],

    ],
]); ?>
   <?php Pjax::end();?>
   
</div>
</div>

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