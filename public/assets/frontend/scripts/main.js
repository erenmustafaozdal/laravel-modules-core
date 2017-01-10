"use strict";function formStylization(){var e='input[type="radio"]',t='input[type="checkbox"]';$(e).wrap('<div class="new-radio"></div>'),$(".new-radio").append("<span></span>"),$(t).wrap('<div class="new-checkbox"></div>'),$(".new-checkbox").append('<svg x="0" y="0" width="15px" height="15px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve"><polygon fill="#1e1e1e" points="9.298,13.391 4.18,9.237 3,10.079 9.297,17 17.999,4.678 16.324,3 "/></svg>'),$(t+":checked").parent(".new-checkbox").addClass("checked"),$(e+":checked").parent(".new-radio").addClass("checked"),$(t+":disabled").parent().addClass("disabled"),$(e+":disabled").parent().addClass("disabled"),$("html").on("click",function(){$(e).parent(".new-radio").removeClass("checked"),$(e+":checked").parent(".new-radio").addClass("checked"),$(t).parent(".new-checkbox").removeClass("checked"),$(t+":checked").parent(".new-checkbox").addClass("checked"),$(e).parent().removeClass("disabled"),$(t).parent().removeClass("disabled"),$(e+":disabled").parent().addClass("disabled"),$(t+":disabled").parent().addClass("disabled")}),$.fn.selectBox&&$('select:not(".without-styles")').selectBox()}function fullWidthBox(){if($(".full-width-box.auto-width").length){var e=$("body").outerWidth(),t=$(".header .container").width();$(".full-width-box.auto-width").each(function(){$(this).css({left:(t-e)/2,width:e}).addClass("loaded")})}}function animations(){$("[data-appear-animation]").each(function(){var e=$(this);!$("body").hasClass("no-csstransitions")&&$("body").width()+scrollWidth>767&&e.appear(function(){var t=e.data("appearAnimationDelay")?e.data("appearAnimationDelay"):1;t>1&&e.css("animation-delay",t+"ms"),e.addClass("animated").addClass(e.data("appearAnimation"))})}),$("[data-appear-progress-animation]").each(function(){var e=$(this);e.appear(function(){var t=e.attr("data-appear-animation-delay")?e.attr("data-appear-animation-delay"):1;t>1&&e.css("animation-delay",t+"ms"),e.find(".progress-bar").addClass(e.attr("data-appear-animation")),setTimeout(function(){e.find(".progress-bar").animate({width:e.attr("data-appear-progress-animation")},500,"easeInCirc",function(){e.find(".progress-bar").animate({textIndent:10},1500,"easeOutBounce")})},t)},{accX:0,accY:-50})})}function headerCustomizer(){var e=$("body"),t=0,a=0,o=0,i=$(".fixed-header");$("#top-box").length&&(t=$("#top-box").outerHeight()),a=$(".header").outerHeight(),isTouchDevice||(o=t,e.hasClass("hidden-top")&&(o=8),e.hasClass("padding-top")?o=t+420:e.hasClass("boxed")&&(o=t+20,e.hasClass("fixed-header")&&e.hasClass("fixed-top")&&(o=20)),$(window).scroll(function(){var t=$(this);e.hasClass("fixed-header")&&(t.scrollTop()>=o?e.addClass("fixed"):e.removeClass("fixed")),t.scrollTop()>=a?i.addClass("background-opacity"):i.removeClass("background-opacity")}),$(".hidden-top .header, .hidden-top #top-box").not(".boxed .header, .boxed #top-box").hover(function(){$(".hidden-top").addClass("visible-top")},function(){$(".hidden-top").removeClass("visible-top")}),$(window).scroll(function(){var t=$(this);e.hasClass("visible-top")&&t.scrollTop()>0&&e.removeClass("visible-top")})),$(window).scroll(function(){$(this).scrollTop()>=t+a?$(".top-fixed-box").addClass("fixed"):$(".top-fixed-box").removeClass("fixed")})}function menu(){var e=$("body"),t=".primary";$(t).find(".parent > a .open-sub, .megamenu .title .open-sub").remove(),e.width()+scrollWidth<992||$(".header").hasClass("minimized-menu")?$(t).find(".parent > a, .megamenu .title").append('<span class="open-sub"><span></span><span></span></span>'):$(t).find("ul").removeAttr("style").find("li").removeClass("active"),$(t).find(".open-sub").click(function(a){a.preventDefault();var o=$(this).closest("li, .box");if($(o).hasClass("active"))$(o).children().last().slideUp(600),$(o).removeClass("active");else{var i=$(this).closest("li, .box").parent("ul, .sub-list").children("li, .box");if($(i).is(".active")&&$(i).removeClass("active").children("ul").slideUp(600),$(o).children().last().slideDown(600),$(o).addClass("active"),e.width()+scrollWidth>991){var n=e.height()-$(t).find(".navbar-nav").offset().top-20;$(t).find(".navbar-nav").css({maxHeight:n,overflow:"auto"})}}}),$(t).find(".parent > a").click(function(t){if(e.width()+scrollWidth>991&&isTouchDevice){var a=$(this);a.parent().hasClass("open")?a.parent().removeClass("open"):(t.preventDefault(),a.parent().addClass("open"))}}),e.on("click",function(e){$(e.target).is(t+" *")||$(t+" .collapse").hasClass("in")&&($(t+" .navbar-toggle").addClass("collapsed"),$(t+" .navbar-collapse").collapse("hide"))});var a=$(".top-navbar").find(".collapse");e.width()+scrollWidth<992?a.css("width",e.find("#top-box .container").width()):a.css("width","auto")}function accordions(){$(".multi-collapse .collapse").collapse({toggle:!1}),$('.panel a[data-toggle="collapse"]').click(function(e){e.preventDefault(),$(this).closest(".panel").hasClass("active")&&$(this).closest(".panel-group").hasClass("one-open")&&e.stopPropagation()}),$(".collapse").on("hide.bs.collapse",function(e){e.stopPropagation(),$(this).closest(".panel").removeClass("active")}),$(".collapse").on("show.bs.collapse",function(){$(this).closest(".panel").addClass("active")}),$(".collapse.in").closest(".panel").addClass("active")}function tabs(){var e=$(".nav-tabs");e.find("a").click(function(e){e.preventDefault(),$(this).tab("show")}),$("body").width()+scrollWidth<768&&!e.hasClass("no-responsive")?(e.each(function(){var e=$(this);e.next(".tab-content").hasClass("hidden")||e.find("li").hasClass("dropdown")||(e.addClass("accordion-tab"),e.find("a").each(function(){var e=$(this),t=e.attr("href");e.prepend('<span class="open-sub"></span>'),e.closest(".nav-tabs").next(".tab-content").find(t).appendTo(e.closest("li"))}),e.next(".tab-content").addClass("hidden"))}),$(".accordion-tab > li.active .tab-pane").slideDown()):(e.find(".tab-pane").removeAttr("style","display"),e.each(function(){var e=$(this);e.next(".tab-content").hasClass("hidden")&&(e.removeClass("accordion-tab"),e.find("a").each(function(){var e=$(this);e.attr("href");$(e.closest("li").find(".tab-pane")).appendTo(e.closest(".nav-tabs").next(".tab-content"))}),e.next(".tab-content").removeClass("hidden"))})),$(".accordion-tab > li > a").on("shown.bs.tab",function(e){if($("body").width()+scrollWidth<768){var t=$(this),a=t.closest("li");e.preventDefault(),t.closest(".accordion-tab").find(".tab-pane").not(a.find(".tab-pane")).removeClass("active").slideUp(),a.find(".tab-pane").addClass("active").slideDown(),$("html, body").on("scroll mousedown DOMMouseScroll mousewheel keyup",function(){$("html, body").stop()}),setTimeout(function(){$("html, body").animate({scrollTop:t.offset().top},800)},500)}})}function footerStructure(){var e=$("#footer .footer-bottom");$("body").width()+scrollWidth<768?e.find(".new-copyright").length||(e.find(".address").after('<div class="new-copyright"></div>'),e.find(".copyright").appendTo("#footer .footer-bottom .new-copyright")):e.find(".new-copyright").length&&(e.find(".copyright").prependTo("#footer .footer-bottom .row"),e.find(".new-copyright").remove())}function modernGallery(){if($.fn.imagesLoaded){var e=$("#gallery-modern");e.imagesLoaded(function(){e.masonry({itemSelector:".images-box",columnWidth:".grid-sizer",percentPosition:!0})})}}function addReview(){$('a[href="#reviews"].add-review').click(function(){$('.product-tab a[href="#reviews"]').trigger("click"),$("html, body").animate({scrollTop:$("#reviews").offset().top},1e3)})}function paralax(){var e=$(window),t=2;$(".fwb-paralax").each(function(){function a(){var a=o.offset().top,i=e.scrollTop();a>i?o.css({backgroundPosition:"50% "+(a-i)/t+"px"}):o.css({backgroundPosition:"50% "+-(i-a)/t+"px"})}var o=$(this);o.data("speed")&&(t=o.data("speed")),a(),e.on("scroll",a)})}function videoBg(){if($.fn.tubular){var e,t,a,o=$(".fwb-youtube-video");void 0!==o.attr("data-youtube-videoId")&&o.attr("data-youtube-videoId")!==!1&&(e=o.attr("data-youtube-videoId")),void 0!==o.attr("data-youtube-poster")&&o.attr("data-youtube-poster")!==!1&&(a=o.attr("data-youtube-poster")),t={videoId:e,start:0,wrapperZIndex:-1,mute:!0,width:$("body").width()},isTouchDevice?o.css("background-image","url('"+a+"')"):o.tubular(t)}}function loginRegister(){if($.fn.isotope){var e=$(".login-register"),t=e.find(".filter-elements"),a=e.find(".filter-buttons"),o=e.find(".filter-buttons.active-form").attr("data-filter");t.removeClass("hidden"),t.isotope({filter:o,layoutMode:"fitRows"}),a.click(function(e){var o=$(this).attr("data-filter");e.preventDefault(),$(this).hasClass("active-form")||(a.removeClass("active-form"),$(this).addClass("active-form"),t.isotope({filter:o,layoutMode:"fitRows"}))})}var i=0,n=$(".form-content");n.each(function(){$(this).outerHeight()>i&&(i=$(this).outerHeight())}),n.css("height",i),$(".switch-form").click(function(e){var t=$(this);e.preventDefault(),t.hasClass("forgot")?($(".form-content").removeClass("hidden"),$(".register-form").closest(".form-content").addClass("hidden")):t.hasClass("sing-up")&&($(".form-content").removeClass("hidden"),$(".forgot-form").closest(".form-content").addClass("hidden")),$(".login-register .rotation").toggleClass("hover")})}function loadingButton(){var e=function(){$(".ladda-button.progress-button").length&&(Ladda.bind(".ladda-button:not(.progress-button)",{timeout:2e3}),Ladda.bind(".ladda-button.progress-button",{callback:function(e){var t,a=0;return t=setInterval(function(){return a=Math.min(a+.1*Math.random(),1),e.setProgress(a),1===a?(e.stop(),clearInterval(t)):void 0},200)}}))};if(/MSIE (\d+\.\d+);/.test(navigator.userAgent)){var t=new Number(RegExp.$1);t>=9&&e()}else e()}function productLimited(){if($(".product .limit-offer").length){var e=$(".product .limit-offer"),t="";e.each(function(){var e=$(this);t=void 0!==e.attr("data-end")&&e.attr("data-end")!==!1?e.attr("data-end"):"",e.county({endDateTime:new Date(t),animation:"scroll",reflection:!1})})}}function wordRotate(){$(".word-rotate").each(function(){var e=$(this),t=e.find(".words-box"),a=t.find("> span"),o=a.eq(0),i=o.clone(),n=o.height(),r=1,s=0;t.append(i),e.height(n).addClass("loaded"),setInterval(function(){s=r*n,t.animate({top:-s+"px"},300,"easeOutQuad",function(){r++,r>a.length&&(t.css("top",0),r=1)})},2e3)})}function centerModal(){$(this).css("display","block");var e=$(this).find(".modal-dialog"),t=($(window).height()-e.height())/2;10>t&&(t=10),e.css("margin-top",t)}function locationSocialFeed(){var e=$(".social-feed");$.fn.isotope&&(e.isotope({itemSelector:".isotope-item"}).addClass("loaded"),$("#load-more").click(function(){var t,a,o,i,n;i=e.find(".item-clone"),t=$(i[Math.floor(Math.random()*i.length)]).clone(),a=$(i[Math.floor(Math.random()*i.length)]).clone(),o=$(i[Math.floor(Math.random()*i.length)]).clone(),n=$().add(t).add(a).add(o);var r=n.find("img");r.imagesLoaded(function(){return e.isotope("insert",n)})}))}function fullHeightPages(){var e=$(".full-height");e.removeClass("scroll"),e.height()<$(".page-box").outerHeight()?e.addClass("scroll"):e.removeClass("scroll")}function initialize(){var e=$(".map-canvas");e.each(function(){var e=$(this),t=15,a=-74,o=150,i=!1,n=!0,r=google.maps.MapTypeId.ROADMAP,s="",l="";e.data("zoom")&&(t=parseFloat(e.data("zoom"))),e.data("lat")&&(a=e.data("lat").split("###")),e.data("lng")&&(o=e.data("lng").split("###")),e.data("scrollwheel")&&(i=e.data("scrollwheel")),e.data("type")&&("satellite"==e.data("type")?r=google.maps.MapTypeId.SATELLITE:"hybrid"==e.data("type")?r=google.maps.MapTypeId.HYBRID:"terrain"==e.data("type")&&(r=google.maps.MapTypeId.TERRAIN)),e.data("title")&&(s=e.data("title").split("###")),isTouchDevice&&(n=!1);var d={zoom:t,scrollwheel:i,draggable:n,center:new google.maps.LatLng(a[0],o[0]),mapTypeId:r},c=new google.maps.Map(e[0],d),p=new google.maps.LatLngBounds,h=navigator.userAgent.toLowerCase().indexOf("trident")>-1,u=h?"/vendor/laravel-modules-core/assets/frontend/img/map-marker.png":"/vendor/laravel-modules-core/assets/frontend/img/svg/map-marker.svg";if($.each(a,function(e,t){if(""!=t){l='<div class="map-content"><h3 class="title">'+s[e]+"</h3><p><b>Enlem :</b> "+a[e]+"<br><b>Boylam :</b> "+o[e]+"<br></p></div>";var i=new google.maps.InfoWindow({content:l}),n=new google.maps.Marker({position:new google.maps.LatLng(a[e],o[e]),map:c,icon:u,title:s[e]});p.extend(n.position),google.maps.event.addListener(n,"click",function(){i.open(c,n)})}}),a.length>2&&(c.setCenter(p.getCenter()),c.fitBounds(p)),e.data("hue")){var f=[{stylers:[{hue:e.data("hue")}]}];c.setOptions({styles:f})}})}function loadScript(){var e=document.createElement("script");e.type="text/javascript",e.src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&callback=initialize&key=AIzaSyCjEWf270WVlOolKfwRe71Iq_G5UWmBnok",document.body.appendChild(e)}function openItem(e){e.addClass("active"),e.stop().children(".slid-content").animate("opacity",1)}function progressiveSlider(){var e=$(".progressive-slider"),t=function(){return{auto:{play:!0,timeoutDuration:4e3},items:{visible:1},responsive:!0,scroll:{duration:1e3,pauseOnHover:!0}}};e.each(function(){var e=$(this),a=e.closest(".slider"),o=new t;switch(e.data("animationDuration")&&(o.scroll.duration=e.data("animationDuration")),e.data("autoplayDisable")?o.auto=!1:e.data("autoplaySpeed")&&(o.auto.timeoutDuration=e.data("autoplaySpeed")),!0){case e.hasClass("progressive-slider-two"):o.pagination=a.find(".pagination"),o.onCreate=function(t){e.find(".slider-wrapper").css("height",t.height)};break;case e.hasClass("progressive-slider-three"):o.scroll.fx="crossfade",o.scroll.pauseOnHover=!0;break;case e.hasClass("progressive-slider-four"):o.next=a.find(".next"),o.prev=a.find(".prev");break;default:o.scroll.fx="crossfade",o.scroll.onBefore=function(e){e.items.old.stop().children(".slid-content").animate({opacity:0})},o.scroll.onAfter=function(e){openItem(e.items.visible)},o.next=a.find(".next"),o.prev=a.find(".prev"),o.pagination=a.find(".pagination"),o.onCreate=function(e){openItem(e.items)}}e.find(".sliders-box").carouFredSel(o).parents(".slider").removeClass("load").touchwipe({wipeLeft:function(){$(this).trigger("next",1)},wipeRight:function(){$(this).trigger("prev",1)},preventDefaultEvents:!1})})}function bannerSetCarousel(){$(".banner-set .banners").each(function(){var e,t=$(this),a=t.closest(".banner-set"),o=a.find(".prev"),i=a.find(".next"),n=!0,r=2e3,s=1e3;a.data("animationDuration")&&(s=a.data("animationDuration")),a.data("autoplayDisable")?n=!1:a.data("autoplaySpeed")&&(r=a.data("autoplaySpeed")),t.carouFredSel({auto:{play:n,timeoutDuration:r},width:"100%",responsive:!1,infinite:!1,next:i,prev:o,pagination:a.find(".pagination"),scroll:{duration:s,items:1,pauseOnHover:!0},onCreate:function(){e=t.height(),t.find(".banner").css("height",e),a.hasClass("banner-set-mini")&&a.hasClass("banner-set-no-pagination")&&a.find(".prev, .next").css("margin-top",-(e/2+7))}}).touchwipe({wipeLeft:function(){t.trigger("next",1)},wipeRight:function(){t.trigger("prev",1)},preventDefaultEvents:!1}).parents(".banner-set").removeClass("load")})}function carousel(){if($(".carousel-box .carousel").length){var e=$(".carousel-box .carousel");e.each(function(){var e,t,a,o=$(this),i=o.closest(".carousel-box"),n=!1,r=!0,s=700,l=1e3;i.data("animationDuration")&&(l=i.data("animationDuration")),i.data("autoplayDisable")?r=!1:i.data("autoplaySpeed")&&(s=i.data("autoplaySpeed")),0!=i.data("carouselNav")?(t=i.find(".next"),e=i.find(".prev"),i.removeClass("no-nav")):(t=!1,e=!1,i.addClass("no-nav")),i.data("carouselPagination")?(a=i.find(".pagination"),i.removeClass("no-pagination")):(a=!1,i.addClass("no-pagination")),i.data("carouselOne")&&(n=!0),o.carouFredSel({onCreate:function(){$(window).on("resize",function(e){e.stopPropagation()})},scroll:{duration:l,items:1,pauseOnHover:!0},auto:{play:r,timeoutDuration:s},width:"100%",infinite:!1,next:t,prev:e,pagination:a,responsive:n}).touchwipe({wipeLeft:function(){o.trigger("next",1)},wipeRight:function(){o.trigger("prev",1)},preventDefaultEvents:!1}).parents(".carousel-box").removeClass("load")})}}function thumblist(){var e=$("#thumblist");e.length&&e.carouFredSel({prev:".thumblist-box .prev",next:".thumblist-box .next",width:"100%",auto:!1}).parents(".thumblist-box").removeClass("load").touchwipe({wipeLeft:function(){e.trigger("next",1)},wipeRight:function(){e.trigger("prev",1)},preventDefaultEvents:!1})}function isotopFilter(){$(".portfolio, .filter-box").each(function(){var e=$(this),t=e.find(".filter-elements"),a=e.find(".filter-buttons"),o=e.find(".filter-buttons .active").attr("data-filter");e.hasClass("accordions-filter")||(t.isotope({filter:o,layoutMode:"fitRows"}),a.find(".dropdown-toggle").html(e.find(".filter-buttons .active").text()+'<span class="caret"></span>')),a.find("a").on("click",function(o){var i=$(this).attr("data-filter");o.preventDefault(),$(this).hasClass("active")||(a.find("a").removeClass("active"),$(this).addClass("active"),a.find(".dropdown-toggle").html($(this).text()+'<span class="caret"></span>'),e.hasClass("accordions-filter")?(t.children().not(i).animate({height:0}).addClass("e-hidden"),t.children(i).animate({height:"100%"}).removeClass("e-hidden")):t.isotope({filter:i,layoutMode:"fitRows"}))})})}function chart(){$(".chart").each(function(){var e=$(this),t=[],a="line",o="100%",i="225",n="#e1e1e1",r="rgba(0, 0, 0, .05)",s="#a9a8a8",l="#c6c6c6",d="#727070",c="#e1e1e1",p="#1e1e1e",h=2,u=8,f=18,v="rgba(0, 0, 0, .2)",g=0,m=[],b=[],y=["#d3dafe","#a8b6ff","#7f94ff"],C="#c6c6c6",w="#727070",x="#a9a8a8",k="#575656",S=5,D="#1e1e1e";e.data("line")&&(t=e.data("line").split(/,/)),e.data("height")&&(i=e.data("height")),e.data("lineWidth")&&(h=e.data("lineWidth")),e.data("lineColor")&&(n=e.data("lineColor")),e.data("verticalLineColor")&&(c=e.data("verticalLineColor")),e.data("spotColorHovered")&&(p=e.data("spotColorHovered")),e.data("spotColor")&&(s=e.data("spotColor")),e.data("minSpotColor")&&(l=e.data("minSpotColor")),e.data("maxSpotColor")&&(d=e.data("maxSpotColor")),e.data("barSpacing")&&(u=e.data("barSpacing")),e.data("barWidth")&&(f=e.data("barWidth")),e.data("barColor")&&(v=e.data("barColor")),e.data("colorMap")&&(b=e.data("data-color-map").split(/, /)),e.data("offset")&&(g=e.data("offset")),e.data("sliceColors")&&(m=e.data("sliceColors").split(/, /)),e.data("rangeColors")&&(y=e.data("rangeColors").split(/, /)),e.data("targetWidth")&&(S=e.data("targetWidth")),e.data("posBarColor")&&(C=e.data("posBarColor")),e.data("negBarColor")&&(w=e.data("negBarColor")),e.data("performanceColord")&&(k=e.data("performanceColor")),e.data("fillColor")&&(r=e.data("fillColor")),"bar"==e.data("type")?a="bar":"pie"==e.data("type")?(a="pie",o="auto"):"discrete"==e.data("type")?a="discrete":"tristate"==e.data("type")?a="tristate":"bullet"==e.data("type")?a="bullet":"box"==e.data("type")&&(a="box"),e.sparkline(t,{type:a,width:o,height:i,lineColor:n,fillColor:r,lineWidth:h,spotColor:s,minSpotColor:l,maxSpotColor:d,highlightSpotColor:p,highlightLineColor:c,spotRadius:6,chartRangeMin:0,barSpacing:u,barWidth:f,barColor:v,offset:g,sliceColors:m,colorMap:b,posBarColor:C,negBarColor:w,zeroBarColor:x,rangeColors:y,performanceColor:k,targetWidth:S,targetColor:D})})}function graph(e){var t;return e&&$(".graph").html(""),t=[{period:"2011 Q3",licensed:3407,sorned:660},{period:"2011 Q2",licensed:3351,sorned:629},{period:"2011 Q1",licensed:3269,sorned:618},{period:"2010 Q4",licensed:3246,sorned:661},{period:"2009 Q4",licensed:3171,sorned:676},{period:"2008 Q4",licensed:3155,sorned:681},{period:"2007 Q4",licensed:3226,sorned:620},{period:"2006 Q4",licensed:3245,sorned:null},{period:"2005 Q4",licensed:3289,sorned:null}],$("#hero-graph").length&&Morris.Line({element:"hero-graph",data:t,xkey:"period",ykeys:["licensed","sorned"],labels:["Licensed","Off the road"],lineColors:["#3e8e00","#000000"]}),$("#hero-donut").length&&Morris.Donut({element:"hero-donut",data:[{label:"Development",value:25},{label:"Sales & Marketing",value:40},{label:"User Experience",value:25},{label:"Human Resources",value:10}],colors:["#ff9d00"],height:100,formatter:function(e){return e+"%"}}),$("#hero-area").length&&Morris.Area({element:"hero-area",data:[{period:"2010 Q1",iphone:2666,ipad:null,itouch:2647},{period:"2010 Q2",iphone:2778,ipad:2294,itouch:2441},{period:"2010 Q3",iphone:4912,ipad:1969,itouch:2501},{period:"2010 Q4",iphone:3767,ipad:3597,itouch:5689},{period:"2011 Q1",iphone:6810,ipad:1914,itouch:2293},{period:"2011 Q2",iphone:5670,ipad:4293,itouch:1881},{period:"2011 Q3",iphone:4820,ipad:3795,itouch:1588},{period:"2011 Q4",iphone:15073,ipad:5967,itouch:5175},{period:"2012 Q1",iphone:10687,ipad:4460,itouch:2028},{period:"2012 Q2",iphone:8432,ipad:5713,itouch:1791}],xkey:"period",ykeys:["iphone","ipad","itouch"],labels:["iPhone","iPad","iPod Touch"],hideHover:"auto",lineWidth:2,pointSize:4,lineColors:["#00c3ff","#ff9d00","#3e8e00"],fillOpacity:.3,smooth:!0}),$("#hero-bar").length?Morris.Bar({element:"hero-bar",data:[{device:"iPhone",geekbench:136},{device:"iPhone 3G",geekbench:137},{device:"iPhone 3GS",geekbench:275},{device:"iPhone 4",geekbench:380},{device:"iPhone 4S",geekbench:655},{device:"iPhone 5",geekbench:1571}],xkey:"device",ykeys:["geekbench"],labels:["Geekbench"],barRatio:.4,xLabelAngle:35,hideHover:"auto",barColors:["#ef005c"]}):void 0}function zoom(){if($.fn.elevateZoom){var e,t=$(".general-img").find("img"),a=470,o=470,e="window";$("body").width()+scrollWidth<992&&(a=0,o=0,e="inner"),t.removeData("elevateZoom"),$(".zoomContainer").remove(),t.elevateZoom({gallery:"thumblist",cursor:"crosshair",galleryActiveClass:"active",zoomWindowWidth:a,zoomWindowHeight:o,borderSize:0,borderColor:"none",lensFadeIn:!0,zoomWindowFadeIn:!0,zoomType:e})}}function blur(){$(".full-width-box .fwb-blur").each(function(){var e=$(this),t=new Image,a=2,o='<div class="blur-box"/>';e.find("canvas").length||(t.src=e.data("blurImage"),void 0!==e.data("blurAmount")&&e.data("blurAmount")!==!1&&(a=e.data("blurAmount")),t.onload=function(){Pixastic.process(t,"blurfast",{amount:a})},e.prepend(o).find(".blur-box").prepend(t)),setTimeout(function(){var t=e.find("canvas");t.width()==e.width()?t.css({marginLeft:0,marginTop:-((t.height()-e.height())/2)}):t.css({marginTop:0,marginLeft:-((t.width()-e.width())/2)}),$("body").addClass("blur-load")},50)})}function blurPage(){if($(".blur-page").length){var e=$(".blur-page");e.each(function(){var e=$(this),t=new Image,a=2,o='<div class="blur-box"></div>';t.src=e.attr("data-blur-image"),void 0!==e.attr("data-blur-amount")&&e.attr("data-blur-amount")!==!1&&(a=e.attr("data-blur-amount")),t.onload=function(){Pixastic.process(t,"blurfast",{amount:a},function(){$(".blur-page").addClass("blur-load")})},e.prepend(o).find(".blur-box").prepend(t)})}}function scrollMenu(){function e(){var e=$(document).scrollTop();t.each(function(){var a,i=$(this);$(i.attr("href")).length&&(a=$(i.attr("href")),a.position().top-o<=e&&a.position().top+a.height()>e?(t.removeClass("active"),i.addClass("active")):i.removeClass("active"))})}var t=$("a.scroll"),a=$(".header"),o=a.height();$("body").width()+scrollWidth<992&&(o=0),$(document).on("scroll",e),t.on("click",function(e){var a=$(this).attr("href"),i=$(this);e.preventDefault(),t.removeClass("active"),i.addClass("active"),$(a).length&&$("html, body").animate({scrollTop:$(a).offset().top-o},600)}),$("a.scroll").on("click",function(e){var t=$(".header"),a=t.height(),o=$(this).attr("href"),i=$(this);e.preventDefault(),$(o).length&&($("body").width()+scrollWidth>991?$("html, body").animate({scrollTop:$(o).offset().top-a},600):$("html, body").animate({scrollTop:$(o).offset().top},600)),$("a.scroll").removeClass("active"),i.addClass("active")})}var $=jQuery,isTouchDevice=navigator.userAgent.match(/(iPhone|iPod|iPad|Android|BlackBerry|Windows Phone)/);$("img").bind("contextmenu",function(e){return!1});var parent,child,scrollWidth,bodyWidth;void 0===scrollWidth&&(parent=$('<div style="width: 50px; height: 50px; overflow: auto"><div/></div>').appendTo("body"),child=parent.children(),scrollWidth=child.innerWidth()-child.height(99).innerWidth(),parent.remove()),isTouchDevice&&$(".fwb-video").find("video").remove(),$(".map-canvas").length&&$(function(){loadScript()}),$(document).ready(function(){if(/MSIE (\d+\.\d+);/.test(navigator.userAgent)){var e=new Number(RegExp.$1);9>e&&$('img[src*="svg"]').attr("src",function(){return $(this).attr("src").replace(".svg",".png")})}if(/MSIE (\d+\.\d+);/.test(navigator.userAgent)&&$("html").addClass("ie"),isTouchDevice&&$("body").addClass("touch-device"),$('[data-toggle="tooltip"], .tooltip-link').tooltip(),$("a[data-toggle=popover]").popover().click(function(e){e.preventDefault()}),$(".btn-loading").click(function(){var e=$(this);e.button("loading"),setTimeout(function(){e.button("reset")},3e3)}),$(".disabled, fieldset[disabled] .selectBox").click(function(){return!1}),$(".modal-center").on("show.bs.modal",centerModal),fullWidthBox(),menu(),footerStructure(),tabs(),accordions(),headerCustomizer(),modernGallery(),animations(),formStylization(),addReview(),$(".fwb-paralax").length&&paralax(),videoBg(),loginRegister(),loadingButton(),productLimited(),wordRotate(),$(".chart").length&&"function"==typeof chart&&chart(),"function"==typeof graph&&graph(),$(".general-img").length&&"function"==typeof zoom&&zoom(),$(".full-width-box .fwb-blur").length&&"function"==typeof blur&&blur(),$(".blur-page").length&&"function"==typeof blurPage&&blurPage(),"function"==typeof scrollMenu&&scrollMenu(),$(function(){locationSocialFeed(),$(".full-height").length&&"function"==typeof fullHeightPages&&fullHeightPages(),$(".progressive-slider").length&&"function"==typeof progressiveSlider&&progressiveSlider(),$(".banner-set").length&&"function"==typeof bannerSetCarousel&&bannerSetCarousel(),$(".carousel-box .carousel").length&&"function"==typeof carousel&&carousel(),$("#thumblist").length&&"function"==typeof thumblist&&thumblist(),$(".portfolio, .filter-box").length&&"function"==typeof isotopFilter&&isotopFilter()}),$(".tp-banner").length&&$.fn.revolution){var t=$(".tp-banner");if(t.closest(".rs-slider").hasClass("full-width")){var a,o=$("body"),i=(o.width(),0),n=104;$("#top-box").length&&o.hasClass("hidden-top")&&(i=$("#top-box").outerHeight()-32),a=o.width()+scrollWidth>=1200?o.height()-(i+n):800,t.revolution({delay:6e3,startwidth:1200,startheight:a,hideThumbs:10,navigationHOffset:-545,navigationVOffset:30,hideTimerBar:"on",onHoverStop:"on",navigation:{keyboardNavigation:"on",keyboard_direction:"horizontal",mouseScrollNavigation:"off",onHoverStop:"on",touch:{touchenabled:"on",swipe_threshold:75,swipe_min_touches:1,swipe_direction:"horizontal",drag_block_vertical:!1},bullets:{enable:!0,hide_onmobile:!0,hide_under:600,style:"metis",hide_onleave:!1,hide_delay:200,hide_delay_mobile:1200,direction:"horizontal",h_align:"center",v_align:"top",h_offset:-545,v_offset:30,space:6,tmp:'<span class="tp-bullet-img-wrap"></span>'}}}).parents(".slider").removeClass("load")}else t.revolution({delay:6e3,startwidth:1200,startheight:500,navigationType:"none",onHoverStop:"on",navigation:{keyboardNavigation:"on",keyboard_direction:"horizontal",mouseScrollNavigation:"off",onHoverStop:"on",touch:{touchenabled:"on",swipe_threshold:75,swipe_min_touches:1,swipe_direction:"horizontal",drag_block_vertical:!1},arrows:{style:"zeus",enable:!0,hide_onmobile:!0,hide_under:600,hide_onleave:!0,hide_delay:200,hide_delay_mobile:1200,left:{h_align:"left",v_align:"center",h_offset:20,v_offset:0},right:{h_align:"right",v_align:"center",h_offset:20,v_offset:0}}}}).parents(".slider").removeClass("load")}if($.fn.royalSlider&&$(".royal-slider").royalSlider({arrowsNav:!0,loop:!1,keyboardNavEnabled:!0,controlsInside:!1,imageScaleMode:"fill",arrowsNavAutoHide:!1,autoScaleSlider:!0,autoScaleSliderWidth:960,autoScaleSliderHeight:350,controlNavigation:"bullets",thumbsFitInViewport:!1,navigateByClick:!0,startSlideId:0,autoPlay:!1,transitionType:"move",globalCaption:!1,deeplinking:{enabled:!0,change:!0,prefix:"image-"},imgWidth:1920,imgHeight:700}).parents(".slider").removeClass("load"),$(".layerslider-box").length&&$.fn.layerSlider&&$(".layerslider-box").layerSlider({skinsPath:"css/layerslider/skins/",tnContainerWidth:"100%"}),$.fn.jPlayer){var r=$("#jp_container"),s=r.find(".jp-playlist li"),l=[],d="",c="";s.length&&s.each(function(){var e=$(this);if(void 0!==e.attr("data-files")&&e.attr("data-files")!==!1&&""!==e.attr("data-files")){void 0!==e.attr("data-title")&&e.attr("data-title")!==!1&&(d=e.attr("data-title")),void 0!==e.attr("data-artist")&&e.attr("data-artist")!==!1&&(c=e.attr("data-artist"));var t=e.attr("data-files").split(";");if(t[0].split(".").pop(-1),"mp3"==t[0].split(".").pop(-1))var a=t[0],o=t[1];else if("ogg"==t[0].split(".").pop(-1))var a=t[1],o=t[0];l.push({title:d,artist:c,free:!0,mp3:a,oga:o})}}),new jPlayerPlaylist({jPlayer:"#jquery_jplayer",cssSelectorAncestor:"#jp_container"},l,{swfPath:"js/jplayer",supplied:"oga, mp3",wmode:"window",smoothPlayBar:!0,keyEnabled:!0})}if($.fn.bootstrapValidator&&$(".form-validator").bootstrapValidator({excluded:[":disabled",":hidden",":not(:visible)"],feedbackIcons:{valid:"glyphicon glyphicon-ok",invalid:"glyphicon glyphicon-remove",validating:"glyphicon glyphicon-refresh"},message:"This value is not valid",trigger:null}),$.fn.datepicker&&$(".datepicker-box").datepicker({todayHighlight:!0,beforeShowDay:function(e){if(e.getMonth()==(new Date).getMonth())switch(e.getDate()){case 4:return{tooltip:"Example tooltip",classes:"active"};case 8:return!1;case 12:return"green"}}}),isTouchDevice||$(".language, .currency, .sort-by, .show-by").hover(function(){$(this).addClass("open")},function(){$(this).removeClass("open")}),$(".phone-header > a").click(function(e){e.preventDefault(),$(".btn-group").removeClass("open"),$(".phone-active").fadeIn().addClass("open")}),$(".search-header > a").click(function(e){e.preventDefault(),$(".btn-group").removeClass("open"),$(".search-active").fadeIn().addClass("open")}),$(".phone-active .close, .search-active .close").click(function(e){e.preventDefault(),$(this).parent().fadeOut().removeClass("open")}),$("body").on("click",function(e){var t=".phone-active",a=".search-active";$(e.target).is(t+" *")||$(e.target).is(".phone-header *")||$(t).hasClass("open")&&$(t).fadeOut().removeClass("open"),$(e.target).is(a+" *")||$(e.target).is(".search-header *")||$(a).hasClass("open")&&$(a).fadeOut().removeClass("open")}),$(".cart-header").hover(function(){$("body").width()+scrollWidth>=991&&$(this).addClass("open")},function(){$("body").width()+scrollWidth>=991&&$(this).removeClass("open")}),isTouchDevice||$(".product, .employee").hover(function(e){e.preventDefault(),$(this).addClass("hover")},function(e){e.preventDefault(),$(this).removeClass("hover")}),$("body").on("touchstart",function(e){e.stopPropagation(),0==$(e.target).parents(".product, .employee").length&&$(".product, .employee").removeClass("hover")}),$(".product, .employee").on("touchend",function(){$(this).hasClass("hover")?$(this).removeClass("hover"):($(".product, .employee").removeClass("hover"),$(this).addClass("hover"))}),$('.menu .parent:not(".active") a').next(".sub").css("display","none"),$(".menu .parent a .open-sub").click(function(e){e.preventDefault(),$(this).closest(".parent").hasClass("active")?($(this).parent().next(".sub").slideUp(600),$(this).closest(".parent").removeClass("active")):($(this).parent().next(".sub").slideDown(600),$(this).closest(".parent").addClass("active"))}),$.fn.slider&&($("#Slider2").slider({from:5e3,to:15e4,limits:!1,heterogeneity:["50/50000"],step:1e3,dimension:"&nbsp;$"}),$("#filter").slider({from:2e3,to:2015,limits:!1,step:1,dimension:"",calculate:function(e){return e}})),$(".jslider-pointer").html('\n		<svg x="0" y="0" viewBox="0 0 8 12" enable-background="new 0 0 8 12" xml:space="preserve">\n		  <path fill-rule="evenodd" clip-rule="evenodd" fill="#1e1e1e" d="M2,0h4c1.1,0,2,0.9,2,2l-2,8c-0.4,1.1-0.9,2-2,2l0,0c-1.1,0-1.6-0.9-2-2L0,2C0,0.9,0.9,0,2,0z"/>\n		</svg>\n	'),$("#submit").click(function(){return $.post("php/form.php",$("#contactform").serialize(),function(e){
$("#success").html(e).animate({opacity:1},500,function(){$(e).is(".send-true")&&$("#contactform").trigger("reset")})}),!1}),$(".subscribe-form").submit(function(e){var t=$(this),a=t.find(".form-message"),o="Your email is sended",i="Please enter a valid email address",n="This email is already signed",r="Error request";e.preventDefault(),$.ajax({url:"php/subscribe.php",type:"POST",data:t.serialize(),success:function(e){switch(t.find(".submit").prop("disabled",!0),a.removeClass("text-danger").removeClass("text-success").fadeIn(),e){case 0:a.html(o).addClass("text-success").fadeIn(),setTimeout(function(){t.trigger("reset"),a.fadeOut().delay(500).queue(function(){a.html("").dequeue()})},2e3);break;case 1:a.html(i).addClass("text-danger").fadeIn();break;case 2:a.html(n).addClass("text-danger").fadeIn(),setTimeout(function(){t.trigger("reset"),a.fadeOut().delay(500).queue(function(){a.html("").dequeue()})},2e3);break;default:a.html(r).addClass("text-danger").fadeIn()}t.find(".submit").prop("disabled",!1)}})}),$(".number-up").click(function(){var e=$(this).closest(".number").find('input[type="text"]').attr("value");return $(this).closest(".number").find('input[type="text"]').attr("value",parseFloat(e)+1),!1}),$(".number-down").click(function(){var e=$(this).closest(".number").find('input[type="text"]').attr("value");return e>1&&$(this).closest(".number").find('input[type="text"]').attr("value",parseFloat(e)-1),!1}),$(".add-cart-form .add-cart").click(function(){return $(this).next(".number").find('input[type="text"]').attr("value",1),!1}),$(".emergence-price").click(function(){return $(this).animate({opacity:"0"},0),$(this).prev(".price").fadeIn(1e3),!1}),$.fn.fancybox){var p={nextEffect:"fade",prevEffect:"fade",openEffect:"fade",closeEffect:"fade",helpers:{overlay:{locked:!1}},tpl:{closeBtn:'<a title="Kapat" class="fancybox-item fancybox-close" href="javascript:;">×</a>',next:'<a title="Sonraki" class="fancybox-nav fancybox-next" href="javascript:;">\n						<span><svg x="0" y="0" width="9px" height="16px" viewBox="0 0 9 16" enable-background="new 0 0 9 16" xml:space="preserve"><polygon fill-rule="evenodd" clip-rule="evenodd" fill="#fcfcfc" points="1,0.001 0,1.001 7,8 0,14.999 1,15.999 9,8 "/></svg></span>\n					</a>',prev:'<a title="Önceki" class="fancybox-nav fancybox-prev" href="javascript:;">\n						<span><svg x="0" y="0" width="9px" height="16px" viewBox="0 0 9 16" enable-background="new 0 0 9 16" xml:space="preserve"><polygon fill-rule="evenodd" clip-rule="evenodd" fill="#fcfcfc" points="8,15.999 9,14.999 2,8 9,1.001 8,0.001 0,8 "/></svg></span>\n					</a>'}};$(".gallery-images, .lightbox").fancybox(p),$("#fancybox-start").on("click",function(){var e=$(this).find("img").data("href"),t=[e];$(".product-photos").each(function(a,o){$(this).data("href")!=e&&t.push($(this).data("href"))}),$.fancybox(t,p)}),$(".thumblist a").on("click",function(){var e=$(this).find("img").data("href");$(".general-img").find("img").attr("data-href",e).data("href",e)})}if($.fn.county){var h=$("#count-down"),u=h.data("date");h.county({endDateTime:new Date(u),reflection:!1}).addClass("count-loaded")}if($("#footer .up").click(function(){return $("html, body").animate({scrollTop:$("body").offset().top},500),!1}),$.fn.knob&&$(".knob").each(function(){var e=$(this),t=e.attr("rel");e.knob({draw:function(){$(this.i).val(this.cv+"%")}}),e.appear(function(){$({value:0}).animate({value:t},{duration:2e3,easing:"swing",step:function(){e.val(Math.ceil(this.value)).trigger("change")}})},{accX:0,accY:-150})}),$(".facebook-widget").length&&!function(e,t,a){var o,i=e.getElementsByTagName(t)[0];e.getElementById(a)||(o=e.createElement(t),o.id=a,o.src="//connect.facebook.net/en_EN/all.js#xfbml=1",i.parentNode.insertBefore(o,i))}(document,"script","facebook-jssdk"),$(".twitter-widget").length&&!function(e,t,a){var o,i=e.getElementsByTagName(t)[0],n=/^http:/.test(e.location)?"http":"https";e.getElementById(a)||(o=e.createElement(t),o.id=a,o.src=n+"://platform.twitter.com/widgets.js",i.parentNode.insertBefore(o,i))}(document,"script","twitter-wjs"),$("body").addClass("loaded"),$.fn.scrollbar&&$(".minimized-menu .primary .navbar-nav").scrollbar(),"devicePixelRatio"in window&&window.devicePixelRatio>=2)for(var f=$("img.replace-2x").get(),v=0,g=f.length;g>v;v++){var m=f[v].src;m=m.replace(/\.(png|jpg|gif)+$/i,"@2x.$1"),f[v].src=m,$(f[v]).load(function(){$(this).addClass("loaded")})}}),function(){function e(){fullWidthBox(),menu(),footerStructure(),tabs(),modernGallery(),animations(),$(".fwb-paralax").length&&paralax(),loginRegister(),$(".full-height").length&&"function"==typeof fullHeightPages&&fullHeightPages(),$(".modal-center:visible").each(centerModal),$(".progressive-slider").length&&"function"==typeof progressiveSlider&&progressiveSlider(),$(".banner-set").length&&"function"==typeof bannerSetCarousel&&bannerSetCarousel(),$("#thumblist").length&&"function"==typeof thumblist&&thumblist(),$(".chart").length&&"function"==typeof chart&&chart(),"function"==typeof graph&&graph(!0),$(".general-img").length&&"function"==typeof zoom&&zoom(),$(".carousel-box .carousel").length&&"function"==typeof carousel&&carousel(),$(".portfolio, .filter-box").length&&"function"==typeof isotopFilter&&isotopFilter(),$(".full-width-box .fwb-blur").length&&"function"==typeof blur&&blur()}var t=function(){var e=0;return function(t,a){clearTimeout(e),e=setTimeout(t,a)}}();isTouchDevice?$(window).bind("orientationchange",function(){t(function(){e()},200)}):$(window).on("resize",function(){t(function(){e()},500)}),$(".window-resize").on("click",function(e){$(window).trigger("resize")})}();