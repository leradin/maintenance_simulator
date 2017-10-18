let mix = require('laravel-mix');

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
   .sass('resources/assets/sass/app.scss', 'public/css');*/

mix.combine([
    'resources/virgo/css/stylesheets.css'
], 'public/css/app.css');

mix.combine([
    'resources/virgo/js/plugins/jquery/jquery.min.js',
    'resources/virgo/js/plugins/jquery/jquery-ui-1.10.1.custom.min.js',
    'resources/virgo/js/plugins/jquery/jquery-migrate-1.1.1.min.js',
    'resources/virgo/js/plugins/jquery/globalize.js',    
    'resources/virgo/js/plugins/other/excanvas.js',
    'resources/virgo/js/plugins/other/jquery.mousewheel.min.js',
    'resources/virgo/js/plugins/bootstrap/bootstrap.min.js',
    'resources/virgo/js/plugins/cookies/jquery.cookies.2.2.0.min.js',
    'resources/virgo/js/plugins/fancybox/jquery.fancybox.pack.js',
    'resources/virgo/js/plugins/jflot/jquery.flot.js',
    'resources/virgo/js/plugins/jflot/jquery.flot.stack.js',
	'resources/virgo/js/plugins/jflot/jquery.flot.pie.js',
    'resources/virgo/js/plugins/jflot/jquery.flot.resize.js',
    'resources/virgo/js/plugins/epiechart/jquery.easy-pie-chart.js',
    'resources/virgo/js/plugins/knob/jquery.knob.js',
    'resources/virgo/js/plugins/sparklines/jquery.sparkline.min.js',
    'resources/virgo/js/plugins/pnotify/jquery.pnotify.min.js',
    'resources/virgo/js/plugins/fullcalendar/fullcalendar.min.js',
    'resources/virgo/js/plugins/datatables/jquery.dataTables.min.js',
    'resources/virgo/js/plugins/wookmark/jquery.wookmark.js',
    'resources/virgo/js/plugins/jbreadcrumb/jquery.jBreadCrumb.1.1.js',
    'resources/virgo/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js',
    'resources/virgo/js/plugins/uniform/jquery.uniform.min.js',
    'resources/virgo/js/plugins/select/select2.min.js',
    'resources/virgo/js/plugins/tagsinput/jquery.tagsinput.min.js',
    'resources/virgo/js/plugins/maskedinput/jquery.maskedinput-1.3.min.js',
    'resources/virgo/js/plugins/multiselect/jquery.multi-select.min.js',
    'resources/virgo/js/plugins/validationEngine/languages/jquery.validationEngine-en.js',
    'resources/virgo/js/plugins/validationEngine/jquery.validationEngine.js',
    'resources/virgo/js/plugins/stepywizard/jquery.stepy.js',
    'resources/virgo/js/plugins/animatedprogressbar/animated_progressbar.js',
    'resources/virgo/js/plugins/hoverintent/jquery.hoverIntent.minified.js',
    'resources/virgo/js/plugins/media/mediaelement-and-player.min.js',
    'resources/virgo/js/plugins/cleditor/jquery.cleditor.js',
    'resources/virgo/js/plugins/shbrush/XRegExp.js',
    'resources/virgo/js/plugins/shbrush/shCore.js',
    'resources/virgo/js/plugins/shbrush/shBrushXml.js',
    'resources/virgo/js/plugins/shbrush/shBrushJScript.js',
    'resources/virgo/js/plugins/shbrush/shBrushCss.js',
    'resources/virgo/js/plugins/filetree/jqueryFileTree.js',
    'resources/virgo/js/plugins/slidernav/slidernav-min.js',
    'resources/virgo/js/plugins/isotope/jquery.isotope.min.js',
    'resources/virgo/js/plugins/jnotes/jquery-notes_1.0.8_min.js',
    'resources/virgo/js/plugins/jcrop/jquery.Jcrop.min.js',
    'resources/virgo/js/plugins/ibutton/jquery.ibutton.min.js',
    'resources/virgo/js/plugins/scrollup/jquery.scrollUp.min.js',
    'resources/virgo/js/plugins.js',
    'resources/virgo/js/charts.js',
    'resources/virgo/js/actions.js'
], 'public/js/app.js');
