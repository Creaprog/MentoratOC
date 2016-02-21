$(function () {


    $('a.popup_link').on('click', function () {
        var popID = $(this).data('rel');
        var popWidth = $(this).data('width');

        $('#' + popID).fadeIn().css({'width': popWidth}).prepend('<a href="#" class="close"><img src="images/cross.png" class="btn_close" title="Close Window" alt="Close" /></a>');


        var popMargTop = ($('#' + popID).height() + 80) / 2;
        var popMargLeft = ($('#' + popID).width() + 80) / 2;

        //Apply Margin to Popup
        $('#' + popID).css({
            'margin-top': -popMargTop,
            'margin-left': -popMargLeft
        });


        $('body').append('<div id="fade"></div>');
        $('#fade').css({'filter': 'alpha(opacity=80)'}).fadeIn();

        return false;
    });


    $('body').on('click', 'a.close, #fade', function () {
        $('#fade , .popup').fadeOut(function () {
            $('#fade, a.close').remove();
        });

        return false;
    });

});