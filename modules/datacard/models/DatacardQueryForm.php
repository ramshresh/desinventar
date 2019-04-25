<?php
/**
 * Created by PhpStorm.
 * User: Ram_DFID
 * Date: 03/04/2019
 * Time: 11:55
 */

namespace app\modules\datacard\models;


use yii\base\Model;

class DatacardQueryForm extends Model
{
    public $location_state;
    public $location_district;
    public $location_localbody;
    public $event_type;
    public $event_cause;

    public function rules(){
        return [
            // Define validation rules here
        ];
    }

    public function getDropdown_eventType()
    {
        $datacardModel = new  Datacard();
        return $datacardModel->getDropdown_eventType();
    }

    public function getDropdown_eventCause()
    {
        $datacardModel = new  Datacard();
        return $datacardModel->getDropdown_eventCause();
    }

    public function search($params){
        $query = Datacard::find();
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
        $query->andFilterWhere(['like', 'location_state', $this->location_state])
            ->andFilterWhere(['like', 'location_district', $this->location_district]);
        return $dataProvider;
    }
}