<?php
/**
 * Created by PhpStorm.
 * User: Ram_DFID
 * Date: 18/03/2019
 * Time: 13:20
 */

namespace app\modules\datacard\controllers;

use app\modules\datacard\models\DatacardQueryForm;
use app\modules\datacard\models\Proviences;
use app\modules\datacard\models\Region;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use Yii;

class QueryController extends Controller
{
    public function actionIndex()
    {
        $request = Yii::$app->request;

        $model = new DatacardQueryForm();
        $districts = self::getLocalDistrictsList();
        $proviences = self::getProviencesList();

        // Get Event Name


        //$this->layout = '@app/views/layouts/reports';
        return $this->render(
            'index',
            [
                'model' => $model,
                'districts' => $districts,
                'proviences' => $proviences,
            ]
        );
    }

    public static function getLocalDistrictsList()
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
        return ArrayHelper::map(Region::find()->select('district')->asArray()->all(), 'district', 'district');
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

        return ArrayHelper::map(Proviences::find()->select('number','number')->asArray()->all(), 'number', 'number');
    }

}