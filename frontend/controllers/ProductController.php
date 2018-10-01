<?php

namespace frontend\controllers;

use Yii;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

// CONTROLLER - controllers/ProductController.php
class ProductController extends \yii\web\Controller {
    public function actionIndex()
    {
        return $this->render('index');
    }
}

?>