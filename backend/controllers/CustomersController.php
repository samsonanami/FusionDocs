<?php

namespace backend\controllers;

use Yii;
use kartik\mpdf\Pdf;

use yii\base\Model;
use backend\models\Loans;
use backend\models\Savings;
use backend\controllers\SavingsSearch;
use backend\models\Loanproducts;
use backend\models\Customers;
use backend\controllers\CustomersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * CustomersController implements the CRUD actions for Customers model.
 */
class CustomersController extends Controller
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
     * Lists all Customers models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CustomersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        $searchModel = new LoansSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionReport($id) {
         $searchModel = new LoansSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
    // get your HTML raw content without any layouts or scripts
    $content = $this->renderPartial('view-pdf', [
            'model' => $this->findModel($id),
            'dataProvider' => $dataProvider,
        ]);
    
    // setup kartik\mpdf\Pdf component
    $pdf = new Pdf([
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
        'options' => ['title' => 'Krajee Report Title'],
         // call mPDF methods on the fly
        'methods' => [ 
            'SetHeader'=>['Krajee Report Header'], 
            'SetFooter'=>['{PAGENO}'],
        ]
    ]);
    
    // return the pdf output as per the destinaddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddtion setting
    return $pdf->render(); 
}
    public function actionGenPdf($id)
    {
        $searchModel = new LoansSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        $pdf_content = $this->render('view-pdf', [
            'model' => $this->findModel($id),
            'dataProvider' => $dataProvider,
        ]);

            $mpdf = new mPDF();
            $mpdf->WriteHtml($pdf_content);
            $mpdf->Output();
            exit();
    }

    public function actionViewloans($id)
    {
        $modelCustomer = Customers::findOne($id);
        $searchModel = new LoansSearch();
        $searchModel->ln_customer_id = $modelCustomer->ACCOUNT_NO;
        $dataProvider=$searchModel->search(Yii::$app->request->queryParams);
        return $this->render('viewloans', [
            'modelLoans' => $this->findModel($id),  
            'modelCustomer' => $modelCustomer,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionViewsavings($id)
    {
        $modelCustomer = Customers::findOne($id);
        $searchModel = new SavingsSearch();
        $searchModel->svg_account_number = $modelCustomer->ACCOUNT_NO;
        $dataProvider=$searchModel->search(Yii::$app->request->queryParams);
        return $this->render('viewsavings', [
            'modelLoans' => $this->findModel($id),  
            'modelCustomer' => $modelCustomer,
            'dataProvider' => $dataProvider,
        ]);

    }
    public function actionAddloan($id)
    {
        $model = new Customers();
        $loan=new Loans();
        $loanproduct=new Loanproducts();
        // $loan->scenario = 'create';
        // $loanproduct->scenario = 'create';
        
        if ($loan->load(Yii::$app->request->post()) && $loanproduct->load(Yii::$app->request->post())) {
            $isValid = $loan->validate();
            $isValid = $loanproduct->validate() && $isValid;
            if ($isValid) {
                $loan->save(false);
                $loanproduct->save(false);
                return $this->redirect(['loans/view', 'id' => $id]);
            }
        }
        
        return $this->render('addloan', [
            'model' => $model,
            'loan' => $loan,
            'loanproduct' => $loanproduct,
        ]);
    }

    /**
     * Creates a new Customers model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Customers();
        if ($model->load(Yii::$app->request->post())) 
        {
            $code = mt_rand(100000,999999); 
            $imageName = $model->LAST_NAME;
            // if($model->save()){
                $model->file = UploadedFile::getInstance($model,'file');
                if ($model->file && $model->validate()) {                
                    $model->file->saveAs('uploads/customers/'.$code.$imageName.'.'.$model->file->extension);
                    $model->logo = 'uploads/customers/'.$code.$imageName.'.'.$model->file->extension;
                }

                $model->attachment = UploadedFile::getInstance($model,'attachment');
                if ($model->attachment && $model->validate()) {                
                    $model->attachment->saveAs('uploads/files/'.$code.$imageName.'.'.$model->file->extension);
                    $model->files = 'uploads/files/'.$code.$imageName.'.'.$model->file->extension;
                }
//                 $model->save();
//                 var_dump($model->getErrors());die();

                if($model->save()){
                    Yii::$app->getSession()->setFlash('success', 'Customer created successfuly');
                return $this->redirect(['view', 'id' => $model->ACCOUNT_NO]);
               };
            
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }
    public function actionAdd()
    {
        $model = new Loans();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['loans/view', 'id' => $model->ln_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Customers model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {
            $code = mt_rand(100000,999999); 
            $imageName = $model->LAST_NAME;
            // if($model->save()){
                $model->file = UploadedFile::getInstance($model,'file');
                if ($model->file && $model->validate()) {                
                    $model->file->saveAs('uploads/customers/'.$code.$imageName.'.'.$model->file->extension);
                    $model->logo = 'uploads/customers/'.$code.$imageName.'.'.$model->file->extension;
                }

                $model->attachment = UploadedFile::getInstance($model,'attachment');
                if ($model->attachment && $model->validate()) {                
                    $model->attachment->saveAs('uploads/files/'.$code.$imageName.'.'.$model->file->extension);
                    $model->files = 'uploads/files/'.$code.$imageName.'.'.$model->file->extension;
                }

               if($model->save()){
                return $this->redirect(['view', 'id' => $model->ACCOUNT_NO]);
               };
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['customers/index']);
    }
    protected function findModel($id)
    {
        // if (($modelLoans = Loanrepayments::findOne($id)) !== null && ($modelCustomer = Customers::findOne($id)) !== null) {
       if (($modelCustomer = Customers::findOne($id)) !== null) {
            return $modelCustomer;
            return $modelLoans;
        }
        if (($modelLoans = Loanrepayments::findOne($id)) !== null) {
            return $modelLoans;
        }
        // throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    protected function findModelLoan($id)
    {
        if (($modelLoans = Loans::findOne($id)) !== null) {
            return $modelLoans;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
