jQuery( function( $ ) {
	// star update cart
	$('#linktobut').on('click', function(){
		$('#upd_but').click();
	});
	$('.ajax_add_to_cart').on('click', function(){
	setTimeout(function() {window.location.reload();}, 1100);
	});
	//cart empty header
	$('.thing-empty').on('click', function(e) {
	e.preventDefault();
	});
	//menu catalog active
	if ( $('.catalog-menu .expandable .catalog-menu-lvl1 li').hasClass('active') ) {
		$('.active').closest('.expandable').addClass('expanded');
		$('.catalog-menu-lvl1 .active').parent().css({'display' : 'block'});
	}
	// get class brands
	$(".pwb-single-product-brands").addClass("brand-link")
	//subscribe2
	if ($('.forsub2 p').hasClass('s2_message')) { 
		$('.forsub2 .s2_message').wrap('<form method="post" action="#" class="form-group subscribe-form"><div class="input-group"></div></div>');
		$('.forsub2 .s2_message').remove();
		$('.input-group').append('<input type="text" name="email" id="s2email" placeholder="Want to subscribe? Enter email here" class="textinput form-control"><div class="input-group-btn"><button name="subscribe" class="btn btn-subscribe flaticon-right20"></button></div>'); 
	} else {
	$('.forsub2 form').addClass('form-group subscribe-form');
	$('.forsub2 p').first().wrap('<div class="input-group"></div>');
	$('.forsub2 form p').remove();
	$('.input-group').append('<input type="text" name="email" id="s2email" placeholder="Want to subscribe? Enter email here" class="textinput form-control"><div class="input-group-btn"><button name="subscribe" class="btn btn-subscribe flaticon-right20"></button></div>');
	}
	//city
	$('.city-select-panel span').on('click', function(){
	});
	var city_now = $('.header-btn').find('.btn-city-select').html();
				$('.city-select-panel li').each(function(i,elem) {
                if ($(this).html() == city_now) {
                    $(this).remove();
                    $('.city-select-panel').find('.current-city').html(city_now);
                    return false;
                } else { }
            });
			$('.btn-close-modal').on('click', function(){
				add_city_user();
			});
	$(".city-name").keyup(function() { 
		if ( $('.city-name').val().length > 1) {
            var form_data = $(this).val(); 
            jQuery.ajax({
		      type: "POST",
		      data: {
                action: 'apparel_ajax_change_city',
                state_name: form_data,
		      },
		      url: "/wp-admin/admin-ajax.php",
		      success: function(html){
		      	if (html.length > 1) {
			      	$('label').find('.ys-loc-autocomplete').remove();
		 			$('label').append('<span class="ys-loc-autocomplete" style="display: block;">' + html + '</span>'); 
		 				$('.ys-loc-autocomplete').find('.imstate').on('click', function(){ 
		 					if ( $(this).is(':hover') ) {
		 						var stateactive = $(this).text();
		 						$('.city-select-panel li').removeClass('active');
		 						$('.city-select-panel ul').append('<li class="active"><span>' + stateactive + '</span></li>'); 
		 						$('.header-btn').find('.btn-city-select').html(stateactive);
		 						$('.city-select-panel').find('.current-city').html(stateactive);
		 						add_city_user();
		 						closePopups();
		 					}	
		 				});
	 			}
	 			else if (html.length <= 0) {
	 				$('label').find('.ys-loc-autocomplete').remove();
	 				var stateinput = $('.city-name').val();
			 				$('.city-select-panel li').removeClass('active');
					 		$('.city-select-panel li').last().remove();
					 		$('.city-select-panel ul').append('<li class="active"><span>' + stateinput + '</span></li>'); 	
					 		$('.city-select-panel').find('.current-city').html(stateinput);
	 			}
	 		  },
   		 	});
		}	
		if ( $('.city-name').val().length < 1) {
				$('label').find('.ys-loc-autocomplete').remove();
	 		}
	});    
	$('.city-select-panel li span').on('click', function(e){
		e.preventDefault();
		add_city_user();
		closePopups();
	})
	$(document).mouseup(function (e) {
	    var container = $('.ys-loc-autocomplete');
	    if (container.has(e.target).length === 0){
	        container.hide();
	    }
	})
	$('.city-name').on('click', function(){
		$('.ys-loc-autocomplete').css({'display' : 'block'});
	})
	$('.modal-header .close').on('click', function(e){
		e.preventDefault();
		closeEverything();
	})
	function add_city_user(){
		if ($('.city-select-panel li span').parent().hasClass('active')) {
			var number_city_html = $('.active').html();
			$('.header-btn').find('.btn-city-select').html(number_city_html);
				jQuery.ajax({
					type: "POST",
					data: {
				        action: 'apparel_ajax_add_city_popun',
				        number_city_ajax: number_city_html,
					},
					url: "/wp-admin/admin-ajax.php",
					success: function(html){
						$('.header-btn').find('.btn-city-select').html(html.slice(0, -1));
					}
				});
		}
	}
	//add complect
	$('.add_complect_item').on('click', function(e){
		e.preventDefault();
		var add_item0 = $('.recommended-item-info .iditem0').text(); 
		var add_item1 = $('.recommended-item-info .iditem1').text(); 
		var add_item2 = $('.recommended-item-info .iditem2').text(); 
		var add_item3 = $('.recommended-item-info .iditem3').text(); 
            jQuery.ajax({
		      type: "POST",
		      data: {
                action: 'apparel_ajax_add_complects',
                new_item1: add_item0,
                new_item2: add_item1,
                new_item3: add_item2,
                new_item4: add_item3,
		      },
		      url: "/wp-admin/admin-ajax.php",
		      success: function(html){
				setTimeout(function() {window.location.reload();}, 300);
		      }
		  });
	});
	//generate reg
   		if($('.form_registration').on('click', '#auto-generation', function() {
   			var ckeck_reg = 'yes',
   			fal = '#auto-generation-false',
   			tru = '#auto-generation';
   			$(fal).prop("checked", false);
   			ajax_change_reg (ckeck_reg);
   		}));
   		if($('.form_registration').on('click', '#auto-generation-false', function() {
   			var ckeck_reg = 'no';
   			fal = '#auto-generation',
   			tru = '#auto-generation-false';
   			$(fal).prop("checked", false);
   			ajax_change_reg (ckeck_reg);
   		}));
	function ajax_change_reg (ckeck_reg){
		jQuery.ajax({
			type: "POST",
			data: {
		        action: 'apparel_ajax_wooc_generate',
		        reg_generate_status: ckeck_reg,
			},
			url: "/wp-admin/admin-ajax.php",
			success: function(html){
				$(".form_registration").empty();
				$(".form_registration").html(html.slice(0, -1)); 
				$('.woocomerce-FormRow input[name="_wp_http_referer"]').val("#");
			}
		});		
	}
	$('.form_registration').on('click', '.password-toggle', function(){
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
	//intermediate
	$('.thumbnails .slick-slide').on('click', function(){
		var titleimg = $(this).find('img').attr('title');
		$('.intermediate').find('.current-photo-info').empty();
		$('.current-photo-info').append(titleimg);
	});
    // Orderby
    $( '.view-options-form.sort-by' ).on( 'change', 'select.orderby', function() {
        $( this ).closest( 'form' ).submit();
    });

    $( document ).on( 'click', '.shipping-calculator-button-ap', function() {
        $( '.shipping-calculator-form' ).slideToggle( 'slow' );
        $( '.shipping-calculator-form select' ).trigger('refresh');
        return false;
    });
	
	$('input.item-quantity').on('change', function(){
		var $form = $(this).closest('form').find('.ajax_add_to_cart').data('quantity', $(this).val());
	});
	$('.btn-quantity-change').on('mouseup mouseleave', function(){
		var $form = $(this).closest('form').find('.ajax_add_to_cart').data('quantity', $(this).parent().find('input').val());
	});

    $( document.body ).on('country_to_state_changing', function(e,country, $wrapper) {
        $statebox   = $wrapper.find( '#billing_state, #shipping_state, #calc_shipping_state' );
        if($statebox.is( 'input' ))
            $statebox.addClass('textinput');
        else
            $statebox.removeClass('textinput');
	});
	//catalog slick
	if ($('.view-type-switcher button').hasClass('btn-blocks') ){
		create_catalog_slide();
	}
	function create_catalog_slide(){
			var carousels = $('.catalog-blocks').find('.catalog-item-thumbnails');
	        carousels.each(function(){
	            if ( !$('.catalog-blocks').not('slick-initialized') ){
	                $(this).slick({
	                    slidesToShow: 4,
	                    infinite: false,
	                    variableWidth: true,
	                    focusOnSelect: true,
	                    onInit: function(slick){
	                    //slick.$slides.eq(0).addClass('active');
	                    },
	                });
	            }
	        })
	   	$('.catalog-item-thumbnails').on('mouseenter', '.slick-slide', function(){
            if ($(this).is('.slick-slide.active')) return;
            $(this).addClass('active').siblings().removeClass('active');
            var srcImg = $(this).find('img');
            var bigImg = $(this).closest('.catalog-item-thumbnails').siblings('a').find('img');
            setBigImage(bigImg, 'img', srcImg, true);
        })
    }
   	$( '.view-type-switcher' ).ajaxComplete(function() {
   		if ($('.view-type-switcher button').hasClass('btn-blocks') ){
  		create_catalog_slide();
  		}
	});
	$(document).bind('ready ajaxComplete', function(){
		$('.product-action-link .compare').empty();
	});
	//view switch
	$('.view-type-switcher button').on('click', function(){
		
		var name = 'view-type';
		var value = 'blocks'; //blocks, list, table
		if ($(this).hasClass('btn-blocks'))
		{
			value = 'blocks';
		}
		else if ($(this).hasClass('btn-list')){
			value = 'list';
		}
		else if ($(this).hasClass('btn-table')){
			value = 'table';
		}
		var date = new Date();
		date.setFullYear(date.getFullYear() + 1);
		document.cookie = name + '=' + value + '; path=/; expires=' + date.toUTCString();
	});
	//slick main
	$( document ).ready(function(){
	mainPageResize();
	function updateThumbs(thumbs){
		if (!thumbs.hasClass('slick-initialized')){
			thumbs.slick({
			    slidesToShow: 4,
			    infinite: false,
			    variableWidth: true,
			    focusOnSelect: true,
	            arrows: true,
			    onInit: function(slick){
			    	slick.$slides.eq(0).addClass('active');
			    },
			});
		}
	}
    $('.main-page').on('mouseenter', '.catalog-item-thumbnails .slick-slide', function(){
        if ($(this).is('.slick-slide.active')) return;
        $(this).addClass('active').siblings().removeClass('active');
        var srcImg = $(this).find('img');
        var bigImg = $(this).closest('.catalog-item-thumbnails').siblings('a').find('img');
        bigImg.one('load', function(){
            bigImg.fadeIn('fast');
        }).fadeOut('fast', function(){
            bigImg.attr('srcset', srcImg.data('big-image'), 'src', srcImg.data('big-image'));
        });
        }).on({
            'slide.bs.carousel': function(){
                $(this).find('.carousel-inner').addClass('sliding');
            },
            'slid.bs.carousel': function(){
                $(this).find('.carousel-inner').removeClass('sliding');
                updateThumbs($('.item.active .catalog-item-thumbnails'));
            },
            swipeleft: function(){
                $(this).carousel('next');
            },
            swiperight: function(){
                $(this).carousel('prev');
            }
        }, '#carousel-bestsellers, #carousel-new');

    function mainPageResize(){
        var catalogBestsellers = $('#carousel-bestsellers .catalog-item-container');
        var catalogNew = $('#carousel-new .catalog-item-container');
        var nowInGroup = $('#carousel-new .item.active .catalog-item-container').length;
        if (Modernizr.mq('(max-width: 767px)')){
        	if (nowInGroup != 1){
        		$('.sliderhome').empty();
        		$('.catalog-item-container').unwrap();
        		carouselRebuild(0, 0);
        	}
        } else if (Modernizr.mq('(min-width: 768px) and (max-width: 991px)')){
        	if (nowInGroup != 4){
        		$('.sliderhome').empty();
        		$('.catalog-item-container').unwrap();
        		carouselRebuild(3, 1);
        	}
        } else {
        	if (nowInGroup != 6){
        		$('.sliderhome').empty();
        		$('.catalog-item-container').unwrap();
        		carouselRebuild(5, 2);
        	}
       	}
    }

    function carouselRebuild(items_new, items_bestsellers){
    	var count_items_for_page = [],
    $blocks = $('#carousel-new .catalog-blocks'),
    $blocks_sale = $('#carousel-bestsellers .catalog-blocks'),
    x = 0;
    while (x<2) {
        if (x === 0) {
            var j=0, i = 0, addClass = "",
            $all_items = $("#carousel-new .catalog-item-container"),
            $dotter_slide = $('#carousel-new .sliderhome'),
            href_slid = 'carousel-new',
            items_string = "#carousel-new .catalog-item-container",
            check = items_new;
        }
        else if (x === 1) {
            var j=0, i = 0, addClass = "",
            count_items_for_page = [],
            $all_items = $("#carousel-bestsellers .catalog-item-container"),
            $dotter_slide = $('#carousel-bestsellers .sliderhome'),
            href_slid = 'carousel-bestsellers',
            items_string = "#carousel-bestsellers .catalog-item-container",
            check = items_bestsellers;
        }
        $all_items.each(function(inx){
            if (typeof count_items_for_page[j] !== 'undefined') count_items_for_page[j] +=',';
            else count_items_for_page[j] = '';
        count_items_for_page[j] += ""+items_string+":eq("+inx+")";
            if (i >= check) {
                if(j===0)
                    addClass='active';
                else
                    addClass='';
                    $dotter_slide.append('<li class="'+addClass+'" data-target="#'+ href_slid +'" data-slide-to="'+ (j) +'"></li>');    
                    $(count_items_for_page[j]).wrapAll("<div class='item "+addClass+"'></div>");
                    j++;
                    i = 0;
                } else {
                    i++;
                }
        })
    x++;
    }
    updateThumbs($('#carousel-new .catalog-item-thumbnails'));
    updateThumbs($('#carousel-bestsellers .catalog-item-thumbnails'));
    $blocks.find('.woocommerce .item').unwrap();
    $blocks_sale.find('.woocommerce .item').unwrap();
    $('div #carousel-new .slick-list').removeAttr('aria-live');
    $('div #carousel-bestsellers .slick-list').removeAttr('aria-live');
}

	var timeout;
	        $( window ).on('resize', function(){
	        	clearTimeout(timeout);
	        	timeout = setTimeout(mainPageResize, 300);
	        })
	});
});