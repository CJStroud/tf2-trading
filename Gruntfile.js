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
			gruntfile: {
				files: 'Gruntfile.js',
				'tasks': ['jshint:gruntfile'],
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
				separator: ';',
			},
			dist: {
				src: ['assets/js/*.js'],
				dest: 'public/js/<%= pkg.name %>.js',
			},
		},
		uglify: {
			dist: {
				files: [{
					'public/js/<%= pkg.name %>.min.js': ['<%= concat.dist.dest %>']
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
		}

	});
	grunt.loadNpmTasks('grunt-contrib-less');
	grunt.loadNpmTasks('grunt-contrib-jshint');
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-watch');

	grunt.registerTask('default', ['jshint', 'concat', 'uglify', 'less']);

};

