<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "om_document_type".
 *
 * @property int $type_id
 * @property int $type_no
 * @property string $type_name
 * @property string $type_desc
 * @property string $created_by
 * @property string $date_created
 */
class OmDocumentType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'om_document_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type_no', 'type_name', 'type_desc', 'created_by'], 'required'],
            [['type_no'], 'integer'],
            [['date_created'], 'safe'],
            [['type_name'], 'string', 'max' => 200],
            [['type_desc'], 'string', 'max' => 300],
            [['created_by'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'type_id' => 'Type ID',
            'type_no' => 'Type No',
            'type_name' => 'Type Name',
            'type_desc' => 'Type Desc',
            'created_by' => 'Created By',
            'date_created' => 'Date Created',
        ];
    }
}
