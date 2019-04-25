<?php
/**
 * Created by PhpStorm.
 * User: Ram_DFID
 * Date: 18/03/2019
 * Time: 13:24
 */
use yii\widgets\ActiveForm;
$this->blocks['content-header'] = 'Query'
?>
<style>
    .custom-select {
        width: 100% !important;
    }
</style>
<div class="datacard-view">

<div class="row">
    <?php $form = ActiveForm::begin([

            'options'=>[
                'method' => 'get',
                    'class'=>'warn-lose-changes',
            ]]); ?>
    <div class="col-sm-6">
        <div class="row">
            <div class="col-sm-4">
                <label for="event_provience">Provience</label>
                <br/>
                <?= $form->field($model, 'location_state')
                    ->dropDownList(
                        $proviences, ['id' => 'provience-id', 'prompt' => 'Select...']
                    )->label(false);
                ?>
            </div>

            <div class="col-sm-4">
                <label for="event_district">District</label>
                <br/>
                <?= $form->field($model, 'location_district')->widget(\kartik\depdrop\DepDrop::classname(), [
                    'options' => ['id' => 'district-id'],
                    'data' =>[],// isset($districts) ? $districts : [],
                    'pluginOptions' => [
                        'allowClear' => true,
                        'depends' => ['provience-id'],
                        'placeholder' => 'Select...',
                        'url' => \yii\helpers\Url::to(['/datacard/location/districts'])
                    ],
                    'pluginEvents' => [
                        "depdrop:init" => "function() { console.log('depdrop:init'); }",
                        "depdrop:ready" => "function() { console.log('depdrop:ready'); }",
                        "depdrop:change" => "function(event, id, value, count) { console.log(id); console.log(value); console.log(count); }",
                        "depdrop:beforeChange" => "function(event, id, value) { console.log('depdrop:beforeChange'); }",
                        "depdrop:afterChange" => "function(event, id, value) { console.log('depdrop:afterChange'); console.log($('.selected-result-location')); setSelectedLocationRegions(); }",
                        "depdrop:error" => "function(event, id, value) { console.log('depdrop:error'); }",
                    ]
                ])->label(false) ?>

                </select>
            </div>

            <div class="col-sm-4">
                <label for="event_municipality">Municipality</label>
                <br/>
                <?= $form->field($model, 'location_localbody')->widget(\kartik\depdrop\DepDrop::classname(), [
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
                ])->label(false) ?>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-sm-6">
                <label for="event_name">Disaster Type</label>
                <br/>
                <?= $form->field($model, 'event_type')
                    ->dropDownList(
                        $model->getDropdown_eventType(), ['multiple'=>'true','prompt' => 'Select...']
                    )->label(false);
                ?>
            </div>
            <div class="col-sm-6">
                <label for="event_cause">Cause</label>
                <br/>
                <?= $form->field($model, 'event_cause')
                    ->dropDownList(
                        $model->getDropdown_eventCause(), ['multiple'=>'true','prompt' => 'Select...']
                    )->label(false);
                ?>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-sm-12">
                <small>Use Ctrl-Click and/or Shift-Click to deselect or for multiple selections. If no selections are
                    made, all items will be selected.
                </small>
            </div>
        </div>
        <br/>


        <div class="row">
            <div class="col-sm-6">
                <small>Select only events with</small>
                <br/>
                <select name="event_events" class="custom-select" multiple>
                    <option>Death</option>
                    <option>Injured</option>
                    <option>Missing</option>
                    <option>Relocated</option>
                    <option>Houses Damaged</option>
                    <option>Houses Destroyed</option>
                </select>
            </div>
            <div class="col-sm-4">
                <small>Select events that affected</small>
                <select name="event_affected" class="custom-select" multiple>
                    <option>Water supply</option>
                    <option>Health Sector</option>
                    <option>Education</option>
                    <option>Transportation</option>
                    <option>Communication</option>
                    <option>Other</option>
                </select>
            </div>
            <div class="col-sm-2">
                <small>Logic</small>
                <select name="event_query_logic" class="custom-select" multiple>
                    <option>AND</option>
                    <option>OR</option>
                </select>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-sm-12">
                Select Date Range
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-12">From</div>
                </div>
                <div class="row">
                    <div class="col-sm-4"><input size="4" placeholder="yyyy"></div>
                    <div class="col-sm-4"><input size="2" placeholder="mm"></div>
                    <div class="col-sm-4"><input size="2" placeholder="dd"></div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-12">To</div>
                </div>
                <div class="row">
                    <div class="col-sm-4"><input size="4" placeholder="yyyy"></div>
                    <div class="col-sm-4"><input size="2" placeholder="mm"></div>
                    <div class="col-sm-4"><input size="2" placeholder="dd"></div>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-sm-6">
                <small>Sort result by</small>
                <select>
                    <option>Entry Order</option>
                    <option>Datacard Serial</option>
                    <option>Geography, Event, Date</option>
                    <option>Geography, Date, Event</option>
                    <option>Event, Geography, Date</option>
                    <option>Event, Date, Geography</option>
                    <option>Date, Geography, Event</option>
                    <option>Date, Event, Geography</option>
                </select>
            </div>
            <div class="col-sm-6">
                <small>Per page</small>
                <input size="3"/>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-12" align="right">
                <div class="form-group">
                    <?= \yii\helpers\Html::submitButton('Search',
                        [
                            'class' => 'btn btn-success',
                        ]) ?>
                </div>
            </div>

        </div>
    </div>
    <?php ActiveForm::end(); ?>
    <div class="col-sm-6">
        <div id="map" style="border: solid; height: 500px"></div>
    </div>
</div>

</div>

