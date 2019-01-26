<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "loanproducts".
 *
 * @property int $lnp_id
 * @property string $lnp_name
 * @property string $lnp_desc
 * @property int $lnp_min_interest
 * @property string $lnp_min_interest_desc
 * @property int $lnp_max_interest
 * @property string $lnp_max_interest_desc
 * @property int $lnp_min_duration
 * @property string $lnp_min_duration_desc
 * @property int $lnp_max_duration
 * @property string $lnp_max_duration_desc
 * @property int $lnp_repayment_daily
 * @property int $lnp_repayment_weekly
 * @property int $lnp_repayment_biweekly
 * @property int $lnp_repayment_monthly
 * @property int $lnp_min_processing_fee
 * @property int $lnp_max_processing_fee
 * @property string $lnp_min_insurance_fee
 * @property string $lnp_max_insurance_fee
 * @property int $lnp_min_no_of_repayments
 * @property int $lnp_max_no_of_repayments
 *
 * @property Loans[] $loans
 */
class Loanproducts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'loanproducts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lnp_min_interest', 'lnp_max_interest', 'lnp_min_duration', 'lnp_max_duration', 'lnp_repayment_daily', 'lnp_repayment_weekly', 'lnp_repayment_biweekly', 'lnp_repayment_monthly', 'lnp_min_processing_fee', 'lnp_max_processing_fee', 'lnp_min_no_of_repayments', 'lnp_max_no_of_repayments'], 'integer'],
            [['lnp_min_interest_desc', 'lnp_max_interest_desc', 'lnp_min_duration_desc', 'lnp_max_duration_desc'], 'required'],
            [['lnp_min_interest_desc', 'lnp_max_interest_desc', 'lnp_min_duration_desc', 'lnp_max_duration_desc'], 'string'],
            [['lnp_min_insurance_fee', 'lnp_max_insurance_fee','lnp_min_principal_amt','lnp_max_principal_amt'], 'number'],
            [['lnp_name', 'lnp_desc'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'lnp_id' => 'Code',
            'lnp_name' => 'Loan Product Name',
            'lnp_desc' => 'Description',
            'lnp_min_principal_amt' => 'Minimum Principal Amount',
            'lnp_max_principal_amt' => 'Maximum Principal Amount',
            'lnp_min_interest' => 'Minimum Interest %',
            'lnp_min_interest_desc' => '',
            'lnp_max_interest' => 'Maximum Interest %',
            'lnp_max_interest_desc' => '',
            'lnp_min_duration' => 'Minimum Duration',
            'lnp_min_duration_desc' => '',
            'lnp_max_duration' => 'Maximum Duration',
            'lnp_max_duration_desc' => '',
            'lnp_repayment_daily' => 'Daily',
            'lnp_repayment_weekly' => 'Weekly',
            'lnp_repayment_biweekly' => 'Biweekly',
            'lnp_repayment_monthly' => 'Monthly',
            'lnp_min_processing_fee' => 'Minimum Processing Fee',
            'lnp_max_processing_fee' => 'Maximum Processing Fee',
            'lnp_min_insurance_fee' => 'Minimum Insurance Fee',
            'lnp_max_insurance_fee' => 'Maximum Insurance Fee',
            'lnp_min_no_of_repayments' => 'Minimum Number of Repayments',
            'lnp_max_no_of_repayments' => 'Maximum Numbber of Repayments',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoans()
    {
        return $this->hasMany(Loans::className(), ['lnp_id' => 'lnp_id']);
    }
}
