<?php

namespace app\modules\datacard\models;

use Yii;

/**
 * This is the model class for table "datacards".
 *
 * @property int $id
 * @property string $event_type
 * @property string $event_magnitude
 * @property string $event_centre
 * @property string $event_cause
 * @property string $event_description
 * @property string $event_duration
 * @property string $location_state
 * @property string $location_district
 * @property string $location_localbody
 * @property int $location_wardno
 * @property string $location_placename
 * @property int $effect_people_dead_m
 * @property int $effect_people_dead_f
 * @property int $effect_people_injured_m
 * @property int $effect_people_injured_f
 * @property int $effect_people_missing_m
 * @property int $effect_people_missing_f
 * @property int $effect_people_affected_m
 * @property int $effect_people_affected_f
 * @property int $effect_people_rescued_m
 * @property int $effect_people_rescued_f
 * @property int $effect_people_relocated_m
 * @property int $effect_people_relocated_f
 * @property int $effect_people_relieved_m
 * @property int $effect_people_relieved_f
 * @property int $damage_house_building_complete
 * @property int $damage_house_building_partial
 * @property string $damage_house_building_value
 * @property int $damage_house_shed_complete
 * @property int $damage_house_shed_partial
 * @property string $damage_house_shed_value
 * @property int $damage_infra_road_type
 * @property int $damage_infra_road_quantity
 * @property string $damage_infra_road_unit
 * @property string $damage_infra_road_value
 * @property int $damage_infra_bridge_type
 * @property int $damage_infra_bridge_quantity
 * @property string $damage_infra_bridge_unit
 * @property string $damage_infra_bridge_value
 * @property int $damage_infra_electricity_type
 * @property int $damage_infra_electricity_quantity
 * @property string $damage_infra_electricity_unit
 * @property string $damage_infra_electricity_value
 * @property int $damage_infra_water_type
 * @property int $damage_infra_water_quantity
 * @property string $damage_infra_water_unit
 * @property string $damage_infra_water_value
 * @property int $damage_infra_sewage_type
 * @property int $damage_infra_sewage_quantity
 * @property string $damage_infra_sewage_unit
 * @property string $damage_infra_sewage_value
 * @property int $damage_infra_communication_type
 * @property int $damage_infra_communication_quantity
 * @property string $damage_infra_communication_unit
 * @property string $damage_infra_communication_value
 * @property int $damage_infra_medical_type
 * @property int $damage_infra_medical_quantity
 * @property string $damage_infra_medical_unit
 * @property string $damage_infra_medical_value
 * @property int $damage_infra_educational_type
 * @property int $damage_infra_educational_quantity
 * @property string $damage_infra_educational_unit
 * @property string $damage_infra_educational_value
 * @property int $damage_infra_institutions_type
 * @property int $damage_infra_institutions_quantity
 * @property string $damage_infra_institutions_unit
 * @property string $damage_infra_institutions_value
 * @property int $damage_infra_industries_type
 * @property int $damage_infra_industries_quantity
 * @property string $damage_infra_industries_unit
 * @property string $damage_infra_industries_value
 * @property string $total_loss_value_rs
 * @property string $comment
 * @property string $metadata_source
 * @property string $metadata_source_date
 * @property string $metadata_collected_by
 * @property string $metadata_collected_date
 * @property string $metadata_verified_by
 * @property string $metadata_verified_date
 * @property int $effect_loss_land_quantity
 * @property string $effect_loss_land_unit
 * @property int $effect_loss_land_value
 * @property int $effect_loss_agri_quantity
 * @property string $effect_loss_agri_unit
 * @property int $effect_loss_agri_value
 * @property int $effect_loss_livestock_quantity
 * @property string $effect_loss_livestock_unit
 * @property int $effect_loss_livestock_value
 */
class Datacard extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'datacards';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['event_description', 'comment', 'metadata_source', 'metadata_source_date'], 'string'],
            [['location_wardno', 'effect_people_dead_m', 'effect_people_dead_f', 'effect_people_injured_m', 'effect_people_injured_f', 'effect_people_missing_m', 'effect_people_missing_f', 'effect_people_affected_m', 'effect_people_affected_f', 'effect_people_rescued_m', 'effect_people_rescued_f', 'effect_people_relocated_m', 'effect_people_relocated_f', 'effect_people_relieved_m', 'effect_people_relieved_f', 'damage_house_building_complete', 'damage_house_building_partial', 'damage_house_shed_complete', 'damage_house_shed_partial', 'damage_infra_road_type', 'damage_infra_road_quantity', 'damage_infra_bridge_type', 'damage_infra_bridge_quantity', 'damage_infra_electricity_type', 'damage_infra_electricity_quantity', 'damage_infra_water_type', 'damage_infra_water_quantity', 'damage_infra_sewage_type', 'damage_infra_sewage_quantity', 'damage_infra_communication_type', 'damage_infra_communication_quantity', 'damage_infra_medical_type', 'damage_infra_medical_quantity', 'damage_infra_educational_type', 'damage_infra_educational_quantity', 'damage_infra_institutions_type', 'damage_infra_institutions_quantity', 'damage_infra_industries_type', 'damage_infra_industries_quantity', 'effect_loss_land_quantity', 'effect_loss_land_value', 'effect_loss_agri_quantity', 'effect_loss_agri_value', 'effect_loss_livestock_quantity', 'effect_loss_livestock_value'], 'integer'],
            [['metadata_collected_date', 'metadata_verified_date'], 'safe'],
            [['event_type', 'event_magnitude', 'event_centre', 'event_cause', 'event_duration', 'location_state', 'location_district', 'location_localbody', 'location_placename', 'damage_house_building_value', 'damage_house_shed_value', 'damage_infra_road_unit', 'damage_infra_road_value', 'damage_infra_bridge_unit', 'damage_infra_bridge_value', 'damage_infra_electricity_unit', 'damage_infra_electricity_value', 'damage_infra_water_unit', 'damage_infra_water_value', 'damage_infra_sewage_unit', 'damage_infra_sewage_value', 'damage_infra_communication_unit', 'damage_infra_communication_value', 'damage_infra_medical_unit', 'damage_infra_medical_value', 'damage_infra_educational_unit', 'damage_infra_educational_value', 'damage_infra_institutions_unit', 'damage_infra_institutions_value', 'damage_infra_industries_unit', 'damage_infra_industries_value', 'total_loss_value_rs', 'metadata_collected_by', 'metadata_verified_by', 'effect_loss_land_unit', 'effect_loss_agri_unit', 'effect_loss_livestock_unit'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'event_type' => 'Event Type',
            'event_magnitude' => 'Event Magnitude',
            'event_centre' => 'Event Centre',
            'event_cause' => 'Event Cause',
            'event_description' => 'Event Description',
            'event_duration' => 'Event Duration',
            'location_state' => 'Location State',
            'location_district' => 'Location District',
            'location_localbody' => 'Location Localbody',
            'location_wardno' => 'Location Wardno',
            'location_placename' => 'Location Placename',
            'effect_people_dead_m' => 'Effect People Dead M',
            'effect_people_dead_f' => 'Effect People Dead F',
            'effect_people_injured_m' => 'Effect People Injured M',
            'effect_people_injured_f' => 'Effect People Injured F',
            'effect_people_missing_m' => 'Effect People Missing M',
            'effect_people_missing_f' => 'Effect People Missing F',
            'effect_people_affected_m' => 'Effect People Affected M',
            'effect_people_affected_f' => 'Effect People Affected F',
            'effect_people_rescued_m' => 'Effect People Rescued M',
            'effect_people_rescued_f' => 'Effect People Rescued F',
            'effect_people_relocated_m' => 'Effect People Relocated M',
            'effect_people_relocated_f' => 'Effect People Relocated F',
            'effect_people_relieved_m' => 'Effect People Relieved M',
            'effect_people_relieved_f' => 'Effect People Relieved F',
            'damage_house_building_complete' => 'Damage House Building Complete',
            'damage_house_building_partial' => 'Damage House Building Partial',
            'damage_house_building_value' => 'Damage House Building Value',
            'damage_house_shed_complete' => 'Damage House Shed Complete',
            'damage_house_shed_partial' => 'Damage House Shed Partial',
            'damage_house_shed_value' => 'Damage House Shed Value',
            'damage_infra_road_type' => 'Damage Infra Road Type',
            'damage_infra_road_quantity' => 'Damage Infra Road Quantity',
            'damage_infra_road_unit' => 'Damage Infra Road Unit',
            'damage_infra_road_value' => 'Damage Infra Road Value',
            'damage_infra_bridge_type' => 'Damage Infra Bridge Type',
            'damage_infra_bridge_quantity' => 'Damage Infra Bridge Quantity',
            'damage_infra_bridge_unit' => 'Damage Infra Bridge Unit',
            'damage_infra_bridge_value' => 'Damage Infra Bridge Value',
            'damage_infra_electricity_type' => 'Damage Infra Electricity Type',
            'damage_infra_electricity_quantity' => 'Damage Infra Electricity Quantity',
            'damage_infra_electricity_unit' => 'Damage Infra Electricity Unit',
            'damage_infra_electricity_value' => 'Damage Infra Electricity Value',
            'damage_infra_water_type' => 'Damage Infra Water Type',
            'damage_infra_water_quantity' => 'Damage Infra Water Quantity',
            'damage_infra_water_unit' => 'Damage Infra Water Unit',
            'damage_infra_water_value' => 'Damage Infra Water Value',
            'damage_infra_sewage_type' => 'Damage Infra Sewage Type',
            'damage_infra_sewage_quantity' => 'Damage Infra Sewage Quantity',
            'damage_infra_sewage_unit' => 'Damage Infra Sewage Unit',
            'damage_infra_sewage_value' => 'Damage Infra Sewage Value',
            'damage_infra_communication_type' => 'Damage Infra Communication Type',
            'damage_infra_communication_quantity' => 'Damage Infra Communication Quantity',
            'damage_infra_communication_unit' => 'Damage Infra Communication Unit',
            'damage_infra_communication_value' => 'Damage Infra Communication Value',
            'damage_infra_medical_type' => 'Damage Infra Medical Type',
            'damage_infra_medical_quantity' => 'Damage Infra Medical Quantity',
            'damage_infra_medical_unit' => 'Damage Infra Medical Unit',
            'damage_infra_medical_value' => 'Damage Infra Medical Value',
            'damage_infra_educational_type' => 'Damage Infra Educational Type',
            'damage_infra_educational_quantity' => 'Damage Infra Educational Quantity',
            'damage_infra_educational_unit' => 'Damage Infra Educational Unit',
            'damage_infra_educational_value' => 'Damage Infra Educational Value',
            'damage_infra_institutions_type' => 'Damage Infra Institutions Type',
            'damage_infra_institutions_quantity' => 'Damage Infra Institutions Quantity',
            'damage_infra_institutions_unit' => 'Damage Infra Institutions Unit',
            'damage_infra_institutions_value' => 'Damage Infra Institutions Value',
            'damage_infra_industries_type' => 'Damage Infra Industries Type',
            'damage_infra_industries_quantity' => 'Damage Infra Industries Quantity',
            'damage_infra_industries_unit' => 'Damage Infra Industries Unit',
            'damage_infra_industries_value' => 'Damage Infra Industries Value',
            'total_loss_value_rs' => 'Total Loss Value Rs',
            'comment' => 'Comment',
            'metadata_source' => 'Metadata Source',
            'metadata_source_date' => 'Metadata Source Date',
            'metadata_collected_by' => 'Metadata Collected By',
            'metadata_collected_date' => 'Metadata Collected Date',
            'metadata_verified_by' => 'Metadata Verified By',
            'metadata_verified_date' => 'Metadata Verified Date',
            'effect_loss_land_quantity' => 'Effect Loss Land Quantity',
            'effect_loss_land_unit' => 'Effect Loss Land Unit',
            'effect_loss_land_value' => 'Effect Loss Land Value',
            'effect_loss_agri_quantity' => 'Effect Loss Agri Quantity',
            'effect_loss_agri_unit' => 'Effect Loss Agri Unit',
            'effect_loss_agri_value' => 'Effect Loss Agri Value',
            'effect_loss_livestock_quantity' => 'Effect Loss Livestock Quantity',
            'effect_loss_livestock_unit' => 'Effect Loss Livestock Unit',
            'effect_loss_livestock_value' => 'Effect Loss Livestock Value',
        ];
    }

    public function getDropdown_eventType(){
        return [
            'accident'=>'Accident',
            'avalanche'=>'Avalanche'
        ];
    }

    public function getDropdown_eventCause(){
        return [
            'human_mistake'=>'Human Mistake',
            'heavy_rain'=>'Heavy rain',
            'flood'=>'Flood',
            'Landslide'=>'Landslide'
        ];
    }
}
