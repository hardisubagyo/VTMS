var command = L.control({position: 'topleft'});

command.onAdd = function (map) {
    var div = L.DomUtil.create('div', 'command');
    div.innerHTML = '<div id="logo">\
    				<img class="logo_img" src="logo/ipc.png">\
    				<div class="head">VTMS Pelindo II</div>\
    				</div>';
    return div;
};
command.addTo(map);