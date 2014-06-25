//global vars
var map;
var infowindow;
var imageCenter = "https://developers.google.com/maps/documentation/javascript/examples/images/beachflag.png";
var geocoder = new google.maps.Geocoder();
var selectedMarker = null;
var markerArray = [];
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
    updateCenterPin(center, "No postcode entered");
}
//load info to marker balloon
function loadInfo(marker, content) {
    google.maps.event.addListener(marker, 'click', function() {
        infowindow.setContent(content);
        infowindow.open(map, this);
    });
}
//add pin to the map
function addMarker(pos, info, image, id) {
    var latlng = new google.maps.LatLng(pos.latitude, pos.longitude);
    var marker = new google.maps.Marker({
        map: map,
        animation: google.maps.Animation.Bounce,
        position: latlng,
        //icon: image 
    });
    if (image != null) marker.setIcon(image);
    google.maps.event.addListener(marker, 'dragstart', function() {
        updateMarkerAddress('Dragging...');
    });
    google.maps.event.addListener(marker, 'drag', function() {
        updateMarkerPosition(marker.getPosition());
    });
    google.maps.event.addListener(marker, 'dragend', function() {
        geocodePosition(marker.getPosition());
    });
    marker.set("id", id);
    //console.log(markerArray);
    google.maps.event.addListener(marker, 'click', function toggleBounce() {
        // console.log(this);
        if (this.getAnimation() != null) {
            this.setAnimation(null);
            this.setDraggable(false);
            selectedMarker = null;
        } else {
            selectedMarker = this;
            unSelectMarkers();
            this.setAnimation(google.maps.Animation.BOUNCE);
            this.setDraggable(true);
            geocodePosition(selectedMarker.getPosition());
            updateMarkerPosition(selectedMarker.getPosition());
        }
    });
    markerArray.push(marker);
    updateCenterPin(pos, null);
    return marker;
}

function updateCenterPin(pos, postcode) {
    var latlng = new google.maps.LatLng(pos.latitude, pos.longitude);
    map.setCenter(latlng);
    map.setZoom(15);
}

function codeAddress(address) {
    //var address = document.getElementById("address").value;
    geocoder.geocode({
        'address': address
    }, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            map.setCenter(results[0].geometry.location);
            selectedMarker.setPosition(results[0].geometry.location);
            geocodePosition(selectedMarker.getPosition());
            updateMarkerPosition(selectedMarker.getPosition());
        } else {
            alert("Geocode was not successful for the following reason: " + status);
        }
    });
}

function markerSelected() {
    if (selectedMarker != null) return true;
    else return false;
}
//Success function for Geolocation call
function onSuccess(pos) {
    //console.log(pos);
    var center = {
        latitude: pos.coords.latitude,
        longitude: pos.coords.longitude
    };
    updateCenterPin(center, null);
    var latlng = new google.maps.LatLng(pos.coords.latitude, pos.coords.longitude);
    selectedMarker.setPosition(latlng);
    selectedMarker.setAnimation(google.maps.Animation.BOUNCE);
    selectedMarker.setDraggable(true);
}
// Error function for Geolocation call
function onError(msg) {
    alert(msg);
}

function calculatePosition() {
    if (geolocateEnabled) {
        navigator.geolocation.getCurrentPosition(onSuccess, onError);
    }
}

function geocodePosition(pos) {
    geocoder.geocode({
        latLng: pos
    }, function(responses) {
        if (responses && responses.length > 0) {
            updateMarkerAddress(responses[0].formatted_address);
        } else {
            updateMarkerAddress('Cannot determine address at this location.');
        }
    });
}

function updateMarkerPosition(latLng) {
    $('#latitudeInput').val(latLng.lat());
    $('#longitudeInput').val(latLng.lng());
}

function updateMarkerAddress(str) {
    $('#postcode').val(str);
}
jQuery(document).ready(function() {
    var center = {
        latitude: 0,
        longitude: 0
    };
    initMap("map_canvas", center);
    getSavedPosition();
    $("#searchPostcodeButton").click(function() {
        if (markerSelected()) codeAddress($("#postcode").val());
        else alert("Please select a pin on the map first by clicking on it.");
    });
    $("#geolocationEnableButton").click(function() {
        if (navigator.geolocation) {
            if (markerSelected()) navigator.geolocation.getCurrentPosition(onSuccess, onError);
            else alert("Please select a pin on the map first by clicking on it.");
        } else {
            //If location is not supported on this platform, disable it
            alert("Geolocation not supported");
        }
    });
    $("#savePlace").click(function(e) {
        e.preventDefault();
        saveAllPositions();
    });
   $('.stateCreation').click(function(e) {
        e.preventDefault();
       if((localStorage.getItem('latitude')=== null)||( localStorage.getItem('longitude')=== null))
        alert("First define your position.")
       else
        window.location=this.getAttribute("href");
    }); 
});

function createPostArray() {
    var postArray = [];
    var value = null;
    for (var i = 0; i < markerArray.length; i++) {
        if (!(typeof markerArray[i] === 'undefined')) {
            value = {
                'id': markerArray[i].get('id'),
                'latitude': markerArray[i].getPosition().lat(),
                'longitude': markerArray[i].getPosition().lng()
            };
            postArray.push(value);
        }
    }
    return postArray;
}

function saveAllPositions() {
    var dataPost = createPostArray();
    //console.log(dataPost);
    // alert('aaaa');
    $.ajax({
        type: "POST",
        url: "../position/SaveAllPositions",
        data: {
            'data': dataPost
        },
        success: function(data) {
            setTimeout(function() { //espero 3 seg mostrando el alert y despues vuelve a la pag anterior
                //window.location = "index";
                location.reload();
            }, 3000);
            alert("Address added");
        },
        error: function(error) {
            alert("an error has ocurred, please try again later");
            console.log(error);
        }
    });
}

function unSelectMarkers() {
    for (var i = 0; i < markerArray.length; i++) {
        if (!(typeof markerArray[i] === 'undefined')) {
            markerArray[i].setAnimation(null);
            markerArray[i].setDraggable(false);
        }
    }
}

function deleteMarker(id) {
    for (var i = 0; i < markerArray.length; i++) {
        if (!(typeof markerArray[i] === 'undefined'))
            if (markerArray[i].get('id') == id) {
                delete markerArray[i];
                return;
            }
    }
}

function loadPositionData(data) {
    var position;
    var link = '<a class="positionLink" ';
    var id;
    var center, image, position;
    if (data.length > 0)
        for (var i = 0; i < data.length; i++) {
            position = data[i];
            image = null;
            contentString = 'content';
            var center = {
                latitude: position.latitude,
                longitude: position.longitude
            };
            localStorage.setItem('latitude', center.latitude);
            localStorage.setItem('longitude', center.longitude);
            var marker = addMarker(center, contentString, image, position.id);
        } else {
          localStorage.removeItem('latitude');
          localStorage.removeItem('longitude');
        addAddress();
    }
}

function getSavedPosition() {
    $.ajax({
        type: "GET",
        url: "../position/getAll",
        success: function(data) {
            loadPositionData(jQuery.parseJSON(data));
        },
        error: function(error) {
            console.log(error);
        }
    });
}

function deletePosition(id) {
    $.ajax({
        type: "GET",
        url: "../position/DeletePosition?id=" + id,
        success: function(data) {
            alert('Position Deleted');
            location.reload();
        },
        error: function(error) {
            console.log(error);
        }
    });
}

function addAddress() {
    var center = {
        latitude: 0,
        longitude: 0
    };
    var marker = addMarker(center, '', null, null);
	loadInfo(marker,'Save your position');
    google.maps.event.trigger(marker, 'click');
}