let mix = require('laravel-mix');

// Live Reload
var LiveReloadPlugin = require('webpack-livereload-plugin');
mix.webpackConfig({
    plugins: [
        new LiveReloadPlugin()
    ]
});
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

/*mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');
mix.copyDirectory('node_modules', 'public/js');*/

mix.combine([
    'public/css/stylesheets.css'
], 'public/css/app.css');

mix.combine([
    'public/js/plugins/jquery/jquery.min.js',
    'public/js/plugins/jquery/jquery-ui-1.10.1.custom.min.js',
    'public/js/plugins/jquery/jquery-migrate-1.1.1.min.js',
    'public/js/plugins/jquery/globalize.js',    
    'public/js/plugins/other/excanvas.js',
    'public/js/plugins/other/jquery.mousewheel.min.js',
    'public/js/plugins/bootstrap/bootstrap.min.js',
    'public/js/plugins/cookies/jquery.cookies.2.2.0.min.js',
    'public/js/plugins/fancybox/jquery.fancybox.pack.js',
    'public/js/plugins/jflot/jquery.flot.js',
    'public/js/plugins/jflot/jquery.flot.stack.js',
	'public/js/plugins/jflot/jquery.flot.pie.js',
    'public/js/plugins/jflot/jquery.flot.resize.js',
    'public/js/plugins/epiechart/jquery.easy-pie-chart.js',
    'public/js/plugins/knob/jquery.knob.js',
    'public/js/plugins/sparklines/jquery.sparkline.min.js',
    'public/js/plugins/pnotify/jquery.pnotify.min.js',
    'public/js/plugins/fullcalendar/fullcalendar.min.js',
    'public/js/plugins/datatables/jquery.dataTables.min.js',
    'public/js/plugins/wookmark/jquery.wookmark.js',
    'public/js/plugins/jbreadcrumb/jquery.jBreadCrumb.1.1.js',
    'public/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js',
    'public/js/plugins/uniform/jquery.uniform.min.js',
    'public/js/plugins/select/select2.min.js',
    'public/js/plugins/tagsinput/jquery.tagsinput.min.js',
    'public/js/plugins/maskedinput/jquery.maskedinput-1.3.min.js',
    'public/js/plugins/multiselect/jquery.multi-select.min.js',
    'public/js/plugins/validationEngine/languages/jquery.validationEngine-es.js',
    'public/js/plugins/validationEngine/jquery.validationEngine.js',
    'public/js/plugins/stepywizard/jquery.stepy.js',
    'public/js/plugins/animatedprogressbar/animated_progressbar.js',
    'public/js/plugins/hoverintent/jquery.hoverIntent.minified.js',
    'public/js/plugins/media/mediaelement-and-player.min.js',
    'public/js/plugins/cleditor/jquery.cleditor.js',
    'public/js/plugins/shbrush/XRegExp.js',
    'public/js/plugins/shbrush/shCore.js',
    'public/js/plugins/shbrush/shBrushXml.js',
    'public/js/plugins/shbrush/shBrushJScript.js',
    'public/js/plugins/shbrush/shBrushCss.js',
    'public/js/plugins/filetree/jqueryFileTree.js',
    'public/js/plugins/slidernav/slidernav-min.js',
    'public/js/plugins/isotope/jquery.isotope.min.js',
    'public/js/plugins/jnotes/jquery-notes_1.0.8_min.js',
    'public/js/plugins/jcrop/jquery.Jcrop.min.js',
    'public/js/plugins/ibutton/jquery.ibutton.min.js',
    'public/js/plugins/scrollup/jquery.scrollUp.min.js',
    'public/js/plugins/timer/timer.jquery.min.js',
    'public/js/plugins/jsCookie/src/js.cookie.js',
    'public/js/plugins/moment/moment-with-locales.js',
    'public/js/plugins/timepicker/dist/jquery-ui-timepicker-addon.min.js',
    'public/js/plugins/timepicker/dist/i18n/jquery-ui-timepicker-addon-i18n.js',
    'public/js/plugins.js',
    'public/js/charts.js',
    'public/js/actions.js'
], 'public/js/app.js');

