<?php

namespace app\modules\datacard\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\datacard\models\Region;

/**
 * RegionSearch represents the model behind the search form of `app\modules\datacard\models\Region`.
 */
class RegionSearch extends Region
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'no_of_ga_pa'], 'integer'],
            [['district', 'ecology', 'region', 'zone'], 'safe'],
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
        $query = Region::find();

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
            'id' => $this->id,
            'no_of_ga_pa' => $this->no_of_ga_pa,
        ]);

        $query->andFilterWhere(['like', 'district', $this->district])
            ->andFilterWhere(['like', 'ecology', $this->ecology])
            ->andFilterWhere(['like', 'region', $this->region])
            ->andFilterWhere(['like', 'zone', $this->zone]);

        return $dataProvider;
    }
}
