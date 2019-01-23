<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property int $com_id
 * @property string $com_name
 * @property string $com_address
 * @property string $com_phone
 * @property string $com_email
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['com_name', 'com_address', 'com_phone', 'com_email'], 'required'],
            [['com_address'], 'string'],
            [['com_name'], 'string', 'max' => 100],
            [['com_phone', 'com_email'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'com_id' => 'Com ID',
            'com_name' => 'Com Name',
            'com_address' => 'Com Address',
            'com_phone' => 'Com Phone',
            'com_email' => 'Com Email',
        ];
    }
}
