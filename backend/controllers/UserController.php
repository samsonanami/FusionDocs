<?php

namespace backend\controllers;

use Yii;
use backend\models\User;
use backend\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;
use yii\web\UploadedFile;
use backend\models\AuthItem;
use backend\models\AuthAssignment;


class UserController extends Controller
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {

        $this->layout='main';
        // if(Yii::$app->user->can('view-users'))
        // {
            $searchModel = new UserSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

             $dataProvider->setSort([
                'attributes' => [
                    'created_at' => [
                        'asc' => ['created_at' => SORT_ASC],
                        'desc' => ['created_at' => SORT_DESC],
                        'default' => SORT_DESC,
                    ],
                    // 'username' => [
                    //     'asc' => ['username' => SORT_ASC],
                    //     'desc' => ['username' => SORT_DESC],
                    //     'default' => SORT_ASC,
                    // ],
                ],
                'defaultOrder' => [
                    'created_at' => SORT_ASC
                ]
            ]);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        // } else{
        //     throw new ForbiddenHttpException;
        // }

           
    }

    public function actionView($id)
    {

        $this->layout='main';
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function beforeSave($insert) {
    if(isset($this->password_field)) 
        $this->password = Security::generatePasswordHash($this->password_field);
        return $this->password;
}

public function validatePassword($password)
{
    return Security::validatePassword($password, $this->password_hash);
}

    public function actionCreate()
    {
        // $password=>$model->password;
       
        $this->layout='main';
        // if(Yii::$app->user->can ('create-user')){
            $model = new User();
            $authItems = AuthItem::find()->all();

            if ($model->load(Yii::$app->request->post())) {
                $imageName = $model->username;
                $model->attachment = UploadedFile::getInstance($model,'attachment');
                $model->attachment->saveAs('uploads/users/'.$imageName.'.'.$model->attachment->extension);
                //save the path in the db column
                $model->image_link = 'uploads/users/'.$imageName.'.'.$model->attachment->extension;
                $model->updated_at = Yii::$app->user->identity->username;

                 $model->password_hash=Yii::$app->security->generatePasswordHash($model->password);

                 
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }
            return $this->render('create', [
                'model' => $model,
            ]);

        // }else{
        //     throw new ForbiddenHttpException;
        // }
        
    }
    public function actionUpdate($id)
    {
        
        $this->layout='main';
        $model = $this->findModel($id);
        $authItems = AuthItem::find()->all();

        if ($model->load(Yii::$app->request->post())) {
            // Adding permissions
            $permissionList = $_POST['User']['permissions'];
            
            foreach ($permissionList as $value)
            {
                $newPermission = new AuthAssignment;
                $newPermission->user_id=$model->id;
                $newPermission->item_name=$value;
                $newPermission->save();
            }

            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);

        }

        return $this->render('update', [
            'model' => $model,
            'authItems'=>$authItems,
        ]);
    }

    /**
     * Deletes an existing User model.
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

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
