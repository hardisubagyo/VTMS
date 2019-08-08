var command = L.control({position: 'topright'});

command.onAdd = function (map) {
    var div = L.DomUtil.create('div', 'command');
    div.innerHTML += '<a onclick="info();" title="Info"><div id="info"></div></a>';
    return div;
};
command.addTo(map);


function info(){
	alert('Function Info');
}