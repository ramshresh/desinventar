<?php
/**
 * Created by PhpStorm.
 * User: Ram_DFID
 * Date: 10/01/2019
 * Time: 10:10
 */
/* @var $this yii\web\View */

$this->title = 'DESINVENTAR - Profile';
?>


<div class="container">
    <div class="row">
        <h5>Select what profile you want</h5>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label>Disaster Type</label>
            <select name="sel_event" onchange="submit();">
                <option value="">Multi-hazard profile</option>
                <option value="FIRE">FIRE</option>
                <option value="FLOOD">FLOOD</option>
                <option value="EPIDEMIC">EPIDEMIC</option>
                <option value="LANDSLIDE">LANDSLIDE</option>
                <option value="ACCIDENT">ACCIDENT</option>
                <option value="THUNDERSTORM">THUNDERSTORM</option>
                <option value="HAIL STORM">HAIL STORM</option>
                <option value="COLD WAVE">COLD WAVE</option>
                <option value="STRONG WIND">STRONG WIND</option>
                <option value="STRUCT.COLLAPSE">STRUCT.COLLAPSE</option>
                <option value="PLAGUE">PLAGUE</option>
                <option value="RAINS">RAINS</option>
                <option value="EARTHQUAKE">EARTHQUAKE</option>
                <option value="FOREST FIRE">FOREST FIRE</option>
                <option value="SNOW STORM">SNOW STORM</option>
                <option value="DROUGHT">DROUGHT</option>
                <option value="BOAT CAPSIZE">BOAT CAPSIZE</option>
                <option value="STORM">STORM</option>
                <option value="AVALANCHE">AVALANCHE</option>
                <option value="OTHER">OTHER</option>
                <option value="HEAT WAVE">HEAT WAVE</option>
                <option value="EXPLOSION">EXPLOSION</option>
                <option value="FAMINE">FAMINE</option>
                <option value="BIOLOGICAL">BIOLOGICAL</option>
                <option value="POLLUTION">POLLUTION</option>
                <option value="PANIC">PANIC</option>
                <option value="FROST">FROST</option>
                <option value="SEDIMENTATION">SEDIMENTATION</option>
                <option value="LEAK">LEAK</option>
            </select>
        </div>
        <div class="col-md-6">
            <label>Provience</label>
            <select name="sel_prov" onchange="submit();">
                <option value="">All</option>
                <option value="1">Provience 1</option>
                <option value="2">Provience 2</option>
                <option value="3">Provience 3</option>
                <option value="4">Provience 4</option>
                <option value="5">Provience 5</option>
                <option value="6">Provience 6</option>
                <option value="7">Provience 7</option>
            </select>
        </div>
    </div>

    <div class="row">
        <h3>Nepal</h3>
        <h5>Profile:</h5>
        <p>This Country Profile shows a set of typical results known as "Preliminary Analysis" comming from the disaster
            database. Charts, Maps and tables below will provide you with a basic understanding of the effects of many
            types of disasters occurred in the region.</p>
    </div>

    <div class="row">
        <strong>Composition of Disasters</strong>
    </div>

    <style>
        .chart-area {
            height: 400px;
            border: groove;
        }
    </style>
    <div class="row">
        <div class="col-md-6">
            <strong>Deaths</strong>
            <div class="chart-area">
                <canvas id="pie-chart-deaths" width="800" height="450"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <strong>Datacards</strong>
            <div class="chart-area">
                <canvas id="pie-chart-datacards" width="800" height="450"></canvas>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <strong>Indirectly Affected + Directly Affected</strong>
            <div class="chart-area">
                <canvas id="pie-chart-affected" width="800" height="450"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <strong>Houses Destroyed + Damaged</strong>
            <div class="chart-area">
                <canvas id="pie-chart-house_destroyed_damaged" width="800" height="450"></canvas>
            </div>
        </div>
    </div>

    <div class="row">
        <strong>Temporal Behaviour</strong>
    </div>

    <div class="row">
        <div class="col-md-12">
            <strong>Datacards</strong>
            <div class="chart-area">

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <strong>Deaths</strong>
            <div class="chart-area">

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <strong>Indirectly and Directly Affected</strong>
            <div class="chart-area">

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <strong>Houses Destroyed and Damaged</strong>
            <div class="chart-area">

            </div>
        </div>
    </div>

    <div class="row">
        <strong>Spatial Distribution</strong>
    </div>

    <div class="row">
        <div class="col-md-12">
            <strong>Datacards</strong>
            <div class="chart-area">

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <strong>Deaths</strong>
            <div class="chart-area">

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <strong>Indirectly and Directly Affected</strong>
            <div class="chart-area">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <strong>Houses Destroyed and Damaged</strong>
            <div class="chart-area">

            </div>
        </div>
    </div>
</div>

<input type="hidden" name="selected_event" value="<?= $event_name ?>">
<input type="hidden" name="selected_provience_name" value="<?= $provience_name ?>">

<div class="data-container"
     data-multihazard_summary="<?php echo htmlspecialchars(json_encode($multihazard_summary)); ?>"
     data-distinct_event_types="<?php echo htmlspecialchars(json_encode($distinct_event_types)); ?>"
></div>

<?php
$script = <<< JS
        
        var dataContainer= $('.data-container');

        var eventSelected = $('input[name=' + 'selected_event' + ']');
        var provienceSelected = $('input[name=' + 'selected_provience_name' + ']');
         
        var eventSelect = $('select[name=' + 'sel_event' + ']');
        var provienceSelect = $('select[name=' + 'sel_prov' + ']');

        eventSelect.val(eventSelected.val());
        provienceSelect.val(provienceSelected.val()); 
        
        function submit(){
            $('<form action="profile" method="GET">' +
                '<input type="hidden" name="event_name" value="' + eventSelect.val() + '">' +
                '<input type="hidden" name="provience_name" value="' + provienceSelect.val() + '">' +
                '</form>')
                .appendTo($(document.body)) //it has to be added somewhere into the <body>
                .submit();
        }
       
        
        var multihazard_summary = dataContainer.data('multihazard_summary');
        var distinct_event_types = dataContainer.data('distinct_event_types');
        
        var data_deaths = [];
        var data_datacards = [];
        var data_affected = [];
        var data_house_destroyed_damaged = [];
        
        distinct_event_types.forEach(function(event_type) {
            var filterObj = multihazard_summary.filter(function(e) {
                return e.event_type == event_type;
            });
            data_deaths.push(filterObj[0]['deaths']);
            data_datacards.push(filterObj[0]['datacards']);
            data_affected.push(filterObj[0]['affected']);
            data_house_destroyed_damaged.push(filterObj[0]['building_destroyed']+filterObj[0]['building_damaged']);
        });
        
       
        console.log(distinct_event_types);
        console.log(multihazard_summary);
        
                
        new Chart(document.getElementById("pie-chart-deaths"), {
            type: 'pie',
            data: {
              labels: distinct_event_types,//["Africa", "Asia", "Europe", "Latin America", "North America"],
              datasets: [{
                label: "Population",
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
              }
            }
        });        
        new Chart(document.getElementById("pie-chart-datacards"), {
            type: 'pie',
            data: {
              labels: distinct_event_types,//["Africa", "Asia", "Europe", "Latin America", "North America"],
              datasets: [{
                label: "Datacards",
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
                text: 'Events'
              }
            }
        });      
        new Chart(document.getElementById("pie-chart-affected"), {
            type: 'pie',
            data: {
              labels: distinct_event_types,//[ "Africa", "Asia", "Europe", "Latin America", "North America" ],
              datasets: [{
                label: "Population",
                //backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                backgroundColor: palette('tol', data_affected.length).map(function(hex) {
                    return '#' + hex;
                }),
               data: data_affected//[ 2478, 5267, 734, 784, 433 ]
              }]
            },
            options: {
              title: {
                display: true,
                text: 'Affected'
              }
            }
        });     
        new Chart(document.getElementById("pie-chart-house_destroyed_damaged"), {
            type: 'pie',
            data: {
              labels: distinct_event_types,//[ "Africa", "Asia", "Europe", "Latin America", "North America" ],
              datasets: [{
                label: "Houses",
                //backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                backgroundColor: palette('rainbow', data_affected.length).map(function(hex) {
                    return '#' + hex;
                }),
               data: data_affected//[ 2478, 5267, 734, 784, 433 ]
              }]
            },
            options: {
              title: {
                display: true,
                text: 'Buildings Damaged'
              }
            }
        });
JS;
$this->registerJs($script, $this::POS_END);
?>

