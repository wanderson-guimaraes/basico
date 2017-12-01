adgalleryCMB.addCallbackForDeletedField( 'adgalleryCMB_wysiwyg', function( el ) {

	// Destroy WYSIWYG editors instances.
	el.find( '.adgallerycmb-wysiwyg textarea' ).each( function() {
		var instance = tinyMCE.get( jQuery(this).attr('id') );
		if ( typeof( instance ) !== 'undefined' ) 
			instance.remove();
	} );

} );

adgalleryCMB.addCallbackForClonedField( 'adgalleryCMB_wysiwyg', function( newT ) {
	
	newT.find( '.adgallerycmb-wysiwyg' ).each( function (i) {

		var el, id, name, ed, dom, i, fieldId, nameRegex, idRegex;
		
		el      = jQuery(this);
		id      = el.attr( 'data-id' );
		name    = el.attr( 'data-name' );
		ed      = tinyMCE.get(id);
		fieldId = el.attr('data-field-id'); //Field identifier, not including field/group index., 
		
		if ( ed )
			return;
	
		nameRegex = new RegExp( 'adgallerycmb-placeholder-name-' + fieldId, 'g' );
		idRegex   = new RegExp( 'adgallerycmb-placeholder-id-' + fieldId, 'g' );

		// Placeholder markup for the new wysiwyg is stored as a prop on var adgallerycmb_wysiwyg_editors
		// Copy, update ids & names & insert.
		el.html( adgallerycmb_wysiwyg_editors[fieldId].replace( nameRegex, name ).replace( idRegex, id ) );

		// If no settings for this field. Clone from placeholder.
		if ( typeof( tinyMCEPreInit.mceInit[ id ] ) === 'undefined' ) {
			var newSettings = jQuery.extend( {}, tinyMCEPreInit.mceInit[ 'adgallerycmb-placeholder-id-' + fieldId ] );
			for ( var prop in newSettings )
				if ( 'string' === typeof( newSettings[prop] ) )
					newSettings[prop] = newSettings[prop].replace( idRegex, id ).replace( nameRegex, name );
			tinyMCEPreInit.mceInit[ id ] = newSettings;
		}
		
		// If no Quicktag settings for this field. Clone from placeholder.
		if ( typeof( tinyMCEPreInit.qtInit[ id ] ) === 'undefined' ) {
			var newQTS = jQuery.extend( {}, tinyMCEPreInit.qtInit[ 'adgallerycmb-placeholder-id-' + fieldId ] );
			for ( var prop in newQTS )
				if ( 'string' === typeof( newQTS[prop] ) )
					newQTS[prop] = newQTS[prop].replace( idRegex, id ).replace( nameRegex, name );
			tinyMCEPreInit.qtInit[ id ] = newQTS;
		}

		var mode = el.find('.wp-editor-wrap').hasClass('tmce-active') ? 'tmce' : 'html';

		// If current mode is visual, create the tinyMCE.
		if ( 'tmce' === mode ) {				
			var ed = new tinymce.Editor( id, tinyMCEPreInit.mceInit[id] );
			ed.render();
		}
			
		// Init Quicktags.
		QTags.instances[0] = undefined;
		try { quicktags( tinyMCEPreInit.qtInit[id] ); } catch(e){}

	} );

} );


adgalleryCMB.addCallbackForSortStart( 'adgalleryCMB_wysiwyg', function( el ) {

	el.find( '.wp-editor-area' ).each(function(){
		var id = jQuery(this).attr('id');
		tinyMCE.execCommand('mceRemoveControl', false, id);
	});

} );

adgalleryCMB.addCallbackForSortEnd( 'adgalleryCMB_wysiwyg', function( el ) {

	el.find( '.wp-editor-area' ).each(function(){
		
		var id   = jQuery(this).attr('id'),
		    mode = jQuery(this).closest('.wp-editor-wrap').hasClass('tmce-active') ? 'tmce' : 'html';
		
		if ( 'tmce' === mode )
			tinyMCE.execCommand('mceAddControl', false, id);
	
	});

} );
