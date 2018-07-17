<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TrDirectories;

/**
 * TrDirectoriesSearch represents the model behind the search form of `app\models\TrDirectories`.
 */
class TrDirectoriesSearch extends TrDirectories
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dir_id', 'dir_parent_id', 'dir_level'], 'integer'],
            [['dir_name', 'dir_date_created', 'dir_created_by'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = TrDirectories::find();

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
            'dir_id' => $this->dir_id,
            'dir_parent_id' => $this->dir_parent_id,
            'dir_level' => $this->dir_level,
            'dir_created_by' => $this->dir_created_by,
        ]);

        $query->andFilterWhere(['like', 'dir_name', $this->dir_name])
            ->andFilterWhere(['like', 'dir_date_created', $this->dir_date_created]);

        return $dataProvider;
    }
}
