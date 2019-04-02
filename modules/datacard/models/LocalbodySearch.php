<?php

namespace app\modules\datacard\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\datacard\models\Localbody;

/**
 * LocalbodySearch represents the model behind the search form of `app\modules\datacard\models\Localbody`.
 */
class LocalbodySearch extends Localbody
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['DDGN', 'DCOD', 'district', 'local_bodies', 'type', 'state', 'changed_ga_pa'], 'safe'],
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
        $query = Localbody::find();

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
        ]);

        $query->andFilterWhere(['like', 'DDGN', $this->DDGN])
            ->andFilterWhere(['like', 'DCOD', $this->DCOD])
            ->andFilterWhere(['like', 'district', $this->district])
            ->andFilterWhere(['like', 'local_bodies', $this->local_bodies])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'state', $this->state])
            ->andFilterWhere(['like', 'changed_ga_pa', $this->changed_ga_pa]);

        return $dataProvider;
    }
}
