<?php
/**
 * Last User Login
 *
 * @package WordPress
 * @subpackage theme
 * @category Timber
 * @category functions
 * @author Travis Cook (cooktw@missouri.edu), Digital Service, University of Missouri
 * @copyright 2022 Curators of the University of Missouri
 */

// Last User Login
add_action(
	'wp_login',
	function ( $user_login, $user ) {
		update_user_meta( $user->ID, 'last_login', time() );
	},
	10,
	2
);

add_filter(
	'manage_users_columns',
	function ( $columns ) {
		$columns['last_login'] = 'Last Login';
		return $columns;
	}
);

add_filter(
	'manage_users_custom_column',
	function ( $output, $column_id, $user_id ) {
		if ( $column_id == 'last_login' ) {
			$last_login        = get_user_meta( $user_id, 'last_login', true );
			$date_format       = 'M j, Y';
			$hover_date_format = 'F j, Y, g:i a';
			$output            = $last_login ? '<div title="Last login: ' . date( $hover_date_format, $last_login ) . '">' . human_time_diff( $last_login ) . '</div>' : 'No record';
		}
		return $output;
	},
	10,
	3
);

add_filter(
	'manage_users_sortable_columns',
	function ( $columns ) {
		return wp_parse_args( array( 'last_login' => 'last_login' ), $columns );
	}
);

add_action(
	'pre_get_users',
	function ( $query ) {
		if ( ! is_admin() ) {
			return $query; }

		$screen = get_current_screen();

		if ( isset( $screen->id ) && $screen->id !== 'users' ) {
			return $query; }

		if ( isset( $_GET['orderby'] ) && $_GET['orderby'] == 'last_login' ) {
			$query->query_vars['meta_key'] = 'last_login';
			$query->query_vars['orderby']  = 'meta_value';
		}

		return $query;
	}
);

// Add [lastlogin] shortcode
add_shortcode(
	'lastlogin',
	function ( $atts ) {
		$atts       = shortcode_atts( array( 'user_id' => false ), $atts, 'lastlogin' );
		$last_login = get_the_author_meta( 'last_login', $atts['user_id'] );
		if ( empty( $last_login ) ) {
			return false;
		};
		$the_login_date = human_time_diff( $last_login );

		return $the_login_date;
	}
);
