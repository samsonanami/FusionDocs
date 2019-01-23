<?php

namespace backend\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use backend\models\Company;
use backend\models\Customers;
use backend\models\Loans;
use backend\controllers\LoansSearch;
use kartik\mpdf\Pdf;

/**
 * LoansController implements the CRUD actions for Loans model.
 */
class LoansController extends Controller
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

    public function actionIndex()
    {
        $searchModel = new LoansSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionPastmaturity()
    {
        $searchModel = new LoansSearch();
        $query = Loans::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->setSort([
            'attributes' => [
                'ln_id',
                'ln_released' => [
                    'desc' => ['ln_released' => SORT_DESC, 'ln_maturity' => SORT_DESC],
                    'label' => 'Released Date',
                    'default' => SORT_ASC,
                ],
                'ln_duration',
            ],
        ]);
        // filter by date
        $today = Yii::$app->formatter->asDate('now', 'yyyy-MM-dd');
        $query->andWhere('ln_maturity >"' . $today . '"');
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('pastmaturity', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

    }
    public function actionOnemonthlate()
    {
        $searchModel = new LoansSearch();
        $query = Loans::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->setSort([
            'attributes' => [
                'ln_id',
                'ln_released' => [
                    'desc' => ['ln_released' => SORT_DESC, 'ln_maturity' => SORT_DESC],
                    'label' => 'Released Date',
                    'default' => SORT_ASC,
                ],
                'ln_duration',
            ],
        ]);
        // filter by date
        $today = Yii::$app->formatter->asDate('now', 'yyyy-MM-dd');
        $query->andWhere('DATE_ADD(ln_due, INTERVAL 30 DAY) <"' . $today . '"');
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('pastmaturity', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

    }
    public function actionThreemonthlate()
    {
        $searchModel = new LoansSearch();
        $query = Loans::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->setSort([
            'attributes' => [
                'ln_id',
                'ln_released' => [
                    'desc' => ['ln_released' => SORT_DESC, 'ln_maturity' => SORT_DESC],
                    'label' => 'Released Date',
                    'default' => SORT_ASC,
                ],
                'ln_duration',
            ],
        ]);
        // filter by date
        $today = Yii::$app->formatter->asDate('now', 'yyyy-MM-dd');
        $query->andWhere('DATE_ADD(ln_due, INTERVAL 90 DAY) <"' . $today . '"');
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('pastmaturity', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

    }
    public function actionTodayloans()
    {
        $searchModel = new LoansSearch();
        $query = Loans::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->setSort([
            'attributes' => [
                'ln_id',
                'ln_released' => [
                    'desc' => ['ln_released' => SORT_DESC, 'ln_maturity' => SORT_DESC],
                    'label' => 'Released Date',
                    'default' => SORT_ASC,
                ],
                'ln_duration',
            ],
        ]);
        // filter by date
        $today = Yii::$app->formatter->asDate('now', 'yyyy-MM-dd');
        $query->andWhere('ln_due="' . $today . '"');
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('pastmaturity', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

    }
    public function actionPending()
    {
        $searchModel = new LoansSearch();
        $query = Loans::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->setSort([
            'attributes' => [
                'ln_id',
                'ln_released' => [
                    'desc' => ['ln_released' => SORT_DESC, 'ln_maturity' => SORT_DESC],
                    'label' => 'Released Date',
                    'default' => SORT_ASC,
                ],
                'ln_duration',
            ],
        ]);
        // filter by date
        $today = Yii::$app->formatter->asDate('now', 'yyyy-MM-dd');
        $query->andWhere('ln_application_status =1');
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('pending', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

    }
    public function actionOnappraisal1()
    {
        $searchModel = new LoansSearch();
        $query = Loans::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->setSort([
            'attributes' => [
                'ln_id',
                'ln_released' => [
                    'desc' => ['ln_released' => SORT_DESC, 'ln_maturity' => SORT_DESC],
                    'label' => 'Released Date',
                    'default' => SORT_ASC,
                ],
                'ln_duration',
            ],
        ]);
        // filter by date
        $today = Yii::$app->formatter->asDate('now', 'yyyy-MM-dd');
        $query->andWhere('ln_application_status =2');
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('onappraisal1', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionOnappraisal2()
    {
        $searchModel = new LoansSearch();
        $query = Loans::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->setSort([
            'attributes' => [
                'ln_id',
                'ln_released' => [
                    'desc' => ['ln_released' => SORT_DESC, 'ln_maturity' => SORT_DESC],
                    'label' => 'Released Date',
                    'default' => SORT_ASC,
                ],
                'ln_duration',
            ],
        ]);
        // filter by date
        $today = Yii::$app->formatter->asDate('now', 'yyyy-MM-dd');
        $query->andWhere('ln_application_status =3');
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('onappraisal2', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionApproved()
    {
        $searchModel = new LoansSearch();
        $query = Loans::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->setSort([
            'attributes' => [
                'ln_id',
                'ln_released' => [
                    'desc' => ['ln_released' => SORT_DESC, 'ln_maturity' => SORT_DESC],
                    'label' => 'Released Date',
                    'default' => SORT_ASC,
                ],
                'ln_duration',
            ],
        ]);
        // filter by date
        $today = Yii::$app->formatter->asDate('now', 'yyyy-MM-dd');
        $query->andWhere('ln_application_status =4');
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('approved', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionDenied()
    {
        $searchModel = new LoansSearch();
        $query = Loans::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->setSort([
            'attributes' => [
                'ln_id',
                'ln_released' => [
                    'desc' => ['ln_released' => SORT_DESC, 'ln_maturity' => SORT_DESC],
                    'label' => 'Released Date',
                    'default' => SORT_ASC,
                ],
                'ln_duration',
            ],
        ]);
        // filter by date
        $today = Yii::$app->formatter->asDate('now', 'yyyy-MM-dd');
        $query->andWhere('ln_application_status=5');
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('denied', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionUserloans()
    {
        $searchModel = new LoansSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionReports()
    {
        $modelCompany = Company::findOne(1);
        $searchModel = new LoansSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('reports', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'modelCompany' =>$modelCompany,
        ]);
    }
    public function actionReportsloanmaster()
    {
        $modelCompany = Company::findOne(1);
        $searchModel = new LoansSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('reportsloanmaster', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'modelCompany' =>$modelCompany,
        ]);
    }

    public function actionReportloanmasterpdf() {
        $modelCompany = Company::findOne(1);
        $searchModel = new LoansSearch();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
         $query = Loans::find();
         // $dataProvider->pagination  = false;
        
        $dataProvider = new ActiveDataProvider([
                'query' => $query,
            ]);
        // $query->andFilterWhere(['=', 'sch_status', 0]);
    
        // get your HTML raw content without any layouts or scripts
        $content = $this->renderPartial('reportsloanmaster_pdf', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'modelCompany' =>$modelCompany,
            ]);
        
        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            'filename' => 'Collection Sheet',
            // set to use core fonts only
            'mode' => Pdf::MODE_CORE, 
            // A4 paper format
            'format' => Pdf::FORMAT_A4, 
            // portrait orientation
            'orientation' => Pdf::ORIENT_LANDSCAPE, 
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER, 
            // your html content input
            'content' => $content,  
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting 
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            'cssInline' => '.kv-heading-1{font-size:18px}', 
             // set mPDF properties on the fly
            'options' => ['title' => 'FusionSacco System'],
             // call mPDF methods on the fly
            'methods' => [ 
                'SetHeader'=>['Investobrain Sacco Society Ltd'], 
                'SetFooter'=>['FusionSacco System - Pg {PAGENO}'],
            ]
        ]);
        
        // return the pdf output as per the destination setting
        return $pdf->render(); 
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionViewloans($id)
    {
        return $this->render('viewloans', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new Loans();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['customers/viewloans', 'id' => $model->ln_customer_id]);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelCustomers = new Customers();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ln_id]);
        }
        return $this->render('update', [
            'model' => $model,
            'modelCustomer' => $modelCustomers,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }
    public function actionApprove($id)
    {      
        $model = $this->findModel($id); 
        if($model != null)
         {
            $model->ln_status=1;
            $model->ln_application_status=2;
            $model->ln_approved_by=Yii::$app->user->identity->username;
            $model->save();
            return $this->redirect(['view', 'id' => $model->ln_id]);
        }
    }
    public function actionAppraise1($id)
    {      
        $model = $this->findModel($id); 
        if($model != null)
         {
            $model->ln_status=1;
            $model->ln_application_status=3;
            $model->save();
            return $this->redirect(['view', 'id' => $model->ln_id]);
        }
    }
    public function actionAppraise2($id)
    {      
        $model = $this->findModel($id); 
        if($model != null)
         {
            $model->ln_status=1;
            $model->ln_application_status=4;
            $model->save();
            return $this->redirect(['view', 'id' => $model->ln_id]);
        }
    }

    public function actionReject($id)
    {      
        $model = $this->findModel($id); 
        if($model != null)
         {
            $model->ln_status=3;
            $model->ln_application_status=4;
            $model->ln_approved_by=Yii::$app->user->identity->username;
            $model->save();
            return $this->redirect(['view', 'id' => $model->ln_id]);
        }
    }


    protected function findModel($id)
    {
        if (($model = Loans::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
