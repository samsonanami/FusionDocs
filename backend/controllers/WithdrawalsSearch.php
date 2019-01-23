<?php

namespace backend\controllers;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Withdrawals;

/**
 * WithdrawalsSearch represents the model behind the search form of `backend\models\Withdrawals`.
 */
class WithdrawalsSearch extends Withdrawals
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['wth_id'], 'integer'],
            [['wth_acc_no', 'wth_date', 'wth_transacted_by', 'wth_ref'], 'safe'],
            [['wth_amount'], 'number'],
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
        $query = Withdrawals::find();

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
            'wth_id' => $this->wth_id,
            'wth_amount' => $this->wth_amount,
            'wth_date' => $this->wth_date,
        ]);

        $query->andFilterWhere(['like', 'wth_acc_no', $this->wth_acc_no])
            ->andFilterWhere(['like', 'wth_transacted_by', $this->wth_transacted_by])
            ->andFilterWhere(['like', 'wth_ref', $this->wth_ref]);

        return $dataProvider;
    }
}
