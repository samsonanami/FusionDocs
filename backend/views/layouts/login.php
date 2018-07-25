<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>


<script>
    $(document).ready(function() {
                $(".file-tree").filetree();
                });
</script>


    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <link rel="shortcut icon" href="favicon.ico">


    <script>
          var myVar;
          function myFunction() {
              myVar = setTimeout(showPage, 1000);
          }

          function showPage() {
            document.getElementById("loader").style.display = "none";
            document.getElementById("myDiv").style.display = "block";
          }
          </script>

          <link href="css/main.css" rel="stylesheet">
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


    
</head>
<body class="hold-transition login-page" onload="myFunction()" style="margin:0;" >
<!-- Page Preloder -->
<div id="loader"></div>

<?php $this->beginBody() ?>

<div class="wrap">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
    

</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
