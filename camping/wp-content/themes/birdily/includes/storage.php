<?php
/**
 * Theme storage manipulations
 *
 * @package WordPress
 * @subpackage BIRDILY
 * @since BIRDILY 1.0
 */

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) {
	exit; }

// Get theme variable
if ( ! function_exists( 'birdily_storage_get' ) ) {
	function birdily_storage_get( $var_name, $default = '' ) {
		global $BIRDILY_STORAGE;
		return isset( $BIRDILY_STORAGE[ $var_name ] ) ? $BIRDILY_STORAGE[ $var_name ] : $default;
	}
}

// Set theme variable
if ( ! function_exists( 'birdily_storage_set' ) ) {
	function birdily_storage_set( $var_name, $value ) {
		global $BIRDILY_STORAGE;
		$BIRDILY_STORAGE[ $var_name ] = $value;
	}
}

// Check if theme variable is empty
if ( ! function_exists( 'birdily_storage_empty' ) ) {
	function birdily_storage_empty( $var_name, $key = '', $key2 = '' ) {
		global $BIRDILY_STORAGE;
		if ( ! empty( $key ) && ! empty( $key2 ) ) {
			return empty( $BIRDILY_STORAGE[ $var_name ][ $key ][ $key2 ] );
		} elseif ( ! empty( $key ) ) {
			return empty( $BIRDILY_STORAGE[ $var_name ][ $key ] );
		} else {
			return empty( $BIRDILY_STORAGE[ $var_name ] );
		}
	}
}

// Check if theme variable is set
if ( ! function_exists( 'birdily_storage_isset' ) ) {
	function birdily_storage_isset( $var_name, $key = '', $key2 = '' ) {
		global $BIRDILY_STORAGE;
		if ( ! empty( $key ) && ! empty( $key2 ) ) {
			return isset( $BIRDILY_STORAGE[ $var_name ][ $key ][ $key2 ] );
		} elseif ( ! empty( $key ) ) {
			return isset( $BIRDILY_STORAGE[ $var_name ][ $key ] );
		} else {
			return isset( $BIRDILY_STORAGE[ $var_name ] );
		}
	}
}

// Inc/Dec theme variable with specified value
if ( ! function_exists( 'birdily_storage_inc' ) ) {
	function birdily_storage_inc( $var_name, $value = 1 ) {
		global $BIRDILY_STORAGE;
		if ( empty( $BIRDILY_STORAGE[ $var_name ] ) ) {
			$BIRDILY_STORAGE[ $var_name ] = 0;
		}
		$BIRDILY_STORAGE[ $var_name ] += $value;
	}
}

// Concatenate theme variable with specified value
if ( ! function_exists( 'birdily_storage_concat' ) ) {
	function birdily_storage_concat( $var_name, $value ) {
		global $BIRDILY_STORAGE;
		if ( empty( $BIRDILY_STORAGE[ $var_name ] ) ) {
			$BIRDILY_STORAGE[ $var_name ] = '';
		}
		$BIRDILY_STORAGE[ $var_name ] .= $value;
	}
}

// Get array (one or two dim) element
if ( ! function_exists( 'birdily_storage_get_array' ) ) {
	function birdily_storage_get_array( $var_name, $key, $key2 = '', $default = '' ) {
		global $BIRDILY_STORAGE;
		if ( empty( $key2 ) ) {
			return ! empty( $var_name ) && ! empty( $key ) && isset( $BIRDILY_STORAGE[ $var_name ][ $key ] ) ? $BIRDILY_STORAGE[ $var_name ][ $key ] : $default;
		} else {
			return ! empty( $var_name ) && ! empty( $key ) && isset( $BIRDILY_STORAGE[ $var_name ][ $key ][ $key2 ] ) ? $BIRDILY_STORAGE[ $var_name ][ $key ][ $key2 ] : $default;
		}
	}
}

// Set array element
if ( ! function_exists( 'birdily_storage_set_array' ) ) {
	function birdily_storage_set_array( $var_name, $key, $value ) {
		global $BIRDILY_STORAGE;
		if ( ! isset( $BIRDILY_STORAGE[ $var_name ] ) ) {
			$BIRDILY_STORAGE[ $var_name ] = array();
		}
		if ( '' === $key ) {
			$BIRDILY_STORAGE[ $var_name ][] = $value;
		} else {
			$BIRDILY_STORAGE[ $var_name ][ $key ] = $value;
		}
	}
}

// Set two-dim array element
if ( ! function_exists( 'birdily_storage_set_array2' ) ) {
	function birdily_storage_set_array2( $var_name, $key, $key2, $value ) {
		global $BIRDILY_STORAGE;
		if ( ! isset( $BIRDILY_STORAGE[ $var_name ] ) ) {
			$BIRDILY_STORAGE[ $var_name ] = array();
		}
		if ( ! isset( $BIRDILY_STORAGE[ $var_name ][ $key ] ) ) {
			$BIRDILY_STORAGE[ $var_name ][ $key ] = array();
		}
		if ( '' === $key2 ) {
			$BIRDILY_STORAGE[ $var_name ][ $key ][] = $value;
		} else {
			$BIRDILY_STORAGE[ $var_name ][ $key ][ $key2 ] = $value;
		}
	}
}

// Merge array elements
if ( ! function_exists( 'birdily_storage_merge_array' ) ) {
	function birdily_storage_merge_array( $var_name, $key, $value ) {
		global $BIRDILY_STORAGE;
		if ( ! isset( $BIRDILY_STORAGE[ $var_name ] ) ) {
			$BIRDILY_STORAGE[ $var_name ] = array();
		}
		if ( '' === $key ) {
			$BIRDILY_STORAGE[ $var_name ] = array_merge( $BIRDILY_STORAGE[ $var_name ], $value );
		} else {
			$BIRDILY_STORAGE[ $var_name ][ $key ] = array_merge( $BIRDILY_STORAGE[ $var_name ][ $key ], $value );
		}
	}
}

// Add array element after the key
if ( ! function_exists( 'birdily_storage_set_array_after' ) ) {
	function birdily_storage_set_array_after( $var_name, $after, $key, $value = '' ) {
		global $BIRDILY_STORAGE;
		if ( ! isset( $BIRDILY_STORAGE[ $var_name ] ) ) {
			$BIRDILY_STORAGE[ $var_name ] = array();
		}
		if ( is_array( $key ) ) {
			birdily_array_insert_after( $BIRDILY_STORAGE[ $var_name ], $after, $key );
		} else {
			birdily_array_insert_after( $BIRDILY_STORAGE[ $var_name ], $after, array( $key => $value ) );
		}
	}
}

// Add array element before the key
if ( ! function_exists( 'birdily_storage_set_array_before' ) ) {
	function birdily_storage_set_array_before( $var_name, $before, $key, $value = '' ) {
		global $BIRDILY_STORAGE;
		if ( ! isset( $BIRDILY_STORAGE[ $var_name ] ) ) {
			$BIRDILY_STORAGE[ $var_name ] = array();
		}
		if ( is_array( $key ) ) {
			birdily_array_insert_before( $BIRDILY_STORAGE[ $var_name ], $before, $key );
		} else {
			birdily_array_insert_before( $BIRDILY_STORAGE[ $var_name ], $before, array( $key => $value ) );
		}
	}
}

// Push element into array
if ( ! function_exists( 'birdily_storage_push_array' ) ) {
	function birdily_storage_push_array( $var_name, $key, $value ) {
		global $BIRDILY_STORAGE;
		if ( ! isset( $BIRDILY_STORAGE[ $var_name ] ) ) {
			$BIRDILY_STORAGE[ $var_name ] = array();
		}
		if ( '' === $key ) {
			array_push( $BIRDILY_STORAGE[ $var_name ], $value );
		} else {
			if ( ! isset( $BIRDILY_STORAGE[ $var_name ][ $key ] ) ) {
				$BIRDILY_STORAGE[ $var_name ][ $key ] = array();
			}
			array_push( $BIRDILY_STORAGE[ $var_name ][ $key ], $value );
		}
	}
}

// Pop element from array
if ( ! function_exists( 'birdily_storage_pop_array' ) ) {
	function birdily_storage_pop_array( $var_name, $key = '', $defa = '' ) {
		global $BIRDILY_STORAGE;
		$rez = $defa;
		if ( '' === $key ) {
			if ( isset( $BIRDILY_STORAGE[ $var_name ] ) && is_array( $BIRDILY_STORAGE[ $var_name ] ) && count( $BIRDILY_STORAGE[ $var_name ] ) > 0 ) {
				$rez = array_pop( $BIRDILY_STORAGE[ $var_name ] );
			}
		} else {
			if ( isset( $BIRDILY_STORAGE[ $var_name ][ $key ] ) && is_array( $BIRDILY_STORAGE[ $var_name ][ $key ] ) && count( $BIRDILY_STORAGE[ $var_name ][ $key ] ) > 0 ) {
				$rez = array_pop( $BIRDILY_STORAGE[ $var_name ][ $key ] );
			}
		}
		return $rez;
	}
}

// Inc/Dec array element with specified value
if ( ! function_exists( 'birdily_storage_inc_array' ) ) {
	function birdily_storage_inc_array( $var_name, $key, $value = 1 ) {
		global $BIRDILY_STORAGE;
		if ( ! isset( $BIRDILY_STORAGE[ $var_name ] ) ) {
			$BIRDILY_STORAGE[ $var_name ] = array();
		}
		if ( empty( $BIRDILY_STORAGE[ $var_name ][ $key ] ) ) {
			$BIRDILY_STORAGE[ $var_name ][ $key ] = 0;
		}
		$BIRDILY_STORAGE[ $var_name ][ $key ] += $value;
	}
}

// Concatenate array element with specified value
if ( ! function_exists( 'birdily_storage_concat_array' ) ) {
	function birdily_storage_concat_array( $var_name, $key, $value ) {
		global $BIRDILY_STORAGE;
		if ( ! isset( $BIRDILY_STORAGE[ $var_name ] ) ) {
			$BIRDILY_STORAGE[ $var_name ] = array();
		}
		if ( empty( $BIRDILY_STORAGE[ $var_name ][ $key ] ) ) {
			$BIRDILY_STORAGE[ $var_name ][ $key ] = '';
		}
		$BIRDILY_STORAGE[ $var_name ][ $key ] .= $value;
	}
}

// Call object's method
if ( ! function_exists( 'birdily_storage_call_obj_method' ) ) {
	function birdily_storage_call_obj_method( $var_name, $method, $param = null ) {
		global $BIRDILY_STORAGE;
		if ( null === $param ) {
			return ! empty( $var_name ) && ! empty( $method ) && isset( $BIRDILY_STORAGE[ $var_name ] ) ? $BIRDILY_STORAGE[ $var_name ]->$method() : '';
		} else {
			return ! empty( $var_name ) && ! empty( $method ) && isset( $BIRDILY_STORAGE[ $var_name ] ) ? $BIRDILY_STORAGE[ $var_name ]->$method( $param ) : '';
		}
	}
}

// Get object's property
if ( ! function_exists( 'birdily_storage_get_obj_property' ) ) {
	function birdily_storage_get_obj_property( $var_name, $prop, $default = '' ) {
		global $BIRDILY_STORAGE;
		return ! empty( $var_name ) && ! empty( $prop ) && isset( $BIRDILY_STORAGE[ $var_name ]->$prop ) ? $BIRDILY_STORAGE[ $var_name ]->$prop : $default;
	}
}
