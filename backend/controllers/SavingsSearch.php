<?php

namespace backend\controllers;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Savings;

/**
 * SavingsSearch represents the model behind the search form of `backend\models\Savings`.
 */
class SavingsSearch extends Savings
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['svg_id', 'svg_account_number'], 'integer'],
            [['svg_account_name', 'svg_product_name', 'svg_mobile', 'svg_city', 'svg_last_transaction', 'svg_status', 'svg_reference', 'svg_date', 'created_by'], 'safe'],
            [['svg_bal'], 'number'],
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
        $query = Savings::find();

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
            'svg_id' => $this->svg_id,
            'svg_account_number' => $this->svg_account_number,
            'svg_bal' => $this->svg_bal,
            'svg_date' => $this->svg_date,
        ]);

        $query->andFilterWhere(['like', 'svg_account_name', $this->svg_account_name])
            ->andFilterWhere(['like', 'svg_product_name', $this->svg_product_name])
            ->andFilterWhere(['like', 'svg_mobile', $this->svg_mobile])
            ->andFilterWhere(['like', 'svg_city', $this->svg_city])
            ->andFilterWhere(['like', 'svg_last_transaction', $this->svg_last_transaction])
            ->andFilterWhere(['like', 'svg_status', $this->svg_status])
            ->andFilterWhere(['like', 'svg_reference', $this->svg_reference])
            ->andFilterWhere(['like', 'created_by', $this->created_by]);

        return $dataProvider;
    }
}
