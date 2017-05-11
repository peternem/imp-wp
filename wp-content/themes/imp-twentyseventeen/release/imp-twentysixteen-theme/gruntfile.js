module.exports = function (grunt) {
// Project configuration
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        concat: {
            options: {
                stripBanners: true,
                banner: '/*! <%= pkg.title %> - v<%= pkg.version %> - <%= grunt.template.today("yyyy-mm-dd") %>\n' +
                        ' * <%= pkg.homepage %>\n' +
                        ' * Copyright (c) <%= grunt.template.today("yyyy") %>;' +
                        ' * Licensed GPLv2+' +
                        ' */\n'
            },
            wp_1: {
                src: 'assets/js/src/main.js',
                dest: 'assets/js/main.js'
            }
        },
        jshint: {
            all: [
                'Gruntfile.js',
                'assets/js/src/**/*.js',
                'assets/js/test/**/*.js'
            ],
            options: {
                curly: true,
                eqeqeq: true,
                immed: true,
                latedef: true,
                newcap: true,
                noarg: true,
                sub: true,
                undef: true,
                boss: true,
                eqnull: true,
                globals: {
                    exports: true,
                    module: false,
                    $: false,
                    jQuery: false,
                    console: false,
                    document: false,
                    window: false,
                    alert: false,
                    browser: true,
                    scroll: false,
                    setTimeout: false
                }
            }
        },
        uglify: {
            options: {
                mangle: false,
                separator: '\n\n',
                report: 'min',
                banner: '/*! <%= pkg.title %> - v<%= pkg.version %> - <%= grunt.template.today("yyyy-mm-dd") %>\n' +
                        ' * <%= pkg.homepage %>\n' +
                        ' * Copyright (c) <%= grunt.template.today("yyyy") %>;' +
                        ' * Licensed GPLv2+' +
                        ' */\n'
            },
            my_target_1: {
                files: {
                    'assets/js/main.min.js': ['assets/js/main.js']
                }
            }
        },
        test: {
            files: ['assets/js/test/**/*.js']
        },
//        less: {
//            development: {
//                options: {
//                    compress: false,
//                    yuicompress: false,
//                    optimization: null
//                },
//                files: {
//                    "assets/css/theme-style.css": "less/theme-style.less", // destination file and source file
//                    "bootstrap-34/css/bootstrap.css": "bootstrap-34/less/bootstrap.less" // destination file and source file
//                }
//            },
//            production: {
//                options: {
//                    compress: true,
//                    yuicompress: true,
//                    optimization: null
//                },
//                files: {
//                    "assets/css/theme-style.min.css": "less/theme-style.less", // destination file and source file
//                    "bootstrap-34/css/bootstrap.min.css": "bootstrap-34/less/bootstrap.less" // destination file and source file
//                }
//            }
//        },
        sass: {
            all: {
                files: {
                    'assets/css/imp-style.css': 'sass/imp-style.scss'
                }
            }
        },
        cssmin: {
            options: {
                shorthandCompacting: false,
                roundingPrecision: -1,
                banner: '/*! <%= pkg.title %> - v<%= pkg.version %> - <%= grunt.template.today("yyyy-mm-dd") %>\n' +
                        ' * <%= pkg.homepage %>\n' +
                        ' * Copyright (c) <%= grunt.template.today("yyyy") %>;' +
                        ' * Licensed GPLv2+' +
                        ' */\n'
            },
            target: {
                expand: true,
                cwd: 'assets/css/',
                src: ['*.css', '!*.min.css'],
                dest: 'assets/css/',
                ext: '.min.css'
            }
        },
        watch: {
//            styles: {
//                files: ['less/**/*.less', 'bootstrap-34/less/**/*.less'], // which files to watch
//                tasks: ['less'],
//                options: {
//                    spawn: true,
//                    livereload: 35729
//                }
//            },
            sass: {
                files: ['sass/**/*.scss'],
                tasks: ['sass'],
                options: {
                    spawn: true,
                    livereload: 35729
                    //debounceDelay: 500
                }
            },
            scripts: {
                files: [
                    'assets/js/src/**/*.js'
                ],
                tasks: ['jshint', 'concat', 'uglify'],
                options: {
                    //debounceDelay: 500,
                    spawn: false
                }
            }
        },
        clean: {
            main: ['release/<%= pkg.name %>']
        },
        copy: {
            // Copy the plugin to a versioned release directory
            main: {
                src: [
                    '**',
                    '!bower_components/**',
                    '!node_modules/**',
                    '!nbproject/**',
                    '!release/**',
                    '!.git/**',
                    '!css/src/**',
                    '!js/src/**',
                    '!img/src/**',
                    '!Gruntfile.js',
                    '!package.json',
                    '!.gitignore',
                    '!.gitmodules'
                ],
                dest: 'release/<%= pkg.name %>/'
            }
        },
        compress: {
            main: {
                options: {
                    mode: 'zip',
                    archive: './release/<%= pkg.name %>.<%= pkg.version %>.zip'
                },
                expand: true,
                cwd: 'release/<%= pkg.name %>/',
                src: ['**/*'],
                dest: '<%= pkg.name %>/'
            }
        }
    });

    // Load other tasks
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-compress');
    grunt.loadNpmTasks('grunt-shell');
    // Default task.
    grunt.registerTask('default', ['jshint', 'concat', 'uglify', 'sass', 'cssmin']);
    //Add 'shell' to 'Build" after building theme from grunt-init
    grunt.registerTask('build', ['default', 'clean', 'copy', 'compress']);
    grunt.registerTask('lessy', ['less', 'cssmin']);
    grunt.registerTask('sassy', ['sass', 'cssmin']);
    grunt.util.linefeed = '\n';
};
