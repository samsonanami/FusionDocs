<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "withdrawals".
 *
 * @property int $wth_id
 * @property string $wth_acc_no
 * @property string $wth_amount
 * @property string $wth_date
 * @property string $wth_transacted_by
 * @property string $wth_ref
 */
class Withdrawals extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'withdrawals';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['wth_acc_no', 'wth_amount', 'wth_transacted_by', 'wth_ref'], 'required'],
            [['wth_amount'], 'number'],
            [['wth_date'], 'safe'],
            [['wth_acc_no', 'wth_transacted_by', 'wth_ref'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'wth_id' => 'Wth ID',
            'wth_acc_no' => 'Wth Acc No',
            'wth_amount' => 'Wth Amount',
            'wth_date' => 'Wth Date',
            'wth_transacted_by' => 'Wth Transacted By',
            'wth_ref' => 'Wth Ref',
        ];
    }
}
