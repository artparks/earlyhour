!function($,window,undefined){function browserSize(){wh=$window.height(),ww=$window.width(),dh=$(document).height(),ar=ww/wh}function platformDetect(){$.support.touch="ontouchend"in document;var navUA=navigator.userAgent.toLowerCase(),navPlat=navigator.platform.toLowerCase(),isiPhone=navPlat.indexOf("iphone"),isiPod=navPlat.indexOf("ipod"),isAndroidPhone=navPlat.indexOf("android"),safari=-1!=navUA.indexOf("safari")&&-1==navUA.indexOf("chrome")?!0:!1;window.SVGAngle?!0:!1,document.implementation.hasFeature("http://www.w3.org/TR/SVG11/feature#BasicStructure","1.1")?!0:!1,/gecko/i.test(navUA)&&/rv:1.9/i.test(navUA)?!0:!1;ieMobile=navigator.userAgent.match(/Windows Phone/i)?!0:!1,phone=isiPhone>-1||isiPod>-1||isAndroidPhone>-1?!0:!1,touch=$.support.touch?!0:!1;var $bod=$("body");touch&&$("html").addClass("touch"),ieMobile&&$("html").addClass("is--winmob"),is_android&&$("html").addClass("is--ancient-android"),safari&&$bod.addClass("safari"),phone&&$bod.addClass("phone")}function updateStickyMenu(){return latestKnownScrollY+pageTop>navTop&&!sticked?($navWrap.css({position:"fixed",top:pageTop,left:navLeft,width:navWidth}),$(".main-navigation").css("height",navHeight),sticked=!0,void $navWrap.addClass("sunrise")):void(navTop>=latestKnownScrollY+pageTop&&sticked&&($navWrap.css({position:"",left:"",top:"",width:""}),$(".main-navigation").css("height",""),$navWrap.removeClass("sunrise"),sticked=!1))}function refreshNavigation(){navTop="undefined"!=typeof $navContainer.offset()?$navContainer.offset().top:0,navLeft="undefined"!=typeof $navContainer.offset()?$navContainer.offset().left:0,containerWidth=$navContainer.outerWidth(),navWidth=$nav.outerWidth(),navHeight=$nav.outerHeight(),pageTop=$("#page").offset().top,sticked&&($navContainer.height(navHeight),$nav.velocity({width:containerWidth},{easing:"easeOutCubic",duration:200})),isOpen&&$([$nav,$navTrigger]).each(function(i,obj){$(obj).velocity({translateX:navWidth},{easing:"easeOutQuint",duration:200})}),navWidth=containerWidth}function requestTick(){"use strict";ticking||requestAnimationFrame(update),ticking=!0}function update(){"use strict";ticking=!1,is_android||updateStickyMenu()}function init(){touch=!1,browserSize(),platformDetect()}var phone,touch,wh,ww,dh,ar,transform,$window=$(window),windowHeight=$window.height(),windowWidth=$window.width(),ua=navigator.userAgent,winLoc=window.location.toString(),is_webkit=ua.match(/webkit/i),is_firefox=ua.match(/gecko/i),is_newer_ie=ua.match(/msie (9|([1-9][0-9]))/i),nua=(ua.match(/msie/i)&&!is_newer_ie,ua.match(/msie 6/i),ua.match(/mobile/i),ua.match(/(iPad|iPhone|iPod|Macintosh)/g)?!0:!1,navigator.userAgent),is_android=-1!==nua.indexOf("Mozilla/5.0")&&-1!==nua.indexOf("Android ")&&-1!==nua.indexOf("AppleWebKit")&&-1===nua.indexOf("Chrome"),useTransform=!0,prefixes=(ua.match(/msie 9/i)||winLoc.match(/transform\=2d/i),{webkit:"webkitTransform",firefox:"MozTransform",ie:"msTransform",w3c:"transform"});useTransform&&(is_webkit?transform=prefixes.webkit:is_firefox?transform=prefixes.firefox:is_newer_ie&&(transform=prefixes.ie)),function(){var $container=$(".archive__grid"),$blocks=$container.children().addClass("post--animated  post--loaded");$blocks.first().children().length;$container.imagesLoaded(function(){function showBlocks($blocks){$blocks.each(function(i,obj){var $block=$(obj);$block.velocity({translateY:40},{duration:0}),setTimeout(function(){$block.velocity({translateY:0},{easing:"easeOutQuad",duration:100}),$block.children().each(function(j,child){var $child=$(child),timeout=100*(j+1);$child.velocity({opacity:0,translateY:40},{duration:0}),$child.velocity({opacity:1,translateY:0},{duration:300,delay:timeout})}),setTimeout(function(){$block.toggleClass("sticky--bg",$block.hasClass("sticky")),$block.addClass("post--visible")},300)},200*i)})}$("html").hasClass("touch")||$blocks.addHoverAnimation(),$container.masonry({isAnimated:!1,itemSelector:".grid__item",hiddenStyle:{opacity:0}}),showBlocks($blocks),$(window).smartresize(function(){$container.masonry("layout")}),$(document.body).on("post-load",function(){var $newBlocks=$(".archive__grid").children().not(".post--loaded").addClass("post--loaded");$newBlocks.imagesLoaded(function(){$container.masonry("appended",$newBlocks,!0).masonry("layout"),$("html").hasClass("touch")||$newBlocks.addHoverAnimation(),showBlocks($newBlocks)})})})}();var $nav=$(".nav--main"),$navWrap=$(".nav-wrap"),$navTrigger=$(".navigation__trigger"),$navContainer=$(".main-navigation"),navTop="undefined"!=typeof $navContainer.offset()?$navContainer.offset().top:0,navLeft="undefined"!=typeof $navContainer.offset()?$navContainer.offset().left:0,navWidth=$nav.outerWidth(),containerWidth=$navContainer.outerWidth(),navHeight=$navContainer.outerHeight(),isOpen=($(".toolbar"),!1),pageTop=$("#page").offset().top,sticked=!1,triggerEvents="click touchstart";is_android&&(triggerEvents="click"),$navTrigger.on(triggerEvents,function(e){e.preventDefault(),e.stopPropagation(),isOpen=!isOpen,$("body").toggleClass("nav--is-open");var offset;navWidth=$nav.outerWidth(),offset=$("body").hasClass("rtl")?-1*navWidth:navWidth,offset=250,is_android||(isOpen?$([$nav,$navTrigger]).each(function(i,obj){$(obj).velocity({translateX:offset,translateZ:.01},{easing:"easeOutCubic",duration:300})}):$([$nav,$navTrigger]).each(function(i,obj){$(obj).velocity({translateX:0,translateZ:.01},{duration:300,easing:"easeInQuart"})}),$nav.toggleClass("shadow",isOpen))}),$.fn.addHoverAnimation=function(){return this.each(function(i,obj){function animateHoverIn(){$hover.find(".hover__bg").velocity("reverse",{easing:"easeOutQuart",duration:500}),$hover.find(".hover__line").velocity("reverse",{easing:"easeOutQuart",duration:350,delay:150}),$hover.find(".hover__more").velocity("reverse",{easing:"easeOutQuart",duration:350,delay:150}),$hover.find(".hover__letter").velocity({opacity:1,translateX:"-50%",translateY:"-50%"},{easing:"easeOutQuart",duration:350,delay:150})}function animateHoverOut(){$hover.find(".hover__letter-mask").outerHeight();$hover.find(".hover__letter").velocity({opacity:0,translateX:"-50%",translateY:"-50%"},{easing:"easeOutQuart",duration:350,delay:0}),$hover.find(".hover__more").velocity("reverse",{duration:350,delay:0}),$hover.find(".hover__line").velocity("reverse",{duration:350,delay:0}),$hover.find(".hover__bg").velocity("reverse",{duration:350,delay:0})}var $obj=$(obj),$handler=$obj.find(".hover__handler"),$hover=$obj.find(".hover");if($hover.length){var $letter=$hover.find(".hover__letter");$letter.outerWidth,$letter.outerHeight;$hover.find(".hover__bg").velocity({opacity:0},{duration:0}),$hover.find(".hover__line").velocity({height:0},{duration:0}),$hover.find(".hover__more").velocity({opacity:0},{duration:0}),$hover.find(".hover__letter").velocity({opacity:0,translateX:"-50%",translateY:"-50%"},{duration:0}),$handler.length&&$handler.hoverIntent({over:animateHoverIn,out:animateHoverOut,timeout:100,interval:50})}})},function(){function closeOverlay(){if(isOpen){var offset;offset=$("body").hasClass("rtl")?windowWidth:-1*windowWidth,$overlay.velocity({translateX:offset},{duration:0}),$overlay.velocity({translateX:0},{duration:300,easing:"easeInCubic"}),$overlay.find("input").blur(),isOpen=!1}}function escOverlay(e){27==e.keyCode&&closeOverlay()}var isOpen=!1,$overlay=$(".overlay--search");$(window).on("smartresize",function(){windowWidth=$(window).outerWidth(),isOpen&&$overlay.velocity({translateX:-1*windowWidth},{duration:200,easing:"easeInCubic"})}),$(".nav__item--search").on("click touchstart",function(e){if(e.preventDefault(),e.stopPropagation(),!isOpen){var offset;offset=$("body").hasClass("rtl")?windowWidth:-1*windowWidth,$overlay.find("input").focus(),$overlay.velocity({translateX:0},{duration:0}).velocity({translateX:offset},{duration:300,easing:"easeOut",queue:!1}),$(".search-form").velocity({translateX:300,opacity:0},{duration:0}).velocity({opacity:1},{duration:200,easing:"easeOutQuad",delay:200,queue:!1}).velocity({translateX:0},{duration:400,easeing:[.175,.885,.32,1.275],delay:50,queue:!1}),$(".overlay__wrapper > p").velocity({translateX:200,opacity:0},{duration:0}).velocity({opacity:1},{duration:400,easing:"easeOutQuad",delay:350,queue:!1}).velocity({translateX:0},{duration:400,easing:[.175,.885,.32,1.275],delay:250,queue:!1}),$(document).on("keyup",escOverlay),isOpen=!0}}),$(".overlay__close").on("click touchstart",function(e){e.preventDefault(),e.stopPropagation(),closeOverlay(),$(document).off("keyup",escOverlay)})}(),function($,sr){var debounce=function(func,threshold,execAsap){var timeout;return function(){function delayed(){execAsap||func.apply(obj,args),timeout=null}var obj=this,args=arguments;timeout?clearTimeout(timeout):execAsap&&func.apply(obj,args),timeout=setTimeout(delayed,threshold||200)}};jQuery.fn[sr]=function(fn){return fn?this.bind("resize",debounce(fn)):this.trigger(sr)}}(jQuery,"smartresize");var latestKnownScrollY=window.scrollY,ticking=!1;$(document).ready(function(){init()}),$window.load(function(){function showSubMenu(){$(this).addClass("hover")}function hideSubMenu(){$(this).removeClass("hover")}$(".nav--main").addClass("hover-intent");$(".nav--main li").hoverIntent({over:showSubMenu,out:hideSubMenu,timeout:300})}),$(window).smartresize(function(){is_android||refreshNavigation(),windowWidth=$(window).outerWidth(),windowHeight=$(window).outerHeight()}),$window.on("scroll",function(e){"use strict";latestKnownScrollY=window.scrollY,requestTick()}),Date.now||(Date.now=function(){return(new Date).getTime()}),function(){"use strict";for(var vendors=["webkit","moz"],i=0;i<vendors.length&&!window.requestAnimationFrame;++i){var vp=vendors[i];window.requestAnimationFrame=window[vp+"RequestAnimationFrame"],window.cancelAnimationFrame=window[vp+"CancelAnimationFrame"]||window[vp+"CancelRequestAnimationFrame"]}if(/iP(ad|hone|od).*OS 6/.test(window.navigator.userAgent)||!window.requestAnimationFrame||!window.cancelAnimationFrame){var lastTime=0;window.requestAnimationFrame=function(callback){var now=Date.now(),nextTime=Math.max(lastTime+16,now);return setTimeout(function(){callback(lastTime=nextTime)},nextTime-now)},window.cancelAnimationFrame=clearTimeout}}()}(jQuery,window);