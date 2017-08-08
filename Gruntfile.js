module.exports = function(grunt) {

  grunt.initConfig({

    uncss: {
       dist: {
          options: {
             ignore: [/expanded/,/js/,/wp-/,/align/,/admin-bar/,/responsive-title/,/col-lg-8/,/col-lg-6/,/col-lg-12/],
             stylesheets  : ['css/bootstrap.min.css'],
             ignoreSheets: [/fonts.googleapis/],
          },
          files: {
             'css/tidyboot.css': ['phps/*.php']
          }
       }
    }
});

  grunt.loadNpmTasks('grunt-uncss');

  grunt.registerTask('default', ['uncss']);

};