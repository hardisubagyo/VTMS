<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>VTMS Pelindo II</title>

        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

        <!-- CSS MAPS -->
        <link rel="stylesheet" href="{{asset('css/map.css')}}">

        <!-- JQUERY -->
        <!-- <script src="{{asset('js/jquery-1.7.1.min.js')}}"></script> -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

        <!-- BOOTSTRAP -->
        <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap-3.css')}}">
        <script src="{{asset('bootstrap/js/bootstrap-3.js')}}"></script>

        <!-- LEAFLET -->
        <link rel="stylesheet" href="{{asset('leaflet/leaflet.css')}}">
        <script src="{{asset('leaflet/leaflet.js')}}"></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">


        <!-- Load Esri Leaflet from CDN -->
        <script src="https://unpkg.com/esri-leaflet"></script>

        <!-- Esri Leaflet Geocoder -->
        <link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder/dist/esri-leaflet-geocoder.css">
        <script src="https://unpkg.com/esri-leaflet-geocoder"></script>

        <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">

        <!-- Opacity -->
        <link rel="stylesheet" href="{{asset('layerlist/L.Control.Opacity.css')}}">
        <script src="{{asset('layerlist/L.Control.Opacity.js')}}"></script>

        <!-- Measure -->
        <link rel="stylesheet" href="{{asset('measures/leaflet-measure.css')}}">
        <script src="{{asset('measures/leaflet-measure.js')}}"></script>

        <!-- HISTORY KAPAL -->
        <link rel="stylesheet" href="{{asset('tracking/control.playback.css')}}">
        <script src="{{asset('tracking/control.trackplayback.js')}}"></script>
        <script src="{{asset('tracking/leaflet.trackplayback.js')}}"></script>

        <!-- Loading -->
        <link rel="stylesheet" href="{{asset('css/loading.css')}}">

    </head>
    <body>

        <!-- SIDEBAR -->
        <div id="sidebar" class="sidebar collapsed" style="display: none;">
            <div class="sidebar-tabs">
                <ul role="tablist">
                    <li>
                        <a onclick="hidesidebar();" style="cursor: pointer;" role="tab">
                            <img src="{{asset('sidebar/sidebar.png')}}" width="80%">
                        </a>
                    </li>
                    <li><a href="#profile" role="tab"><img src="{{asset('sidebar/profil.png')}}" width="80%"></a></li>
                    <li><a href="#search" role="tab"><img src="{{asset('sidebar/search.png')}}" width="80%"></a></li>
                    <li><a href="#tracking" role="tab"><img src="{{asset('sidebar/ship.png')}}" width="90%"></a></li>
                </ul>
            </div>
            <div class="sidebar-content" id="konten">
                <div class="sidebar-pane" id="profile">
                    <h1 class="sidebar-header">Profile<span class="sidebar-close"><i class="fa fa-caret-left"></i></span></h1>
                    <br>
                    <center>
                        <img src="{{asset('sidebar/user.png')}}" width="30%">
                        <br><br>
                        <button type="button" class="btn btn-warning">Logout</button>
                    </center>
                </div>

                <div class="sidebar-pane" id="search">
                    <h1 class="sidebar-header">Search<span class="sidebar-close"><i class="fa fa-caret-left"></i></span></h1>
                    <div id="pencarian"></div>
                </div>

                <div class="sidebar-pane" id="tracking">
                    <h1 class="sidebar-header">Tracking Vessel<span class="sidebar-close"><i class="fa fa-caret-left"></i></span></h1>
                    <div class="tabs-x tabs-above">
                        <ul id="myTab-kv-1" class="nav nav-tabs" role="tablist">
                            <li class="active">
                                <a href="#home-kv-1" role="tab" data-toggle="tab"> List Vessels</a>
                            </li>
                            <li>
                                <a href="#profile-kv-1" role="tab" data-toggle="tab"> Profile</a>
                            </li>
                            <li>
                                <a href="#detail-kv-1" role="tab" data-toggle="tab"> Detail</a>
                            </li>
                        </ul>
                        <div id="myTabContent-kv-1" class="tab-content">
                            <div class="tab-pane fade in active" id="home-kv-1">
                                <p>Status Koneksi</p>
                                <p>
                                    <button type="button" class="btn btn-primary btn-sm">Start</button>
                                    <button type="button" class="btn btn-primary btn-sm">Stop</button>
                                    <button type="button" class="btn btn-primary btn-sm">Refresh</button>    
                                </p>
                                <p>
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-4 col-form-label">Auto Update</label>
                                        <div class="col-sm-3"><input type="text" class="form-control"></div>
                                        <label for="inputPassword" class="col-sm-4 col-form-label">Detik</label>
                                    </div>
                                </p>
                                <p>
                                    Keterangan :
                                    <div id="ListKapal"></div>
                                </p>
                                <p>
                                    <!-- <button type="button" class="btn btn-primary btn-sm" onclick="listvessels();">List Of Vessels</button> -->
                                    <button type="button" class="btn btn-primary btn-sm" onclick="runrecord();">List Of Vessels</button>
                                </p>
                            </div>
                            <div class="tab-pane fade in" id="profile-kv-1">
                                <div id="listTrack"></div>
                            </div>
                            <div class="tab-pane fade in" id="detail-kv-1">
                                <div id="detailTrack"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="map" class="sidebar-map"></div>

        <div class="modal" id="Loading">
            <div class="spinner">
                <div class="rect1"></div>
                <div class="rect2"></div>
                <div class="rect3"></div>
                <div class="rect4"></div>
                <div class="rect5"></div>
            </div>
        </div>

    </body>

    <!-- Maps -->
    <script src="{{asset('base/base.js')}}"></script>

    <!-- LAYERLIST -->
    <link rel="stylesheet" href="{{asset('layerlist/L.Control.Layers.Tree.css')}}" crossorigin=""/>
    <script src="{{asset('layerlist/L.Control.Layers.Tree.js')}}"></script>
    <link rel="stylesheet" href="{{asset('layerlist/layerlist.css')}}">
    <script src="{{asset('layerlist/layerlist.js')}}"></script>

    <!-- ZOOM -->
    <link rel="stylesheet" href="{{asset('zoom/zoom.css')}}">
    <script src="{{asset('zoom/zoom.js')}}"></script>

    <!-- SCALE -->
    <link rel="stylesheet" href="{{asset('scale/L.Control.BetterScale.css')}}" />
    <script src="{{asset('scale/L.Control.BetterScale.js')}}"></script>
    <script src="{{asset('scale/scale.js')}}"></script>

    <!-- INFO -->
    <link rel="stylesheet" href="{{asset('info/info.css')}}">
    <script src="{{asset('info/info.js')}}"></script>

    <!-- MEASURES -->
    <link rel="stylesheet" href="{{asset('measures/measures.css')}}">
    <script src="{{asset('measures/measures.js')}}"></script>

    <!-- MINIMAP -->
    <link rel="stylesheet" href="{{asset('minimap/Control.MiniMap.css')}}">
    <script src="{{asset('minimap/Control.MiniMap.js')}}"></script>
    <script src="{{asset('minimap/MiniMap.js')}}"></script>

    <!-- Header -->
    <link rel="stylesheet" href="{{asset('logo/logo.css')}}">
    <script src="{{asset('logo/logo.js')}}"></script>

    <!-- SIDEBAR -->
    <link rel="stylesheet" href="{{asset('sidebar/leaflet-sidebar.css')}}">
    <script src="{{asset('sidebar/leaflet-sidebar.js')}}"></script>
    <script src="{{asset('sidebar/sidebar.js')}}"></script>

    <!-- BASEMAP -->
    <link rel="stylesheet" href="{{asset('basemap/basemap.css')}}">
    <script src="{{asset('basemap/basemap.js')}}"></script>
    <link rel="stylesheet" href="{{asset('basemap/iconLayers.css')}}">
    <script src="{{asset('basemap/iconLayers.js')}}"></script>
    <script src="{{asset('basemap/providers.js')}}"></script>

    <!-- Geosearch -->
    <script src="{{asset('geosearch/geosearch.js')}}"></script>

    <!-- Tracking -->
    <script src="{{asset('tracking/tracking.js')}}"></script>
    <link rel="stylesheet" href="{{asset('tracking/tracking.css')}}">

</html>
