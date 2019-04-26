var host = "http://" + window.location.hostname;
var am = document.location.pathname.substring(1, document.location.pathname.lastIndexOf('/') + 1);
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

var data_url = '/desinventar/datacard/api/by-dist';
var attributeValues = []; // will store values
var attributeName = 'Deaths'; // will store values
var layerKey = 'DISTRICT'; // will store values -- shapefile primary key to join with other attribute data
var dataKey = 'District'; // will store values -- data primary key to join with other attribute data


OpenLayers.ImgPath = "http://js.mapbox.com/theme/dark/";
var options = {
    scales: [130000000, 65000000, 32500000, 17000000, 8500000, 4200000],
    controls: [
        new OpenLayers.Control.PanZoomBar(),
        new OpenLayers.Control.ScaleLine({
            geodesic: true,
            maxWidth: 200,
            bottomOutUnits: "",
            bottomInUnits: ""
        }),
        new OpenLayers.Control.MousePosition(),
        new OpenLayers.Control.Navigation()
    ],
    numZoomLevels: 1
};
// Create a new map with options defined above
map = new OpenLayers.Map('map', options);
parser = new OpenLayers.Format.GeoJSON();

var sf = new Shapefile(
    {
        shp: host + '/' + am + "tests/js-shapefile-to-geojson/testdata/NepalDistricts.shp",
        dbf: host + '/' + am + "tests/js-shapefile-to-geojson/testdata/NepalDistricts.dbf"
    },
    function (data) {
        var features = parser.read(data.geojson);
        var origin = features;

        $.getJSON(data_url).then(function (attributeData) {


            var joinedByKey={};
            function joinData(){
                for(var i = 0;i<features.length;i++){
                    joinedByKey[features[i].attributes[layerKey]] =_.find(attributeData, function(o) { return o[dataKey] == features[i].attributes[layerKey]; });
                }
            }

            joinData();
            // we get the desired attribute
            for (i = 0; i < features.length; i++) {
                if(attributeData[i]['Deaths'] != undefined)attributeValues.push(attributeData[i]['Deaths']);
            }
            // geostats settings
            serie = new geostats(attributeValues);
            serie.getClassEqInterval(5);
            var ranges = serie.ranges;
            var colors = new Array('#FEF0D9', '#FDCC8A', '#FC8D59', '#E34A33', '#B30000');
            //var colors = new Array('#eff3ff', '#bdd7e7', '#6baed6', '#3182bd', '#08519c', '#00264d');
            serie.setColors(colors);
            var legend= serie.getHtmlLegend(null, attributeName);


            // openlayers settings
            var context_x = {
                getColour: function (feature) {
                    color = colors;
                    attribute_value = joinedByKey[feature.attributes[layerKey]][attributeName];//feature.attributes[attributeName]
                    return color[getClass(attribute_value, ranges)];
                }
            };


            var template = {
                fillOpacity: 0.9,
                strokeColor: "#ffffff",
                strokeWidth: 1,
                fillColor: "$"+"{getColour}"
            };
            // Style
            var style_x = new OpenLayers.Style(template, {
                context: context_x
            });
            var styleMap_x = new OpenLayers.StyleMap({
                'default': style_x
            });
            var vector = new OpenLayers.Layer.Vector(
                'Countries',
                {
                    styleMap: styleMap_x,
                    isBaseLayer: true
                }
            );
            vector.addFeatures(features);
            map.addLayer(vector);

            map.zoomToExtent(vector.getDataExtent());

            // console.log(data);
            // console.log(features);
            $('#legend').html(legend);
        });
    }
);