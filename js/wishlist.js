jQuery( function( $ ) {
    var $wishlistCount = $('.btn-favorites.header-btn .quan');
    var wishlistCount = Number($('.btn-favorites.header-btn .quan').text());

    $('body').on('added_to_wishlist', function(){
        wishlistCount++;
        $wishlistCount.text(wishlistCount);
    });

    $('body').on('removed_from_wishlist', function(){
        wishlistCount--;
        $wishlistCount.text(wishlistCount);
    });
});