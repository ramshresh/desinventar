<?php

namespace app\modules\datacard\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\datacard\models\Datacard;

/**
 * DatacardSearch represents the model behind the search form of `app\modules\datacard\models\Datacard`.
 */
class DatacardSearch extends Datacard
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'data_card_no', 'location_wardno', 'effect_people_dead_m', 'effect_people_dead_f', 'effect_people_dead_t', 'effect_people_injured_m', 'effect_people_injured_f', 'effect_people_injured_t', 'effect_people_missing_m', 'effect_people_missing_f', 'effect_people_missing_t', 'effect_people_affected_m', 'effect_people_affected_f', 'effect_people_affected_t', 'effect_people_rescued_m', 'effect_people_rescued_f', 'effect_people_rescued_t', 'effect_people_relocated_m', 'effect_people_relocated_f', 'effect_people_relocated_t', 'effect_people_relieved_m', 'effect_people_relieved_f', 'effect_people_relieved_t', 'damage_house_building_complete', 'damage_house_building_partial', 'damage_house_shed_complete', 'damage_house_shed_partial', 'damage_infra_road_quantity', 'damage_infra_bridge_quantity', 'damage_infra_electricity_quantity', 'damage_infra_water_quantity', 'damage_infra_sewage_quantity', 'damage_infra_communication_quantity', 'damage_infra_medical_quantity', 'damage_infra_educational_quantity', 'damage_infra_institutions_quantity', 'damage_infra_industries_quantity', 'effect_loss_land_quantity', 'effect_loss_agri_quantity', 'effect_loss_livestock_quantity'], 'integer'],
            [['event_date','event_type', 'event_magnitude', 'event_centre', 'event_cause', 'event_description', 'event_duration', 'location_state', 'location_district', 'location_localbody', 'location_placename', 'location_region', 'location_ecology', 'damage_infra_road_type', 'damage_infra_road_unit', 'damage_infra_bridge_type', 'damage_infra_bridge_unit', 'damage_infra_electricity_type', 'damage_infra_electricity_unit', 'damage_infra_water_type', 'damage_infra_water_unit', 'damage_infra_sewage_type', 'damage_infra_sewage_unit', 'damage_infra_communication_type', 'damage_infra_communication_unit', 'damage_infra_medical_type', 'damage_infra_medical_unit', 'damage_infra_educational_type', 'damage_infra_educational_unit', 'damage_infra_institutions_type', 'damage_infra_institutions_unit', 'damage_infra_industries_type', 'damage_infra_industries_unit', 'total_loss_value_rs', 'total_loss_value_usd', 'comment', 'metadata_source', 'metadata_source_date', 'metadata_collected_by', 'metadata_collected_date', 'metadata_verified_by', 'metadata_verified_date', 'effect_loss_land_unit', 'effect_loss_agri_unit', 'effect_loss_livestock_unit'], 'safe'],
            [['latitude','longitude','damage_house_building_value', 'damage_house_shed_value', 'damage_infra_road_value', 'damage_infra_bridge_value', 'damage_infra_electricity_value', 'damage_infra_water_value', 'damage_infra_sewage_value', 'damage_infra_communication_value', 'damage_infra_medical_value', 'damage_infra_educational_value', 'damage_infra_institutions_value', 'damage_infra_industries_value', 'effect_loss_land_value', 'effect_loss_agri_value', 'effect_loss_livestock_value'], 'number'],
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

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'data_card_no' => $this->data_card_no,
            'location_wardno' => $this->location_wardno,
            'effect_people_dead_m' => $this->effect_people_dead_m,
            'effect_people_dead_f' => $this->effect_people_dead_f,
            'effect_people_dead_t' => $this->effect_people_dead_t,
            'effect_people_injured_m' => $this->effect_people_injured_m,
            'effect_people_injured_f' => $this->effect_people_injured_f,
            'effect_people_injured_t' => $this->effect_people_injured_t,
            'effect_people_missing_m' => $this->effect_people_missing_m,
            'effect_people_missing_f' => $this->effect_people_missing_f,
            'effect_people_missing_t' => $this->effect_people_missing_t,
            'effect_people_affected_m' => $this->effect_people_affected_m,
            'effect_people_affected_f' => $this->effect_people_affected_f,
            'effect_people_affected_t' => $this->effect_people_affected_t,
            'effect_people_rescued_m' => $this->effect_people_rescued_m,
            'effect_people_rescued_f' => $this->effect_people_rescued_f,
            'effect_people_rescued_t' => $this->effect_people_rescued_t,
            'effect_people_relocated_m' => $this->effect_people_relocated_m,
            'effect_people_relocated_f' => $this->effect_people_relocated_f,
            'effect_people_relocated_t' => $this->effect_people_relocated_t,
            'effect_people_relieved_m' => $this->effect_people_relieved_m,
            'effect_people_relieved_f' => $this->effect_people_relieved_f,
            'effect_people_relieved_t' => $this->effect_people_relieved_t,
            'damage_house_building_complete' => $this->damage_house_building_complete,
            'damage_house_building_partial' => $this->damage_house_building_partial,
            'damage_house_building_value' => $this->damage_house_building_value,
            'damage_house_shed_complete' => $this->damage_house_shed_complete,
            'damage_house_shed_partial' => $this->damage_house_shed_partial,
            'damage_house_shed_value' => $this->damage_house_shed_value,
            'damage_infra_road_quantity' => $this->damage_infra_road_quantity,
            'damage_infra_road_value' => $this->damage_infra_road_value,
            'damage_infra_bridge_quantity' => $this->damage_infra_bridge_quantity,
            'damage_infra_bridge_value' => $this->damage_infra_bridge_value,
            'damage_infra_electricity_quantity' => $this->damage_infra_electricity_quantity,
            'damage_infra_electricity_value' => $this->damage_infra_electricity_value,
            'damage_infra_water_quantity' => $this->damage_infra_water_quantity,
            'damage_infra_water_value' => $this->damage_infra_water_value,
            'damage_infra_sewage_quantity' => $this->damage_infra_sewage_quantity,
            'damage_infra_sewage_value' => $this->damage_infra_sewage_value,
            'damage_infra_communication_quantity' => $this->damage_infra_communication_quantity,
            'damage_infra_communication_value' => $this->damage_infra_communication_value,
            'damage_infra_medical_quantity' => $this->damage_infra_medical_quantity,
            'damage_infra_medical_value' => $this->damage_infra_medical_value,
            'damage_infra_educational_quantity' => $this->damage_infra_educational_quantity,
            'damage_infra_educational_value' => $this->damage_infra_educational_value,
            'damage_infra_institutions_quantity' => $this->damage_infra_institutions_quantity,
            'damage_infra_institutions_value' => $this->damage_infra_institutions_value,
            'damage_infra_industries_quantity' => $this->damage_infra_industries_quantity,
            'damage_infra_industries_value' => $this->damage_infra_industries_value,
            'event_date' => $this->event_date,
            'metadata_source_date' => $this->metadata_source_date,
            'metadata_collected_date' => $this->metadata_collected_date,
            'metadata_verified_date' => $this->metadata_verified_date,
            'effect_loss_land_quantity' => $this->effect_loss_land_quantity,
            'effect_loss_land_value' => $this->effect_loss_land_value,
            'effect_loss_agri_quantity' => $this->effect_loss_agri_quantity,
            'effect_loss_agri_value' => $this->effect_loss_agri_value,
            'effect_loss_livestock_quantity' => $this->effect_loss_livestock_quantity,
            'effect_loss_livestock_value' => $this->effect_loss_livestock_value,
        ]);

        $query->andFilterWhere(['like', 'event_type', $this->event_type])
            ->andFilterWhere(['like', 'event_magnitude', $this->event_magnitude])
            ->andFilterWhere(['like', 'event_centre', $this->event_centre])
            ->andFilterWhere(['like', 'event_cause', $this->event_cause])
            ->andFilterWhere(['like', 'event_description', $this->event_description])
            ->andFilterWhere(['like', 'event_duration', $this->event_duration])
            ->andFilterWhere(['like', 'location_state', $this->location_state])
            ->andFilterWhere(['like', 'location_district', $this->location_district])
            ->andFilterWhere(['like', 'location_localbody', $this->location_localbody])
            ->andFilterWhere(['like', 'location_placename', $this->location_placename])
            ->andFilterWhere(['like', 'location_region', $this->location_region])
            ->andFilterWhere(['like', 'location_ecology', $this->location_ecology])
            ->andFilterWhere(['like', 'damage_infra_road_type', $this->damage_infra_road_type])
            ->andFilterWhere(['like', 'damage_infra_road_unit', $this->damage_infra_road_unit])
            ->andFilterWhere(['like', 'damage_infra_bridge_type', $this->damage_infra_bridge_type])
            ->andFilterWhere(['like', 'damage_infra_bridge_unit', $this->damage_infra_bridge_unit])
            ->andFilterWhere(['like', 'damage_infra_electricity_type', $this->damage_infra_electricity_type])
            ->andFilterWhere(['like', 'damage_infra_electricity_unit', $this->damage_infra_electricity_unit])
            ->andFilterWhere(['like', 'damage_infra_water_type', $this->damage_infra_water_type])
            ->andFilterWhere(['like', 'damage_infra_water_unit', $this->damage_infra_water_unit])
            ->andFilterWhere(['like', 'damage_infra_sewage_type', $this->damage_infra_sewage_type])
            ->andFilterWhere(['like', 'damage_infra_sewage_unit', $this->damage_infra_sewage_unit])
            ->andFilterWhere(['like', 'damage_infra_communication_type', $this->damage_infra_communication_type])
            ->andFilterWhere(['like', 'damage_infra_communication_unit', $this->damage_infra_communication_unit])
            ->andFilterWhere(['like', 'damage_infra_medical_type', $this->damage_infra_medical_type])
            ->andFilterWhere(['like', 'damage_infra_medical_unit', $this->damage_infra_medical_unit])
            ->andFilterWhere(['like', 'damage_infra_educational_type', $this->damage_infra_educational_type])
            ->andFilterWhere(['like', 'damage_infra_educational_unit', $this->damage_infra_educational_unit])
            ->andFilterWhere(['like', 'damage_infra_institutions_type', $this->damage_infra_institutions_type])
            ->andFilterWhere(['like', 'damage_infra_institutions_unit', $this->damage_infra_institutions_unit])
            ->andFilterWhere(['like', 'damage_infra_industries_type', $this->damage_infra_industries_type])
            ->andFilterWhere(['like', 'damage_infra_industries_unit', $this->damage_infra_industries_unit])
            ->andFilterWhere(['like', 'total_loss_value_rs', $this->total_loss_value_rs])
            ->andFilterWhere(['like', 'total_loss_value_usd', $this->total_loss_value_usd])
            ->andFilterWhere(['like', 'comment', $this->comment])
            ->andFilterWhere(['like', 'metadata_source', $this->metadata_source])
            ->andFilterWhere(['like', 'metadata_collected_by', $this->metadata_collected_by])
            ->andFilterWhere(['like', 'metadata_verified_by', $this->metadata_verified_by])
            ->andFilterWhere(['like', 'effect_loss_land_unit', $this->effect_loss_land_unit])
            ->andFilterWhere(['like', 'effect_loss_agri_unit', $this->effect_loss_agri_unit])
            ->andFilterWhere(['like', 'effect_loss_livestock_unit', $this->effect_loss_livestock_unit]);

        return $dataProvider;
    }
}
