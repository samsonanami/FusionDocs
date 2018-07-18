<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\OmDocuments;

/**
 * OmDocumentsSearch represents the model behind the search form of `app\models\OmDocuments`.
 */
class OmDocumentsSearch extends OmDocuments
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['doc_id', 'dir_id'], 'integer'],
            [['short_title', 'title', 'categoty', 'type', 'keyword', 'note', 'created_by', 'doc_link', 'date_created'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = OmDocuments::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'doc_id' => $this->doc_id,
            'dir_id' => $this->dir_id,
            'date_created' => $this->date_created,
        ]);

        $query->andFilterWhere(['like', 'short_title', $this->short_title])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'categoty', $this->categoty])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'keyword', $this->keyword])
            ->andFilterWhere(['like', 'note', $this->note])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'doc_link', $this->doc_link]);

        return $dataProvider;
    }
}
