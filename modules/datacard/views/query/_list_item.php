<?php
/**
 * Created by PhpStorm.
 * User: Ram_DFID
 * Date: 14/06/2019
 * Time: 10:30
 */
/**
 * $model app\modules\datacard\models\Datacard
 */

// _list_item.php
use yii\helpers\Html;
use yii\helpers\Url;

$effect_arr = [];
if((int)$model->effect_people_dead_t>0)array_push($effect_arr,(int)$model->effect_people_dead_t.' death(s)');
if((int)$model->effect_people_missing_t>0)array_push($effect_arr,(int)$model->effect_people_missing_t.' missing');
if((int)$model->effect_people_affected_t>0)array_push($effect_arr,(int)$model->effect_people_affected_t.' affected');
if((int)$model->damage_house_building_partial>0)array_push($effect_arr,(int)$model->damage_house_building_partial.' building(s) damaged');
if((int)$model->damage_house_building_complete>0)array_push($effect_arr,(int)$model->damage_house_building_complete.' building(s) destroyed');
$effect_desc=join(',',$effect_arr);


?>

    <article class="card bg-light datacard-listcard" style="width: 100%;">
        <div class="card-body bg-light">
            <h5 class="card-title"><?= Html::a(Html::encode($model->event_type), Url::toRoute(['datacard/datacard/view', 'id' => $model->id]), ['date' => $model->event_date]) ?> <span <?php print ( $model->event_cause=='OTHER' ? 'class=" sub hidden"' : 'sub' ); ?>> caused by <?= $model->event_cause?> </span><span class="sub text-muted"><?= $model->metadata_source?></span></h5>
            <h6 class="card-subtitle mb-2 text-muted">
                 <?= date_format(date_create(Html::encode($model->event_date)),'l jS F Y'); ?> <?= $model->location_placename?>, <?= \app\modules\datacard\models\Localbody::name_from_ddgn($model->location_localbody)?>, <?= Html::encode($model->location_district); ?>, Provience - <?= Html::encode($model->location_state); ?>
            </h6>
            <p class="card-text">
                <?= Html::encode($effect_desc); ?>
            </p>
            <p class="card-text"><?= Html::encode($model->event_description); ?></p>
            <a href="#" class="card-link">Details ... </a>

        </div>
    </article>
