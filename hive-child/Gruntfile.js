(function() {
  module.exports = function(grunt) {
    var root = "/Users/mike/dev/apache/earlyhour/";

    grunt.initConfig({
      concat: {
        js: {
          options: {
            separator: ";\n"
          },
          src: [
            'js/main.js'
          ],
          dest: 'prod.js'
        }
      },
      jshint: {
        options: {
          "asi": true // FU SEMICOLON
        },
        files: ['js/**/*.js'],
      },
      uglify: {
        options: {
          mangle: false
        },
        js: {
          files: {
            'prod.js': ['prod.js']
          }
        }
      },
      sass: {
        options: {
          sourceMap: true
        },
        all: {
          files: {
            'style.css': 'sass/style.scss'
          }
        }
      },
      autoprefixer: {
        options: {
          browsers: ['last 2 versions'],
          livereload: true
        },
        dist: {
          files: {
            'style.css': 'style.css'
          }
        }
      },
      watch: {
        gruntfile: {
          files: ['Gruntfile.js']
        },
        php: {
          files: ['**/*.php'],
          tasks: [],
          options: {
            livereload: true
          }
        },
        js: {
          files: ['js/**/*.js', 'bower_components/**/*' ],
          tasks: ['concat:js', 'jshint', 'uglify:js'],
          options: {
            livereload: true
          }
        },
        sass: {
          files: ['sass/**/*.scss'],
          tasks: ['sass', 'autoprefixer'],
          options: {
            livereload: true
          }
        }
      },
      'ftp-deploy': {
        prod: {
          auth: {
            host: '91.208.99.4',
            port: 21,
            authKey: 'prod'
          },
          src: root + 'wp-content/themes/hive-child/',
          dest: '/public_html/wp-content/themes/earlyhour/',
          exclusions: [
            root + 'wp-content/themes/hive-child/node_modules',
            root + 'wp-content/themes/hive-child/bower_components',
            root + 'wp-content/themes/hive-child/.ftppass',
            root + 'wp-content/themes/hive-child/.git',
            root + 'wp-content/themes/hive-child/.gitignore',
            root + 'wp-content/themes/hive-child/sass',
            root + 'wp-content/themes/hive-child/Gruntfile.js',
            root + 'wp-content/themes/hive-child/bower.json',
            root + 'wp-content/themes/hive-child/package.json',
            root + 'wp-content/themes/hive-child/README.md'
          ]
        }
      }
    });

    grunt.registerTask('build', ['jshint', 'concat', 'sass:all', 'autoprefixer'])
    grunt.registerTask('dev', ['build', 'watch']);
    grunt.registerTask('ugly', ['build', 'uglify:js']);
    grunt.registerTask('deploy-prod', ['build', 'uglify:js', 'ftp-deploy:prod']);

    grunt.loadNpmTasks('grunt-ftp-deploy');
    grunt.loadNpmTasks('grunt-autoprefixer');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');
  };

}).call(this);
