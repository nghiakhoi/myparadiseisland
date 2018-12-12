// jquery.tweet.js - See http://tweet.seaofclouds.com/ or https://github.com/seaofclouds/tweet for more info਍⼀⼀ 䌀漀瀀礀爀椀最栀琀 ⠀挀⤀ ㈀　　㠀ⴀ㈀　㄀㈀ 吀漀搀搀 䴀愀琀琀栀攀眀猀 ☀ 匀琀攀瘀攀 倀甀爀挀攀氀氀ഀഀ
(function (factory) {਍  椀昀 ⠀琀礀瀀攀漀昀 搀攀昀椀渀攀 㴀㴀㴀 ✀昀甀渀挀琀椀漀渀✀ ☀☀ 搀攀昀椀渀攀⸀愀洀搀⤀ഀഀ
    define(['jquery'], factory); // AMD support for RequireJS etc.਍  攀氀猀攀ഀഀ
    factory(jQuery);਍紀⠀昀甀渀挀琀椀漀渀 ⠀␀⤀ 笀ഀഀ
  $.fn.tweet = function(o){਍    瘀愀爀 猀 㴀 ␀⸀攀砀琀攀渀搀⠀笀ഀഀ
      username: null,                           // [string or array] required unless using the 'query' option; one or more twitter screen names (use 'list' option for multiple names, where possible)਍      氀椀猀琀㨀 渀甀氀氀Ⰰ                               ⼀⼀ 嬀猀琀爀椀渀最崀   漀瀀琀椀漀渀愀氀 渀愀洀攀 漀昀 氀椀猀琀 戀攀氀漀渀最椀渀最 琀漀 甀猀攀爀渀愀洀攀ഀഀ
      favorites: false,                         // [boolean]  display the user's favorites instead of his tweets਍      焀甀攀爀礀㨀 渀甀氀氀Ⰰ                              ⼀⼀ 嬀猀琀爀椀渀最崀   漀瀀琀椀漀渀愀氀 猀攀愀爀挀栀 焀甀攀爀礀 ⠀猀攀攀 愀氀猀漀㨀 栀琀琀瀀㨀⼀⼀猀攀愀爀挀栀⸀琀眀椀琀琀攀爀⸀挀漀洀⼀漀瀀攀爀愀琀漀爀猀⤀ഀഀ
      avatar_size: null,                        // [integer]  height and width of avatar if displayed (48px max)਍      挀漀甀渀琀㨀 ㌀Ⰰ                                 ⼀⼀ 嬀椀渀琀攀最攀爀崀  栀漀眀 洀愀渀礀 琀眀攀攀琀猀 琀漀 搀椀猀瀀氀愀礀㼀ഀഀ
      fetch: null,                              // [integer]  how many tweets to fetch via the API (set this higher than 'count' if using the 'filter' option)਍      瀀愀最攀㨀 ㄀Ⰰ                                  ⼀⼀ 嬀椀渀琀攀最攀爀崀  眀栀椀挀栀 瀀愀最攀 漀昀 爀攀猀甀氀琀猀 琀漀 昀攀琀挀栀 ⠀椀昀 挀漀甀渀琀 ℀㴀 昀攀琀挀栀Ⰰ 礀漀甀✀氀氀 最攀琀 甀渀攀砀瀀攀挀琀攀搀 爀攀猀甀氀琀猀⤀ഀഀ
      retweets: true,                           // [boolean]  whether to fetch (official) retweets (not supported in all display modes)਍      椀渀琀爀漀开琀攀砀琀㨀 渀甀氀氀Ⰰ                         ⼀⼀ 嬀猀琀爀椀渀最崀   搀漀 礀漀甀 眀愀渀琀 琀攀砀琀 䈀䔀䘀伀刀䔀 礀漀甀爀 礀漀甀爀 琀眀攀攀琀猀㼀ഀഀ
      outro_text: null,                         // [string]   do you want text AFTER your tweets?਍      樀漀椀渀开琀攀砀琀㨀  渀甀氀氀Ⰰ                         ⼀⼀ 嬀猀琀爀椀渀最崀   漀瀀琀椀漀渀愀氀 琀攀砀琀 椀渀 戀攀琀眀攀攀渀 搀愀琀攀 愀渀搀 琀眀攀攀琀Ⰰ 琀爀礀 猀攀琀琀椀渀最 琀漀 ∀愀甀琀漀∀ഀഀ
      auto_join_text_default: " I said, ",      // [string]   auto text for non verb: "I said" bullocks਍      愀甀琀漀开樀漀椀渀开琀攀砀琀开攀搀㨀 ∀ 䤀 ∀Ⰰ                 ⼀⼀ 嬀猀琀爀椀渀最崀   愀甀琀漀 琀攀砀琀 昀漀爀 瀀愀猀琀 琀攀渀猀攀㨀 ∀䤀∀ 猀甀爀昀攀搀ഀഀ
      auto_join_text_ing: " I am ",             // [string]   auto tense for present tense: "I was" surfing਍      愀甀琀漀开樀漀椀渀开琀攀砀琀开爀攀瀀氀礀㨀 ∀ 䤀 爀攀瀀氀椀攀搀 琀漀 ∀Ⰰ   ⼀⼀ 嬀猀琀爀椀渀最崀   愀甀琀漀 琀攀渀猀攀 昀漀爀 爀攀瀀氀椀攀猀㨀 ∀䤀 爀攀瀀氀椀攀搀 琀漀∀ 䀀猀漀洀攀漀渀攀 ∀眀椀琀栀∀ഀഀ
      auto_join_text_url: " I was looking at ", // [string]   auto tense for urls: "I was looking at" http:...਍      氀漀愀搀椀渀最开琀攀砀琀㨀 渀甀氀氀Ⰰ                       ⼀⼀ 嬀猀琀爀椀渀最崀   漀瀀琀椀漀渀愀氀 氀漀愀搀椀渀最 琀攀砀琀Ⰰ 搀椀猀瀀氀愀礀攀搀 眀栀椀氀攀 琀眀攀攀琀猀 氀漀愀搀ഀഀ
      refresh_interval: null,                   // [integer]  optional number of seconds after which to reload tweets਍      琀眀椀琀琀攀爀开甀爀氀㨀 ∀琀眀椀琀琀攀爀⸀挀漀洀∀Ⰰ               ⼀⼀ 嬀猀琀爀椀渀最崀   挀甀猀琀漀洀 琀眀椀琀琀攀爀 甀爀氀Ⰰ 椀昀 愀渀礀 ⠀愀瀀椀最攀攀Ⰰ 攀琀挀⸀⤀ഀഀ
      twitter_api_url: "api.twitter.com",       // [string]   custom twitter api url, if any (apigee, etc.)਍      琀眀椀琀琀攀爀开猀攀愀爀挀栀开甀爀氀㨀 ∀猀攀愀爀挀栀⸀琀眀椀琀琀攀爀⸀挀漀洀∀Ⰰ ⼀⼀ 嬀猀琀爀椀渀最崀   挀甀猀琀漀洀 琀眀椀琀琀攀爀 猀攀愀爀挀栀 甀爀氀Ⰰ 椀昀 愀渀礀 ⠀愀瀀椀最攀攀Ⰰ 攀琀挀⸀⤀ഀഀ
      template: "{avatar}{time}{join} {text}",  // [string or function] template used to construct each tweet <li> - see code for available vars਍      挀漀洀瀀愀爀愀琀漀爀㨀 昀甀渀挀琀椀漀渀⠀琀眀攀攀琀㄀Ⰰ 琀眀攀攀琀㈀⤀ 笀    ⼀⼀ 嬀昀甀渀挀琀椀漀渀崀 挀漀洀瀀愀爀愀琀漀爀 甀猀攀搀 琀漀 猀漀爀琀 琀眀攀攀琀猀 ⠀猀攀攀 䄀爀爀愀礀⸀猀漀爀琀⤀ഀഀ
        return tweet2["tweet_time"] - tweet1["tweet_time"];਍      紀Ⰰഀഀ
      filter: function(tweet) {                 // [function] whether or not to include a particular tweet (be sure to also set 'fetch')਍        爀攀琀甀爀渀 琀爀甀攀㬀ഀഀ
      }਍      ⼀⼀ 夀漀甀 挀愀渀 愀琀琀愀挀栀 挀愀氀氀戀愀挀欀猀 琀漀 琀栀攀 昀漀氀氀漀眀椀渀最 攀瘀攀渀琀猀 甀猀椀渀最 樀儀甀攀爀礀✀猀 猀琀愀渀搀愀爀搀 ⸀戀椀渀搀⠀⤀ 洀攀挀栀愀渀椀猀洀㨀ഀഀ
      //   "loaded" -- triggered when tweets have been fetched and rendered਍    紀Ⰰ 漀⤀㬀ഀഀ
਍    ⼀⼀ 匀攀攀 栀琀琀瀀㨀⼀⼀搀愀爀椀渀最昀椀爀攀戀愀氀氀⸀渀攀琀⼀㈀　㄀　⼀　㜀⼀椀洀瀀爀漀瘀攀搀开爀攀最攀砀开昀漀爀开洀愀琀挀栀椀渀最开甀爀氀猀ഀഀ
    var url_regexp = /\b((?:https?:\/\/|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:'".,<>?«»“”‘’]))/gi;਍ഀഀ
    // Expand values inside simple string templates with {placeholders}਍    昀甀渀挀琀椀漀渀 琀⠀琀攀洀瀀氀愀琀攀Ⰰ 椀渀昀漀⤀ 笀ഀഀ
      if (typeof template === "string") {਍        瘀愀爀 爀攀猀甀氀琀 㴀 琀攀洀瀀氀愀琀攀㬀ഀഀ
        for(var key in info) {਍          瘀愀爀 瘀愀氀 㴀 椀渀昀漀嬀欀攀礀崀㬀ഀഀ
          result = result.split('{'+key+'}').join(val === null ? '' : val);਍        紀ഀഀ
        return result;਍      紀 攀氀猀攀 爀攀琀甀爀渀 琀攀洀瀀氀愀琀攀⠀椀渀昀漀⤀㬀ഀഀ
    }਍    ⼀⼀ 䔀砀瀀漀爀琀 琀栀攀 琀 昀甀渀挀琀椀漀渀 昀漀爀 甀猀攀 眀栀攀渀 瀀愀猀猀椀渀最 愀 昀甀渀挀琀椀漀渀 愀猀 琀栀攀 ✀琀攀洀瀀氀愀琀攀✀ 漀瀀琀椀漀渀ഀഀ
    $.extend({tweet: {t: t}});਍ഀഀ
    function replacer (regex, replacement) {਍      爀攀琀甀爀渀 昀甀渀挀琀椀漀渀⠀⤀ 笀ഀഀ
        var returning = [];਍        琀栀椀猀⸀攀愀挀栀⠀昀甀渀挀琀椀漀渀⠀⤀ 笀ഀഀ
          returning.push(this.replace(regex, replacement));਍        紀⤀㬀ഀഀ
        return $(returning);਍      紀㬀ഀഀ
    }਍ഀഀ
    function escapeHTML(s) {਍      爀攀琀甀爀渀 猀⸀爀攀瀀氀愀挀攀⠀⼀㰀⼀最Ⰰ∀☀氀琀㬀∀⤀⸀爀攀瀀氀愀挀攀⠀⼀㸀⼀最Ⰰ∀帀☀最琀㬀∀⤀㬀ഀഀ
    }਍ഀഀ
    $.fn.extend({਍      氀椀渀欀唀猀攀爀㨀 爀攀瀀氀愀挀攀爀⠀⼀⠀帀簀嬀尀圀崀⤀䀀⠀尀眀⬀⤀⼀最椀Ⰰ ∀␀㄀㰀猀瀀愀渀 挀氀愀猀猀㴀尀∀愀琀尀∀㸀䀀㰀⼀猀瀀愀渀㸀㰀愀 栀爀攀昀㴀尀∀栀琀琀瀀㨀⼀⼀∀⬀猀⸀琀眀椀琀琀攀爀开甀爀氀⬀∀⼀␀㈀尀∀㸀␀㈀㰀⼀愀㸀∀⤀Ⰰഀഀ
      // Support various latin1 (\u00**) and arabic (\u06**) alphanumeric chars਍      氀椀渀欀䠀愀猀栀㨀 爀攀瀀氀愀挀攀爀⠀⼀⠀㼀㨀帀簀 ⤀嬀尀⌀崀⬀⠀嬀尀眀尀甀　　挀　ⴀ尀甀　　搀㘀尀甀　　搀㠀ⴀ尀甀　　昀㘀尀甀　　昀㠀ⴀ尀甀　　昀昀尀甀　㘀　　ⴀ尀甀　㘀昀昀崀⬀⤀⼀最椀Ⰰഀഀ
                         ' <a href="http://'+s.twitter_search_url+'/search?q=&tag=$1&lang=all'+਍                         ⠀⠀猀⸀甀猀攀爀渀愀洀攀 ☀☀ 猀⸀甀猀攀爀渀愀洀攀⸀氀攀渀最琀栀 㴀㴀 ㄀ ☀☀ ℀猀⸀氀椀猀琀⤀ 㼀 ✀☀昀爀漀洀㴀✀⬀猀⸀甀猀攀爀渀愀洀攀⸀樀漀椀渀⠀∀─㈀䈀伀刀─㈀䈀∀⤀ 㨀 ✀✀⤀⬀ഀഀ
                         '" class="tweet_hashtag">#$1</a>'),਍      洀愀欀攀䠀攀愀爀琀㨀 爀攀瀀氀愀挀攀爀⠀⼀⠀☀氀琀㬀⤀⬀嬀㌀崀⼀最椀Ⰰ ∀㰀琀琀 挀氀愀猀猀㴀✀栀攀愀爀琀✀㸀☀⌀砀㈀㘀㘀㔀㬀㰀⼀琀琀㸀∀⤀ഀഀ
    });਍ഀഀ
    function linkURLs(text, entities) {਍      爀攀琀甀爀渀 琀攀砀琀⸀爀攀瀀氀愀挀攀⠀甀爀氀开爀攀最攀砀瀀Ⰰ 昀甀渀挀琀椀漀渀⠀洀愀琀挀栀⤀ 笀ഀഀ
        var url = (/^[a-z]+:/i).test(match) ? match : "http://"+match;਍        瘀愀爀 琀攀砀琀 㴀 洀愀琀挀栀㬀ഀഀ
        for(var i = 0; i < entities.length; ++i) {਍          瘀愀爀 攀渀琀椀琀礀 㴀 攀渀琀椀琀椀攀猀嬀椀崀㬀ഀഀ
          if (entity.url == url && entity.expanded_url) {਍            甀爀氀 㴀 攀渀琀椀琀礀⸀攀砀瀀愀渀搀攀搀开甀爀氀㬀ഀഀ
            text = entity.display_url;਍            戀爀攀愀欀㬀ഀഀ
          }਍        紀ഀഀ
        return "<a href=\""+escapeHTML(url)+"\">"+escapeHTML(text)+"</a>";਍      紀⤀㬀ഀഀ
    }਍ഀഀ
    function parse_date(date_str) {਍      ⼀⼀ 吀栀攀 渀漀渀ⴀ猀攀愀爀挀栀 琀眀椀琀琀攀爀 䄀倀䤀猀 爀攀琀甀爀渀 椀渀挀漀渀猀椀猀琀攀渀琀氀礀ⴀ昀漀爀洀愀琀琀攀搀 搀愀琀攀猀Ⰰ 眀栀椀挀栀 䐀愀琀攀⸀瀀愀爀猀攀ഀഀ
      // cannot handle in IE. We therefore perform the following transformation:਍      ⼀⼀ ∀圀攀搀 䄀瀀爀 ㈀㤀 　㠀㨀㔀㌀㨀㌀㄀ ⬀　　　　 ㈀　　㤀∀ 㴀㸀 ∀圀攀搀Ⰰ 䄀瀀爀 ㈀㤀 ㈀　　㤀 　㠀㨀㔀㌀㨀㌀㄀ ⬀　　　　∀ഀഀ
      return Date.parse(date_str.replace(/^([a-z]{3})( [a-z]{3} \d\d?)(.*)( \d{4})$/i, '$1,$2$4$3'));਍    紀ഀഀ
਍    昀甀渀挀琀椀漀渀 攀砀琀爀愀挀琀开爀攀氀愀琀椀瘀攀开琀椀洀攀⠀搀愀琀攀⤀ 笀ഀഀ
      var toInt = function(val) { return parseInt(val, 10); };਍      瘀愀爀 爀攀氀愀琀椀瘀攀开琀漀 㴀 渀攀眀 䐀愀琀攀⠀⤀㬀ഀഀ
      var delta = toInt((relative_to.getTime() - date) / 1000);਍      椀昀 ⠀搀攀氀琀愀 㰀 ㄀⤀ 搀攀氀琀愀 㴀 　㬀ഀഀ
      return {਍        搀愀礀猀㨀    琀漀䤀渀琀⠀搀攀氀琀愀 ⼀ 㠀㘀㐀　　⤀Ⰰഀഀ
        hours:   toInt(delta / 3600),਍        洀椀渀甀琀攀猀㨀 琀漀䤀渀琀⠀搀攀氀琀愀 ⼀ 㘀　⤀Ⰰഀഀ
        seconds: toInt(delta)਍      紀㬀ഀഀ
    }਍ഀഀ
    function format_relative_time(time_ago) {਍      椀昀 ⠀ 琀椀洀攀开愀最漀⸀搀愀礀猀 㸀 ㈀ ⤀     爀攀琀甀爀渀 ✀愀戀漀甀琀 ✀ ⬀ 琀椀洀攀开愀最漀⸀搀愀礀猀 ⬀ ✀ 搀愀礀猀 愀最漀✀㬀ഀഀ
      if ( time_ago.hours > 24 )   return 'about a day ago';਍      椀昀 ⠀ 琀椀洀攀开愀最漀⸀栀漀甀爀猀 㸀 ㈀ ⤀    爀攀琀甀爀渀 ✀愀戀漀甀琀 ✀ ⬀ 琀椀洀攀开愀最漀⸀栀漀甀爀猀 ⬀ ✀ 栀漀甀爀猀 愀最漀✀㬀ഀഀ
      if ( time_ago.minutes > 45 ) return 'about an hour ago';਍      椀昀 ⠀ 琀椀洀攀开愀最漀⸀洀椀渀甀琀攀猀 㸀 ㈀ ⤀  爀攀琀甀爀渀 ✀愀戀漀甀琀 ✀ ⬀ 琀椀洀攀开愀最漀⸀洀椀渀甀琀攀猀 ⬀ ✀ 洀椀渀甀琀攀猀 愀最漀✀㬀ഀഀ
      if ( time_ago.seconds > 1 )  return 'about ' + time_ago.seconds + ' seconds ago';਍      爀攀琀甀爀渀 ✀樀甀猀琀 渀漀眀✀㬀ഀഀ
    }਍ഀഀ
    function build_auto_join_text(text) {਍      椀昀 ⠀琀攀砀琀⸀洀愀琀挀栀⠀⼀帀⠀䀀⠀嬀䄀ⴀ娀愀ⴀ稀　ⴀ㤀ⴀ开崀⬀⤀⤀ ⸀⨀⼀椀⤀⤀ 笀ഀഀ
        return s.auto_join_text_reply;਍      紀 攀氀猀攀 椀昀 ⠀琀攀砀琀⸀洀愀琀挀栀⠀甀爀氀开爀攀最攀砀瀀⤀⤀ 笀ഀഀ
        return s.auto_join_text_url;਍      紀 攀氀猀攀 椀昀 ⠀琀攀砀琀⸀洀愀琀挀栀⠀⼀帀⠀⠀尀眀⬀攀搀⤀簀樀甀猀琀⤀ ⸀⨀⼀椀洀⤀⤀ 笀ഀഀ
        return s.auto_join_text_ed;਍      紀 攀氀猀攀 椀昀 ⠀琀攀砀琀⸀洀愀琀挀栀⠀⼀帀⠀尀眀⨀椀渀最⤀ ⸀⨀⼀椀⤀⤀ 笀ഀഀ
        return s.auto_join_text_ing;਍      紀 攀氀猀攀 笀ഀഀ
        return s.auto_join_text_default;਍      紀ഀഀ
    }਍ഀഀ
    function build_api_url() {਍      瘀愀爀 瀀爀漀琀漀 㴀 ⠀✀栀琀琀瀀猀㨀✀ 㴀㴀 搀漀挀甀洀攀渀琀⸀氀漀挀愀琀椀漀渀⸀瀀爀漀琀漀挀漀氀 㼀 ✀栀琀琀瀀猀㨀✀ 㨀 ✀栀琀琀瀀㨀✀⤀㬀ഀഀ
      var count = (s.fetch === null) ? s.count : s.fetch;਍      瘀愀爀 挀漀洀洀漀渀开瀀愀爀愀洀猀 㴀 ✀☀挀愀氀氀戀愀挀欀㴀㼀✀㬀ഀഀ
      if (s.list) {਍        爀攀琀甀爀渀 瀀爀漀琀漀⬀∀⼀⼀∀⬀猀⸀琀眀椀琀琀攀爀开愀瀀椀开甀爀氀⬀∀⼀㄀⼀∀⬀猀⸀甀猀攀爀渀愀洀攀嬀　崀⬀∀⼀氀椀猀琀猀⼀∀⬀猀⸀氀椀猀琀⬀∀⼀猀琀愀琀甀猀攀猀⸀樀猀漀渀㼀瀀愀最攀㴀∀⬀猀⸀瀀愀最攀⬀∀☀瀀攀爀开瀀愀最攀㴀∀⬀挀漀甀渀琀⬀挀漀洀洀漀渀开瀀愀爀愀洀猀㬀ഀഀ
      } else if (s.favorites) {਍        爀攀琀甀爀渀 瀀爀漀琀漀⬀∀⼀⼀∀⬀猀⸀琀眀椀琀琀攀爀开愀瀀椀开甀爀氀⬀∀⼀㄀⼀昀愀瘀漀爀椀琀攀猀⸀樀猀漀渀㼀猀挀爀攀攀渀开渀愀洀攀㴀∀⬀猀⸀甀猀攀爀渀愀洀攀嬀　崀⬀∀☀瀀愀最攀㴀∀⬀猀⸀瀀愀最攀⬀∀☀挀漀甀渀琀㴀∀⬀挀漀甀渀琀⬀挀漀洀洀漀渀开瀀愀爀愀洀猀㬀ഀഀ
      } else if (s.query === null && s.username.length == 1) {਍        爀攀琀甀爀渀 瀀爀漀琀漀⬀✀⼀⼀✀⬀猀⸀琀眀椀琀琀攀爀开愀瀀椀开甀爀氀⬀✀⼀㄀⼀猀琀愀琀甀猀攀猀⼀甀猀攀爀开琀椀洀攀氀椀渀攀⸀樀猀漀渀㼀猀挀爀攀攀渀开渀愀洀攀㴀✀⬀猀⸀甀猀攀爀渀愀洀攀嬀　崀⬀✀☀挀漀甀渀琀㴀✀⬀挀漀甀渀琀⬀⠀猀⸀爀攀琀眀攀攀琀猀 㼀 ✀☀椀渀挀氀甀搀攀开爀琀猀㴀㄀✀ 㨀 ✀✀⤀⬀✀☀瀀愀最攀㴀✀⬀猀⸀瀀愀最攀⬀挀漀洀洀漀渀开瀀愀爀愀洀猀㬀ഀഀ
      } else {਍        瘀愀爀 焀甀攀爀礀 㴀 ⠀猀⸀焀甀攀爀礀 簀簀 ✀昀爀漀洀㨀✀⬀猀⸀甀猀攀爀渀愀洀攀⸀樀漀椀渀⠀✀ 伀刀 昀爀漀洀㨀✀⤀⤀㬀ഀഀ
        return proto+'//'+s.twitter_search_url+'/search.json?&q='+encodeURIComponent(query)+'&rpp='+count+'&page='+s.page+common_params;਍      紀ഀഀ
    }਍ഀഀ
    function extract_avatar_url(item, secure) {਍      椀昀 ⠀猀攀挀甀爀攀⤀ 笀ഀഀ
        return ('user' in item) ?਍          椀琀攀洀⸀甀猀攀爀⸀瀀爀漀昀椀氀攀开椀洀愀最攀开甀爀氀开栀琀琀瀀猀 㨀ഀഀ
          extract_avatar_url(item, false).਍            爀攀瀀氀愀挀攀⠀⼀帀栀琀琀瀀㨀尀⼀尀⼀嬀愀ⴀ稀　ⴀ㤀崀笀㄀Ⰰ㌀紀尀⸀琀眀椀洀最尀⸀挀漀洀尀⼀⼀Ⰰ ∀栀琀琀瀀猀㨀⼀⼀猀㌀⸀愀洀愀稀漀渀愀眀猀⸀挀漀洀⼀琀眀椀琀琀攀爀开瀀爀漀搀甀挀琀椀漀渀⼀∀⤀㬀ഀഀ
      } else {਍        爀攀琀甀爀渀 椀琀攀洀⸀瀀爀漀昀椀氀攀开椀洀愀最攀开甀爀氀 簀簀 椀琀攀洀⸀甀猀攀爀⸀瀀爀漀昀椀氀攀开椀洀愀最攀开甀爀氀㬀ഀഀ
      }਍    紀ഀഀ
਍    ⼀⼀ 䌀漀渀瘀攀爀琀 琀眀椀琀琀攀爀 䄀倀䤀 漀戀樀攀挀琀猀 椀渀琀漀 搀愀琀愀 愀瘀愀椀氀愀戀氀攀 昀漀爀ഀഀ
    // constructing each tweet <li> using a template਍    昀甀渀挀琀椀漀渀 攀砀琀爀愀挀琀开琀攀洀瀀氀愀琀攀开搀愀琀愀⠀椀琀攀洀⤀笀ഀഀ
      var o = {};਍      漀⸀椀琀攀洀 㴀 椀琀攀洀㬀ഀഀ
      o.source = item.source;਍      漀⸀猀挀爀攀攀渀开渀愀洀攀 㴀 椀琀攀洀⸀昀爀漀洀开甀猀攀爀 簀簀 椀琀攀洀⸀甀猀攀爀⸀猀挀爀攀攀渀开渀愀洀攀㬀ഀഀ
      // The actual user name is not returned by all Twitter APIs, so please do not਍      ⼀⼀ 昀椀氀攀 愀渀 椀猀猀甀攀 椀昀 椀琀 椀猀 攀洀瀀琀礀㨀ഀഀ
      o.name = item.from_user_name || item.user.name;਍      漀⸀爀攀琀眀攀攀琀 㴀 琀礀瀀攀漀昀⠀椀琀攀洀⸀爀攀琀眀攀攀琀攀搀开猀琀愀琀甀猀⤀ ℀㴀 ✀甀渀搀攀昀椀渀攀搀✀㬀ഀഀ
਍      漀⸀琀眀攀攀琀开琀椀洀攀 㴀 瀀愀爀猀攀开搀愀琀攀⠀椀琀攀洀⸀挀爀攀愀琀攀搀开愀琀⤀㬀ഀഀ
      o.join_text = s.join_text == "auto" ? build_auto_join_text(item.text) : s.join_text;਍      漀⸀琀眀攀攀琀开椀搀 㴀 椀琀攀洀⸀椀搀开猀琀爀㬀ഀഀ
      o.twitter_base = "http://"+s.twitter_url+"/";਍      漀⸀甀猀攀爀开甀爀氀 㴀 漀⸀琀眀椀琀琀攀爀开戀愀猀攀⬀漀⸀猀挀爀攀攀渀开渀愀洀攀㬀ഀഀ
      o.tweet_url = o.user_url+"/status/"+o.tweet_id;਍      漀⸀爀攀瀀氀礀开甀爀氀 㴀 漀⸀琀眀椀琀琀攀爀开戀愀猀攀⬀∀椀渀琀攀渀琀⼀琀眀攀攀琀㼀椀渀开爀攀瀀氀礀开琀漀㴀∀⬀漀⸀琀眀攀攀琀开椀搀㬀ഀഀ
      o.retweet_url = o.twitter_base+"intent/retweet?tweet_id="+o.tweet_id;਍      漀⸀昀愀瘀漀爀椀琀攀开甀爀氀 㴀 漀⸀琀眀椀琀琀攀爀开戀愀猀攀⬀∀椀渀琀攀渀琀⼀昀愀瘀漀爀椀琀攀㼀琀眀攀攀琀开椀搀㴀∀⬀漀⸀琀眀攀攀琀开椀搀㬀ഀഀ
      o.retweeted_screen_name = o.retweet && item.retweeted_status.user.screen_name;਍      漀⸀琀眀攀攀琀开爀攀氀愀琀椀瘀攀开琀椀洀攀 㴀 昀漀爀洀愀琀开爀攀氀愀琀椀瘀攀开琀椀洀攀⠀攀砀琀爀愀挀琀开爀攀氀愀琀椀瘀攀开琀椀洀攀⠀漀⸀琀眀攀攀琀开琀椀洀攀⤀⤀㬀ഀഀ
      o.entities = item.entities ? (item.entities.urls || []).concat(item.entities.media || []) : [];਍      漀⸀琀眀攀攀琀开爀愀眀开琀攀砀琀 㴀 漀⸀爀攀琀眀攀攀琀 㼀 ⠀✀刀吀 䀀✀⬀漀⸀爀攀琀眀攀攀琀攀搀开猀挀爀攀攀渀开渀愀洀攀⬀✀ ✀⬀椀琀攀洀⸀爀攀琀眀攀攀琀攀搀开猀琀愀琀甀猀⸀琀攀砀琀⤀ 㨀 椀琀攀洀⸀琀攀砀琀㬀 ⼀⼀ 愀瘀漀椀搀 ✀⸀⸀⸀✀ 椀渀 氀漀渀最 爀攀琀眀攀攀琀猀ഀഀ
      o.tweet_text = $([linkURLs(o.tweet_raw_text, o.entities)]).linkUser().linkHash()[0];਍      漀⸀爀攀琀眀攀攀琀攀搀开琀眀攀攀琀开琀攀砀琀 㴀 ␀⠀嬀氀椀渀欀唀刀䰀猀⠀椀琀攀洀⸀琀攀砀琀Ⰰ 漀⸀攀渀琀椀琀椀攀猀⤀崀⤀⸀氀椀渀欀唀猀攀爀⠀⤀⸀氀椀渀欀䠀愀猀栀⠀⤀嬀　崀㬀ഀഀ
      o.tweet_text_fancy = $([o.tweet_text]).makeHeart()[0];਍ഀഀ
      o.avatar_size = s.avatar_size;਍      漀⸀愀瘀愀琀愀爀开甀爀氀 㴀 攀砀琀爀愀挀琀开愀瘀愀琀愀爀开甀爀氀⠀漀⸀爀攀琀眀攀攀琀 㼀 椀琀攀洀⸀爀攀琀眀攀攀琀攀搀开猀琀愀琀甀猀 㨀 椀琀攀洀Ⰰ ⠀搀漀挀甀洀攀渀琀⸀氀漀挀愀琀椀漀渀⸀瀀爀漀琀漀挀漀氀 㴀㴀㴀 ✀栀琀琀瀀猀㨀✀⤀⤀㬀ഀഀ
      o.avatar_screen_name = o.retweet ? o.retweeted_screen_name : o.screen_name;਍      漀⸀愀瘀愀琀愀爀开瀀爀漀昀椀氀攀开甀爀氀 㴀 漀⸀琀眀椀琀琀攀爀开戀愀猀攀⬀漀⸀愀瘀愀琀愀爀开猀挀爀攀攀渀开渀愀洀攀㬀ഀഀ
਍      ⼀⼀ 䐀攀昀愀甀氀琀 猀瀀愀渀猀Ⰰ 愀渀搀 瀀爀攀ⴀ昀漀爀洀愀琀琀攀搀 戀氀漀挀欀猀 昀漀爀 挀漀洀洀漀渀 氀愀礀漀甀琀猀ഀഀ
      o.user = t('<a class="tweet_user" href="{user_url}">{screen_name}</a>', o);਍      漀⸀樀漀椀渀 㴀 猀⸀樀漀椀渀开琀攀砀琀 㼀 琀⠀✀㰀猀瀀愀渀 挀氀愀猀猀㴀∀琀眀攀攀琀开樀漀椀渀∀㸀笀樀漀椀渀开琀攀砀琀紀㰀⼀猀瀀愀渀㸀✀Ⰰ 漀⤀ 㨀 ✀✀㬀ഀഀ
      o.avatar = o.avatar_size ?਍        琀⠀✀㰀愀 挀氀愀猀猀㴀∀琀眀攀攀琀开愀瘀愀琀愀爀∀ 栀爀攀昀㴀∀笀愀瘀愀琀愀爀开瀀爀漀昀椀氀攀开甀爀氀紀∀㸀㰀椀洀最 猀爀挀㴀∀笀愀瘀愀琀愀爀开甀爀氀紀∀ 栀攀椀最栀琀㴀∀笀愀瘀愀琀愀爀开猀椀稀攀紀∀ 眀椀搀琀栀㴀∀笀愀瘀愀琀愀爀开猀椀稀攀紀∀ 愀氀琀㴀∀笀愀瘀愀琀愀爀开猀挀爀攀攀渀开渀愀洀攀紀尀✀猀 愀瘀愀琀愀爀∀ 琀椀琀氀攀㴀∀笀愀瘀愀琀愀爀开猀挀爀攀攀渀开渀愀洀攀紀尀✀猀 愀瘀愀琀愀爀∀ 戀漀爀搀攀爀㴀∀　∀⼀㸀㰀⼀愀㸀✀Ⰰ 漀⤀ 㨀 ✀✀㬀ഀഀ
      o.time = t('<span class="tweet_time"><a href="{tweet_url}" title="view tweet on twitter">{tweet_relative_time}</a></span>', o);਍      漀⸀琀攀砀琀 㴀 琀⠀✀㰀猀瀀愀渀 挀氀愀猀猀㴀∀琀眀攀攀琀开琀攀砀琀∀㸀笀琀眀攀攀琀开琀攀砀琀开昀愀渀挀礀紀㰀⼀猀瀀愀渀㸀✀Ⰰ 漀⤀㬀ഀഀ
      o.retweeted_text = t('<span class="tweet_text">{retweeted_tweet_text}</span>', o);਍      漀⸀爀攀瀀氀礀开愀挀琀椀漀渀 㴀 琀⠀✀㰀愀 挀氀愀猀猀㴀∀琀眀攀攀琀开愀挀琀椀漀渀 琀眀攀攀琀开爀攀瀀氀礀∀ 栀爀攀昀㴀∀笀爀攀瀀氀礀开甀爀氀紀∀㸀爀攀瀀氀礀㰀⼀愀㸀✀Ⰰ 漀⤀㬀ഀഀ
      o.retweet_action = t('<a class="tweet_action tweet_retweet" href="{retweet_url}">retweet</a>', o);਍      漀⸀昀愀瘀漀爀椀琀攀开愀挀琀椀漀渀 㴀 琀⠀✀㰀愀 挀氀愀猀猀㴀∀琀眀攀攀琀开愀挀琀椀漀渀 琀眀攀攀琀开昀愀瘀漀爀椀琀攀∀ 栀爀攀昀㴀∀笀昀愀瘀漀爀椀琀攀开甀爀氀紀∀㸀昀愀瘀漀爀椀琀攀㰀⼀愀㸀✀Ⰰ 漀⤀㬀ഀഀ
      return o;਍    紀ഀഀ
਍    昀甀渀挀琀椀漀渀 爀攀渀搀攀爀开琀眀攀攀琀猀⠀眀椀搀最攀琀Ⰰ 琀眀攀攀琀猀⤀ 笀ഀഀ
      var list = $('<ul class="tweet_list">');਍      氀椀猀琀⸀愀瀀瀀攀渀搀⠀␀⸀洀愀瀀⠀琀眀攀攀琀猀Ⰰ 昀甀渀挀琀椀漀渀⠀漀⤀ 笀 爀攀琀甀爀渀 ∀㰀氀椀㸀∀ ⬀ 琀⠀猀⸀琀攀洀瀀氀愀琀攀Ⰰ 漀⤀ ⬀ ∀㰀⼀氀椀㸀∀㬀 紀⤀⸀樀漀椀渀⠀✀✀⤀⤀⸀ഀഀ
        children('li:first').addClass('tweet_first').end().਍        挀栀椀氀搀爀攀渀⠀✀氀椀㨀漀搀搀✀⤀⸀愀搀搀䌀氀愀猀猀⠀✀琀眀攀攀琀开攀瘀攀渀✀⤀⸀攀渀搀⠀⤀⸀ഀഀ
        children('li:even').addClass('tweet_odd');਍ഀഀ
      $(widget).empty().append(list);਍      椀昀 ⠀猀⸀椀渀琀爀漀开琀攀砀琀⤀ 氀椀猀琀⸀戀攀昀漀爀攀⠀✀㰀瀀 挀氀愀猀猀㴀∀琀眀攀攀琀开椀渀琀爀漀∀㸀✀⬀猀⸀椀渀琀爀漀开琀攀砀琀⬀✀㰀⼀瀀㸀✀⤀㬀ഀഀ
      if (s.outro_text) list.after('<p class="tweet_outro">'+s.outro_text+'</p>');਍ഀഀ
      $(widget).trigger("loaded").trigger((tweets.length === 0 ? "empty" : "full"));਍      椀昀 ⠀猀⸀爀攀昀爀攀猀栀开椀渀琀攀爀瘀愀氀⤀ 笀ഀഀ
        window.setTimeout(function() { $(widget).trigger("tweet:load"); }, 1000 * s.refresh_interval);਍      紀ഀഀ
    }਍ഀഀ
    function load(widget) {਍      瘀愀爀 氀漀愀搀椀渀最 㴀 ␀⠀✀㰀瀀 挀氀愀猀猀㴀∀氀漀愀搀椀渀最∀㸀✀⬀猀⸀氀漀愀搀椀渀最开琀攀砀琀⬀✀㰀⼀瀀㸀✀⤀㬀ഀഀ
      if (s.loading_text) $(widget).not(":has(.tweet_list)").empty().append(loading);਍      ␀⸀最攀琀䨀匀伀一⠀戀甀椀氀搀开愀瀀椀开甀爀氀⠀⤀Ⰰ 昀甀渀挀琀椀漀渀⠀搀愀琀愀⤀笀ഀഀ
        var tweets = $.map(data.results || data, extract_template_data);਍        琀眀攀攀琀猀 㴀 ␀⸀最爀攀瀀⠀琀眀攀攀琀猀Ⰰ 猀⸀昀椀氀琀攀爀⤀⸀猀漀爀琀⠀猀⸀挀漀洀瀀愀爀愀琀漀爀⤀⸀猀氀椀挀攀⠀　Ⰰ 猀⸀挀漀甀渀琀⤀㬀ഀഀ
        $(widget).trigger("tweet:retrieved", [tweets]);਍      紀⤀㬀ഀഀ
    }਍ഀഀ
    return this.each(function(i, widget){਍      椀昀⠀猀⸀甀猀攀爀渀愀洀攀 ☀☀ 琀礀瀀攀漀昀⠀猀⸀甀猀攀爀渀愀洀攀⤀ 㴀㴀 ∀猀琀爀椀渀最∀⤀笀ഀഀ
        s.username = [s.username];਍      紀ഀഀ
਍      ␀⠀眀椀搀最攀琀⤀⸀甀渀戀椀渀搀⠀∀琀眀攀攀琀㨀爀攀渀搀攀爀∀⤀⸀甀渀戀椀渀搀⠀∀琀眀攀攀琀㨀爀攀琀爀椀攀瘀攀搀∀⤀⸀甀渀戀椀渀搀⠀∀琀眀攀攀琀㨀氀漀愀搀∀⤀⸀ഀഀ
        bind({਍          ∀琀眀攀攀琀㨀氀漀愀搀∀㨀 昀甀渀挀琀椀漀渀⠀⤀ 笀 氀漀愀搀⠀眀椀搀最攀琀⤀㬀 紀Ⰰഀഀ
          "tweet:retrieved": function(ev, tweets) {਍            ␀⠀眀椀搀最攀琀⤀⸀琀爀椀最最攀爀⠀∀琀眀攀攀琀㨀爀攀渀搀攀爀∀Ⰰ 嬀琀眀攀攀琀猀崀⤀ഀഀ
          },਍          ∀琀眀攀攀琀㨀爀攀渀搀攀爀∀㨀 昀甀渀挀琀椀漀渀⠀攀瘀Ⰰ 琀眀攀攀琀猀⤀ 笀ഀഀ
            render_tweets($(widget), tweets);਍          紀ഀഀ
        }).trigger("tweet:load");਍    紀⤀㬀ഀഀ
  };਍紀⤀⤀㬀�