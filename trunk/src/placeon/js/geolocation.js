$(document).bind("mobileinit", function() {
    $.mobile.ajaxEnabled = false;
    // $.mobile.linkBindingEnabled = false;
    $.mobile.hashListeningEnabled = false;
    $.mobile.pushStateEnabled = false;
});
$('div[data-role="page"]').live('pagehide', function(event, ui) {
    $(event.currentTarget).remove();
});
var geolocateEnabled = true;

function getFriendsNotification(latitude, longitude) {
    $.ajax({
        type: "GET",
        url: "../crugeUser/getFriendsNotifications?currentLat=" + latitude + "&currentLon=" + longitude,
        success: function(data) {
            $('#notificationList').html(data);
            $('#notificationList').trigger("create");
        },
        error: function(error) {
            alert("an error has ocurred, please try again later");
        }
    });
}

function keepAlive(latitude, longitude) {
    $.get('../cruge/ui/keepAlive', function(data) {
        if (data == "OK") getFriendsNotification(latitude, longitude);
        else window.location = '../site/index';
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
    // updateCenterPin(center,null);
    //addMarker(center,"pepe",null);  
    localStorage.latitude = center.latitude;
    localStorage.longitude = center.longitude;
    keepAlive(pos.coords.latitude, pos.coords.longitude);
}
// Error function for Geolocation call
function onError(msg) {
    alert(msg);
}

function calculatePosition() {
    if (geolocateEnabled) {
        navigator.geolocation.getCurrentPosition(onSuccess, onError);
        $("#footer").text(calcTime('-3'));
    }
}
jQuery(document).ready(function() {
    $("#menu").click(function() {
        optionsHash = {};
        $("#mypanel").panel().panel("open", optionsHash);
    });
    $('#notifications').click(function(e) {
        optionsHash = {};
        $("#notificationList").panel().panel("open", optionsHash);
    });
    $("#footer").text(calcTime('-3'));
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(onSuccess, onError);
        setInterval(calculatePosition, 60000);
    } else {
        //If location is not supported on this platform, disable it
        //$('#getLocation').value = "Geolocation not supported";
        alert("Geolocation not supported");
    }
});