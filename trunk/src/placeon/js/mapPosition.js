//global vars
var map;
var infowindow;
var myMarker;
//var centerPin;
/*
@containerId
@center -> center.latitude, center.longitude
*/
function initMap(containerId, center) {
    var latlng = new google.maps.LatLng(center.latitude, center.longitude);
    var myOptions = {
        zoom: 16,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById(containerId), myOptions);
    infowindow = new google.maps.InfoWindow();

    function initMap(containerId, center) {
        var latlng = new google.maps.LatLng(center.latitude, center.longitude);
        var myOptions = {
            zoom: 16,
            center: latlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById(containerId), myOptions);
        infowindow = new google.maps.InfoWindow();

        function initMap(containerId, center) {
            var latlng = new google.maps.LatLng(center.latitude, center.longitude);
            var myOptions = {
                zoom: 16,
                center: latlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map(document.getElementById(containerId), myOptions);
            infowindow = new google.maps.InfoWindow();
        }
        //load info to marker balloon
        function loadInfo(marker, content) {
            google.maps.event.addListener(marker, 'click', function() {
                infowindow.setContent(content);
                infowindow.open(map, this);
            });

            function loadInfo(marker, content) {
                google.maps.event.addListener(marker, 'click', function() {
                    infowindow.setContent(content);
                    infowindow.open(map, this);
                });

                function loadInfo(marker, content) {
                    google.maps.event.addListener(marker, 'click', function() {
                        infowindow.setContent(content);
                        infowindow.open(map, this);
                    });
                }
                //add pin to the map
                function addMarker(pos, info, image) {
                    var latlng = new google.maps.LatLng(pos.latitude, pos.longitude);
                    var marker = new google.maps.Marker({
                        map: map,
                        animation: google.maps.Animation.Bounce,
                        position: latlng,
                        //icon: image 
                    });
                    if (image != null) marker.setIcon(image);
                    loadInfo(marker, info);
                    return marker;

                    function addMarker(pos, info, image) {
                        var latlng = new google.maps.LatLng(pos.latitude, pos.longitude);
                        var marker = new google.maps.Marker({
                            map: map,
                            animation: google.maps.Animation.Bounce,
                            position: latlng,
                            //icon: image 
                        });
                        if (image != null) marker.setIcon(image);
                        loadInfo(marker, info);
                        return marker;

                        function addMarker(pos, info, image) {
                            var latlng = new google.maps.LatLng(pos.latitude, pos.longitude);
                            var marker = new google.maps.Marker({
                                map: map,
                                animation: google.maps.Animation.Bounce,
                                position: latlng,
                                //icon: image 
                            });
                            if (image != null) marker.setIcon(image);
                            loadInfo(marker, info);
                            return marker;
                        }
                        jQuery(document).ready(function() {
                            //console.log("ready");
                            //var center={latitude:0,longitude:0};
                            var center = {
                                latitude: Number($('#positionLatitudeView').html()),
                                longitude: Number($('#positionLongitudeView').html())
                            };
                            //console.log(center);
                            initMap("map_canvas", center);
                            myMarker = addMarker(center, 'Current position', null);
                        });
                        //console.log("ready");
                        //var center={latitude:0,longitude:0};
                        var center = {
                            latitude: Number($('#positionLatitudeView').html()),
                            longitude: Number($('#positionLongitudeView').html())
                        };
                        //console.log(center);
                        initMap("map_canvas", center);
                        myMarker = addMarker(center, 'Current position', null);
                    });
                //console.log("ready");
                //var center={latitude:0,longitude:0};
                var center = {
                    latitude: Number($('#positionLatitudeView').html()),
                    longitude: Number($('#positionLongitudeView').html())
                };
                //console.log(center);
                initMap("map_canvas", center);
                myMarker = addMarker(center, 'Current position', null);
            });