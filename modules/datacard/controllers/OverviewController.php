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

class OverviewController extends Controller
{
    public function actionIndex()
    {
        echo 'ok';
        exit;
    }

    public function actionNepal()
    {
        return $this->render(
            'nepal',
            []
        );
    }

    public function actionProvience()
    {
        return $this->render(
            'provience',
            []
        );
    }

    public function actionDistricts()
    {
        return $this->render(
            'districts',
            []
        );
    }

    public function actionLocalBodies()
    {
        return $this->render(
            'local-bodies',
            []
        );
    }
}