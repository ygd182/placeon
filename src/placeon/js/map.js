//global vars
var map, marker, infowindow = null;
var imageCenter = "https://developers.google.com/maps/documentation/javascript/examples/images/beachflag.png";
var markersArray = [];
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

function addMarkerDraggable(pos, image) {
    var latlng = new google.maps.LatLng(pos.latitude, pos.longitude);
    var marker = new google.maps.Marker({
        map: map,
        animation: google.maps.Animation.Bounce,
        position: latlng,
        draggable: true
    });
    if (image != null) marker.setIcon(image);
    return marker;
}

function updateCenterPin(pos, postcode) {
    var latlng = new google.maps.LatLng(pos.latitude, pos.longitude);
    map.setCenter(latlng);
    //map.setZoom(15);
}

function codeAddress(address) {
    //var address = document.getElementById("address").value;
    geocoder.geocode({
        'address': address
    }, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            map.setCenter(results[0].geometry.location);
            /*var marker = new google.maps.Marker({
            map: map,
            position: results[0].geometry.location
        });*/
        } else {
            alert("Geocode was not successful for the following reason: " + status);
        }
    });
}
var geolocateEnabled = true;

function clearOverlays() {
    for (key in markersArray) {
        markersArray[key].setMap(null);
    }
    markersArray = [];
}

function locateStatePins() {
    clearOverlays();
    var i, lat, lon, marker, items = $(".friendsList").children();
    for (i = 0; i < items.length; ++i) {
        lat = $(items[i]).attr("data-lat");
        lon = $(items[i]).attr("data-lon");
        mes = $(items[i]).attr("data-mess");
        idState = $(items[i]).attr('id');
        marker = addMarker({
            latitude: lat,
            longitude: lon
        }, mes, null);
        markersArray[idState] = marker;
    }
}

function keepAlive(latitude, longitude) {
    $.get('../cruge/ui/keepAlive', function(data) {
        if (data != "OK") 
         window.location = '../site/index';
    });
}

function getFriendsNotification(latitude, longitude) {
    $.ajax({
        type: "GET",
        url: "../crugeUser/getFriendsNotifications?currentLat=" + latitude + "&currentLon=" + longitude,
        success: function(data) {
            $('#notificationList').html(data);
            $('#notificationList').trigger("create");
            if (data.indexOf('<li class="unread"') >= 0) {
                //console.log (data);
                $('#notifications').addClass("news");
            }
            locateStatePins();
        },
        error: function(error) {
            alert("an error has ocurred, please try again later");
        }
    });
}
// function to calculate local time
// given the city's UTC offset
function calcTime(offset) {
    // create Date object for current location
    d = new Date();
    // convert to msec
    // add local time zone offset
    // get UTC time in msec
    utc = d.getTime() + (d.getTimezoneOffset() * 60000);
    // create new Date object for different city
    // using supplied offset
    nd = new Date(utc + (3600000 * offset));
    // return time as a string
    return /*"The local time is " +*/ nd.toLocaleString();
}
//Success function for Geolocation call
function onSuccess(pos) {
    var center = {
        latitude: pos.coords.latitude,
        longitude: pos.coords.longitude
    };
    localStorage.setItem('latitude', center.latitude);
    localStorage.setItem('longitude', center.longitude);
    updateCenterPin(center, null);
    if (marker) { //si ya esta cargada mi pos
        var latlng = new google.maps.LatLng(pos.coords.latitude, pos.coords.longitude);
        marker.setPosition(latlng);
    } else marker = addMarker(center, "me", "../../images/images/yellow-pin.png");
    getFriendsNotification(center.latitude, center.longitude);
}
// Error function for Geolocation call
function onError(msg) {
    alert(msg);
}

function calculateMyPosition() {
    if (geolocateEnabled) {
        navigator.geolocation.getCurrentPosition(onSuccess, onError);
        $("#footer").text(calcTime('-3'));
    }
}

function timeout_callback() {
    calculateMyPosition();
    getFriendsPositions();
    //getFriendsNotification(localStorage.getItem('latitude'), localStorage.getItem('longitude'));
}
jQuery(document).ready(function() {
    //console.log("ready");
    // $("#footer").text(calcTime('-3'));
    timeout_callback();
    if (navigator.geolocation) {
        setInterval(timeout_callback, 60000);
    } else {
        //If location is not supported on this platform, disable it
        //$('#getLocation').value = "Geolocation not supported";
        alert("Geolocation not supported");
    }
    var center = {
        latitude: 0,
        longitude: 0
    };
    initMap("map_canvas", center);
    //getFriendsPositions();
    $("#geolocationEnableButton").click(function() {
        geolocateEnabled = !geolocateEnabled;
    });
    //getFriendNotification();
    /*$(".clinicLink").click(function(e) {
    e.preventDefault();
    alert("lala");
    //codeAddress($("#postcode").val());
  });*/
    $(".clinicLink").live("click", function(e) {
        e.preventDefault();
        var clinicId = $(this).attr("id");
        //clinicId=clinicId.replace("clinic","");
        //console.log(clinicId);
        localStorage.setItem('clinicId', JSON.stringify(clinicId));
        window.location = $(this).attr("href");
        //post code
    });
    $("#centerTo").live("click", function(e) {
        var sta, lat, lon, center;
        sta = $("#state" + $("#centerTo").attr("data-id"));
        lat = sta.attr("data-lat");
        lon = sta.attr("data-lon");
        center = {
            latitude: lat,
            longitude: lon
        };
        updateCenterPin(center, null);
    })
});

function loadFriends(data) {
    var center, link, contentString, positions;
    for (var i = 0; i < data.length; i++) {
        center = {
            latitude: data[i].positions.latitude,
            longitude: data[i].positions.longitude
        };
        //link='<a class="clinicLink" id="clinic1" href='+"../crugeuser/view?id="+' data-role="button" data-ajax="false" >Click here to book a session</a>';
        contentString = '<div id="map_content">' + data[i].name + '</div>';
        addMarker(center, contentString, null);
    }
}

function getFriendsPositions() {
    $.ajax({
        type: "GET",
        url: "../position/getallfriends",
        success: function(data) {
            loadFriends(jQuery.parseJSON(data));
            //console.log(jQuery.parseJSON(data)[0]);
        },
        error: function(error) {
            alert("an error has ocurred, please try again later");
        }
    });
}
/*
function getFriendNotification(){
  $.ajax({
      type: "GET",
      url: "../crugeUser/getFriendNotifications?id=4", 
      success :function(data){       
        $('#notificationList').val(data);
        $('#notificationList').trigger( "create" );
      },
      error: function(error){
        alert("an error has ocurred, please try again later");
      }
    });
}*/