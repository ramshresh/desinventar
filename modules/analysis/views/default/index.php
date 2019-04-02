<?php
    $model = new \app\modules\datacard\models\Datacard();
    $districts=\yii\helpers\ArrayHelper::map(\app\modules\datacard\models\Region::find()->select('district')->asArray()->all(), 'district', 'district');
?>
<div class="analysis-default-index">
    <div class="row">
        <div class="col-md-12">
            <h5>Select What Profile You Want</h5>
        </div>
    </div>


    <?php $form = \yii\widgets\ActiveForm::begin(['options'=>['class'=>'warn-lose-changes']]); ?>
    <div class="row">
        <div class="col-md-6">
            <label>Disaster Type</label>
            <?= $form->field($model, 'event_type')
                ->dropDownList(
                    $model->getDropdown_eventType(), ['prompt' => 'Select...']
                )->label(false);
            ?>
        </div>
        <div class="col-md-6">
            <label>District</label>
            <?= $form->field($model, 'location_district')
                ->dropDownList(
                    $districts, ['id' => 'district-id', 'prompt' => 'All']
                )->label(false);
            ?>
        </div>
    </div>
    <?php \yii\widgets\ActiveForm::end();?>
</div>
