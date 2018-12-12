var fbStatus = 0;
window.fbAsyncInit = function() {
    FB.init({
        appId:'390700904388089',
        cookie: true,
        status: true,
        xfbml: true,
        version: 'v2.4'
    });

    FB.getLoginStatus(function (response) {
        if (response.status !== 'unknown') {
            fbStatus = 1;
        }
    }, true);
};
function fbLogin(from) {
    FB.login(function(response)
    {
        if (response.status === 'connected' || response.status === 'not_authorized')
        {
            fbStatus = 1;
            if (from === 'chat') {
                openChatBox();
                FB.XFBML.parse(jQuery('.fb-chat-box')[0]);
            }
        }
        else
        {
            return false;
        }
    });
}
function openChatBox() {
    jQuery('.fb-chat-box').show();
    jQuery('.fb-chat-off').hide();
}
jQuery('.fb-chat-off').click(function(){
    if (fbStatus === 1) {
        openChatBox();
    } else {
        fbLogin('chat');
    }

});
jQuery('.fb-chat-on').click(function(){
    jQuery('.fb-chat-box').hide();
    jQuery('.fb-chat-off').show();
});