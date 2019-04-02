<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\datacard\models\LocalbodySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="localbody-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'DDGN') ?>

    <?= $form->field($model, 'DCOD') ?>

    <?= $form->field($model, 'district') ?>

    <?= $form->field($model, 'local_bodies') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'state') ?>

    <?php // echo $form->field($model, 'changed_ga_pa') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
