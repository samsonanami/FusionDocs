<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "om_documents".
 *
 * @property int $doc_id
 * @property string $short_title
 * @property string $title
 * @property string $categoty
 * @property string $type
 * @property string $keyword
 * @property string $note
 * @property string $created_by
 * @property string $doc_link
 * @property string $date_created
 */
class OmDocuments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $attachment;
    public $path = 'uploads/';
    
    public static function tableName()
    {
        return 'om_documents';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dir_id','short_title', 'dir_id','title','doc_link', 'attachment'], 'required'],
            [['doc_link'], 'string'],
            [['date_created'], 'safe'],
            [['short_title', 'categoty', 'type'], 'string', 'max' => 50],
            [['title', 'keyword', 'note', 'created_by'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'doc_id' => 'Doc ID',
            'title' => 'Title',
            'categoty' => 'Categoty',
            'type' => 'Type',
            'keyword' => 'Keyword',
            'note' => 'Note',
            'created_by' => 'Created By',
            'doc_link' => 'Doc Link',
            'attachment' => 'Upload your document here',
            'date_created' => 'Date Created',
        ];
    }
}
