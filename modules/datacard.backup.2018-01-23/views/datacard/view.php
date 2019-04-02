<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\datacard\models\Datacard */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Datacards', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="datacard-view">
    <h3 style="text-align: center;vertical-align: middle;"><strong><?= Html::encode($this->title) ?></strong></h3>
    <?php $form = \yii\widgets\ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
            <h5>1. Disaster</h5>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-highlight">
                    <tbody>
                    <tr>
                        <td colspan="2" rowspan="2">
                            Event Type:
                            <?= $form->field($model, 'event_type')->textInput(['maxlength' => true, 'readonly'=>true])->label(false) ?>
                        </td>
                        <td colspan="1">Magnitude</td>
                        <td colspan="1"><?= $form->field($model, 'event_magnitude')->textInput(['maxlength' => true, 'readonly'=>true])->label(false) ?></td>
                    </tr>
                    <tr>
                        <td colspan="1">Impact Centre</td>
                        <td colspan="1"><?= $form->field($model, 'event_centre')->textInput(['maxlength' => true, 'readonly'=>true])->label(false) ?></td>
                    </tr>
                    <tr>
                        <td colspan="1">Cause</td>
                        <td colspan="1">
                            <?= $form->field($model, 'event_cause')->textInput(['maxlength' => true, 'readonly'=>true])->label(false) ?>
                        </td>
                        <td colspan="1">Duratiion</td>
                        <td colspan="1"><?= $form->field($model, 'event_duration')->textInput(['maxlength' => true, 'readonly'=>true])->label(false) ?></td>

                    </tr>
                    <tr>
                        <td colspan="1">Description</td>
                        <td colspan="3"><?= $form->field($model, 'event_description')->textarea(['rows' => 6, 'readonly'=>true])->label(false) ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <h5>2. Location</h5>
                </div>
                <div class="col-md-8">
                    <div class="selected-result-location"></div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-highlight">
                    <tbody>
                    <tr>
                        <td colspan="1">District</td>
                        <td colspan="1">
                            <?= $form->field($model, 'location_district')->textInput(['maxlength' => true, 'readonly'=>true])->label(false) ?>
                        </td>
                        <td colspan="1">Local Body</td>
                        <td colspan="1">
                            <?= $form->field($model, 'location_localbody')->textInput(['maxlength' => true, 'readonly'=>true])->label(false) ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="1">Ward No</td>
                        <td colspan="1"><?= $form->field($model, 'location_wardno')->textInput(['readonly'=>true])->label(false) ?></td>
                        <td colspan="1">Village/Tole</td>
                        <td colspan="1"><?= $form->field($model, 'location_placename')->textInput(['readonly'=>true])->label(false) ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <h5>3. Effect on People </h5>
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
                        <td>Dead</td>
                        <td><?= $form->field($model, 'effect_people_dead_m')->textInput(['readonly'=>true])->label(false) ?></td>
                        <td><?= $form->field($model, 'effect_people_dead_f')->textInput(['readonly'=>true])->label(false) ?></td>
                        <td><?= $form->field($model, 'effect_people_dead_t')->textInput(['readonly'=>true])->label(false) ?></td>
                    </tr>
                    <tr>
                        <td>Injured</td>
                        <td><?= $form->field($model, 'effect_people_injured_m')->textInput(['readonly'=>true])->label(false) ?></td>
                        <td><?= $form->field($model, 'effect_people_injured_f')->textInput(['readonly'=>true])->label(false) ?></td>
                        <td><?= $form->field($model, 'effect_people_injured_t')->textInput(['readonly'=>true])->label(false) ?></td>
                    </tr>
                    <tr>
                        <td>Missing</td>
                        <td><?= $form->field($model, 'effect_people_missing_m')->textInput(['readonly'=>true])->label(false) ?></td>
                        <td><?= $form->field($model, 'effect_people_missing_f')->textInput(['readonly'=>true])->label(false) ?></td>
                        <td><?= $form->field($model, 'effect_people_missing_t')->textInput(['readonly'=>true])->label(false) ?></td>
                    </tr>
                    <tr>
                        <td>Affected</td>
                        <td><?= $form->field($model, 'effect_people_affected_m')->textInput(['readonly'=>true])->label(false) ?></td>
                        <td><?= $form->field($model, 'effect_people_affected_f')->textInput(['readonly'=>true])->label(false) ?></td>
                        <td><?= $form->field($model, 'effect_people_affected_t')->textInput(['readonly'=>true])->label(false) ?></td>
                    </tr>
                    <tr>
                        <td>Rescued</td>
                        <td><?= $form->field($model, 'effect_people_rescued_m')->textInput(['readonly'=>true])->label(false) ?></td>
                        <td><?= $form->field($model, 'effect_people_rescued_f')->textInput(['readonly'=>true])->label(false) ?></td>
                        <td><?= $form->field($model, 'effect_people_rescued_t')->textInput(['readonly'=>true])->label(false) ?></td>
                    </tr>
                    <tr>
                        <td>Relocated</td>
                        <td><?= $form->field($model, 'effect_people_relocated_m')->textInput(['readonly'=>true])->label(false) ?></td>
                        <td><?= $form->field($model, 'effect_people_relocated_f')->textInput(['readonly'=>true])->label(false) ?></td>
                        <td><?= $form->field($model, 'effect_people_relocated_t')->textInput(['readonly'=>true])->label(false) ?></td>
                    </tr>
                    <tr>
                        <td>Relieved</td>
                        <td><?= $form->field($model, 'effect_people_relieved_m')->textInput(['readonly'=>true])->label(false) ?></td>
                        <td><?= $form->field($model, 'effect_people_relieved_f')->textInput(['readonly'=>true])->label(false) ?></td>
                        <td><?= $form->field($model, 'effect_people_relieved_t')->textInput(['readonly'=>true])->label(false) ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <h5>4. Effect on Land/Agriculture </h5>
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
                        <td>Lang</td>
                        <td><?= $form->field($model, 'effect_loss_land_quantity')->textInput(['readonly'=>true])->label(false) ?></td>
                        <td><?= $form->field($model, 'effect_loss_land_unit')->textInput(['readonly'=>true])->label(false) ?></td>
                        <td><?= $form->field($model, 'effect_loss_land_value')->textInput(['readonly'=>true])->label(false) ?></td>
                    </tr>
                    <tr>
                        <td>Agriculture</td>
                        <td><?= $form->field($model, 'effect_loss_agri_quantity')->textInput(['readonly'=>true])->label(false) ?></td>
                        <td><?= $form->field($model, 'effect_loss_agri_unit')->textInput(['readonly'=>true])->label(false) ?></td>
                        <td><?= $form->field($model, 'effect_loss_agri_value')->textInput(['readonly'=>true])->label(false) ?></td>
                    </tr>
                    <tr>
                        <td>Livestock</td>
                        <td><?= $form->field($model, 'effect_loss_livestock_quantity')->textInput(['readonly'=>true])->label(false) ?></td>
                        <td><?= $form->field($model, 'effect_loss_livestock_unit')->textInput(['readonly'=>true])->label(false) ?></td>
                        <td><?= $form->field($model, 'effect_loss_livestock_value')->textInput(['readonly'=>true])->label(false) ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-6">
            <h5>5. Effect on Houses</h5>
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
                        <td>Building</td>
                        <td><?= $form->field($model, 'damage_house_building_complete')->textInput(['readonly'=>true])->label(false) ?></td>
                        <td><?= $form->field($model, 'damage_house_building_partial')->textInput(['readonly'=>true])->label(false) ?></td>
                        <td><?= $form->field($model, 'damage_house_building_value')->textInput()->label(false)->textInput(['maxlength' => true]) ?></td>
                    </tr>
                    <tr>
                        <td>Building</td>
                        <td><?= $form->field($model, 'damage_house_shed_complete')->textInput(['readonly'=>true])->label(false) ?></td>
                        <td><?= $form->field($model, 'damage_house_shed_partial')->textInput(['readonly'=>true])->label(false) ?></td>
                        <td><?= $form->field($model, 'damage_house_shed_value')->textInput(['readonly'=>true])->label(false)->textInput(['maxlength' => true]) ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <h5>6. Effect on Infrastructures</h5>
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
                        <td>Road</td>
                        <td><?= $form->field($model, 'damage_infra_road_type')->textInput(['readonly'=>true])->label(false) ?></td>
                        <td><?= $form->field($model, 'damage_infra_road_quantity')->textInput(['readonly'=>true])->label(false) ?></td>
                        <td><?= $form->field($model, 'damage_infra_road_unit')->textInput(['readonly'=>true])->label(false) ?></td>
                        <td><?= $form->field($model, 'damage_infra_road_value')->textInput(['readonly'=>true])->label(false)?></td>
                    </tr>
                    <tr>
                        <td>Bridge</td>
                        <td><?= $form->field($model, 'damage_infra_bridge_type')->textInput(['readonly'=>true])->label(false) ?></td>
                        <td><?= $form->field($model, 'damage_infra_bridge_quantity')->textInput(['readonly'=>true])->label(false) ?></td>
                        <td><?= $form->field($model, 'damage_infra_bridge_unit')->textInput(['readonly'=>true])->label(false)?></td>
                        <td><?= $form->field($model, 'damage_infra_bridge_value')->textInput(['readonly'=>true])->label(false) ?></td>
                    </tr>
                    <tr>
                        <td>Electricity</td>
                        <td><?= $form->field($model, 'damage_infra_electricity_type')->textInput(['readonly'=>true])->label(false) ?></td>
                        <td><?= $form->field($model, 'damage_infra_electricity_quantity')->textInput(['readonly'=>true])->label(false) ?></td>
                        <td><?= $form->field($model, 'damage_infra_electricity_unit')->textInput(['readonly'=>true])->label(false) ?></td>
                        <td><?= $form->field($model, 'damage_infra_electricity_value')->textInput(['readonly'=>true])->label(false) ?></td>
                    </tr>
                    <tr>
                        <td>Water Supply</td>
                        <td><?= $form->field($model, 'damage_infra_water_type')->textInput(['readonly'=>true])->label(false) ?></td>
                        <td><?= $form->field($model, 'damage_infra_water_quantity')->textInput(['readonly'=>true])->label(false) ?></td>
                        <td><?= $form->field($model, 'damage_infra_water_unit')->textInput(['readonly'=>true])->label(false)?></td>
                        <td><?= $form->field($model, 'damage_infra_water_value')->textInput(['readonly'=>true])->label(false) ?></td>
                    </tr>
                    <tr>
                        <td>Sewerage</td>
                        <td><?= $form->field($model, 'damage_infra_sewage_type')->textInput(['readonly'=>true])->label(false) ?></td>
                        <td><?= $form->field($model, 'damage_infra_sewage_quantity')->textInput(['readonly'=>true])->label(false) ?></td>
                        <td><?= $form->field($model, 'damage_infra_sewage_unit')->textInput(['readonly'=>true])->label(false) ?></td>
                        <td><?= $form->field($model, 'damage_infra_sewage_value')->textInput(['readonly'=>true])->label(false) ?></td>
                    </tr>
                    <tr>
                        <td>Communication</td>
                        <td><?= $form->field($model, 'damage_infra_communication_type')->textInput(['readonly'=>true])->label(false) ?></td>
                        <td><?= $form->field($model, 'damage_infra_communication_quantity')->textInput(['readonly'=>true])->label(false) ?></td>
                        <td><?= $form->field($model, 'damage_infra_communication_unit')->textInput(['readonly'=>true])->label(false) ?></td>
                        <td><?= $form->field($model, 'damage_infra_communication_value')->textInput(['readonly'=>true])->label(false) ?></td>
                    </tr>
                    <tr>
                        <td>Medical Facility</td>
                        <td><?= $form->field($model, 'damage_infra_medical_type')->textInput(['readonly'=>true])->label(false) ?></td>
                        <td><?= $form->field($model, 'damage_infra_medical_quantity')->textInput(['readonly'=>true])->label(false) ?></td>
                        <td><?= $form->field($model, 'damage_infra_medical_unit')->textInput(['readonly'=>true])->label(false) ?></td>
                        <td><?= $form->field($model, 'damage_infra_medical_value')->textInput(['readonly'=>true])->label(false) ?></td>
                    </tr>
                    <tr>
                        <td>Educational</td>
                        <td><?= $form->field($model, 'damage_infra_educational_type')->textInput(['readonly'=>true])->label(false) ?></td>
                        <td><?= $form->field($model, 'damage_infra_educational_quantity')->textInput(['readonly'=>true])->label(false) ?></td>
                        <td><?= $form->field($model, 'damage_infra_educational_unit')->textInput(['readonly'=>true])->label(false) ?></td>
                        <td><?= $form->field($model, 'damage_infra_educational_value')->textInput(['readonly'=>true])->label(false) ?></td>
                    </tr>
                    <tr>
                        <td>Institutional</td>
                        <td><?= $form->field($model, 'damage_infra_institutions_type')->textInput(['readonly'=>true])->label(false) ?></td>
                        <td><?= $form->field($model, 'damage_infra_institutions_quantity')->textInput(['readonly'=>true])->label(false) ?></td>
                        <td><?= $form->field($model, 'damage_infra_institutions_unit')->textInput(['readonly'=>true])->label(false) ?></td>
                        <td><?= $form->field($model, 'damage_infra_institutions_value')->textInput(['readonly'=>true])->label(false) ?></td>
                    </tr>
                    <tr>
                        <td>Industries</td>
                        <td><?= $form->field($model, 'damage_infra_industries_type')->textInput(['readonly'=>true])->label(false) ?></td>
                        <td><?= $form->field($model, 'damage_infra_industries_quantity')->textInput(['readonly'=>true])->label(false) ?></td>
                        <td><?= $form->field($model, 'damage_infra_industries_unit')->textInput(['readonly'=>true])->label(false) ?></td>
                        <td><?= $form->field($model, 'damage_infra_industries_value')->textInput(['readonly'=>true])->label(false) ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <h5>7. Total Loss Value</h5>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-highlight">
                    <tbody>
                    <tr>
                        <td colspan="1">In NRs.:</td>
                        <td colspan="1"><?= $form->field($model, 'total_loss_value_rs')->textInput(['readonly'=>true])->label(false) ?></td>
                        <td colspan="1">In USD ($).:</td>
                        <td colspan="1"><?= $form->field($model, 'total_loss_value_usd')->textInput(['readonly'=>true])->label(false) ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <h5>8. Comment</h5>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-highlight">
                    <tbody>
                    <tr>
                        <td colspan="1"><?= $form->field($model, 'comment')->textarea(['rows' => 6,'readonly'=>true])->label(false) ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <h5>9. Metadata</h5>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-highlight">
                    <tbody>
                    <tr>
                        <td colspan="1">Data/Information Source:</td>
                        <td colspan="4"><?= $form->field($model, 'metadata_source')->textInput(['readonly'=>true])->label(false) ?></td>
                        <td colspan="1">Date:</td>
                        <td colspan="4"><?= $form->field($model, 'metadata_source_date')->textInput(['readonly'=>true])->label(false) ?></td>
                    </tr>
                    <tr>
                        <td colspan="1">Collected By:</td>
                        <td colspan="4"><?= $form->field($model, 'metadata_collected_by')->textInput(['readonly'=>true])->label(false) ?></td>
                        <td colspan="1">Date:</td>
                        <td colspan="4"><?= $form->field($model, 'metadata_collected_date')->textInput(['readonly'=>true])->label(false) ?></td>
                    </tr>
                    <tr>
                        <td colspan="1">Verified By:</td>
                        <td colspan="4"><?= $form->field($model, 'metadata_verified_by')->textInput(['readonly'=>true])->label(false) ?></td>
                        <td colspan="1">Date:</td>
                        <td colspan="4"><?= $form->field($model, 'metadata_verified_date')->textInput(['readonly'=>true])->label(false) ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php \yii\widgets\ActiveForm::end(); ?>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
</div>
