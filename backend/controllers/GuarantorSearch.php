<?php

namespace backend\controllers;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Guarantor;

/**
 * GuarantorSearch represents the model behind the search form of `app\models\Guarantor`.
 */
class GuarantorSearch extends Guarantor
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['grt_id', 'grt_ln_id', 'grt_member_id', 'grt_created_by', 'grt_last_updated'], 'integer'],
            [['grt_amount'], 'number'],
            [['grt_created_at'], 'safe'],
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
        $query = Guarantor::find();

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
            'grt_id' => $this->grt_id,
            'grt_ln_id' => $this->grt_ln_id,
            'grt_member_id' => $this->grt_member_id,
            'grt_amount' => $this->grt_amount,
            'grt_created_at' => $this->grt_created_at,
            'grt_created_by' => $this->grt_created_by,
            'grt_last_updated' => $this->grt_last_updated,
        ]);

        return $dataProvider;
    }
}
