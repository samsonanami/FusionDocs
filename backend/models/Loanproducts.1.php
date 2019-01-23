<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "loanproducts".
 *
 * @property int $lnp_id
 * @property string $lnp_name
 * @property string $lnp_desc
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
            [['lnp_name'], 'required'],
            [['lnp_name', 'lnp_desc'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'lnp_id' => 'LOAN PRODUCT #',
            'lnp_name' => 'PRODUCT NAME',
            'lnp_desc' => 'PRODUCT DESCRIPTION',
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
