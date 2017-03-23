$(document).ready(function() {
    $('#submitbtn').click(function() {
        $.post( "thank.php",{"name":$('#name').html(), "value":$('#UserResponse').val()})
            .done(function( data ) {
                $('adminthanks').html(data);
            });
    });
});