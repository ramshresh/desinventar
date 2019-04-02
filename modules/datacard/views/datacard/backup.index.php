<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\datacard\models\DatacardSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'List of Data Card Entries';
$this->params['breadcrumbs'][] = ['label' => 'Datacards', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="datacard-index card row">
    <div class="col-md-12">
        <div class="row">
            <h3><?= Html::encode($this->title) ?></h3>
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        </div>
        <div class="row">
            <p>
                <?php if (\Yii::$app->user->can('create-datacard')) {
                    echo Html::a('Add New Event', ['create'], ['class' => 'btn btn-xs btn-success']);
                }
                ?>
                <?= Html::a('Download', ['download-page'], ['class' => 'btn btn-xs btn-primary pull-right']) ?>
                <?php if (\Yii::$app->user->can('manage-datacard')) {
                 echo Html::a('Manage', ['manage'], ['class' => 'btn btn-xs btn-primary pull-right']); }
                 ?>
            </p>
        </div>
        <div class="row">
            <div class="grid-box">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        ['class' => 'yii\grid\ActionColumn','template'=>'{view}'],
                        [
                            'attribute' => 'created_by',
                            //'label'=>'Author',

                            'value' => function ($model, $key, $index, $widget) {
                                /**
                                 * @var \app\modules\datacard\models\Datacard $model
                                 */
                                return $model->getValueOf_createdBy();
                            },
                            'format' => 'raw'
                        ],
                        'data_card_no',
                        'event_date',
                        [
                            'attribute' => 'event_type',
                            //'label'=>'Author',

                            'value' => function ($model, $key, $index, $widget) {
                                /**
                                 * @var \app\modules\datacard\models\Datacard $model
                                 */
                                return $model->getValueOf_eventType();
                            },
                            'format' => 'raw'
                        ],
                        [
                            'attribute' => 'event_cause',
                            //'label'=>'Author',

                            'value' => function ($model, $key, $index, $widget) {
                                /**
                                 * @var \app\modules\datacard\models\Datacard $model
                                 */
                                return $model->getValueOf_eventCause();
                            },
                            'format' => 'raw'
                        ],
                        'event_magnitude',
                        'event_duration',
                        'event_centre',
                        [
                            'attribute' => 'event_description',
                            'label' => 'Description',
                        ], [
                            'attribute' => 'location_district',
                            'label' => 'District',
                        ],

                        [
                            'attribute' => 'location_localbody',
                            'label' => 'Local Body',

                            'value' => function ($model, $key, $index, $widget) {
                                /**
                                 * @var \app\modules\datacard\models\Datacard $model
                                 */
                                return $model->getValueOf_locationLocalBody();
                            },
                            'format' => 'raw'
                        ],
                        [
                            'attribute' => 'location_wardno',
                            'label' => 'Ward No',

                            'value' => function ($model, $key, $index, $widget) {
                                /**
                                 * @var \app\modules\datacard\models\Datacard $model
                                 */
                                return $model->getValueOf_locationWardNo();
                            },
                            'format' => 'raw'
                        ],
                        /*[
                            'attribute' => 'location_wardno',
                            'label' => 'Ward No',
                        ],*/
                        [
                            'attribute' => 'location_placename',
                            'label' => 'Place Name',
                        ],
                        [
                            'attribute' => 'location_state',
                            'label' => 'State',
                        ], [
                            'attribute' => 'location_region',
                            'label' => 'Region',
                        ], [
                            'attribute' => 'location_ecology',
                            'label' => 'Ecology',
                        ],

                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>