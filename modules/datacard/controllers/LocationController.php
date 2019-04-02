<?php

namespace app\modules\datacard\controllers;

use app\modules\datacard\models\Localbody;
use app\modules\datacard\models\Ward;
use Yii;
use app\modules\datacard\models\Region;
use app\modules\datacard\models\RegionSearch;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * Class LocationController
 * @package app\modules\datacard\controllers
 */
class LocationController extends Controller
{
    public function actionLocalBodies() {
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $district = $parents[0];
                $out = self::getLocalBodiesList($district);
                // the getLocalBodiesList function will query the database based on the
                // district and return an array like below:
                // [
                //    ['id'=>'<DDGN-1>', 'name'=>'<local_bodies-1>'],
                //    ['id'=>'<DDGN-2>', 'name'=>'<local_bodies-2>']
                // ]
                echo Json::encode(['output'=>$out, 'selected'=>'']);
                return;
            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
    }
    public function actionWardNo() {
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $district = $parents[0];
                $out = self::getWardNoList($district);
                // the getLocalBodiesList function will query the database based on the
                // district and return an array like below:
                // [
                //    ['id'=>'<DDGN-1>', 'name'=>'<local_bodies-1>'],
                //    ['id'=>'<DDGN-2>', 'name'=>'<local_bodies-2>']
                // ]
                echo Json::encode(['output'=>$out, 'selected'=>'']);
                return;
            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
    }

    /**
     * @param $district
     * @return array
     * Array ( [0] => Array ( [id] => 75001 [name] => Apihimal ) [1] => Array ( [id] => 75002 [name] => Byas ) [2] => Array ( [id] => 75003 [name] => Dunhu ) [3] => Array ( [id] => 75004 [name] => Lekam ) [4] => Array ( [id] => 75005 [name] => Mahakali ) [5] => Array ( [id] => 75006 [name] => Malikaarjun ) [6] => Array ( [id] => 75007 [name] => Marma ) [7] => Array ( [id] => 75008 [name] => Naugad ) [8] => Array ( [id] => 75009 [name] => Shailyashikhar ) )
     */
    public static function getLocalBodiesList($district){
        $rows = Localbody::find()->select('ddgn,local_bodies')->where(['district'=>$district])->asArray()->all();
        $options=[];
        foreach ($rows as $row){
            $option = [];
            $option['id']=$row['ddgn'];
            $option['name']=$row['local_bodies'];
            array_push($options,$option);
        }
        return $options;
    } /**
     * @param $district
     * @return array
     * Array ( [0] => Array ( [id] => 75001 [name] => Apihimal ) [1] => Array ( [id] => 75002 [name] => Byas ) [2] => Array ( [id] => 75003 [name] => Dunhu ) [3] => Array ( [id] => 75004 [name] => Lekam ) [4] => Array ( [id] => 75005 [name] => Mahakali ) [5] => Array ( [id] => 75006 [name] => Malikaarjun ) [6] => Array ( [id] => 75007 [name] => Marma ) [7] => Array ( [id] => 75008 [name] => Naugad ) [8] => Array ( [id] => 75009 [name] => Shailyashikhar ) )
     */
    public static function getWardNoList($DDGN){
        $rows = Ward::find()->select('DDGNWW,NEW_WARD_N')->where(['DDGN'=>$DDGN])->orderBy(['NEW_WARD_N'=>SORT_ASC])->asArray()->all();
        $options=[];
        foreach ($rows as $row){
            $option = [];
            $option['id']=$row['DDGNWW'];
            $option['name']=$row['NEW_WARD_N'];
            array_push($options,$option);
        }
        return $options;
    }

    public function actionGetStateOfDistrict($district){
        //DISTRICT	no of GaPa	Ecology	Region	Zone
        $regions =Region::find()->select('no_of_ga_pa,ecology,region,zone')->where(['district'=>$district])->asArray()->one();
        $states =Localbody::find()->select('state')->where(['district'=>$district])->asArray()->one();

        $state =$states['state'];
        $region = $regions['region'];
        $zone = $regions['zone'];
        $ecology = $regions['ecology'];
        echo Json::encode(['state'=>$state, 'region'=>$region, 'zone'=>$zone, 'ecology'=>$ecology]);
        return;
    }

}

