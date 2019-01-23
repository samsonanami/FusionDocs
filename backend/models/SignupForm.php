<?php
namespace backend\models;

use yii\base\Model;
use common\models\User;
use yii\web\UploadedFile;
use backend\models\AuthAssignment;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $first_name;
    public $last_name;
    public $username;
    public $email;
    public $password;
    public $password_repeat;
    public $phone;
    public $image_link;
    public $file;
    public $permissions;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['first_name', 'trim'],
            ['first_name', 'required'],
            ['first_name', 'string', 'min' => 2, 'max' => 255],

            ['last_name', 'trim'],
            ['last_name', 'required'],
            ['last_name', 'string', 'min' => 2, 'max' => 255],

            ['phone', 'required'],
            ['phone', 'string', 'min' => 10, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password','required'],
            ['password_repeat', 'required'],
            ['password', 'string', 'min' => 6],
            ['password_repeat','string', 'min' => 6],

            ['password_repeat', 'compare', 'compareAttribute'=>'password', 'message'=>"Passwords don't match" ],
            ['file', 'file'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->last_name = $this->last_name;
        $user->phone = $this->phone;
        $user->setPassword($this->password);
        $user->generateAuthKey();

        $code = mt_rand(100000,999999); 
        $imageName = $user->username;
        // if($model->save()){
            $this->file = UploadedFile::getInstance($this,'file');
            if ($this->file && $this->validate()) {                
                $this->file->saveAs('uploads/users/'.$code.$imageName.'.'.$this->file->extension);
                $user->image_link = 'uploads/users/'.$code.$imageName.'.'.$this->file->extension;
            }

        //Adding permissions
        // $permissionList = $_POST 

        
        return $user->save() ? $user : null;
    }
}
