<?php

namespace app\modules\datacard\models;

use app\components\behaviors\UUIDBehavior;
use app\modules\datacard\traits\BleamableTrait;
use dektrium\user\models\User;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "datacards".
 *
 * @property bool $isLocked
 *
 * @property int $id
 * @property int $data_card_no
 * @property string $event_date
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
 * @property string $location_region
 * @property string $location_ecology
 * @property int $effect_people_dead_m
 * @property int $effect_people_dead_f
 * @property int $effect_people_dead_t
 * @property int $effect_people_injured_m
 * @property int $effect_people_injured_f
 * @property int $effect_people_injured_t
 * @property int $effect_people_missing_m
 * @property int $effect_people_missing_f
 * @property int $effect_people_missing_t
 * @property int $effect_people_affected_m
 * @property int $effect_people_affected_f
 * @property int $effect_people_affected_t
 * @property int $effect_people_rescued_m
 * @property int $effect_people_rescued_f
 * @property int $effect_people_rescued_t
 * @property int $effect_people_relocated_m
 * @property int $effect_people_relocated_f
 * @property int $effect_people_relocated_t
 * @property int $effect_people_relieved_m
 * @property int $effect_people_relieved_f
 * @property int $effect_people_relieved_t
 * @property int $damage_house_building_complete
 * @property int $damage_house_building_partial
 * @property string $damage_house_building_value
 * @property int $damage_house_shed_complete
 * @property int $damage_house_shed_partial
 * @property string $damage_house_shed_value
 * @property string $damage_infra_road_type
 * @property int $damage_infra_road_quantity
 * @property string $damage_infra_road_unit
 * @property string $damage_infra_road_value
 * @property string $damage_infra_bridge_type
 * @property int $damage_infra_bridge_quantity
 * @property string $damage_infra_bridge_unit
 * @property string $damage_infra_bridge_value
 * @property string $damage_infra_electricity_type
 * @property int $damage_infra_electricity_quantity
 * @property string $damage_infra_electricity_unit
 * @property string $damage_infra_electricity_value
 * @property string $damage_infra_water_type
 * @property int $damage_infra_water_quantity
 * @property string $damage_infra_water_unit
 * @property string $damage_infra_water_value
 * @property string $damage_infra_sewage_type
 * @property int $damage_infra_sewage_quantity
 * @property string $damage_infra_sewage_unit
 * @property string $damage_infra_sewage_value
 * @property string $damage_infra_communication_type
 * @property int $damage_infra_communication_quantity
 * @property string $damage_infra_communication_unit
 * @property string $damage_infra_communication_value
 * @property string $damage_infra_medical_type
 * @property int $damage_infra_medical_quantity
 * @property string $damage_infra_medical_unit
 * @property string $damage_infra_medical_value
 * @property string $damage_infra_educational_type
 * @property int $damage_infra_educational_quantity
 * @property string $damage_infra_educational_unit
 * @property string $damage_infra_educational_value
 * @property string $damage_infra_institutions_type
 * @property int $damage_infra_institutions_quantity
 * @property string $damage_infra_institutions_unit
 * @property string $damage_infra_institutions_value
 * @property string $damage_infra_industries_type
 * @property int $damage_infra_industries_quantity
 * @property string $damage_infra_industries_unit
 * @property string $damage_infra_industries_value
 * @property string $total_loss_value_rs
 * @property string $total_loss_value_usd
 * @property string $comment
 * @property string $metadata_source
 * @property string $metadata_source_date
 * @property string $metadata_collected_by
 * @property string $metadata_collected_date
 * @property string $metadata_verified_by
 * @property string $metadata_verified_date
 * @property int $effect_loss_land_quantity
 * @property string $effect_loss_land_unit
 * @property string $effect_loss_land_value
 * @property int $effect_loss_agri_quantity
 * @property string $effect_loss_agri_unit
 * @property string $effect_loss_agri_value
 * @property int $effect_loss_livestock_quantity
 * @property string $effect_loss_livestock_unit
 * @property string $effect_loss_livestock_value
 * @property string $longitude
 * @property string $latitude
 *
 * @property string $x
 * @property string $y
 *
 * @property string $created_by
 * @property string $updated_by
 * @property string $created_at
 * @property string $updated_at
 * @property string $locked_at
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
            ['data_card_no', 'unique', 'targetAttribute' => ['data_card_no'], 'message' => 'Data Card Number must be unique (This value already exists in database!).'],
            ['uuid', 'unique', 'targetAttribute' => ['uuid'], 'message' => 'UUID must be unique (This value already exists in database!).'],
            [['data_card_no', 'event_date', 'event_type', 'event_cause', 'location_district', 'location_localbody', 'metadata_source', 'metadata_source_date', 'metadata_collected_by'], 'required'],
            [['data_card_no', 'location_wardno', 'effect_people_dead_m', 'effect_people_dead_f', 'effect_people_dead_t', 'effect_people_injured_m', 'effect_people_injured_f', 'effect_people_injured_t', 'effect_people_missing_m', 'effect_people_missing_f', 'effect_people_missing_t', 'effect_people_affected_m', 'effect_people_affected_f', 'effect_people_affected_t', 'effect_people_rescued_m', 'effect_people_rescued_f', 'effect_people_rescued_t', 'effect_people_relocated_m', 'effect_people_relocated_f', 'effect_people_relocated_t', 'effect_people_relieved_m', 'effect_people_relieved_f', 'effect_people_relieved_t', 'damage_house_building_complete', 'damage_house_building_partial', 'damage_house_shed_complete', 'damage_house_shed_partial', 'damage_infra_road_quantity', 'damage_infra_bridge_quantity', 'damage_infra_electricity_quantity', 'damage_infra_water_quantity', 'damage_infra_sewage_quantity', 'damage_infra_communication_quantity', 'damage_infra_medical_quantity', 'damage_infra_educational_quantity', 'damage_infra_institutions_quantity', 'damage_infra_industries_quantity', 'effect_loss_land_quantity', 'effect_loss_agri_quantity', 'effect_loss_livestock_quantity'], 'integer'],
            [['event_description', 'comment', 'metadata_source'], 'string'],
            [['latitude','longitude','damage_house_building_value', 'damage_house_shed_value', 'damage_infra_road_value', 'damage_infra_bridge_value', 'damage_infra_electricity_value', 'damage_infra_water_value', 'damage_infra_sewage_value', 'damage_infra_communication_value', 'damage_infra_medical_value', 'damage_infra_educational_value', 'damage_infra_institutions_value', 'damage_infra_industries_value', 'effect_loss_land_value', 'effect_loss_agri_value', 'effect_loss_livestock_value', 'latitude', 'longitude'], 'number'],
            [['event_date', 'metadata_source_date', 'metadata_collected_date', 'metadata_verified_date', 'created_at', 'updated_at', 'created_by', 'updated_by', 'locked_at'], 'safe'],
            [['event_type', 'event_magnitude', 'event_centre', 'event_cause', 'event_duration', 'location_state', 'location_district', 'location_localbody', 'location_placename', 'location_region', 'location_ecology', 'damage_infra_road_type', 'damage_infra_road_unit', 'damage_infra_bridge_type', 'damage_infra_bridge_unit', 'damage_infra_electricity_type', 'damage_infra_electricity_unit', 'damage_infra_water_type', 'damage_infra_water_unit', 'damage_infra_sewage_type', 'damage_infra_sewage_unit', 'damage_infra_communication_type', 'damage_infra_communication_unit', 'damage_infra_medical_type', 'damage_infra_medical_unit', 'damage_infra_educational_type', 'damage_infra_educational_unit', 'damage_infra_institutions_type', 'damage_infra_institutions_unit', 'damage_infra_industries_type', 'damage_infra_industries_unit', 'total_loss_value_rs', 'total_loss_value_usd', 'metadata_collected_by', 'metadata_verified_by', 'effect_loss_land_unit', 'effect_loss_agri_unit', 'effect_loss_livestock_unit'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'data_card_no' => 'Data Card No',
            'event_date' => 'Event Date',
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
            'location_region' => 'Location Region',
            'location_ecology' => 'Location Ecology',
            'effect_people_dead_m' => 'Effect People Dead M',
            'effect_people_dead_f' => 'Effect People Dead F',
            'effect_people_dead_t' => 'Effect People Dead T',
            'effect_people_injured_m' => 'Effect People Injured M',
            'effect_people_injured_f' => 'Effect People Injured F',
            'effect_people_injured_t' => 'Effect People Injured T',
            'effect_people_missing_m' => 'Effect People Missing M',
            'effect_people_missing_f' => 'Effect People Missing F',
            'effect_people_missing_t' => 'Effect People Missing T',
            'effect_people_affected_m' => 'Effect People Affected M',
            'effect_people_affected_f' => 'Effect People Affected F',
            'effect_people_affected_t' => 'Effect People Affected T',
            'effect_people_rescued_m' => 'Effect People Rescued M',
            'effect_people_rescued_f' => 'Effect People Rescued F',
            'effect_people_rescued_t' => 'Effect People Rescued T',
            'effect_people_relocated_m' => 'Effect People Relocated M',
            'effect_people_relocated_f' => 'Effect People Relocated F',
            'effect_people_relocated_t' => 'Effect People Relocated T',
            'effect_people_relieved_m' => 'Effect People Relieved M',
            'effect_people_relieved_f' => 'Effect People Relieved F',
            'effect_people_relieved_t' => 'Effect People Relieved T',
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
            'total_loss_value_usd' => 'Total Loss Value Usd',
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
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',

            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'locked_at' => 'Locked At',
        ];
    }

    /**
     * Locks the record by setting 'locked_at' field to current time.
     */
    public function lock()
    {
        return (bool)$this->updateAttributes([
            'locked_at' => time(),
        ]);
    }

    /**
     * UnLocks the record by setting 'locked_at' field to null.
     */
    public function unlock()
    {
        return (bool)$this->updateAttributes(['locked_at' => null]);
    }

    /**
     * @return bool Whether the record is locked or not.
     */
    public function getIsLocked()
    {
        return $this->locked_at != null;
    }


    public function behaviors()
    {
        return [
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ], [
                'class' => UUIDBehavior::className(),
                'uuidAttribute' => 'uuid',
            ],

            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
        ];
    }

    public function getDropdown_eventType()
    {
        return [
            'ACCIDENT' => 'Accident',
            'AVALANCHE' => 'Avalanche',
            'BIOLOGICAL' => 'Biological Disaster',
            'BOAT CAPSIZE' => 'Boat Capsize',
            'COLD WAVE' => 'Cold Wave',
            'DROUGHT' => 'Drought',
            'EARTHQUAKE' => 'Earthquake',
            'EPIDEMIC' => 'Epidemic',
            'EXPLOSION' => 'Explosion',
            'FAMINE' => 'Famine',
            'FIRE' => 'Fire',
            'FLOOD' => 'Flood',
            'FOREST FIRE' => 'Forest Fire',
            'FROST' => 'Frost',
            'GLOF' => 'GLOF',
            'HAILSTORM' => 'Hailstorm',
            'HEAT WAVE' => 'Hailstorm',
            'LANDSLIDE' => 'Landslide',
            'LEAK' => 'Leak',
            'LIQUEFACTION' => 'Liquefaction',
            'OTHER' => 'Other',
            'PANIC' => 'Panic',
            'PLAGUE' => 'Plague',
            'POLLUTION' => 'Pollution',
            'RAINS' => 'Rains',
            'SEDIMENTATION' => 'Sedimentation',
            'SNOW STORM' => 'Snow Storm',
            'STORM' => 'Storm',
            'STRONG WIND' => 'Strong Wind',
            'STRUCT.COLLAPSE' => 'Structural Collapse',
            'THUNDERSTORM' => 'Thunderstorm',
        ];
    }

    public function getDropdown_eventCause()
    {
        return [
            'HUMAN MISTAKE' => 'Human Mistake',
            'HEAVY RAIN' => 'Heavy rain',
            'FLOOD' => 'Flood',
            'LANDSLIDE' => 'Landslide',
            'DESIGN ERROR' => 'Design Error',
            'DEFORESTATION' => 'Deforestation',
            'TECHNICAL FAILU' => 'Technical fault',
            'RAIN' => 'Rain',
            'OTHER' => 'Other',
            'SESMIC ACTIVIT' => 'Seismic Activity',
            'ELECTRIC SHOCK' => 'Electric Shock',
        ];
    }

    //Data Transformation
    public function getValueOf_createdBy()
    {
        /**
         * @var User $user
         */
        $userId = $this->created_by;
        $user = User::find()
            ->where(['id' => $userId])
            ->one();
        return (isset($user->username) && ($user->username != '')) ? $user->username : $userId;
    }

    public function getValueOf_eventType()
    {
        $list = $this->getDropdown_eventType();
        return isset($list[$this->event_type]) ? $list[$this->event_type] : '';
    }


    public function getValueOf_locationLocalBody()
    {
        $list = ArrayHelper::map(Localbody::find()
            ->select(
                'ddgn,local_bodies')
            ->where([
                'DDGN' => $this->location_localbody
            ])
            ->asArray()->all(), 'ddgn', 'local_bodies');
        return isset($list[$this->location_localbody]) ? $list[$this->location_localbody] : '';
    }

    public function getValueOf_locationWardNo()
    {
        $list = ArrayHelper::map(Ward::find()
            ->select(
                'DDGNWW,NEW_WARD_N')
            ->where([
                'DDGNWW' => $this->location_wardno
            ])
            ->asArray()->all(), 'DDGNWW', 'NEW_WARD_N');
        return isset($list[$this->location_wardno]) ? $list[$this->location_wardno] : '';
    }

    public function getValueOf_eventCause()
    {
        $list = $this->getDropdown_eventCause();
        return isset($list[$this->event_cause]) ? $list[$this->event_cause] : '';
    }
    public function getValueOf_WardCentroid()
    {
        $coordinates=Ward::find()
            ->select(
                'LATITUDE,LONGITUDE')
            ->where([
                'DDGNWW' => $this->location_wardno
            ])
            ->one();
        return $coordinates;
    }

    public function getModelForView()
    {
        $this->event_type = $this->getValueOf_eventType();
        $this->event_cause = $this->getValueOf_eventCause();
        $this->location_localbody = $this->getValueOf_locationLocalBody();
        $this->location_wardno = $this->getValueOf_locationWardNo();
        return $this;
    }

    public function beforeSave($insert)
    {
        $dirty = self::getDirtyAttributes();
        if (isset($dirty['location_district'])) {
            $this->location_state = Localbody::find()->select('state')->where(['district' => $dirty['location_district']])->asArray()->one()['state'];
        }
        if (isset($dirty['location_district'])) {
            $this->location_region = Region::find()->select('region')->where(['district' => $dirty['location_district']])->asArray()->one()['region'];
        }
        if (isset($dirty['location_district'])) {
            $this->location_ecology = Region::find()->select('ecology')->where(['district' => $dirty['location_district']])->asArray()->one()['ecology'];
        }
        if (isset($dirty['location_wardno'])) {
            $this->latitude = Ward::find()->select('LATITUDE')->where(['DDGNWW' => $dirty['location_wardno']])->asArray()->one()['LATITUDE'];
            $this->longitude = Ward::find()->select('LONGITUDE')->where(['DDGNWW' => $dirty['location_wardno']])->asArray()->one()['LONGITUDE'];
        }
        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }
}
