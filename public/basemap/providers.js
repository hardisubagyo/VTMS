/*var command = L.control({position: 'topright'});
command.onAdd = function (map) {
    var div = L.DomUtil.create('div', 'command');
    div.innerHTML += '<a onclick="basemap();" title="Info"><div id="basemap"></div></a>';
    return div;
};
command.addTo(map);

var formbasemap = L.control({position: 'topright'});
formbasemap.onAdd = function (map) {
    var divbasemap = L.DomUtil.create('div', 'formbasemap');
    divbasemap.innerHTML += '\
            <div id="card-basemap">\
                <div class="card">\
                    <div class="card-header-vtms text-left text-light">\
                        <h4>Our Services</h4>\
                    </div>\
                    <div class="card-body-vtms">\
                        <div class="layerbasemap"></div>\
                    </div>\
                </div>\
            </div>\
    ';
    return divbasemap;
};
formbasemap.addTo(map);


function basemap(){
    var x = document.getElementById("card-basemap");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
*/

(function(factory) {
    if (typeof module !== 'undefined' && module.exports) {
        module.exports = factory(require('leaflet'));
    } else {
        window.providers = factory(window.L);
    }
})(function(L) {
    var providers = {};

    providers['OpenStreetMap_Mapnik'] = {
        title: 'osm',
        icon: 'icons/openstreetmap_mapnik.png',
        layer: L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        })
    };

    providers['OpenStreetMap_BlackAndWhite'] = {
        title: 'osm bw',
        icon: 'icons/openstreetmap_blackandwhite.png',
        layer: L.tileLayer('http://{s}.tiles.wmflabs.org/bw-mapnik/{z}/{x}/{y}.png', {
            maxZoom: 18,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        })
    };

    providers['OpenStreetMap_DE'] = {
        title: 'osm de',
        icon: 'icons/openstreetmap_de.png',
        layer: L.tileLayer('http://{s}.tile.openstreetmap.de/tiles/osmde/{z}/{x}/{y}.png', {
            maxZoom: 18,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        })
    }

    providers['Stamen_Toner'] = {
        title: 'toner',
        icon: 'icons/stamen_toner.png',
        layer: L.tileLayer('http://stamen-tiles-{s}.a.ssl.fastly.net/toner/{z}/{x}/{y}.png', {
            attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
            subdomains: 'abcd',
            minZoom: 0,
            maxZoom: 20,
            ext: 'png'
        })
    };

    providers['Esri_OceanBasemap'] = {
        title: 'esri ocean',
        icon: 'icons/esri_oceanbasemap.png',
        layer: L.tileLayer('http://server.arcgisonline.com/ArcGIS/rest/services/Ocean_Basemap/MapServer/tile/{z}/{y}/{x}', {
            attribution: 'Tiles &copy; Esri &mdash; Sources: GEBCO, NOAA, CHS, OSU, UNH, CSUMB, National Geographic, DeLorme, NAVTEQ, and Esri',
            maxZoom: 13
        })
    };

    providers['HERE_normalDay'] = {
        title: 'normalday',
        icon: 'icons/here_normalday.png',
        layer: L.tileLayer('http://{s}.{base}.maps.cit.api.here.com/maptile/2.1/maptile/{mapID}/normal.day/{z}/{x}/{y}/256/png8?app_id={app_id}&app_code={app_code}', {
            attribution: 'Map &copy; 1987-2014 <a href="http://developer.here.com">HERE</a>',
            subdomains: '1234',
            mapID: 'newest',
            app_id: 'Y8m9dK2brESDPGJPdrvs',
            app_code: 'dq2MYIvjAotR8tHvY8Q_Dg',
            base: 'base',
            maxZoom: 20
        })
    };

    providers['HERE_normalDayGrey'] = {
        title: 'normalday grey',
        icon: 'icons/here_normaldaygrey.png',
        layer: L.tileLayer('http://{s}.{base}.maps.cit.api.here.com/maptile/2.1/maptile/{mapID}/normal.day.grey/{z}/{x}/{y}/256/png8?app_id={app_id}&app_code={app_code}', {
            attribution: 'Map &copy; 1987-2014 <a href="http://developer.here.com">HERE</a>',
            subdomains: '1234',
            mapID: 'newest',
            app_id: 'Y8m9dK2brESDPGJPdrvs',
            app_code: 'dq2MYIvjAotR8tHvY8Q_Dg',
            base: 'base',
            maxZoom: 20
        })
    };

    providers['HERE_satelliteDay'] = {
        title: 'satellite',
        icon: 'icons/here_satelliteday.png',
        layer: L.tileLayer('http://{s}.{base}.maps.cit.api.here.com/maptile/2.1/maptile/{mapID}/satellite.day/{z}/{x}/{y}/256/png8?app_id={app_id}&app_code={app_code}', {
            attribution: 'Map &copy; 1987-2014 <a href="http://developer.here.com">HERE</a>',
            subdomains: '1234',
            mapID: 'newest',
            app_id: 'Y8m9dK2brESDPGJPdrvs',
            app_code: 'dq2MYIvjAotR8tHvY8Q_Dg',
            base: 'aerial',
            maxZoom: 20
        })
    };

    providers['CartoDB_Positron'] = {
        title: 'positron',
        icon: 'icons/cartodb_positron.png',
        layer: L.tileLayer('http://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a> &copy; <a href="http://cartodb.com/attributions">CartoDB</a>',
            subdomains: 'abcd',
            maxZoom: 19
        })
    };

    return providers;
});


var layers = [];
for (var providerId in providers) {
    layers.push(providers[providerId]);
}

layers.push({
    layer: {
        onAdd: function() {},
        onRemove: function() {}
    },
    title: 'empty'
})

var ctrl = L.control.iconLayers(layers).addTo(map);
