const mizTasks = require( '@mizzou/miz-gulp' );
const gulp = require( 'gulp' );
const glob = require( 'glob' );
const browserify = require( 'browserify' );
const babelify = require( 'babelify' );
const source = require( 'vinyl-source-stream' );
const debug = require( 'gulp-debug' );
const es = require( 'event-stream' );
const svgSprite = require( 'gulp-svg-sprite' );

const { sources } = require( './gulp.config.json' );

// Styles
const buildStyles = () => {
	return mizTasks.build.styles( sources.styles.theme );
};
const buildStylesDev = () => {
	return mizTasks.build.styles( sources.styles.lando );
};
const cleanStyles = () => {
	return mizTasks.clean( sources.styles.theme.clean.path, { force: true } );
};
const cleanStylesDev = () => {
	return mizTasks.clean( sources.styles.lando.clean.path, { force: true } );
};
const buildEditorStyles = () => {
	return mizTasks.build.styles( sources.editorStyles.theme );
};
const buildThemedStyles = () => {
	return mizTasks.build.styles(
		sources.darkStyles.theme,
		sources.lightStyles.theme
	);
};

// Twig (views)
const copyTwigDev = () => mizTasks.copy( sources.twig.lando );

// PHP files
const copyPHPDev = () => mizTasks.copy( sources.php.lando );

// PHP files
const copyRootDev = () => mizTasks.copy( sources.root.lando );

// SVG Sprite
const createSvgSprite = () => {
	return gulp
		.src( sources.svgSprite.theme.src.fileGlob )
		.pipe(
			svgSprite( {
				mode: {
					symbol: {
						dest: '.',
						example: false,
						sprite: 'sprite.symbol.svg',
					},
				},
			} )
		)
		.pipe( gulp.dest( sources.svgSprite.theme.dest.path ) );
};

// Mizzou Design System builds
const cleanStylesMiz = () => {
	return mizTasks.clean( sources.miz.theme.styles.clean.path, {
		force: true,
	} );
};
const cleanStylesMizDev = () => {
	return mizTasks.clean( sources.miz.lando.styles.clean.path, {
		force: true,
	} );
};

const buildIndividualScriptsMiz = ( done ) => {
	glob( sources.miz.theme.scripts.scripts.src.glob, function( err, files ) {
		if ( err ) {
			done( err );
		}

		const tasks = files.map( function( path ) {
			return browserify( {
				entries: [ path ],
				debug: true,
				transform: babelify,
				NODE_ENV: 'production',
			} )
				.bundle()
				.pipe(
					source(
						path.replace(
							sources.miz.theme.scripts.scripts.src.path,
							sources.miz.theme.scripts.scripts.dest.path
						)
					)
				)
				.pipe(
					debug( {
						title: path.replace(
							sources.miz.theme.scripts.scripts.src.path,
							sources.miz.theme.scripts.scripts.dest.path
						),
					} )
				)
				.pipe( gulp.dest( '.' ) );
		} );

		return es.merge( tasks ).on( 'end', done );
	} );
};

const copyFontsMiz = () => mizTasks.copy( sources.miz.theme.fonts );
const copyFontsMizDev = () => mizTasks.copy( sources.miz.lando.fonts );
const copyImagesMiz = () => mizTasks.copy( sources.miz.theme.images );
const copyImagesMizDev = () => mizTasks.copy( sources.miz.lando.images );
const copyScriptsMiz = () => mizTasks.copy( sources.miz.theme.scripts );
const copyScriptsMizDev = () => mizTasks.copy( sources.miz.lando.scripts );
const copyStylesMiz = () => mizTasks.copy( sources.miz.theme.styles );
const copyStylesMizDev = () => mizTasks.copy( sources.miz.lando.styles );
const copyTwigMiz = () =>
	mizTasks.copy( sources.miz.theme.twig, sources.miz.theme.twig.options );
const copyTwigMizDev = () =>
	mizTasks.copy( sources.miz.lando.twig, sources.miz.lando.twig.options );
const cleanFontsMiz = () =>
	mizTasks.clean( sources.miz.theme.fonts.clean.path, { force: true } );
const cleanFontsMizDev = () =>
	mizTasks.clean( sources.miz.lando.fonts.clean.path, { force: true } );
const cleanImagesMiz = () =>
	mizTasks.clean( sources.miz.theme.images.clean.path, { force: true } );
const cleanImagesMizDev = () =>
	mizTasks.clean( sources.miz.lando.images.clean.path, { force: true } );
const cleanTwigMiz = () =>
	mizTasks.clean( sources.miz.theme.twig.clean.path, { force: true } );
const cleanTwigMizDev = () =>
	mizTasks.clean( sources.miz.lando.twig.clean.path, { force: true } );

// Builds
const build = gulp.series( cleanStyles, buildStyles );
const buildDev = gulp.series(
	cleanStylesDev,
	buildStylesDev,
	copyTwigDev,
	copyPHPDev,
	copyRootDev
);
const buildMiz = gulp.series(
	cleanStylesMiz,
	cleanFontsMiz,
	cleanImagesMiz,
	cleanTwigMiz,
	copyStylesMiz,
	copyScriptsMiz,
	copyFontsMiz,
	copyImagesMiz,
	copyTwigMiz
);
const buildMizDev = gulp.series(
	cleanStylesMizDev,
	cleanFontsMizDev,
	cleanImagesMizDev,
	cleanTwigMizDev,
	copyStylesMizDev,
	copyScriptsMizDev,
	copyFontsMizDev,
	copyImagesMizDev,
	copyTwigMizDev
);

const compileAllStyles = gulp.series(
	buildStyles,
	buildEditorStyles,
	buildThemedStyles
);

// Watch
const watchStyles = () => mizTasks.watch( sources.styles.lando, buildStylesDev );
const watchTwig = () => mizTasks.watch( sources.twig.lando, copyTwigDev );
const watchPHP = () => mizTasks.watch( sources.php.lando, copyPHPDev );
const watchRoot = () => mizTasks.watch( sources.root.lando, copyRootDev );

const watch = gulp.series(
	buildDev,
	gulp.parallel( watchStyles, watchTwig, watchPHP, watchRoot )
);

// Exports
exports.watch = watch;
exports.build = build;
exports[ 'build:dev' ] = buildDev;
exports[ 'build:miz' ] = buildMiz;
exports[ 'build:miz:dev' ] = buildMizDev;
exports[ 'build:svg' ] = createSvgSprite;
exports.styles = compileAllStyles;
exports[ 'styles:dev' ] = buildStylesDev;
exports.default = build;
