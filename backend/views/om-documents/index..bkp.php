<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OmDocumentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Documents';
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper gradient-border">
    <!-- Main content -->
    <section class="content">
<!-- tree -->

        <ul class="file-tree">
            <?php foreach($parent_dir as $parent_dir) { ?>
            <li><a href="#"><?= $parent_dir->dir_id.'::'.$parent_dir->dir_name ?></a>
            <ul>
                <li><a href="#">New York</a> 
                  <ul>
                      <li><a href="#">Corporation</a>
                        <ul>
                            <li> <a href="#link5">Link 5</a> </li>
                            <li> <a href="#link6">Link 6</a> </li>
                            <li> <a href="#link7">Link 7</a> </li>
                            <li> <a href="#link8">Link 8</a> </li>
                            <li> <a href="#">Deeper</a>
                              <ul>
                                  <li><a href="#">Link 1</a> </li>
                                  <li><a href="#">Link 2</a> </li>
                                  <li><a href="#">Link 3</a> </li>
                                  <li><a href="#">Link 4</a> </li>
                                </ul>
                            </li>
                        </ul>
                      </li>
                      <li><a href="#">LLC</a>
                        <ul>
                            <li> <a href="#link5">Link 5</a> </li>
                            <li> <a href="#link6">Link 6</a> </li>
                            <li> <a href="#link7">Link 7</a> </li>
                            <li> <a href="#link8">Link 8</a> </li>
                            <li> <a href="#">Deeper</a>
                              <ul>
                                  <li><a href="#">Link 1</a> </li>
                                  <li><a href="#">Link 2</a> </li>
                                  <li><a href="#">Link 3</a> </li>
                                  <li><a href="#">Link 4</a> </li>
                                </ul>
                            </li>
                        </ul>
                      </li>

                  </ul>
                
                </li>
                <li><a href="#link2">Link 2</a> </li>
                <li><a href="#link3">Link 3</a> </li>
                <li><a href="#link4">Link 4</a> </li>
              </ul>
            </li>
            <li><a href="#">Canada</a>
            <ul>
                <li><a href="#">Link 1</a> </li>
                <li><a href="#">Link 2</a> </li>
                <li><a href="#">Link 3</a> </li>
                <li><a href="#">Link 4</a> </li>
              </ul></li>
          </ul>
        <?php } ?>
<!-- end of tree -->
        <div class="om-documents-index">

            <h1><?= Html::encode($this->title) ?></h1>
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <p>
                <?= Html::a('Upload Documents >>', ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'doc_id',
                    'short_title',
                    'title',
                    'categoty',
                    'type',
                    //'keyword',
                    //'note',
                    //'created_by',
                    //'doc_link:ntext',
                    //'date_created',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </section>
</div>


<script src="js/jquery-1.12.4.min.js"></script> 
<script src="js/file-explore.js"></script> 
<script>
$(document).ready(function() {
            $(".file-tree").filetree();
          });
</script>
