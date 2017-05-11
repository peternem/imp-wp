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
            my_underscore_wp_theme: {
                src: [
                    'assets/js/src/my_underscore_wp_theme.js'
                ],
                dest: 'assets/js/my_underscore_wp_theme.js'
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
                    module: false
                }
            }
        },
        uglify: {
            all: {
                files: {
                    'assets/js/my_underscore_wp_theme.min.js': ['assets/js/my_underscore_wp_theme.js']
                },
                options: {
                    banner: '/*! <%= pkg.title %> - v<%= pkg.version %> - <%= grunt.template.today("yyyy-mm-dd") %>\n' +
                            ' * <%= pkg.homepage %>\n' +
                            ' * Copyright (c) <%= grunt.template.today("yyyy") %>;' +
                            ' * Licensed GPLv2+' +
                            ' */\n',
                    mangle: {
                        except: ['jQuery']
                    }
                }
            }
        },
        test: {
            files: ['assets/js/test/**/*.js']
        },
        less: {
            all: {
                files: {
                    'assets/css/src/my_underscore_wp_theme.css': 'less/my_underscore_wp_theme.less'
                }
            }
        },
        cssmin: {
            options: {
                banner: '/*! <%= pkg.title %> - v<%= pkg.version %> - <%= grunt.template.today("yyyy-mm-dd") %>\n' +
                        ' * <%= pkg.homepage %>\n' +
                        ' * Copyright (c) <%= grunt.template.today("yyyy") %>;' +
                        ' * Licensed GPLv2+' +
                        ' */\n'
            },
            minify: {
                expand: true,
                cwd: 'assets/css/src/',
                src: ['my_underscore_wp_theme.css'],
                dest: 'assets/css/src/',
                ext: '.min.css'
            }
        },
        watch: {
            less: {
                files: ['less/*.less'],
                tasks: ['less', 'cssmin'],
                options: {
                    debounceDelay: 500
                }
            },
            styles: {
                files: ['assets/css/src/*.css'],
                tasks: ['cssmin'],
                options: {
                    debounceDelay: 500
                }
            },
            scripts: {
                files: ['assets/js/src/**/*.js', 'assets/js/vendor/**/*.js'],
                tasks: ['jshint', 'concat', 'uglify'],
                options: {
                    debounceDelay: 500
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
                    //'!node_modules/**',
                    '!nbproject/**',
                    '!release/**',
                    '!.git/**',
                    '!.sass-cache/**',
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
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-compress');

    // Default task.
    grunt.registerTask('default', ['jshint', 'concat', 'uglify',  'less', 'cssmin']);

    grunt.registerTask('build', ['default', 'clean', 'copy', 'compress']);

    grunt.util.linefeed = '\n';
};