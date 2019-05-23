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
 * @property string $data_card_no
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
 * @property int $effect_people_victim_t
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
 * @property string $other_losses
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
            [['location_district'], 'district_exists'],
            [['location_localbody'], 'localunit_exists'],
            [['data_card_no', 'event_date', 'event_type', 'event_cause', 'location_district',], 'required'],
            [['location_wardno', 'effect_people_dead_m', 'effect_people_dead_f', 'effect_people_dead_t', 'effect_people_injured_m', 'effect_people_injured_f', 'effect_people_injured_t', 'effect_people_missing_m', 'effect_people_missing_f', 'effect_people_missing_t', 'effect_people_affected_m', 'effect_people_affected_f', 'effect_people_affected_t', 'effect_people_victim_t', 'effect_people_rescued_m', 'effect_people_rescued_f', 'effect_people_rescued_t', 'effect_people_relocated_m', 'effect_people_relocated_f', 'effect_people_relocated_t', 'effect_people_relieved_m', 'effect_people_relieved_f', 'effect_people_relieved_t', 'damage_house_building_complete', 'damage_house_building_partial', 'damage_house_shed_complete', 'damage_house_shed_partial', 'damage_infra_road_quantity', 'damage_infra_bridge_quantity', 'damage_infra_electricity_quantity', 'damage_infra_water_quantity', 'damage_infra_sewage_quantity', 'damage_infra_communication_quantity', 'damage_infra_medical_quantity', 'damage_infra_educational_quantity', 'damage_infra_institutions_quantity', 'damage_infra_industries_quantity', 'effect_loss_land_quantity', 'effect_loss_agri_quantity', 'effect_loss_livestock_quantity'], 'integer'],
            [['data_card_no', 'event_description', 'comment', 'metadata_source', 'other_losses'], 'string'],
            [['latitude', 'longitude', 'damage_house_building_value', 'damage_house_shed_value', 'damage_infra_road_value', 'damage_infra_bridge_value', 'damage_infra_electricity_value', 'damage_infra_water_value', 'damage_infra_sewage_value', 'damage_infra_communication_value', 'damage_infra_medical_value', 'damage_infra_educational_value', 'damage_infra_institutions_value', 'damage_infra_industries_value', 'effect_loss_land_value', 'effect_loss_agri_value', 'effect_loss_livestock_value', 'latitude', 'longitude', 'total_loss_value_rs'], 'number'],
            [['event_date', 'metadata_source_date', 'metadata_collected_date', 'metadata_verified_date', 'created_at', 'updated_at', 'created_by', 'updated_by', 'locked_at'], 'safe'],
            [['event_type', 'event_magnitude', 'event_centre', 'event_cause', 'event_duration', 'location_state', 'location_district', 'location_localbody', 'location_placename', 'location_region', 'location_ecology', 'damage_infra_road_type', 'damage_infra_road_unit', 'damage_infra_bridge_type', 'damage_infra_bridge_unit', 'damage_infra_electricity_type', 'damage_infra_electricity_unit', 'damage_infra_water_type', 'damage_infra_water_unit', 'damage_infra_sewage_type', 'damage_infra_sewage_unit', 'damage_infra_communication_type', 'damage_infra_communication_unit', 'damage_infra_medical_type', 'damage_infra_medical_unit', 'damage_infra_educational_type', 'damage_infra_educational_unit', 'damage_infra_institutions_type', 'damage_infra_institutions_unit', 'damage_infra_industries_type', 'damage_infra_industries_unit', 'total_loss_value_usd', 'metadata_collected_by', 'metadata_verified_by', 'effect_loss_land_unit', 'effect_loss_agri_unit', 'effect_loss_livestock_unit'], 'string', 'max' => 255],
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
            'event_magnitude' => 'Magnitude',
            'event_centre' => 'Event Centre',
            'event_cause' => 'Cause',
            'event_description' => 'Description',
            'event_duration' => 'Duration',
            'location_state' => 'State',
            'location_district' => 'District',
            'location_localbody' => 'Localbody',
            'location_wardno' => 'Wardno',
            'location_placename' => 'Placename',
            'location_region' => 'Region',
            'location_ecology' => 'Ecology',
            'effect_people_dead_m' => 'Dead M',
            'effect_people_dead_f' => 'Dead F',
            'effect_people_dead_t' => 'Dead T',
            'effect_people_injured_m' => 'Injured M',
            'effect_people_injured_f' => 'Injured F',
            'effect_people_injured_t' => 'Injured T',
            'effect_people_missing_m' => 'Missing M',
            'effect_people_missing_f' => 'Missing F',
            'effect_people_missing_t' => 'Missing T',
            'effect_people_affected_m' => 'Affected M',
            'effect_people_affected_f' => 'Affected F',
            'effect_people_affected_t' => 'Affected T',
            'effect_people_rescued_m' => 'Rescued M',
            'effect_people_rescued_f' => 'Rescued F',
            'effect_people_rescued_t' => 'Rescued T',
            'effect_people_relocated_m' => 'Relocated M',
            'effect_people_relocated_f' => 'Relocated F',
            'effect_people_relocated_t' => 'Relocated T',
            'effect_people_relieved_m' => 'Relieved M',
            'effect_people_relieved_f' => 'Relieved F',
            'effect_people_relieved_t' => 'Relieved T',
            'damage_house_building_complete' => 'Destroyed Building',
            'damage_house_building_partial' => 'Affected Building',
            'damage_house_building_value' => 'Building Value',
            'damage_house_shed_complete' => 'Destroyed Shed',
            'damage_house_shed_partial' => 'Affected Shed',
            'damage_house_shed_value' => 'Shed Value',
            'damage_infra_road_type' => 'Damaged Road Type',
            'damage_infra_road_quantity' => 'Road Quantity',
            'damage_infra_road_unit' => 'Road Unit',
            'damage_infra_road_value' => 'Road Value',
            'damage_infra_bridge_type' => 'Damaged Bridge Type',
            'damage_infra_bridge_quantity' => 'Bridge Quantity',
            'damage_infra_bridge_unit' => 'Bridge Unit',
            'damage_infra_bridge_value' => 'Bridge Value',
            'damage_infra_electricity_type' => 'Damaged Electricity Type',
            'damage_infra_electricity_quantity' => 'Electricity Quantity',
            'damage_infra_electricity_unit' => 'Electricity Unit',
            'damage_infra_electricity_value' => 'Electricity Value',
            'damage_infra_water_type' => 'Damaged Water Type',
            'damage_infra_water_quantity' => 'Water Quantity',
            'damage_infra_water_unit' => 'Water Unit',
            'damage_infra_water_value' => 'Water Value',
            'damage_infra_sewage_type' => 'Damaged Sewage Type',
            'damage_infra_sewage_quantity' => 'Sewage Quantity',
            'damage_infra_sewage_unit' => 'Sewage Unit',
            'damage_infra_sewage_value' => 'Sewage Value',
            'damage_infra_communication_type' => 'Damaged Communication Type',
            'damage_infra_communication_quantity' => 'Communication Quantity',
            'damage_infra_communication_unit' => 'Communication Unit',
            'damage_infra_communication_value' => 'Communication Value',
            'damage_infra_medical_type' => 'Damaged Medical Type',
            'damage_infra_medical_quantity' => 'Medical Quantity',
            'damage_infra_medical_unit' => 'Medical Unit',
            'damage_infra_medical_value' => 'Medical Value',
            'damage_infra_educational_type' => 'Damaged Educational Type',
            'damage_infra_educational_quantity' => 'Educational Quantity',
            'damage_infra_educational_unit' => 'Educational Unit',
            'damage_infra_educational_value' => 'Educational Value',
            'damage_infra_institutions_type' => 'Damaged Institutions Type',
            'damage_infra_institutions_quantity' => 'Institutions Quantity',
            'damage_infra_institutions_unit' => 'Institutions Unit',
            'damage_infra_institutions_value' => 'Institutions Value',
            'damage_infra_industries_type' => 'Damaged Industries Type',
            'damage_infra_industries_quantity' => 'Industries Quantity',
            'damage_infra_industries_unit' => 'Industries Unit',
            'damage_infra_industries_value' => 'Industries Value',
            'total_loss_value_rs' => 'Total Loss Value Rs',
            'total_loss_value_usd' => 'Total Loss Value Usd',
            'comment' => 'Comment',
            'metadata_source' => 'Source',
            'metadata_source_date' => 'Source Date',
            'metadata_collected_by' => 'Collected By',
            'metadata_collected_date' => 'Collected Date',
            'metadata_verified_by' => 'Verified By',
            'metadata_verified_date' => 'Verified Date',
            'effect_loss_land_quantity' => 'Loss Land Quantity',
            'effect_loss_land_unit' => 'Loss Land Unit',
            'effect_loss_land_value' => 'Loss Land Value',
            'effect_loss_agri_quantity' => 'Loss Agri Quantity',
            'effect_loss_agri_unit' => 'Loss Agri Unit',
            'effect_loss_agri_value' => 'Loss Agri Value',
            'effect_loss_livestock_quantity' => 'Loss Livestock Quantity',
            'effect_loss_livestock_unit' => 'Loss Livestock Unit',
            'effect_loss_livestock_value' => 'Loss Livestock Value',
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
            'HEAT WAVE' => 'Heat Wave',
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
        $coordinates = Ward::find()
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

    public function district_exists($attribute_name, $params)
    {
        $value = $this->{$attribute_name};
        if (count(Region::find()->where('district = :district', [':district' => $value])->one()) == 0) {
            $this->addError($attribute_name, $value . ' District not found!');
            return false;
        }
        return true;
    }


    public function localunit_exists($attribute_name, $params)
    {
        $value = $this->{$attribute_name};

        if (count(Localbody::find()->where('DDGN = :ddgn', [':ddgn' => $value])->one()) == 0) {
            $this->addError($attribute_name, $value . ' District not found!');
            return false;
        }
        return true;
    }


    /**
     * Method description
     *
     * @return mixed The return value
     */
    public function beforeValidate()
    {
        /*
                $data_card_no = $this->data_card_no;
                $i=0;
                while ($this->data_card_no_exists($data_card_no)) {
                    $i=$i+1;
                    $this->data_card_no =$data_card_no.'-'.$i;
                }*/
        return parent::beforeValidate();
    }

    public function data_card_no_exists($data_card_no)
    {
        return count(self::find()->where('data_card_no = :data_card_no', [':data_card_no' => $data_card_no])->one()) > 0;
    }

}
