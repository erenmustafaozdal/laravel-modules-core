'use strict';
var $ = jQuery,
	isTouchDevice = navigator.userAgent.match(/(iPhone|iPod|iPad|Android|BlackBerry|Windows Phone)/);

$(function() {
	$('img').each(function() {
		if (/MSIE (\d+\.\d+);/.test(navigator.userAgent)){
			var ieversion=new Number(RegExp.$1);
			if (ieversion>=9)
				if (typeof this.naturalWidth === "undefined" || this.naturalWidth === 0)
					this.src = "http://placehold.it/" + ($(this).attr('width') || this.width || $(this).naturalWidth()) + "x" + (this.naturalHeight || $(this).attr('height') || $(this).height()) + '/' + bgColor + '/' + textColor + '?text= ';
		} else {
			if (!this.complete || typeof this.naturalWidth === "undefined" || this.naturalWidth === 0)
				this.src = "http://placehold.it/" + ($(this).attr('width') || this.width) + "x" + ($(this).attr('height') || $(this).height()) + '/' + bgColor + '/' + textColor + '?text= ';
		}
	});
});

//Calculating The Browser Scrollbar Width
var parent, child, scrollWidth, bodyWidth;

if (scrollWidth === undefined) {
	parent      = $('<div style="width: 50px; height: 50px; overflow: auto"><div/></div>').appendTo('body');
	child       = parent.children();
	scrollWidth = child.innerWidth() - child.height(99).innerWidth();
	parent.remove();
}

//Form Stylization
function formStylization() {
	var radio    = 'input[type="radio"]',
		checkbox = 'input[type="checkbox"]';

	$(radio).wrap('<div class="new-radio"></div>');
	$('.new-radio').append('<span></span>');
	$(checkbox).wrap('<div class="new-checkbox"></div>');
	$('.new-checkbox').append('<svg x="0" y="0" width="15px" height="15px" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve"><polygon fill="#1e1e1e" points="9.298,13.391 4.18,9.237 3,10.079 9.297,17 17.999,4.678 16.324,3 "/></svg>');
	$(checkbox + ':checked').parent('.new-checkbox').addClass('checked');
	$(radio + ':checked').parent('.new-radio').addClass('checked');
	$(checkbox + ':disabled').parent().addClass('disabled');
	$(radio + ':disabled').parent().addClass('disabled');

	$('html').on('click', function(){
		$(radio).parent('.new-radio').removeClass('checked');
		$(radio + ':checked').parent('.new-radio').addClass('checked');
		$(checkbox).parent('.new-checkbox').removeClass('checked');
		$(checkbox + ':checked').parent('.new-checkbox').addClass('checked');
		$(radio).parent().removeClass('disabled');
		$(checkbox).parent().removeClass('disabled');
		$(radio + ':disabled').parent().addClass('disabled');
		$(checkbox + ':disabled').parent().addClass('disabled');
	});

	if($.fn.selectBox)
		$('select:not(".without-styles")').selectBox();
}

//Full Width Box
function fullWidthBox() {
	if ($('.full-width-box.auto-width').length) {
		var windowWidth    = $('body').outerWidth(),
			containerWidth = $('.header .container').width();

		$('.full-width-box.auto-width').each(function() {
			$(this)
				.css({
					left  : ( containerWidth - windowWidth) / 2,
					width : windowWidth
				})
				.addClass('loaded');
		});
	}
}

//Animations
function animations() {
  	$('[data-appear-animation]').each(function() {
		var $this = $(this);
	
		if(!$('body').hasClass('no-csstransitions') && ($('body').width() + scrollWidth) > 767) {
			$this.appear(function() {
				var delay = ($this.data('appearAnimationDelay') ? $this.data('appearAnimationDelay') : 1);
		
				if(delay > 1) $this.css('animation-delay', delay + 'ms');
				
				$this.addClass('animated').addClass($this.data('appearAnimation'));
			});
		}
	});
		
	/* Animation Progress Bars */
	$('[data-appear-progress-animation]').each(function() {
		var $this = $(this);
	
		$this.appear(function() {
			var delay = ($this.attr('data-appear-animation-delay') ? $this.attr('data-appear-animation-delay') : 1);
	
			if(delay > 1) $this.css('animation-delay', delay + 'ms');
			
			$this.find('.progress-bar').addClass($this.attr('data-appear-animation'));
	
			setTimeout(function() {
				$this.find('.progress-bar').animate({
					width: $this.attr('data-appear-progress-animation')
				}, 500, 'easeInCirc', function() {
					$this.find('.progress-bar').animate({
						textIndent: 10
					}, 1500, 'easeOutBounce');
				});
			}, delay);
		}, {accX: 0, accY: -50});
  	});
}

//Header Fixed
function headerCustomizer() {
  	var body         = $('body'),
		topHeight    = 0,
		headerHeight = 0,
		scroll       = 0,
		fixedH       = $('.fixed-header');
  
	if ($('#top-box').length)
		topHeight = $('#top-box').outerHeight();

	headerHeight = $('.header').outerHeight();

	if (!isTouchDevice) {
		scroll = topHeight;
		
		if (body.hasClass('hidden-top'))
			scroll = 8;

		if (body.hasClass('padding-top')) {
			scroll = topHeight + 420;
		} else if (body.hasClass('boxed')) {
			scroll = topHeight + 20;
			if (body.hasClass('fixed-header') && body.hasClass('fixed-top')) {
				scroll = 20;
			}
		}
		
		$(window).scroll(function(){
			var $this = $(this);
			
			if (body.hasClass('fixed-header')) {
				if ($this.scrollTop() >= scroll)
					body.addClass('fixed');
				else
					body.removeClass('fixed');
			}
			
			if ($this.scrollTop() >= headerHeight)
				fixedH.addClass('background-opacity');
			else
				fixedH.removeClass('background-opacity');
		});
		
		$('.hidden-top .header, .hidden-top #top-box').not('.boxed .header, .boxed #top-box').hover(function(){
			$('.hidden-top').addClass('visible-top');
		}, function(){
			$('.hidden-top').removeClass('visible-top');
		});
		
		$(window).scroll(function(){
			var $this = $(this);
			
			if ((body.hasClass('visible-top')) && ($this.scrollTop() > 0))
				body.removeClass('visible-top');
		});
  }
  
	$(window).scroll(function(){
		if ($(this).scrollTop() >= topHeight + headerHeight)
			$('.top-fixed-box').addClass('fixed');
		else
			$('.top-fixed-box').removeClass('fixed');
	});
}

//Header Menu
function menu() {
	var body    = $('body'),
		primary = '.primary';
  
	$(primary).find('.parent > a .open-sub, .megamenu .title .open-sub').remove();

	if ((body.width() + scrollWidth) < 992 || $('.header').hasClass('minimized-menu'))
		$(primary).find('.parent > a, .megamenu .title').append('<span class="open-sub"><span></span><span></span></span>');
	else
		$(primary).find('ul').removeAttr('style').find('li').removeClass('active');

	$(primary).find('.open-sub').click(function(e){
		e.preventDefault();

		var item = $(this).closest('li, .box');

		if ($(item).hasClass('active')) {
			$(item).children().last().slideUp(600);
			$(item).removeClass('active');
		} else {
			var li = $(this).closest('li, .box').parent('ul, .sub-list').children('li, .box');

			if ($(li).is('.active')) {
				$(li).removeClass('active').children('ul').slideUp(600);
			}

			$(item).children().last().slideDown(600);
			$(item).addClass('active');

			if (body.width() + scrollWidth > 991) {
				var maxHeight = body.height() - ($(primary).find('.navbar-nav')).offset().top - 20;

				$(primary).find('.navbar-nav').css({
					maxHeight : maxHeight,
					overflow  : 'auto'
				});
			}
		}
	});

	$(primary).find('.parent > a').click(function(e){
		if (((body.width() + scrollWidth) > 991) &&  (isTouchDevice)) {
			var $this = $(this);

			if ($this.parent().hasClass('open')) {
				$this.parent().removeClass('open')
			} else {
				e.preventDefault();

				$this.parent().addClass('open')
			}
		}
	});

	body.on('click', function(e) {
		if (!$(e.target).is(primary + ' *')) {
			if ($(primary + ' .collapse').hasClass('in')) {
				$(primary + ' .navbar-toggle').addClass('collapsed');
				$(primary + ' .navbar-collapse').collapse('hide');
			}
		}
	});



	/* Top Menu */
	var topMenu = $('.top-navbar').find('.collapse');

	if ((body.width() + scrollWidth) < 992)
		topMenu.css('width', body.find('#top-box .container').width());
	else
		topMenu.css('width', 'auto');
}

//Accordion
function accordions() {
	//Some open
	$('.multi-collapse .collapse').collapse({
		toggle: false
	});

	//Always open
	$('.panel a[data-toggle="collapse"]').click( function(event){
		event.preventDefault();

		if ($(this).closest('.panel').hasClass('active')) {
			if ($(this).closest('.panel-group').hasClass('one-open'))
				event.stopPropagation();
		}
	});

	$('.collapse').on('hide.bs.collapse', function (event) {
		event.stopPropagation();

		$(this).closest('.panel').removeClass('active');
	});

	$('.collapse').on('show.bs.collapse', function () {
		$(this).closest('.panel').addClass('active');
	});

	$('.collapse.in').closest('.panel').addClass('active');
}

//Tabs
function tabs() {
	var tab = $('.nav-tabs');

	tab.find('a').click(function (e) {
		e.preventDefault();

		$(this).tab('show');
	});

	if (($('body').width() + scrollWidth) < 768 && (!tab.hasClass('no-responsive'))) {
		tab.each(function(){
			var $this = $(this);

			if (!$this.next('.tab-content').hasClass('hidden') && !$this.find('li').hasClass('dropdown')) {
				$this.addClass('accordion-tab');

				$this.find('a').each(function(){
					var $this = $(this),
						id = $this.attr('href');

					$this.prepend('<span class="open-sub"></span>');

					$this.closest('.nav-tabs').next('.tab-content').find(id)
					.appendTo($this.closest('li'));
				});

				$this.next('.tab-content').addClass('hidden');
			}
		});

		$('.accordion-tab > li.active .tab-pane').slideDown();
	} else {
		tab.find('.tab-pane').removeAttr('style', 'display');

		tab.each(function(){
			var $this = $(this);

			if ($this.next('.tab-content').hasClass('hidden')) {
				$this.removeClass('accordion-tab');

				$this.find('a').each(function(){
					var $this = $(this),
						id = $this.attr('href');

					$($this.closest('li').find('.tab-pane')).appendTo($this.closest('.nav-tabs').next('.tab-content'));
				});

				$this.next('.tab-content').removeClass('hidden');
			}
		});
	}

	$('.accordion-tab > li > a').on('shown.bs.tab', function (e) {
		if (($('body').width() + scrollWidth) < 768) {
			var $this = $(this),
				tab = $this.closest('li');

			e.preventDefault();

			$this
				.closest('.accordion-tab')
				.find('.tab-pane').not(tab.find('.tab-pane'))
				.removeClass('active')
				.slideUp();

			tab.find('.tab-pane')
				.addClass('active')
				.slideDown();

			$('html, body').on("scroll mousedown DOMMouseScroll mousewheel keyup", function(){
				$('html, body').stop();
			});

			setTimeout(function(){
				$('html, body').animate({
					scrollTop: $this.offset().top
				}, 800);
			}, 500 );
		}
	});
}

//Footer structure (max-width < 768)
function footerStructure() {
	var footer = $('#footer .footer-bottom');

	if (($('body').width() + scrollWidth) < 768) {
		if (!footer.find('.new-copyright').length) {
			footer.find('.address').after('<div class="new-copyright"></div>');
			footer.find('.copyright').appendTo('#footer .footer-bottom .new-copyright');
		}
	} else {
		if (footer.find('.new-copyright').length) {
			footer.find('.copyright').prependTo('#footer .footer-bottom .row');
			footer.find('.new-copyright').remove();
		}
	}
}

//Modern Gallery
function modernGallery() {
	if($.fn.imagesLoaded) {
		var $container = $('#gallery-modern')


		$container.imagesLoaded( function() {
			$container.masonry({
				itemSelector    : '.images-box',
				columnWidth     : '.grid-sizer',
				percentPosition : true
			});
		});
	}
}

//Add your review
function addReview() {
  $('a[href="#reviews"].add-review').click(function(){
		$('.product-tab a[href="#reviews"]').trigger('click');
		
		$('html, body').animate({
			scrollTop: $("#reviews").offset().top
		}, 1000);
  });
}

//Paralax
function paralax() {
	var $window = $(window),
		speed   = 2;
		
	$('.fwb-paralax').each(function(){
		var $this = $(this);
		
		if ($this.data('speed'))
			speed = $this.data('speed');
		
		function bgPosition() {
			var $thisY   = $this.offset().top,
				$windowY = $window.scrollTop();

			if ($thisY > $windowY)
				$this.css({ backgroundPosition: '50% '+ (($thisY - $windowY) / speed) + 'px'});
			else
				$this.css({ backgroundPosition: '50% '+ (-($windowY - $thisY) / speed) + 'px'});
		}
		
		bgPosition();
		
		$window.on('scroll', bgPosition);
	});
}

//Video Background
function videoBg() {
	if($.fn.tubular) {
		var id,
			options,
			poster,
			youtube = $('.fwb-youtube-video');

		if (youtube.attr('data-youtube-videoId') !== undefined && youtube.attr('data-youtube-videoId') !== false)
			id = youtube.attr('data-youtube-videoId');

		if (youtube.attr('data-youtube-poster') !== undefined && youtube.attr('data-youtube-poster') !== false)
			poster = youtube.attr('data-youtube-poster');

		options = {
			videoId : id,
			start : 0,
			wrapperZIndex : -1,
			mute : true,
			width : $('body').width()
		}

		if( isTouchDevice )
			youtube.css('background-image', "url('"+poster+"')");
		else
			youtube.tubular(options);
	}
}


//Login/Register Page
function loginRegister() {
	if($.fn.isotope) {
		var filterBox   = $('.login-register'),
			filterElems = filterBox.find('.filter-elements'),
			buttonBox   = filterBox.find('.filter-buttons'),
			selector    = filterBox.find('.filter-buttons.active-form').attr('data-filter');

		filterElems.removeClass('hidden');

		filterElems.isotope({
			filter: selector,
			layoutMode: 'fitRows'
		});

		buttonBox.click(function(e){
			var selector = $(this).attr('data-filter');

			e.preventDefault();

			if (!$(this).hasClass('active-form')) {
				buttonBox.removeClass('active-form');
				$(this).addClass('active-form');

				filterElems.isotope({
					filter: selector,
					layoutMode: 'fitRows'
				});
			}
		});
	}

	var height = 0,
		form   = $('.form-content');

	form.each(function () {
		if ($(this).outerHeight() > height)
			height = $(this).outerHeight();
	});

	form.css('height', height)

	$('.switch-form').click(function (e) {
		var button = $(this);

		e.preventDefault();

		if (button.hasClass('forgot')) {
			$('.form-content').removeClass('hidden');
			$('.register-form').closest('.form-content').addClass('hidden');
		} else if (button.hasClass('sing-up')) {
			$('.form-content').removeClass('hidden');
			$('.forgot-form').closest('.form-content').addClass('hidden');
		}

		$('.login-register .rotation').toggleClass('hover');
	});
}

function loadingButton() {
	var loading = function(){
		if ($('.ladda-button.progress-button').length) {
			Ladda.bind('.ladda-button:not(.progress-button)', {
				timeout: 2000
			});

			Ladda.bind('.ladda-button.progress-button', {
				callback: function(instance) {
					var interval,
						progress = 0;

					return interval = setInterval(function() {
						progress = Math.min(progress + Math.random() * 0.1, 1);
						instance.setProgress(progress);
						if (progress === 1) {
							instance.stop();
							return clearInterval(interval);
						}
					}, 200);
				}
			});
		}
	}

	if (/MSIE (\d+\.\d+);/.test(navigator.userAgent)){
		var ieversion = new Number(RegExp.$1);

		if (ieversion >= 9)
			loading();
	} else {
		loading();
	}
}

function productLimited() {
	if ($('.product .limit-offer').length){
		var product = $('.product .limit-offer'),
			endDateTime = '';

		product.each(function () {
			var $this = $(this);

			if ($this.attr('data-end') !== undefined && $this.attr('data-end') !== false)
				endDateTime = $this.attr('data-end');
			else
				endDateTime = '';

			$this.county({
				endDateTime: new Date(endDateTime),
				animation: 'scroll',
				reflection: false
			});
		});
	}
}

//Remove Video
if( isTouchDevice )
	$('.fwb-video').find('video').remove();
	
//Word Rotate
function wordRotate() {
	$('.word-rotate').each(function() {
		var $this          = $(this),
			wordsBox       = $this.find('.words-box'),
			words          = wordsBox.find('> span'),
			firstWord      = words.eq(0),
			firstWordClone = firstWord.clone(),
			wordHeight     = firstWord.height(),
			currentItem    = 1,
			currentTop     = 0;
		
		wordsBox.append(firstWordClone);
		
		$this.height(wordHeight).addClass('loaded');
		
		setInterval(function() {
			currentTop = (currentItem * wordHeight);
		
			wordsBox.animate({
				top: -(currentTop) + 'px'
			}, 300, 'easeOutQuad', function() {
				currentItem ++;
			
				if(currentItem > words.length) {
					wordsBox.css('top', 0);
					currentItem = 1;
				}
			});
		}, 2000);
	});
}

//Modal Window
function centerModal() {
	$(this).css('display', 'block');

	var dialog = $(this).find('.modal-dialog'),
		offset = ($(window).height() - dialog.height()) / 2;

	if (offset < 10)
		offset = 10;

	dialog.css('margin-top', offset);
}

//Social Feed
function locationSocialFeed() {
	var socialFeed = $('.social-feed');

	if($.fn.isotope) {
		socialFeed.isotope({
			itemSelector: '.isotope-item',
		}).addClass('loaded');

		$('#load-more').click(function() {
			var item1, item2, item3, items, tmp;

			items = socialFeed.find('.item-clone');
			item1 = $(items[Math.floor(Math.random() * items.length)]).clone();
			item2 = $(items[Math.floor(Math.random() * items.length)]).clone();
			item3 = $(items[Math.floor(Math.random() * items.length)]).clone();
			tmp = $().add(item1).add(item2).add(item3);

			var images = tmp.find('img');

			images.imagesLoaded(function(){
				return socialFeed.isotope('insert', tmp);
			});
		});
	}
}

//Full Height Pages
function fullHeightPages() {
	var full = $('.full-height');
	
	full.removeClass('scroll');
	
	if (full.height() < $('.page-box').outerHeight())
		full.addClass('scroll');
	else
		full.removeClass('scroll');
}

//Google Map Start
function initialize() {
	var mapCanvas = $('.map-canvas');

	mapCanvas.each(function () {
		var $this           = $(this),
			zoom            = 8,
			lat             = -74,
			lng             = 150,
			scrollwheel     = false,
			draggable       = true,
			mapType         = google.maps.MapTypeId.ROADMAP,
			title           = '',
			contentString   = '';

		if ($this.data('zoom'))
			zoom = parseFloat($this.data('zoom'));

		if ($this.data('lat'))
			lat = $this.data('lat').split('###');

		if ($this.data('lng'))
			lng = $this.data('lng').split('###');

		if ($this.data('scrollwheel'))
			scrollwheel = $this.data('scrollwheel');

		if ($this.data('type')) {
			if ($this.data('type') == 'satellite')
				mapType = google.maps.MapTypeId.SATELLITE;
			else if ($this.data('type') == 'hybrid')
				mapType = google.maps.MapTypeId.HYBRID;
			else if ($this.data('type') == 'terrain')
				mapType = google.maps.MapTypeId.TERRAIN;
		}

		if ($this.data('title'))
			title = $this.data('title').split('###');

		if( isTouchDevice )
			draggable = false;

		var mapOptions = {
			scrollwheel : scrollwheel,
			draggable   : draggable,
			mapTypeId   : mapType
		};

		var map = new google.maps.Map($this[0], mapOptions);
        var bounds = new google.maps.LatLngBounds();

		var is_internetExplorer11= navigator.userAgent.toLowerCase().indexOf('trident') > -1;
		var image = (is_internetExplorer11)
				? '/vendor/laravel-modules-core/assets/frontend/img/map-marker.png'
				: '/vendor/laravel-modules-core/assets/frontend/img/svg/map-marker.svg';

		$.each(lat,function(index,value)
		{
			if (value == '') {
				return;
			}

			contentString = '<div class="map-content">' +
				'<h3 class="title">' + title[index] + '</h3>' +
				'<p>' +
					'<b>Enlem :</b> ' + lat[index] + '<br>' +
					'<b>Boylam :</b> ' + lng[index] +'<br>' +
				'</p>' +
			'</div>';

			var infowindow = new google.maps.InfoWindow({
				content: contentString
			});

			var marker = new google.maps.Marker({
				position : new google.maps.LatLng(lat[index], lng[index]),
				map      : map,
				icon     : image,
				title    : title[index]
			});
            bounds.extend(marker.position);

			google.maps.event.addListener(marker, 'click', function() {
				infowindow.open(map,marker);
			});
		});

        map.setCenter(bounds.getCenter());
        map.fitBounds(bounds);

		if ($this.data('hue')) {
			var styles = [{
				stylers : [
					{ hue : $this.data('hue') }
				]
			}];

			map.setOptions({ styles: styles });
		}
	});
}
	
function loadScript() {
	var script = document.createElement('script');
	
	script.type = 'text/javascript';
	script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&' + 'callback=initialize&key=AIzaSyCjEWf270WVlOolKfwRe71Iq_G5UWmBnok';
	document.body.appendChild(script);
}
if ($('.map-canvas').length) {
	$(function() {
		loadScript();
	});
}
//Google Map End

//Slider Start
function openItem( $item ) {
	$item.addClass('active');

	$item.stop().children('.slid-content').animate('opacity', 1);
}
function progressiveSlider() {
	var slider     = $('.progressive-slider'),
		Parameters = function(){
			return {
				auto       : {
					play : true,
					timeoutDuration : 4000
				},
				items      : {
					visible : 1
				},
				responsive : true,
				scroll     : {
					duration : 1000,
					pauseOnHover : true
				}
			}
		};

	slider.each(function () {
		var $this     = $(this),
			sliderBox = $this.closest('.slider');

		var parameters = new Parameters();

		/* Animation Duration */
		if ($this.data('animationDuration'))
			parameters.scroll.duration = $this.data('animationDuration');

		/* Autoplay */
		if ($this.data('autoplayDisable'))
			parameters.auto = false;
		else
			/* Autoplay Speed */
			if ($this.data('autoplaySpeed'))
				parameters.auto.timeoutDuration = $this.data('autoplaySpeed');

		switch (true) {
			case $this.hasClass('progressive-slider-two'):
				parameters.pagination = sliderBox.find('.pagination');
				parameters.onCreate = function(data) {
					$this.find('.slider-wrapper').css('height', data.height)
				};
		break;
			case $this.hasClass('progressive-slider-three'):
				parameters.scroll.fx = 'crossfade';
				parameters.scroll.pauseOnHover = true;
		break;
			case $this.hasClass('progressive-slider-four'):
				parameters.next = sliderBox.find('.next');
				parameters.prev = sliderBox.find('.prev');
		break;
			default:
				parameters.scroll.fx = 'crossfade';
				parameters.scroll.onBefore = function(data) {
					data.items.old.stop().children('.slid-content').animate({
						opacity: 0
					});
				};
				parameters.scroll.onAfter = function(data) {
					openItem( data.items.visible );
				};
				parameters.next = sliderBox.find('.next');
				parameters.prev = sliderBox.find('.prev');
				parameters.pagination = sliderBox.find('.pagination');
				parameters.onCreate = function(data) {
					openItem(data.items);
				};
		}

		$this.find('.sliders-box')
			.carouFredSel(parameters)
			.parents('.slider').removeClass('load')
			.touchwipe({
				wipeLeft: function(){
					$(this).trigger('next', 1);
				},
				wipeRight: function(){
					$(this).trigger('prev', 1);
				},
				preventDefaultEvents : false
			});
	});
}
//Slider End

//Banner set Start
function bannerSetCarousel() {
	$('.banner-set .banners').each(function () {
		var $this           = $(this),
				bannerSet       = $this.closest('.banner-set'),
				prev            = bannerSet.find('.prev'),
				next            = bannerSet.find('.next'),
				autoPlay        = true,
				timeoutDuration = 2000,
				scrollDuration  = 1000,
				height;

		/* Animation Duration */
		if (bannerSet.data('animationDuration'))
			scrollDuration = bannerSet.data('animationDuration');

		/* Autoplay */
		if (bannerSet.data('autoplayDisable'))
			autoPlay = false;
		else
		/* Autoplay Speed */
		if (bannerSet.data('autoplaySpeed'))
			timeoutDuration = bannerSet.data('autoplaySpeed');

		$this.carouFredSel({
					auto       : {
						play : autoPlay,
						timeoutDuration : timeoutDuration
					},
					width      : '100%',
					responsive : false,
					infinite   : false,
					next       : next,
					prev       : prev,
					pagination : bannerSet.find('.pagination'),
					scroll     : {
						duration : scrollDuration,
						items : 1,
						pauseOnHover: true
					},
					onCreate: function () {
						height = $this.height();

						$this.find('.banner').css('height', height);
						if (bannerSet.hasClass('banner-set-mini') && bannerSet.hasClass('banner-set-no-pagination')) {
							bannerSet.find('.prev, .next').css('margin-top', -((height / 2) + 7));
						}
					}
				})
				.touchwipe({
					wipeLeft: function(){
						$this.trigger('next', 1);
					},
					wipeRight: function(){
						$this.trigger('prev', 1);
					},
					preventDefaultEvents : false
				})
				.parents('.banner-set').removeClass('load');
	});
}
//Banner set End

//Carousels Start
function carousel() {
	if ($('.carousel-box .carousel').length) {
		var carouselBox = $('.carousel-box .carousel');

		carouselBox.each(function () {
			var $this           = $(this),
				carousel        = $this.closest('.carousel-box'),
				prev,
				next,
				pagination,
				responsive      = false,
				autoPlay        = true,
				timeoutDuration = 700,
				scrollDuration  = 1000;

			/* Animation Duration */
			if (carousel.data('animationDuration'))
				scrollDuration = carousel.data('animationDuration');

			/* Autoplay */
			if (carousel.data('autoplayDisable'))
				autoPlay = false;
			else
				/* Autoplay Speed */
				if (carousel.data('autoplaySpeed'))
					timeoutDuration = carousel.data('autoplaySpeed');

			if (carousel.data('carouselNav') != false) {
				next = carousel.find('.next');
				prev = carousel.find('.prev');
				carousel.removeClass('no-nav');
			} else {
				next = false;
				prev = false;
				carousel.addClass('no-nav');
			}

			if (carousel.data('carouselPagination')) {
				pagination = carousel.find('.pagination');
				carousel.removeClass('no-pagination');
			} else {
				pagination = false;
				carousel.addClass('no-pagination');
			}

			if (carousel.data('carouselOne'))
				responsive = true;

			$this.carouFredSel({
				onCreate : function () {
					$(window).on('resize', function(e){
						e.stopPropagation();
					});
				},
				scroll : {
					duration : scrollDuration,
					items : 1,
					pauseOnHover: true
				},
				auto       : {
					play : autoPlay,
					timeoutDuration : timeoutDuration
				},
				width      : '100%',
				infinite   : false,
				next       : next,
				prev       : prev,
				pagination : pagination,
				responsive : responsive
			})
			.touchwipe({
				wipeLeft: function(){
					$this.trigger('next', 1);
				},
				wipeRight: function(){
					$this.trigger('prev', 1);
				},
				preventDefaultEvents : false
			})
			.parents('.carousel-box').removeClass('load');
		});
	}
}
//Carousels End

//Thumblist Start
function thumblist() {
	var thumb = $('#thumblist');
	
  if (thumb.length) {
		thumb.carouFredSel({
			prev  : '.thumblist-box .prev',
			next  : '.thumblist-box .next',
			width : '100%',
			auto  : false
		})
		.parents('.thumblist-box').removeClass('load')
		.touchwipe({
			wipeLeft: function(){
				thumb.trigger('next', 1);
			},
			wipeRight: function(){
				thumb.trigger('prev', 1);
			},
			preventDefaultEvents : false
		});
  }
}
//Thumblist End

//Portfolio Filter Start
function isotopFilter() {
  $('.portfolio, .filter-box').each(function () {
		var filterBox   = $(this),
			filterElems = filterBox.find('.filter-elements'),
			buttonBox   = filterBox.find('.filter-buttons'),
			selector    = filterBox.find('.filter-buttons .active').attr('data-filter');
	
		if (!filterBox.hasClass('accordions-filter')) {
			filterElems.isotope({
				filter: selector,
				layoutMode: 'fitRows'
			});
			buttonBox.find('.dropdown-toggle').html(filterBox.find('.filter-buttons .active').text() + '<span class="caret"></span>')
		}
	
		buttonBox.find('a').on('click', function(e){
			var selector = $(this).attr('data-filter');
			e.preventDefault();
			
			if (!$(this).hasClass('active')) {
				buttonBox.find('a').removeClass('active');
				$(this).addClass('active');
				buttonBox.find('.dropdown-toggle').html($(this).text() + '<span class="caret"></span>');
		
				if (filterBox.hasClass('accordions-filter')) {
					filterElems.children().not(selector)
						.animate({ height : 0 })
						.addClass('e-hidden');
					filterElems.children(selector)
						.animate({ height : '100%' })
						.removeClass('e-hidden');
				} else {
					filterElems.isotope({
						filter: selector,
						layoutMode: 'fitRows'
					});
				}
			}
		});
  });
}
//Portfolio Filter End

//Charts Start
function chart() {
	$('.chart').each(function () {
		var $this             = $(this),
			line              = [],
			type              = 'line',
			width             = '100%',
			height            = '225',
			lineColor         = '#e1e1e1',
			fillColor         = 'rgba(0, 0, 0, .05)',
			spotColor         = '#a9a8a8',
			minSpotColor      = '#c6c6c6',
			maxSpotColor      = '#727070',
			verticalLineColor = '#e1e1e1',
			spotColorHovered  = '#1e1e1e',
			lineWidth         = 2,
			barSpacing        = 8,
			barWidth          = 18,
			barColor          = 'rgba(0, 0, 0, .2)',
			offset            = 0,
			sliceColors       = [],
			colorMap          = [],
			rangeColors       = ['#d3dafe', '#a8b6ff', '#7f94ff'],
			posBarColor	      = '#c6c6c6',
			negBarColor	      = '#727070',
			zeroBarColor      = '#a9a8a8',
			performanceColor  = '#575656',
			targetWidth       = 5,
			targetColor       = '#1e1e1e';

		if ($this.data('line'))
			line = $this.data('line').split(/,/);

		if ($this.data('height'))
			height = $this.data('height');

		if ($this.data('lineWidth'))
			lineWidth = $this.data('lineWidth');

		if ($this.data('lineColor'))
			lineColor = $this.data('lineColor');

		if ($this.data('verticalLineColor'))
			verticalLineColor = $this.data('verticalLineColor');

		if ($this.data('spotColorHovered'))
			spotColorHovered = $this.data('spotColorHovered');

		if ($this.data('spotColor'))
			spotColor = $this.data('spotColor');

		if ($this.data('minSpotColor'))
			minSpotColor = $this.data('minSpotColor');

		if ($this.data('maxSpotColor'))
			maxSpotColor = $this.data('maxSpotColor');

		if ($this.data('barSpacing'))
			barSpacing = $this.data('barSpacing');

		if ($this.data('barWidth'))
			barWidth = $this.data('barWidth');

		if ($this.data('barColor'))
			barColor = $this.data('barColor');

		if ($this.data('colorMap'))
			colorMap = $this.data('data-color-map').split(/, /);

		if ($this.data('offset'))
			offset = $this.data('offset');

		if ($this.data('sliceColors'))
			sliceColors = $this.data('sliceColors').split(/, /);

		if ($this.data('rangeColors'))
			rangeColors = $this.data('rangeColors').split(/, /);

		if ($this.data('targetWidth'))
			targetWidth = $this.data('targetWidth');

		if ($this.data('posBarColor'))
			posBarColor = $this.data('posBarColor');

		if ($this.data('negBarColor'))
			negBarColor = $this.data('negBarColor');

		if ($this.data('performanceColord'))
			performanceColor = $this.data('performanceColor');

		if ($this.data('fillColor'))
			fillColor = $this.data('fillColor');

		if ($this.data('type') == 'bar') {
			type = 'bar';
		} else if ($this.data('type') == 'pie') {
			type = 'pie';
			width = 'auto';
		} else if ($this.data('type') == 'discrete') {
			type = 'discrete';
		} else if ($this.data('type') == 'tristate') {
			type = 'tristate';
		} else if ($this.data('type') == 'bullet') {
			type = 'bullet';
		} else if ($this.data('type') == 'box') {
			type = 'box';
		}

		$this.sparkline(line, {
			type               : type,
			width              : width,
			height             : height,
			lineColor          : lineColor,
			fillColor          : fillColor,
			lineWidth          : lineWidth,
			spotColor          : spotColor,
			minSpotColor       : minSpotColor,
			maxSpotColor       : maxSpotColor,
			highlightSpotColor : spotColorHovered,
			highlightLineColor : verticalLineColor,
			spotRadius         : 6,
			chartRangeMin      : 0,
			barSpacing         : barSpacing,
			barWidth           : barWidth,
			barColor           : barColor,
			offset             : offset,
			sliceColors        : sliceColors,
			colorMap           : colorMap,
			posBarColor	       : posBarColor,
			negBarColor	       : negBarColor,
			zeroBarColor       : zeroBarColor,
			rangeColors        : rangeColors,
			performanceColor   : performanceColor,
			targetWidth        : targetWidth,
			targetColor        : targetColor
		});
	});
}
//Charts End

//Graph Start
function graph($re) {
	var tax_data;

	if ($re)
		$('.graph').html('');

	tax_data = [
		{
			period: '2011 Q3',
			licensed: 3407,
			sorned: 660
		}, {
			period: '2011 Q2',
			licensed: 3351,
			sorned: 629
		}, {
			period: '2011 Q1',
			licensed: 3269,
			sorned: 618
		}, {
			period: '2010 Q4',
			licensed: 3246,
			sorned: 661
		}, {
			period: '2009 Q4',
			licensed: 3171,
			sorned: 676
		}, {
			period: '2008 Q4',
			licensed: 3155,
			sorned: 681
		}, {
			period: '2007 Q4',
			licensed: 3226,
			sorned: 620
		}, {
			period: '2006 Q4',
			licensed: 3245,
			sorned: null
		}, {
			period: '2005 Q4',
			licensed: 3289,
			sorned: null
		}
	];

	if ($('#hero-graph').length) {
		Morris.Line({
			element    : 'hero-graph',
			data       : tax_data,
			xkey       : 'period',
			ykeys      : ['licensed', 'sorned'],
			labels     : ['Licensed', 'Off the road'],
			lineColors : ['#3e8e00', '#000000']
		});
	}

	if ($('#hero-donut').length) {
		Morris.Donut({
			element   : 'hero-donut',
			data      : [
			{
				label: 'Development',
				value: 25
			}, {
				label: 'Sales & Marketing',
				value: 40
			}, {
				label: 'User Experience',
				value: 25
			}, {
				label: 'Human Resources',
				value: 10
			}
			],
			colors    : ['#ff9d00'],
			height    : 100,
			formatter : function(y) {
				return y + '%';
			}
		});
	}

	if ($('#hero-area').length) {
		Morris.Area({
			element   : 'hero-area',
			data      : [
				{
					period: '2010 Q1',
					iphone: 2666,
					ipad: null,
					itouch: 2647
				}, {
					period: '2010 Q2',
					iphone: 2778,
					ipad: 2294,
					itouch: 2441
				}, {
					period: '2010 Q3',
					iphone: 4912,
					ipad: 1969,
					itouch: 2501
				}, {
					period: '2010 Q4',
					iphone: 3767,
					ipad: 3597,
					itouch: 5689
				}, {
					period: '2011 Q1',
					iphone: 6810,
					ipad: 1914,
					itouch: 2293
				}, {
					period: '2011 Q2',
					iphone: 5670,
					ipad: 4293,
					itouch: 1881
				}, {
					period: '2011 Q3',
					iphone: 4820,
					ipad: 3795,
					itouch: 1588
				}, {
					period: '2011 Q4',
					iphone: 15073,
					ipad: 5967,
					itouch: 5175
				}, {
					period: '2012 Q1',
					iphone: 10687,
					ipad: 4460,
					itouch: 2028
				}, {
					period: '2012 Q2',
					iphone: 8432,
					ipad: 5713,
					itouch: 1791
				}
			],
			xkey        : 'period',
			ykeys       : ['iphone', 'ipad', 'itouch'],
			labels      : ['iPhone', 'iPad', 'iPod Touch'],
			hideHover   : 'auto',
			lineWidth   : 2,
			pointSize   : 4,
			lineColors  : ['#00c3ff', '#ff9d00', '#3e8e00'],
			fillOpacity : 0.3,
			smooth      : true
		});
	}

	if ($('#hero-bar').length) {
		return Morris.Bar({
			element    : 'hero-bar',
			data       : [
			{
				device: 'iPhone',
				geekbench: 136
			}, {
				device: 'iPhone 3G',
				geekbench: 137
			}, {
				device: 'iPhone 3GS',
				geekbench: 275
			}, {
				device: 'iPhone 4',
				geekbench: 380
			}, {
				device: 'iPhone 4S',
				geekbench: 655
			}, {
				device: 'iPhone 5',
				geekbench: 1571
			}
			],
			xkey        : 'device',
			ykeys       : ['geekbench'],
			labels      : ['Geekbench'],
			barRatio    : 0.4,
			xLabelAngle : 35,
			hideHover   : 'auto',
			barColors   : ['#ef005c']
		});
	}
}
//Graph End

//Zoomer Start
function zoom() {
	if ($.fn.elevateZoom) {
		var image      = $('.general-img').find('img'),
			zoomType,
			zoomWidth  = 470,
			zoomHeight = 470,
			zoomType   = 'window';

		if (($('body').width() + scrollWidth) < 992) {
			zoomWidth  = 0;
			zoomHeight = 0;
			zoomType   = 'inner';
		}

		image.removeData('elevateZoom');
		$('.zoomContainer').remove();

		image.elevateZoom({
			gallery            : 'thumblist',
			cursor             : 'crosshair',
			galleryActiveClass : 'active',
			zoomWindowWidth    : zoomWidth,
			zoomWindowHeight   : zoomHeight,
			borderSize         : 0,
			borderColor        : 'none',
			lensFadeIn         : true,
			zoomWindowFadeIn   : true,
			zoomType		       : zoomType
		});
	}
}
// Zoomer End

//Blur Start
function blur() {
	$('.full-width-box .fwb-blur').each(function () {
		var blurBox    = $(this),
			img        = new Image(),
			amount     = 2,
			prependBox = '<div class="blur-box"/>';
		
		if (!blurBox.find('canvas').length) {
			img.src = blurBox.data('blurImage');
			
			if (
				blurBox.data('blurAmount') !== undefined &&
				blurBox.data('blurAmount') !== false
			)
				amount = blurBox.data('blurAmount');
			
			img.onload = function() {
				Pixastic.process(img, 'blurfast', {
					amount: amount
				});
			}
		
			blurBox
				.prepend( prependBox )
				.find('.blur-box')
				.prepend(img);
		}
		
		setTimeout(function(){
			var canvas = blurBox.find('canvas');
			
			if (canvas.width() == blurBox.width()){
				canvas.css({
					marginLeft : 0,
					marginTop : -((canvas.height() - blurBox.height()) / 2)
				});
			} else {
				canvas.css({
					marginTop : 0,
					marginLeft : -((canvas.width() - blurBox.width()) / 2)
				});
			}
	
			$('body').addClass('blur-load');
		}, 50);
	});
}
//Blur End

//Blur Page Start
function blurPage() {
	if ($('.blur-page').length) {
		var blurBox = $('.blur-page');

		blurBox.each(function () {
			var $this      = $(this),
				img        = new Image(),
				amount     = 2,
				prependBox = '<div class="blur-box"></div>';

			img.src = $this.attr('data-blur-image');

			if ($this.attr('data-blur-amount') !== undefined && $this.attr('data-blur-amount') !== false)
				amount = $this.attr('data-blur-amount');

			img.onload = function() {
				Pixastic.process(
					img,
					'blurfast',
					{
						amount: amount
					},
					function(){
						$('.blur-page').addClass('blur-load')
					}
				);
			}

			$this.prepend( prependBox ).find('.blur-box').prepend( img );
		});
	}
}
//Blur Page End

//One Page Start
function scrollMenu() {
	var link         = $('a.scroll'),
		header       = $('.header'),
		headerHeight = header.height();

	if(($('body').width() + scrollWidth) < 992)
		headerHeight = 0;

	$(document).on('scroll', onScroll);

	link.on('click', function(e) {
		var target = $(this).attr('href'),
			$this = $(this);

		e.preventDefault();

		link.removeClass('active');
			$this.addClass('active');

		if ($(target).length) {
			$('html, body').animate({scrollTop: $(target).offset().top - headerHeight}, 600);
		}
	});

	function onScroll(){
		var scrollPos = $(document).scrollTop();

		link.each(function () {
			var currLink = $(this),
				refElement;

			if ($(currLink.attr('href')).length) {
				refElement = $(currLink.attr('href'));

				if (
				refElement.position().top - headerHeight <= scrollPos &&
				refElement.position().top + refElement.height() > scrollPos) {
					link.removeClass('active');
					currLink.addClass('active');
				} else {
					currLink.removeClass('active');
				}
			}
		});
	}
	
  	$('a.scroll').on('click', function(e) {
		var header = $('.header'),
			headerHeight = header.height(),
			target = $(this).attr('href'),
			$this = $(this);
		
		e.preventDefault();
	
		if ($(target).length) {
			if(($('body').width() + scrollWidth) > 991)
				$('html, body').animate({scrollTop: $(target).offset().top - (headerHeight)}, 600);
			else
				$('html, body').animate({scrollTop: $(target).offset().top}, 600);
		}
	
		$('a.scroll').removeClass('active');
		$this.addClass('active');
	});
}
//One Page End

$(document).ready(function(){
	//Replace img > IE8
	if (/MSIE (\d+\.\d+);/.test(navigator.userAgent)){
		var ieversion = new Number(RegExp.$1);

		if (ieversion < 9) {
			$('img[src*="svg"]').attr('src', function() {
				return $(this).attr('src').replace('.svg', '.png');
			});
		}
	}

	//IE
	if (/MSIE (\d+\.\d+);/.test(navigator.userAgent))
		$('html').addClass('ie');

	//Touch device
	if( isTouchDevice )
		$('body').addClass('touch-device');

	//Bootstrap Elements
	$('[data-toggle="tooltip"], .tooltip-link').tooltip();

	$("a[data-toggle=popover]")
		.popover()
		.click(function(e) {
			e.preventDefault();
		});

	$('.btn-loading').click(function () {
		var btn = $(this);

		btn.button('loading');

		setTimeout(function () {
			btn.button('reset')
		}, 3000);
	});

	$('.disabled, fieldset[disabled] .selectBox').click(function () {
		return false;
	});

	$('.modal-center').on('show.bs.modal', centerModal);

	//Functions
	fullWidthBox();
	menu();
	footerStructure();
	tabs();
	accordions();
	headerCustomizer();
	modernGallery();
	animations();
	formStylization();
	addReview();
	if ($('.fwb-paralax').length) paralax();
	videoBg();
	loginRegister();
	loadingButton();
	productLimited();
	wordRotate();

	//Charts
	if ($('.chart').length && typeof chart == 'function') chart();
	if (typeof graph == 'function') graph();

	//Zoom
	if ($('.general-img').length && typeof zoom == 'function') zoom();

	//Blur
	if ($('.full-width-box .fwb-blur').length && typeof blur == 'function') blur();
	if ($('.blur-page').length && typeof blurPage == 'function') blurPage();

	//One Page
	if (typeof scrollMenu == 'function') scrollMenu();

	$(function() {
		locationSocialFeed();
		if ($('.full-height').length && typeof fullHeightPages == 'function') fullHeightPages();

		//Slider
		if ($('.progressive-slider').length && typeof progressiveSlider == 'function') progressiveSlider();

		//Banner set
		if ($('.banner-set').length && typeof bannerSetCarousel == 'function') bannerSetCarousel();

		//Сarousels
		if ($('.carousel-box .carousel').length && typeof carousel == 'function') carousel();

		//Thumblist
		if ($('#thumblist').length && typeof thumblist == 'function') thumblist();

		//Filter
		if ($('.portfolio, .filter-box').length && typeof isotopFilter == 'function') isotopFilter();
	});

	//Revolution Slider Start
	if ($('.tp-banner').length && $.fn.revolution) {
		var revolutionSlider = $('.tp-banner');

		if (revolutionSlider.closest('.rs-slider').hasClass('full-width')) {
			var body         = $('body'),
				width        = body.width(),
				topHeight    = 0,
				headerHeight = 104,
				height;

			if ($('#top-box').length) {
				if (body.hasClass('hidden-top'))
					topHeight = $('#top-box').outerHeight() - 32;
			}

			if ((body.width() + scrollWidth) >= 1200)
				height = body.height() - (topHeight + headerHeight);
			else
				height = 800;

			revolutionSlider.revolution({
				delay             : 6000,
				startwidth        : 1200,
				startheight       : height,
				hideThumbs        : 10,
				navigationHOffset : -545,
				navigationVOffset : 30,
				hideTimerBar      : 'on',
				onHoverStop    : 'on',
				navigation : {
					keyboardNavigation : 'on',
					keyboard_direction : 'horizontal',
					mouseScrollNavigation : 'off',
					onHoverStop : 'on',
					touch : {
						touchenabled : 'on',
						swipe_threshold : 75,
						swipe_min_touches : 1,
						swipe_direction : 'horizontal',
						drag_block_vertical : false
					},
					bullets : {
						enable : true,
						hide_onmobile : true,
						hide_under : 600,
						style : 'metis',
						hide_onleave : false,
						hide_delay : 200,
						hide_delay_mobile : 1200,
						direction : 'horizontal',
						h_align : 'center',
						v_align : 'top',
						h_offset : -545,
						v_offset : 30,
						space : 6,
						tmp : '<span class="tp-bullet-img-wrap"></span>'
					}
				}
			}).parents('.slider').removeClass('load');
		} else {
			revolutionSlider.revolution({
				delay          : 6000,
				startwidth     : 1200,
				startheight    : 500,
				navigationType : 'none',
				onHoverStop    : 'on',
				navigation : {
					keyboardNavigation : 'on',
					keyboard_direction : 'horizontal',
					mouseScrollNavigation : 'off',
					onHoverStop : 'on',
					touch : {
						touchenabled : 'on',
						swipe_threshold : 75,
						swipe_min_touches : 1,
						swipe_direction : 'horizontal',
						drag_block_vertical : false
					},
					arrows : {
						style : 'zeus',
						enable : true,
						hide_onmobile : true,
						hide_under : 600,
						hide_onleave : true,
						hide_delay : 200,
						hide_delay_mobile : 1200,
						left : {
							h_align : 'left',
							v_align : 'center',
							h_offset : 20,
							v_offset : 0
						},
						right : {
							h_align : 'right',
							v_align : 'center',
							h_offset : 20,
							v_offset : 0
						}
					}
				}
			}).parents('.slider').removeClass('load');
		}
	}
	//Revolution Slider End

	//Royal Slider Start
	if($.fn.royalSlider) {
		$('.royal-slider').royalSlider({
			arrowsNav             : true,
			loop                  : false,
			keyboardNavEnabled    : true,
			controlsInside        : false,
			imageScaleMode        : 'fill',
			arrowsNavAutoHide     : false,
			autoScaleSlider       : true,
			autoScaleSliderWidth  : 960,
			autoScaleSliderHeight : 350,
			controlNavigation     : 'bullets',
			thumbsFitInViewport   : false,
			navigateByClick       : true,
			startSlideId          : 0,
			autoPlay              : false,
			transitionType        :'move',
			globalCaption         : false,
			deeplinking           : {
				enabled : true,
				change : true,
				prefix : 'image-'
			},
			imgWidth              : 1920,
			imgHeight             : 700
		}).parents('.slider').removeClass('load');
	}
	//Royal Slider End

	//Layer Slider Start
	if ($('.layerslider-box').length && $.fn.layerSlider) {
		$('.layerslider-box').layerSlider({
			skinsPath        : 'css/layerslider/skins/',
			tnContainerWidth : '100%'
		});
	}
	//Layer Slider End

	//jPlayer Start
	if ($.fn.jPlayer){
		var player   = $('#jp_container'),
			single   = player.find('.jp-playlist li'),
			playlist = [],
			title    = '',
			artist   = '';

		if (single.length) {
			single.each(function() {
				var $this = $(this);

				if ($this.attr('data-files') !== undefined &&  $this.attr('data-files') !== false &&  $this.attr('data-files') !== '') {
					if ($this.attr('data-title') !== undefined &&  $this.attr('data-title') !== false)
						title = $this.attr('data-title');

					if ($this.attr('data-artist') !== undefined &&  $this.attr('data-artist') !== false)
						artist = $this.attr('data-artist');

					var files = $this.attr('data-files').split(';');

					files[0].split('.').pop(-1);

					if (files[0].split('.').pop(-1) == "mp3") {
						var mp3 = files[0];
						var oga = files[1];
					} else if (files[0].split('.').pop(-1) == "ogg") {
						var mp3 = files[1];
						var oga = files[0];
					}

					playlist.push({
						title  : title,
						artist : artist,
						free   : true,
						mp3    : mp3,
						oga    : oga
					});
				}
			});
		}

		new jPlayerPlaylist ({
			jPlayer : '#jquery_jplayer',
			cssSelectorAncestor : '#jp_container'
		},
			playlist
		, {
			swfPath : 'js/jplayer',
			supplied : 'oga, mp3',
			wmode : 'window',
			smoothPlayBar : true,
			keyEnabled : true
		});
	}
	//jPlayer End

	//Bootstrap Validator
	if($.fn.bootstrapValidator) {
		$('.form-validator').bootstrapValidator({
			excluded: [':disabled', ':hidden', ':not(:visible)'],
			feedbackIcons: {
				valid: 'glyphicon glyphicon-ok',
				invalid: 'glyphicon glyphicon-remove',
				validating: 'glyphicon glyphicon-refresh'
			},
			message: 'This value is not valid',
			trigger: null
		});
	}

	//Bootstrap Datepicker
	if($.fn.datepicker) {
		$('.datepicker-box').datepicker({
			todayHighlight : true,
			beforeShowDay: function (date){
				if (date.getMonth() == (new Date()).getMonth()) {
					switch (date.getDate()){
						case 4:
							return {
								tooltip: 'Example tooltip',
								classes: 'active'
							};
						case 8:
							return false;
						case 12:
							return 'green';
					}
				}
			}
		});
	}

	//Language-Currency
	if( !isTouchDevice ) {
		$('.language, .currency, .sort-by, .show-by').hover(function(){
			$(this).addClass('open');
		}, function(){
			$(this).removeClass('open');
		});
	}

	//Header Phone & Search
	$('.phone-header > a').click(function(e){
		e.preventDefault();
		$('.btn-group').removeClass('open');
		$('.phone-active').fadeIn().addClass('open');
	});

	$('.search-header > a').click(function(e){
		e.preventDefault();
		$('.btn-group').removeClass('open');
		$('.search-active').fadeIn().addClass('open');
	});

	$('.phone-active .close, .search-active .close').click(function(e){
		e.preventDefault();
		$(this).parent().fadeOut().removeClass('open');
	});

	$('body').on('click', function(e) {
		var phone  = '.phone-active',
			search = '.search-active';

		if ((!$(e.target).is(phone + ' *')) && (!$(e.target).is('.phone-header *'))) {
			if ($(phone).hasClass('open'))
				$(phone).fadeOut().removeClass('open');
		}

		if ((!$(e.target).is(search + ' *')) && (!$(e.target).is('.search-header *'))) {
			if ($(search).hasClass('open'))
				$(search).fadeOut().removeClass('open');
		}
	});

	//Cart
	$('.cart-header').hover(function(){
		if (($('body').width() + scrollWidth) >= 991 )
		  $(this).addClass('open');
	}, function(){
		if (($('body').width() + scrollWidth) >= 991 )
		  $(this).removeClass('open');
	});

	//Product
	if(!isTouchDevice) {
		$('.product, .employee')
			.hover(function(e) {
				e.preventDefault();

				$(this).addClass('hover');
			}, function(e) {
				e.preventDefault();

				$(this).removeClass('hover');
	  	});
	}

	$('body').on('touchstart', function (e) {
		e.stopPropagation();

		if ($(e.target).parents('.product, .employee').length == 0)
	  		$('.product, .employee').removeClass('hover');
	});

	$('.product, .employee').on('touchend', function(){
		if ($(this).hasClass('hover')) {
			$(this).removeClass('hover');
		} else {
			$('.product, .employee').removeClass('hover');
			$(this).addClass('hover');
		}
	});

	//Menu > Sidebar
	$('.menu .parent:not(".active") a').next('.sub').css('display', 'none');
	$('.menu .parent a .open-sub').click(function(e){
		e.preventDefault();

		if ($(this).closest('.parent').hasClass('active')) {
			$(this).parent().next('.sub').slideUp(600);
			$(this).closest('.parent').removeClass('active');
		} else {
			$(this).parent().next('.sub').slideDown(600);
			$(this).closest('.parent').addClass('active');
		}
	});

	//Price Regulator
	if($.fn.slider) {
		$('#Slider2').slider({
			from          : 5000,
			to            : 150000,
			limits        : false,
			heterogeneity : ['50/50000'],
			step          : 1000,
			dimension     : '&nbsp;$'
		});

		$('#filter').slider({
			from      : 2000,
			to        : 2015,
			limits    : false,
			step      : 1,
			dimension : '',
			calculate : function( value ){
				return ( value );
			}
		});
	}
	$('.jslider-pointer').html('\n\
		<svg x="0" y="0" viewBox="0 0 8 12" enable-background="new 0 0 8 12" xml:space="preserve">\n\
		  <path fill-rule="evenodd" clip-rule="evenodd" fill="#1e1e1e" d="M2,0h4c1.1,0,2,0.9,2,2l-2,8c-0.4,1.1-0.9,2-2,2l0,0c-1.1,0-1.6-0.9-2-2L0,2C0,0.9,0.9,0,2,0z"/>\n\
		</svg>\n\
	');

	//Contact Us
	$('#submit').click(function(){
		$.post('php/form.php', $('#contactform').serialize(),  function(data) {
			$('#success').html(data).animate({opacity: 1}, 500, function(){
				if ($(data).is('.send-true'))
					$('#contactform').trigger( 'reset' );
			});
		});
		return false;
	});

	//Subscribe
	$('.subscribe-form').submit(function(e){
		var form           = $(this),
			message        = form.find('.form-message'),
			messageSuccess = 'Your email is sended',
			messageInvalid = 'Please enter a valid email address',
			messageSigned  = 'This email is already signed',
			messageErrore  = 'Error request';

		e.preventDefault();

		$.ajax({
			url     : 'php/subscribe.php',
			type    : 'POST',
			data    : form.serialize(),
			success : function(data){
				form.find('.submit').prop('disabled', true);

				message.removeClass('text-danger').removeClass('text-success').fadeIn();

				switch(data) {
					case 0:
						message.html(messageSuccess).addClass('text-success').fadeIn();

						setTimeout(function(){
							form.trigger('reset');

							message.fadeOut().delay(500).queue(function(){
								message.html('').dequeue();
							});
						}, 2000);

						break;
					case 1:
						message.html(messageInvalid).addClass('text-danger').fadeIn();

						break;
					case 2:
						message.html(messageSigned).addClass('text-danger').fadeIn();

						setTimeout(function(){
							form.trigger('reset');

							message.fadeOut().delay(500).queue(function(){
								message.html('').dequeue();
							});
						}, 2000);

						break;
					default:
						message.html(messageErrore).addClass('text-danger').fadeIn();
				}

				form.find('.submit').prop('disabled', false);
			}
		});
	});

	//Regulator Up/Down
	$('.number-up').click(function(){
		var $value = ($(this).closest('.number').find('input[type="text"]').attr('value'));
		$(this).closest('.number').find('input[type="text"]').attr('value', parseFloat($value)+1);
		return false;
	});
	$('.number-down').click(function(){
		var $value = ($(this).closest('.number').find('input[type="text"]').attr('value'));
		if ($value > 1)
		  $(this).closest('.number').find('input[type="text"]').attr('value', parseFloat($value)-1);
		return false;
	});

	//Add to Cart
	$('.add-cart-form .add-cart').click(function() {
		$(this).next('.number').find('input[type="text"]').attr('value', 1);
		return false;
	});

	//Emergence Price
	$('.emergence-price').click(function(){
		$(this).animate({opacity: "0"}, 0);
		$(this).prev('.price').fadeIn(1000);
		return false;
	});

	//Gallery
	if ($.fn.fancybox){
		var options = {
			nextEffect  : 'fade',
			prevEffect  : 'fade',
			openEffect  : 'fade',
			closeEffect : 'fade',
			helpers     : {
				overlay : {
					locked : false
				}
			},
			tpl         : {
				closeBtn : '<a title="Kapat" class="fancybox-item fancybox-close" href="javascript:;">×</a>',
				next : '<a title="Sonraki" class="fancybox-nav fancybox-next" href="javascript:;">\n\
						<span><svg x="0" y="0" width="9px" height="16px" viewBox="0 0 9 16" enable-background="new 0 0 9 16" xml:space="preserve"><polygon fill-rule="evenodd" clip-rule="evenodd" fill="#fcfcfc" points="1,0.001 0,1.001 7,8 0,14.999 1,15.999 9,8 "/></svg></span>\n\
					</a>',
				prev : '<a title="Önceki" class="fancybox-nav fancybox-prev" href="javascript:;">\n\
						<span><svg x="0" y="0" width="9px" height="16px" viewBox="0 0 9 16" enable-background="new 0 0 9 16" xml:space="preserve"><polygon fill-rule="evenodd" clip-rule="evenodd" fill="#fcfcfc" points="8,15.999 9,14.999 2,8 9,1.001 8,0.001 0,8 "/></svg></span>\n\
					</a>'
			}
		};
		$('.gallery-images, .lightbox').fancybox(options);

		// product photos
		$('#fancybox-start').on('click', function()
		{
			var src = $(this).find('img').data('href');
			var srcs = [src];
			$('.product-photos').each(function (index, value) {
				if ($(this).data('href') != src) {
					srcs.push($(this).data('href'));
				}
			});
			$.fancybox(srcs, options);
		});
		$('.thumblist a').on('click',function()
		{
			var href = $(this).find('img').data('href');
			$('.general-img').find('img').attr('data-href',href).data('href',href);
		});
	}

	//Country
	if ($.fn.county){
		$('#count-down').county({
			endDateTime: new Date('2016/12/29 10:00:00'),
			reflection: false
		}).addClass('count-loaded');
	}

	// Scroll to Top
	$('#footer .up').click(function() {
		$('html, body').animate({
		  	scrollTop: $('body').offset().top
		}, 500);
		return false;
	});

	// Circular Bars - Knob
	if($.fn.knob) {
		$('.knob').each(function () {
			var $this   = $(this),
				knobVal = $this.attr('rel');

			$this.knob({
				'draw' : function () {
					$(this.i).val(this.cv + '%')
				}
			});

			$this.appear(function() {
				$({
					value: 0
				}).animate({
					value: knobVal
				}, {
					duration : 2000,
					easing   : 'swing',
					step     : function () {
						$this.val(Math.ceil(this.value)).trigger('change');
					}
				});
			}, {accX: 0, accY: -150});
		});
	}

	//Facebook
	if ($('.facebook-widget').length) {
		(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = '//connect.facebook.net/en_EN/all.js#xfbml=1';
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	}

	//Twitter
	if ($('.twitter-widget').length) {
		!function(d,s,id){
			var js,
			fjs=d.getElementsByTagName(s)[0],
			p=/^http:/.test(d.location)?'http':'https';

			if(!d.getElementById(id)){
				js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';
				fjs.parentNode.insertBefore(js,fjs);
			}
		}(document,'script','twitter-wjs');
	}

	//JS loaded
	$('body').addClass('loaded');

	//Scrollbar
	if ($.fn.scrollbar)
		$('.minimized-menu .primary .navbar-nav').scrollbar();

	//Retina
	if('devicePixelRatio' in window && window.devicePixelRatio >= 2) {
		var imgToReplace = $('img.replace-2x').get();

		for (var i=0,l=imgToReplace.length; i<l; i++) {
			var src = imgToReplace[i].src;
			src = src.replace(/\.(png|jpg|gif)+$/i, '@2x.$1');
			imgToReplace[i].src = src;

			$(imgToReplace[i]).load(function(){
				$(this).addClass('loaded');
			});
		};
	}
});

//Window Resize
(function(){
	var delay = (function(){
		var timer = 0;
		return function(callback, ms){
			clearTimeout (timer);
			timer = setTimeout(callback, ms);
		};
	})();

	function resizeFunctions(){
		//Functions
		fullWidthBox();
		menu();
		footerStructure();
		tabs();
		modernGallery();
		animations();
		if ($('.fwb-paralax').length) paralax();
		loginRegister();
		if ($('.full-height').length && typeof fullHeightPages == 'function') fullHeightPages();
		$('.modal-center:visible').each(centerModal);
		if ($('.progressive-slider').length && typeof progressiveSlider == 'function') progressiveSlider();
		if ($('.banner-set').length && typeof bannerSetCarousel == 'function') bannerSetCarousel();
		if ($('#thumblist').length && typeof thumblist == 'function') thumblist();
		if ($('.chart').length && typeof chart == 'function') chart();
		if (typeof graph == 'function') graph(true);
		if ($('.general-img').length && typeof zoom == 'function') zoom();
		if ($('.carousel-box .carousel').length && typeof carousel == 'function') carousel();
		if ($('.portfolio, .filter-box').length && typeof isotopFilter == 'function') isotopFilter();
		if ($('.full-width-box .fwb-blur').length && typeof blur == 'function') blur();
	}

	if(isTouchDevice) {
		$(window).bind('orientationchange', function(){
			delay(function(){
				resizeFunctions();
			}, 200);
		});
	} else {
		$(window).on('resize', function(){
			delay(function(){
				resizeFunctions();
			}, 500);
		});
	}

	$('.window-resize').on('click',function(e)
	{
		$(window).trigger('resize');
	});

}());