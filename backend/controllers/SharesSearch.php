<?php

namespace backend\controllers;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Shares;

/**
 * SharesSearch represents the model behind the search form of `app\models\Shares`.
 */
class SharesSearch extends Shares
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['shr_id', 'shr_cust_id'], 'integer'],
            [['shr_account_name', 'shr_account_no', 'shr_mobile', 'shr_created_at', 'shr_created_by', 'shr_last_updated'], 'safe'],
            [['shr_amount'], 'number'],
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
        $query = Shares::find();

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
            'shr_id' => $this->shr_id,
            'shr_cust_id' => $this->shr_cust_id,
            'shr_amount' => $this->shr_amount,
            'shr_created_at' => $this->shr_created_at,
            'shr_last_updated' => $this->shr_last_updated,
        ]);

        $query->andFilterWhere(['like', 'shr_account_name', $this->shr_account_name])
            ->andFilterWhere(['like', 'shr_account_no', $this->shr_account_no])
            ->andFilterWhere(['like', 'shr_mobile', $this->shr_mobile])
            ->andFilterWhere(['like', 'shr_created_by', $this->shr_created_by]);

        return $dataProvider;
    }
}
