(function(){
	"use strict";

	jQuery(function($){
		var $photoAffix = $('#product-photo-affix'),
			$topLine = $('#top-line'),
			$zoomContainer = $('#medium-image').siblings('.med-img-zoom-container');

		$('#medium-image').find('.med-img-inner').each(function(){
			var img = $(this).find('img').attr('data-big-image');
			$(this).zoom({
				url: img,
				touch: false,
				target: $zoomContainer.get(0)
			});
		});
		$('.availability .collapse').on('shown.bs.collapse hidden.bs.collapse', function(){
			$photoAffix.affix('checkPosition');
		});

		$('#carousel-new, #carousel-bestsellers').on('slide.bs.carousel', function(e){
		    var slideTo = $(e.relatedTarget).index();
	    	$(this).find('.carousel-controls.bottom .slider-controls>li')
		    		.eq(slideTo).addClass('active').siblings('.active').removeClass('active');
		})

		$('#write-review_top').click(function(){
			var target = $(this).attr('href');
			var tab = $('[data-tab-target="'+target+'"]');

			// if tab is not active - make it active!
			if ( !tab.hasClass('active') ){
				tab.addClass('active').siblings().removeClass('active');
				$('.tab-target.shown').hide();
				$(target).show().addClass('shown').find('.hidden-blocks').hide();
				$('.btn-feedback-toggle').removeClass('shown');
			}

			// expand form if it is not expanded yet
			if ( $('.btn-post-feedback').is(':visible')){
				$(target).find('.btn-post-feedback').trigger('click');
			}
		})

		// Just a DEMO of how to use spin.js!
		// I've changed from defaults: length (20 -> 5), width (10 > 3), radius (30 > 8)
		var spinner = new Spinner({
			lines: 13, // The number of lines to draw
			  length: 5, // The length of each line
			  width: 3, // The line thickness
			  radius: 8, // The radius of the inner circle
			  corners: 1, // Corner roundness (0..1)
			  rotate: 0, // The rotation offset
			  direction: 1, // 1: clockwise, -1: counterclockwise
			  color: '#000', // #rgb or #rrggbb or array of colors
			  speed: 1, // Rounds per second
			  trail: 60, // Afterglow percentage
			  shadow: false, // Whether to render a shadow
			  hwaccel: false, // Whether to use hardware acceleration
			  className: 'spinner', // The CSS class to assign to the spinner
			  zIndex: 2e9, // The z-index (defaults to 2000000000)
			  top: '50%', // Top position relative to parent
			  left: '50%' // Left position relative to parent
		});
		var rotating = false;
		var busy = $('.btn-buy.busy');
		if ( busy.length > 0){
			rotating = true;
			spinner.spin();
			busy.append(spinner.el);
		}

		$('.btn-buy.busy').click(function(){
			var _ = $(this);
			if (rotating) {
				rotating = false;
				spinner.stop();
			} else {
				rotating = true;
				spinner.spin();
				_.append(spinner.el);

			}

		})
		// END OF DEMO

	// =================== things to be done on server! ===========================
		// on out of stock items we still show the price (just color is changed to
		// gray. So I want users to be able to hover over it and see tooltip)
		$('.out-of-stock .price-usd').attr({
			'data-toggle': 'tooltip',
			'title': 'Last Price!'
		});
	// ====================== end of to be done on server =========================

	// ====================== VARIABLES ===========================================
		// for processing hover on menu item
		var menuItems = $('.main-menu').children('li:not(.bullet):not(.line)');

		// for controlling ajax search popup (inserting into search forms)
		var ajaxSearch = $('#ajax-search-popup');
		var formSearch = $('#form-search');
		var formSearchMobile = $('.form-search-mobile');

		// for processing hover on basket-content
		var basketHeader = $('.basket-header');

		// for processing search field on mobiles
		var searchWrap;
		var timeout;

		// for processing hover on catalog item
		var height;

		// for selecting input content on focus
		var focusedElement;

		// for quantity field value changing functionality
		var timer;

		// for showing name of chosen file when uploading photos for avatar
		var avatarInput = $('#avatar');

		// timers for "added to basket" popup
		var added2basketRemove;
		var added2basketShow;

		// spans for passing to the function which adds items to the basket
		var basketWrapper = $('.basket-toggle-btn');
		var itemsInBasketSpan = basketWrapper.find('.quan');

		// timer for window resize
		var doResize;
	// ==================== END OF VARIABLES ======================================

	// ==================== FUNCTIONS PERFORMED ON PAGE LOAD ======================
		// showing opened catalog menus, filters and such (=> if you want to have
		// some expandable item be opened on page load - add .expanded to it
		// initially in HTML
		$('.expandable.expanded, .price-range-section').children('.expand-content').show();
		// .price-range-section is different from other expandables, that's why
		// it is listed separately

		// initialize tooltips
		$('[data-toggle="tooltip"]').tooltip({
			'trigger': 'hover'
		});

		$('.switchable').on('click', function(e){
			e.preventDefault();
			var $t = $(this),
				text = $t.attr('data-toggle-text'),
				title = $t.attr('title') || $t.attr('data-original-title');
			$t.attr('data-toggle-text', title).attr('title', text).toggleClass('active');

			if ($t.is('[data-toggle="tooltip"]')) $t.tooltip('fixTitle').tooltip('show');
		});

		// if there are some tabs - hide all and show only active
		$('.tab-target').hide();
		$('.hidden-blocks').hide();
		$($('.um_tab.active').attr('data-tab-target')).show().addClass('shown');

		// review form hiding along with associated btn
		//BACK_END
		$('.form_post-feedback').not('.show').hide();
		$('.btn-post-feedback').show();

		// form elements styling
		//BACK_END
		// $('select').not('.slylizer-skip').styler({
		// 	selectVisibleOptions: 4,
		// });

		// initializing custom scrollbars
		$('.jq-selectbox__dropdown ul, .v-scrollbar, \
			.size-selection, .color-selection, .brand-selection, \
			.table-wrapper, #settings-panel').mCustomScrollbar();
		$('.submenu-specialblock, .h-scrollbar, .accessories').mCustomScrollbar({
		 	axis:"x",
		 	advanced:{ autoExpandHorizontalScroll: true },
		 	mouseWheel:{ enable: false }
		})

		// dynamically adding circles and lines to horizontal scrollbar dragger
		// we can't do it via HTML or on server, because the markup of custom
		// scrollbar itself is created dynamically
		$('.mCSB_horizontal .mCSB_dragger_bar').append('<div class="h-scrollbar-circle left"></div>');
		$('.mCSB_horizontal .mCSB_dragger_bar').append('<div class="h-scrollbar-circle right"></div>');
		$('.mCSB_horizontal .mCSB_dragger_bar').append('<div class="h-scrollbar-lines-container"></div>');
		$('.h-scrollbar-lines-container').append('<div class="v-line vl1" />');
		$('.h-scrollbar-lines-container').append('<div class="v-line vl2" />');
		$('.h-scrollbar-lines-container').append('<div class="v-line vl3" />');
		$('.h-scrollbar-lines-container').append('<div class="v-line vl4" />');

	// ============== END OF FUNCTIONS PERFORMED ON PAGE LOAD =====================
	// ================================= HANDLERS =================================
		$('#form-search .textinput, .form-search-mobile .textinput').on('focus keyup blur change', function(e){
			if ( 27 === e.keyCode ){
				return true; // if ESC - let ESC handler do its job
			}
			if ($(this).val()){
				if (!ajaxSearch.hasClass('shown')) ajaxSearch.addClass('shown');
			} else {
				if (ajaxSearch.hasClass('shown')) ajaxSearch.removeClass('shown');
			}
		})

		$('.btn-item-action').on('click', function(e){
			e.stopPropagation(); // to prevent clicks passing to favorite item
			// (.btn-item-action.delete are there)
		})

		// city popup switch
		$('.btn-city-select, .btn-city-close').on('click', function(e){
			e.preventDefault();
			var opened = $('.btn-city-select, .btn-city-close, .btn-closebtn').filter('.um_opened');
			if (opened.length === 0){
				closePopups();
				umPopupToggle($(this));
				$('body').addClass('darken');
			}
			else {
				closePopups();
			}
		})

		// settings panel switch
		$('.btn-settings-toggle, .settings-close').on('click', function(e){
			e.preventDefault();
			var opened = $('.btn-settings-toggle, .settings-close').filter('.um_opened');
			if (opened.length === 0){
				closePopups();
				umPopupToggle($(this));
			}
			else closePopups();
		})

		// active city switch
		$('.city-select-panel li > span').on('click', function(){
			if ($(this).parent().hasClass('active')) return false;
			$(this).parent().addClass('active').siblings().removeClass('active');
			var city = $(this).html();
			$(this).parents('.city-select-panel').find('.current-city').html(city);
			return false;
		});

		// set position of submenus
		menuItems.each(function(){
			processSubmenu($(this));
		})

		// opening and closing search field on mobiles
		// also setting focus onto it after animation (which is set to .4s)
		$('.btn-search-toggle').on('click', function(){
			clearTimeout(timeout);
			searchWrap = $(this).siblings('.form-search-mobile');
			if (searchWrap.hasClass('shown')){
				searchWrap.removeClass('shown');
			} else {
				closeToggles(); // don't forget to close all other windows!
				searchWrap.addClass('shown');
				timeout = setTimeout(function(){
					searchWrap.find('input').focus();
				}, 500);
			}
		})

		// switching active states of various lists
		$('.slider-controls li, \
			.btn-alphabet, \
			.colors-choice>ul>li').on('click', function(){
			$(this).addClass('active').siblings().removeClass('active');
		});

		// tabs switch
		$('.um_tab').on('click', function(){
			if ($(this).hasClass('active')) return;
			$(this).addClass('active').siblings().removeClass('active');
			var target = $(this).attr('data-tab-target');

			$('.tab-target.shown').hide();
			$(target).show().addClass('shown').find('.hidden-blocks').hide();
			$('.btn-feedback-toggle').removeClass('shown');
		})

		// hide/show hidden-blocks in feedback on product page
		$('.btn-feedback-toggle').on('click', function(){
			if ($(this).hasClass('shown')){
				$(this).removeClass('shown');
				$(this).siblings('.tab-target.shown').find('.hidden-blocks').slideUp(400);
			} else {
				$(this).addClass('shown');
				$(this).siblings('.tab-target.shown').find('.hidden-blocks').slideDown(400);
			}
		})

		// switching password display on/off
		$('.password-toggle').on('click', function(){
			var field = $(this).siblings('input');
			if (field.attr('type') == 'text'){
				field.attr('type', 'password');
				return false;
			}
			if (field.attr('type') == 'password'){
				field.attr('type', 'text');
				return false;
			}
		});

		// expandable menus functionality
		$('.expandable').on('click', function(e){
			if (!Modernizr.mq('(max-width: 767px)') && $(this).hasClass('xs-only'))
				return;
			e.preventDefault();
			e.stopPropagation();
			if (!$(this).hasClass('allow-multiple-expanded')){
				$(this).parent().find('.expanded')
					.not($(this))
					.removeClass('expanded')
					.find('.expand-content').slideUp(400);
			}

			$(this).toggleClass('expanded')
				.children('.expand-content').stop(true,true).slideToggle(400);
		});

		$('.expandable li, .expand-content').on('click', function(e){
			e.stopPropagation();
		});
		// END OF expandable menus functionality

		// duplicating expandable menu functionality for main-menu on mobiles
		// which items shouldn't have "expandable" class, because that
		// cause great problems (conflicts) with its default "on hover" behavior

		// var menuElements = $('.main-menu>li');

		// console.log(menuElements);
		// if (menuElements.lenght != 0) {
		// 	var i = menuElements.lenght;
		// 	menuElements.each(function(t,j){
		// 		console.log(t,j,menuElements.length/2);
		// 		j.addClass('to-left');
		// 	});
		// 	console.log(menuElements.length/2);
		// }

		function initMainMenu() {
			var mm = $('.main-menu');
			mm.addClass('with-js');
			mm.find('.menu-item-has-children').prepend('<i class="menu-toggle-btn"></i>');

			mm.find('.menu-toggle-btn').on('click', function(){
				$(this).toggleClass('toggle-arrow').closest('li').children('.sub-menu').collapse('toggle');
			});
			mm.find('.menu-item-has-children').on('mouseover', function(){
				$(this).siblings().find('.sub-menu').collapse('hide');
				$(this).addClass('toggle-arrow').closest('li').children('.sub-menu').stop().collapse('show');
				$(this).on('shown.bs.collapse', function(){
					if ($(this).is(":hover")) {} else {$(this).children('.sub-menu').collapse('hide')}
				})
			});
			mm.find('.menu-item-has-children').on('mouseleave', function(){
				$(this).removeClass('toggle-arrow').closest('li').children('.sub-menu').stop().collapse('hide');
			});
		}

		initMainMenu();

		// opening and closing of main menu and site menu on mobiles
		// $('.btn-sitemenu-toggle').on('click', function(){
		// 	var siteMenu = $('.header-links');
		// 	if (siteMenu.is(':visible')){
		// 		closeToggles();
		// 	} else {
		// 		closeToggles(); // don't forget to close other toggles!
		// 		siteMenu.slideToggle(500);
		// 	}
		// })
		// $('.btn-mainmenu-toggle').on('click', function(){
		// 	var mainMenu = $('.main-menu');
		// 	if (mainMenu.is(':visible')){
		// 		closeToggles();
		// 		$(this).removeClass('menu-opened');
		// 		mainMenu.removeClass('shown');
		// 	} else {
		// 		closeToggles(); // don't forget to close other toggles!
		// 		mainMenu.slideToggle(500).addClass('shown');
		// 		$(this).addClass('menu-opened');
		// 	}
		// })

		$('.btn-mainmenu-toggle').on('click', function(){
			$(this).closest('.main-menu-wrap').children('.main-menu').collapse('toggle');
		});

		// price-range-section is NOT standard expandable, because here
		// the ORDER of sliding and setting .expanded class is important
		// this is due to visible property used in its styling
		$('.price-range-section').on('click', function(){
			var content = $(this).children('.expand-content');
			if ($(this).hasClass('expanded')){
				$(this).removeClass('expanded');
				content.slideUp(400);
			} else {
				content.slideDown(400, function(){
					$(this).parents('.price-range-section').addClass('expanded');
				});
			}
		});

		// show/hide full filter
		$('.btn-show-full-filter').on('click', function(){
			$('.full-filter').slideToggle(600);
			$(this).toggleClass('expanded');
		});

		// review form toggling
		$('.btn-post-feedback').on('click', function(e){
			//BACK_END edits
			$(this).siblings('.form_post-feedback').slideDown(500, function(){$(this).find('select').trigger('refresh');});
			$(this).siblings('.btn-cancel-feedback').show();
			$(this).hide();
			return false; // preventDefault and stopPropagation in one
		});
		$('.btn-cancel-feedback').on('click', function(e){
			$(this).siblings('.form_post-feedback').slideUp(500);
			$(this).siblings('.btn-post-feedback').show();
			$(this).hide();
			return false; // preventDefault and stopPropagation in one
		});

		// for these buttons to not reload the page
		$('.btn-quantity-change').on('click', function(e){
			e.preventDefault();
		});
		$('.btn-quantity-change1').on('click', function(e){
			e.preventDefault();
		});

		// switching active show-by label
		$('.show-by label').on('click', function(){
			if ($(this).hasClass('active')) return;
			$(this).addClass('active').siblings('label').removeClass('active');
		});

		// inputs content select on focus
		$('input').on('focus', function(){
			if (focusedElement == $(this)) return;
			// ^ if input is already being edited, we don't need to
			// select its full content again. Otherwise it's impossible
			// to place cursor in the desired place
			focusedElement = $(this);
			setTimeout(function () { focusedElement.select(); }, 100);
			// ^ timeout is a hack for Chrome. Without it select doesn't work.
		});

		// quantity field functionality
		$('.btn-quantity-change').on('mousedown', function(){
			var quanInput = $(this).parent().find('input');
			var curValue = parseInt(quanInput.val(), 10);
			if (isNaN(curValue) || curValue<1) curValue = 1;
			if ($(this).hasClass('plus')) {
				curValue += 1;
				quanInput.val(curValue);
				timer = setInterval(function(){
					curValue += 1;
					quanInput.val(curValue);
				}, 100);
			} else {
				curValue -= 1;
				if (curValue < 1) curValue = 1;
				quanInput.val(curValue);
				timer = setInterval(function(){
					curValue -= 1;
					if (curValue < 1) curValue = 1;
					quanInput.val(curValue);
				}, 100);
			}
		}).on('mouseup mouseleave', function(){
			clearInterval(timer);
		});
		$('.quantity-wrapper input').change(function(){
			var newValue = $(this).val();
			if (isNaN(newValue) || newValue < 1) $(this).val(1);
		});

		// closing everyting on ESC
		$( window ).on('keydown', function(event){
			if ( 27 == event.keyCode ) {
				closeEverything();
				ajaxSearch.removeClass('shown');
				if (Modernizr.mq('(max-width: 767px)')){
					closeToggles();
				}
			}
		});

		// closing some things on click outside them
		$( document ).on('mouseup', function(e){
			if (!$('.popup-on-buy').is(e.target)){
				$('.popup-on-buy').fadeOut('400');
			}

			if (!ajaxSearch.is(e.target) && ajaxSearch.has(e.target).length === 0 &&
				!formSearch.is(e.target) && formSearch.has(e.target).length === 0 &&
				!formSearchMobile.is(e.target) && formSearchMobile.has(e.target).length === 0) {
				ajaxSearch.removeClass('shown');
			}
		})

		// // turning whole item blocks into links
		// $('.favorite-item, .recommended-item').click(function(e){
		// 	window.location.href = $(this).find('a').attr('href');
		// });

		// Showing name of chosen file when uploading photos for avatar
		avatarInput.change(function(e){
			var fileName = $(this).val().replace(/.*(\/|\\)/, '');
			if (!fileName) {
				$('#chosen-file').html('*file is not seltected');
			} else {
				$('#chosen-file').html(fileName);
			}
		});

		// forms validation
		$('.form_login, .form_registration').on('submit', function(e){
			e.preventDefault();
			var valid = true;
			$(this).find('input[required]').each(function(){
				if (!$(this).val()) valid = false;
				return false;
			})
			if(valid) window.location.href="account-settings.php";
		})

		// in html markup we have 1 popup for notification about adding items into
		// basket. This function moves that popup around, shows and hides it
		function basketAddPopup(thePopup, basketBtn){
			thePopup.prependTo(basketBtn);

			// important thing here is that if we prepend the popup AND
			// add class at the same time - animation won't work. So we need
			// to add some time (10 ms :D ) before changing class
			clearTimeout(added2basketShow);
			added2basketShow = setTimeout(function(){
			 	thePopup.addClass('shown');
			}, 10);

			// remove popup automatically
			clearTimeout(added2basketRemove);
			added2basketRemove = setTimeout(function(){
				thePopup.removeClass('shown');
			}, 1500);
		}

		// in different places btn-buy and item price have different
		// locations relative to each other. Here I set all them
		// explicitly
		// There are 3 such buy buttons: in catalog...
		$('.catalog .btn-buy2').on('click', function(){
			addToBasket(itemsInBasketSpan, basketWrapper, $(this));
			basketAddPopup($('.added2basket'), $(this));
		})
		// ...on product page for product...
		$('.product-info .btn-buy').on('click', function(){
			addToBasket(itemsInBasketSpan, basketWrapper, $(this));
			basketAddPopup($('.added2basket'), $(this));
		})
		// ...on product page for collections (profitable items)...
		$('.profitable-items-price .btn-buy').on('click', function(){
			addToBasket(itemsInBasketSpan, basketWrapper, $(this));
			basketAddPopup($('.added2basket'), $(this));
		})

		// function to launch after window resize ends
		function onResizeComplete(){
			if (!Modernizr.mq('(max-width: 767px)')){
				$('.header-links').show();
				$('.main-menu').show();
			} else {
				$('.header-links').hide();
			}

			menuItems.each(function(){
				processSubmenu($(this));
			});

			if (!$photoAffix.length) return;
			if ($photoAffix.hasClass('affix') || $photoAffix.hasClass('affix-bottom')){
				var $wrap = $photoAffix.closest('.affix-wrap');
				$photoAffix.css('width', $wrap.outerWidth());
			}
			$photoAffix.affix('checkPosition');
		}

		(function(){
			function getTop(){
				return Modernizr.mq('(max-width: 767px)') ? 40 : 1;
			}
			$topLine.affix({
				offset:{
					top: getTop
				}
			});
		})();
		
		

		$(window).resize(function(){
			clearTimeout(doResize);
			doResize = setTimeout(onResizeComplete, 300);
		});


		$('.sitemap-item-toggle').on('click', function(){
			var $t = $(this);
			$t.toggleClass('collapsed');
			$t.siblings(".collapse").collapse("toggle");
		});
		
		var $sitemap = $('#sitemap'),
			$collapses = $sitemap.find('.collapse'),
			$minify = $('#sitemap-minify'),
			$expand = $('#sitemap-expand'),
			$collapseToggles = $sitemap.find('.sitemap-item-toggle'),
			checkTimeout;

		function delayCheck(){
			if ($sitemap.find('.collapsing').length){
				clearTimeout(checkTimeout);
				checkTimeout = setTimeout(delayCheck, 100);
			} else check();
		}
		function check(){
			var checked = $collapses.filter('.in');
			if ( checked.length === 0 ) $minify.addClass('disabled');
			else $minify.removeClass('disabled');
			
			var notChecked = $collapses.not('.in');
			if ( notChecked.length === 0) $expand.addClass('disabled');
			else $expand.removeClass('disabled');
		}

		// EVENTS
		$minify.on('click', function(){
			$collapses.collapse('hide');
			$collapseToggles.addClass('collapsed');
		})
		$expand.on('click', function(){
			$collapses.collapse('show');
			$collapseToggles.removeClass('collapsed');
		})
		$sitemap.on('shown.bs.collapse hidden.bs.collapse', delayCheck);

		// delayCheck();

	// ============================== END OF HANDLERS =============================
	});

var counter = 5,
	$imgAff = jQuery('#product-photo-affix .med-img-inner img'); 
	 
	function imageLoaded() {
		console.log('counter before');
		counter--; // reduce the value of the counter
		if( counter === 0 ) {

			console.log('counter');
			// We execute our code when all images are loaded
			var $photoAffix = $('#product-photo-affix');
			 if ($photoAffix.length) {
				var $t = $photoAffix,
				$targetTop = $t.closest('.affix-wrap'),
				$productInfo = $t.closest('.affix-target-bottom').find('.product-info'),
				$targetBottom = $t.closest('.affix-target-bottom');


					console.log($t.height());
					console.log($productInfo.height());


				if  ($t.height() > $productInfo.height()) {
					console.log('The picture above');
				} else {console.log('The information above is');}
			}
		}
	}



	if( $imgAff.complete ) {
		imageLoaded.$imgAff;
	} else {
		jQuery(this).one('load', imageLoaded);
	}

	jQuery('.main-menu').collapse('hide').find('.sub-menu').collapse('hide');
					
})();
