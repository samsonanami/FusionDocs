<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "expenses".
 *
 * @property int $exp_id
 * @property string $exp_name
 * @property string $exp_details
 * @property string $exp_amt
 */
class Expenses extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'expenses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['exp_name', 'exp_details', 'exp_amt'], 'required'],
            [['exp_details'], 'string'],
            [['exp_amt'], 'number'],
            [['exp_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'exp_id' => 'Exp ID',
            'exp_name' => 'Exp Name',
            'exp_details' => 'Exp Details',
            'exp_amt' => 'Exp Amt',
        ];
    }
}
