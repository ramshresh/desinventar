<?php
/**
 * Created by PhpStorm.
 * User: Ram_DFID
 * Date: 22/04/2019
 * Time: 13:16
 */

namespace app\modules\datacard\controllers;

use app\modules\datacard\models\Region;
use yii\rest\Controller;

class ApiController extends Controller
{
    public function actionByDist(){
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $result = Region::find()->select('regions.district as District, regions.state as Provience,
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
        return $result;
    }
}