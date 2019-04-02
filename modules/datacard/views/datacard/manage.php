<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\datacard\models\DatacardSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Manage Event Data Card Entries';
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
                <?= Html::a('Data Cards', ['index'], ['class' => 'btn btn-xs btn-primary pull-right']) ?>
            </p>
        </div>
        <div class="row">
            <div class="grid-box">
                <?= GridView::widget(['dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        [
                            'header' => 'Locked status',
                            'value' => function ($model) {
                                /**
                                 * @var \app\modules\datacard\models\Datacard $model
                                 */
                                if ($model->isLocked) {
                                    if (\Yii::$app->user->can('lock-datacard')) {
                                        return Html::a('Unlock', ['lock', 'id' => $model->id], ['class' => 'btn btn-xs btn-success btn-lock',
                                            'data-method' => 'post',
                                            'data-confirm' => 'Are you sure you want to unlock this record?',]);
                                    } else {
                                        return Html::tag('span', 'Locked', ['class' => 'label label-xs label-default label-lock',]);
                                    }

                                } else {
                                    if (\Yii::$app->user->can('lock-datacard')) {
                                        return Html::a('Lock', ['lock', 'id' => $model->id], ['class' => 'btn btn-xs btn-danger btn-lock',
                                            'data-method' => 'post',
                                            'data-confirm' => 'Are you sure you want to lock this record?',]);
                                    } else {
                                        return Html::tag('span', 'Unlocked', ['class' => 'label label-xs label-success label-lock',]);
                                    }

                                }
                            },
                            'format' => 'raw',
                        ],

                        [
                            'class' => 'yii\grid\ActionColumn',
                            'visibleButtons' => [
                                'view' => function ($model, $key, $index) {
                                    return (\Yii::$app->user->can('view-datacard', ['model' => $model])) ? true : false;
                                },
                                'update' => function ($model, $key, $index) {
                                    return (\Yii::$app->user->can('update-datacard', ['model' => $model])) ? true : false;
                                },
                                'delete' => function ($model, $key, $index) {
                                    return (\Yii::$app->user->can('delete-datacard', ['model' => $model])) ? true : false;
                                }
                            ]
                        ],
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
                        ['attribute' => 'event_type',
                            //'label'=>'Author',

                            'value' => function ($model, $key, $index, $widget) {
                                /**
                                 * @var \app\modules\datacard\models\Datacard $model
                                 */
                                return $model->getValueOf_eventType();
                            },
                            'format' => 'raw'],
                        ['attribute' => 'event_cause',
                            //'label'=>'Author',

                            'value' => function ($model, $key, $index, $widget) {
                                /**
                                 * @var \app\modules\datacard\models\Datacard $model
                                 */
                                return $model->getValueOf_eventCause();
                            },
                            'format' => 'raw'],
                        'event_magnitude',
                        'event_duration',
                        'event_centre',
                        ['attribute' => 'event_description',
                            'label' => 'Description',], ['attribute' => 'location_district',
                            'label' => 'District',],

                        ['attribute' => 'location_localbody',
                            'label' => 'Local Body',

                            'value' => function ($model, $key, $index, $widget) {
                                /**
                                 * @var \app\modules\datacard\models\Datacard $model
                                 */
                                return $model->getValueOf_locationLocalBody();
                            },
                            'format' => 'raw'],
                        ['attribute' => 'location_wardno',
                            'label' => 'Ward No',], ['attribute' => 'location_placename',
                            'label' => 'Place Name',],
                        ['attribute' => 'location_state',
                            'label' => 'State',], ['attribute' => 'location_region',
                            'label' => 'Region',], ['attribute' => 'location_ecology',
                            'label' => 'Ecology',],],]); ?>
            </div>
        </div>
    </div>
</div>