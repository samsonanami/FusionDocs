<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "om_user_logs".
 *
 * @property int $id
 * @property string $user
 * @property string $activity
 * @property string $date
 */
class OmUserLogs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'om_user_logs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user', 'activity'], 'required'],
            [['date'], 'safe'],
            [['user'], 'string', 'max' => 50],
            [['activity'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user' => 'User',
            'activity' => 'Activity',
            'date' => 'Date',
        ];
    }
}
