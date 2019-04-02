<?php
use kartik\export\ExportMenu;
use kartik\grid\GridView;
use kartik\helpers\Html;

$this->title = 'Download Data';
$this->params['breadcrumbs'][] = ['label' => 'Datacards', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;



\app\modules\datacard\components\ExcelGrid::widget([
    'filename'=>'DataCardsEntries-'.date('Y-m-d-T-H:i:s'),
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    //'extension'=>'xlsx',
    //'filename'=>'excel',
    'properties' =>[
        //'creator'	=>'',
        //'title' 	=> '',
        //'subject' 	=> '',
        //'category'	=> '',
        //'keywords' 	=> '',
        //'manager' 	=> '',
        //'description'=>'BSOURCECODE',
        //'company'	=>'BSOURCE',
    ],
    'columns' =>  [
        ['class' => 'yii\grid\SerialColumn'],
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
            'attribute'=>'event_type',
            //'label'=>'Author',

            'value'=>function ($model, $key, $index, $widget) {
                /**
                 * @var \app\modules\datacard\models\Datacard $model
                 */
                return $model->getValueOf_eventType();
            },
            'format'=>'raw'
        ],
        'event_magnitude',
        'event_centre',
        [
            'attribute'=>'event_cause',
            //'label'=>'Author',

            'value'=>function ($model, $key, $index, $widget) {
                /**
                 * @var \app\modules\datacard\models\Datacard $model
                 */
                return $model->getValueOf_eventCause();
            },
            'format'=>'raw'
        ],
        'event_description:ntext',
        'event_duration',
        'location_state',
        'location_region',
        'location_ecology',
        'location_district',
        [
            'attribute'=>'location_localbody',
            //'label'=>'Author',

            'value'=>function ($model, $key, $index, $widget) {
                /**
                 * @var \app\modules\datacard\models\Datacard $model
                 */
                return $model->getValueOf_locationLocalBody();
            },
            'format'=>'raw'
        ],
        [
            'attribute'=>'location_wardno',
            //'label'=>'Author',

            'value'=>function ($model, $key, $index, $widget) {
                /**
                 * @var \app\modules\datacard\models\Datacard $model
                 */
                return $model->getValueOf_locationWardNo();
            },
            'format'=>'raw'
        ],
        //'location_wardno',
        'location_placename',

        [
            'attribute'=>'latitude',
            //'label'=>'Author',

            'value'=>function ($model, $key, $index, $widget) {
                /**
                 * @var \app\modules\datacard\models\Datacard $model
                 */
                return $model->getValueOf_WardCentroid()['LATITUDE'];
            },
            'format'=>'raw'
        ],
        [
            'attribute'=>'longitude',
            //'label'=>'Author',

            'value'=>function ($model, $key, $index, $widget) {
                /**
                 * @var \app\modules\datacard\models\Datacard $model
                 */
                return $model->getValueOf_WardCentroid()['LONGITUDE'];
            },
            'format'=>'raw'
        ],

        'effect_people_dead_m',
        'effect_people_dead_f',
        'effect_people_dead_t',

        /*[
            'attribute'=>'data_card_no',
            'label'=>'Author',
            'vAlign'=>'middle',
            'width'=>'190px',
            'value'=>function ($model, $key, $index, $widget) {
                return Html::a($model->author->name, '#', []);
            },
            'format'=>'raw'
        ],*/

        'effect_people_injured_m',
        'effect_people_injured_f',
        'effect_people_injured_t',
        'effect_people_missing_m',
        'effect_people_missing_f',
        'effect_people_missing_t',
        'effect_people_affected_m',
        'effect_people_affected_f',
        'effect_people_affected_t',
        'effect_people_rescued_m',
        'effect_people_rescued_f',
        'effect_people_rescued_t',
        'effect_people_relocated_m',
        'effect_people_relocated_f',
        'effect_people_relocated_t',
        'effect_people_relieved_m',
        'effect_people_relieved_f',
        'effect_people_relieved_t',
        'damage_house_building_complete',
        'damage_house_building_partial',
        'damage_house_building_value',
        'damage_house_shed_complete',
        'damage_house_shed_partial',
        'damage_house_shed_value',
        'damage_infra_road_type',
        'damage_infra_road_quantity',
        'damage_infra_road_unit',
        'damage_infra_road_value',
        'damage_infra_bridge_type',
        'damage_infra_bridge_quantity',
        'damage_infra_bridge_unit',
        'damage_infra_bridge_value',
        'damage_infra_electricity_type',
        'damage_infra_electricity_quantity',
        'damage_infra_electricity_unit',
        'damage_infra_electricity_value',
        'damage_infra_water_type',
        'damage_infra_water_quantity',
        'damage_infra_water_unit',
        'damage_infra_water_value',
        'damage_infra_sewage_type',
        'damage_infra_sewage_quantity',
        'damage_infra_sewage_unit',
        'damage_infra_sewage_value',
        'damage_infra_communication_type',
        'damage_infra_communication_quantity',
        'damage_infra_communication_unit',
        'damage_infra_communication_value',
        'damage_infra_medical_type',
        'damage_infra_medical_quantity',
        'damage_infra_medical_unit',
        'damage_infra_medical_value',
        'damage_infra_educational_type',
        'damage_infra_educational_quantity',
        'damage_infra_educational_unit',
        'damage_infra_educational_value',
        'damage_infra_institutions_type',
        'damage_infra_institutions_quantity',
        'damage_infra_institutions_unit',
        'damage_infra_institutions_value',
        'damage_infra_industries_type',
        'damage_infra_industries_quantity',
        'damage_infra_industries_unit',
        'damage_infra_industries_value',
        'total_loss_value_rs',
        'total_loss_value_usd',
        'comment:ntext',
        'metadata_source:ntext',
        'metadata_source_date:ntext',
        'metadata_collected_by',
        'metadata_collected_date',
        'metadata_verified_by',
        'metadata_verified_date',
        'effect_loss_land_quantity',
        'effect_loss_land_unit',
        'effect_loss_land_value',
        'effect_loss_agri_quantity',
        'effect_loss_agri_unit',
        'effect_loss_agri_value',
        'effect_loss_livestock_quantity',
        'effect_loss_livestock_unit',
        'effect_loss_livestock_value',

        ['class' => 'yii\grid\ActionColumn'],
    ],
]);