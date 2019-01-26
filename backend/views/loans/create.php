<?php

use yii\helpers\Html;
use backend\models\Customers;
use backend\models\Guarantor;

$gurantors = new Guarantor;

// use backend\models\Guarantor;
$this->title = 'Loan Application';

?>
<div class="loans-create">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><?=Html::encode($this->title)?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo Yii::$app->homeUrl ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      </ol>
    </section>
    
    <!-- Main content -->
    <section class="content">
    
    <!-- Default box -->
    <div class="box box-default box-solid">
    <div class="box-header with-border box-profile">
          Loan Application Form : <small>Fill the Form to apply</small>
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
        <?php
        //  $modelCustomer = Customers::findOne($id);
         $modelCustomer = new Customers();
         $id = $_GET['id'];
         $modelCustomer = Customers::findOne($id);
         
         ?>
         
        <?=$this->render('_formwithid', [
          'model' => $model,
          'modelCustomer' => $modelCustomer,
       ])?>
       
<!--        START OF MODEL -->  
<div class="modal modal-primary fade" id="modal-info">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">New Guarantors</h4>
      </div>
      <div class="modal-body">	
        <?=$this->render('@backend/views/guarantor/_form', [
            'model' => $gurantors,
          'modelCustomer' => $modelCustomer,
       ])?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline pull-right btn-flat" data-dismiss="modal">Exit</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!--   END OF MODEL -->
            
<!-- /.box-body -->
</div>

<div class="box-footer">
  <!-- footer area -->
</div>
<!-- /.box-footer-->

</section>
<!-- /.content -->
</div>