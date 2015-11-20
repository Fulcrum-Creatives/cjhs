module.exports = function(grunt) {

	// Project configuration.
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		// Sass
		sass: {
			dist: {
				options: {
					style: 'expanded',
					sourcemap: 'none'
				},
				files: {
					'style.css': 'sass/global.scss',
					'css/quickfix.css': 'sass/quickfix.scss',
					'css/dev.style.css': 'sass/global.scss',
					'css/ie8.style.css': 'sass/ie8.scss',
					'css/ie9.style.css': 'sass/ie9.scss',
				}
			}
		},
		// Autoprefexer
		autoprefixer: {
	        dist: {
				src: 'style.css',
				dest: 'style.css'
			},
			dev: {
				src: 'css/dev.style.css',
				dest: 'css/dev.style.css'
			},
		},
		// CSSmin
	    cssmin: {
			target: {
				files: {
					'style.css': 'style.css'
				}
			}
        },

		// Concat JS
	    concat: {
	        main: {
	            src: [
	                'js/lib/no-conflict/no-conflict.js',
	                'js/lib/skip-navigation/skip-navigation.js',
                  'js/lib/menu/accessibility.js',
                  'js/lib/menu/dropdown.js',
                  'js/vendor/jquery.fancybox.js',
                  'js/lib/lightbox/lightbox.js',
                  'js/lib/misc/misc.js',
                  'js/lib/oral-hist/oral-hist.js',
                  'js/vendor/slick.js',
                  'js/lib/carousel/carousel.js',
                  'js/lib/search/search.js',
                  'js/lib/split-lists/split-lists.js'
	            ],
	            dest: 'js/scripts.js'
	        },
	        ie: {
	        	 src: [
	                'js/vendor/html5.js',
	                'js/vendor/respond.js'
	            ],
	            dest: 'js/ie.js'
	        },
            home: {
                src: [
                    'js/vendor/jquery.nivo.slider.js',
                    'js/lib/slider/slider.js'
                ],
                dest: 'js/slider.js'
            }
	    },

	    // Jshint
	    jshint: {
	        files: [
	        	'js/scripts.js',
	        	'js/ie.js',
	        ],
			options: {
				scripturl: true,
				globals: {
					jQuery: true
				}
			}
	    },

	    // JSValidate
	    jsvalidate: {
			options:{
				globals: {},
				esprimaOptions: {},
				verbose: false
			},
			dist:{
				files:{
					src: [
			        	'js/scripts.js',
	        			'js/ie.js',
	        		]
				}
			}
		},

		// Uglify
        uglify: {
            options: {
                mangle: false,
                compress: true,
                quoteStyle: 3
            },
            dist: {
                files: {
                	'js/scripts.min.js': 'js/scripts.js',
                    'js/ie.min.js': 'js/ie.js',
                    'js/slider.min.js': 'js/slider.js',
                }
            }
        },

	    // Watch
	    watch: {
            livereload: {
                options: {livereload: true},
				files: ['*.css', 'js/*.js', '*.html', '*.php', 'images/*']
            },
            scripts: {
                files: ['js/**/*.js'],
                tasks: ['concat', 'uglify'],
                options: {
                    spawn: false
                }
            },
            css: {
              files: ['sass/**/*.scss'],
              tasks: ['sass', 'autoprefixer', 'cssmin']
            }
        },

        // Clean
        clean: {
            build: {
                src: [ '_build' ]
            }
        },

        // Copy
        copy: {
            build: {
                src: [
                    '**',
                    '!**/.sass-cache/**',
                    '!**/assets/**'
                ],
                dot: [
                    '.htaccess'
                ],
                dest: '_build',
                expand: true
            }
        }

	});
	
	// Autoprefixer
	grunt.loadNpmTasks('grunt-autoprefixer');
    // Concat
    grunt.loadNpmTasks('grunt-contrib-concat');
    // CSSmin
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    // Jshint
    grunt.loadNpmTasks('grunt-contrib-jshint');
    // JSValidate
    grunt.loadNpmTasks('grunt-jsvalidate');
    // Uglify
    grunt.loadNpmTasks('grunt-contrib-uglify');
    // Watch
    grunt.loadNpmTasks('grunt-contrib-watch');
    // Sass
    grunt.loadNpmTasks('grunt-contrib-sass');
    // Clean
    grunt.loadNpmTasks('grunt-contrib-clean');
    // Copy
    grunt.loadNpmTasks('grunt-contrib-copy');

    // Watch Task
    grunt.registerTask('default', ['watch']);
    // Build Task
    grunt.registerTask('build', ['clean', 'copy']);

};