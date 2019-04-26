<?php
/**
 * Created by PhpStorm.
 * User: Ram_DFID
 * Date: 04/04/2019
 * Time: 09:52
 */

$this->title = 'Profile - Multi-hazard';
$this->params['breadcrumbs'][] = ['label' => 'Profile Reports', 'url' => ['']];
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .bss {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 10px;
        font-style: normal;
        vertical-align: text-top;
        border: groove;
    }

    tr, td {
        text-align: right;
        border: groove;
    }

    .map {
        width: 100%;
        height: 500px;
        border: solid;
    }

    #legend {
        display: inline-block;
        width: 100%;
        //margin: 0 1em 2em 0;
        //font-size: 0.85em;
        vertical-align: top;

    }

    .geostats-legend-block {
        border: 1px solid #555555;
        display: block;
        float: left;
        height: 12px;
        width: 20px;
        position: relative;
    }
</style>

<div class="row">
    <div class="col-sm-12">
        <div class="callout callout-success" style="text-align: center">
            <strong>
                Country Profile (Nepal):
            </strong>
            <p>
                This Country Profile shows a set of typical results known as "Preliminary Analysis" comming from the
                disaster database.
                Charts, Maps and tables below will provide you with a basic understanding of the effects of many
                types of disasters occurred in the region.
            </p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        <div class="panel panel-default bss">
            <div class="panel-body">
                <?= $this->render('_menu_multi-hazard-profile') ?>
            </div>
        </div>
    </div>
    <div class="col-sm-10">
        <div class="row">
            <div col-sm-12>
                <h4 id="ref1_composition_of_disasters" class="bg-light-blue-active color-palette"
                    style="text-align:center"><strong>Spatial Distribution</strong></h4>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="bss panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div id="variables"></div>
                                <div id="legend"></div>
                            </div>
                            <div class="col-sm-8">
                                <div class="chart-area">
                                    <div id="variables"></div>
                                    <div id="legend"></div>
                                    <div id="map" class="map"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div col-sm-12>
                <h4 id="ref1_composition_of_disasters" class="bg-light-blue-active color-palette"
                    style="text-align:center"><strong>Composition of
                        Disasters</strong></h4>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="bss panel panel-default">
                    <div class="panel-body">
                        <h5 class="bg-light-blue color-palette">Deaths</h5>
                        <div class="chart-area">
                            <canvas id="pie-chart-deaths" width="800" height="450"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="bss panel panel-default">
                    <div class="panel-body">
                        <h5 class="bg-light-blue color-palette">Datacards</h5>
                        <div class="chart-area">
                            <canvas id="pie-chart-datacards" width="800" height="450"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="bss panel panel-default">
                    <div class="panel-body">
                        <h5 class="bg-light-blue color-palette">Indirectly + Directly Affected</h5>
                        <div class="chart-area">
                            <canvas id="pie-chart-affected" width="800" height="450"></canvas>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-sm-6">
                <div class="bss panel panel-default">
                    <div class="panel-body">
                        <h5 class="bg-light-blue color-palette">Houses Destroyed + Damaged</h5>
                        <div class="chart-area">
                            <canvas id="pie-chart-house_destroyed_damaged" width="800"
                                    height="450"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="bss panel panel-default">
                    <div class="panel-body">
                        <h5 class="bg-light-blue color-palette">Temposal Behaviour - Deaths</h5>
                        <div class="chart-area">
                            <canvas id="pie-chart-deaths_temp" width="800" height="100"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="bss panel panel-default">
                    <div class="panel-body">
                        <h5 class="bg-light-blue color-palette">Temposal Behaviour - Datacards</h5>
                        <div class="chart-area">
                            <canvas id="pie-chart-datacards_temp" width="800" height="100"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="bss panel panel-default">
                    <div class="panel-body">
                        <h5 class="bg-light-blue color-palette">Temposal Behaviour - Directly and Indirectly
                            affected</h5>
                        <div class="chart-area">
                            <canvas id="pie-chart-affected_temp" width="800" height="100"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-12">
                <div class="bss panel panel-default">
                    <div class="panel-body">
                        <h5 class="bg-light-blue color-palette">Statistics - Composition of Disasters</h5>
                        <table class="bss" cellspacing="1" cellpadding="1" border="1">
                            <tr>
                                <th style="width: 10px">#</th>
                                <th style="font-weight:bold;width: 110px">Event</th>
                                <th style="font-weight:bold">DataCards</th>
                                <th style="font-weight:bold">Deaths</th>
                                <th style="font-weight:bold">Injured</th>
                                <th style="font-weight:bold">Missing</th>
                                <th style="font-weight:bold">Affected</th>
                                <th style="font-weight:bold">Destroyed</th>
                                <th style="font-weight:bold">Damaged</th>
                                <th style="font-weight:bold">Relocated</th>
                                <th style="font-weight:bold">Rescued</th>
                                <th style="font-weight:bold">Relieved</th>
                                <th style="font-weight:bold">Losses_nrs</th>
                                <th style="font-weight:bold">Losses_usd</th>
                                <th style="font-weight:bold">EducationCenters</th>
                                <th style="font-weight:bold">Hospitals</th>
                                <th style="font-weight:bold">DamagesInCrops_ha</th>
                                <th style="font-weight:bold">DamagesInCrops_ha</th>
                                <th style="font-weight:bold">LostCattle</th>
                                <th style="font-weight:bold">DamagesInRoads_mts</th>
                            </tr>
                            <?php $i = 0; ?>
                            <?php foreach ($compositionOfDisasters as $row): ?>
                                <?php $i = $i + 1; ?>
                                <tr>
                                    <th style="width: 10px"><?= $i ?></th>
                                    <td><?= $row['Event'] ?></td>
                                    <td><?= $row['DataCards'] ?></td>
                                    <td><?= $row['Deaths'] ?></td>
                                    <td><?= $row['Injured'] ?></td>
                                    <td><?= $row['Missing'] ?></td>
                                    <td><?= $row['Affected'] ?></td>
                                    <td><?= $row['Destroyed'] ?></td>
                                    <td><?= $row['Damaged'] ?></td>
                                    <td><?= $row['Relocated'] ?></td>
                                    <td><?= $row['Rescued'] ?></td>
                                    <td><?= $row['Relieved'] ?></td>
                                    <td><?= $row['Losses_nrs'] ?></td>
                                    <td><?= $row['Losses_usd'] ?></td>
                                    <td><?= $row['EducationCenters'] ?></td>
                                    <td><?= $row['Hospitals'] ?></td>
                                    <td><?= $row['DamagesInCrops_ha'] ?></td>
                                    <td><?= $row['DamagesInCrops_ha'] ?></td>
                                    <td><?= $row['LostCattle'] ?></td>
                                    <td><?= $row['DamagesInRoads_mts'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="bss panel panel-default">
                    <div class="panel-body">
                        <h5 class="bg-light-blue color-palette">Statistics - Temporal Behaviour</h5>
                        <table class="bss" cellspacing="1" cellpadding="1" border="1">
                            <tr>
                                <th style="width: 10px">#</th>
                                <th style="font-weight:bold;width: 110px">Year</th>
                                <th style="font-weight:bold">DataCards</th>
                                <th style="font-weight:bold">Deaths</th>
                                <th style="font-weight:bold">Injured</th>
                                <th style="font-weight:bold">Missing</th>
                                <th style="font-weight:bold">Affected</th>
                                <th style="font-weight:bold">Destroyed</th>
                                <th style="font-weight:bold">Damaged</th>
                                <th style="font-weight:bold">Relocated</th>
                                <th style="font-weight:bold">Rescued</th>
                                <th style="font-weight:bold">Relieved</th>
                                <th style="font-weight:bold">Losses_nrs</th>
                                <th style="font-weight:bold">Losses_usd</th>
                                <th style="font-weight:bold">EducationCenters</th>
                                <th style="font-weight:bold">Hospitals</th>
                                <th style="font-weight:bold">DamagesInCrops_ha</th>
                                <th style="font-weight:bold">DamagesInCrops_ha</th>
                                <th style="font-weight:bold">LostCattle</th>
                                <th style="font-weight:bold">DamagesInRoads_mts</th>
                            </tr>
                            <?php $i = 0; ?>
                            <?php foreach ($temporalBehaviour as $row): ?>
                                <?php $i = $i + 1; ?>
                                <tr>
                                    <th style="width: 10px"><?= $i ?></th>
                                    <td><?= $row['Year'] ?></td>
                                    <td><?= $row['DataCards'] ?></td>
                                    <td><?= $row['Deaths'] ?></td>
                                    <td><?= $row['Injured'] ?></td>
                                    <td><?= $row['Missing'] ?></td>
                                    <td><?= $row['Affected'] ?></td>
                                    <td><?= $row['Destroyed'] ?></td>
                                    <td><?= $row['Damaged'] ?></td>
                                    <td><?= $row['Relocated'] ?></td>
                                    <td><?= $row['Rescued'] ?></td>
                                    <td><?= $row['Relieved'] ?></td>
                                    <td><?= $row['Losses_nrs'] ?></td>
                                    <td><?= $row['Losses_usd'] ?></td>
                                    <td><?= $row['EducationCenters'] ?></td>
                                    <td><?= $row['Hospitals'] ?></td>
                                    <td><?= $row['DamagesInCrops_ha'] ?></td>
                                    <td><?= $row['DamagesInCrops_ha'] ?></td>
                                    <td><?= $row['LostCattle'] ?></td>
                                    <td><?= $row['DamagesInRoads_mts'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="bss panel panel-default">
                    <div class="panel-body">
                        <h5 class="bg-light-blue color-palette">Statistics - Spatial Distribution</h5>
                        <table class="bss" cellspacing="1" cellpadding="1" border="1">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th style="font-weight:bold;width: 110px">District</th>
                                <th style="font-weight:bold">DataCards</th>
                                <th style="font-weight:bold">Deaths</th>
                                <th style="font-weight:bold">Injured</th>
                                <th style="font-weight:bold">Missing</th>
                                <th style="font-weight:bold">Affected</th>
                                <th style="font-weight:bold">Destroyed</th>
                                <th style="font-weight:bold">Damaged</th>
                                <th style="font-weight:bold">Relocated</th>
                                <th style="font-weight:bold">Rescued</th>
                                <th style="font-weight:bold">Relieved</th>
                                <th style="font-weight:bold">Losses_nrs</th>
                                <th style="font-weight:bold">Losses_usd</th>
                                <th style="font-weight:bold">EducationCenters</th>
                                <th style="font-weight:bold">Hospitals</th>
                                <th style="font-weight:bold">DamagesInCrops_ha</th>
                                <th style="font-weight:bold">DamagesInCrops_ha</th>
                                <th style="font-weight:bold">LostCattle</th>
                                <th style="font-weight:bold">DamagesInRoads_mts</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>

                            <?php
                            $spd_p1 = array_filter($spatialDistribution, function ($item) {
                                return $item['Provience'] == 1;
                            });
                            $spd_p2 = array_filter($spatialDistribution, function ($item) {
                                return $item['Provience'] == 2;
                            });
                            $spd_p3 = array_filter($spatialDistribution, function ($item) {
                                return $item['Provience'] == 3;
                            });
                            $spd_p4 = array_filter($spatialDistribution, function ($item) {
                                return $item['Provience'] == 4;
                            });
                            $spd_p5 = array_filter($spatialDistribution, function ($item) {
                                return $item['Provience'] == 5;
                            });
                            $spd_p6 = array_filter($spatialDistribution, function ($item) {
                                return $item['Provience'] == 6;
                            });
                            $spd_p7 = array_filter($spatialDistribution, function ($item) {
                                return $item['Provience'] == 7;
                            });
                            ?>
                            <tr class="bg-gray disabled color-palette" style="text-align: left">
                                <td colspan="2">Provience 1</td>
                            </tr>
                            <?php foreach ($spd_p1 as $row): ?>
                                <?php $i = $i + 1; ?>
                                <tr>
                                    <th style="width: 10px"><?= $i ?></th>
                                    <td><?= $row['District'] ?></td>
                                    <td><?= $row['DataCards'] ?></td>
                                    <td><?= $row['Deaths'] ?></td>
                                    <td><?= $row['Injured'] ?></td>
                                    <td><?= $row['Missing'] ?></td>
                                    <td><?= $row['Affected'] ?></td>
                                    <td><?= $row['Destroyed'] ?></td>
                                    <td><?= $row['Damaged'] ?></td>
                                    <td><?= $row['Relocated'] ?></td>
                                    <td><?= $row['Rescued'] ?></td>
                                    <td><?= $row['Relieved'] ?></td>
                                    <td><?= $row['Losses_nrs'] ?></td>
                                    <td><?= $row['Losses_usd'] ?></td>
                                    <td><?= $row['EducationCenters'] ?></td>
                                    <td><?= $row['Hospitals'] ?></td>
                                    <td><?= $row['DamagesInCrops_ha'] ?></td>
                                    <td><?= $row['DamagesInCrops_ha'] ?></td>
                                    <td><?= $row['LostCattle'] ?></td>
                                    <td><?= $row['DamagesInRoads_mts'] ?></td>
                                </tr>
                            <?php endforeach; ?>

                            <tr class="bg-gray disabled color-palette" style="text-align: left">
                                <td colspan="2">Provience 2</td>
                            </tr>
                            <?php foreach ($spd_p2 as $row): ?>
                                <?php $i = $i + 1; ?>
                                <tr>
                                    <th style="width: 10px"><?= $i ?></th>
                                    <td><?= $row['District'] ?></td>
                                    <td><?= $row['DataCards'] ?></td>
                                    <td><?= $row['Deaths'] ?></td>
                                    <td><?= $row['Injured'] ?></td>
                                    <td><?= $row['Missing'] ?></td>
                                    <td><?= $row['Affected'] ?></td>
                                    <td><?= $row['Destroyed'] ?></td>
                                    <td><?= $row['Damaged'] ?></td>
                                    <td><?= $row['Relocated'] ?></td>
                                    <td><?= $row['Rescued'] ?></td>
                                    <td><?= $row['Relieved'] ?></td>
                                    <td><?= $row['Losses_nrs'] ?></td>
                                    <td><?= $row['Losses_usd'] ?></td>
                                    <td><?= $row['EducationCenters'] ?></td>
                                    <td><?= $row['Hospitals'] ?></td>
                                    <td><?= $row['DamagesInCrops_ha'] ?></td>
                                    <td><?= $row['DamagesInCrops_ha'] ?></td>
                                    <td><?= $row['LostCattle'] ?></td>
                                    <td><?= $row['DamagesInRoads_mts'] ?></td>
                                </tr>
                            <?php endforeach; ?>

                            <tr class="bg-gray disabled color-palette" style="text-align: left">
                                <td colspan="2">Provience 3</td>
                            </tr>
                            <?php foreach ($spd_p3 as $row): ?>
                                <?php $i = $i + 1; ?>
                                <tr>
                                    <th style="width: 10px"><?= $i ?></th>
                                    <td><?= $row['District'] ?></td>
                                    <td><?= $row['DataCards'] ?></td>
                                    <td><?= $row['Deaths'] ?></td>
                                    <td><?= $row['Injured'] ?></td>
                                    <td><?= $row['Missing'] ?></td>
                                    <td><?= $row['Affected'] ?></td>
                                    <td><?= $row['Destroyed'] ?></td>
                                    <td><?= $row['Damaged'] ?></td>
                                    <td><?= $row['Relocated'] ?></td>
                                    <td><?= $row['Rescued'] ?></td>
                                    <td><?= $row['Relieved'] ?></td>
                                    <td><?= $row['Losses_nrs'] ?></td>
                                    <td><?= $row['Losses_usd'] ?></td>
                                    <td><?= $row['EducationCenters'] ?></td>
                                    <td><?= $row['Hospitals'] ?></td>
                                    <td><?= $row['DamagesInCrops_ha'] ?></td>
                                    <td><?= $row['DamagesInCrops_ha'] ?></td>
                                    <td><?= $row['LostCattle'] ?></td>
                                    <td><?= $row['DamagesInRoads_mts'] ?></td>
                                </tr>
                            <?php endforeach; ?>

                            <tr class="bg-gray disabled color-palette" style="text-align: left">
                                <td colspan="2">Provience 4</td>
                            </tr>
                            <?php foreach ($spd_p4 as $row): ?>
                                <?php $i = $i + 1; ?>
                                <tr>
                                    <th style="width: 10px"><?= $i ?></th>
                                    <td><?= $row['District'] ?></td>
                                    <td><?= $row['DataCards'] ?></td>
                                    <td><?= $row['Deaths'] ?></td>
                                    <td><?= $row['Injured'] ?></td>
                                    <td><?= $row['Missing'] ?></td>
                                    <td><?= $row['Affected'] ?></td>
                                    <td><?= $row['Destroyed'] ?></td>
                                    <td><?= $row['Damaged'] ?></td>
                                    <td><?= $row['Relocated'] ?></td>
                                    <td><?= $row['Rescued'] ?></td>
                                    <td><?= $row['Relieved'] ?></td>
                                    <td><?= $row['Losses_nrs'] ?></td>
                                    <td><?= $row['Losses_usd'] ?></td>
                                    <td><?= $row['EducationCenters'] ?></td>
                                    <td><?= $row['Hospitals'] ?></td>
                                    <td><?= $row['DamagesInCrops_ha'] ?></td>
                                    <td><?= $row['DamagesInCrops_ha'] ?></td>
                                    <td><?= $row['LostCattle'] ?></td>
                                    <td><?= $row['DamagesInRoads_mts'] ?></td>
                                </tr>
                            <?php endforeach; ?>

                            <tr class="bg-gray disabled color-palette" style="text-align: left">
                                <td colspan="2">Provience 5</td>
                            </tr>
                            <?php foreach ($spd_p5 as $row): ?>
                                <?php $i = $i + 1; ?>
                                <tr>
                                    <th style="width: 10px"><?= $i ?></th>
                                    <td><?= $row['District'] ?></td>
                                    <td><?= $row['DataCards'] ?></td>
                                    <td><?= $row['Deaths'] ?></td>
                                    <td><?= $row['Injured'] ?></td>
                                    <td><?= $row['Missing'] ?></td>
                                    <td><?= $row['Affected'] ?></td>
                                    <td><?= $row['Destroyed'] ?></td>
                                    <td><?= $row['Damaged'] ?></td>
                                    <td><?= $row['Relocated'] ?></td>
                                    <td><?= $row['Rescued'] ?></td>
                                    <td><?= $row['Relieved'] ?></td>
                                    <td><?= $row['Losses_nrs'] ?></td>
                                    <td><?= $row['Losses_usd'] ?></td>
                                    <td><?= $row['EducationCenters'] ?></td>
                                    <td><?= $row['Hospitals'] ?></td>
                                    <td><?= $row['DamagesInCrops_ha'] ?></td>
                                    <td><?= $row['DamagesInCrops_ha'] ?></td>
                                    <td><?= $row['LostCattle'] ?></td>
                                    <td><?= $row['DamagesInRoads_mts'] ?></td>
                                </tr>
                            <?php endforeach; ?>

                            <tr class="bg-gray disabled color-palette" style="text-align: left">
                                <td colspan="2">Provience 6</td>
                            </tr>
                            <?php foreach ($spd_p6 as $row): ?>
                                <?php $i = $i + 1; ?>
                                <tr>
                                    <th style="width: 10px"><?= $i ?></th>
                                    <td><?= $row['District'] ?></td>
                                    <td><?= $row['DataCards'] ?></td>
                                    <td><?= $row['Deaths'] ?></td>
                                    <td><?= $row['Injured'] ?></td>
                                    <td><?= $row['Missing'] ?></td>
                                    <td><?= $row['Affected'] ?></td>
                                    <td><?= $row['Destroyed'] ?></td>
                                    <td><?= $row['Damaged'] ?></td>
                                    <td><?= $row['Relocated'] ?></td>
                                    <td><?= $row['Rescued'] ?></td>
                                    <td><?= $row['Relieved'] ?></td>
                                    <td><?= $row['Losses_nrs'] ?></td>
                                    <td><?= $row['Losses_usd'] ?></td>
                                    <td><?= $row['EducationCenters'] ?></td>
                                    <td><?= $row['Hospitals'] ?></td>
                                    <td><?= $row['DamagesInCrops_ha'] ?></td>
                                    <td><?= $row['DamagesInCrops_ha'] ?></td>
                                    <td><?= $row['LostCattle'] ?></td>
                                    <td><?= $row['DamagesInRoads_mts'] ?></td>
                                </tr>
                            <?php endforeach; ?>

                            <tr class="bg-gray disabled color-palette" style="text-align: left">
                                <td colspan="2">Provience 7</td>
                            </tr>
                            <?php foreach ($spd_p7 as $row): ?>
                                <?php $i = $i + 1; ?>
                                <tr>
                                    <th style="width: 10px"><?= $i ?></th>
                                    <td><?= $row['District'] ?></td>
                                    <td><?= $row['DataCards'] ?></td>
                                    <td><?= $row['Deaths'] ?></td>
                                    <td><?= $row['Injured'] ?></td>
                                    <td><?= $row['Missing'] ?></td>
                                    <td><?= $row['Affected'] ?></td>
                                    <td><?= $row['Destroyed'] ?></td>
                                    <td><?= $row['Damaged'] ?></td>
                                    <td><?= $row['Relocated'] ?></td>
                                    <td><?= $row['Rescued'] ?></td>
                                    <td><?= $row['Relieved'] ?></td>
                                    <td><?= $row['Losses_nrs'] ?></td>
                                    <td><?= $row['Losses_usd'] ?></td>
                                    <td><?= $row['EducationCenters'] ?></td>
                                    <td><?= $row['Hospitals'] ?></td>
                                    <td><?= $row['DamagesInCrops_ha'] ?></td>
                                    <td><?= $row['DamagesInCrops_ha'] ?></td>
                                    <td><?= $row['LostCattle'] ?></td>
                                    <td><?= $row['DamagesInRoads_mts'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="data-container"
     data-multihazard_summary="<?php echo htmlspecialchars(json_encode($multihazard_summary)); ?>"
     data-distinct_event_types="<?php echo htmlspecialchars(json_encode($distinct_event_types)); ?>"
     data-temporal_behaviour="<?php echo htmlspecialchars(json_encode($temporalBehaviour)); ?>"
     data-distinct_years="<?php echo htmlspecialchars(json_encode($distinct_years)); ?>"
></div>
<?php
$script_chart = <<< JS
var dataContainer= $('.data-container');
var multihazard_summary = dataContainer.data('multihazard_summary');
var temporal_behaviour = dataContainer.data('temporal_behaviour');

var distinct_event_types_obj = dataContainer.data('distinct_event_types');
var distinct_years_obj = dataContainer.data('distinct_years');
var distinct_event_types =[]; 
var distinct_years =[]; 

distinct_event_types_obj.forEach(function(obj) {
  distinct_event_types.push(obj.Events);
});
distinct_years_obj.forEach(function(obj) {
  distinct_years.push(obj.Years);
});

var data_deaths = [];
var data_datacards = [];
var data_affected = [];
var data_house_destroyed_damaged = [];

var data_deaths_temp = [];
var data_datacards_temp = [];
var data_affected_temp = [];
var data_house_destroyed_damaged_temp = [];

distinct_event_types.forEach(function(event_type) {
            var filterObj = multihazard_summary.filter(function(e) {
                return e.Event == event_type;
            });
            data_deaths.push(filterObj[0]['Deaths']);
            data_datacards.push(filterObj[0]['DataCards']);
            data_affected.push(filterObj[0]['Affected']);
            data_house_destroyed_damaged.push(filterObj[0]['Destroyed']+filterObj[0]['Damaged']);
        });
distinct_years.forEach(function(Year) {
            var filterObj = temporal_behaviour.filter(function(e) {           
                return e.Year == Year;
            });
            data_deaths_temp.push(filterObj[0]['Deaths']);
            data_datacards_temp.push(filterObj[0]['DataCards']);
            data_affected_temp.push(filterObj[0]['Affected']);
            data_house_destroyed_damaged_temp.push(filterObj[0]['Destroyed']+filterObj[0]['Damaged']);
        });
new Chart(document.getElementById("pie-chart-deaths"), {
            type: 'pie',
            data: {
              labels: distinct_event_types,//["Africa", "Asia", "Europe", "Latin America", "North America"],
              datasets: [{
                label: "Deaths",
                //backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                backgroundColor: palette('tol', data_deaths.length).map(function(hex) {
                    return '#' + hex;
                }),
               data: data_deaths//[2478,5267,734,784,433]
              }]
            },
            options: {
              title: {
                display: true,
                text: 'Deaths'
              },
              legend: {
                display: true,
                position: 'left',
                labels: {
                    fontColor: 'rgb(255, 99, 132)',
                    fontSize: 10
                    }
                }
            }
        });  
new Chart(document.getElementById("pie-chart-datacards"), {
            type: 'pie',
            data: {
              labels: distinct_event_types,//["Africa", "Asia", "Europe", "Latin America", "North America"],
              datasets: [{
                label: "Recorder Datacards",
                //backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                backgroundColor: palette('tol', data_datacards.length).map(function(hex) {
                    return '#' + hex;
                }),
               data: data_datacards//[2478,5267,734,784,433]
              }]
            },
            options: {
              title: {
                display: true,
                text: 'Datacards'
              },
              legend: {
                display: true,
                position: 'left',
                labels: {
                    fontColor: 'rgb(255, 99, 132)',
                    fontSize: 10
                    }
                }
            }
        });   
new Chart(document.getElementById("pie-chart-affected"), {
            type: 'pie',
            data: {
              labels: distinct_event_types,//["Africa", "Asia", "Europe", "Latin America", "North America"],
              datasets: [{
                label: "People Affected",
                //backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                backgroundColor: palette('tol', data_affected.length).map(function(hex) {
                    return '#' + hex;
                }),
               data: data_affected//[2478,5267,734,784,433]
              }]
            },
            options: {
              title: {
                display: true,
                text: 'Affected'
              },
              legend: {
                display: true,
                position: 'left',
                labels: {
                    fontColor: 'rgb(255, 99, 132)',
                    fontSize: 10
                    }
                }
            }
        });  
new Chart(document.getElementById("pie-chart-house_destroyed_damaged"), {
            type: 'pie',
            data: {
              labels: distinct_event_types,//["Africa", "Asia", "Europe", "Latin America", "North America"],
              datasets: [{
                label: "Houses Destroyed + Damaged",
                //backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                backgroundColor: palette('tol', data_house_destroyed_damaged.length).map(function(hex) {
                    return '#' + hex;
                }),
               data: data_house_destroyed_damaged//[2478,5267,734,784,433]
              }]
            },
            options: {
              title: {
                display: true,
                text: 'Houses Destroyed and Damaged'
              },
              legend: {
                display: true,
                position: 'left',
                labels: {
                    fontColor: 'rgb(255, 99, 132)',
                    fontSize: 10
                    }
                }
            }
        });  
new Chart(document.getElementById("pie-chart-deaths_temp"), {
            type: 'line',
            data: {
              labels: distinct_years,//["Africa", "Asia", "Europe", "Latin America", "North America"],
              datasets: [{
                label: "Timeline - Deaths",
               data: data_deaths_temp//[2478,5267,734,784,433]
              }]
            }
        });
new Chart(document.getElementById("pie-chart-datacards_temp"), {
            type: 'line',
            data: {
              labels: distinct_years,//["Africa", "Asia", "Europe", "Latin America", "North America"],
              datasets: [{
                label: "Timeline - Datacards",
               data: data_datacards_temp//[2478,5267,734,784,433]
              }]
            }
        });
new Chart(document.getElementById("pie-chart-affected_temp"), {
            type: 'line',
            data: {
              labels: distinct_years,//["Africa", "Asia", "Europe", "Latin America", "North America"],
              datasets: [{
                label: "Timeline - Directly or Indirectly affected",
               data: data_affected_temp//[2478,5267,734,784,433]
              }]
            }
        });

//////////////


/**
* Map
*/    
 //Global Variables

    var geojsondata, joindata;
var vectorLayer_promise = {
        json: function (rootUrl, parameters) {
            return $.ajax({
                jsonp: false,
                url: rootUrl + L.Util.getParamString(parameters),
                dataType: 'jsonp',
                jsonpCallback: 'getJson',
                success: function (data) {
                    console.log('Promise success');
                }
            }).then(function (data) {
                return data;
            });
        }
    };

    var data_promise = {
        json: function (data_url) {
            return $.getJSON(data_url).then(function (data) {
                return data;
            });
        }
    }
    
    //get user defined class
    // if equals value
    function getClass(val, a) {
        // return 2;
        for (var i = 0; i < a.length; i++) {
            var item = a[i].split(/ - /);
            if (val <= parseFloat(item[1])) {
                return i;
            }
        }
    }
// https://github.com/simogeo/geostats/blob/master/sample.html
    /// GLOBAL VARIABLES ///
    var vectorLayer;
    
    ////////////////////////////
    // Excuse the short function name: this is not setting a JavaScript
    // variable, but rather the variable by which the map is colored.
    // The input is a string 'name', which specifies which column
    // of the imported JSON file is used to color the map.
    function setVariable(name) {
        
        attributeValues=_.map(joindata,name);
        // geostats settings
        serie = new geostats(_.compact(attributeValues));
        serie.getClassEqInterval(5);
        //serie.getClassArithmeticProgression(5);
        var class_ranges = serie.ranges;
        serie.setColors(hues);
        var legend= serie.getHtmlLegend(null, name);        
        
        setLegend(legend);
        var scale = ranges[name];
        vectorLayer.eachLayer(function (layer) {

            // Decide the color for each state by finding its
            // place between min & max, and choosing a particular
            // color as index.
           /* var division = Math.floor(
                (hues.length - 1) *
                ((layer.properties[name] - scale.min) /
                    (scale.max - scale.min)));
            */
           
           var division = getClass(layer.properties[name], class_ranges);
            // See full path options at
            // http://leafletjs.com/reference.html#path
            layer.setStyle({
                fillColor: hues[division],
                weight: 0.5,
                opacity: 1,
                color: 'black',
                dashArray: '3',
                fillOpacity: 0.99
            });
        });
    }
    function setLegend(legend) {
       $('#legend').html(legend);
    }

    // Choropleth colors from http://colorbrewer2.org/
    // You can choose your own range (or different number of colors)
    // and the code will compensate.
    //var hues = ['#eff3ff','#bdd7e7','#6baed6','#3182bd','#08519c','#00264d'];
    var hues = new Array('#FEF0D9', '#FDCC8A', '#FC8D59', '#E34A33', '#B30000')

    function defaultStyle(feature) {
        return {
            fillColor: null,
            weight: 0.5,
            opacity: 1,
            color: 'white',
            dashArray: '3',
            fillOpacity: 0.7
        };
    }

    ////////////////////////////
    // The names of variables that we'll show in the UI for
    // styling. These need to match exactly.
    var variables = [
        'DataCards',
        'Deaths',
        'Injured',
        'Missing',
        'Affected',
        'Destroyed',
        'Damaged'
    ];
    // Collect the range of each variable over the full set, so
    // we know what to color the brightest or darkest.
    var ranges = {};
    var attributeValues = {};
    var select_jq = $('<select></select>')
        .appendTo($('#variables'))
        .on('change', function () {
            setVariable($(this).val());
            

        });
    for (var i = 0; i < variables.length; i++) {
        ranges[variables[i]] = {min: Infinity, max: -Infinity};
        // Simultaneously, build the UI for selecting different
        // ranges
        $('<option></option>')
            .text(variables[i])
            .attr('value', variables[i])
            .appendTo(select_jq);
    }



    function joinData(data, dataKey, layerKey) {
        var features = vectorLayer.getLayers();


        var by_layerKey = {};

        // Rearrange it so that instead of being a big array,
        // it's an object that is indexed by the state name,
        // that we'll use to join on.
        for (var i = 0; i < features.length; i++) {
            by_layerKey[features[i].feature.properties[layerKey]] = features[i];
        }


        for (i = 0; i < data.length; i++) {
            // Match the GeoJSON data (by_layerKey) with the tabular data
            // (data), replacing the GeoJSON feature properties
            // with the full data.
            by_layerKey[data[i][dataKey]].properties = data[i];
           
            for (var j = 0; j < variables.length; j++) {
                // Simultaneously build the table of min and max
                // values for each attribute.
                var n = variables[j];
                
                
                ranges[n].min = Math.min(data[i][n], ranges[n].min);
                ranges[n].max = Math.max(data[i][n], ranges[n].max);
            }
        }
                
        // Create a new GeoJSON array of features and set it
        // as the new vectorLayer content.
        var newFeatures = [];
        for (i in by_layerKey) {
            newFeatures.push(by_layerKey[i]);
        }

        vectorLayer.addData(newFeatures);

        // Kick off by filtering on an attribute.
        setVariable(variables[0]);
        
    }

    ////////////////////////////
    var vectorLayer = null;

    var map, group;
    map = L.map('map', {
        zoomControl: false
    }).setView([28, 84], 7);
    group = new L.featureGroup().addTo(map);

    ////////////////////////////
    var rootUrl = 'http://127.0.0.1:8080/geoserver/nset/ows';
    var defaultParameters = {
        service: 'WFS',
        version: '1.0.0',
        request: 'GetFeature',
        typeName: 'nset:NepalDistricts',
        //maxFeatures: 200,
        outputFormat: 'text/javascript'
        , format_options: 'callback: getJson',
        srsName: 'EPSG:4326'

    };

    var data_url = '/desinventar/datacard/api/by-dist';

    function loadData() {
        $.when(
            vectorLayer_promise.json(rootUrl, defaultParameters),
            data_promise.json(data_url)
        ).done(
            function (GeoJSON_data, data) {
                geojsondata = GeoJSON_data;
                joindata = data;

                vectorLayer = L.geoJson(GeoJSON_data, {
                    style: defaultStyle,
                    onEachFeature: function (feature, my_Layer) {
                        my_Layer.bindPopup(feature.properties.DISTRICT);
                    },
                    pointToLayer: function (feature, latlng) {
                        //return L.circleMarker(latlng, geojsonMarkerOptions);
                        return L.circleMarker(latlng//, geojsonMarkerOptions
                        );
                        //return L.marker(latlng);
                    }
                }).addTo(group);

                map.fitBounds(group.getBounds());
                map.dragging.disable();
                map.touchZoom.disable();
                map.doubleClickZoom.disable();
                map.scrollWheelZoom.disable();
                map.boxZoom.disable();
                map.keyboard.disable();
                $(".leaflet-control-zoom").css("visibility", "hidden");

                joinData(joindata, 'District', 'DISTRICT');

            }
        ).fail(
            function (reason) {
                alert('couldnot load all data');
            }
        )
    }

    loadData();
JS;

$this->registerJs($script_chart, $this::POS_END);

$this->registerJsFile("https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js");
$this->registerJsFile("https://cdn.jsdelivr.net/npm/google-palette@1.1.0/palette.js");

$this->registerJsFile("https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.4.0/leaflet.js");
$this->registerCssFile("https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.4.0/leaflet.css");

$this->registerJsFile(Yii::getAlias('@web') . "/lib/geostats/lib/geostats.js");
$this->registerJsFile("https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.11/lodash.core.min.js");


?>
