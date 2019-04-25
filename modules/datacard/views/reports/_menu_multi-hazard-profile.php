<?php
/**
 * Created by PhpStorm.
 * User: Ram_DFID
 * Date: 04/04/2019
 * Time: 13:34
 */
?>

<?= \yii\bootstrap\Nav::widget([
    'options' => [
        'class' => 'nav-pills nav-stacked',
    ],
    'items' => [
        ['label' => 'Composition of Disaster', 'url' => ['/datacard/reports/multi-hazard-profile#ref1_composition_of_disasters']],
        ['label' => 'Temporal Behavoiur',],
        ['label' => 'Datacards',],
        ['label' => 'Houses Destroyed + Houses Damaged',],
        ['label' => 'Indirectly/Directly Affected',],
        ['label' => 'Spatial Distribution - Deaths',],
        ['label' => 'Spatial Distribution - Data Cards',],
        ['label' => 'Spatial Distribution - Houses Destroyed + Houses Damaged',],
        ['label' => 'Spatial Distribution - Indirectly/Directly Affected',],
        ['label' => 'Statistics - Composition of Disasters ',],
        ['label' => 'Statistics - Spatial Distribution',],
        ['label' => 'Statistics - Temporal Behaviour',],
    ],
]) ?>
