<?php
/**
 * The HTML5 range field.
 *
 * @package Meta Box
 */

/**
 * HTML5 range field class.
 */
class SWPMB_Range_Field extends SWPMB_Number_Field {
	/**
	 * Get field HTML.
	 *
	 * @param mixed $meta  Meta value.
	 * @param array $field Field parameters.
	 * @return string
	 */
	public static function html( $meta, $field ) {
		$output  = parent::html( $meta, $field );
		$output .= sprintf( '<span class="swpmb-output">%s</span>', $meta );
		return $output;
	}

	/**
	 * Enqueue styles.
	 */
	public static function admin_enqueue_scripts() {
		wp_enqueue_style( 'swpmb-range', SWPMB_CSS_URL . 'range.css', array(), SWPMB_VER );
		wp_enqueue_script( 'swpmb-range', SWPMB_JS_URL . 'range.js', array(), SWPMB_VER, true );
	}

	/**
	 * Normalize parameters for field.
	 *
	 * @param array $field Field parameters.
	 * @return array
	 */
	public static function normalize( $field ) {
		$field = wp_parse_args(
			$field,
			array(
				'max' => 10,
			)
		);
		$field = parent::normalize( $field );
		return $field;
	}

	/**
	 * Ensure number in range.
	 *
	 * @param mixed $new     The submitted meta value.
	 * @param mixed $old     The existing meta value.
	 * @param int   $post_id The post ID.
	 * @param array $field   The field parameters.
	 *
	 * @return int
	 */
	public static function value( $new, $old, $post_id, $field ) {
		$new = intval( $new );
		$min = intval( $field['min'] );
		$max = intval( $field['max'] );

		if ( $new < $min ) {
			return $min;
		}
		if ( $new > $max ) {
			return $max;
		}
		return $new;
	}
}
