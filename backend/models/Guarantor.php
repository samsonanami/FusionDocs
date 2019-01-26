<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "guarantor".
 *
 * @property int $grt_id
 * @property int $grt_ln_id
 * @property int $grt_member_id
 * @property string $grt_amount
 * @property int $grt_lnp_id
 * @property string $grt_created_at
 */
class Guarantor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'guarantor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['grt_ln_id', 'grt_member_id', 'grt_amount', 'grt_lnp_id', 'grt_created_at'], 'required'],
            [['grt_ln_id', 'grt_member_id', 'grt_lnp_id'], 'integer'],
            [['grt_amount'], 'number'],
            [['grt_created_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'grt_id' => 'Grt ID',
            'grt_ln_id' => 'Grt Ln ID',
            'grt_member_id' => 'Grt Member ID',
            'grt_amount' => 'Grt Amount',
            'grt_lnp_id' => 'Grt Lnp ID',
            'grt_created_at' => 'Grt Created At',
        ];
    }
}
