
/**
 * Date & Time Fields
 */

adgalleryCMB.addCallbackForClonedField( ['adgalleryCMB_Date_Field', 'adgalleryCMB_Time_Field', 'adgalleryCMB_Date_Timestamp_Field', 'adgalleryCMB_Datetime_Timestamp_Field' ], function( newT ) {

	// Reinitialize all the datepickers
	newT.find( '.adgallerycmb_datepicker' ).each(function () {
		jQuery(this).attr( 'id', '' ).removeClass( 'hasDatepicker' ).removeData( 'datepicker' ).unbind().datepicker();
	});

	// Reinitialize all the timepickers.
	newT.find('.adgallerycmb_timepicker' ).each(function () {
		jQuery(this).timePicker({
			startTime: "00:00",
			endTime: "23:30",
			show24Hours: false,
			separator: ':',
			step: 30
		});
	});

} );

adgalleryCMB.addCallbackForInit( function() {

	// Datepicker
	jQuery('.adgallerycmb_datepicker').each(function () {
		jQuery(this).datepicker();
	});
	
	// Wrap date picker in class to narrow the scope of jQuery UI CSS and prevent conflicts
	jQuery("#ui-datepicker-div").wrap('<div class="adgallerycmb_element" />');

	// Timepicker
	jQuery('.adgallerycmb_timepicker').each(function () {
		jQuery(this).timePicker({
			startTime: "00:00",
			endTime: "23:30",
			show24Hours: false,
			separator: ':',
			step: 30
		});
	} );

});