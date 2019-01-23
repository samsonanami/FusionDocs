<?php

namespace backend\controllers;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Loanschedule;

class LoanscheduleSearch extends Loanschedule
{
    public $sch_from_date;
    public $sch_to_date;
    public function rules()
    {
        return [
            [['sch_id', 'sch_ln_id'], 'integer'],
            [['sch_date', 'sch_desc'], 'safe'],
            [['sch_from_date', 'sch_to_date', ], 'safe'],
            [['sch_principal', 'sch_interest', 'sch_fee', 'sch_penalty_amount', 'sch_due_amt'], 'number'],
        ];
    }
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

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

        // $query->andFilterWhere(['=', 'sch_status', 0]);
        $query->andFilterWhere(['between', 'sch_date', $this->sch_from_date, $this->sch_to_date]);
        // $query->andFilterWhere(['<', 'sch_date', $this->sch_from_date]);
        // $query->andFilterWhere(['<=', 'sch_date', $this->sch_to_date]);

        return $dataProvider;
    }
}
