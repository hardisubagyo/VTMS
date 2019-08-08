var formbasemap = L.control({position: 'topright'});
formbasemap.onAdd = function (map) {
    var divbasemap = L.DomUtil.create('div', 'formbasemap');
    divbasemap.innerHTML += '\
            <div id="card-layerlist" class="collapse">\
                <div class="card">\
                    <div class="card-header-vtms-list text-left text-light">\
                        <h4>Layer List</h4>\
                    </div>\
                    <div class="card-body-vtms-list" id="card-body-vtms-list">\
                    </div>\
                </div>\
            </div>\
    ';

    divbasemap.innerHTML += '<div id="layerlist"></div>';
    return divbasemap;
};
formbasemap.addTo(map);

var morfologi = L.tileLayer.wms('http://localhost:8080/geoserver/msdi/wms?service=WMS', {
			        layers: '	msdi:Morfology',
			        transparent: true,
    				format: 'image/png'
			    });

var s57 = L.tileLayer.wms('http://192.168.2.31:8080/geoserver/S57/wms?service=WMS', {
			        layers: 'test',
			        transparent: true,
    				format: 'image/png'
			    });

var airportsEurope = [
	{
		label: 'Indonesia',
		children: [{
				label: 'Morfology',
				layer: morfologi
			},
			{
				label: 'S57',
				layer: s57
			},
			{
				label: 'AVILES - OVD',
				layer: L.marker([43.563000, -6.034000])
			},
			{
				label: 'BADAJOZ - BJZ',
				layer: L.marker([38.891000, -6.821000])
			}
		]
	},
	{
		label: 'FRANCE',
		children: [{
				label: 'AGEN - AGF',
				layer: L.marker([44.175000, 0.591000])
			},
			{
				label: 'AIX-LES-MILLES - QXB',
				layer: L.marker([43.505000, 5.368000])
			},
			{
				label: 'ALBI - LBI',
				layer: L.marker([43.914000, 2.113000])
			},
			{
				label: 'ANGOULEME - ANG',
				layer: L.marker([45.729000, 0.221000])
			},
			{
				label: 'ANNECY - NCY',
				layer: L.marker([45.929000, 6.099000])
			}
		]
	}
];

var ctl = L.control.layers.tree(null, airportsEurope, {
	collapsed: false,
	namedToggle: true,
	collapseAll: 'Collapse all',
	expandAll: 'Expand all',
});

ctl.addTo(map).collapseTree().expandSelected();

ctl._container.remove();
document.getElementById('card-body-vtms-list').appendChild(ctl.onAdd(map));

/*Opacity*/
var Map_opacity = {
    "Morfology": morfologi,
    "Jakarta": L.marker([-6.3083551, 106.8532384])
};
var opacity = L.control.opacity(
    Map_opacity,
    {
    	label: "Layers Opacity"
    }
).addTo(map);
opacity._container.remove();
document.getElementById('card-body-vtms-list').appendChild(opacity.onAdd(map));

$('#layerlist').click(function() {
	$('#card-layerlist').slideToggle("slow");
});