/*	Please do not duplicate this document with out prior permission.
	This unique combination of styles, properties, font-families and poistioning are copyright of ohioseagrant.osu.edu. */

/*	SL Flickr Feed on bottom of the page
	Uses jquery.flickrfeed.js
		
	George Oommen (oommen.6@osu.edu)
	January 17 2011 */
	
$(document).ready(function(){

	$('#flickrfeed').jflickrfeed({
		limit: 10,
		qstrings: {
			id: '41398337@N07',
			tags: 'Stone Laboratory'
		},
		itemTemplate: '<li><a class="photo-lab" rel="flicker" href="{{image_b}}" title="{{title}}"><img src="{{image_s}}" alt="{{title}}" /></a></li>'
	}, function(data) {
		$('a.photo-lab').fancybox({
			'zoomOpacity'			: false,
			'overlayShow'			: false,
			'zoomSpeedIn'			: 500,
			'zoomSpeedOut'			: 500
		});
	});
	
	$(".tweet").tweet({
		username: "stonelab",
		join_text: "auto",
		avatar_size: 40,
		count: 3,
		auto_join_text_default: " we said,", 
		auto_join_text_ed: " we",
		auto_join_text_ing: " we were",
		auto_join_text_reply: " we replied to",
		auto_join_text_url: " we were checking out",
		loading_text: "loading tweets..."
	});

});