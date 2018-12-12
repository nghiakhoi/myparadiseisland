(function( ){
	"use strict";

	// getting color theme from localStorage if available
	var theme = localStorage.getItem('apparel-theme');
	if (theme){
		if (theme.indexOf('flat') !== -1) jQuery('html').addClass('flat');
		else jQuery('html').removeClass('flat');
		var newLink = jQuery('link.current-theme').attr('href').replace(/theme_\w+.css/, 'theme_'+theme+'.css');
		jQuery('link.current-theme').attr('href',newLink);
		jQuery('.theme-demo.'+theme).addClass('active').siblings().removeClass('active');
	} else {
		// if there is no color theme in localStorage, then set default theme
		if(!jQuery('link.current-theme').attr('href').length)
		{
			theme = "flat_purple";
			if (theme.indexOf('flat') !== -1) jQuery('html').addClass('flat');
			else jQuery('html').removeClass('flat');		
			jQuery('link.current-theme').attr('href','css/themes/theme_'+theme+'.css');
			jQuery('.theme-demo.'+theme).addClass('active').siblings().removeClass('active');
		}
	}

	jQuery(function($){
		// color-theme switch
		$('.theme-demo').on('click', function(){
			var newTheme = $(this).attr('data-theme');
			jQuery.ajax({
					type: "POST",
					data: {
				        action: 'apparel_ajax_color_theme',
				        color_theme: newTheme,
					},
					url: "/wp-admin/admin-ajax.php",
				});
			if (theme != newTheme){
				theme = newTheme;
				var newLink = $('link.current-theme').attr('href').replace(/theme_\w+.css/, 'theme_'+theme+'.css');
				$('link.current-theme').attr('href',newLink);
				
				if (theme.indexOf('flat') !== -1) $('html').addClass('flat');
				else $('html').removeClass('flat');

				localStorage.setItem('apparel-theme', theme);
				$(this).addClass('active').siblings().removeClass('active');
			} else return;
		});
	})

})( );