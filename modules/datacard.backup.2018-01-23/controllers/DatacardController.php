<?php

namespace app\modules\datacard\controllers;

use app\modules\datacard\models\Localbody;
use app\modules\datacard\models\Region;
use Yii;
use app\modules\datacard\models\Datacard;
use app\modules\datacard\models\DatacardSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DatacardController implements the CRUD actions for Datacard model.
 */
class DatacardController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Datacard models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DatacardSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Datacard model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model =$this->findModel($id);
        $modelForView = $model->getModelForView();
        return $this->render('view', [
            'model' => $modelForView,
        ]);
    }

    /**
     * Creates a new Datacard model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Datacard();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $districts=self::getLocalDistrictsList();

        return $this->render('create', [
            'model' => $model,
            'districts'=>$districts,
        ]);
    }

    /**
     * Updates an existing Datacard model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        /*
         * @var $mode Localbody
         */
        $model = $this->findModel($id);

        $location_district =$model->location_district;
        $location_localbody =$model->location_localbody;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $districts=self::getLocalDistrictsList();
        $localbodies= ArrayHelper::map(Localbody::find()->select('ddgn,local_bodies')
            ->where([
                'district'=>$location_district
            ])->asArray()->all(),'DDGN','local_bodies');

        return $this->render('update', [
            'model' => $model,
            'districts'=>$districts,
            'localbodies'=>$localbodies,
            'location_localbody'=>$location_localbody
        ]);
    }

    /**
     * Deletes an existing Datacard model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Datacard model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Datacard the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Datacard::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public static function getLocalDistrictsList(){
        /*$rows = Region::find()->select('district')->asArray()->all();
        $options=[];
        foreach ($rows as $row){
            $option = [];
            $option['id']=$row['district'];
            $option['name']=$row['district'];
            array_push($options,$option);
        }
        return $options;*/
        return ArrayHelper::map(Region::find()->select('district')->asArray()->all(),'district','district');
    }
}
