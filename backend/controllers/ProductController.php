<?php

namespace backend\controllers;

use Yii;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

// CONTROLLER - controllers/ProductController.php
class ProductController extends \yii\web\Controller {
    public function actionIndex()
    {

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index',[
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionInput()
    {
        return $this->render('input');
    }
}

?>