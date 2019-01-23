<?php

namespace backend\controllers;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Groups;

/**
 * GroupsSearch represents the model behind the search form of `backend\models\Groups`.
 */
class GroupsSearch extends Groups
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['grp_id', 'grp_leader_id'], 'integer'],
            [['grp_name'], 'safe'],
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
        $query = Groups::find();

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
            'grp_id' => $this->grp_id,
            'grp_leader_id' => $this->grp_leader_id,
        ]);

        $query->andFilterWhere(['like', 'grp_name', $this->grp_name]);

        return $dataProvider;
    }
}
