var $ = jQuery,
    dom = {}
    ;

// gotta wait for document.ready
$(function () {

    $.extend(dom, {

        window : $(window),
        document : $(document)

    });
});


// edit above this line
module.exports = dom;

