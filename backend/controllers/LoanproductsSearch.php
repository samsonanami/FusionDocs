<?php

namespace backend\controllers;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Loanproducts;

/**
 * LoanproductsSearch represents the model behind the search form of `backend\models\Loanproducts`.
 */
class LoanproductsSearch extends Loanproducts
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lnp_id', 'lnp_min_interest', 'lnp_max_interest', 'lnp_min_duration', 'lnp_max_duration', 'lnp_repayment_daily', 'lnp_repayment_weekly', 'lnp_repayment_biweekly', 'lnp_repayment_monthly', 'lnp_min_processing_fee', 'lnp_max_processing_fee', 'lnp_min_no_of_repayments', 'lnp_max_no_of_repayments'], 'integer'],
            [['lnp_name', 'lnp_desc', 'lnp_min_interest_desc', 'lnp_max_interest_desc', 'lnp_min_duration_desc', 'lnp_max_duration_desc'], 'safe'],
            [['lnp_min_insurance_fee', 'lnp_max_insurance_fee'], 'number'],
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
        $query = Loanproducts::find();

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
            'lnp_id' => $this->lnp_id,
            'lnp_min_interest' => $this->lnp_min_interest,
            'lnp_max_interest' => $this->lnp_max_interest,
            'lnp_min_duration' => $this->lnp_min_duration,
            'lnp_max_duration' => $this->lnp_max_duration,
            'lnp_repayment_daily' => $this->lnp_repayment_daily,
            'lnp_repayment_weekly' => $this->lnp_repayment_weekly,
            'lnp_repayment_biweekly' => $this->lnp_repayment_biweekly,
            'lnp_repayment_monthly' => $this->lnp_repayment_monthly,
            'lnp_min_processing_fee' => $this->lnp_min_processing_fee,
            'lnp_max_processing_fee' => $this->lnp_max_processing_fee,
            'lnp_min_insurance_fee' => $this->lnp_min_insurance_fee,
            'lnp_max_insurance_fee' => $this->lnp_max_insurance_fee,
            'lnp_min_no_of_repayments' => $this->lnp_min_no_of_repayments,
            'lnp_max_no_of_repayments' => $this->lnp_max_no_of_repayments,
        ]);

        $query->andFilterWhere(['like', 'lnp_name', $this->lnp_name])
            ->andFilterWhere(['like', 'lnp_desc', $this->lnp_desc])
            ->andFilterWhere(['like', 'lnp_min_interest_desc', $this->lnp_min_interest_desc])
            ->andFilterWhere(['like', 'lnp_max_interest_desc', $this->lnp_max_interest_desc])
            ->andFilterWhere(['like', 'lnp_min_duration_desc', $this->lnp_min_duration_desc])
            ->andFilterWhere(['like', 'lnp_max_duration_desc', $this->lnp_max_duration_desc]);

        return $dataProvider;
    }
}
