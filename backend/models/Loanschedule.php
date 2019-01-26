<?php

namespace backend\models;

use Yii;


$time = time();
$date = "20" . date('y-m-d', $time);

class Loanschedule extends \yii\db\ActiveRecord
{
    public $sch_from_date;
    public $sch_to_date;
        
    public static function tableName()
    {
        return 'loanschedule';
    }

    public function rules()
    {
        return [
            [['sch_date', 'sch_principal', 'sch_interest', 'sch_penalty_amount', 'sch_due_amt', 'sch_desc', 'sch_ln_id', 'sch_from_date', 'sch_to_date',], 'required'],
            [['sch_principal', 'sch_interest', 'sch_fee', 'sch_penalty_amount', 'sch_due_amt'], 'number'],
            [['sch_ln_id'], 'integer'],
            [['sch_date','sch_paid_by'], 'string', 'max' => 20],
            [['sch_desc'], 'string', 'max' => 60],
            [['sch_from_date', 'sch_to_date', ], 'date'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'sch_id' => 'Sch ID',
            'sch_date' => 'Sch Date',
            'sch_principal' => 'Sch Principal',
            'sch_interest' => 'Sch Interest',
            'sch_fee' => 'Sch Fee',
            'sch_penalty_amount' => 'Sch Penalty Amount',
            'sch_due_amt' => 'Sch Due Amt',
            'sch_desc' => 'Sch Desc',
            'sch_ln_id' => 'Sch Ln ID',
        ];
    }
    public function getLnLoan()
    {
        return $this->hasOne(Loans::className(), ['ln_id' => 'sch_ln_id']);
    }
}
