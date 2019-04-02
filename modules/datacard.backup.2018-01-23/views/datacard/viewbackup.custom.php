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
    <div class="row">
        <div class="col-md-6">
            <h5>1. Disaster</h5>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-highlight">
                    <tbody>
                    <tr>
                        <td colspan="2" rowspan="2">
                            Event Type:
                            <?= $model->event_type ?>
                        </td>
                        <td colspan="1">Magnitude</td>
                        <td colspan="1">
                            <?= $model->event_magnitude ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="1">Impact Centre</td>
                        <td colspan="1">
                            <?= $model->event_centre ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="1">Cause</td>
                        <td colspan="1">
                            <?= $model->event_cause ?>
                        </td>
                        <td colspan="1">Duratiion</td>
                        <td colspan="1">
                            <?= $model->event_duration ?>
                        </td>

                    </tr>
                    <tr>
                        <td colspan="1">Description</td>
                        <td colspan="3">
                            <textarea readonly><?= $model->event_description ?></textarea>
                        </td>
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
                        <td colspan="1"><?= $model->location_district ?></td>
                        <td colspan="1">Local Body</td>
                        <td colspan="1"><?= $model->location_localbody ?></td>
                    </tr>
                    <tr>
                        <td colspan="1">Ward No</td>
                        <td colspan="1"><?= $model->location_wardno ?></td>
                        <td colspan="1">Village/Tole</td>
                        <td colspan="1"><?= $model->location_placename ?></td>
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
                        <td><?= $model->effect_people_dead_m ?></td>
                        <td><?= $model->effect_people_dead_f ?></td>
                        <td><?= $model->effect_people_dead_f ?></td>
                    </tr>
                    <tr>
                        <td>Injured</td>
                        <td><?= $model->effect_people_injured_m ?></td>
                        <td><?= $model->effect_people_injured_f ?></td>
                        <td><?= $model->effect_people_injured_t ?></td>
                    </tr>
                    <tr>
                        <td>Missing</td>
                        <td><?= $model->effect_people_missing_m ?></td>
                        <td><?= $model->effect_people_missing_f ?></td>
                        <td><?= $model->effect_people_missing_t ?></td>
                    </tr>
                    <tr>
                        <td>Affected</td>
                        <td><?= $model->effect_people_affected_m ?></td>
                        <td><?= $model->effect_people_affected_f ?></td>
                        <td><?= $model->effect_people_affected_t ?></td>
                    </tr>
                    <tr>
                        <td>Rescued</td>
                        <td><?= $model->effect_people_rescued_m ?></td>
                        <td><?= $model->effect_people_rescued_f ?></td>
                        <td><?= $model->effect_people_rescued_t ?></td>
                    </tr>
                    <tr>
                        <td>Relocated</td>
                        <td><?= $model->effect_people_relocated_m ?></td>
                        <td><?= $model->effect_people_relocated_f ?></td>
                        <td><?= $model->effect_people_relocated_t ?></td>
                    </tr>
                    <tr>
                        <td>Relieved</td>
                        <td><?= $model->effect_people_relieved_m ?></td>
                        <td><?= $model->effect_people_relieved_f ?></td>
                        <td><?= $model->effect_people_relieved_t ?></td>
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
                        <td>Land</td>
                        <td><?= $model->effect_loss_land_quantity ?></td>
                        <td><?= $model->effect_loss_land_unit ?></td>
                        <td><?= $model->effect_loss_land_value ?></td>
                    </tr>
                    <tr>
                        <td>Agriculture</td>
                        <td><?= $model->effect_loss_agri_quantity ?></td>
                        <td><?= $model->effect_loss_agri_unit ?></td>
                        <td><?= $model->effect_loss_agri_value ?></td>
                    </tr>
                    <tr>
                        <td>Livestock</td>
                        <td><?= $model->effect_loss_livestock_quantity ?></td>
                        <td><?= $model->effect_loss_livestock_unit ?></td>
                        <td><?= $model->effect_loss_livestock_value ?></td>
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
                        <td><?= $model->damage_house_building_complete ?></td>
                        <td><?= $model->damage_house_building_partial ?></td>
                        <td><?= $model->damage_house_building_value ?></td>
                    </tr>
                    <tr>
                        <td>Shed</td>
                        <td><?= $model->damage_house_shed_complete ?></td>
                        <td><?= $model->damage_house_shed_partial ?></td>
                        <td><?= $model->damage_house_shed_value ?></td>
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
                        <td><?= $model->damage_infra_road_type ?></td>
                        <td><?= $model->damage_infra_road_quantity ?></td>
                        <td><?= $model->damage_infra_road_unit ?></td>
                        <td><?= $model->damage_infra_road_value ?></td>
                    </tr>
                    <tr>
                        <td>Bridge</td>
                        <td><?= $model->damage_infra_bridge_type ?></td>
                        <td><?= $model->damage_infra_bridge_quantity ?></td>
                        <td><?= $model->damage_infra_bridge_unit ?></td>
                        <td><?= $model->damage_infra_bridge_value ?></td>
                    </tr>
                    <tr>
                        <td>Electricity</td>
                        <td><?= $model->damage_infra_electricity_type ?></td>
                        <td><?= $model->damage_infra_electricity_quantity ?></td>
                        <td><?= $model->damage_infra_electricity_unit ?></td>
                        <td><?= $model->damage_infra_electricity_value ?></td>
                    </tr>
                    <tr>
                        <td>Water Supply</td>
                        <td><?= $model->damage_infra_water_type ?></td>
                        <td><?= $model->damage_infra_water_quantity ?></td>
                        <td><?= $model->damage_infra_water_unit ?></td>
                        <td><?= $model->damage_infra_water_value ?></td>
                    </tr>
                    <tr>
                        <td>Sewerage</td>
                        <td><?= $model->damage_infra_sewage_type ?></td>
                        <td><?= $model->damage_infra_sewage_quantity ?></td>
                        <td><?= $model->damage_infra_sewage_unit ?></td>
                        <td><?= $model->damage_infra_sewage_value ?></td>
                    </tr>
                    <tr>
                        <td>Communication</td>
                        <td><?= $model->damage_infra_communication_type ?></td>
                        <td><?= $model->damage_infra_communication_quantity ?></td>
                        <td><?= $model->damage_infra_communication_unit ?></td>
                        <td><?= $model->damage_infra_communication_value ?></td>
                    </tr>
                    <tr>
                        <td>Medical Facility</td>
                        <td><?= $model->damage_infra_medical_type ?></td>
                        <td><?= $model->damage_infra_medical_quantity ?></td>
                        <td><?= $model->damage_infra_medical_unit ?></td>
                        <td><?= $model->damage_infra_medical_value ?></td>
                    </tr>
                    <tr>
                        <td>Educational</td>
                        <td><?= $model->damage_infra_educational_type ?></td>
                        <td><?= $model->damage_infra_educational_quantity ?></td>
                        <td><?= $model->damage_infra_educational_unit ?></td>
                        <td><?= $model->damage_infra_educational_value ?></td>
                    </tr>
                    <tr>
                        <td>Institutional</td>
                        <td><?= $model->damage_infra_institutions_type ?></td>
                        <td><?= $model->damage_infra_institutions_quantity ?></td>
                        <td><?= $model->damage_infra_institutions_unit ?></td>
                        <td><?= $model->damage_infra_institutions_value ?></td>
                    </tr>
                    <tr>
                        <td>Industries</td>
                        <td><?= $model->damage_infra_industries_type ?></td>
                        <td><?= $model->damage_infra_industries_quantity ?></td>
                        <td><?= $model->damage_infra_industries_unit ?></td>
                        <td><?= $model->damage_infra_industries_value ?></td>
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
                        <td colspan="1"><?= $model->total_loss_value_rs ?></td>
                        <td colspan="1">In USD ($).:</td>
                        <td colspan="1"><?= $model->total_loss_value_usd ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <h5>8. Comment</h5>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-highlight">
                    <tbody>
                    <tr>
                        <td colspan="1" >
                            <textarea readonly><?= $model->comment ?></textarea>
                        </td>
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
                        <td colspan="1"><?= $model->metadata_source ?></td>
                        <td colspan="1">Date:</td>
                        <td colspan="1"><?= $model->metadata_source_date ?></td>
                    </tr>
                    <tr>
                        <td colspan="1">Collected By:</td>
                        <td colspan="1"><?= $model->metadata_collected_by ?></td>
                        <td colspan="1">Date:</td>
                        <td colspan="1"><?= $model->metadata_collected_date ?></td>
                    </tr>
                    <tr>
                        <td colspan="1">Verified By:</td>
                        <td colspan="1"><?= $model->metadata_verified_by ?></td>
                        <td colspan="1">Date:</td>
                        <td colspan="1"><?= $model->metadata_verified_date ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

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
