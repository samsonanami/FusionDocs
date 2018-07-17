<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "om_document_category".
 *
 * @property int $cat_id
 * @property string $cat_name
 * @property string $cat_desc
 * @property string $created_by
 * @property string $created_date
 */
class OmDocumentCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'om_document_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cat_name', 'cat_desc', 'created_by'], 'required'],
            [['created_date'], 'safe'],
            [['cat_name', 'created_by'], 'string', 'max' => 50],
            [['cat_desc'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cat_id' => 'Cat ID',
            'cat_name' => 'Cat Name',
            'cat_desc' => 'Cat Desc',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
        ];
    }
}
