/**
 * Custom jQuery for Custom Metaboxes and Fields
 */

/*jslint browser: true, devel: true, indent: 4, maxerr: 50, sub: true */
/*global jQuery, tb_show, tb_remove */

'use strict';

var adgalleryCMB = {

	_initCallbacks: [],
	_clonedFieldCallbacks: [],
	_deletedFieldCallbacks: [],

	_sortStartCallbacks: [],
	_sortEndCallbacks: [],
	
	init : function() {

		jQuery( '.field.repeatable' ).each( function() {
			adgalleryCMB.isMaxFields( jQuery(this) );
		} );

		// Unbind & Re-bind all adgalleryCMB events to prevent duplicates.
		jQuery(document).unbind( 'click.adgalleryCMB' );
		jQuery(document).on( 'click.adgalleryCMB', '.adgallerycmb-delete-field', adgalleryCMB.deleteField );
		jQuery(document).on( 'click.adgalleryCMB', '.adgallery-repeat-field', adgalleryCMB.repeatField );

		// When toggling the display of the meta box container - reinitialize
		jQuery(document).on( 'click.adgalleryCMB', '.handlediv', adgalleryCMB.init )

		adgalleryCMB.doneInit();

		jQuery('.field.adgallerycmb-sortable' ).each( function() { 
			adgalleryCMB.sortableInit( jQuery(this) );
		} );


	},

	repeatField : function( e ) {

		var templateField, newT, field, index, attr;

		field = jQuery( this ).closest('.field' );					

		e.preventDefault();
		jQuery(this).blur();

		if ( adgalleryCMB.isMaxFields( field, 1 ) )
			return;

		templateField = field.children( '.field-item.hidden' );

		newT = templateField.clone();
		newT.removeClass( 'hidden' );
		
		var excludeInputTypes = '[type=submit],[type=button],[type=checkbox],[type=radio],[readonly]';
		newT.find( 'input' ).not( excludeInputTypes ).val( '' );

		newT.find( '.adgallerycmb_upload_status' ).html('');

		newT.insertBefore( templateField );

		 // Recalculate group ids & update the name fields..
		index = 0;
		attr  = ['id','name','for','data-id','data-name'];

		field.children( '.field-item' ).not( templateField ).each( function() {

			var search  = field.hasClass( 'adgalleryCMB_Group_Field' ) ? /adgallerycmb-group-(\d|x)*/g : /adgallerycmb-field-(\d|x)*/g;
			var replace = field.hasClass( 'adgalleryCMB_Group_Field' ) ? 'adgallerycmb-group-' + index : 'adgallerycmb-field-' + index;

			jQuery(this).find( '[' + attr.join('],[') + ']' ).each( function() {

				for ( var i = 0; i < attr.length; i++ )
					if ( typeof( jQuery(this).attr( attr[i] ) ) !== 'undefined' )
						jQuery(this).attr( attr[i], jQuery(this).attr( attr[i] ).replace( search, replace ) );

			} );

			index += 1;

		} );

		adgalleryCMB.clonedField( newT );

		if ( field.hasClass( 'adgallerycmb-sortable' ) )
			adgalleryCMB.sortableInit( field );


	},

	deleteField : function( e ) {

		var fieldItem, field;

		e.preventDefault();
		jQuery(this).blur();

		fieldItem = jQuery( this ).closest('.field-item' );
		field     = fieldItem.closest( '.field' );

		adgalleryCMB.isMaxFields( field, -1 );
		adgalleryCMB.deletedField( fieldItem );

		fieldItem.remove();

	},

	/**
	 * Prevent having more than the maximum number of repeatable fields.
	 * When called, if there is the maximum, disable .adgallery-repeat-field button.
	 * Note: Information Passed using data-max attribute on the .field element.
	 *
	 * @param jQuery .field
	 * @param int modifier - adjust count by this ammount. 1 If adding a field, 0 if checking, -1 if removing a field... etc
	 * @return null
	 */
	isMaxFields: function( field, modifier ) {

		var count, addBtn, min, max, count;

		modifier = (modifier) ? parseInt( modifier, 10 ) : 0;

		addBtn = field.children( '.adgallery-repeat-field' );
		count  = field.children('.field-item').not('.hidden').length + modifier; // Count after anticipated action (modifier)
		max    = field.attr( 'data-rep-max' );

		// Show all the remove field buttons.
		field.find( '> .field-item > .adgallerycmb-delete-field, > .field-item > .group > .adgallerycmb-delete-field' ).show();

		if ( typeof( max ) === 'undefined' )
			return false;

		// Disable the add new field button?
		if ( count >= parseInt( max, 10 ) )
			addBtn.attr( 'disabled', 'disabled' );
		else 
			addBtn.removeAttr( 'disabled' );

		if ( count > parseInt( max, 10 ) )
			return true;

	},

	addCallbackForInit: function( callback ) {

		this._initCallbacks.push( callback )

	},

	/**
	 * Fire init callbacks.
	 * Called when adgalleryCMB has been set up.
	 */
	doneInit: function() {

		var _this = this,
			callbacks = adgalleryCMB._initCallbacks;

		if ( callbacks ) {
			for ( var a = 0; a < callbacks.length; a++) {
				callbacks[a]();
			}
		}

	},

	addCallbackForClonedField: function( fieldName, callback ) {

		if ( jQuery.isArray( fieldName ) )
			for ( var i = 0; i < fieldName.length; i++ )
				adgalleryCMB.addCallbackForClonedField( fieldName[i], callback );

		this._clonedFieldCallbacks[fieldName] = this._clonedFieldCallbacks[fieldName] ? this._clonedFieldCallbacks[fieldName] : []
		this._clonedFieldCallbacks[fieldName].push( callback )

	},

	/**
	 * Fire clonedField callbacks.
	 * Called when a field has been cloned.
	 */
	clonedField: function( el ) {

		// also check child elements
		el.add( el.find( 'div[data-class]' ) ).each( function( i, el ) {

			el = jQuery( el )
			var callbacks = adgalleryCMB._clonedFieldCallbacks[el.attr( 'data-class') ]

			if ( callbacks )
				for ( var a = 0; a < callbacks.length; a++ )
					callbacks[a]( el );

		})
	},

	addCallbackForDeletedField: function( fieldName, callback ) {

		if ( jQuery.isArray( fieldName ) )
			for ( var i = 0; i < fieldName.length; i++ )
				adgalleryCMB._deletedFieldCallbacks( fieldName[i], callback );

		this._deletedFieldCallbacks[fieldName] = this._deletedFieldCallbacks[fieldName] ? this._deletedFieldCallbacks[fieldName] : []
		this._deletedFieldCallbacks[fieldName].push( callback )

	},

	/**
	 * Fire deletedField callbacks.
	 * Called when a field has been cloned.
	 */
	deletedField: function( el ) {

		// also check child elements
		el.add( el.find( 'div[data-class]' ) ).each( function(i, el) {

			el = jQuery( el )
			var callbacks = adgalleryCMB._deletedFieldCallbacks[el.attr( 'data-class') ]

			if ( callbacks )
				for ( var a = 0; a < callbacks.length; a++ )
					callbacks[a]( el )

		})
	},
	
	sortableInit : function( field ) {

		var items = field.find(' > .field-item').not('.hidden');
		
		field.find( '> .field-item > .adgallerycmb-handle' ).remove();

		items.each( function() {
			jQuery(this).append( '<div class="adgallerycmb-handle"></div>' );
		} );
		
		field.sortable( { 
			handle: "> .adgallerycmb-handle" ,
			cursor: "move",
			items: " > .field-item",
			beforeStop: function( event, ui ) { adgalleryCMB.sortStart( jQuery( ui.item[0] ) ); },
			deactivate: function( event, ui ) { adgalleryCMB.sortEnd( jQuery( ui.item[0] ) ); },
		} );
		
	},

	sortStart : function ( el ) {
		
		// also check child elements
		el.add( el.find( 'div[data-class]' ) ).each( function(i, el) {
		
			el = jQuery( el )
			var callbacks = adgalleryCMB._sortStartCallbacks[el.attr( 'data-class') ]
		
			if ( callbacks )
				for ( var a = 0; a < callbacks.length; a++ )
					callbacks[a]( el )
				
		})

	},

	addCallbackForSortStart: function( fieldName, callback ) {
		
		if ( jQuery.isArray( fieldName ) )
			for ( var i = 0; i < fieldName.length; i++ )
				adgalleryCMB.addCallbackForSortStart( fieldName[i], callback );
	
		this._sortStartCallbacks[fieldName] = this._sortStartCallbacks[fieldName] ? this._sortStartCallbacks[fieldName] : []
		this._sortStartCallbacks[fieldName].push( callback )
	
	},

	sortEnd : function ( el ) {

		// also check child elements
		el.add( el.find( 'div[data-class]' ) ).each( function(i, el) {
		
			el = jQuery( el )
			var callbacks = adgalleryCMB._sortEndCallbacks[el.attr( 'data-class') ]
		
			if ( callbacks )
				for ( var a = 0; a < callbacks.length; a++ )
					callbacks[a]( el )
				
		})

	},

	addCallbackForSortEnd: function( fieldName, callback ) {

		if ( jQuery.isArray( fieldName ) )
			for ( var i = 0; i < fieldName.length; i++ )
				adgalleryCMB.addCallbackForSortEnd( fieldName[i], callback );
	
		this._sortEndCallbacks[fieldName] = this._sortEndCallbacks[fieldName] ? this._sortEndCallbacks[fieldName] : []
		this._sortEndCallbacks[fieldName].push( callback )
	
	}
	
}

jQuery(document).ready( function() {

	adgalleryCMB.init();

});
