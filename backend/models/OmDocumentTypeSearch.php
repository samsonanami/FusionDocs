<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\OmDocumentType;

/**
 * OmDocumentTypeSearch represents the model behind the search form of `app\models\OmDocumentType`.
 */
class OmDocumentTypeSearch extends OmDocumentType
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type_id', 'type_no'], 'integer'],
            [['type_name', 'type_desc', 'created_by', 'date_created'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = OmDocumentType::find();

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
            'type_id' => $this->type_id,
            'type_no' => $this->type_no,
            'date_created' => $this->date_created,
        ]);

        $query->andFilterWhere(['like', 'type_name', $this->type_name])
            ->andFilterWhere(['like', 'type_desc', $this->type_desc])
            ->andFilterWhere(['like', 'created_by', $this->created_by]);

        return $dataProvider;
    }
}
