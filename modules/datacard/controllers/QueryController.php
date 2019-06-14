<?php
/**
 * Created by PhpStorm.
 * User: Ram_DFID
 * Date: 18/03/2019
 * Time: 13:20
 */

namespace app\modules\datacard\controllers;

use app\modules\datacard\models\Datacard;
use app\modules\datacard\models\DatacardQueryForm;
use app\modules\datacard\models\Localbody;
use app\modules\datacard\models\Proviences;
use app\modules\datacard\models\Region;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use Yii;
use yii\data\ActiveDataProvider;

class QueryController extends Controller
{
    public function actionIndex()
    {
        $request = Yii::$app->request;

        $model = new DatacardQueryForm();
        $proviences = self::getProviencesList();
        $districts = [];
        $localbodies = [];

        if ($request->post()) {
            $params=$request->post();
            $model->load($request->post());
            $model->validate();

            $proviences = self::getProviencesList();
            $districts = self::getDistrictsList($model->location_state);
            $localbodies = self::getLocalBodiesList($model->location_district);

            $dataProvider = $model->search($params);
            return $this->render(
                'index',
                [
                    'model' => $model,
                    'districts' => $districts,
                    'proviences' => $proviences,
                    'localbodies' => $localbodies,
                    'dataProvider' => $dataProvider,
                ]
            );
        }

        //$this->layout = '@app/views/layouts/reports';
        return $this->render(
            'index',
            [
                'model' => $model,
                'districts' => $districts,
                'proviences' => $proviences,
                'localbodies' => $localbodies,
            ]
        );
    }

    public static function getProviencesList()
    {
        /*$rows = Region::find()->select('district')->asArray()->all();
        $options=[];
        foreach ($rows as $row){
            $option = [];
            $option['id']=$row['district'];
            $option['name']=$row['district'];
            array_push($options,$option);
        }
        return $options;*/

        return ArrayHelper::map(Proviences::find()->select('number')->asArray()->all(), 'number', 'number');
    }

    public static function getDistrictsList($provience)
    {
        /*
        $rows = Region::find()->select('district')->where(['state' => $provience])->asArray()->all();
        $options = [];
        foreach ($rows as $row) {
            $option = [];
            $option['id'] = $row['district'];
            $option['name'] = $row['district'];
            array_push($options, $option);
        }
        return $options;
        */
        return ArrayHelper::map(Region::find()->select('district')->where(['state' => $provience])->asArray()->all(), 'district', 'district');

    }

    /**
     * @param $district
     * @return array
     * Array ( [0] => Array ( [id] => 75001 [name] => Apihimal ) [1] => Array ( [id] => 75002 [name] => Byas ) [2] => Array ( [id] => 75003 [name] => Dunhu ) [3] => Array ( [id] => 75004 [name] => Lekam ) [4] => Array ( [id] => 75005 [name] => Mahakali ) [5] => Array ( [id] => 75006 [name] => Malikaarjun ) [6] => Array ( [id] => 75007 [name] => Marma ) [7] => Array ( [id] => 75008 [name] => Naugad ) [8] => Array ( [id] => 75009 [name] => Shailyashikhar ) )
     */
    public static function getLocalBodiesList($district)
    {
        /*
        $rows = Localbody::find()->select('ddgn,local_bodies')->where(['district' => $district])->asArray()->all();
        $options = [];
        foreach ($rows as $row) {
            $option = [];
            $option['id'] = $row['ddgn'];
            $option['name'] = $row['local_bodies'];
            array_push($options, $option);
        }
        return $options;
        */
        return ArrayHelper::map(Localbody::find()->select('DDGN, local_bodies')->where(['district' => $district])->asArray()->all(), 'DDGN', 'local_bodies');
    }
}