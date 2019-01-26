<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "groups".
 *
 * @property int $grp_id
 * @property string $grp_name
 * @property int $grp_leader_id
 * @property int $grp_usr_id
 *
 * @property Customers[] $customers
 * @property User $grpUsr
 * @property Customers $grpLeader
 */
class Groups extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'groups';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['grp_name','grp_leader_id'], 'required'],
            [['grp_leader_id'], 'integer'],
            [['grp_name'], 'string', 'max' => 200],
            ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'grp_id' => 'GROUP NUMBER',
            'grp_name' => 'GROUP NAME',
            'grp_leader_id' => 'GROUP LEADER ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomers()
    {
        return $this->hasMany(Customers::className(), ['cust_grp_id' => 'grp_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrpLeader()
    {
        return $this->hasOne(Customers::className(), ['ACCOUNT_NO' => 'grp_leader_id']);
    }
}
