var $ = jQuery;

// import google analytics script
require('./modules/googleanalytics.js').init('UA-XXXXX-X');

// import the PRISM syntax highlighting library
require('./../lib/prism.min.js');

// trigger responsive adjustments 
require('./modules/responsive.js').init({
    'responsive-images' : true
});