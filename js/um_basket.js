"use strict";

var buzzTimeout;
// function for visualizing addition of items into basket.
function addToBasket(basketItemsSpan, basketBtn, addButton){
	var basketItems = parseFloat(basketItemsSpan.html());

	basketBtn.addClass('buzz'); // class for animation (set in CSS)
	clearInterval(buzzTimeout);
	buzzTimeout = setInterval(function(){
		basketBtn.removeClass('buzz');
	}, 1000);

	var addedQuan = Number(addButton.data('quantity')) > 0 ? Number(addButton.data('quantity')) : 1;
	basketItems += addedQuan;
	basketItemsSpan.html(basketItems);
}/*function addToBasket*/
