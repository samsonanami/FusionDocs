<?php

namespace backend\models;
 
use Yii;

namespace backend\models;
 
use Yii;
 
class Product extends \kartik\tree\models\Tree
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }    
    
    /**
     * Override isDisabled method if you need as shown in the  
     * example below. You can override similarly other methods
     * like isActive, isMovable etc.
     */
    public function isDisabled()
    {
        // if (Yii::$app->user->username !== 'admin') {
        //     return true;
        // }
        // return parent::isDisabled();
    }
}

?>