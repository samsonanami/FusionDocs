<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\TrDirectories;
/* @var $this yii\web\View */
/* @var $searchModel app\models\OmDocumentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Documents';
?>
<!-- KRAJEE EXPLORER THEME (ADVANCED) -->
<!-- bootstrap 4.x is supported. You can also use the bootstrap css 3.3.x versions -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.9/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
<!-- if using RTL (Right-To-Left) orientation, load the RTL CSS file after fileinput.css by uncommenting below -->
<!-- link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.9/css/fileinput-rtl.min.css" media="all" rel="stylesheet" type="text/css" /-->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<!-- piexif.min.js is needed for auto orienting image files OR when restoring exif data in resized images and when you 
    wish to resize images before upload. This must be loaded before fileinput.min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.9/js/plugins/piexif.min.js" type="text/javascript"></script>
<!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview. 
    This must be loaded before fileinput.min.js --> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.9/js/plugins/sortable.min.js" type="text/javascript"></script>
<!-- purify.min.js is only needed if you wish to purify HTML content in your preview for 
    HTML files. This must be loaded before fileinput.min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.9/js/plugins/purify.min.js" type="text/javascript"></script>
<!-- popper.min.js below is needed if you use bootstrap 4.x. You can also use the bootstrap js 
   3.3.x versions without popper.min.js. -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<!-- bootstrap.min.js below is needed if you wish to zoom and preview file content in a detail modal
    dialog. bootstrap 4.x is supported. You can also use the bootstrap js 3.3.x versions. -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script>
<!-- the main fileinput plugin file -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.9/js/fileinput.min.js"></script>
<!-- optionally if you need a theme like font awesome theme you can include it as mentioned below -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.9/themes/fa/theme.js"></script>
<!-- optionally if you need translation for your language then include  locale file as mentioned below -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.9/js/locales/(lang).js"></script>


<!-- load the CSS files in the right order -->
<link href="css/fileinput.min.css" rel="stylesheet">
<link href="themes/explorer/theme.css" rel="stylesheet">
 
<!-- load the JS files in the right order -->
<script src="js/fileinput.js"></script>
<script src="themes/explorer/theme.js"></script>




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
            <li><?php echo Html::a($parent_one->dir_name, ['create'], ['class' => 'btn bg-olive btn-flat btn-sm']) ?>
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


<div class="file-loading">
    <input id="input-ke-2" name="input-ke-2[]" type="file" multiple>
</div>
<script>
<!-- must load the font-awesome.css for this example -->
$("#input-ke-2").fileinput({
    theme: "explorer",
    uploadUrl: "/uploads",
    minFileCount: 1,
    maxFileCount: 5,
    overwriteInitial: false,
    previewFileIcon: '<i class="fa fa-file"></i>',
    initialPreview: [
        // IMAGE DATA
       'https://picsum.photos/800/560?image=1071',
        // IMAGE RAW MARKUP
        '<img src="https://picsum.photos/800/560?image=1075" class="kv-preview-data file-preview-image">',
        // TEXT DATA
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut mauris ut libero fermentum feugiat eu et dui. Mauris condimentum rhoncus enim, sed semper neque vestibulum id. Nulla semper, turpis ut consequat imperdiet, enim turpis aliquet orci, eget venenatis elit sapien non ante. Aliquam neque ipsum, rhoncus id ipsum et, volutpat tincidunt augue. Maecenas dolor libero, gravida nec est at, commodo tempor massa. Sed id feugiat massa. Pellentesque at est eu ante aliquam viverra ac sed est.",
        // PDF DATA
        'http://kartik-v.github.io/bootstrap-fileinput-samples/samples/pdf-sample.pdf',
        // VIDEO DATA
        "http://kartik-v.github.io/bootstrap-fileinput-samples/samples/small.mp4"
    ],
    initialPreviewAsData: true, // defaults markup  
    initialPreviewConfig: [
        {caption: "Image 11.jpg", size: 762980, url: "/site/file-delete", downloadUrl: 'https://picsum.photos/800/460?image=11', key: 11},
        {previewAsData: false, size: 823782, caption: "Image 13.jpg", url: "/site/file-delete", downloadUrl: 'https://picsum.photos/800/460?image=13', key: 13}, 
        {caption: "Lorem Ipsum.txt", type: "text", size: 1430, url: "/site/file-delete", key: 12}, 
        {type: "pdf", size: 8000, caption: "PDF Sample.pdf", url: "/site/file-delete", key: 14}, 
        {type: "video", size: 375000, filetype: "video/mp4", caption: "Krajee Sample.mp4", url: "/site/file-delete", key: 15} 
    ],
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
