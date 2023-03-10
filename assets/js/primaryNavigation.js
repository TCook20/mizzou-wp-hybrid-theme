( function () {
	function r( e, n, t ) {
		function o( i, f ) {
			if ( ! n[ i ] ) {
				if ( ! e[ i ] ) {
					var c = 'function' == typeof require && require;
					if ( ! f && c ) return c( i, ! 0 );
					if ( u ) return u( i, ! 0 );
					var a = new Error( "Cannot find module '" + i + "'" );
					throw ( ( a.code = 'MODULE_NOT_FOUND' ), a );
				}
				var p = ( n[ i ] = { exports: {} } );
				e[ i ][ 0 ].call(
					p.exports,
					function ( r ) {
						var n = e[ i ][ 1 ][ r ];
						return o( n || r );
					},
					p,
					p.exports,
					r,
					e,
					n,
					t
				);
			}
			return n[ i ].exports;
		}
		for (
			var u = 'function' == typeof require && require, i = 0;
			i < t.length;
			i++
		)
			o( t[ i ] );
		return o;
	}
	return r;
} )()(
	{
		1: [
			function ( require, module, exports ) {
				/**
				 * @callback toggleCB
				 * @param {HTMLElement} button The button that controls the toggle
				 * @param {HTMLElement} content The content to show/hide
				 * @param {string}      css The CSS class to add
				 */
				const showToggleContent = ( button, content, css = 'show' ) => {
					content.classList.add( css );
					button.setAttribute( 'aria-expanded', 'true' );
				};
				/**
				 * @callback toggleCB
				 * @param {HTMLElement} button The button that controls the toggle
				 * @param {HTMLElement} content The content to show/hide
				 * @param {string}      css The CSS class to remove
				 */

				const hideToggleContent = ( button, content, css = 'show' ) => {
					content.classList.remove( css );
					button.removeAttribute( 'aria-expanded' );
				};

				module.exports = {
					show: showToggleContent,
					hide: hideToggleContent,
				};
			},
			{},
		],
		2: [
			function ( require, module, exports ) {
				/**
				 *
				 * @param {HTMLElement} container The container around the button and content
				 * @param {HTMLElement} button The button that controls the expand
				 * @param {toggleCB} cb The expand/collapse function to call when a click outside the content occurs
				 */
				const detectOutsideClicks = ( container, button, cb ) => {
					const handler = ( e ) => {
						if ( ! container.contains( e.target ) ) {
							document.removeEventListener(
								'click',
								handler,
								true
							);
							cb();
						} else if ( button.contains( e.target ) ) {
							document.removeEventListener(
								'click',
								handler,
								true
							);
						}
					};

					document.addEventListener( 'click', handler, true );
				};

				module.exports = {
					detect: detectOutsideClicks,
				};
			},
			{},
		],
		3: [
			function ( require, module, exports ) {
				const { detect } = require( './../../../../scripts/utils' );

				const toggle = require( './../../../../scripts/toggle' ); // CSS for dropdowns

				const primaryNavigationCSS = {
					nav_item_with_sub_list:
						'miz-primary-navigation__nav-item-w-sub',
					show_content: 'show',
				}; // Button data attribute

				const dropdownButtonAttribute = 'data-miz-toggle-controls';
				document.addEventListener( 'DOMContentLoaded', () => {
					// Locate all the dropdown containers in the document and store in a collection
					const primaryNavigationCollection =
						document.getElementsByClassName(
							primaryNavigationCSS.nav_item_with_sub_list
						);

					for (
						let i = 0;
						i < primaryNavigationCollection.length;
						i += 1
					) {
						const dropdown = primaryNavigationCollection[ i ];
						const dropdownController = dropdown.querySelector(
							`[${ dropdownButtonAttribute }]`
						);

						if ( dropdownController !== null ) {
							const dropdownContent = document.getElementById(
								dropdownController.dataset.mizToggleControls
							);

							const hideThis = () =>
								toggle.hide(
									dropdownController,
									dropdownContent,
									primaryNavigationCSS.show_content
								);

							dropdown.addEventListener( 'click', ( e ) => {
								if ( dropdownController.contains( e.target ) ) {
									if (
										dropdownContent.classList.contains(
											primaryNavigationCSS.show_content
										)
									) {
										hideThis();
									} else {
										const containerWidth =
											dropdown.offsetWidth;
										dropdownContent.style.width = `${ containerWidth }px`;
										toggle.show(
											dropdownController,
											dropdownContent,
											primaryNavigationCSS.show_content
										);
										detect(
											dropdown,
											dropdownController,
											hideThis
										);
									}
								}
							} );
						}
					}
				} );
			},
			{
				'./../../../../scripts/toggle': 1,
				'./../../../../scripts/utils': 2,
			},
		],
	},
	{},
	[ 3 ]
);
