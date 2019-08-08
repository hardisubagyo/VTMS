var a = L.marker([-6.3083551,106.8532384]);
var b = L.marker([-6.3083551,107.8532384]);
var c = L.marker([-6.3083551,106.8532384]);
var d = L.marker([-6.3083551,107.8532384]);
var e = L.marker([-6.3083551,106.8532384]);
var f = L.marker([-6.3083551,107.8532384]);
var g = L.marker([-6.3083551,106.8532384]);
var h = L.marker([-6.3083551,107.8532384]);
var i = L.marker([-6.3083551,106.8532384]);
var j = L.marker([-6.3083551,107.8532384]);


var overlayMaps = {
  "Underway <img src='sidebar/ship1.png' height=24>": a,
  "Passanger Vessels <img src='sidebar/ship1.png' height=24>": b,
  "Cargo Vessels <img src='sidebar/ship1.png' height=24>": c,
  "Tankers <img src='sidebar/ship1.png' height=24>": d,
  "High Speed Craft <img src='sidebar/ship1.png' height=24>": e,
  "Tug, Pilot, etc <img src='sidebar/ship1.png' height=24>": f,
  "Yach and Others <img src='sidebar/ship1.png' height=24>": g,
  "Fishing <img src='sidebar/ship1.png' height=24>": h,
  "Navigation Aids <img src='sidebar/ship1.png' height=24>": i,
  "Unspecifieds Ships <img src='sidebar/ship1.png' height=24>": j
};

var listkapal = L.control.layers(null, overlayMaps, {
  collapsed: false
}).addTo(map);

listkapal._container.remove();
document.getElementById('ListKapal').appendChild(listkapal.onAdd(map));


function listvessels(){
  /*var result_listvessels = L.control({position: 'topleft'});
  result_listvessels.onAdd = function (map) {
      var div = L.DomUtil.create('div', 'result_listvessels');
      div.innerHTML += '<div id="mydiv">\
                        <div id="mydivheader"><h4>Tracking Vessel</h4></div>\
                          <div class="card-body-vtms-list" id="ListVessels">\
                            \
                            <div class="box box-widget widget-user-2">\
                              <div class="widget-user-header bg-yellow">\
                                <div class="widget-user-image">\
                                  <img src="tanker/tanker.png">\
                                </div>\
                                \
                                <p class="widget-link" onclick="detailvessels();">OCEAN KITE</p>\
                                <p class="widget-user-desc"><b>\
                                  9129201<br>\
                                  Tanker<br>\
                                  2016-04-13 08.00<br>\
                                  PRIOK<br>\
                                  52509987\
                                </b></p>\
                              </div>\
                            </div>\
                            \
                      </div>';

      var draggable = new L.Draggable(div);
      draggable.enable();

      return div;
  };
  result_listvessels.addTo(map);*/

  $.ajax({
    type : 'get',
    url  : 'listvessel',
    dataType : 'json',
    beforeSend: function(){
        $('#Loading').modal({backdrop: 'static', keyboard: false});
    },
    success: function(response){
        $('#Loading').modal('hide');
        /*alert("Berhasil");*/

        /*$('#home-kv-1').removeClass('active');
        $("#profile-kv-1").attr("class", "active");*/

        var list = document.getElementById('listTrack');
        list.innerHTML += '\
                          <div class="box">\
                            <div class="widget-user-header bg-yellow">\
                              <div class="widget-user-image"><img src="tanker/tanker.png"></div>\
                              <p class="widget-link" onclick="detailvessels();">OCEAN KITE</p>\
                              <p class="widget-user-desc">\
                                <b>\
                                  9129201<br>\
                                  Tanker<br>\
                                  2016-04-13 08.00<br>\
                                  PRIOK<br>\
                                  52509987\
                                </b>\
                              </p>\
                            </div>\
                          </div>\
                          <div class="box">\
                            <div class="widget-user-header bg-yellow">\
                              <div class="widget-user-image"><img src="tanker/tanker.png"></div>\
                              <p class="widget-link" onclick="detailvessels();">OCEAN KITE</p>\
                              <p class="widget-user-desc">\
                                <b>\
                                  9129201<br>\
                                  Tanker<br>\
                                  2016-04-13 08.00<br>\
                                  PRIOK<br>\
                                  52509987\
                                </b>\
                              </p>\
                            </div>\
                          </div>\
                          ';
    },
    error: function(error){
        $('#Loading').modal('hide');
        console.log(error);
    }
  });
  return false;
}

function detailvessels(){
  $.ajax({
    type : 'get',
    url  : 'listvessel',
    dataType : 'json',
    beforeSend: function(){
        $('#Loading').modal({backdrop: 'static', keyboard: false});
    },
    success: function(response){
        $('#Loading').modal('hide');

        var detail = document.getElementById('detailTrack');
        detail.innerHTML += '\
                            <div class="card">\
                                <img src="tanker/tanker.png" width="100%" />\
                                <div class="card-content">\
                                    <p class="detail-kapal">\
                                      OCEAN KITE<br>\
                                      9129201\
                                    </p>\
                                </div>\
                                <div class="card-read-more">\
                                  <table class="table">\
                                    <tr>\
                                      <td width="40%">IMO</td>\
                                      <td width="3%">:</td>\
                                      <td width="57%">IMO</td>\
                                    </tr>\
                                    <tr>\
                                      <td width="40%">Nama Kapal</td>\
                                      <td width="3%">:</td>\
                                      <td width="57%">Nama Kapal</td>\
                                    </tr>\
                                    <tr>\
                                      <td width="40%">MMSI</td>\
                                      <td width="3%">:</td>\
                                      <td width="57%">MMSI</td>\
                                    </tr>\
                                    <tr>\
                                      <td width="40%">Call Sign</td>\
                                      <td width="3%">:</td>\
                                      <td width="57%">Call Sign</td>\
                                    </tr>\
                                    <tr>\
                                      <td width="40%">Tipe Kapal</td>\
                                      <td width="3%">:</td>\
                                      <td width="57%">Tipe Kapal</td>\
                                    </tr>\
                                    <tr>\
                                      <td width="40%">COG</td>\
                                      <td width="3%">:</td>\
                                      <td width="57%">COG</td>\
                                    </tr>\
                                    <tr>\
                                      <td width="40%">SOG</td>\
                                      <td width="3%">:</td>\
                                      <td width="57%">SOG</td>\
                                    </tr>\
                                    <tr>\
                                      <td width="40%">Status Navigasi</td>\
                                      <td width="3%">:</td>\
                                      <td width="57%">Status Navigasi</td>\
                                    </tr>\
                                    <tr>\
                                      <td width="40%">Kecepatan</td>\
                                      <td width="3%">:</td>\
                                      <td width="57%">Kecepatan</td>\
                                    </tr>\
                                    <tr>\
                                      <td width="40%">Tujuan</td>\
                                      <td width="3%">:</td>\
                                      <td width="57%">Tujuan</td>\
                                    </tr>\
                                    <tr>\
                                      <td width="40%">Draught</td>\
                                      <td width="3%">:</td>\
                                      <td width="57%">Draught</td>\
                                    </tr>\
                                    <tr>\
                                      <td width="40%">Panjang</td>\
                                      <td width="3%">:</td>\
                                      <td width="57%">Panjang</td>\
                                    </tr>\
                                    <tr>\
                                      <td width="40%">Lebar</td>\
                                      <td width="3%">:</td>\
                                      <td width="57%">Lebar</td>\
                                    </tr>\
                                    <tr><td colspan="3">Lihat History Kapal</td></tr>\
                                    <tr>\
                                      <td width="40%">Tgl Mulai</td>\
                                      <td width="3%">:</td>\
                                      <td width="57%"><input type="text" name="tgl_mulai" class="form-control"></td>\
                                    </tr>\
                                    <tr>\
                                      <td width="40%">Tgl Selesai</td>\
                                      <td width="3%">:</td>\
                                      <td width="57%"><input type="text" name="tgl_selesai" class="form-control"></td>\
                                    </tr>\
                                  </table>\
                                  <p>\
                                    <button type="button" class="btn btn-primary">Clear</button>\
                                    <button type="button" class="btn btn-primary">Zoom To</button>\
                                    <button type="button" class="btn btn-primary" onclick="runrecord();">Submit</button>\
                                  </p>\
                                  <div id="playhistory"></div>\
                                </div>\
                            </div>\
                            ';
    },
    error: function(error){
        $('#Loading').modal('hide');
        console.log(error);
    }
  });
  return false;
}

function runrecord(){

  /*const xhr = new XMLHttpRequest();
  xhr.open('GET', 'tracking/test.json', true);
  xhr.onreadystatechange = xhrCallback;
  xhr.send();

  function xhrCallback() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      var data = JSON.parse(xhr.responseText);
      var trackplayback = L.trackplayback(data, map, {
        targetOptions: {
          useImg: true,
          imgUrl: 'tracking/images/ship.png'
        }
      });
      var trackplaybackControl = L.trackplaybackcontrol(trackplayback);
      document.getElementById('ListKapal').appendChild(trackplaybackControl.onAdd(map));
    }

    console.log(data);
  }*/

  $.ajax({
    type : 'get',
    url  : 'ListKapal',
    dataType : 'json',
    beforeSend: function(){
        $('#Loading').modal({backdrop: 'static', keyboard: false});
    },
    success: function(response){
        $('#Loading').modal('hide');
        //console.log(response);
        var data = response;
        var trackplayback = L.trackplayback(data, map, {
          targetOptions: {
            useImg: true,
            imgUrl: 'tracking/images/ship.png'
          }
        });
        var trackplaybackControl = L.trackplaybackcontrol(trackplayback);
        document.getElementById('ListKapal').appendChild(trackplaybackControl.onAdd(map));
    },
    error: function(error){
        $('#Loading').modal('hide');
        console.log(error);
    }
  });
  return false;

}