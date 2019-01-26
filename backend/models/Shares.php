<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "shares".
 *
 * @property int $shr_id
 * @property int $shr_cust_id
 * @property string $shr_account_name
 * @property string $shr_account_no
 * @property string $shr_amount
 * @property string $shr_mobile
 * @property string $shr_created_at
 * @property string $shr_created_by
 * @property string $shr_last_updated
 *
 * @property Customers $shrCust
 */
class Shares extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shares';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['shr_cust_id', 'shr_account_name', 'shr_account_no', 'shr_amount', 'shr_mobile','shr_date'], 'required'],
            [['shr_cust_id'], 'integer'],
            [['shr_amount'], 'number'],
            [['shr_created_at', 'shr_last_updated'], 'safe'],
            [['shr_account_name', 'shr_account_no', 'shr_created_by','shr_date'], 'string', 'max' => 255],
            [['shr_mobile'], 'string', 'max' => 15],
            [['shr_cust_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customers::className(), 'targetAttribute' => ['shr_cust_id' => 'ACCOUNT_NO']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'shr_id' => 'Shr ID',
            'shr_cust_id' => 'Shr Cust ID',
            'shr_account_name' => 'Shr Account Name',
            'shr_account_no' => 'Shr Account No',
            'shr_amount' => 'Shr Amount',
            'shr_mobile' => 'Shr Mobile',
            'shr_created_at' => 'Shr Created At',
            'shr_created_by' => 'Shr Created By',
            'shr_last_updated' => 'Shr Last Updated',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShrCust()
    {
        return $this->hasOne(Customers::className(), ['ACCOUNT_NO' => 'shr_cust_id']);
    }
}
