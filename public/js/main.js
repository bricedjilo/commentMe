'use strict';

$( document ).ready(function() {

    $( '#navigation .nav-item a' ).click( function (event) {
    	$( '#navigation' ).find('li.active').removeClass( 'active' );
    	$( this ).parent('li').addClass( 'active' );
    });

    /* off-canvas sidebar toggle */
    $('[data-toggle=offcanvas]').click(function() {
        $('.row-offcanvas').toggleClass('active');
        $('span.collapse').toggleClass('in');
    });

    $('[data-toggle=offcanvas-in]').click(function() {
        $('.row-offcanvas').addClass('active');
        $('span.collapse').addClass('in');
    });

});
