//global vars
var map;
var infowindow;
var myMarker;
//var centerPin;
/*
@containerId
@center -> center.latitude, center.longitude
*/
var circle;

function addCircle() {
    var position = myMarker.getPosition();
    var distance = parseInt($("#Alertfilter_value").val());
    if (circle) {
        circle.setCenter(position);
        circle.setRadius(distance);
    } else {
        var circleOptions = {
            strokeColor: '#FF0000',
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: '#FF0000',
            fillOpacity: 0.35,
            map: map,
            center: position,
            radius: distance
        };
        circle = new google.maps.Circle(circleOptions);
    }
}

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

function updateCenterPin(pos, postcode) {
    var latlng = new google.maps.LatLng($("#Position_latitude").val(), $("#Position_longitude").val());
    myMarker.setPosition(latlng);
    map.setCenter(latlng);
    //map.setZoom(15);
}
jQuery(document).ready(function() {
    var center = {
        latitude: $("#Position_latitude").val(),
        longitude: $("#Position_longitude").val()
    };
    initMap("map_canvas", center);
    myMarker = addMarker(center, 'Meassure from here', null);
    getFriendsPositions();
    if ($("#checkbox-1").is(':checked')) {
        $("#Position_latitude").textinput('enable');
        $("#Position_longitude").textinput('enable');
    } else {
        $("#Position_latitude").val(localStorage.latitude);
        $("#Position_longitude").val(localStorage.longitude);
        $("#Position_latitude").textinput('disable');
        $("#Position_longitude").textinput('disable');
    }
    localStorage.setItem('filterLatitude', $("#Position_latitude").val());
    localStorage.setItem('filterLongitude', $("#Position_longitude").val());
    updateCenterPin();
    addCircle();
    $("#checkbox-1").click(function() {
        var $this = $(this);
        if ($this.is(':checked')) {
            $("#Position_latitude").val(localStorage.filterLatitude);
            $("#Position_longitude").val(localStorage.filterLongitude);
            $("#Position_latitude").textinput('enable');
            $("#Position_longitude").textinput('enable');
        } else {
            $("#Position_latitude").val(localStorage.latitude);
            $("#Position_longitude").val(localStorage.longitude);
            $("#Position_latitude").textinput('disable');
            $("#Position_longitude").textinput('disable');
        }
        updateCenterPin();
        addCircle();
    });
    $("#Alertfilter_value").keyup(function() {
        addCircle();
    });
    $("#Position_latitude").keyup(function() {
        updateCenterPin();
        addCircle();
    });
    $("#Position_longitude").keyup(function() {
        updateCenterPin();
        addCircle();
    });
});

function loadFriends(data) {
    var center, link, contentString, positions;
    for (var i = 0; i < data.length; i++) {
        positions = data[i].positions;
        //console.log(positions);
        //  for(var j=0;j<positions.length;j++){
        center = {
            latitude: positions.latitude,
            longitude: positions.longitude
        };
        //link='<a class="clinicLink" id="clinic1" href='+"../crugeuser/view?id="+' data-role="button" data-ajax="false" >Click here to book a session</a>';
        contentString = '<div id="map_content">' + data[i].name + '</div>';
        addMarker(center, contentString, null);
        //      }
    }
}

function getFriendsPositions() {
    var friendId = $('#Alertfilter_user_2').val();
    $.ajax({
        type: "GET",
        url: "../position/getfriend?id=" + friendId,
        success: function(data) {
            loadFriends(jQuery.parseJSON(data));
            //console.log(data);
        },
        error: function(error) {
            alert("an error has ocurred, please try again later");
        }
    });
}