<?php
/**
 * Created by PhpStorm.
 * User: Ram_DFID
 * Date: 04/04/2019
 * Time: 09:26
 */

namespace app\modules\datacard\controllers;


use app\modules\datacard\models\Datacard;
use app\modules\datacard\models\Region;
use yii\web\Controller;

class ReportsController extends Controller
{
    public function actionIndex()
    {

    }

    public function actionMultiHazardProfile()
    {
        /**
         * SELECT
         * DISTINCT(datacards.event_type) as Event,
         * COUNT(*) as DataCards,
         * sum(datacards.effect_people_dead_t) as Deaths,
         * sum(datacards.effect_people_injured_t) as Injured,
         * sum(datacards.effect_people_missing_t) as Missing,
         * sum(datacards.effect_people_affected_t) as Affected,
         * sum(datacards.damage_house_building_complete) as Destroyed,
         * sum(datacards.damage_house_building_partial) as Damaged,
         * sum(datacards.effect_people_relocated_t) as Relocated,
         * sum(datacards.effect_people_rescued_t) as Rescued,
         * sum(datacards.effect_people_relieved_t) as Relieved,
         * sum(datacards.total_loss_value_rs) as Losses_nrs,
         * sum(datacards.total_loss_value_usd) as Losses_usd,
         * sum(datacards.damage_infra_educational_quantity) as EducationCenters,
         * sum(datacards.damage_infra_medical_quantity) as Hospitals,
         * sum(datacards.effect_loss_agri_quantity) as DamagesInCrops_ha,
         * sum(datacards.effect_loss_livestock_quantity) as LostCattle,
         * sum(datacards.damage_infra_road_quantity) as DamagedInRoads_mts
         *
         *
         * from datacards GROUP BY datacards.event_type;
         */


        $compositionOfDisasters = Datacard::find()->select('DISTINCT(datacards.event_type) as Event,
                                COUNT(*) as DataCards,
                                sum(datacards.effect_people_dead_t) as Deaths,
                                sum(datacards.effect_people_injured_t) as Injured,
                                sum(datacards.effect_people_missing_t) as Missing,
                                sum(datacards.effect_people_affected_t) as Affected,
                                sum(datacards.damage_house_building_complete) as Destroyed,
                                sum(datacards.damage_house_building_partial) as Damaged,
                                
                                sum(datacards.damage_house_building_partial)+sum(datacards.damage_house_building_complete) as DestroyedDamaged,
                                
                                sum(datacards.effect_people_relocated_t) as Relocated,
                                sum(datacards.effect_people_rescued_t) as Rescued,
                                sum(datacards.effect_people_relieved_t) as Relieved,
                                sum(datacards.total_loss_value_rs) as Losses_nrs,
                                sum(datacards.total_loss_value_usd) as Losses_usd,
                                sum(datacards.damage_infra_educational_quantity) as EducationCenters,
                                sum(datacards.damage_infra_medical_quantity) as Hospitals,
                                sum(datacards.effect_loss_agri_quantity) as DamagesInCrops_ha,
                                sum(datacards.effect_loss_livestock_quantity) as LostCattle,
                                sum(datacards.damage_infra_road_quantity) as DamagesInRoads_mts')
            ->groupBy('datacards.event_type')
            ->asArray()->all();
        foreach ($compositionOfDisasters as $index=>$row){
            $compositionOfDisasters[$index]['DataCards'] = (int) $row['DataCards'];
            $compositionOfDisasters[$index]['Deaths'] = (int) $row['Deaths'];
            $compositionOfDisasters[$index]['Injured'] = (int) $row['Injured'];
            $compositionOfDisasters[$index]['Missing'] = (int) $row['Missing'];
            $compositionOfDisasters[$index]['Affected'] = (int) $row['Affected'];
            $compositionOfDisasters[$index]['Destroyed'] = (int) $row['Destroyed'];
            $compositionOfDisasters[$index]['Damaged'] = (int) $row['Damaged'];
            $compositionOfDisasters[$index]['DestroyedDamaged'] = (int) $row['DestroyedDamaged'];
            $compositionOfDisasters[$index]['Relocated'] = (int) $row['Relocated'];
            $compositionOfDisasters[$index]['Rescued'] = (int) $row['Rescued'];
            $compositionOfDisasters[$index]['Relieved'] = (int) $row['Relieved'];
            $compositionOfDisasters[$index]['Losses_nrs'] = (int) $row['Losses_nrs'];
            $compositionOfDisasters[$index]['Losses_usd'] = (int) $row['Losses_usd'];
            $compositionOfDisasters[$index]['EducationCenters'] = (int) $row['EducationCenters'];
            $compositionOfDisasters[$index]['Hospitals'] = (int) $row['Hospitals'];
            $compositionOfDisasters[$index]['DamagesInCrops_ha'] = (int) $row['DamagesInCrops_ha'];
            $compositionOfDisasters[$index]['LostCattle'] = (int) $row['LostCattle'];
            $compositionOfDisasters[$index]['DamagesInRoads_mts'] = (int) $row['DamagesInRoads_mts'];
        }
        $temporalBehaviour = Datacard::find()->select('YEAR(event_date) as Year,
                                COUNT(*) as DataCards,
                                sum(datacards.effect_people_dead_t) as Deaths,
                                sum(datacards.effect_people_injured_t) as Injured,
                                sum(datacards.effect_people_missing_t) as Missing,
                                sum(datacards.effect_people_affected_t) as Affected,
                                sum(datacards.damage_house_building_complete) as Destroyed,
                                sum(datacards.damage_house_building_partial) as Damaged,
                                sum(datacards.effect_people_relocated_t) as Relocated,
                                sum(datacards.effect_people_rescued_t) as Rescued,
                                sum(datacards.effect_people_relieved_t) as Relieved,
                                sum(datacards.total_loss_value_rs) as Losses_nrs,
                                sum(datacards.total_loss_value_usd) as Losses_usd,
                                sum(datacards.damage_infra_educational_quantity) as EducationCenters,
                                sum(datacards.damage_infra_medical_quantity) as Hospitals,
                                sum(datacards.effect_loss_agri_quantity) as DamagesInCrops_ha,
                                sum(datacards.effect_loss_livestock_quantity) as LostCattle,
                                sum(datacards.damage_infra_road_quantity) as DamagesInRoads_mts')
            ->groupBy('Year')
            ->asArray()->all();

        $distinctYears = Datacard::find()->select('DISTINCT(YEAR(event_date)) as Years')
            ->groupBy('Years')
            ->orderBy('Years asc')
            ->asArray()->all();

        $spatialDistribution = Region::find()->select('regions.district as District, regions.state as Provience,
                                COUNT(*) as DataCards,
                                sum(datacards.effect_people_dead_t) as Deaths,
                                sum(datacards.effect_people_injured_t) as Injured,
                                sum(datacards.effect_people_missing_t) as Missing,
                                sum(datacards.effect_people_affected_t) as Affected,
                                sum(datacards.damage_house_building_complete) as Destroyed,
                                sum(datacards.damage_house_building_partial) as Damaged,
                                sum(datacards.effect_people_relocated_t) as Relocated,
                                sum(datacards.effect_people_rescued_t) as Rescued,
                                sum(datacards.effect_people_relieved_t) as Relieved,
                                sum(datacards.total_loss_value_rs) as Losses_nrs,
                                sum(datacards.total_loss_value_usd) as Losses_usd,
                                sum(datacards.damage_infra_educational_quantity) as EducationCenters,
                                sum(datacards.damage_infra_medical_quantity) as Hospitals,
                                sum(datacards.effect_loss_agri_quantity) as DamagesInCrops_ha,
                                sum(datacards.effect_loss_livestock_quantity) as LostCattle,
                                sum(datacards.damage_infra_road_quantity) as DamagesInRoads_mts'
        )
            ->leftJoin('datacards','datacards.location_district = regions.district')
            ->groupBy('District')
            ->orderBy('Provience')
            ->asArray()->all();



        $distinctEventTypes = Datacard::find()->select('DISTINCT(datacards.event_type) as Events')
            ->groupBy('datacards.event_type')
            ->asArray()->all();


        return $this->render('multi-hazard-profile',
            [
                'compositionOfDisasters' => $compositionOfDisasters,
                'distinct_event_types' => $distinctEventTypes,
                'distinct_years' => $distinctYears,
                'multihazard_summary' => $compositionOfDisasters,
                'temporalBehaviour' => $temporalBehaviour,
                'spatialDistribution' => $spatialDistribution,
            ]
        );
    }

    public function actionByProvience()
    {
        echo 'ok';
        exit;
    }

    public function actionByDistrict()
    {
        echo 'ok';
        exit;
    }

    public function actionByMunicipality()
    {
        echo 'ok';
        exit;
    }
}