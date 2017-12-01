/**
 * ColorPickers
 */

adgalleryCMB.addCallbackForInit( function() {

	// Colorpicker
	jQuery('input:text.adgallerycmb_colorpicker').wpColorPicker();

} );

adgalleryCMB.addCallbackForClonedField( 'adgalleryCMB_Color_Picker', function( newT ) {

	// Reinitialize colorpickers
    newT.find('.wp-color-result').remove();
	newT.find('input:text.adgallerycmb_colorpicker').wpColorPicker();

} );