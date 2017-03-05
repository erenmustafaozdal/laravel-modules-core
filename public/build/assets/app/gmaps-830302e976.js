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

        // eğer varsayılan değerler varsa ekle
        if (defaultLatitude && defaultLongitude && defaultZoom) {
            this.addMarker(defaultLatitude,defaultLongitude,defaultZoom,defaultMapTitle);
        }

        if ( ! options.isInit ) {
            $(options.tab).on('click', function (e) {
                if (options.isInit) {
                    return true;
                }
                var map = LMCMaps[options.src];
                var lat = defaultLatitude ? defaultLatitude : 39;
                var lng = defaultLongitude ? defaultLongitude : 35;
                var zoom = defaultZoom ? defaultZoom : 6;
                setTimeout(function () {
                    map.refresh();
                    map.setCenter(lat, lng, function () {
                        map.setZoom(zoom);
                    });
                }, 500);
                options.isInit = true;
            });
        }
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

        title = this.getTitle(title);
        content = this.window.replace(/:title/g, title)
            .replace(/:latitude/g, lat)
            .replace(/:longitude/g, lng);

        this.removeMarkers();
        var marker = map.addMarker({
            animation: google.maps.Animation.DROP,
            lat: lat,
            lng: lng,
            draggable: true,
            infoWindow: {
                content: content
            }
        });
        $('input[type="hidden"][name="latitude"]').val(lat);
        $('input[type="hidden"][name="longitude"]').val(lng);
        marker.addListener('dragend', this.setMarkerPosition);
        return this;
    },

    /**
     * get the title
     *
     * @param title
     * @return string
     */
    getTitle: function(title)
    {
        if ( ! title) {
            var map_title = $('input[name="map_title"]').val();
            var name = $('input[name="name"]').val();
            title = map_title != '' ? map_title : (name != '' ? name : 'Konum');
        }
        return title;
    },

    /**
     * set the marker position to inputs
     */
    setMarkerPosition: function(e)
    {
        theMaps.addMarker(e.latLng.lat(),e.latLng.lng());
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
                Maps.addMarker(lat,lng);
                LMCApp.getNoty({
                    title: LMCApp.lang.admin.flash.geolocate_success.title,
                    message: LMCApp.lang.admin.flash.geolocate_success.message,
                    type: 'success'
                });
            },
            error: function (error) {
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
        var object = this;
        map.setContextMenu({
            control: 'map',
            options: [{
                title: LMCApp.lang.admin.ops.add_marker,
                name: 'add_marker',
                action: function(e) {
                    object.addMarker(e.latLng.lat(),e.latLng.lng(),8);
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
     * add search select2 box
     */
    addSearch: function()
    {
        var object = this;
        Select2.init({
            src: '#search_location',
            select2: {
                minimumInputLength: 5,
                placeholder: LMCApp.lang.admin.ops.search_location,
                query: function (query) {
                    GMaps.geocode({
                        address: query.term,
                        callback: function(results, status) {
                            var data = {results: []};
                            if (status == 'OK') {
                                $.each(results, function(index,value)
                                {
                                    var latlng = value.geometry.location;
                                    data.results.push({
                                        id: latlng.lat()+'_'+latlng.lng(),
                                        text: value.formatted_address
                                    });
                                });
                            } else {
                                data.results.push({
                                    id: '',
                                    text: 'Adres bulunamadı'
                                });
                            }

                            query.callback(data);
                        }
                    });
                }
            }
        });
        $('#search_location').on('change', function(e) {
            var value = $(this).val();

            // eğer değer boş ise döndürülür
            if (value=='') {
                return false;
            }
            value = value.split('_');
            var lat = value[0];
            var lng = value[1];

            object.addMarker(lat,lng,8);
        });
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
            tab: 'a[href="#location"]',
            isInit: false,
            gmaps: {
                div: '#map',
                lat: 39,
                lng: 35,
                zoom: 6,
                mapType: 'roadmap', // roadmap (default), satellite, hybrid and terrain
                width: '100%',
                height: '400px',
                key: apiKey,
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
                zoom_changed: function(e)
                {
                    $('input[type="hidden"][name="zoom"]').val(e.zoom);
                }
            }
        };
    }

};