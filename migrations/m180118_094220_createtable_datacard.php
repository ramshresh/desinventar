<?php

use yii\db\Migration;
use \yii\db\Schema;
/**
 * Class m180118_094220_createtable_datacard
 */
class m180118_094220_createtable_datacard extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('datacards', [
            'id' => Schema::TYPE_PK,
            'data_card_no'=>Schema::TYPE_INTEGER . ' NOT NULL',

            'event_date'=>Schema::TYPE_DATE . ' NOT NULL',
            'event_type' => Schema::TYPE_STRING . ' NOT NULL', //
            'event_magnitude' => Schema::TYPE_STRING,
            'event_centre' => Schema::TYPE_STRING,
            'event_cause' => Schema::TYPE_STRING . ' NOT NULL',
            'event_description' => Schema::TYPE_TEXT,
            'event_duration' => Schema::TYPE_STRING,

            'location_state' => Schema::TYPE_STRING,
            'location_district' => Schema::TYPE_STRING . ' NOT NULL',
            'location_localbody' => Schema::TYPE_STRING . ' NOT NULL',
            'location_wardno' => Schema::TYPE_INTEGER,
            'location_placename' => Schema::TYPE_STRING,

            'location_region' => Schema::TYPE_STRING,
            'location_ecology' => Schema::TYPE_STRING,

            //Casualties
            'effect_people_dead_m' => Schema::TYPE_INTEGER,
            'effect_people_dead_f' => Schema::TYPE_INTEGER,
            'effect_people_dead_t' => Schema::TYPE_INTEGER,

            'effect_people_injured_m' => Schema::TYPE_INTEGER,
            'effect_people_injured_f' => Schema::TYPE_INTEGER,
            'effect_people_injured_t' => Schema::TYPE_INTEGER,

            'effect_people_missing_m' => Schema::TYPE_INTEGER,
            'effect_people_missing_f' => Schema::TYPE_INTEGER,
            'effect_people_missing_t' => Schema::TYPE_INTEGER,

            'effect_people_affected_m' => Schema::TYPE_INTEGER,
            'effect_people_affected_f' => Schema::TYPE_INTEGER,
            'effect_people_affected_t' => Schema::TYPE_INTEGER,

            'effect_people_rescued_m' => Schema::TYPE_INTEGER,
            'effect_people_rescued_f' => Schema::TYPE_INTEGER,
            'effect_people_rescued_t' => Schema::TYPE_INTEGER,

            'effect_people_relocated_m' => Schema::TYPE_INTEGER,
            'effect_people_relocated_f' => Schema::TYPE_INTEGER,
            'effect_people_relocated_t' => Schema::TYPE_INTEGER,

            'effect_people_relieved_m' => Schema::TYPE_INTEGER,
            'effect_people_relieved_f' => Schema::TYPE_INTEGER,
            'effect_people_relieved_t' => Schema::TYPE_INTEGER,

            //Damage of Houses
            'damage_house_building_complete' => Schema::TYPE_INTEGER,
            'damage_house_building_partial' => Schema::TYPE_INTEGER,
            'damage_house_building_value' => Schema::TYPE_DECIMAL,

            'damage_house_shed_complete' => Schema::TYPE_INTEGER,
            'damage_house_shed_partial' => Schema::TYPE_INTEGER,
            'damage_house_shed_value' => Schema::TYPE_DECIMAL,

            //Damage in Infrastructures
            'damage_infra_road_type' => Schema::TYPE_STRING,
            'damage_infra_road_quantity' => Schema::TYPE_INTEGER,
            'damage_infra_road_unit' => Schema::TYPE_STRING,
            'damage_infra_road_value' => Schema::TYPE_DECIMAL,

            'damage_infra_bridge_type' => Schema::TYPE_STRING,
            'damage_infra_bridge_quantity' => Schema::TYPE_INTEGER,
            'damage_infra_bridge_unit' => Schema::TYPE_STRING,
            'damage_infra_bridge_value' => Schema::TYPE_DECIMAL,

            'damage_infra_electricity_type' => Schema::TYPE_STRING,
            'damage_infra_electricity_quantity' => Schema::TYPE_INTEGER,
            'damage_infra_electricity_unit' => Schema::TYPE_STRING,
            'damage_infra_electricity_value' => Schema::TYPE_DECIMAL,

            'damage_infra_water_type' => Schema::TYPE_STRING,
            'damage_infra_water_quantity' => Schema::TYPE_INTEGER,
            'damage_infra_water_unit' => Schema::TYPE_STRING,
            'damage_infra_water_value' => Schema::TYPE_DECIMAL,

            'damage_infra_sewage_type' => Schema::TYPE_STRING,
            'damage_infra_sewage_quantity' => Schema::TYPE_INTEGER,
            'damage_infra_sewage_unit' => Schema::TYPE_STRING,
            'damage_infra_sewage_value' => Schema::TYPE_DECIMAL,

            'damage_infra_communication_type' => Schema::TYPE_STRING,
            'damage_infra_communication_quantity' => Schema::TYPE_INTEGER,
            'damage_infra_communication_unit' => Schema::TYPE_STRING,
            'damage_infra_communication_value' => Schema::TYPE_DECIMAL,

            'damage_infra_medical_type' => Schema::TYPE_STRING,
            'damage_infra_medical_quantity' => Schema::TYPE_INTEGER,
            'damage_infra_medical_unit' => Schema::TYPE_STRING,
            'damage_infra_medical_value' => Schema::TYPE_DECIMAL,

            'damage_infra_educational_type' => Schema::TYPE_STRING,
            'damage_infra_educational_quantity' => Schema::TYPE_INTEGER,
            'damage_infra_educational_unit' => Schema::TYPE_STRING,
            'damage_infra_educational_value' => Schema::TYPE_DECIMAL,

            'damage_infra_institutions_type' => Schema::TYPE_STRING,
            'damage_infra_institutions_quantity' => Schema::TYPE_INTEGER,
            'damage_infra_institutions_unit' => Schema::TYPE_STRING,
            'damage_infra_institutions_value' => Schema::TYPE_DECIMAL,

            'damage_infra_industries_type' => Schema::TYPE_STRING,
            'damage_infra_industries_quantity' => Schema::TYPE_INTEGER,
            'damage_infra_industries_unit' => Schema::TYPE_STRING,
            'damage_infra_industries_value' => Schema::TYPE_DECIMAL,

            'total_loss_value_rs' => Schema::TYPE_STRING,
            'total_loss_value_usd' => Schema::TYPE_STRING,

            'comment' => Schema::TYPE_TEXT,

            'metadata_source' => Schema::TYPE_TEXT . ' NOT NULL',
            'metadata_source_date' => Schema::TYPE_DATE . ' NOT NULL',
            'metadata_collected_by' => Schema::TYPE_STRING . ' NOT NULL',
            'metadata_collected_date' => Schema::TYPE_DATE,
            'metadata_verified_by' => Schema::TYPE_STRING,
            'metadata_verified_date' => Schema::TYPE_DATE,




            //Losses
            'effect_loss_land_quantity' => Schema::TYPE_INTEGER,
            'effect_loss_land_unit' => Schema::TYPE_STRING,
            'effect_loss_land_value' => Schema::TYPE_DECIMAL,

            'effect_loss_agri_quantity' => Schema::TYPE_INTEGER,
            'effect_loss_agri_unit' => Schema::TYPE_STRING,
            'effect_loss_agri_value' => Schema::TYPE_DECIMAL,

            'effect_loss_livestock_quantity' => Schema::TYPE_INTEGER,
            'effect_loss_livestock_unit' => Schema::TYPE_STRING,
            'effect_loss_livestock_value' => Schema::TYPE_DECIMAL,


            'created_by' => Schema::TYPE_STRING,
            'updated_by' => Schema::TYPE_STRING,
            'created_at' => Schema::TYPE_DATE,
            'updated_at' => Schema::TYPE_DATE,


        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('datacards');
        echo "m180118_094220_createtable_datacard reverted successfully.\n";

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180118_094220_createtable_datacard cannot be reverted.\n";

        return false;
    }
    */
}
