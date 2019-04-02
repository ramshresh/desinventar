<?php
/**
 * Created by PhpStorm.
 * User: Ram_DFID
 * Date: 18/03/2019
 * Time: 13:24
 */

$this->blocks['content-header'] = 'Query'
?>
<style>
    .custom-select {
        width: 100% !important;
    }
</style>
<div class="datacard-view">
<div class="row">
    <div class="col-sm-6">
        <div class="row">
            <div class="col-sm-6">
                <label for="event_name">Disaster Type</label>
                <br/>
                <select name="event_name" class="custom-select" multiple>
                    <option>FIRE</option>
                    <option>FLOOD</option>
                    <option>LANDSLIDE</option>
                    <option>ACCIDENT</option>
                    <option>THUNDERSTORM</option>
                    <option>HAIL STORM</option>
                    <option>COLD WAVE</option>
                    <option>STRONG WIND</option>
                </select>
            </div>
            <div class="col-sm-6">
                <label for="event_cause">Cause</label>
                <br/>
                <select name="event_cause" class="custom-select" multiple>
                    <option>DEFORESTATION</option>
                    <option>DESIGN ERROR</option>
                    <option>ELECTRIC SHOCK</option>
                    <option>FLOOD</option>
                    <option>HEAVY RAIN</option>
                    <option>HUMAN MISTAKE</option>
                    <option>LANDSLIDE</option>
                    <option>RAIN</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <label for="event_provience">Provience</label>
                <br/>
                <select name="event_provience" class="custom-select" multiple>
                    <option>Provience 1</option>
                    <option>Provience 2</option>
                    <option>Provience 3</option>
                    <option>Provience 4</option>
                    <option>Provience 5</option>
                    <option>Provience 6</option>
                    <option>Provience 7</option>
                </select>
            </div>

            <div class="col-sm-4">
                <label for="event_district">District</label>
                <br/>
                <select name="event_district" class="custom-select" multiple>

                </select>
            </div>

            <div class="col-sm-4">
                <label for="event_municipality">Municipality</label>
                <br/>
                <select name="event_municipality" class="custom-select" multiple>

                </select>
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
                <button>View Data</button>
                <br/>
                <button>New Query</button>
                <br/>
                <button>Save Query</button>
                <br/>
                <button>Load Query</button>
            </div>

        </div>
    </div>

    <div class="col-sm-6">
        <div id="map" style="border: solid; height: 500px"></div>
    </div>
</div>
</div>

