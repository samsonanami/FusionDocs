<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use backend\models\SignupForm;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use backend\models\AuthItem;

use backend\models\User;
use backend\models\OmDocumentsSearch;



class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                // 'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                   [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['logout', 'admin'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {

        $this->layout='main';
         if(Yii::$app->user->can('view-dashboard')){
            Yii::$app->getSession()->setFlash('info', 'Successful login! Welcome Home');
            return $this->render('index', []);
        }else{
           throw new ForbiddenHttpException(Yii::t('yii', 'You are not allowed to perform this action.'));
        }
        
//         Yii::$app->mailer->compose()
//         ->setFrom("maithyaknife@gmail.com")
//         ->setTo("samsonanami@gmail.com")
//         ->setSubject("Test")
//         ->setTextBody("Welcome")
//         ->send();
       
    }
    public function actionAdmin()
    {
        $this->layout='main';
         if(Yii::$app->user->can('view-admin-dashboard')){
            return $this->render('admin', []);
        }else{
           throw new ForbiddenHttpException(Yii::t('yii', 'You are not allowed to perform this action.'));
        }
       
    }
   
    public function actionSignup()
    {
        $this->layout='main';
        $model = new SignupForm();
        $authItems = AuthItem::find()->all();
            if ($model->load(Yii::$app->request->post())) {
                if ($user = $model->signup()) {
                return $this->redirect(['user/index']);
            }
            // if ($user = $model->signup()) {
            //     if (Yii::$app->getUser()->login($user)) {
            //         return $this->goHome();
            //     }
            // }
        }
        return $this->render('signup',[
            'model'=>$model,
            'authItems'=>$authItems,
        ]);
    }
    public function actionUsercreate()
    {
        $this->layout='main';
        if(Yii::$app->user->can('create-user')){
            return $this->render('user/create');
        }else{
            throw new FobiddenHttpException;
        }
    }

    public function actionLogin()
    {
        $this->layout='login';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


}
