var command = L.control({position: 'topleft'});
command.onAdd = function (map) {
    var div = L.DomUtil.create('div', 'command');
    /*div.innerHTML += '<a onclick="showsidebar()"><div id="iconsidebar"></div></a>';*/
    div.innerHTML += '<div id="iconsidebar"></div>';
    return div;
};
command.addTo(map);

var sidebar = L.control.sidebar('sidebar', {
    closeButton: true,
    position: 'left'
});
map.addControl(sidebar);

function showsidebar(){
	/*var x = document.getElementById("sidebar");
	var iconsidebar = document.getElementById("iconsidebar");
    if (x.style.display === "none") {
        x.style.display = "block";
        iconsidebar.style.display = "none";
    } else {
        x.style.display = "none";
    }*/
}

function hidesidebar(){
	var x = document.getElementById("sidebar");
	var iconsidebar = document.getElementById("iconsidebar");
	
	x.style.display = "none";
    iconsidebar.style.display = "block";
}

$('#iconsidebar').click(function() {
    $('#sidebar').slideToggle("slow");
});