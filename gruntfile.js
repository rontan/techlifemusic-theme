module.exports = (function (contribs) {

    return function (grunt) {

        // initialize
        grunt.initConfig({

            pkg : grunt.file.readJSON('package.json'),

            // @module jshint
            jshint : {
                options : {
                    // todo
                },
                all : ['gruntfile.js', 'js/src/**/*.js']
            },

            // @module uglifyjs
            uglify : {
                options : {
                    sourceMap : 'js/app.build.map',
                    sourceMappingURL : 'app.build.map',
                    preserveComments : 'some',
                    banner : '/** @author Richard Neil Ilagan [me@richardneililagan.com] */'
                },
                app : {
                    files : {
                        'js/app.min.js' : 'js/app.js'
                    }
                }
            },

            // @module browserify
            browserify : {
                main : {
                    src : 'js/src/**/techlifemusic.app.js',
                    dest : 'js/app.js'
                }
            },

            // @module LESS CSS
            less : {
                development : {
                    options : {
                        compress : false
                    },
                    files : {
                        'css/style.css' : 'css/src/style.less'
                    }
                },
                production : {
                    options : {
                        compress : true
                    },
                    files : {
                        'css/style.min.css' : 'css/src/style.less'
                    }
                }
            },

            // @module watch
            watch : {
                scripts : {
                    files : '**/*.js',
                    tasks : ['compile-scripts-production'],
                    options : {
                        interrupt : true,
                        spawn : false,
                        livereload : true
                    }
                },
                styles : {
                    files : '**/*.less',
                    tasks : ['compile-styles', 'compile-styles-production'],
                    options : {
                        interrupt : true,
                        spawn : false,
                        livereload : true
                    }
                }
            }

        });

        // load grunt precompiled tasks
        for (var i = 0; i < contribs.length; i++) {
            grunt.loadNpmTasks(contribs[i]);
        }

        // register tasks
        grunt.registerTask('default', 'package');

        grunt.registerTask('compile-scripts', ['jshint', 'browserify']);
        grunt.registerTask('compile-styles', ['less:development']);

        grunt.registerTask('compile-scripts-production', ['compile-scripts', 'uglify']);
        grunt.registerTask('compile-styles-production', ['less:production']);

        grunt.registerTask('package', ['compile-scripts-production', 'compile-styles-production']);
    };

})([
    'grunt-browserify',
    'grunt-contrib-uglify',
    'grunt-contrib-less',
    'grunt-contrib-watch',
    'grunt-contrib-jshint'
]);