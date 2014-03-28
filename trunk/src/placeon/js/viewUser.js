jQuery(document).ready(function() {
    $('#addFriendButton').click(function(e) {
        e.preventDefault();
        var id2 = $('.userView').attr("data-iduser");
        var friendData = {
            'id_user2': id2,
            "date": null
        };
        //console.log(friendData);
        $.ajax({
            type: "POST",
            url: "../friend/saveFriend",
            data: friendData,
            success: function(data) {
                setTimeout(function() { //espero 3 seg mostrando el alert y despues vuelve a la pag anterior
                    window.location = "ViewAll";
                }, 3000);
                alert("Friend added");
            },
            error: function(error) {
                alert("an error has ocurred, please try again later");
            }
        });
    });
});