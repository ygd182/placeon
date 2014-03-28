jQuery(document).ready(function() {
    console.log(localStorage);
    $("#Position_latitude").val(Number(localStorage.latitude));
    $("#Position_longitude").val(Number(localStorage.longitude));
});