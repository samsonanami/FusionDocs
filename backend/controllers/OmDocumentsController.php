<?php

namespace backend\controllers;

use Yii;
use app\models\OmDocuments;
use app\models\OmDocumentsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\data\ActiveDataProvider;
use app\models\TrDirectories;

/**
 * OmDocumentsController implements the CRUD actions for OmDocuments model.
 */
class OmDocumentsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all OmDocuments models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OmDocumentsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single OmDocuments model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new OmDocuments model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
         $this->layout='main';
         $model = new OmDocuments();

       if ($model->load(Yii::$app->request->post()))
        {
            //get the instance of upload file
            $code = mt_rand(100000,999999); 
            $imageName = $model->short_title;
            $model->attachment = UploadedFile::getInstance($model,'attachment');
            $model->attachment->saveAs('uploads/'.$code.'.'.$imageName.'.'.$model->attachment->extension);
            //save the path in the db column
            $model->doc_link = 'uploads/'.$code.'.'.$imageName.'.'.$model->attachment->extension;
            $model->created_by = Yii::$app->user->identity->username;
            $model->save();
             return $this->redirect(['view', 'id' => $model->doc_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing OmDocuments model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->doc_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionHome()
    {
        $this->layout='main';
        $parent_one = TrDirectories::find()->where(['dir_level'=>1])->all();
        
        $searchModel = new OmDocumentsSearch();
       

        return $this->render('home', [
            'searchModel' => $searchModel,
            'parent_one' => $parent_one,
        ]);
    }

    public function actionSearch()
    {
       $searchModel = new OmDocumentsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('search', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Deletes an existing OmDocuments model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionDownload($id)
    {
        $this->layout='main';
        $data = OmDocuments::findOne($id);
        header('Content-Type:'.pathinfo($data->doc_link, PATHINFO_EXTENSION));
        header('Content-Disposition: attachment; filename='.$data->doc_link);
        return readfile($data->doc_link);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the OmDocuments model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return OmDocuments the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = OmDocuments::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
