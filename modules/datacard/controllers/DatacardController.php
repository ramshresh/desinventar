<?php

namespace app\modules\datacard\controllers;

use app\modules\datacard\components\DatacardAuthorAccessRule;
use app\modules\datacard\models\Localbody;
use app\modules\datacard\models\Region;

use app\modules\datacard\models\Ward;
use app\modules\datacard\traits\EventTrait;
use Yii;
use app\modules\datacard\models\Datacard;
use app\modules\datacard\models\DatacardSearch;
use yii\filters\AccessControl;
use yii\filters\AccessRule;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DatacardController implements the CRUD actions for Datacard model.
 */
class DatacardController extends Controller
{
    use EventTrait;

    /**
     * Event is triggered before locking existing record.
     * Triggered with \app\modules\datacard\events\DatacardEvent.
     */
    const EVENT_BEFORE_LOCK = 'beforeLock';

    /**
     * Event is triggered after locking existing record.
     * Triggered with \app\modules\datacard\events\DatacardEvent.
     */
    const EVENT_AFTER_LOCK = 'afterBlock';

    /**
     * Event is triggered before unlocking existing record.
     * Triggered with \app\modules\datacard\events\DatacardEvent.
     */
    const EVENT_BEFORE_UNLOCK = 'beforeUnlock';

    /**
     * Event is triggered after unlocking existing record.
     * Triggered with \app\modules\datacard\events\DatacardEvent.
     */
    const EVENT_AFTER_UNLOCK = 'afterUnlock';

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
            'access' => [
                'class' => AccessControl::className(),
                'ruleConfig' => [
                    'class' => AccessRule::className(),
                ],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['list-datacard'],
                    ],
                    [
                        'actions' => ['view'],
                        'allow' => true,
                        'roles' => ['?','view-datacard'],
                    ],
                    [
                        'actions' => ['create'],
                        'allow' => true,
                        'roles' => ['create-datacard'],
                    ],
                    [
                        'actions' => ['update'],
                        'allow' => true,
                        'roles' => ['update-datacard'],
                        'roleParams' => function () {
                            return ['model' => Datacard::findOne(Yii::$app->request->get('id'))];
                        },
                    ],
                    [
                        'actions' => ['delete'],
                        'allow' => true,
                        'roles' => ['delete-datacard'],
                        'roleParams' => function () {
                            return ['model' => Datacard::findOne(Yii::$app->request->get('id'))];
                        },
                    ],
                    [
                        'actions' => ['manage'],
                        'allow' => true,
                        'roles' => ['manage-datacard'],
                    ],
                    [
                        'actions' => ['download-page', 'download-all'],
                        'allow' => true,
                        'roles' => ['?','download-datacard'],
                    ],
                    [
                        'actions' => ['lock'],
                        'allow' => true,
                        'roles' => ['lock-datacard'],
                    ]
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
        $dataProvider->pagination->pageSize = 15;
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all Datacard models.
     * @return mixed
     */
    public function actionManage()
    {
        Url::remember('', 'actions-redirect');
        $searchModel = new DatacardSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize = 15;
        return $this->render('manage', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all Datacard models.
     * @return mixed
     */
    public function actionDownloadPage()
    {
        $searchModel = new DatacardSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize = 15;
        return $this->render('download-page', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**ch
     * Displays a single Datacard model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
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

        if ($model->load(Yii::$app->request->post())) {
		
			if ($model->save()){
				return $this->redirect(['view', 'id' => $model->id]);
			}else{
				echo json_encode($model->errors);exit;
			}
        }

        $districts = self::getLocalDistrictsList();

        return $this->render('create', [
            'model' => $model,
            'districts' => $districts,
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

        $location_district = $model->location_district;
        $location_localbody = $model->location_localbody;
        $location_wardno = $model->location_wardno;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $districts = self::getLocalDistrictsList();
        $localbodies = ArrayHelper::map(Localbody::find()->select('ddgn,local_bodies')
            ->where([
                'district' => $location_district
            ])->asArray()->all(), 'ddgn', 'local_bodies');
        $wardnos = ArrayHelper::map(Ward::find()->select('DDGNWW,NEW_WARD_N')
            ->where([
                'DDGN' => $location_localbody
            ])->asArray()->all(), 'DDGNWW', 'NEW_WARD_N');

        return $this->render('update', [
            'model' => $model,
            'districts' => $districts,
            'localbodies' => $localbodies,
            'wardnos' => $wardnos,
            'location_localbody' => $location_localbody,
            'location_wardno' => $location_wardno
        ]);
    }

    public function actionDownloadAll()
    {
        $searchModel = new DatacardSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		$dataProvider->pagination=false;

        return $this->renderPartial('download', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
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
     * Locks the record.
     *
     * @param int $id
     *
     * @return Response
     */
    public function actionLock($id)
    {
        $datacard = $this->findModel($id);
        $event = $this->getDatacardEvent($datacard);
        if ($datacard->getIsLocked()) {
            $this->trigger(self::EVENT_BEFORE_UNLOCK, $event);
            $datacard->unlock();
            $this->trigger(self::EVENT_AFTER_UNLOCK, $event);
            \Yii::$app->getSession()->setFlash('success', 'Record has been unlocked');
        } else {
            $this->trigger(self::EVENT_BEFORE_LOCK, $event);
            $datacard->lock();
            $this->trigger(self::EVENT_AFTER_LOCK, $event);
            \Yii::$app->getSession()->setFlash('success', 'Record has been locked');
        }

        return $this->redirect(Url::previous('actions-redirect'));
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

}
