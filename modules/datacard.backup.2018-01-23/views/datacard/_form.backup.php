<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\datacard\models\Datacard */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="datacard-form">

    <?php $form = ActiveForm::begin(); ?>


    <h3>1. Disaster</h3>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-highlight">
            <tbody>
            <tr>
                <td colspan="2" rowspan="2">
                    Event Type:
                    <?= $form->field($model, 'event_type')
                        ->dropDownList(
                            $model->getDropdown_eventType()
                        )->label(false);
                    ?>
                </td>
                <td colspan="1">Magnitude</td>
                <td colspan="1"><?= $form->field($model, 'event_magnitude')->textInput(['maxlength' => true])->label(false) ?></td>
            </tr>
            <tr>
                <td colspan="1">Impact Centre</td>
                <td colspan="1"><?= $form->field($model, 'event_centre')->textInput(['maxlength' => true])->label(false) ?></td>
            </tr>
            <tr>
                <td colspan="1">Cause</td>
                <td colspan="1">
                    <?= $form->field($model, 'event_cause')
                        ->dropDownList(
                            $model->getDropdown_eventCause()
                        )->label(false);
                    ?>
                </td>
                <td colspan="1">Duratiion</td>
                <td colspan="1"><?= $form->field($model, 'event_duration')->textInput(['maxlength' => true])->label(false) ?></td>

            </tr>
            <tr>
                <td colspan="1">Description</td>
                <td colspan="3"><?= $form->field($model, 'event_description')->textarea(['rows' => 6])->label(false) ?></td>
            </tr>
            </tbody>
        </table>
    </div>

    <h3>2. Location</h3>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-highlight">
            <tbody>
            <tr>
                <td colspan="1"><strong>District</strong></td>
                <td colspan="1"><?= $form->field($model, 'location_district')->textInput()->label(false) ?></td>
                <td colspan="1"><strong>Local Body</strong></td>
                <td colspan="1"><?= $form->field($model, 'location_localbody')->textInput()->label(false)  ?></td>
            </tr> <tr>
                <td colspan="1"><strong>Ward No</strong></td>
                <td colspan="1"><?= $form->field($model, 'location_wardno')->textInput()->label(false) ?></td>
                <td colspan="1"><strong>Village/Tole</strong></td>
                <td colspan="1"><?= $form->field($model, 'location_placename')->textInput()->label(false)  ?></td>
            </tr>
            </tbody>
        </table>
    </div>

    <h3>3. Effect on People </h3>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-highlight">
            <thead>
            <th></th>
            <th>Male</th>
            <th>Female</th>
            <th>Total</th>
            </thead>
            <tbody>
            <tr>
                <td><strong>Dead</strong></td>
                <td><?= $form->field($model, 'effect_people_dead_m')->textInput()->label(false) ?></td>
                <td><?= $form->field($model, 'effect_people_dead_f')->textInput()->label(false) ?></td>
                <td><?= $form->field($model, 'effect_people_dead_t')->textInput()->label(false) ?></td>
            </tr>
            <tr>
                <td><strong>Injured</strong></td>
                <td><?= $form->field($model, 'effect_people_injured_m')->textInput()->label(false) ?></td>
                <td><?= $form->field($model, 'effect_people_injured_f')->textInput()->label(false) ?></td>
                <td><?= $form->field($model, 'effect_people_injured_t')->textInput()->label(false) ?></td>
            </tr>
            <tr>
                <td><strong>Missing</strong></td>
                <td><?= $form->field($model, 'effect_people_missing_m')->textInput()->label(false) ?></td>
                <td><?= $form->field($model, 'effect_people_missing_f')->textInput()->label(false) ?></td>
                <td><?= $form->field($model, 'effect_people_missing_t')->textInput()->label(false) ?></td>
            </tr>
            <tr>
                <td><strong>Affected</strong></td>
                <td><?= $form->field($model, 'effect_people_affected_m')->textInput()->label(false) ?></td>
                <td><?= $form->field($model, 'effect_people_affected_f')->textInput()->label(false) ?></td>
                <td><?= $form->field($model, 'effect_people_affected_t')->textInput()->label(false) ?></td>
            </tr>
            <tr>
                <td><strong>Rescued</strong></td>
                <td><?= $form->field($model, 'effect_people_rescued_m')->textInput()->label(false) ?></td>
                <td><?= $form->field($model, 'effect_people_rescued_f')->textInput()->label(false) ?></td>
                <td><?= $form->field($model, 'effect_people_rescued_t')->textInput()->label(false) ?></td>
            </tr>
            <tr>
                <td><strong>Relocated</strong></td>
                <td><?= $form->field($model, 'effect_people_relocated_m')->textInput()->label(false) ?></td>
                <td><?= $form->field($model, 'effect_people_relocated_f')->textInput()->label(false) ?></td>
                <td><?= $form->field($model, 'effect_people_relocated_t')->textInput()->label(false) ?></td>
            </tr>
            <tr>
                <td><strong>Relieved</strong></td>
                <td><?= $form->field($model, 'effect_people_relieved_m')->textInput()->label(false) ?></td>
                <td><?= $form->field($model, 'effect_people_relieved_f')->textInput()->label(false) ?></td>
                <td><?= $form->field($model, 'effect_people_relieved_t')->textInput()->label(false) ?></td>
            </tr>
            </tbody>
        </table>
    </div>
    <h3>4. Effect on Land/Agriculture </h3>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-highlight">
            <thead>
            <th>Loss</th>
            <th>Quantity</th>
            <th>Unit</th>
            <th>Value</th>
            </thead>
            <tbody>
            <tr>
                <td><strong>Lang</strong></td>
                <td><?= $form->field($model, 'effect_loss_land_quantity')->textInput()->label(false) ?></td>
                <td><?= $form->field($model, 'effect_loss_land_unit')->textInput()->label(false)->textInput(['maxlength' => true])  ?></td>
                <td><?= $form->field($model, 'effect_loss_land_value')->textInput()->label(false) ?></td>
            </tr><tr>
                <td><strong>Agriculture</strong></td>
                <td><?= $form->field($model, 'effect_loss_agri_quantity')->textInput()->label(false) ?></td>
                <td><?= $form->field($model, 'effect_loss_agri_unit')->textInput()->label(false)->textInput(['maxlength' => true])  ?></td>
                <td><?= $form->field($model, 'effect_loss_agri_value')->textInput()->label(false) ?></td>
            </tr><tr>
                <td><strong>Livestock</strong></td>
                <td><?= $form->field($model, 'effect_loss_livestock_quantity')->textInput()->label(false) ?></td>
                <td><?= $form->field($model, 'effect_loss_livestock_unit')->textInput()->label(false)->textInput(['maxlength' => true])  ?></td>
                <td><?= $form->field($model, 'effect_loss_livestock_value')->textInput()->label(false) ?></td>
            </tr>
            </tbody>
        </table>
    </div>

    <h3>5. Effect on Houses</h3>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-highlight">
            <thead>
            <th>Type</th>
            <th>Destroyed No. (Completely)</th>
            <th>Damaged No. (Partially)</th>
            <th>Value</th>
            </thead>
            <tbody>
            <tr>
                <td><strong>Building</strong></td>
                <td><?= $form->field($model, 'damage_house_building_complete')->textInput()->label(false) ?></td>
                <td><?= $form->field($model, 'damage_house_building_partial')->textInput()->label(false)  ?></td>
                <td><?= $form->field($model, 'damage_house_building_value')->textInput()->label(false)->textInput(['maxlength' => true]) ?></td>
            </tr>
            <tr>
                <td><strong>Building</strong></td>
                <td><?= $form->field($model, 'damage_house_shed_complete')->textInput()->label(false) ?></td>
                <td><?= $form->field($model, 'damage_house_shed_partial')->textInput()->label(false)  ?></td>
                <td><?= $form->field($model, 'damage_house_shed_value')->textInput()->label(false)->textInput(['maxlength' => true]) ?></td>
            </tr>
            </tbody>
        </table>
    </div>

    <h3>6. Effect on Infrastructures</h3>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-highlight">
            <thead>
            <th>Facility</th>
            <th>type</th>
            <th>Quantity</th>
            <th>Unit</th>
            <th>Value</th>
            </thead>
            <tbody>
            <tr>
                <td><strong>Road</strong></td>
                <td><?= $form->field($model, 'damage_infra_road_type')->textInput()->label(false) ?></td>
                <td><?= $form->field($model, 'damage_infra_road_quantity')->textInput()->label(false)  ?></td>
                <td><?= $form->field($model, 'damage_infra_road_unit')->textInput()->label(false)->textInput(['maxlength' => true]) ?></td>
                <td><?= $form->field($model, 'damage_infra_road_value')->textInput()->label(false)->textInput(['maxlength' => true]) ?></td>
            </tr><tr>
                <td><strong>Bridge</strong></td>
                <td><?= $form->field($model, 'damage_infra_bridge_type')->textInput()->label(false) ?></td>
                <td><?= $form->field($model, 'damage_infra_bridge_quantity')->textInput()->label(false)  ?></td>
                <td><?= $form->field($model, 'damage_infra_bridge_unit')->textInput()->label(false)->textInput(['maxlength' => true]) ?></td>
                <td><?= $form->field($model, 'damage_infra_bridge_value')->textInput()->label(false)->textInput(['maxlength' => true]) ?></td>
            </tr><tr>
                <td><strong>Electricity</strong></td>
                <td><?= $form->field($model, 'damage_infra_electricity_type')->textInput()->label(false) ?></td>
                <td><?= $form->field($model, 'damage_infra_electricity_quantity')->textInput()->label(false)  ?></td>
                <td><?= $form->field($model, 'damage_infra_electricity_unit')->textInput()->label(false)->textInput(['maxlength' => true]) ?></td>
                <td><?= $form->field($model, 'damage_infra_electricity_value')->textInput()->label(false)->textInput(['maxlength' => true]) ?></td>
            </tr><tr>
                <td><strong>Water Supply</strong></td>
                <td><?= $form->field($model, 'damage_infra_water_type')->textInput()->label(false) ?></td>
                <td><?= $form->field($model, 'damage_infra_water_quantity')->textInput()->label(false)  ?></td>
                <td><?= $form->field($model, 'damage_infra_water_unit')->textInput()->label(false)->textInput(['maxlength' => true]) ?></td>
                <td><?= $form->field($model, 'damage_infra_water_value')->textInput()->label(false)->textInput(['maxlength' => true]) ?></td>
            </tr><tr>
                <td><strong>Sewerage</strong></td>
                <td><?= $form->field($model, 'damage_infra_sewage_type')->textInput()->label(false) ?></td>
                <td><?= $form->field($model, 'damage_infra_sewage_quantity')->textInput()->label(false)  ?></td>
                <td><?= $form->field($model, 'damage_infra_sewage_unit')->textInput()->label(false)->textInput(['maxlength' => true]) ?></td>
                <td><?= $form->field($model, 'damage_infra_sewage_value')->textInput()->label(false)->textInput(['maxlength' => true]) ?></td>
            </tr><tr>
                <td><strong>Communication</strong></td>
                <td><?= $form->field($model, 'damage_infra_communication_type')->textInput()->label(false) ?></td>
                <td><?= $form->field($model, 'damage_infra_communication_quantity')->textInput()->label(false)  ?></td>
                <td><?= $form->field($model, 'damage_infra_communication_unit')->textInput()->label(false)->textInput(['maxlength' => true]) ?></td>
                <td><?= $form->field($model, 'damage_infra_communication_value')->textInput()->label(false)->textInput(['maxlength' => true]) ?></td>
            </tr><tr>
                <td><strong>Medical Facility</strong></td>
                <td><?= $form->field($model, 'damage_infra_medical_type')->textInput()->label(false) ?></td>
                <td><?= $form->field($model, 'damage_infra_medical_quantity')->textInput()->label(false)  ?></td>
                <td><?= $form->field($model, 'damage_infra_medical_unit')->textInput()->label(false)->textInput(['maxlength' => true]) ?></td>
                <td><?= $form->field($model, 'damage_infra_medical_value')->textInput()->label(false)->textInput(['maxlength' => true]) ?></td>
            </tr><tr>
                <td><strong>Educational</strong></td>
                <td><?= $form->field($model, 'damage_infra_educational_type')->textInput()->label(false) ?></td>
                <td><?= $form->field($model, 'damage_infra_educational_quantity')->textInput()->label(false)  ?></td>
                <td><?= $form->field($model, 'damage_infra_educational_unit')->textInput()->label(false)->textInput(['maxlength' => true]) ?></td>
                <td><?= $form->field($model, 'damage_infra_educational_value')->textInput()->label(false)->textInput(['maxlength' => true]) ?></td>
            </tr><tr>
                <td><strong>Institutional</strong></td>
                <td><?= $form->field($model, 'damage_infra_institutions_type')->textInput()->label(false) ?></td>
                <td><?= $form->field($model, 'damage_infra_institutions_quantity')->textInput()->label(false)  ?></td>
                <td><?= $form->field($model, 'damage_infra_institutions_unit')->textInput()->label(false)->textInput(['maxlength' => true]) ?></td>
                <td><?= $form->field($model, 'damage_infra_institutions_value')->textInput()->label(false)->textInput(['maxlength' => true]) ?></td>
            </tr><tr>
                <td><strong>Industries</strong></td>
                <td><?= $form->field($model, 'damage_infra_industries_type')->textInput()->label(false) ?></td>
                <td><?= $form->field($model, 'damage_infra_industries_quantity')->textInput()->label(false)  ?></td>
                <td><?= $form->field($model, 'damage_infra_industries_unit')->textInput()->label(false)->textInput(['maxlength' => true]) ?></td>
                <td><?= $form->field($model, 'damage_infra_industries_value')->textInput()->label(false)->textInput(['maxlength' => true]) ?></td>
            </tr>
            </tbody>
        </table>
    </div>

    <h3>7. Total Loss Value</h3>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-highlight">
            <tbody>
            <tr>
                <td colspan="1"><strong>In NRs.:</strong></td>
                <td colspan="1"><?= $form->field($model, 'total_loss_value_rs')->textInput()->label(false) ?></td>
                <td colspan="1"><strong>In NRs.:</strong></td>
                <td colspan="1"><?= $form->field($model, 'total_loss_value_usd')->textInput()->label(false) ?></td>
            </tr>
            </tbody>
        </table>
    </div>

    <h3>8. Comment</h3>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-highlight">
            <tbody>
            <tr>
                <td colspan="4"><?= $form->field($model, 'comment')->textInput()->label(false) ?><</td>
            </tr>
            </tbody>
        </table>
    </div>

    <h3>9. Metadata</h3>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-highlight">
            <tbody>
            <tr>
                <td colspan="1"><strong>Data/Information Source:</strong></td>
                <td colspan="1"><?= $form->field($model, 'metadata_source')->textarea(['rows' => 6]) ?><</td>
                <td colspan="1"><strong>Date:</strong></td>
                <td colspan="1"><?= $form->field($model, 'metadata_source_date')->textarea(['rows' => 6]) ?><</td>
            </tr><tr>
                <td colspan="1"><strong>Collected By:</strong></td>
                <td colspan="1"><?= $form->field($model, 'metadata_collected_by')->textarea(['rows' => 6]) ?><</td>
                <td colspan="1"><strong>Date:</strong></td>
                <td colspan="1"><?= $form->field($model, 'metadata_collected_date')->textarea(['rows' => 6]) ?><</td>
            </tr><tr>
                <td colspan="1"><strong>Verified By:</strong></td>
                <td colspan="1"><?= $form->field($model, 'metadata_verified_by')->textarea(['rows' => 6]) ?><</td>
                <td colspan="1"><strong>Date:</strong></td>
                <td colspan="1"><?= $form->field($model, 'metadata_verified_date')->textarea(['rows' => 6]) ?><</td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
