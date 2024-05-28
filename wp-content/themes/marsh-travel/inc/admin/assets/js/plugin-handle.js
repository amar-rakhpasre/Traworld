/**
 * Get Started button on dashboard notice.
 *
 * @package Marsh Travel
 */

jQuery(document).ready(function($) {
    var WpAjaxurl       = ogAdminObject.ajax_url;
    var _wpnonce        = ogAdminObject._wpnonce;
    var buttonStatus    = ogAdminObject.buttonStatus;

    /**
     * Popup on click demo import if creativ demo importer plugin is not activated.
     */
    if( buttonStatus === 'disable' ) $( '.marsh-travel-demo-import' ).addClass( 'disabled' );

    switch( buttonStatus ) {
        case 'activate' :
            $( '.marsh-travel-get-started' ).on( 'click', function() {
                var _this = $( this );
                marsh_travel_do_plugin( 'marsh_travel_activate_plugin', _this );
            });
            $( '.marsh-travel-activate-demo-import-plugin' ).on( 'click', function() {
                var _this = $( this );
                marsh_travel_do_plugin( 'marsh_travel_activate_plugin', _this );
            });
            break;
        case 'install' :
            $( '.marsh-travel-get-started' ).on( 'click', function() {
                var _this = $( this );
                marsh_travel_do_plugin( 'marsh_travel_install_plugin', _this );
            });
            $( '.marsh-travel-install-demo-import-plugin' ).on( 'click', function() {
                var _this = $( this );
                marsh_travel_do_plugin( 'marsh_travel_install_plugin', _this );
            });
            break;
        case 'redirect' :
            $( '.marsh-travel-get-started' ).on( 'click', function() {
                var _this = $( this );
                location.href = _this.data( 'redirect' );
            });
            break;
    }
    
    marsh_travel_do_plugin = function ( ajax_action, _this ) {
        $.ajax({
            method : "POST",
            url : WpAjaxurl,
            data : ({
                'action' : ajax_action,
                '_wpnonce' : _wpnonce
            }),
            beforeSend: function() {
                var loadingTxt = _this.data( 'process' );
                _this.addClass( 'updating-message' ).text( loadingTxt );
            },
            success: function( response ) {
                if( response.success ) {
                    var loadedTxt = _this.data( 'done' );
                    _this.removeClass( 'updating-message' ).text( loadedTxt );
                }
                location.href = _this.data( 'redirect' );
            }
        });
    }

    $('.mt-action-btn').click(function(){
        var _this = $(this), actionBtnStatus = _this.data('status'), pluginSlug = _this.data('slug');
        console.log(actionBtnStatus);
        switch(actionBtnStatus){
            case 'install':
                marsh_travel_do_free_plugin( 'marsh_travel_install_free_plugin', pluginSlug, _this );
                break;

            case 'active':
                marsh_travel_do_free_plugin( 'marsh_travel_activate_free_plugin', pluginSlug, _this );
                break;
        }

    });

    marsh_travel_do_free_plugin = function ( ajax_action, pluginSlug, _this ) {
        $.ajax({
            method : "POST",
            url : WpAjaxurl,
            data : ({
                'action' : ajax_action,
                'plugin_slug': pluginSlug,
                '_wpnonce' : _wpnonce
            }),
            beforeSend: function() {
                var loadingTxt = _this.data( 'process' );
                _this.addClass( 'updating-message' ).text( loadingTxt );
            },
            success: function( response ) {
                if( response.success ) {
                    var loadedTxt = _this.data( 'done' );
                    _this.removeClass( 'updating-message' ).text( loadedTxt );
                }
                location.href = _this.data( 'redirect' );
            }
        });
    }

});