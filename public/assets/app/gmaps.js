;var theMaps;
var LMCMaps = {};
var LMCMapOptions= {};
var Maps = {

    /**
     * element src
     * @var string
     */
    src: null,

    /**
     * map window template
     * @var string
     */
    window: '<h4>:title</h4>' +
    '<p>' +
    '<b>' + LMCApp.lang.admin.ops.latitude + ' :</b> :latitude <br>' +
    '<b>' + LMCApp.lang.admin.ops.longitude + ' :</b> :longitude' +
    '</p>',

    /**
     * init function
     *
     * @param options
     */
    init: function(options)
    {
        theMaps = this;
        options = $.extend(true, this.getDefaultOptions(), options);

        // eğer src gmaps divden farklı ise değiştir
        if (options.src != options.gmaps.div) {
            options.gmaps['div'] = options.src;
        }
        this.src = options.src;

        LMCMaps[this.src] = new GMaps(options.gmaps);
        LMCMapOptions[this.src] = options.gmaps;
        return this;
    },

    /**
     * remove all markers
     *
     */
    removeMarkers: function()
    {
        var map = LMCMaps[this.src];
        map.removeMarkers();
        return this;
    },

    /**
     * add marker to the map
     *
     * @param lat
     * @param lng
     * @param zoom
     * @param title
     */
    addMarker: function(lat, lng, zoom, title)
    {
        var content,
            map = LMCMaps[this.src];
        map.setCenter(lat,lng);
        if(zoom != undefined) {
            map.setZoom(zoom);
        }
        title = title != undefined ? title : 'Konum';
        content = this.window.replace(/:title/g, title)
            .replace(/:latitude/g, lat)
            .replace(/:longitude/g, lng);

        map.addMarker({
            lat: lat,
            lng: lng,
            draggable: true,
            infoWindow: {
                content: content
            }
        });
        return this;
    },

    /**
     * get static map url
     *
     * @param size array [width,height]
     * @param lat
     * @param lng
     * @param zoom
     * @return string [$('<img/>').attr('src', url).appendTo('#map');]
     */
    getStaticMapUrl: function(size, lat, lng, zoom)
    {
        var options = {
            size: size,
            lat: lat,
            lng: lng,
            markers: [
                {
                    size: 'normal',
                    color: markerColor,
                    lat: lat,
                    lng: lng
                }
            ],
            key: apiKey,
            center: lat + ',' + lng
        };
        if (zoom != undefined) {
            options.zoom = zoom;
        }
        return GMaps.staticMapURL(options);
    },

    /**
     * get geo location
     *
     */
    getGeoLocation: function()
    {
        var Maps = this;
        GMaps.geolocate({
            success: function (position) {
                var lat = position.coords.latitude;
                var lng = position.coords.longitude;
                console.log(lat);
                console.log(lng);
                Maps.addMarker(lat,lng);
                LMCApp.getNoty({
                    title: LMCApp.lang.admin.flash.geolocate_success.title,
                    message: LMCApp.lang.admin.flash.geolocate_success.message,
                    type: 'success'
                });
            },
            error: function (error) {
                console.log(error);
                LMCApp.getNoty({
                    title: LMCApp.lang.admin.flash.geolocate_error.title,
                    message: LMCApp.lang.admin.flash.geolocate_error.message,
                    type: 'error'
                });
            },
            not_supported: function () {
                LMCApp.getNoty({
                    title: LMCApp.lang.admin.flash.geolocate_not_support_error.title,
                    message: LMCApp.lang.admin.flash.geolocate_not_support_error.message,
                    type: 'error'
                });
            },
            always: function () {
                //
            }
        });
        return this;
    },

    /**
     * set context menu on the map
     *
     */
    setContextMenu: function()
    {
        var map = LMCMaps[this.src];
        map.setContextMenu({
            control: 'map',
            options: [{
                title: LMCApp.lang.admin.ops.add_marker,
                name: 'add_marker',
                action: function(e) {
                    this.addMarker({
                        lat: e.latLng.lat(),
                        lng: e.latLng.lng()
                    });
                }
            }, {
                title: LMCApp.lang.admin.ops.center_here,
                name: 'center_here',
                action: function(e) {
                    this.setCenter(e.latLng.lat(), e.latLng.lng());
                }
            }]
        });
        return this;
    },

    /**
     * add control to the map
     *
     */
    addControl: function()
    {
        var map = LMCMaps[this.src];
        map.addControl({
            position: 'top_right',
            content: 'Konumumu Al',
            style: {
                margin: '5px',
                padding: '1px 6px',
                border: 'solid 1px #717B87',
                background: markerColor,
                color: '#fff'
            },
            events: {
                click: function(){
                    //
                }
            }
        });
        return this;
    },

    /**
     * get default options
     *
     * @returns object
     */
    getDefaultOptions: function()
    {
        return {
            src: '#map',
            gmaps: {
                div: '#map',
                lat: 39,
                lng: 35,
                zoom: 6,
                mapType: 'roadmap', // roadmap (default), satellite, hybrid and terrain
                width: '100%',
                height: '400px',
                zoomControl: true,
                zoomControlOptions: {
                    position: google.maps.ControlPosition.TOP_LEFT
                },
                mapTypeControl: true,
                mapTypeControlOptions: {
                    style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
                    position: google.maps.ControlPosition.TOP_LEFT
                },
                scaleControl: false,
                streetViewControl: false,
                rotateControl: false,
                fullscreenControl: true,
                fullscreenControlOptions: {
                    position: google.maps.ControlPosition.BOTTOM_RIGHT
                },
                click: function(e)
                {
                    //
                },
                dragend: function(e)
                {
                    //
                },
                zoom_changed: function(e)
                {
                    //console.log(this.getZoom());
                }
            }
        };
    }

};