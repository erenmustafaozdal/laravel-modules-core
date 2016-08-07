Copyright: Stephan Müller
License: GPL
(c)2011 All rights reserved.

Version: 1.0.0

-------------------------------------------------------------------------
Information
-------------------------------------------------------------------------

With this plugin you can insert Google Maps.
It is possible to insert as many maps as you like.
You can also edit your maps.

-------------------------------------------------------------------------
Installation
-------------------------------------------------------------------------

   1. Copy the folder "googlemaps" from this archive to the plugin folder of tinyMCE.
   2. Add the plugin to tinyMCE:

	tinyMCE.init({ 
		... 
		plugins : "googlemaps", 
		theme_advanced_buttons3_add : "googlemaps",
	
	});	
	
-------------------------------------------------------------------------
Parameters
-------------------------------------------------------------------------

Name: plugin_googleMaps_coordinates
Description: The initial coordinates the plugin dialog will show.
Type: string
required: no
Default value: "47.9971865,7.8537668"