<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "savings".
 *
 * @property int $svg_id
 * @property string $svg_account_name
 * @property int $svg_account_number
 * @property string $svg_product_name
 * @property string $svg_bal
 * @property string $svg_mobile
 * @property string $svg_city
 * @property string $svg_last_transaction
 * @property string $svg_status
 * @property string $svg_reference
 * @property string $svg_date
 * @property string $created_by
 *
 * @property Customers $svgAccountNumber
 */
class Savings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'savings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['svg_account_number', 'svg_transacted_by','svg_reference'], 'required'],
            [['svg_account_number','svg_id_no'], 'integer'],
            [['svg_bal'], 'number'],
            [['svg_date'], 'safe'],
            [['svg_account_name', 'svg_product_name','svg_transacted_by', 'svg_phone_no','svg_account_unique_number'], 'string', 'max' => 200],
            [['svg_mobile'], 'string', 'max' => 20],
            [['svg_city', 'svg_last_transaction'], 'string', 'max' => 60],
            [['svg_status'], 'string', 'max' => 30],
            [['svg_reference'], 'string', 'max' => 300],
            [['created_by'], 'string', 'max' => 100],
            [['svg_account_number'], 'exist', 'skipOnError' => true, 'targetClass' => Customers::className(), 'targetAttribute' => ['svg_account_number' => 'ACCOUNT_NO']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'svg_id' => 'Svg ID',
            'svg_account_name' => 'Svg Account Name',
            'svg_account_number' => 'Svg Account Number',
            'svg_product_name' => 'Svg Product Name',
            'svg_bal' => 'Amount (Ksh)',
            'svg_mobile' => 'Svg Mobile',
            'svg_city' => 'Svg City',
            'svg_last_transaction' => 'Svg Last Transaction',
            'svg_status' => 'Svg Status',
            'svg_reference' => 'M-Pesa/Bank Reference',
            'svg_date' => 'Svg Date',
            'created_by' => 'Created By',
            'svg_id_no' => 'Depositing ID Number',
            'svg_transacted_by' => 'Full Name',
            'svg_phone_no' => 'Depositing Phone Number'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSvgAccountNumber()
    {
        return $this->hasOne(Customers::className(), ['ACCOUNT_NO' => 'svg_account_number']);
    }
}
