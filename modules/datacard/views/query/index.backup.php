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
            'options' => [
                'method' => 'GET',
                'class' => 'warn-lose-changes',
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
                        'options' => ['id' => 'district-id','placeholder' => 'Select ...'],
                        'data' => isset($districts) ? $districts : [],
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
                            "depdrop:afterChange" => "function(event, id, value) { console.log('depdrop:afterChange'); console.log($('.selected-result-location')); setSelectedDistricts(); }",
                            "depdrop:error" => "function(event, id, value) { console.log('depdrop:error'); }",
                        ]
                    ])->label(false) ?>

                    </select>
                </div>

                <div class="col-sm-4">
                    <label for="event_municipality">Municipality</label>
                    <br/>
                    <?= $form->field($model, 'location_localbody')->widget(\kartik\depdrop\DepDrop::classname(), [
                        'options' => ['id' => 'localbody-id','placeholder' => 'Select ...'],
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
                            "depdrop:afterChange" => "function(event, id, value) { console.log('depdrop:afterChange'); console.log($('.selected-result-location')); setSelectedLocalbodies(); }",
                            "depdrop:error" => "function(event, id, value) { console.log('depdrop:error'); }",
                        ]
                    ])->label(false) ?>
                </div>

                <?= \yii\helpers\Html::activeHiddenInput($model, 'memid', ['value' => Yii::$app->user->identity->id]); ?>
                <?= \yii\helpers\Html::activeHiddenInput($model, 'memid', ['value' => Yii::$app->user->identity->id]); ?>
            </div>
            <br/>
            <div class="row">
                <div class="col-sm-6">
                    <label for="event_name">Disaster Type</label>
                    <br/>
                    <?= $form->field($model, 'event_type')
                        ->dropDownList(
                            $model->getDropdown_eventType(), ['multiple' => 'true', 'prompt' => 'Select...']
                        )->label(false);
                    ?>
                </div>
                <div class="col-sm-6">
                    <label for="event_cause">Cause</label>
                    <br/>
                    <?= $form->field($model, 'event_cause')
                        ->dropDownList(
                            $model->getDropdown_eventCause(), ['multiple' => 'true', 'prompt' => 'Select...']
                        )->label(false);
                    ?>
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
                    <?php

                    use kartik\date\DatePicker;
                    echo DatePicker::widget([
                        'model' => $model,
                        'form' => $form,
                        'attribute' => 'from_date',
                        'name' => 'from_date',
                        'value' => date('d-M-Y', strtotime('+2 days')),
                        'options' => ['placeholder' => 'Select ...'],
                        'pluginOptions' => [
                            'format' => 'dd-M-yyyy',
                            'todayHighlight' => true
                        ]
                    ]);
                    ?>
                </div>
                <div class="col-sm-6">
                    <?php
                    // usage without model
                    echo DatePicker::widget([
                        'model' => $model,
                        'form' => $form,
                        'attribute' => 'to_date',
                        'name' => 'to_date',
                        'value' => date('d-M-Y', strtotime('+2 days')),
                        'options' => ['placeholder' => 'Select ...'],
                        'pluginOptions' => [
                            'format' => 'dd-M-yyyy',
                            'todayHighlight' => true
                        ]
                    ]);
                    ?>
                </div>
            </div>
            <br/>
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

