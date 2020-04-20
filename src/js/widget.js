/**
 * Widget content handler script
 * Add color picker to widget inspector options
 *
 * @package easy-icon-grid
 */

( function ( $ ) {
	$( document ).ready( function () {
		if ( $.fn.wpColorPicker ) {
			$( '.eig-color-picker' ).wpColorPicker( {
				change: function () {
					setTimeout( function () { $( '.eig-color-picker' ).trigger( 'change' ); }, 500 );
				}
			} );
		}
	} );
} )( jQuery );
