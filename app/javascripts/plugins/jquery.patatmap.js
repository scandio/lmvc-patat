;(function ( $, window, document, undefined ) {
    var pluginName = "patatmap",
        defaults = {
            endpointUrl: location.origin + ':' + window.lmvcConfig.appPort + "/" + window.lmvcConfig.appDir + "/dishes/location/",
            draw: 'map'
        },
        cachedElemes= {};

    function Plugin ( element, options ) {
        this.element = element;
        this.$element = $(element);
        this.settings = $.extend( {}, defaults, options );
        this._defaults = defaults;
        this._name = pluginName;

        this.init();
    }

    Plugin.prototype = {
        init: function () {
            this.cacheElems();
            this.requestLocation();
        },
        cacheElems: function() {
            this.cachedElems = {
                map: undefined
            }
        },
        drawMap: function(destination) {
            var that = this;

            this.cachedElems.map = new GMaps({
                div: that.$element.attr('id'),
                lat: destination.latitude,
                lng: destination.longitude
            });

            GMaps.geolocate({
                success: function(position){
                    that.cachedElems.map.drawRoute({
                        origin: [position.coords.latitude, position.coords.longitude],
                        destination: [destination.latitude, destination.longitude],
                        travelMode: 'walking',
                        strokeColor: '#ED3B2F',
                        strokeOpacity: 0.8,
                        strokeWeight: 8
                    });
                    that.cachedElems.map.addMarkers([{
                        lat: position.coords.latitude,
                        lng: position.coords.longitude,
                        title: 'From',
                        infoWindow: {
                            content: '<h4>Hier bist du.</h4><p>Im Umkreis von </p>' + position.coords.accuracy + 'm' + '.'
                        }},{
                        lat: destination.latitude,
                        lng: destination.longitude,
                        title: 'To',
                        infoWindow: {
                            content: '<h4>' + destination.restaurant + '</h4><p>' + destination.street + '</p>'
                        }}
                    ]);
                }
            });
        },
        drawPanorama: function(destination) {
            var that = this;

            this.cachedElems.map = GMaps.createPanorama({
                el: '#'+that.$element.attr('id'),
                lat: destination.latitude,
                lng: destination.longitude
            });
        },
        requestLocation: function() {
            var that = this;

            $.ajax({
                url: that.settings.endpointUrl + that.$element.data('userid'),
                context: document.body,
                data: {
                    format: 'json'
                }
            }).done(function(destination) {
                if (that.settings.draw == 'map') { that.drawMap(destination); }
                else if(that.settings.draw == 'panorama') {that.drawPanorama(destination);}
            });
        }
    };

    $.fn[ pluginName ] = function ( options ) {
        return this.each(function() {
            if ( !$.data( this, "plugin_" + pluginName ) ) {
                $.data( this, "plugin_" + pluginName, new Plugin( this, options ) );
            }
        });
    };

})( jQuery, window, document );