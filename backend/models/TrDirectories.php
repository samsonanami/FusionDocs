<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tr_directories".
 *
 * @property int $dir_id
 * @property int $dir_parent_id
 * @property int $dir_level
 * @property string $dir_name
 * @property string $dir_date_created
 * @property string $dir_created_by
 */
class TrDirectories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tr_directories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dir_parent_id', 'dir_level', 'dir_name', 'dir_created_by'], 'required'],
            [['dir_parent_id', 'dir_level'], 'integer'],
            [['dir_name'], 'string', 'max' => 300],
            [['dir_created_by'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'dir_id' => 'Dir ID',
            'dir_parent_id' => 'Dir Parent ID',
            'dir_level' => 'Dir Level',
            'dir_name' => 'Dir Name',
            'dir_created_by' => 'Dir Created By',
        ];
    }
}
