$(document).bind("mobileinit", function() {
    $.mobile.ajaxEnabled = false;
    // $.mobile.linkBindingEnabled = false;
    $.mobile.hashListeningEnabled = false;
    $.mobile.pushStateEnabled = false;
});
$('div[data-role="page"]').live('pagehide', function(event, ui) {
    $(event.currentTarget).remove();
});
jQuery(document).ready(function() {
    $("#menu").click(function() {
        $("#mypanel").panel().panel("open", {});
    });
    $('#notifications').click(function(e) {
        $('#notifications').removeClass("news");
        $("#notificationList").panel().panel("open", {});
        $.ajax({
            type: "GET",
            url: "../crugeUser/SetLastUpdate",
            success: function(data) {
                //console.log(data);
            },
            error: function(error) {
                alert("an error has ocurred, please try again later");
            }
        });
    });
});