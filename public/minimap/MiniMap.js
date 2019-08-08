var osmUrl='http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';

var osm2 = new L.TileLayer(osmUrl, {minZoom: 0, maxZoom: 13});
var miniMap = new L.Control.MiniMap(osm2, { toggleDisplay: true, minimized: true }).addTo(map);