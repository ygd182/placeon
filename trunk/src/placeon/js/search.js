jQuery(document).ready(function() {
    /*$('#searchForm').submit(function(e) {
		e.preventDefault();
		var searchField = {'username':$("#searchField").val()};
		$.ajax({
			type: "GET",
			url: "../search/search",
			data: searchField, 
			success :function(data){
				console.log("confirmed");
			},
			error: function(error){
				console.log("an error has ocurred, please try again later");
			}
		});
	});*/
    $('#searchButton').click(function(e) {
        e.preventDefault();
        var id = $('.userView').attr("data-iduser");
        var searchField = $("#searchField").val();
        $.ajax({
            type: "GET",
            context: document.body,
            url: "../search/search?username=" + searchField,
            success: function(data) {
                $('#resultado').append(data);
                $('ul').listview();
            },
            error: function(error) {
                console.log(error);
            },
        });
    });
});