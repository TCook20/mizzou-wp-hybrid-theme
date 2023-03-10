<?php
/**
 * Oembeds
 *
 * @package WordPress
 * @subpackage Theme
 * @category functions
 * @author Travis Cook, Digital Service, University of Missouri
 * @copyright 2022 Curators of the University of Missouri
 */

/**
 * Adds oembed support for mizzou qualtric forms
 */
wp_embed_register_handler(
	'mizzouqualtrics',
	'/^((https:\/\/missouri\.qualtrics\.com\/jfe\/form\/SV_[A-Za-z0-9]{15})(?:\?(.*))?)$/',
	function ( $ary_matches, $ary_attributes, $str_url, $raw ) {
		$ary_pattern              = array();
		$str_iframe_pattern_front = '<iframe src="%s"';
		$str_iframe_pattern_end   = ' ></iframe>';

		// match 2 is going to be our actual qualtrics URL.
		$ary_pattern['url'] = $ary_matches[2];

		// match 3 will be the parameters.
		$str_atts = $ary_matches[3];
		parse_str( $str_atts, $ary_parsed_atts );
		$ary_width  = preg_grep_keys( $ary_parsed_atts, '/^(w)(?:idth)?$/' );
		$ary_height = preg_grep_keys( $ary_parsed_atts, '/^(h)(?:eight)?$/' );
		$ary_class  = preg_grep_keys( $ary_parsed_atts, '/^(c)(?:lass)?$/' );

		/**
		 * Do we have a height at all?
		 */
		if ( ( isset( $ary_attributes['height'] ) && ctype_digit( $ary_attributes['height'] ) ) || 0 < count( $ary_height ) ) {
			$str_iframe_pattern_front .= ' height="%d"';

			/**
			 * Did they give us a height?
			 */
			if ( 0 < count( $ary_height ) ) {
				$ary_attributes['height'] = current( $ary_height );
			}

			$ary_pattern['h'] = $ary_attributes['height'];
		}

		/**
		 * Do we have a width at all?
		 */
		if ( ( isset( $ary_attributes['width'] ) && ctype_digit( $ary_attributes['width'] ) ) || 0 < count( $ary_width ) ) {
			$str_iframe_pattern_front .= ' width="%d"';

			/**
			 * Did they give us a width?
			 */
			if ( 0 < count( $ary_width ) ) {
				$ary_attributes['width'] = current( $ary_width );
			}

			$ary_pattern['w'] = $ary_attributes['width'];
		}

		/**
		 * How about a class?
		 */
		if ( 0 < count( $ary_class ) ) {
			$str_iframe_pattern_front .= ' class="%s"';
			$ary_pattern['c']          = htmlentities( strip_tags( urldecode( current( $ary_class ) ) ), ENT_COMPAT );
		}

		$str_iframe_pattern = $str_iframe_pattern_front . $str_iframe_pattern_end;

		return vsprintf( $str_iframe_pattern, $ary_pattern );
	}
);
