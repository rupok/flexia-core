(function($) {
	"use strict";
	// Set Background Image
	var postColumn = $( '.flexia-plugins' );

	$( '.flexia-plugins' ).each( function() {
		let findDiv = $(this).find( '.header' );
		let dataBg = findDiv.attr( 'data-bg-image' );
		findDiv.css( 'background-image', 'url( '+ dataBg +' )' );
		console.log('hi');
	} );


})(jQuery);