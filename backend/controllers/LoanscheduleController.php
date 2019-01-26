<?php

namespace backend\controllers;

use Yii;
use backend\models\Loanschedule;
use backend\controllers\LoanscheduleSearchfrom;
use backend\models\Company;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;
use yii\data\ActiveDataProvider;

use backend\models\Loans;

/**
 * LoanscheduleController implements the CRUD actions for Loanschedule model.
 */
class LoanscheduleController extends Controller
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
        $searchModel = new LoanscheduleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Loanschedule model.
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
     * Creates a new Loanschedule model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Loanschedule();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->sch_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
    public function actionPay($id)
    {
        $model = $this->findModel($id);

        // if ($model->load(Yii::$app->request->post())){
            // $modelFacturas = Facturas::find()
            //   ->(['your_id_fatcuras' => $model->your_id_facturas ])->one();
            $model->sch_status=1; 	 
            $model->sch_paid_by=Yii::$app->user->identity->username;
            $model->save();
            return $this->redirect(['customers/index']);
        //  } 
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->sch_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Loanschedule model.
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

    public function actionRptcollection()
    {

        $modelCompany = Company::findOne(1);
        $searchModel = new LoanscheduleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination  = false;

        return $this->render('reports', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'modelCompany' =>$modelCompany,
        ]);
    }

  
 public function actionDownload()
    {

        $pdf_content ='Hello';

        $mpdf = new mPDF();
        $mpdf->WriteHTML($pdf_content);
        $mpdf->Output();
        exit();
    }
   
    protected function findModel($id)
    {
        if (($model = Loanschedule::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


public function actionReportpdf($from,$to) {
    $modelCompany = Company::findOne(1);
    $searchModel = new LoanscheduleSearch();
    // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
     $query = Loanschedule::find();
     // $dataProvider->pagination  = false;
    
    $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
    $query->andFilterWhere(['=', 'sch_status', 0]);
    $query->andFilterWhere(['between', 'sch_date',$from, $to]);

    // get your HTML raw content without any layouts or scripts
    $content = $this->renderPartial('reports_pdf', [
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
        'orientation' => Pdf::ORIENT_PORTRAIT, 
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
public function actionRptpastmaturity($from)
{
    $modelCompany = Company::findOne(1);
    $searchModel = new LoanscheduleSearchfrom();
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    $dataProvider->pagination  = false;
    $query = Loanschedule::find();
    $dataProvider = new ActiveDataProvider([
        'query' => $query,
    ]);
    $query->andFilterWhere(['=', 'sch_status', 0]);
    $query->andFilterWhere(['<', 'sch_date',$from]);

    return $this->render('reports_past_maturity', [
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
        'modelCompany' =>$modelCompany,
    ]);
}

public function actionRptpastmaturitypdf($from) {
$modelCompany = Company::findOne(1);
$searchModel = new LoanscheduleSearchfrom();
// $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
 $query = Loanschedule::find();
 // $dataProvider->pagination  = false;

$dataProvider = new ActiveDataProvider([
        'query' => $query,
    ]);
$query->andFilterWhere(['=', 'sch_status', 0]);
$query->andFilterWhere(['<', 'sch_date',$from]);

// get your HTML raw content without any layouts or scripts
$content = $this->renderPartial('reports_past_maturity_pdf', [
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
    'orientation' => Pdf::ORIENT_PORTRAIT, 
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
}
