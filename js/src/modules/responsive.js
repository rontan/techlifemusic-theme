/**
 *  @module provides responsive adjustments to the app
 */

var $ = jQuery,
    dom = require('./dom'),
    _ = require('../../lib/underscore.min.js'),
    fn = {}
    ;

module.exports = {

    init : function (opts) {
        $(function () {
            _.each(opts || {}, function (v, k) {
                (fn[k] || $.noop)(v);
            });
        });
    }
};

// responsive adjustment functions

/** @function enables <img/>s when within a certain width threshold */
fn['responsive-images'] = function () {

    var tag = 'responsive-image',
        threshold_tag = 'responsive-image-width',
        width = dom.window.width()
        ;

    $('img[data-' + tag + ']').each(function () {
        var self = $(this),
            threshold = self.data(threshold_tag)
            ;

        // failsafe
        if (!_.isNumber(threshold) || threshold > width) { 
            return; 
        }

        self.attr('src', self.data(tag));
    });    
};