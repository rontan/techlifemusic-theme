techlifemusic-theme
===================

Wordpress theme for tech+life+music, my homepage at http://richardneililagan.com

## Using for your own development

This project makes use of node modules with grunt to precompile some stuff.
If you're interested in using this project as a base for your own theme, make sure you set up your dev env correctly:

1. Make sure [Node](http://nodejs.org/) is installed on your machine.
2. In this project's root directory, make sure that you run `npm install` (and not `npm install --production`). This will install the necessary modules required for development.
3. The [grunt](http://gruntjs.com/getting-started) tasks for this project precompile the JS and CSS/LESS files into their respective static files. Running `grunt watch` will do this precompilation live, and any changes in your statics will result in a precompile.

