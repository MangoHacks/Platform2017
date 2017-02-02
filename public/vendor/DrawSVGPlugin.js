/*!
 * VERSION: 0.1.2
 * DATE: 2017-01-09
 * UPDATES AND DOCS AT: http://greensock.com
 *
 * @license Copyright (c) 2008-2017, GreenSock. All rights reserved.
 * DrawSVGPlugin is a Club GreenSock membership benefit; You must have a valid membership to use
 * this code without violating the terms of use. Visit http://greensock.com/club/ to sign up or get more details.
 * This work is subject to the software agreement that was issued with your membership.
 *
 * @author: Jack Doyle, jack@greensock.com
 */
var _gsScope = "undefined" != typeof module && module.exports && "undefined" != typeof global ? global : this || window;
(_gsScope._gsQueue || (_gsScope._gsQueue = [])).push(function() {
    "use strict";
    function e(e, t, r, o, i, n) {
        return r = (parseFloat(r) - parseFloat(e)) * i,
            o = (parseFloat(o) - parseFloat(t)) * n,
            Math.sqrt(r * r + o * o)
    }
    function t(e) {
        return "string" != typeof e && e.nodeType || (e = _gsScope.TweenLite.selector(e),
        e.length && (e = e[0])),
            e
    }
    function r(e, t, r) {
        var o, i, n = e.indexOf(" ");
        return -1 === n ? (o = void 0 !== r ? r + "" : e,
            i = e) : (o = e.substr(0, n),
            i = e.substr(n + 1)),
            o = -1 !== o.indexOf("%") ? parseFloat(o) / 100 * t : parseFloat(o),
            i = -1 !== i.indexOf("%") ? parseFloat(i) / 100 * t : parseFloat(i),
            o > i ? [i, o] : [o, i]
    }
    function o(r) {
        if (!r)
            return 0;
        r = t(r);
        var o, i, n, s, h, f, d, l = r.tagName.toLowerCase(), g = 1, u = 1;
        "non-scaling-stroke" === r.getAttribute("vector-effect") && (u = r.getScreenCTM(),
            g = u.a,
            u = u.d);
        try {
            i = r.getBBox()
        } catch (c) {}
        if (i && (i.width || i.height) || "rect" !== l && "circle" !== l && "ellipse" !== l || (i = {
                width: parseFloat(r.getAttribute("rect" === l ? "width" : "circle" === l ? "r" : "rx")),
                height: parseFloat(r.getAttribute("rect" === l ? "height" : "circle" === l ? "r" : "ry"))
            },
            "rect" !== l && (i.width *= 2,
                i.height *= 2)),
            "path" === l)
            s = r.style.strokeDasharray,
                r.style.strokeDasharray = "none",
                o = r.getTotalLength() || 0,
            g !== u && console.log("Warning: <path> length cannot be measured accurately when vector-effect is non-scaling-stroke and the element isn't proportionally scaled."),
                o *= (g + u) / 2,
                r.style.strokeDasharray = s;
        else if ("rect" === l)
            o = 2 * i.width * g + 2 * i.height * u;
        else if ("line" === l)
            o = e(r.getAttribute("x1"), r.getAttribute("y1"), r.getAttribute("x2"), r.getAttribute("y2"), g, u);
        else if ("polyline" === l || "polygon" === l)
            for (n = r.getAttribute("points").match(a) || [],
                 "polygon" === l && n.push(n[0], n[1]),
                     o = 0,
                     h = 2; h < n.length; h += 2)
                o += e(n[h - 2], n[h - 1], n[h], n[h + 1], g, u) || 0;
        else
            ("circle" === l || "ellipse" === l) && (f = i.width / 2 * g,
                d = i.height / 2 * u,
                o = Math.PI * (3 * (f + d) - Math.sqrt((3 * f + d) * (f + 3 * d))));
        return o || 0
    }
    function i(e, r) {
        if (!e)
            return [0, 0];
        e = t(e),
            r = r || o(e) + 1;
        var i = s(e)
            , n = i.strokeDasharray || ""
            , a = parseFloat(i.strokeDashoffset)
            , h = n.indexOf(",");
        return 0 > h && (h = n.indexOf(" ")),
            n = 0 > h ? r : parseFloat(n.substr(0, h)) || 1e-5,
        n > r && (n = r),
            [Math.max(0, -a), Math.max(0, n - a)]
    }
    var n, s = document.defaultView ?
            document.defaultView.getComputedStyle :
            function() {},
        a = /(?:(-|-=|\+=)?\d*\.?\d*(?:e[\-+]?\d+)?)[0-9]/gi,
        h = "codepen",
        f = "DrawSVGPlugin",
        d = "greensock.com",
        l = "/requires-membership/",
        g = function(e) {
            // for (var t = -1 !== (window ? window.location.href : "").indexOf("greensock") && -1 !== e.indexOf("localhost"), r = [d, "codepen.io", "codepen.dev", "css-tricks.com", "cdpn.io", "gannon.tv", "codecanyon.net", "themeforest.net", "cerebrax.co.uk", "tympanus.net", "tweenmax.com", "tweenlite.com", "plnkr.co", "hotjar.com", "jsfiddle.net"], o = r.length; --o > -1; )
            for (var t = -1 !== (window ? window.location.href : "").indexOf("greensock"), r = [d, "codepen.io", "localhost", "mango17.dev", "mangohacks.dev", "mangohacks.com", "codepen.dev", "css-tricks.com", "cdpn.io", "gannon.tv", "codecanyon.net", "themeforest.net", "cerebrax.co.uk", "tympanus.net", "tweenmax.com", "tweenlite.com", "plnkr.co", "hotjar.com", "jsfiddle.net"], o = r.length; --o > -1; )
                if (-1 !== e.indexOf(r[o]))
                    return !0;
            return t && window && window.console && console.log("WARNING: a special version of " + f + " is running locally, but it will not work on a live domain because it is a membership benefit of Club GreenSock. Please sign up at http://greensock.com/club/ and then download the 'real' version from your GreenSock account which has no such limitations. The file you're using was likely downloaded from elsewhere on the web and is restricted to local use or on sites like codepen.io."),
                t
        }(window ? window.location.host : "");
    n = _gsScope._gsDefine.plugin({
        propName: "drawSVG",
        API: 2,
        version: "0.1.1",
        global: !0,
        overwriteProps: ["drawSVG"],
        init: function(e, t, n, s) {
            if (!e.getBBox)
                return !1;
            if (!g)
                return window.location.href = "http://" + d + l + "?plugin=" + f + "&source=" + h,
                    !1;
            var a, u, c, p = o(e) + 1;
            return this._style = e.style,
            "function" == typeof t && (t = t(s, e)),
                t === !0 || "true" === t ? t = "0 100%" : t ? -1 === (t + "").indexOf(" ") && (t = "0 " + t) : t = "0 0",
                a = i(e, p),
                u = r(t, p, a[0]),
                this._length = p + 10,
                0 === a[0] && 0 === u[0] ? (c = Math.max(1e-5, u[1] - p),
                    this._dash = p + c,
                    this._offset = p - a[1] + c,
                    this._addTween(this, "_offset", this._offset, p - u[1] + c, "drawSVG")) : (this._dash = a[1] - a[0] || 1e-6,
                    this._offset = -a[0],
                    this._addTween(this, "_dash", this._dash, u[1] - u[0] || 1e-5, "drawSVG"),
                    this._addTween(this, "_offset", this._offset, -u[0], "drawSVG")),
                g
        },
        set: function(e) {
            this._firstPT && (this._super.setRatio.call(this, e),
                this._style.strokeDashoffset = this._offset,
                this._style.strokeDasharray = 1 === e || 0 === e ? this._offset < .001 && this._length - this._dash <= 10 ? "none" : this._offset === this._dash ? "0px, 999999px" : this._dash + "px," + this._length + "px" : this._dash + "px," + this._length + "px")
        }
    }),
        n.getLength = o,
        n.getPosition = i
}),
_gsScope._gsDefine && _gsScope._gsQueue.pop()(),
    function(e) {
        "use strict";
        var t = function() {
            return (_gsScope.GreenSockGlobals || _gsScope)[e]
        };
        "function" == typeof define && define.amd ? define(["TweenLite"], t) : "undefined" != typeof module && module.exports && (require("../TweenLite.js"),
            module.exports = t())
    }("DrawSVGPlugin");
