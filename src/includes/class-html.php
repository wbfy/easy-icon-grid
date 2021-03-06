<?php
/**
 * Generate common HTML snippets
 *
 * @package easy-icon-grid
 */

namespace WBFY\EasyIconGrid;

defined( 'ABSPATH' ) || exit;

/**
 * Html class
 */
class Html {

	/**
	 * Render select from numeric range
	 *
	 * @param int   $min starting value.
	 * @param int   $max last value.
	 * @param array $attrs html attributes eg: $attrs['value'] = 1
	 *                     selected option is set to 'value' attribute.
	 * @param int   $inc increment between settings in range, default is 1.
	 * @return string the generated html.
	 */
	public static function select_range( $min, $max, $attrs = array(), $inc = 1 ) {
		$min = (int) $min;
		$max = (int) $max;
		$inc = (int) $inc;

		$value = $min;
		if ( isset( $attrs['value'] ) ) {
			$value = (int) $attrs['value'];
			unset( $attrs['value'] );
		}

		$html  = '<select';
		$html .= self::attrs( $attrs );
		$html .= '>';

		$i = $min;
		while ( $i <= $max ) {
			$selected = ( $i === $value ) ? ' selected' : '';
			$html    .= '<option value="' . $i . '"' . $selected . '>' . (string) $i . '</option>';
			$i        = $i + $inc;
		}
		$html .= '</select>';

		return $html;
	}

	/**
	 * Render select from array
	 *
	 * @param array $list   settings in list eg: $list[value] = name.
	 * @param array $attrs  html attributes eg: $attrs['value'] = 'foo'
	 *                      selected option is set to 'value' attribute.
	 * @return string       the generated html.
	 */
	public static function select_list( $list, $attrs = array() ) {
		$value = array_key_first( $list );
		if ( isset( $attrs['value'] ) ) {
			$value = esc_attr( $attrs['value'] );
			unset( $attrs['value'] );
		}

		$html  = '<select';
		$html .= self::attrs( $attrs );
		$html .= '>';
		foreach ( $list as $id => $name ) {
			$selected = ( esc_attr( $id ) === $value ) ? ' selected' : '';
			$html    .= '<option value="' . esc_attr( $id ) . '"' . $selected . '>' . esc_html( $name ) . '</option>';
		}
		$html .= '</select>';

		return $html;
	}

	/**
	 * Render text input
	 *
	 * @param array $attrs html attributes eg: $attrs['maxlength'] = 10.
	 * @return string the generated html.
	 */
	public static function input_text( $attrs = array() ) {
		return '<input type="text"' . self::attrs( $attrs ) . '>';
	}

	/**
	 * Render checkbox input
	 *
	 * @param array $attrs html attributes eg: $attrs['class'] = 'foo'.
	 * @return string the generated html.
	 */
	public static function input_check( $attrs = array() ) {
		if ( isset( $attrs['value'] ) && $attrs['value'] ) {
			$attrs['checked'] = 'on';
		}
		unset( $attrs['value'] );

		$pre  = '';
		$post = '';
		if ( isset( $attrs['label'] ) ) {
			$pre  = '<label>';
			$post = $attrs['label'] . '</label>';
			unset( $attrs['label'] );
		}

		return $pre . '<input type="checkbox"' . self::attrs( $attrs ) . '>' . $post;
	}

	/**
	 * Generate html attributes from attribute list
	 *
	 * @param array $attrs List of attributes eg: $attrs['maxlength'] = 10.
	 * @return string the generated html.
	 */
	private static function attrs( $attrs ) {
		$html = '';
		if ( is_array( $attrs ) ) {
			foreach ( $attrs as $attr => $value ) {
				$html .= ' ' . $attr . '="' . esc_attr( $value ) . '"';
			}
		}
		return $html;
	}
}
