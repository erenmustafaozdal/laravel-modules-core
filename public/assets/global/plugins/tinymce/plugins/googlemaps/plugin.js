/**
 * editor_plugin_src.js
 * 
 * This plugin allows users to insert Google Maps
 *
 * Author: Stephan Mueller
 * Link: http://www.stephanmueller.eu/tinymce-plugin-googlemaps
 * 
 * Copyright 2011
 * Released under GPL License.
 */

(function() {
	
    tinymce.PluginManager.requireLangPack('googlemaps');
    
	var Node = tinymce.html.Node;
	
    tinymce.create('tinymce.plugins.GooglemapsPlugin', 
    { 
    	init: function(ed, url)
	    {
    		var self = this;   		
	        this.editor = ed;
	        this.url = url;
	        JSON = tinymce.util.JSON;
	        
	        function isGoogleMapImg(node) {
				return  ed.selection.getNode().nodeName == "IMG" && ed.dom.hasClass(node, 'mceItemGoogleMap');
			};
	        
			ed.onPreInit.add(function() {				
				// Allow script and div elements
				ed.schema.addValidElements('script[id|charset|type|language|src],div[lang|dir|id|class|style|title]');
				
				// Convert googlemaps to image placeholder
				ed.parser.addNodeFilter('div', function(nodes) {
					var i = nodes.length;
					while (i--) {	
						node = nodes[i];
						if (node.attr('id') && node.attr('id').substring(0,17) == 'googleMapsMainDiv')
						{
							self.objectToImg(node, ed);
						}
					}
				});

				// Convert image placeholders to googlemaps
				ed.serializer.addNodeFilter('img', function(nodes, name, args) {
					var i = nodes.length, node;
					mapIndex = 0;
					while (i--) {
						node = nodes[i];
						if (node && node.attr('class') && node.attr('class').substring(0,16) == "mceItemGoogleMap")
						{
							self.imgToObject(node, args, mapIndex, ed);
							mapIndex++;
						}
					}
				});
			});
	
			// Register Commands
	        ed.addCommand('GoogleMaps', function() {
	        	ed.windowManager.open({ file: url + '/googlemaps.htm', width: 505 + parseInt(ed.getLang('googlemaps.delta_width', 0)), height: 485 + parseInt(ed.getLang('googlemaps.delta_height', 0)), inline: 1 }, { plugin_url: url, plugin_googleMaps_coordinates: ed.getParam("plugin_googleMaps_coordinates", "") });
	        });
	
	        // Register Buttons
	        ed.addButton('googlemaps', { title: 'googlemaps.desc', cmd: 'GoogleMaps', image: url + '/img/map.gif' });
	        
			// Update GoogleMap selection status
			ed.onNodeChange.add(function(ed, cm, node) {
				cm.setActive('googlemaps', isGoogleMapImg(node));
			});
			
	    }, 
	    
	    getInfo: function() {
	        return {
	        	longname: 'Google Maps (API 3)',
	        	author: 'Stephan M\u00fcller',
	        	authorurl: 'http://www.stephanmueller.eu/',
	        	infourl: 'http://stephanmueller.eu/tinymce-plugin-googlemaps',
	        	version: '1.0.0'
	        };
	    },

	    
	    /**
	     * Converts the JSON data object to an img element.
	     */
	    dataToHtml : function(data, ed) {
			code = '<img data-mce-src="' + ed.theme.url +'/img/trans.gif" src="' + ed.theme.url +'/img/trans.gif" class="mceItemGoogleMap mceItemVisualAid" style="display: block; border:1px dotted #cc0000; background-position:center; background-repeat:no-repeat; background-color:#ffffcc; background-image:url(' + this.url + '/img/map_logo.gif)"';
			code += 'data-mce-json="{' + "'coords':'" + data.coords + "', 'width':'" + data.width + "', 'height':'" + data.height + "', 'zoom':'" + data.zoom + "', 'showScale':'" + data.showScale + "', 'mapType':'" + data.mapType + "','controlStyle':'" + data.controlStyle + "','streetViewControl':'" + data.streetViewControl + "'}";
			code += '" width="' + data.width + '" height="' + data.height + '">';
			return code;
	    },
	    
	    /**
	     * Converts the JSON data object to an img node.
	     */
	    dataToImg : function(data, ed) {
		    img = new Node('img',1);
	    	img = img.attr({
	    		width : data.width,
	    		height : data.height,
				style : 'display: block; border:1px dotted #cc0000; background-position:center; background-repeat:no-repeat; background-color:#ffffcc; background-image:url(' + this.url + '/img/map_logo.gif)',
				src : ed.theme.url + '/img/trans.gif',
				'class' : 'mceItemGoogleMap mceItemVisualAid',
				'data-mce-json' : JSON.serialize(data, "'")
			});
			return img;
	    },
    
		/**
		 * Converts a tinymce.html.Node image element to Google Maps data.
		 */
		imgToObject : function(node, args, mapIndex) {

			var value, data, dataSerialized, script, scriptInclude, div, divPlaceholder;


			dataSerialized = node.attr('data-mce-json');

			if (!dataSerialized)
				return;
			
			data = JSON.parse(dataSerialized);

			width = parseInt(node.attr('width'));
			height = parseInt(node.attr('height'));
			
			if(width != NaN && width != data.width)
				data.width = width;
			
			if(height != NaN && height != data.height)
				data.height = height;
			
			// Add main div
			div = new Node('div', 1);
			div = div.attr('id', 'googleMapsMainDiv-' + mapIndex.toString());
			div.append(new Node('#cdata', 8)).value = 'data: ' + dataSerialized;	
			
			// Add javascript api for Google Maps
			scriptInclude = new Node('script', 1);
			scriptInclude = scriptInclude.attr('type', 'text/javascript');
			scriptInclude = scriptInclude.attr('src', 'http://maps.google.com/maps/api/js?sensor=false');
			div.append(scriptInclude);
			
			// Add javascript to initialize Google Maps
			script = new Node('script', 1);
			script = script.attr('type', 'text/javascript');		
			value = 'function initializeGoogleMaps_' + mapIndex.toString() + '() {' + "\n";
			value += '	myLatlng = new google.maps.LatLng(' + data.coords + ');' + "\n";
			value += '	myOptions = { zoom: ' + data.zoom + ', center: myLatlng, mapTypeId: google.maps.MapTypeId.' + data.mapType.toUpperCase() + ', zoomControlOptions: { style: google.maps.ZoomControlStyle.' + data.controlStyle.toUpperCase() + ' }, scaleControl: ' + data.showScale + ', streetViewControl: ' + data.streetViewControl + ' };' + "\n";
			value += '	map = new google.maps.Map(document.getElementById(\'googleMapsDiv-' + mapIndex.toString() + '\'), myOptions);' + "\n";
			value += '	marker = new google.maps.Marker({map: map,position: myLatlng, draggable: false });' + "\n";
			value += '}' + "\n";
			value += 'if(window.addEventListener) {';
			value += '	window.addEventListener("load", function () {initializeGoogleMaps_' + mapIndex.toString() + '()}, false);' + "\n";
			value += '}' + "\n";
			value += 'else if(window.attachEvent) {' + "\n";
			value += '	window.attachEvent("onload", function () {initializeGoogleMaps_' + mapIndex.toString() + '()})' + "\n";
			value += '}' + "\n";
		 		
			script.append(new Node('', 3)).value = value;
			div.append(script);
			
			// Add map placeholder
			divPlaceholder = new Node('div', 1);
			divPlaceholder = divPlaceholder.attr('id', 'googleMapsDiv-' + mapIndex.toString());
			divPlaceholder = divPlaceholder.attr('style', 'text-align:center;background:#EFEFEF;width: ' + data.width + 'px; height: ' + data.height + 'px;');	
			div.append(divPlaceholder);
			
			// Replace img node
			node.replace(div);			
		},

		/**
		 * Converts a tinymce.html.Node video/object/embed to an img element.
		 *
		 * The Google Maps data will be converted into an image placeholder with a JSON data attribute like this:
		 * <img class="mceItemVisualAid mceItemGoogleMap" width="100" height="100" data-mce-json="{..}" />
		 *
		 * The JSON structure will be like this:
		 * {'coords':'mycoords', 'width':'100', 'height':'100', 'zoom':'8', 'showScale':'false', 'mapType':'roadmap','controlStyle':'default','streetViewControl':'false'}
		 */
		objectToImg : function(node, ed) {
			rawData = node.firstChild.value;
			if(rawData.substring(0,7) == "data: {");
			data = JSON.parse(rawData.substring(6));			
			node.replace(this.dataToImg(data, ed));
		}
	
    }),
        
    // Register plugin
    tinymce.PluginManager.add('googlemaps', tinymce.plugins.GooglemapsPlugin);
})();

