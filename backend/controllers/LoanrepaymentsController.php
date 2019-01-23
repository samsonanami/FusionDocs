<?php

namespace backend\controllers;

use Yii;
use backend\models\Loanrepayments;
use backend\controllers\LoanrepaymentsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LoanrepaymentsController implements the CRUD actions for Loanrepayments model.
 */
class LoanrepaymentsController extends Controller
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
     * Lists all Loanrepayments models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LoanrepaymentsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Loanrepayments model.
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
     * Creates a new Loanrepayments model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Loanrepayments();
        $model->lnrp_collected_by = Yii::$app->user->identity->username;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->lnrp_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
    public function actionCreatenew()
    {
        $model = new Loanrepayments();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->lnrp_id]);
        }

        return $this->render('createnew', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Loanrepayments model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->lnrp_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Loanrepayments model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionLists($id)
    {
       $countLoans=Loans::find()       
           ->select('ln_paid,ln_balance')
           ->where(['ln_id' => $id])
           ->one();
    
        $balance = $countLoans->ln_balance;
        echo $balance;    
    }

    

    protected function findModel($id)
    {
        if (($model = Loanrepayments::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
