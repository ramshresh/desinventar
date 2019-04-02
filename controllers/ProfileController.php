<?php
/**
 * Created by PhpStorm.
 * User: Ram_DFID
 * Date: 10/01/2019
 * Time: 10:08
 */

namespace app\controllers;

use app\modules\datacard\models\Datacard;
use yii;
use yii\web\Controller;

class ProfileController extends Controller
{
    public function actionIndex()
    {
        $request = Yii::$app->request;

        $event_name =$request->get('event_name');
        $provience_name =$request->get('provience_name');

        $multihazardSummary = $this->getMultihazardProfileData($event_name,$provience_name);
        $distinctEventTypes = $this->getDistinctEventTypes($event_name,$provience_name);

        $this->layout = '@app/views/layouts/reports';
        return $this->render(
            'index',
            [
                'event_name'=>$event_name,
                'provience_name'=>$provience_name,
                'multihazard_summary'=>$multihazardSummary,
                'distinct_event_types'=>$distinctEventTypes
            ]
        );
    }


    public function getMultihazardProfileData($event_name,$provience_name){
        $multihazardSummary = Datacard::find()
            ->select([
                    'COUNT(*) AS datacards',
                    'SUM(effect_people_dead_t) AS deaths'
                    ,'SUM(effect_people_affected_t) AS affected'
                    ,'SUM(damage_house_building_complete) AS building_destroyed'
                    ,'SUM(damage_house_building_partial) AS building_damaged'
                    , 'event_type as event_type'
                ]);
        if(isset($event_name) && $event_name!='' ){
            $multihazardSummary->andWhere('event_type=:event_type', [':event_type' => $event_name]);
        }
        if (isset($provience_name) && $provience_name !='') {
            $multihazardSummary->andWhere('location_state=:location_state', [':location_state' => $provience_name]);
        }
        $multihazardSummary->groupBy(['event_type']);

        return $multihazardSummary->asArray()->all();
    }

    public function getDistinctEventTypes($event_name,$provience_name){
        $query = Datacard::find()
            ->select([
                    'DISTINCT(event_type) AS event_type'
                ]);
        if(isset($event_name) && $event_name!='' ){
            $query->andWhere('event_type=:event_type', [':event_type' => $event_name]);
        }
        if (isset($provience_name) && $provience_name !='') {
            $query->andWhere('location_state=:location_state', [':location_state' => $provience_name]);
        }
        $query->groupBy(['event_type']);
        $rows = $query->asArray()->all();
        $list=[];
        foreach ($rows as $row){
            array_push($list,$row['event_type']);
        }
        return $list;
    }
}