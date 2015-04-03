var Casper = function (a, b) {
    "use strict";
    var c = function () {
        var b, c, d = a.innerWidth || document.documentElement.clientWidth || document.body.clientWidth, e = document.getElementsByTagName("body")[0].getElementsByTagName("img"), f = a.devicePixelRatio && a.devicePixelRatio >= 1.2 ? 1 : 0;
        if (0 !== e.length)for (c = e[0].hasAttribute ? function (a, b) {
            return a.hasAttribute(b)
        } : function (a, b) {
            return null !== a.getAttribute(b)
        }, b = 0; b < e.length; b++) {
            var g = e[b], h = f && c(g, "data-src2x") ? "data-src2x" : "data-src", i = f && c(g, "data-src-base2x") ? "data-src-base2x" : "data-src-base";
            if (g.onload = function () {
                    this.style.opacity = "1"
                }, c(g, h))for (var j = c(g, i) ? g.getAttribute(i) : "", k = g.getAttribute(h), l = k.split(","), m = 0; m < l.length; m++) {
                var n, o, p = l[m].replace(":", "||").split("||"), q = p[0], r = p[1];
                if (-1 !== q.indexOf("<"))if (n = q.split("<"), l[m - 1]) {
                    var s = l[m - 1].split(/:(.+)/), t = s[0].split("<");
                    o = d <= n[1] && d > t[1]
                } else o = d <= n[1]; else if (n = q.split(">"), l[m + 1]) {
                    var u = l[m + 1].split(/:(.+)/), v = u[0].split(">");
                    o = d >= n[1] && d < v[1]
                } else o = d >= n[1];
                if (o) {
                    var w, x = -1 !== r.indexOf("//") ? 1 : 0;
                    w = 1 === x ? r : j + r, g.src !== w && g.setAttribute("src", w);
                    break
                }
            }
        }
    }, d = function () {
        b(".post-content").fitVids(), b(a).load(function () {
            c()
        })
    };
    return b(document).ready(function () {
        d()
    }), {}
}(window, jQuery);
!function (a) {
    "use strict";
    a.fn.fitVids = function (b) {
        var c = {customSelector: null};
        if (!document.getElementById("fit-vids-style")) {
            var d = document.createElement("div"), e = document.getElementsByTagName("base")[0] || document.getElementsByTagName("script")[0], f = "&shy;<style>.fluid-width-video-wrapper{width:100%;position:relative;padding:0;}.fluid-width-video-wrapper iframe,.fluid-width-video-wrapper object,.fluid-width-video-wrapper embed {position:absolute;top:0;left:0;width:100%;height:100%;}</style>";
            d.className = "fit-vids-style", d.id = "fit-vids-style", d.style.display = "none", d.innerHTML = f, e.parentNode.insertBefore(d, e)
        }
        return b && a.extend(c, b), this.each(function () {
            var b = ["iframe[src*='player.vimeo.com']", "iframe[src*='youtube.com']", "iframe[src*='youtube-nocookie.com']", "iframe[src*='kickstarter.com'][src*='video.html']", "object", "embed"];
            c.customSelector && b.push(c.customSelector);
            var d = a(this).find(b.join(","));
            d = d.not("object object"), d.each(function () {
                var b = a(this);
                if (!("embed" === this.tagName.toLowerCase() && b.parent("object").length || b.parent(".fluid-width-video-wrapper").length)) {
                    var c = "object" === this.tagName.toLowerCase() || b.attr("height") && !isNaN(parseInt(b.attr("height"), 10)) ? parseInt(b.attr("height"), 10) : b.height(), d = isNaN(parseInt(b.attr("width"), 10)) ? b.width() : parseInt(b.attr("width"), 10), e = c / d;
                    if (!b.attr("id")) {
                        var f = "fitvid" + Math.floor(999999 * Math.random());
                        b.attr("id", f)
                    }
                    b.wrap('<div class="fluid-width-video-wrapper"></div>').parent(".fluid-width-video-wrapper").css("padding-top", 100 * e + "%"), b.removeAttr("height").removeAttr("width")
                }
            })
        })
    }
}(window.jQuery || window.Zepto), function () {
    var a, b, c;
    if (a = document.getElementById("site-navigation"), a && (b = a.getElementsByTagName("h1")[0], "undefined" != typeof b)) {
        if (c = a.getElementsByTagName("ul")[0], "undefined" == typeof c)return void(b.style.display = "none");
        -1 === c.className.indexOf("nav-menu") && (c.className += " nav-menu"), b.onclick = function () {
            -1 !== a.className.indexOf("toggled") ? a.className = a.className.replace(" toggled", "") : a.className += " toggled"
        }
    }
}(), function () {
    var a = navigator.userAgent.toLowerCase().indexOf("webkit") > -1, b = navigator.userAgent.toLowerCase().indexOf("opera") > -1, c = navigator.userAgent.toLowerCase().indexOf("msie") > -1;
    if ((a || b || c) && "undefined" != typeof document.getElementById) {
        var d = window.addEventListener ? "addEventListener" : "attachEvent";
        window[d]("hashchange", function () {
            var a = document.getElementById(location.hash.substring(1));
            a && (/^(?:a|select|input|button|textarea)jQuery/i.test(a.tagName) || (a.tabIndex = -1), a.focus())
        }, !1)
    }
}();

(function(){
    /*
    * !!TODO
    *  - Make elements cache values
    *  - Fix bug in mobile OS
    *  - Make sure the Script run properly in IE versions 10+ ~ 9
    *  - Fix Shadow for header !
    *  - Handling error better.
    *
    * */

    window.onscroll = function(){
        var _postion_top = document.documentElement.scrollTop || document.body.scrollTop,
            _header_element = document.getElementById('site-navigation'),
            class_name = "box_shadow";
        console.log("poss - > " + _postion_top);

        if(_postion_top > 340){
            if (_header_element.classList){
                _header_element.classList.add(class_name);
            } else{
                _header_element.className += ' ' + class_name;
            }
        }else{
            if(_postion_top < 340){
                if (_header_element.classList) {
                    _header_element.classList.remove(class_name);
                }else {
                    _header_element.className = _header_element.className.replace(new RegExp('(^|\\b)' + class_name.split(' ').join('|') + '(\\b|jQuery)', 'gi'), ' ');
                }
            }
        }
    };
    window.onload = function(){
        var _postion_top = document.documentElement.scrollTop || document.body.scrollTop,
            _header_element = document.getElementById('site-navigation'),
            class_name = "box_shadow";
        if(_postion_top > 340){
            if (_header_element.classList){
                _header_element.classList.add(class_name);
            } else{
                _header_element.className += ' ' + class_name;
            }
        }else{
            if(_postion_top < 340){
                if (_header_element.classList) {
                    _header_element.classList.remove(class_name);
                }else {
                    _header_element.className = _header_element.className.replace(new RegExp('(^|\\b)' + class_name.split(' ').join('|') + '(\\b|jQuery)', 'gi'), ' ');
                }
            }
        }
    };
})();
jQuery(document).ready(function() {
    var toType = function(obj) {
        return ({}).toString.call(obj).match(/\s([a-zA-Z]+)/)[1].toLowerCase()
    };

    function invert(rgb) {
        rgb = [].slice.call(arguments).join(",").replace(/rgb\(|\)|rgba\(|\)|\s/gi, '').split(',');
        for (var i = 0; i < rgb.length; i++) rgb[i] = (i === 3 ? 1 : 255) - rgb[i];
        return rgb.join(", ");
    }

    function contrastingColor(color) {
        console.log("luna --> "+luma(color));
        return (luma(color) >= 165) ? '000' : 'fff';
    }

    function luma(color) {
        console.log("got at luna -> " + color);
        console.log("--> "+ toType(color));
        var rgb = (typeof color === 'string') ? hexToRGBArray(color) : color;
        return (0.2126 * rgb[0]) + (0.7152 * rgb[1]) + (0.0722 * rgb[2]);
    }

    function hexToRGBArray(color) {
        if (color.length === 3) {
            color = color.charAt(0) + color.charAt(0) + color.charAt(1) + color.charAt(1) + color.charAt(2) + color.charAt(2);
        } else if (color.length !== 6) {
            //throw('Invalid hex color: ' + color);
            var rgb = [];
            for (var i = 0; i <= 2; i++) {
                rgb[i] = parseInt(color.substr(i * 2, 2), 16);
            }
            return rgb;
        }
    }

    var hexDigits = ["0","1","2","3","4","5","6","7","8","9","a","b","c","d","e","f"];

    function rgb2hex(rgb) {
        console.log("getting --> " + rgb);
        rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
        console.log("hex --> " + "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]));
        return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
    }

    function hex(x) {
        return isNaN(x) ? "00" : hexDigits[(x - x % 16) / 16] + hexDigits[x % 16];
    }


    var colorAnimations = function(){
        var pro = {
            _color : "rgba(0,0,0,0.7)",
            _animation : "all",
            _speed : "0.5s",
            _ease : "ease",
            _repeat : false
        };

        var _init = function(){
            var _ele = document.querySelector('#header_image');
            var tem = {
                animation : _ele.dataset.animation,
                color : _ele.dataset.color,
                ease : _ele.dataset.ease,
                speed : _ele.dataset.speed,
                repeat: _ele.dataset.repeat
            };
            if(typeof tem.animation !== 'undefined' || tem.animation !== ""){
                pro._animation = tem.animation;
            }
            if(typeof tem.color !== 'undefined' || tem.color !== ""){
                pro._color = tem.color;
            }
            if(typeof tem.ease !== 'undefined' || tem.ease !== ""){
                pro._ease = tem.ease;
            }
            if(typeof tem.speed !== 'undefined' || tem.speed !== ""){
                pro._speed = tem.speed;
            }
            if(typeof tem.repeat === 'boolean' && tem.repeat !== ""){
                pro._repeat = tem.repeat;
                setRepeater(pro._repeat);
            }
        };

        var setElementColor = function(_color, _elem){

        };

        var setAnimations = function(_animation, _seped, _ease){


        };

        var setRepeater = function(_repeat){
            if(typeof _repeat === 'boolean'){
                pro._repeat = _repeat
                return this;
            }
        };

        var isMobile = function(){
            var ismobile = ""
        };

        var isTablet = function(){

        };

    };

    jQuery.adaptiveBackground.run();
    jQuery('.main-navigation').css('color', 'rgba(0,0,0,0.6)');
    jQuery('#header_image').on('ab-color-found', function (ev, payload) {

        jQuery('.main-navigation').css('color', payload.color);

        var rgb_color = payload.color,
            color_hex = rgb2hex(rgb_color),
            color_const = contrastingColor(rgb_color);

        console.log("--- > " + rgb_color);
        console.log("--- > " + color_hex);
        console.log("--- > " + color_const);
        console.log("inv ---> " + invert(rgb_color))

        var css_object = {
            'color': 'rgb('+invert(rgb_color)+')'
        };
        jQuery('.blog-title a').css(css_object);
        jQuery('.blog-description').css(css_object);

        jQuery('.current-menu-item a').css({
            'color': payload.color,
            'border-color': payload.color
        });
        jQuery('.main-navigation a').hover(function () {
            jQuery(this).addClass('nav_active');
            jQuery(this).css({
                'color': payload.color,
                'border-color': payload.color
            });
        }, function () {
            //noinspection JSValidateTypes
            if (!jQuery(this).parent().hasClass('current-menu-item')) {
                jQuery(this).css({
                    'color': 'rgba(0,0,0,0.8)',
                    'border-color': 'transparent'
                });
            }
        });
    });

    var animationClass = new colorAnimations();
    animationClass._init();

});

