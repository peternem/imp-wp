module.exports = function (grunt) {
// Project configuration
    grunt.config('phplint', {

        options: {
            phpCmd: "/usr/bin/php",
            phpArgs: {
                '-ldf': true,
                '-d': ["display_errors", "display_startup_errors"]
            }
        },
        all: {
            src: '<%= paths.php.files %>'
        }
    });
    // Place this parameter before grunt.initConfig() method:
    var fixCs = grunt.option('fixcs') || false;

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        concat: {
            options: {
                separator: '\n\n\n\n',
                stripBanners: false,
                banner: '/*! <%= pkg.title %> - v<%= pkg.version %> - <%= grunt.template.today("yyyy-mm-dd") %>\n' +
                        ' * <%= pkg.homepage %>\n' +
                        ' * Copyright (c) <%= grunt.template.today("yyyy") %>;' +
                        ' * Licensed GPLv2+' +
                        ' */\n'
            },

            extras: {
                src: ['assets/js/src/main.js'],
                dest: 'assets/js/main.js'
            },
            extras_1: {
                src: ['assets/js/src/loop.js'],
                dest: 'assets/js/loop.js'
            },
            extras_2: {
                src: ['assets/js/src/post.js'],
                dest: 'assets/js/post.js'
            },
            extras_3: {
                src: ['assets/js/src/web-cpt-post.js'],
                dest: 'assets/js/web-cpt-post.js'
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
                    setTimeout: false,
                    settings: false,
                    self: false,
                    wp: false,
                    Backbone: false,
                    _: false,
                    wpApiSettings: false,
                    root: false
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
            my_target_0: {
                files: {
                    'assets/js/main.min.js': ['assets/js/main.js']
                }
            },
            my_target_1: {
                files: {
                    'assets/js/loop.min.js': ['assets/js/loop.js']
                }
            },
            my_target_2: {
                files: {
                    'assets/js/single.min.js': ['assets/js/single.js']
                }
            },
            my_target_3: {
                files: {
                    'assets/js/web-cpt-post.min.js': ['assets/js/web-cpt-post.js']
                }
            }
        },
        test: {
            files: ['assets/js/test/**/*.js']
        },
        sass: {
            all: {
                files: {
                    'style.css': 'sass/style.scss'
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
                cwd: '/',
                src: ['*.css', '!*.min.css'],
                dest: '/',
                ext: '.min.css'
            }
        },
        watch: {
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
            },
            phplint: {
                files: ['**/*.php'], // which files to watch,
                tasks: ['phplint'],
                options: {
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
        },
//        phplint: {
//            options: {
//                stdout: true,
//                stderr: true,
//                swapPath: '/tmp'
//            },
//            files: ['*.php', '**/*.php', '!node_modules/**/*.php'] // which files to watch
//        },
        phplint: {
            options: {
                limit: 10,
                phpCmd: "/usr/bin/php", // Defaults to php 
                stdout: true,
                stderr: true,
                useCache: true, // Defaults to false 
                tmpDir: '/custom/root/folder', // Defaults to os.tmpDir() 
                cacheDirName: 'custom/subfolder' // Defaults to php-lint 
            },
            files: ['*.php', '**/*.php', '!node_modules/**/*.php'] // which files to watch
        },

// Place this configuration in grunt.initConfig() method:
        phpcsfixer: {
//            options: {
//                bin: '/usr/local/bin/php-cs-fixer',
//                usingCache: "no",
//                quiet: true
//            },
            options: {
                bin: '/usr/local/bin/php-cs-fixer',
                verbose: true,
                dryRun: !fixCs,
                ignoreExitCode: fixCs,
                level: 'psr2',
                standard: 'Zend'
            },
            inc: {
                dir: './' // or ['src/models', 'src/lib'] 
            }
//            export: {
//                dir: 'module/Export'
//            },
//            import: {
//                dir: 'module/Import'
//            }
        }

    });

    // Load other tasks
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-phplint');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-compress');
    grunt.loadNpmTasks('grunt-shell');
    grunt.loadNpmTasks('grunt-php-cs-fixer');
    // Default task.
    grunt.registerTask('default', ['jshint', 'concat', 'uglify', 'sass', 'cssmin', 'phplint']);
    grunt.registerTask('build', ['default', 'clean', 'copy', 'compress']);
    grunt.registerTask('sassy', ['sass', 'cssmin']);
    grunt.registerTask('phpcheck', ['phpcsfixer']);
    grunt.util.linefeed = '\n';
};
