<?php

namespace backend\controllers;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Loanschedule;

/**
 * LoanscheduleSearch represents the model behind the search form of `backend\models\Loanschedule`.
 */
class LoanscheduleSearch extends Loanschedule
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sch_id', 'sch_ln_id'], 'integer'],
            [['sch_date', 'sch_desc'], 'safe'],
            [['sch_principal', 'sch_interest', 'sch_fee', 'sch_penalty_amount', 'sch_due_amt'], 'number'],
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
        $query = Loanschedule::find();

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
            'sch_id' => $this->sch_id,
            'sch_principal' => $this->sch_principal,
            'sch_interest' => $this->sch_interest,
            'sch_fee' => $this->sch_fee,
            'sch_penalty_amount' => $this->sch_penalty_amount,
            'sch_due_amt' => $this->sch_due_amt,
            'sch_ln_id' => $this->sch_ln_id,
        ]);

        $query->andFilterWhere(['like', 'sch_date', $this->sch_date])
            ->andFilterWhere(['like', 'sch_desc', $this->sch_desc]);

            $query->andFilterWhere(['like', 'sch_date', $this->sch_date])
            ->andFilterWhere(['like', 'sch_desc', $this->sch_desc]);

        return $dataProvider;
    }
}
