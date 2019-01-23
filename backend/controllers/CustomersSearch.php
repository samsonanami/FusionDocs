<?php

namespace backend\controllers;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Customers;

/**
 * CustomersSearch represents the model behind the search form of `backend\models\Customers`.
 */
class CustomersSearch extends Customers
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ACCOUNT_NO', 'cust_grp_id'], 'integer'],
            [['FIRST_NAME', 'LAST_NAME', 'GENDER', 'COUNTRY', 'TITLE', 'MOBILE', 'EMAIL', 'DOB', 'ADDRESS', 'CITY', 'PROVINCE_STATE', 'ZIPCODE', 'LANDINE_PHONE', 'BUSINESS_NAME', 'WORKING_STATUS', 'DESCRIPTION', 'STAFF_ACCESS', 'logo', 'files', 'cust_id_no', 'cust_kra_pin','UNIQUE_NO'], 'safe'],
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
        $query = Customers::find();

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
            'ACCOUNT_NO' => $this->ACCOUNT_NO,
            'UNIQUE_NO' => $this->UNIQUE_NO,
            'DOB' => $this->DOB,
            'cust_grp_id' => $this->cust_grp_id,
        ]);

        $query->andFilterWhere(['like', 'FIRST_NAME', $this->FIRST_NAME])
            ->andFilterWhere(['like', 'LAST_NAME', $this->LAST_NAME])
            ->andFilterWhere(['like', 'GENDER', $this->GENDER])
            ->andFilterWhere(['like', 'COUNTRY', $this->COUNTRY])
            ->andFilterWhere(['like', 'TITLE', $this->TITLE])
            ->andFilterWhere(['like', 'MOBILE', $this->MOBILE])
            ->andFilterWhere(['like', 'EMAIL', $this->EMAIL])
            ->andFilterWhere(['like', 'ADDRESS', $this->ADDRESS])
            ->andFilterWhere(['like', 'CITY', $this->CITY])
            ->andFilterWhere(['like', 'PROVINCE_STATE', $this->PROVINCE_STATE])
            ->andFilterWhere(['like', 'ZIPCODE', $this->ZIPCODE])
            ->andFilterWhere(['like', 'LANDINE_PHONE', $this->LANDINE_PHONE])
            ->andFilterWhere(['like', 'BUSINESS_NAME', $this->BUSINESS_NAME])
            ->andFilterWhere(['like', 'WORKING_STATUS', $this->WORKING_STATUS])
            ->andFilterWhere(['like', 'DESCRIPTION', $this->DESCRIPTION])
            ->andFilterWhere(['like', 'STAFF_ACCESS', $this->STAFF_ACCESS])
            ->andFilterWhere(['like', 'logo', $this->logo])
            ->andFilterWhere(['like', 'files', $this->files])
            ->andFilterWhere(['like', 'cust_id_no', $this->cust_id_no])
            ->andFilterWhere(['like', 'cust_kra_pin', $this->cust_kra_pin]);

        return $dataProvider;
    }
}
