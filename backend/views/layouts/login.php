<?php
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




</head>
<body class="hold-transition login-page" onload="myFunction()"
	style="margin: 0;">
	<!-- Page Preloder -->
	<div id="loader"></div>

<?php $this->beginBody() ?>

<div class="wrap">
		<div class="container">
        <?=Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []])?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>


	</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
