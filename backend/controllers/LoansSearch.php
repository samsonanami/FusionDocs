<?php

namespace backend\controllers;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Loans;

/**
 * LoansSearch represents the model behind the search form of `backend\models\Loans`.
 */
class LoansSearch extends Loans
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ln_id', 'ln_customer_id', 'lnp_id', 'ln_repayment_count', 'ln_duration'], 'integer'],
            [['ln_released', 'ln_maturity', 'ln_repayment', 'ln_interest_time', 'ln_due', 'ln_status', 'ln_description', 'ln_loan_files', 'ln_duration_desc'], 'safe'],
            [['ln_principal', 'ln_interest', 'ln_fees', 'ln_penalty', 'ln_paid', 'ln_balance', 'ln_processing_fee_perc', 'ln_processing_fee', 'ln_insurance_fee'], 'number'],
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
        $query = Loans::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20,
            ],
            'sort' => [
                'defaultOrder' => [
                    'ln_balance' => SORT_DESC,
                    'ln_due' => SORT_ASC, 
                ]
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'ln_id' => $this->ln_id,
            'ln_customer_id' => $this->ln_customer_id,
            'lnp_id' => $this->lnp_id,
            'ln_released' => $this->ln_released,
            'ln_maturity' => $this->ln_maturity,
            'ln_repayment_count' => $this->ln_repayment_count,
            'ln_principal' => $this->ln_principal,
            'ln_interest' => $this->ln_interest,
            'ln_fees' => $this->ln_fees,
            'ln_penalty' => $this->ln_penalty,
            'ln_due' => $this->ln_due,
            'ln_paid' => $this->ln_paid,
            'ln_balance' => $this->ln_balance,
            'ln_processing_fee_perc' => $this->ln_processing_fee_perc,
            'ln_processing_fee' => $this->ln_processing_fee,
            'ln_insurance_fee' => $this->ln_insurance_fee,
            'ln_duration' => $this->ln_duration,
        ]);

        $query->andFilterWhere(['like', 'ln_repayment', $this->ln_repayment])
            ->andFilterWhere(['like', 'ln_interest_time', $this->ln_interest_time])
            ->andFilterWhere(['like', 'ln_status', $this->ln_status])
            ->andFilterWhere(['like', 'ln_description', $this->ln_description])
            ->andFilterWhere(['like', 'ln_loan_files', $this->ln_loan_files])
            ->andFilterWhere(['like', 'ln_duration_desc', $this->ln_duration_desc]);

        return $dataProvider;
    }
}
