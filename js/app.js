(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);throw new Error("Cannot find module '"+o+"'")}var f=n[o]={exports:{}};t[o][0].call(f.exports,function(e){var n=t[o][1][e];return s(n?n:e)},f,f.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
module.exports = { 
    init : function (googleTrackerId) {
        (function(b,o,i,l,e,r){
            b.GoogleAnalyticsObject=l;
            if (!b[l]) {
                b[l] = function() { 
                    (b[l].q=(b[l].q||[])).push(arguments);
                };
            }
            b[l].l = +new Date();
            e=o.createElement(i);
            r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r);
        }(window,document,'script','ga'));
        ga('create',googleTrackerId);ga('send','pageview');
    }
};
},{}],2:[function(require,module,exports){

// import google analytics script
require('./modules/googleanalytics.js').init('UA-XXXXX-X');
},{"./modules/googleanalytics.js":1}]},{},[2])