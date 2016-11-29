var theMaps,LMCMaps={},LMCMapOptions={},Maps={src:null,window:"<h4>:title</h4><p><b>"+LMCApp.lang.admin.ops.latitude+" :</b> :latitude <br><b>"+LMCApp.lang.admin.ops.longitude+" :</b> :longitude</p>",init:function(t){return theMaps=this,t=$.extend(!0,this.getDefaultOptions(),t),t.src!=t.gmaps.div&&(t.gmaps.div=t.src),this.src=t.src,LMCMaps[this.src]=new GMaps(t.gmaps),LMCMapOptions[this.src]=t.gmaps,defaultLatitude&&defaultLongitude&&defaultZoom&&this.addMarker(defaultLatitude,defaultLongitude,defaultZoom,defaultMapTitle),t.isInit||$(t.tab).on("click",function(e){if(t.isInit)return!0;var a=LMCMaps[t.src],n=defaultLatitude?defaultLatitude:39,o=defaultLongitude?defaultLongitude:35,i=defaultZoom?defaultZoom:6;setTimeout(function(){a.refresh(),a.setCenter(n,o,function(){a.setZoom(i)})},500),t.isInit=!0}),this},removeMarkers:function(){var t=LMCMaps[this.src];return t.removeMarkers(),this},addMarker:function(t,e,a,n){var o,i=LMCMaps[this.src];i.setCenter(t,e),void 0!=a&&i.setZoom(a),n=this.getTitle(n),o=this.window.replace(/:title/g,n).replace(/:latitude/g,t).replace(/:longitude/g,e),this.removeMarkers();var r=i.addMarker({animation:google.maps.Animation.DROP,lat:t,lng:e,draggable:!0,infoWindow:{content:o}});return $('input[type="hidden"][name="latitude"]').val(t),$('input[type="hidden"][name="longitude"]').val(e),r.addListener("dragend",this.setMarkerPosition),this},getTitle:function(t){if(!t){var e=$('input[name="map_title"]').val(),a=$('input[name="name"]').val();t=""!=e?e:""!=a?a:"Konum"}return t},setMarkerPosition:function(t){theMaps.addMarker(t.latLng.lat(),t.latLng.lng())},getStaticMapUrl:function(t,e,a,n){var o={size:t,lat:e,lng:a,markers:[{lat:e,lng:a}],key:apiKey,center:e+","+a};return void 0!=n&&(o.zoom=n),GMaps.staticMapURL(o)},getGeoLocation:function(){var t=this;return GMaps.geolocate({success:function(e){var a=e.coords.latitude,n=e.coords.longitude;t.addMarker(a,n),LMCApp.getNoty({title:LMCApp.lang.admin.flash.geolocate_success.title,message:LMCApp.lang.admin.flash.geolocate_success.message,type:"success"})},error:function(t){LMCApp.getNoty({title:LMCApp.lang.admin.flash.geolocate_error.title,message:LMCApp.lang.admin.flash.geolocate_error.message,type:"error"})},not_supported:function(){LMCApp.getNoty({title:LMCApp.lang.admin.flash.geolocate_not_support_error.title,message:LMCApp.lang.admin.flash.geolocate_not_support_error.message,type:"error"})},always:function(){}}),this},setContextMenu:function(){var t=LMCMaps[this.src],e=this;return t.setContextMenu({control:"map",options:[{title:LMCApp.lang.admin.ops.add_marker,name:"add_marker",action:function(t){e.addMarker(t.latLng.lat(),t.latLng.lng(),8)}},{title:LMCApp.lang.admin.ops.center_here,name:"center_here",action:function(t){this.setCenter(t.latLng.lat(),t.latLng.lng())}}]}),this},addControl:function(){var t=LMCMaps[this.src];return t.addControl({position:"top_right",content:"Konumumu Al",style:{margin:"5px",padding:"1px 6px",border:"solid 1px #717B87",color:"#fff"},events:{click:function(){}}}),this},addSearch:function(){var t=this;Select2.init({src:"#search_location",select2:{minimumInputLength:5,placeholder:LMCApp.lang.admin.ops.search_location,query:function(t){GMaps.geocode({address:t.term,callback:function(e,a){var n={results:[]};"OK"==a?$.each(e,function(t,e){var a=e.geometry.location;n.results.push({id:a.lat()+"_"+a.lng(),text:e.formatted_address})}):n.results.push({id:"",text:"Adres bulunamadı"}),t.callback(n)}})}}}),$("#search_location").on("change",function(e){var a=$(this).val();if(""==a)return!1;a=a.split("_");var n=a[0],o=a[1];t.addMarker(n,o,8)})},getDefaultOptions:function(){return{src:"#map",tab:'a[href="#location"]',isInit:!1,gmaps:{div:"#map",lat:39,lng:35,zoom:6,mapType:"roadmap",width:"100%",height:"400px",key:apiKey,zoomControl:!0,zoomControlOptions:{position:google.maps.ControlPosition.TOP_LEFT},mapTypeControl:!0,mapTypeControlOptions:{style:google.maps.MapTypeControlStyle.DROPDOWN_MENU,position:google.maps.ControlPosition.TOP_LEFT},scaleControl:!1,streetViewControl:!1,rotateControl:!1,fullscreenControl:!0,fullscreenControlOptions:{position:google.maps.ControlPosition.BOTTOM_RIGHT},click:function(t){},zoom_changed:function(t){$('input[type="hidden"][name="zoom"]').val(t.zoom)}}}}};