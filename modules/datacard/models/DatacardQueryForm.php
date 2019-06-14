<?php
/**
 * Created by PhpStorm.
 * User: Ram_DFID
 * Date: 03/04/2019
 * Time: 11:55
 */

namespace app\modules\datacard\models;


use yii\base\Model;
use yii\data\ActiveDataProvider;

class DatacardQueryForm extends Datacard
{
    public $location_state;
    public $location_district;
    public $location_localbody;
    public $event_type;
    public $event_cause;
    public $from_date;
    public $to_date;
    public $sort_by;
    public $per_page;

    public $dateRange;

    public $selectedDistricts;
    public $selectedLocalbodies;

    public function rules()
    {
        return [
            // Define validation rules here
            ['to_date', 'is_validDaterange'],
            [
                ['location_state','location_district','location_localbody','event_type','event_cause','from_date','sort_by','per_page'], 'safe'
            ],
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

    public function search($params)
    {
        $query = Datacard::find();
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20
            ],
        ]);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'event_type', $this->event_type])
            ->andFilterWhere(['like', 'event_cause', $this->event_cause])
            ->andFilterWhere(['like', 'location_state', $this->location_state])
            ->andFilterWhere(['like', 'location_district', $this->location_district])
            ->andFilterWhere(['like', 'location_localbody', $this->location_localbody]);


        if(isset($this->from_date) && $this->from_date!=""){
            if(isset($this->to_date) && $this->to_date!=""){
                $query->andFilterWhere(['between', 'event_date', $this->from_date, $this->to_date]);
            }else{
                $query->andFilterWhere(['>=', 'event_date', $this->from_date]);
            }
        }else{
            if(isset($this->to_date) && $this->to_date!=""){
                $query->andFilterWhere(['<=', 'event_date',$this->to_date]);
            }
        }
        $query->orderBy('event_date');
        return $dataProvider;

    }

    public function is_validDaterange($attribute_name, $params)
    {
        if ($this->{$attribute_name} < $this->from_date) {
            $this->addError($attribute_name, 'Invalid Date Range');
            $this->addError('from_date', 'Invalid Date Range');
            
            return false;
        }
        return true;
    }
}