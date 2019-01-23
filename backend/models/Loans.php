<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "loans".
 *
 * @property int $ln_id
 * @property int $lnp_id
 * @property string $ln_name
 * @property int $ln_customer_id
 * @property string $ln_released
 * @property string $ln_maturity
 * @property string $ln_repayment
 * @property int $ln_repayment_count
 * @property int $ln_principal
 * @property int $ln_interest
 * @property int $ln_interest_per
 * @property string $ln_interest_time
 * @property int $ln_fees
 * @property int $ln_penalty
 * @property string $ln_due
 * @property int $ln_paid
 * @property int $ln_balance
 * @property int $ln_status
 * @property int $ln_application_status
 * @property string $ln_description
 * @property int $ln_processing_fee_perc
 * @property int $ln_processing_fee
 * @property int $ln_insurance_fee
 * @property string $ln_loan_files
 * @property int $ln_duration
 * @property string $ln_duration_desc
 *
 * @property Collateral[] $collaterals
 * @property Files[] $files
 * @property Loanrepayments[] $loanrepayments
 * @property Loanproducts $lnp
 * @property Customers $lnCustomer
 */
class Loans extends \yii\db\ActiveRecord
{
    public $ln_approved_by;
    public static function tableName()
    {
        return 'loans';
    }

    
    public function rules()
    {
        return [
            [['lnp_id'], 'required'],
            [['lnp_id', 'ln_customer_id', 'ln_repayment_count', 'ln_principal', 'ln_interest', 'ln_interest_per', 'ln_fees', 'ln_penalty', 'ln_paid', 'ln_balance', 'ln_status', 'ln_application_status', 'ln_processing_fee_perc', 'ln_processing_fee', 'ln_insurance_fee', 'ln_duration'], 'integer'],
            [['ln_released', 'ln_maturity', 'ln_due'], 'safe'],
            [['ln_repayment', 'ln_interest_time', 'ln_description', 'ln_duration_desc','ln_approved_by'], 'string'],
            [['ln_name'], 'string', 'max' => 200],
            [['ln_loan_files'], 'string', 'max' => 300],
            [['lnp_id'], 'exist', 'skipOnError' => true, 'targetClass' => Loanproducts::className(), 'targetAttribute' => ['lnp_id' => 'lnp_id']],
            [['ln_customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customers::className(), 'targetAttribute' => ['ln_customer_id' => 'ACCOUNT_NO']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ln_id' => 'LOAN NO',
            'lnp_id' => 'LOAN PRODUCT ID',
            'ln_name' => 'LONE NAME',
            'ln_customer_id' => 'CUSTOMER ID',
            'ln_released' => 'RELEASED',
            'ln_maturity' => 'MATURITY DATE',
            'ln_repayment' => 'REPAYMENT CYCLE',
            'ln_repayment_count' => 'REPAYMENT COUNT',
            'ln_principal' => 'PRINCIPAL AMT',
            'ln_interest' => 'INTEREST AMT',
            'ln_interest_per' => 'INTEREST %',
            'ln_interest_time' => 'INTEREST DURATION',
            'ln_fees' => 'FEES AMT',
            'ln_penalty' => 'PENALTY AMT',
            'ln_due' => 'DUE AMT',
            'ln_paid' => 'PAID AMT',
            'ln_balance' => 'BALANCE AMT',
            'ln_status' => 'STATUS',
            'ln_application_status' => 'APPLICATION STATUS',
            'ln_description' => 'DETAILS',
            'ln_processing_fee_perc' => 'PROCESSING FEE %',
            'ln_processing_fee' => 'PROCESSING FEE AMT',
            'ln_insurance_fee' => 'INSURANCE FEE AMT',
            'ln_loan_files' => 'FILES / ATTACHMENTS',
            'ln_duration' => 'DURATION',
            'ln_duration_desc' => 'DURATION IN',
            'ln_approved_by'=>'APPROVED BY',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCollaterals()
    {
        return $this->hasMany(Collateral::className(), ['col_ln_id' => 'ln_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFiles()
    {
        return $this->hasMany(Files::className(), ['fle_ln_id' => 'ln_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoanrepayments()
    {
        return $this->hasMany(Loanrepayments::className(), ['lnrp_ln_id' => 'ln_id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLnp()
    {
        return $this->hasOne(Loanproducts::className(), ['lnp_id' => 'lnp_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLnCustomer()
    {
        return $this->hasOne(Customers::className(), ['ACCOUNT_NO' => 'ln_customer_id']);
    }
}
