<?php
/**
 * Created by PhpStorm.
 * User: Ram_DFID
 * Date: 18/03/2019
 * Time: 13:20
 */

namespace app\controllers;


use yii\web\Controller;
use Yii;

class QueryController extends Controller
{
    public function actionIndex(){
        $request  = Yii::$app->request;


        // Get Event Name


        //$this->layout = '@app/views/layouts/reports';
        return $this->render(
          'index',
          [

          ]
        );
    }

}