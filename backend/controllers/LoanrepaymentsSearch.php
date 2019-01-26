<?php

namespace backend\controllers;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Loanrepayments;

/**
 * LoanrepaymentsSearch represents the model behind the search form of `backend\models\Loanrepayments`.
 */
class LoanrepaymentsSearch extends Loanrepayments
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lnrp_id', 'lnrp_ln_id'], 'integer'],
            [['lnrp_payment_method', 'lnrp_collected_by', 'lnrp_collection_date'], 'safe'],
            [['lnrp_paid_amount', 'lnrp_principal', 'lnrp_balance', 'lnrp_extra_payment'], 'number'],
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
        $query = Loanrepayments::find();

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
            'lnrp_id' => $this->lnrp_id,
            'lnrp_ln_id' => $this->lnrp_ln_id,
            'lnrp_collection_date' => $this->lnrp_collection_date,
            'lnrp_paid_amount' => $this->lnrp_paid_amount,
            'lnrp_principal' => $this->lnrp_principal,
            'lnrp_balance' => $this->lnrp_balance,
            'lnrp_extra_payment' => $this->lnrp_extra_payment,
        ]);

        $query->andFilterWhere(['like', 'lnrp_payment_method', $this->lnrp_payment_method])
            ->andFilterWhere(['like', 'lnrp_collected_by', $this->lnrp_collected_by]);

        return $dataProvider;
    }
}
