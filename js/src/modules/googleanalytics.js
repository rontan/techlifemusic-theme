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