<?php
/**
 * Provides array helper functions
 *
 * @package easy-icon-grid
 */

namespace WBFY\EasyIconGrid;

/**
 * Arrays static class
 */
class Arrays {

	/**
	 * Recursively merge multiple arrays
	 *
	 * @phpcs:disable Squiz.Commenting.FunctionComment.ExtraParamComment -- variable number of parametes so no formal list
	 *
	 * @param array $.. Any number of arrays to be merged.
	 * @return array The merged array.
	 *
	 * @phpcs:enable
	 */
	public static function extend() {
		$a      = null;
		$arrays = func_get_args();
		foreach ( $arrays as $array ) {
			if ( is_array( $array ) ) {
				if ( is_null( $a ) ) {
					$a = $array;
				} else {
					$a = self::merge( $a, $array );
				}
			}
		}
		return ( is_null( $a ) ) ? array() : $a;
	}

	/**
	 * Merge two arrays
	 * Support function for extend() function above
	 *
	 * @param array $a First array.
	 * @param array $b Second array.
	 * @return array The merged array.
	 */
	public static function merge( $a, $b ) {
		foreach ( $b as $k => $v ) {
			if ( is_array( $v ) ) {
				if ( ! isset( $a[ $k ] ) ) {
					$a[ $k ] = $v;
				} else {
					$a[ $k ] = self::merge( $a[ $k ], $v );
				}
			} else {
				$a[ $k ] = $v;
			}
		}
		return $a;
	}

	/**
	 * Returns a deep value from array
	 *
	 * @example      $deep_key = 'a.b' will return $arr['a']['b'] if it exists or null if not
	 * @param array  $arr Array to be searched.
	 * @param string $deep_key The dot separated search value.
	 * @return mixed The found value from the input array or null if not found.
	 */
	public static function deep_value( $arr, $deep_key ) {
		$keys  = explode( '.', $deep_key );
		$value = null;
		foreach ( $keys as $key ) {
			if ( is_array( $arr ) && isset( $arr[ $key ] ) ) {
				$value = $arr[ $key ];
				$arr   = $arr[ $key ];
			} else {
				$value = false;
			}
		}
		return $value;
	}
}
