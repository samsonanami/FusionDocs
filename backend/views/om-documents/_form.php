<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OmDocuments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="om-documents-form">
            <!-- Get the doc id -->
              <?php
                $request = Yii::$app->request;
                $id = $request->get('id', 1);
              ?>
 <div class="row">
            <div class="col-md-4">
                <?php $form = ActiveForm::begin(); ?>
                <?= $form->field($model, 'dir_id')->textInput(['maxlength' => true, 'class'=>'form-control float-left', 'value'=>$id, 'disabled'=>true]) ?>
                <?= $form->field($model, 'categoty')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'keyword')->textInput(['maxlength' => true]) ?>
                <?php
                // echo $form->field($model, 'attachment')->fileInput(['maxlength' => true, 'class'=>'form-control']);
                // echo $form->field($model, 'attachment')->fileInput(['maxlength' => true, 'class'=>'form-control', 'id'=>'input-ke-2', 'name'=>'input-ke-2[]', 'type'=>"file"]);
                // <input  name="input-ke-2[]" type="file" multiple>
                 ?>
                 <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'short_title')->textInput(['maxlength' => true, 'class'=>'form-control float-left'])->input('username',['placeholder'=>"Short Title"])  ?>
                <?= $form->field($model, 'note')->textArea(['maxlength' => true]) ?>
                <?= $form->field($model, 'categoty')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>
                </div>
           <div class="col-md-8">
                
                <?php echo $form->field($model, 'attachment')->fileInput(['maxlength' => true, 'class'=>'form-control', 'id'=>'input-ke-2', 'name'=>'input-ke-2[]', 'type'=>"file", 'multiple'=>true]); ?> 
               
                <script>
                  <!-- must load the font-awesome.css for this example -->
                  $("#input-ke-2").fileinput({
                      uploadAsync: true ,
                      theme: "explorer",
                      uploadUrl: "http://localhost/fusiondocs/backend/views/om-documents/upload.php",
                      minFileCount: 1,
                      maxFileCount: 5,
                      overwriteInitial: false,
                      previewFileIcon: '<i class="fa fa-file"></i>',
                      uploadExtraData: {
                          img_key: "1000",
                          img_keywords: "happy, nature"
                      },
                      preferIconicPreview: true, // this will force thumbnails to display icons for following file extensions
                      previewFileIconSettings: { // configure your icon file extensions
                          'doc': '<i class="fa fa-file-word-o text-primary"></i>',
                          'xls': '<i class="fa fa-file-excel-o text-success"></i>',
                          'ppt': '<i class="fa fa-file-powerpoint-o text-danger"></i>',
                          'pdf': '<i class="fa fa-file-pdf-o text-danger"></i>',
                          'zip': '<i class="fa fa-file-archive-o text-muted"></i>',
                          'htm': '<i class="fa fa-file-code-o text-info"></i>',
                          'txt': '<i class="fa fa-file-text-o text-info"></i>',
                          'mov': '<i class="fa fa-file-movie-o text-warning"></i>',
                          'mp3': '<i class="fa fa-file-audio-o text-warning"></i>',
                          // note for these file types below no extension determination logic 
                          // has been configured (the keys itself will be used as extensions)
                          'jpg': '<i class="fa fa-file-photo-o text-danger"></i>', 
                          'gif': '<i class="fa fa-file-photo-o text-muted"></i>', 
                          'png': '<i class="fa fa-file-photo-o text-primary"></i>'    
                      },
                      previewFileExtSettings: { // configure the logic for determining icon file extensions
                          'doc': function(ext) {
                              return ext.match(/(doc|docx)$/i);
                          },
                          'xls': function(ext) {
                              return ext.match(/(xls|xlsx)$/i);
                          },
                          'ppt': function(ext) {
                              return ext.match(/(ppt|pptx)$/i);
                          },
                          'zip': function(ext) {
                              return ext.match(/(zip|rar|tar|gzip|gz|7z)$/i);
                          },
                          'htm': function(ext) {
                              return ext.match(/(htm|html)$/i);
                          },
                          'txt': function(ext) {
                              return ext.match(/(txt|ini|csv|java|php|js|css)$/i);
                          },
                          'mov': function(ext) {
                              return ext.match(/(avi|mpg|mkv|mov|mp4|3gp|webm|wmv)$/i);
                          },
                          'mp3': function(ext) {
                              return ext.match(/(mp3|wav)$/i);
                          }
                      }
                  });
                  </script>
    <br>
    <div class="form-group">
        <?= Html::submitButton('Commit Changes >>', ['class' => 'btn btn-success']) ?>
    </div>
</div>
</div>
</div>
<?php ActiveForm::end(); ?>

</div>