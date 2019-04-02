<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\datacard\models\DatacardSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="datacard-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'data_card_no') ?>

    <?= $form->field($model, 'event_type') ?>

    <?= $form->field($model, 'event_magnitude') ?>

    <?= $form->field($model, 'event_centre') ?>

    <?php // echo $form->field($model, 'event_cause') ?>

    <?php // echo $form->field($model, 'event_description') ?>

    <?php // echo $form->field($model, 'event_duration') ?>

    <?php // echo $form->field($model, 'location_state') ?>

    <?php // echo $form->field($model, 'location_district') ?>

    <?php // echo $form->field($model, 'location_localbody') ?>

    <?php // echo $form->field($model, 'location_wardno') ?>

    <?php // echo $form->field($model, 'location_placename') ?>

    <?php // echo $form->field($model, 'location_region') ?>

    <?php // echo $form->field($model, 'location_ecology') ?>

    <?php // echo $form->field($model, 'effect_people_dead_m') ?>

    <?php // echo $form->field($model, 'effect_people_dead_f') ?>

    <?php // echo $form->field($model, 'effect_people_dead_t') ?>

    <?php // echo $form->field($model, 'effect_people_injured_m') ?>

    <?php // echo $form->field($model, 'effect_people_injured_f') ?>

    <?php // echo $form->field($model, 'effect_people_injured_t') ?>

    <?php // echo $form->field($model, 'effect_people_missing_m') ?>

    <?php // echo $form->field($model, 'effect_people_missing_f') ?>

    <?php // echo $form->field($model, 'effect_people_missing_t') ?>

    <?php // echo $form->field($model, 'effect_people_affected_m') ?>

    <?php // echo $form->field($model, 'effect_people_affected_f') ?>

    <?php // echo $form->field($model, 'effect_people_affected_t') ?>

    <?php // echo $form->field($model, 'effect_people_rescued_m') ?>

    <?php // echo $form->field($model, 'effect_people_rescued_f') ?>

    <?php // echo $form->field($model, 'effect_people_rescued_t') ?>

    <?php // echo $form->field($model, 'effect_people_relocated_m') ?>

    <?php // echo $form->field($model, 'effect_people_relocated_f') ?>

    <?php // echo $form->field($model, 'effect_people_relocated_t') ?>

    <?php // echo $form->field($model, 'effect_people_relieved_m') ?>

    <?php // echo $form->field($model, 'effect_people_relieved_f') ?>

    <?php // echo $form->field($model, 'effect_people_relieved_t') ?>

    <?php // echo $form->field($model, 'damage_house_building_complete') ?>

    <?php // echo $form->field($model, 'damage_house_building_partial') ?>

    <?php // echo $form->field($model, 'damage_house_building_value') ?>

    <?php // echo $form->field($model, 'damage_house_shed_complete') ?>

    <?php // echo $form->field($model, 'damage_house_shed_partial') ?>

    <?php // echo $form->field($model, 'damage_house_shed_value') ?>

    <?php // echo $form->field($model, 'damage_infra_road_type') ?>

    <?php // echo $form->field($model, 'damage_infra_road_quantity') ?>

    <?php // echo $form->field($model, 'damage_infra_road_unit') ?>

    <?php // echo $form->field($model, 'damage_infra_road_value') ?>

    <?php // echo $form->field($model, 'damage_infra_bridge_type') ?>

    <?php // echo $form->field($model, 'damage_infra_bridge_quantity') ?>

    <?php // echo $form->field($model, 'damage_infra_bridge_unit') ?>

    <?php // echo $form->field($model, 'damage_infra_bridge_value') ?>

    <?php // echo $form->field($model, 'damage_infra_electricity_type') ?>

    <?php // echo $form->field($model, 'damage_infra_electricity_quantity') ?>

    <?php // echo $form->field($model, 'damage_infra_electricity_unit') ?>

    <?php // echo $form->field($model, 'damage_infra_electricity_value') ?>

    <?php // echo $form->field($model, 'damage_infra_water_type') ?>

    <?php // echo $form->field($model, 'damage_infra_water_quantity') ?>

    <?php // echo $form->field($model, 'damage_infra_water_unit') ?>

    <?php // echo $form->field($model, 'damage_infra_water_value') ?>

    <?php // echo $form->field($model, 'damage_infra_sewage_type') ?>

    <?php // echo $form->field($model, 'damage_infra_sewage_quantity') ?>

    <?php // echo $form->field($model, 'damage_infra_sewage_unit') ?>

    <?php // echo $form->field($model, 'damage_infra_sewage_value') ?>

    <?php // echo $form->field($model, 'damage_infra_communication_type') ?>

    <?php // echo $form->field($model, 'damage_infra_communication_quantity') ?>

    <?php // echo $form->field($model, 'damage_infra_communication_unit') ?>

    <?php // echo $form->field($model, 'damage_infra_communication_value') ?>

    <?php // echo $form->field($model, 'damage_infra_medical_type') ?>

    <?php // echo $form->field($model, 'damage_infra_medical_quantity') ?>

    <?php // echo $form->field($model, 'damage_infra_medical_unit') ?>

    <?php // echo $form->field($model, 'damage_infra_medical_value') ?>

    <?php // echo $form->field($model, 'damage_infra_educational_type') ?>

    <?php // echo $form->field($model, 'damage_infra_educational_quantity') ?>

    <?php // echo $form->field($model, 'damage_infra_educational_unit') ?>

    <?php // echo $form->field($model, 'damage_infra_educational_value') ?>

    <?php // echo $form->field($model, 'damage_infra_institutions_type') ?>

    <?php // echo $form->field($model, 'damage_infra_institutions_quantity') ?>

    <?php // echo $form->field($model, 'damage_infra_institutions_unit') ?>

    <?php // echo $form->field($model, 'damage_infra_institutions_value') ?>

    <?php // echo $form->field($model, 'damage_infra_industries_type') ?>

    <?php // echo $form->field($model, 'damage_infra_industries_quantity') ?>

    <?php // echo $form->field($model, 'damage_infra_industries_unit') ?>

    <?php // echo $form->field($model, 'damage_infra_industries_value') ?>

    <?php // echo $form->field($model, 'total_loss_value_rs') ?>

    <?php // echo $form->field($model, 'total_loss_value_usd') ?>

    <?php // echo $form->field($model, 'comment') ?>

    <?php // echo $form->field($model, 'metadata_source') ?>

    <?php // echo $form->field($model, 'metadata_source_date') ?>

    <?php // echo $form->field($model, 'metadata_collected_by') ?>

    <?php // echo $form->field($model, 'metadata_collected_date') ?>

    <?php // echo $form->field($model, 'metadata_verified_by') ?>

    <?php // echo $form->field($model, 'metadata_verified_date') ?>

    <?php // echo $form->field($model, 'effect_loss_land_quantity') ?>

    <?php // echo $form->field($model, 'effect_loss_land_unit') ?>

    <?php // echo $form->field($model, 'effect_loss_land_value') ?>

    <?php // echo $form->field($model, 'effect_loss_agri_quantity') ?>

    <?php // echo $form->field($model, 'effect_loss_agri_unit') ?>

    <?php // echo $form->field($model, 'effect_loss_agri_value') ?>

    <?php // echo $form->field($model, 'effect_loss_livestock_quantity') ?>

    <?php // echo $form->field($model, 'effect_loss_livestock_unit') ?>

    <?php // echo $form->field($model, 'effect_loss_livestock_value') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
