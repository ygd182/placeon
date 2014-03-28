jQuery(document).ready(function() {
    // Bind to "mobileinit" before you load jquery.mobile.js
    /*$( document ).on( "mobileinit", function() {
		$.mobile.listview.prototype.options.autodividersSelector = function( elt ) {
			var text = $.trim( elt.text() ) || null;
			if ( !text ) {
				return null;
			}
			if ( !isNaN(parseFloat(text)) ) {
				return "0-9";
			} else {
				text = text.slice( 0, 1 ).toUpperCase();
				return text;
			}
		};
	});*/
    //getUsers();
    /*$('a').click(function(e) {
		var friendData={'id_user2':2,'id_user1':2,"date":null};
		console.log(friendData);
		$.ajax({
			type: "POST",
			url: "../friend/saveFriend",
			data: friendData, 
			success :function(data){
				alert("confirmed");
			},
			error: function(error){
				//alert("an error has ocurred, please try again later");
			}
		});
	});*/
});

function loadUsers(data) {
    var li = null;
    /*var ul=$('.friendsList');
	ul.html("");*/
    var ul = '<ul class="friendsList" data-role="listview" data-autodividers="true" data-inset="true">';
    ul = $(ul);
    for (var i = 0; i < data.length; i++) {
        li = '<li data-theme="c" ><a href="#">' + data[i].name + '</a></li>';
        ul.append(li);
    }
    $('#container').prepend(ul);
    $("ul").listview();
}

function getUsers() {
    var id = 4;
    $.ajax({
        type: "GET",
        url: "../friend/getAll",
        success: function(data) {
            //console.log(data);
            loadUsers(jQuery.parseJSON(data));
        },
        error: function(error) {
            console.log(error);
        }
    });
}