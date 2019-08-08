<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>VTMS Pelindo II</title>

        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

        <!-- CSS MAPS -->
        <link rel="stylesheet" href="{{asset('css/map.css')}}">

        <!-- BOOTSTRAP -->
        <!-- <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
        <script src="{{asset('bootstrap/js/bootstrap.js')}}"></script> -->
        <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" type="text/javascript"></script>

        <!-- LEAFLET -->
        <link rel="stylesheet" href="{{asset('leaflet/leaflet.css')}}">
        <script src="{{asset('leaflet/leaflet.js')}}"></script>

        <!-- JQUERY -->
        <!-- <script src="{{asset('js/jquery-1.7.1.min.js')}}"></script> -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

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

        <style type="text/css">
            #test_tabs {
                position: absolute;
                top: 12%;
                right: 1%;
                width: 400px;
                z-index: 400;
                display: block;
                opacity: 0.9;
            }

            .card-header-vtms-list-test {
                padding: 0.75rem 1.25rem;
                margin-bottom: 0;
                height: 40px;
                border-bottom: 1px solid rgba(0, 0, 0, 0.125);
                opacity: 0.9;
                background: linear-gradient(110deg, #fcac4c 30%, #f98626 30%);
            }
        </style>

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
                    <div class="panel panel-default">
                        <!-- <p>Status Koneksi</p>
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
                            <button type="button" class="btn btn-primary btn-sm" onclick="listvessels();">List Of Vessels</button>
                        </p> -->
                        <div class="tabs-x tabs-above">
                            <ul id="myTab-kv-1" class="nav nav-tabs" role="tablist">
                                <li class="active"><a href="#home-kv-1" role="tab" data-toggle="tab"><i
                                        class="glyphicon glyphicon-home"></i> Home</a></li>
                                <li><a href="#profile-kv-1" role="tab-kv" data-toggle="tab"><i class="glyphicon glyphicon-user"></i>
                                    Profile</a></li>
                                <li class="dropdown">
                                    <a href="#" id="myTabDrop-kv-1" class="dropdown-toggle" data-toggle="dropdown"><i
                                            class="glyphicon glyphicon-list-alt"></i> Dropdown <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop-1">
                                        <li><a href="#dropdown-kv-1-1" tabindex="-1" role="tab" data-toggle="tab">
                                            <i class="glyphicon glyphicon-chevron-right"></i> Option 1</a></li>
                                        <li><a href="#dropdown-kv-1-2" tabindex="-1" role="tab" data-toggle="tab">
                                            <i class="glyphicon glyphicon-chevron-right"></i> Option 2</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <div id="myTabContent-kv-1" class="tab-content">
                                <div class="tab-pane fade in active" id="home-kv-1">
                                    <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua,
                                        retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica.
                                        Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure
                                        terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan
                                        american apparel, butcher voluptate nisi qui.</p>
                                </div>
                                <div class="tab-pane fade" id="profile-kv-1">
                                    <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid.
                                        Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four
                                        loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk
                                        aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore
                                        aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente
                                        labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard
                                        ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher
                                        vero sint qui sapiente accusamus tattooed echo park.</p>
                                </div>
                                <div class="tab-pane fade" id="dropdown-kv-1-1">
                                    <p><h4>Dropdown &raquo; Option 1</h4>Etsy mixtape wayfarers, ethical wes anderson tofu before they
                                    sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag
                                    gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie
                                    helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg
                                    banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog.
                                    Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork
                                    sustainable tofu synth chambray yr.</p>
                                </div>
                                <div class="tab-pane fade" id="dropdown-kv-1-2">
                                    <p><h4>Dropdown &raquo; Option 2</h4>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy
                                    art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater.
                                    Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred
                                    vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby
                                    sweater. Lomo wolf viral, mustache readymade thundercats keffiyeh craft beer marfa ethical. Wolf
                                    salvia freegan, sartorial keffiyeh echo park vegan.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="map" class="sidebar-map"></div>

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
    <script src="{{asset('tracking/drag.js')}}"></script>
    <link rel="stylesheet" href="{{asset('tracking/tracking.css')}}">

</html>
