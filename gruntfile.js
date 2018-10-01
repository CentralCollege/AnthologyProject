module.exports = function(grunt) {
  const mozjpeg = require('imagemin-mozjpeg');
  grunt.initConfig({
    concat :{
			css:{
        src:['css/wordpress.css', 'css/reset.min.css', 'css/skeleton.min.css', 'css/theme.min.css'],
        dest: 'style.css'
      },
      front:{
        src:['css/reset.min.css', 'css/skeleton.min.css', 'css/theme.min.css'],
        dest: 'css/include.css'
      },
      front:{
        src:['css/reset.min.css', 'css/skeleton.min.css', 'css/interior.min.css'],
        dest: 'css/interior.css'
      },
      homepagejs:{
        src:['node_modules/jquery/dist/jquery.js','external-libraries/slideout.js/dist/slideout.js','js/homepage.js'],
        dest: 'js/homepage.all.js'
      }
		},
    uglify: {
      target: {
        files: {
        'js/homepage.min.js': ['js/homepage.all.js']
        }
      }
    },
    cssmin: {
      target: {
        files: {
          'css/skeleton.min.css': ['css/skeleton.css'],
          'css/theme.min.css' : ['css/theme.css'],
          'css/reset.min.css' : ['external-libraries/reset-css/reset.css'],
          'css/include.min.css' : ['css/include.css'],
          'css/interior.min.css' : ['css/inside.css'],
        }
      }
    },
    imagemin: {
      options: {
        use:[mozjpeg()]
      },
      dynamic: {
        files:[{
          expand: true,
          cwd: 'img-source/',
          src: ['**/*.{png,jpg,gif}'],
          dest: 'img/',
        }]
      }
    },
    watch: {
      images: {
        files: ['img-source/*.{png,jpg,gif}'],
        tasks: ['imagemin'],
      },
      css: {
        files: ['css/theme.css', 'css/skeleton.css', 'css/inside.css'],
        tasks: ['cssmin', 'concat']
      },
      js: {
        files: ['js/homepage.js'],
        tasks: ['concat', 'uglify']
      },
      html: {
        files: ['front-page.php']
      },
      options: {
        livereload: true
      }
    }
  });

  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-imagemin');
  grunt.registerTask('default', ['watch']);
};
