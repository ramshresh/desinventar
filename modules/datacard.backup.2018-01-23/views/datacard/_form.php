<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\datacard\models\Datacard */
/* @var $districts */
/* @var $form yii\widgets\ActiveForm */
?>

    <div class="datacard-form">

        <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col-md-6">
                <h5>1. Disaster</h5>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-highlight">
                        <tbody>
                        <tr>
                            <td colspan="2" rowspan="2">
                                Event Type:
                                <?= $form->field($model, 'event_type')
                                    ->dropDownList(
                                        $model->getDropdown_eventType(), ['prompt' => 'Select...']
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
                                        $model->getDropdown_eventCause(), ['prompt' => 'Select...']
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
                            <td colspan="1"><?= $form->field($model, 'location_district')
                                    ->dropDownList(
                                        $districts, ['id' => 'district-id', 'prompt' => 'Select...']
                                    )->label(false);
                                ?></td>
                            <td colspan="1">Local Body</td>
                            <td colspan="1"><?= $form->field($model, 'location_localbody')->widget(\kartik\depdrop\DepDrop::classname(), [
                                    'options' => ['id' => 'localbody-id'],
                                    'data' => isset($localbodies) ? $localbodies : [],
                                    'pluginOptions' => [
                                        'allowClear' => true,
                                        'depends' => ['district-id'],
                                        'placeholder' => 'Select...',
                                        'url' => \yii\helpers\Url::to(['/datacard/location/local-bodies'])
                                    ],
                                    'pluginEvents' => [
                                        "depdrop:init" => "function() { console.log('depdrop:init'); }",
                                        "depdrop:ready" => "function() { console.log('depdrop:ready'); }",
                                        "depdrop:change" => "function(event, id, value, count) { console.log(id); console.log(value); console.log(count); }",
                                        "depdrop:beforeChange" => "function(event, id, value) { console.log('depdrop:beforeChange'); }",
                                        "depdrop:afterChange" => "function(event, id, value) { console.log('depdrop:afterChange'); console.log($('.selected-result-location')); setSelectedLocationRegions(); }",
                                        "depdrop:error" => "function(event, id, value) { console.log('depdrop:error'); }",
                                    ]
                                ])->label(false) ?></td>
                        </tr>
                        <tr>
                            <td colspan="1">Ward No</td>
                            <td colspan="1"><?= $form->field($model, 'location_wardno')->textInput()->label(false) ?></td>
                            <td colspan="1">Village/Tole</td>
                            <td colspan="1"><?= $form->field($model, 'location_placename')->textInput()->label(false) ?></td>
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
                            <td><?= $form->field($model, 'effect_people_dead_m')->textInput()->label(false) ?></td>
                            <td><?= $form->field($model, 'effect_people_dead_f')->textInput()->label(false) ?></td>
                            <td><?= $form->field($model, 'effect_people_dead_t')->textInput()->label(false) ?></td>
                        </tr>
                        <tr>
                            <td>Injured</td>
                            <td><?= $form->field($model, 'effect_people_injured_m')->textInput()->label(false) ?></td>
                            <td><?= $form->field($model, 'effect_people_injured_f')->textInput()->label(false) ?></td>
                            <td><?= $form->field($model, 'effect_people_injured_t')->textInput()->label(false) ?></td>
                        </tr>
                        <tr>
                            <td>Missing</td>
                            <td><?= $form->field($model, 'effect_people_missing_m')->textInput()->label(false) ?></td>
                            <td><?= $form->field($model, 'effect_people_missing_f')->textInput()->label(false) ?></td>
                            <td><?= $form->field($model, 'effect_people_missing_t')->textInput()->label(false) ?></td>
                        </tr>
                        <tr>
                            <td>Affected</td>
                            <td><?= $form->field($model, 'effect_people_affected_m')->textInput()->label(false) ?></td>
                            <td><?= $form->field($model, 'effect_people_affected_f')->textInput()->label(false) ?></td>
                            <td><?= $form->field($model, 'effect_people_affected_t')->textInput()->label(false) ?></td>
                        </tr>
                        <tr>
                            <td>Rescued</td>
                            <td><?= $form->field($model, 'effect_people_rescued_m')->textInput()->label(false) ?></td>
                            <td><?= $form->field($model, 'effect_people_rescued_f')->textInput()->label(false) ?></td>
                            <td><?= $form->field($model, 'effect_people_rescued_t')->textInput()->label(false) ?></td>
                        </tr>
                        <tr>
                            <td>Relocated</td>
                            <td><?= $form->field($model, 'effect_people_relocated_m')->textInput()->label(false) ?></td>
                            <td><?= $form->field($model, 'effect_people_relocated_f')->textInput()->label(false) ?></td>
                            <td><?= $form->field($model, 'effect_people_relocated_t')->textInput()->label(false) ?></td>
                        </tr>
                        <tr>
                            <td>Relieved</td>
                            <td><?= $form->field($model, 'effect_people_relieved_m')->textInput()->label(false) ?></td>
                            <td><?= $form->field($model, 'effect_people_relieved_f')->textInput()->label(false) ?></td>
                            <td><?= $form->field($model, 'effect_people_relieved_t')->textInput()->label(false) ?></td>
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
                            <td><?= $form->field($model, 'effect_loss_land_quantity')->textInput()->label(false) ?></td>
                            <td><?= $form->field($model, 'effect_loss_land_unit')->textInput()->label(false) ?></td>
                            <td><?= $form->field($model, 'effect_loss_land_value')->textInput()->label(false) ?></td>
                        </tr>
                        <tr>
                            <td>Agriculture</td>
                            <td><?= $form->field($model, 'effect_loss_agri_quantity')->textInput()->label(false) ?></td>
                            <td><?= $form->field($model, 'effect_loss_agri_unit')->textInput()->label(false) ?></td>
                            <td><?= $form->field($model, 'effect_loss_agri_value')->textInput()->label(false) ?></td>
                        </tr>
                        <tr>
                            <td>Livestock</td>
                            <td><?= $form->field($model, 'effect_loss_livestock_quantity')->textInput()->label(false) ?></td>
                            <td><?= $form->field($model, 'effect_loss_livestock_unit')->textInput()->label(false) ?></td>
                            <td><?= $form->field($model, 'effect_loss_livestock_value')->textInput()->label(false) ?></td>
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
                            <td><?= $form->field($model, 'damage_house_building_complete')->textInput()->label(false) ?></td>
                            <td><?= $form->field($model, 'damage_house_building_partial')->textInput()->label(false) ?></td>
                            <td><?= $form->field($model, 'damage_house_building_value')->textInput()->label(false)->textInput(['maxlength' => true]) ?></td>
                        </tr>
                        <tr>
                            <td>Shed</td>
                            <td><?= $form->field($model, 'damage_house_shed_complete')->textInput()->label(false) ?></td>
                            <td><?= $form->field($model, 'damage_house_shed_partial')->textInput()->label(false) ?></td>
                            <td><?= $form->field($model, 'damage_house_shed_value')->textInput()->label(false)->textInput(['maxlength' => true]) ?></td>
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
                            <td><?= $form->field($model, 'damage_infra_road_type')->textInput()->label(false) ?></td>
                            <td><?= $form->field($model, 'damage_infra_road_quantity')->textInput()->label(false) ?></td>
                            <td><?= $form->field($model, 'damage_infra_road_unit')->textInput()->label(false)->textInput(['maxlength' => true]) ?></td>
                            <td><?= $form->field($model, 'damage_infra_road_value')->textInput()->label(false)->textInput(['maxlength' => true]) ?></td>
                        </tr>
                        <tr>
                            <td>Bridge</td>
                            <td><?= $form->field($model, 'damage_infra_bridge_type')->textInput()->label(false) ?></td>
                            <td><?= $form->field($model, 'damage_infra_bridge_quantity')->textInput()->label(false) ?></td>
                            <td><?= $form->field($model, 'damage_infra_bridge_unit')->textInput()->label(false)->textInput(['maxlength' => true]) ?></td>
                            <td><?= $form->field($model, 'damage_infra_bridge_value')->textInput()->label(false)->textInput(['maxlength' => true]) ?></td>
                        </tr>
                        <tr>
                            <td>Electricity</td>
                            <td><?= $form->field($model, 'damage_infra_electricity_type')->textInput()->label(false) ?></td>
                            <td><?= $form->field($model, 'damage_infra_electricity_quantity')->textInput()->label(false) ?></td>
                            <td><?= $form->field($model, 'damage_infra_electricity_unit')->textInput()->label(false)->textInput(['maxlength' => true]) ?></td>
                            <td><?= $form->field($model, 'damage_infra_electricity_value')->textInput()->label(false)->textInput(['maxlength' => true]) ?></td>
                        </tr>
                        <tr>
                            <td>Water Supply</td>
                            <td><?= $form->field($model, 'damage_infra_water_type')->textInput()->label(false) ?></td>
                            <td><?= $form->field($model, 'damage_infra_water_quantity')->textInput()->label(false) ?></td>
                            <td><?= $form->field($model, 'damage_infra_water_unit')->textInput()->label(false)->textInput(['maxlength' => true]) ?></td>
                            <td><?= $form->field($model, 'damage_infra_water_value')->textInput()->label(false)->textInput(['maxlength' => true]) ?></td>
                        </tr>
                        <tr>
                            <td>Sewerage</td>
                            <td><?= $form->field($model, 'damage_infra_sewage_type')->textInput()->label(false) ?></td>
                            <td><?= $form->field($model, 'damage_infra_sewage_quantity')->textInput()->label(false) ?></td>
                            <td><?= $form->field($model, 'damage_infra_sewage_unit')->textInput()->label(false)->textInput(['maxlength' => true]) ?></td>
                            <td><?= $form->field($model, 'damage_infra_sewage_value')->textInput()->label(false)->textInput(['maxlength' => true]) ?></td>
                        </tr>
                        <tr>
                            <td>Communication</td>
                            <td><?= $form->field($model, 'damage_infra_communication_type')->textInput()->label(false) ?></td>
                            <td><?= $form->field($model, 'damage_infra_communication_quantity')->textInput()->label(false) ?></td>
                            <td><?= $form->field($model, 'damage_infra_communication_unit')->textInput()->label(false)->textInput(['maxlength' => true]) ?></td>
                            <td><?= $form->field($model, 'damage_infra_communication_value')->textInput()->label(false)->textInput(['maxlength' => true]) ?></td>
                        </tr>
                        <tr>
                            <td>Medical Facility</td>
                            <td><?= $form->field($model, 'damage_infra_medical_type')->textInput()->label(false) ?></td>
                            <td><?= $form->field($model, 'damage_infra_medical_quantity')->textInput()->label(false) ?></td>
                            <td><?= $form->field($model, 'damage_infra_medical_unit')->textInput()->label(false)->textInput(['maxlength' => true]) ?></td>
                            <td><?= $form->field($model, 'damage_infra_medical_value')->textInput()->label(false)->textInput(['maxlength' => true]) ?></td>
                        </tr>
                        <tr>
                            <td>Educational</td>
                            <td><?= $form->field($model, 'damage_infra_educational_type')->textInput()->label(false) ?></td>
                            <td><?= $form->field($model, 'damage_infra_educational_quantity')->textInput()->label(false) ?></td>
                            <td><?= $form->field($model, 'damage_infra_educational_unit')->textInput()->label(false)->textInput(['maxlength' => true]) ?></td>
                            <td><?= $form->field($model, 'damage_infra_educational_value')->textInput()->label(false)->textInput(['maxlength' => true]) ?></td>
                        </tr>
                        <tr>
                            <td>Institutional</td>
                            <td><?= $form->field($model, 'damage_infra_institutions_type')->textInput()->label(false) ?></td>
                            <td><?= $form->field($model, 'damage_infra_institutions_quantity')->textInput()->label(false) ?></td>
                            <td><?= $form->field($model, 'damage_infra_institutions_unit')->textInput()->label(false)->textInput(['maxlength' => true]) ?></td>
                            <td><?= $form->field($model, 'damage_infra_institutions_value')->textInput()->label(false)->textInput(['maxlength' => true]) ?></td>
                        </tr>
                        <tr>
                            <td>Industries</td>
                            <td><?= $form->field($model, 'damage_infra_industries_type')->textInput()->label(false) ?></td>
                            <td><?= $form->field($model, 'damage_infra_industries_quantity')->textInput()->label(false) ?></td>
                            <td><?= $form->field($model, 'damage_infra_industries_unit')->textInput()->label(false)->textInput(['maxlength' => true]) ?></td>
                            <td><?= $form->field($model, 'damage_infra_industries_value')->textInput()->label(false)->textInput(['maxlength' => true]) ?></td>
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
                            <td colspan="1"><?= $form->field($model, 'total_loss_value_rs')->textInput()->label(false) ?></td>
                            <td colspan="1">In USD ($).:</td>
                            <td colspan="1"><?= $form->field($model, 'total_loss_value_usd')->textInput()->label(false) ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <h5>8. Comment</h5>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-highlight">
                        <tbody>
                        <tr>
                            <td colspan="1"><?= $form->field($model, 'comment')->textarea(['rows' => 6])->label(false) ?></td>
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
                            <td colspan="4"><?= $form->field($model, 'metadata_source')->textInput()->label(false) ?></td>
                            <td colspan="1">Date:</td>
                            <td colspan="4"><?= $form->field($model, 'metadata_source_date')->textInput()->label(false) ?></td>
                        </tr>
                        <tr>
                            <td colspan="1">Collected By:</td>
                            <td colspan="4"><?= $form->field($model, 'metadata_collected_by')->textInput()->label(false) ?></td>
                            <td colspan="1">Date:</td>
                            <td colspan="4"><?= $form->field($model, 'metadata_collected_date')->textInput()->label(false) ?></td>
                        </tr>
                        <tr>
                            <td colspan="1">Verified By:</td>
                            <td colspan="4"><?= $form->field($model, 'metadata_verified_by')->textInput()->label(false) ?></td>
                            <td colspan="1">Date:</td>
                            <td colspan="4"><?= $form->field($model, 'metadata_verified_date')->textInput()->label(false) ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <?= Html::submitButton('Save',
                        [
                            'class' => 'btn btn-success',
                            'data' => [
                                'confirm' => 'Are you sure you want to save the changes?',
                            ],
                        ]) ?>
                </div>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

<?php
//for Global Javascript Variables;
$baseUrl = \yii\helpers\Url::toRoute('/');
$this->registerJs(
    "window.baseUrl = ('" . $baseUrl . "');",
    \yii\web\View::POS_HEAD,
    'my-button-handler'
);


//For location
$js = <<<JS
function setSelectedLocationRegions(){
    var route ='/datacard/location/get-state-of-district';
    var fetchUrl = baseUrl+route;
    var district = $('#district-id').val();
    $.ajax({
      url: fetchUrl,
      data:{'district':district},
      cache: false,
      success: function(response){
            var jsonData = JSON.parse(response);
            var html = '';
            if((jsonData.state == null) || (jsonData.state == null) || (jsonData.state == null)){
                html ='';
            }else{
                html = "( <strong>State</strong> : "+jsonData.state+", "+"<strong>Region</strong> : "+jsonData.region+", "+"<strong>Ecology</strong> : "+jsonData.ecology+")";
            }
            $(".selected-result-location").html(html);
      }
    });
}

JS;


$this->registerJs(
    $js,
    \yii\web\View::POS_END,
    'datacard-create-form'
);
?>