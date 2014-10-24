module.exports = function(grunt) {
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		less: {
			development: {
				options: {
					paths: ["assets/less"],
					compress: false
				},
				files: {
					"public/css/styles.css": "assets/less/tf2-trading.less"
				}
			},
			production: {
				options: {
					paths: ["assets/css"],
					cleancss: true,
					compress: true
				},
				files: {
					"public/css/styles.css": "assets/less/tf2-trading.less"
				}
			}
		},
		watch: {
			options: {
				livereload : true,
			},
			less: {
				files: ['assets/less/*'],
				tasks: ['less'],
			},
			scripts: {
				files: ['<%= jshint.files %>'],
				tasks: ['concat', 'uglify'],
			}
		},
		concat: {
			options: {
				separator: '\n',
			},
			dist: {
				src: [
					'public/components/jquery/dist/jquery.min.js',
					'public/components/bootstrap/dist/js/bootstrap.min.js',
					'public/components/bootstrap-datepicker/js/bootstrap-datepicker.js',
					'assets/js/*.js'
				],
				dest: 'public/js/<%= pkg.name %>.js',
			},
		},
		uglify: {
			dist: {
				files: [{
					'public/js/<%= pkg.name %>.min.js': ['public/js/<%= pkg.name %>.js']
				}]
			}
		},
		jshint: {
			files: ['Gruntfile.js', 'assets/js/*.js'],
			options: {
				globals: {
					jQuery: true,
					console: true,
					module: true
				}
			}
		},
		autoprefixer: {
			single_file: {
				options: {
					// Target-specific options go here.
				},
				src: 'public/css/styles.css',
				dest: 'public/css/styles.css'
			},
		}

	});
	grunt.loadNpmTasks('grunt-contrib-less');
	grunt.loadNpmTasks('grunt-contrib-jshint');
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-autoprefixer');

	grunt.registerTask('default', ['jshint', 'concat', 'uglify', 'less', 'autoprefixer']);

};

