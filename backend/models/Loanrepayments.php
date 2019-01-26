<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "loanrepayments".
 *
 * @property int $lnrp_id
 * @property int $lnrp_ln_id
 * @property string $lnrp_payment_method
 * @property string $lnrp_collected_by
 * @property string $lnrp_collection_date
 * @property string $lnrp_paid_amount
 * @property string $lnrp_principal
 * @property string $lnrp_balance
 * @property string $lnrp_extra_payment
 *
 * @property Loans $lnrpLn
 */
class Loanrepayments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'loanrepayments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lnrp_payment_method', 'lnrp_paid_amount'], 'required'],
            [['lnrp_ln_id'], 'integer'],
            [['lnrp_payment_method','lnrp_reference'], 'string'],
            [['lnrp_collection_date'], 'safe'],
            [['lnrp_paid_amount', 'lnrp_principal', 'lnrp_balance', 'lnrp_extra_payment'], 'number'],
            [['lnrp_collected_by'], 'string', 'max' => 50],
            [['lnrp_ln_id'], 'exist', 'skipOnError' => true, 'targetClass' => Loans::className(), 'targetAttribute' => ['lnrp_ln_id' => 'ln_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'lnrp_id' => 'Lnrp ID',
            'lnrp_ln_id' => 'LOAN ID',
            'lnrp_payment_method' => 'MODE OF PAYMENT',
            'lnrp_collected_by' => 'COLLECTED BYy',
            'lnrp_collection_date' => 'COLLECTED DATE',
            'lnrp_paid_amount' => 'PAID AMOUNT',
            'lnrp_principal' => 'LOAN PRINCIPAL AMT',
            'lnrp_balance' => 'LOAN BALANCE',
            'lnrp_extra_payment' => 'EXTRA PAYMENT',
            'lnrp_reference' => 'REFERENCE CODE',
            
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLnrpLn()
    {
        return $this->hasOne(Loans::className(), ['ln_id' => 'lnrp_ln_id']);
    }
}
