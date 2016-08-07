tinyMCEPopup.requireLangPack();

var GoogleMaps = {

    init: function(ed) {
    	var dom = ed.dom, node = ed.selection.getNode(), JSON = tinymce.util.JSON;

		if(node.className && node.className.substring(0,16) == "mceItemGoogleMap")
		{

			dataSerialized = dom.getAttrib(node, 'data-mce-json');
			if (!dataSerialized)
				return;			
			data = JSON.parse(dataSerialized);	        
	        dialogInit(data, true);
		}
		else {
			initialCoords = tinyMCEPopup.getWindowArg("plugin_googleMaps_coordinates");
	        
	        // Coords if initialCoords are not correct
	        coordsForFailure = "48.6974744,8.1372328";
	        coords = initialCoords.split(",");
    		if(coords.lenght == 2) {
    			if(coords[0]==NaN || coords[1]==NaN) {
    				initialCoords = coordsForFailure;
    			}
    		}
    		else {
    			initialCoords = coordsForFailure;
    		}
    		dialogInit({coords: initialCoords}, false);
		}

    },

    insert: function() {

        var frm = document.forms[0];
       
        var coords = frm.coords.value;
        var width = frm.width.value;
        var height = frm.height.value;
        var zoom = frm.zoom.value;
        var showScale = frm.chkScale.checked;
        var mapType = frm.mapType.value;
        var controlStyle = frm.controlStyle.value;
        var streetViewControl = frm.chkStreetViewControl.checked;

        if (width == "")
            width = 450;

        if (height == "")
            height = 200;


        if (coords == "") {
            alert(tinyMCEPopup.getLang('googlemaps_dlg.missing_coords'));
        }
        else {
    	tinyMCEPopup.execCommand('mceInsertContent', false, tinyMCEPopup.editor.plugins.googlemaps.dataToHtml({
    		coords: coords,                
            width: width,
            height: height,
            zoom: zoom,
            showScale : showScale,
            mapType: mapType,
            controlStyle: controlStyle,
            streetViewControl: streetViewControl
        	}, tinyMCEPopup.editor));
    	tinyMCEPopup.close();
        }
    }
};
tinyMCEPopup.onInit.add(GoogleMaps.init, GoogleMaps);


