/* jshint undef: false, unused: false */

// Import modules:
var path            = require('path'),
	gulp            = require('gulp'),
	gulpif          = require('gulp-if'),
    pkg             = require('./package.json'),
    expect          = require('gulp-expect-file'),
    concat          = require('gulp-concat'),
    concatUtil      = require('gulp-concat-util'),
    prefix          = require('gulp-autoprefixer'),
    scss            = require('gulp-sass'),
    scsslint        = require('gulp-scss-lint'),
    jshint        	= require('gulp-jshint'),
    stylish        	= require('jshint-stylish'),
    rename          = require('gulp-rename'),
    cssMin          = require('gulp-minify-css'),
    ugly            = require('gulp-uglify'),
    imagemin        = require('gulp-imagemin'),
    cache           = require('gulp-cache'),
    livereload      = require('gulp-livereload'),
    watch           = require('gulp-watch'),
    svgstore        = require('gulp-svgstore'),
    svg2png         = require('gulp-svg2png'),
    svgmin         	= require('gulp-svgmin'),
    header         	= require('gulp-header'),
    footer         	= require('gulp-footer'),
    replace         = require('gulp-replace'),
    tap         	= require('gulp-tap'),
    clone         	= require('gulp-clone'),
    cheerio         = require('gulp-cheerio'),
    svgfallback     = require('gulp-svgfallback'),
    filter     		= require('gulp-filter'),
    lazypipe     	= require('lazypipe'),
    compass     	= require('gulp-compass'),
    glob     		= require('glob'),
    del     		= require('del'),
    browserSync     = require('browser-sync'),
    reload     		= browserSync.reload;

var projPath 		= 'wp-content/themes/globo/';

gulp.task('css', function() {
	// Lint our css
	gulp.src([projPath + 'css/sass/*/*.scss', projPath + '!css/sass/susy/**/*.scss'])
		.pipe(scsslint({
			'config': '.scss-lint.yml'
		}))
		.pipe(scsslint.failReporter());

	// Output our web-fonts.css file
	gulp.src(projPath + 'css/sass/web-fonts.scss')
		.pipe(scss())
		.pipe(rename('web-fonts.css'))
		.pipe(gulp.dest(projPath));

	// Compile and prefix our main css files
    gulp.src(projPath + 'css/sass/main.scss')
        .pipe(compass({
        	css: projPath + 'css',
        	sass: projPath + 'css/sass',
        	image: projPath + 'images',
        	require: ['susy', 'breakpoint']
        }))
        .pipe(prefix(['last 2 version', '> 1%', 'ie 8', 'ie 7', 'Firefox > 1'], { cascade: true }))
        .pipe(rename('concat.css'))
        .pipe(gulp.dest(projPath + 'css/sass/'))
        .pipe(cssMin())
        .pipe(rename('style.css'))
        .pipe(gulp.dest(projPath))
        .pipe(reload({stream: true}));
        // .pipe(livereload({ auto: false }));
});

gulp.task('serve', ['css'], function() {
	browserSync({
		// server:
		proxy: 'localhost:8888',
		tunnel: true
	});

	gulp.watch(projPath + 'css/sass/**/*.scss', ['css']);
	gulp.watch(projPath + 'css/sass/**/*.scss').on('change', reload);
});

gulp.task('scripts', function() {
	gulp.src([
		projPath + 'scripts/utilities/browserDetect.js',
		projPath + 'scripts/utilities/modernizr.js',
		projPath + 'scripts/utilities/fastClick.js',
		projPath + 'scripts/utilities/svgmagic.js',
		projPath + 'scripts/utilities/header.js',
		projPath + 'scripts/utilities/globalVars.js',
		projPath + 'scripts/utilities/iconFallback.js',
		projPath + 'scripts/utilities/twitterHelper.js',
		projPath + 'scripts/utilities/hammer.js',
		projPath + 'scripts/2_atoms/showGrid.js',
		projPath + 'scripts/2_atoms/navigation.js',
		projPath + 'scripts/2_atoms/requestTick.js',
		projPath + 'scripts/2_atoms/update.js',
		projPath + 'scripts/2_atoms/backToTop.js',
		projPath + 'scripts/2_atoms/onScroll.js',
		projPath + 'scripts/1_quarks/isDesktop.js',
		projPath + 'scripts/1_quarks/attachResizeThrottle.js',
		projPath + 'scripts/3_molecules/slider.js',
		// Init begin
		projPath + 'scripts/utilities/initHeader.js',
		projPath + 'scripts/2_atoms/attachFastClick.js',
		projPath + 'scripts/2_atoms/svgfallback.js',
		projPath + 'scripts/2_atoms/scrollInit.js',
		projPath + 'scripts/3_molecules/twoTaxControls.js',
		projPath + 'scripts/utilities/stockHelper.js',
		projPath + 'scripts/utilities/initFooter.js',
		// Init end
		// Resize Begin
		projPath + 'scripts/utilities/resizeThrottleHead.js',
		projPath + 'scripts/2_atoms/scrollResize.js',
		projPath + 'scripts/utilities/resizeThrottleFooter.js',
		// Resize End
		projPath + 'scripts/utilities/footer.js',
	])
	    .pipe(concat('global.js'))
	    .pipe(gulp.dest(projPath + 'scripts/'))
	    .pipe(ugly())
	    .pipe(rename('global.min.js'))
	    .pipe(gulp.dest(projPath + 'scripts/4_organisms/'))
		.pipe(jshint.reporter(stylish))
		.pipe(jshint.reporter('fail'));
});

// SVG Tasks
var components 	= [['primary', '#3FB0F4'],['secondary', '#62D99D'],['tertiary', '#F9971E'],['white', '#FFFFFF'],['black', '#000000']],
	iconPath	= projPath + 'images/icons/svg/*--cleaned.svg',
	tasks		= ['svg-pretty','svg-default', 'svg-default@2x', 'svg-compile'];

components.forEach(function(name) {
	gulp.task(name[0], ['svg-pretty'], function() {
		return gulp.src(iconPath)
			.pipe(replace(/#([0-9a-f]{6}|[0-9a-f]{3})/i, name[1]))
			.pipe(rename(function (path) {
				path.basename = path.basename.replace(/--cleaned/,'');
				path.basename += '--' + name[0];
			}))
			.pipe(gulp.dest(projPath + 'images/icons/temp'))
			.pipe(svg2png())
			.pipe(gulp.dest(projPath + 'images/icons/png'));
	});

	gulp.task(name[0] + '@2x', ['svg-pretty'], function() {
		return gulp.src(iconPath)
			.pipe(replace(/#([0-9a-f]{6}|[0-9a-f]{3})/i, name[1]))
			.pipe(rename(function (path) {
				path.basename = path.basename.replace(/--cleaned/,'');
				path.basename += '--' + name[0];
			}))
			.pipe(gulp.dest(projPath + 'images/icons/temp'))
			.pipe(svg2png(2.0))
			.pipe(rename(function (path) {
				path.basename += '@2x';
			}))
			.pipe(gulp.dest(projPath + 'images/icons/png'));
	});

	tasks.push(name[0], name[0] + '@2x');
});

// Clean up the src file and place in the same location
// before moving on to other tasks
gulp.task('svg-pretty', function(cb) {
	return gulp.src([projPath + 'images/icons/svg/*.svg', '!' + projPath + 'images/icons/svg/*--cleaned.svg'])
		.pipe(replace(/(sketch:type=".+?)"/g, ''))
		.pipe(svgmin({
            plugins: [
                { removeXMLProcInst: false },
                { cleanupIDs: false }
            ]
        }))
        .pipe(rename(function (path) {
        	path.basename += '--cleaned';
        }))
        .pipe(gulp.dest(projPath + 'images/icons/svg'));
        // .pipe(gulp.dest(projPath + 'images/icons/svg'));
        cb();
});

gulp.task('svg-default', ['svg-pretty'], function() {
       return gulp.src(iconPath)
        .pipe(svg2png())
        .pipe(rename(function (path) {
			path.basename = path.basename.replace(/--cleaned/,'');
		}))
        .pipe(gulp.dest(projPath + 'images/icons/png'));
});

gulp.task('svg-default@2x', ['svg-pretty'], function() {
       return gulp.src(iconPath)
        .pipe(svg2png(2.0))
        .pipe(rename(function (path) {
			path.basename = path.basename.replace(/--cleaned/,'');
		}))
        .pipe(rename(function (path) {
        	path.basename += '@2x';
        }))
        .pipe(gulp.dest(projPath + 'images/icons/png'));
});

gulp.task('svg-compile', ['svg-pretty'], function() {
	return gulp.src(iconPath)
		.pipe(replace(/(sketch:type=".+?)"/g, ''))
		.pipe(replace(/(fill=".+?)"/g, ''))
		.pipe(replace(/(fill-rule=".+?)"/g, ''))
		.pipe(rename(function (path) {
			path.basename = path.basename.replace(/--cleaned/,''),
			path.basename += '-icon';
		}))
		.pipe(svgmin({
            plugins: [
                { removeXMLProcInst: false },
                { cleanupIDs: false }
            ]
        }))
		.pipe(svgstore({ inlineSvg: true }))
		.pipe(rename('compiled-icons.svg'))
		.pipe(gulp.dest(projPath + 'images/icons'));
});

gulp.task('svg-cleanup', ['svg-pretty'], function() {
	del([projPath + './images/icons/temp'], function(err, paths) {
		if(err) {
			console.log('Error: ',err);
		}
		console.log('Deleted files/folder: \n', paths.join('\n'));
	});
});

gulp.task('svg', tasks);

gulp.task('watch', function() {
    // livereload.listen();
    gulp.watch(projPath + 'css/sass/**', ['css']);
    // gulp.watch(projPath + 'scripts/**', ['scripts']);
});

gulp.task('default', ['css', 'scripts']);