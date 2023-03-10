const { merge } = require( 'webpack-merge' );
const path = require( 'path' );
const sass = require( 'sass' );
const MiniCssExtractPlugin = require( 'mini-css-extract-plugin' );
const TwigModify = require( '@mizzou/mizzou-design-system/webpack/plugins/TwigModify' );

const baseConfig = require( '@mizzou/mizzou-design-system/webpack/common.config' );

const scriptsConfig = merge( baseConfig, {
	entry: {
		scripts: {
			import: '@mizzou/mizzou-design-system/src/scripts.js',
			library: {
				name: 'mizScripts',
				type: 'umd',
			},
		},
		primaryNavigation: {
			import: '@mizzou/mizzou-design-system/src/components/Navigation/Primary/primary.js',
			library: {
				name: 'primaryNavigation',
				type: 'umd',
			},
		},
	},
	output: {
		path: path.resolve( __dirname, '.' ),
		filename: 'js/[name].js',
		library: {
			name: 'mizScripts',
			type: 'umd',
		},
	},
} );

const defaultConfig = merge( baseConfig, {
	entry: {
		images: '@mizzou/mizzou-design-system/src/images.js',
		styles: '@mizzou/mizzou-design-system/src/styles.js',
		twig: '@mizzou/mizzou-design-system/src/twig.js',
	},
	output: {
		path: path.resolve( __dirname, '.' ),
		clean: false,
	},
	plugins: [
		new MiniCssExtractPlugin( {
			filename: '[name].css',
		} ),
		new TwigModify(),
	],
	module: {
		rules: [
			{
				test: /\.(woff|woff2|eot|ttf|otf)$/i,
				type: 'asset/resource',
				generator: {
					filename: ( pathData ) => {
						const pathToFonts = 'src/assets/fonts/';
						const { context } = pathData.module;
						const folder = context.substring(
							context.indexOf( pathToFonts ) + pathToFonts.length
						);
						return `fonts/${ folder }/[name][ext]`;
					},
				},
			},
			{
				test: /\.(png|jpg|gif|bmp|svg|ico)$/i,
				type: 'asset/resource',
				generator: {
					filename: ( pathData ) => {
						const pathToImages = 'src/assets/images/';
						const { context } = pathData.module;
						const folder = context.substring(
							context.indexOf( pathToImages ) +
								pathToImages.length
						);
						return `images/${ folder }/[name][ext]`;
					},
				},
			},
			{
				test: /\.scss$/i,
				use: [
					MiniCssExtractPlugin.loader,
					{
						loader: 'css-loader',
						options: {
							sourceMap: false,
						},
					},
					{
						loader: 'resolve-url-loader',
						options: {
							sourceMap: false,
						},
					},
					{
						loader: 'postcss-loader',
						options: {
							sourceMap: true,
							postcssOptions: {
								plugins: [ [ 'postcss-preset-env' ] ],
							},
						},
					},
					{
						loader: 'sass-loader',
						options: {
							sourceMap: true,
							implementation: sass,
							sassOptions: {
								includePaths: [
									'src/scss',
									'src',
									'node_modules/@mizzou/mizzou-design-system/src/scss',
									'node_modules/@mizzou/mizzou-design-system/src',
									'node_modules/@mizzou/undergraduate-studies-boilerplate/src/scss',
									'node_modules/@mizzou/undergraduate-studies-boilerplate/src',
								],
							},
						},
					},
				],
			},
			{
				test: /\.twig$/i,
				type: 'asset/resource',
				generator: {
					filename: ( pathData ) => {
						const { rawRequest } = pathData.module;

						const rawPath = rawRequest.split( '/' );

						rawPath.forEach( ( pathSection, i ) => {
							rawPath[ i ] = pathSection
								.replace( /(.)([A-Z][a-z]+)/, '$1-$2' )
								.replace( /([a-z0-9])([A-Z])/, '$1-$2' )
								.toLowerCase();
						} );

						return `twig/design-system/${ rawPath
							.join( '/' )
							.toString() }`;
					},
				},
			},
		],
	},
	optimization: {
		removeEmptyChunks: true,
		splitChunks: {
			cacheGroups: {
				scss: {
					name: ( module ) => {
						const moduleFileName = module
							.identifier()
							.split( '/' )
							.reduceRight( ( item ) => item )
							.replace( /\.[^/.]+$/, '' );

						return `css/${ moduleFileName }`;
					},
					type: 'css/mini-extract',
					chunks: 'all',
					enforce: true,
				},
			},
		},
	},
} );

const themeConfig = merge( baseConfig, {
	name: 'theme',
	context: path.resolve( __dirname, './source' ),
	entry: {
		style: './scss/style.scss',
	},
	output: {
		path: path.resolve( __dirname, '.' ),
		clean: false,
	},
	plugins: [
		new MiniCssExtractPlugin( {
			filename: '[name].css',
		} ),
		new TwigModify(),
	],
	module: {
		rules: [
			{
				test: /\.scss$/i,
				use: [
					MiniCssExtractPlugin.loader,
					{
						loader: 'css-loader',
						options: {
							sourceMap: false,
						},
					},
					{
						loader: 'resolve-url-loader',
						options: {
							sourceMap: false,
						},
					},
					{
						loader: 'postcss-loader',
						options: {
							sourceMap: false,
							postcssOptions: {
								plugins: [ [ 'postcss-preset-env' ] ],
							},
						},
					},
					{
						loader: 'sass-loader',
						options: {
							sourceMap: false,
							implementation: sass,
							sassOptions: ( loaderContext ) => {
								const { resourcePath, rootContext } =
									loaderContext;
								const relativePath = path.relative(
									rootContext,
									resourcePath
								);

								if ( relativePath === 'scss/style.scss' ) {
									return {
										outputStyle: 'expanded',
										includePaths: [
											'src/scss',
											'src',
											'node_modules/@mizzou/mizzou-design-system/src/scss',
											'node_modules/@mizzou/mizzou-design-system/src',
											'node_modules/@mizzou/undergraduate-studies-boilerplate/src/scss',
											'node_modules/@mizzou/undergraduate-studies-boilerplate/src',
										],
									};
								}

								return {
									includePaths: [
										'src/scss',
										'src',
										'node_modules/@mizzou/mizzou-design-system/src/scss',
										'node_modules/@mizzou/mizzou-design-system/src',
										'node_modules/@mizzou/undergraduate-studies-boilerplate/src/scss',
										'node_modules/@mizzou/undergraduate-studies-boilerplate/src',
									],
								};
							},
						},
					},
				],
			},
		],
	},
	optimization: {
		removeEmptyChunks: true,
		splitChunks: {
			cacheGroups: {
				scss: {
					name: ( module ) => {
						const moduleFileName = module
							.identifier()
							.split( '/' )
							.reduceRight( ( item ) => item )
							.replace( /\.[^/.]+$/, '' );

						return `${ moduleFileName }`;
					},
					type: 'css/mini-extract',
					chunks: 'all',
					enforce: true,
				},
			},
		},
	},
} );

module.exports = [ themeConfig, defaultConfig, scriptsConfig ];
