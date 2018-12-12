
	"use strict";

	function closeToggles(){
		if(jQuery('.toggleable').is(':visible')){ 
			jQuery('.toggleable').slideUp(300);
		}
	}

	function closeEverything(){
		jQuery('.modal.in').modal('hide');
		jQuery('.popup-on-buy').fadeOut('400');
	}

	jQuery(function($){

		$('.btn-toggle').on('click', function(){
			var $t = $(this);
			$t.toggleClass('btn-toggled');
			$( $t.data('target') ).toggleClass('toggled');
		});
		
	});