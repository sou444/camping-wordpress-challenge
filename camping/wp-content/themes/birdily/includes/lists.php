<?php
/**
 * Theme lists
 *
 * @package WordPress
 * @subpackage BIRDILY
 * @since BIRDILY 1.0
 */

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) {
	exit; }



// Return numbers range
if ( ! function_exists( 'birdily_get_list_range' ) ) {
	function birdily_get_list_range( $from = 1, $to = 2, $prepend_inherit = false ) {
		$list = array();
		for ( $i = $from; $i <= $to; $i++ ) {
			$list[ $i ] = $i;
		}
		return $prepend_inherit ? birdily_array_merge( array( 'inherit' => esc_html__( 'Inherit', 'birdily' ) ), $list ) : $list;
	}
}



// Return styles list
if ( ! function_exists( 'birdily_get_list_styles' ) ) {
	function birdily_get_list_styles( $from = 1, $to = 2, $prepend_inherit = false ) {
		$list = array();
		for ( $i = $from; $i <= $to; $i++ ) {
			// Translators: Add number to the style name 'Style 1', 'Style 2' ...
			$list[ $i ] = sprintf( esc_html__( 'Style %d', 'birdily' ), $i );
		}
		return $prepend_inherit ? birdily_array_merge( array( 'inherit' => esc_html__( 'Inherit', 'birdily' ) ), $list ) : $list;
	}
}

// Return list with 'Yes' and 'No' items
if ( ! function_exists( 'birdily_get_list_yesno' ) ) {
	function birdily_get_list_yesno( $prepend_inherit = false ) {
		$list = array(
			'yes' => esc_html__( 'Yes', 'birdily' ),
			'no'  => esc_html__( 'No', 'birdily' ),
		);
		return $prepend_inherit ? birdily_array_merge( array( 'inherit' => esc_html__( 'Inherit', 'birdily' ) ), $list ) : $list;
	}
}

// Return list with 'On' and 'Of' items
if ( ! function_exists( 'birdily_get_list_onoff' ) ) {
	function birdily_get_list_onoff( $prepend_inherit = false ) {
		$list = array(
			'on'  => esc_html__( 'On', 'birdily' ),
			'off' => esc_html__( 'Off', 'birdily' ),
		);
		return $prepend_inherit ? birdily_array_merge( array( 'inherit' => esc_html__( 'Inherit', 'birdily' ) ), $list ) : $list;
	}
}

// Return list with 'Show' and 'Hide' items
if ( ! function_exists( 'birdily_get_list_showhide' ) ) {
	function birdily_get_list_showhide( $prepend_inherit = false ) {
		$list = array(
			'show' => esc_html__( 'Show', 'birdily' ),
			'hide' => esc_html__( 'Hide', 'birdily' ),
		);
		return $prepend_inherit ? birdily_array_merge( array( 'inherit' => esc_html__( 'Inherit', 'birdily' ) ), $list ) : $list;
	}
}

// Return list with 'Horizontal' and 'Vertical' items
if ( ! function_exists( 'birdily_get_list_directions' ) ) {
	function birdily_get_list_directions( $prepend_inherit = false ) {
		$list = array(
			'horizontal' => esc_html__( 'Horizontal', 'birdily' ),
			'vertical'   => esc_html__( 'Vertical', 'birdily' ),
		);
		return $prepend_inherit ? birdily_array_merge( array( 'inherit' => esc_html__( 'Inherit', 'birdily' ) ), $list ) : $list;
	}
}

// Return list with paddings sizes
if ( ! function_exists( 'birdily_get_list_paddings' ) ) {
	function birdily_get_list_paddings( $prepend_inherit = false ) {
		$list = apply_filters(
			'birdily_filter_list_paddings', array(
				'none'   => esc_html__( 'None', 'birdily' ),
				'small'  => esc_html__( 'Small', 'birdily' ),
				'medium' => esc_html__( 'Medium', 'birdily' ),
				'large'  => esc_html__( 'Large', 'birdily' ),
			)
		);
		return $prepend_inherit ? birdily_array_merge( array( 'inherit' => esc_html__( 'Inherit', 'birdily' ) ), $list ) : $list;
	}
}

// Return list with image's hovers
if ( ! function_exists( 'birdily_get_list_hovers' ) ) {
	function birdily_get_list_hovers( $prepend_inherit = false ) {
		$list = apply_filters(
			'birdily_filter_list_hovers', array(
				'dots'   => esc_html__( 'Dots', 'birdily' ),
				'icon'   => esc_html__( 'Icon', 'birdily' ),
				'icons'  => esc_html__( 'Icons', 'birdily' ),
				'zoom'   => esc_html__( 'Zoom', 'birdily' ),
				'fade'   => esc_html__( 'Fade', 'birdily' ),
				'pull'   => esc_html__( 'Pull', 'birdily' ),
				'border' => esc_html__( 'Border', 'birdily' ),
			)
		);
		return $prepend_inherit ? birdily_array_merge( array( 'inherit' => esc_html__( 'Inherit', 'birdily' ) ), $list ) : $list;
	}
}

// Return custom sidebars list, prepended inherit and main sidebars item (if need)
if ( ! function_exists( 'birdily_get_list_sidebars' ) ) {
	function birdily_get_list_sidebars( $prepend_inherit = false, $add_hide = false ) {
		$list = birdily_storage_get( 'list_sidebars' );
		if ( '' == $list ) {
			global $wp_registered_sidebars;
			$list = array();
			if ( is_array( $wp_registered_sidebars ) ) {
				foreach ( $wp_registered_sidebars as $k => $v ) {
					$list[ $v['id'] ] = $v['name'];
				}
			}
			birdily_storage_set( 'list_sidebars', $list );
		}
		if ( $add_hide ) {
			$list = birdily_array_merge( array( 'hide' => esc_html__( '- Select widgets -', 'birdily' ) ), $list );
		}
		return $prepend_inherit ? birdily_array_merge( array( 'inherit' => esc_html__( 'Inherit', 'birdily' ) ), $list ) : $list;
	}
}

// Return sidebars positions
if ( ! function_exists( 'birdily_get_list_sidebars_positions' ) ) {
	function birdily_get_list_sidebars_positions( $prepend_inherit = false ) {
		$list = apply_filters(
			'birdily_filter_list_sidebars_positions', array(
				'hide'  => esc_html__( 'Hide', 'birdily' ),
				'left'  => esc_html__( 'Left', 'birdily' ),
				'right' => esc_html__( 'Right', 'birdily' ),
			)
		);
		return $prepend_inherit ? birdily_array_merge( array( 'inherit' => esc_html__( 'Inherit', 'birdily' ) ), $list ) : $list;
	}
}

// Return header/footer types
if ( ! function_exists( 'birdily_get_list_header_footer_types' ) ) {
	function birdily_get_list_header_footer_types( $prepend_inherit = false ) {
		$list = apply_filters(
			'birdily_filter_list_header_footer_types', array(
				'default' => esc_html__( 'Default', 'birdily' ),
			)
		);
		return $prepend_inherit ? birdily_array_merge( array( 'inherit' => esc_html__( 'Inherit', 'birdily' ) ), $list ) : $list;
	}
}

// Return header styles
if ( ! function_exists( 'birdily_get_list_header_styles' ) ) {
	function birdily_get_list_header_styles( $prepend_inherit = false ) {
		static $list = false;
		if ( ! $list ) {
			$list = apply_filters( 'birdily_filter_list_header_styles', array() );
		}
		return $prepend_inherit ? birdily_array_merge( array( 'inherit' => esc_html__( 'Inherit', 'birdily' ) ), $list ) : $list;
	}
}

// Return header positions
if ( ! function_exists( 'birdily_get_list_header_positions' ) ) {
	function birdily_get_list_header_positions( $prepend_inherit = false ) {
		$list = array(
			'default' => esc_html__( 'Default', 'birdily' ),
			'over'    => esc_html__( 'Over', 'birdily' ),
			'under'   => esc_html__( 'Under', 'birdily' ),
		);
		return $prepend_inherit ? birdily_array_merge( array( 'inherit' => esc_html__( 'Inherit', 'birdily' ) ), $list ) : $list;
	}
}

// Return footer styles
if ( ! function_exists( 'birdily_get_list_footer_styles' ) ) {
	function birdily_get_list_footer_styles( $prepend_inherit = false ) {
		static $list = false;
		if ( ! $list ) {
			$list = apply_filters( 'birdily_filter_list_footer_styles', array() );
		}
		return $prepend_inherit ? birdily_array_merge( array( 'inherit' => esc_html__( 'Inherit', 'birdily' ) ), $list ) : $list;
	}
}

// Return body styles list, prepended inherit
if ( ! function_exists( 'birdily_get_list_body_styles' ) ) {
	function birdily_get_list_body_styles( $prepend_inherit = false ) {
		$list = array(
			'boxed' => esc_html__( 'Boxed', 'birdily' ),
			'wide'  => esc_html__( 'Wide', 'birdily' ),
		);
		if ( apply_filters( 'birdily_filter_allow_fullscreen', birdily_get_theme_setting( 'allow_fullscreen' ) || birdily_get_edited_post_type() == 'page' ) ) {
			$list['fullwide']   = esc_html__( 'Fullwidth', 'birdily' );
			$list['fullscreen'] = esc_html__( 'Fullscreen', 'birdily' );
		}
		$list = apply_filters( 'birdily_filter_list_body_styles', $list );
		return $prepend_inherit ? birdily_array_merge( array( 'inherit' => esc_html__( 'Inherit', 'birdily' ) ), $list ) : $list;
	}
}

// Return meta parts list
if ( ! function_exists( 'birdily_get_list_meta_parts' ) ) {
	function birdily_get_list_meta_parts( $prepend_inherit = false ) {
		$list = apply_filters(
			'birdily_filter_list_meta_parts',
			array(
				'categories' => esc_html__( 'Categories', 'birdily' ),
				'date'       => esc_html__( 'Post date', 'birdily' ),
				'author'     => esc_html__( 'Post author', 'birdily' ),
				'counters'   => esc_html__( 'Post counters', 'birdily' ),
				'share'      => esc_html__( 'Share links', 'birdily' ),
				'edit'       => esc_html__( 'Edit link', 'birdily' ),
			)
		);
		return $prepend_inherit ? birdily_array_merge( array( 'inherit' => esc_html__( 'Inherit', 'birdily' ) ), $list ) : $list;
	}
}

// Return counters list
if ( ! function_exists( 'birdily_get_list_counters' ) ) {
	function birdily_get_list_counters( $prepend_inherit = false ) {
		$list = apply_filters(
			'birdily_filter_list_counters',
			array(
				'views'    => esc_html__( 'Views', 'birdily' ),
				'likes'    => esc_html__( 'Likes', 'birdily' ),
				'comments' => esc_html__( 'Comments', 'birdily' ),
			)
		);
		return $prepend_inherit ? birdily_array_merge( array( 'inherit' => esc_html__( 'Inherit', 'birdily' ) ), $list ) : $list;
	}
}

// Return blog styles list, prepended inherit
if ( ! function_exists( 'birdily_get_list_blog_styles' ) ) {
	function birdily_get_list_blog_styles( $prepend_inherit = false, $filter = 'arh' ) {
		$list   = array();
		$styles = birdily_storage_get( 'blog_styles' );
		if ( is_array( $styles ) ) {
			foreach ( $styles as $k => $v ) {
				if ( empty( $filter ) || empty( $v[ "{$filter}_allowed" ] ) || $v[ "{$filter}_allowed" ] ) {
					if ( 'arh' == $filter && isset( $v['columns'] ) && is_array( $v['columns'] ) ) {
						foreach ( $v['columns'] as $col ) {
							$list[ "{$k}_{$col}" ] = 1 == $col
														// Translators: Make blog style title: "Layout name"
														? sprintf( __( '%s /1 column/', 'birdily' ), $v['title'] )
														// Translators: Make blog style title: "Layout name /# columns/"
														: sprintf( __( '%1$s /%2$d columns/', 'birdily' ), $v['title'], $col );
						}
					} else {
						$list[ $k ] = $v['title'];
					}
				}
			}
		}
		$list = apply_filters( 'birdily_filter_list_blog_styles', $list );
		return $prepend_inherit ? birdily_array_merge( array( 'inherit' => esc_html__( 'Inherit', 'birdily' ) ), $list ) : $list;
	}
}


// Return list of categories
if ( ! function_exists( 'birdily_get_list_categories' ) ) {
	function birdily_get_list_categories( $prepend_inherit = false ) {
		$list = birdily_storage_get( 'list_categories' );
		if ( '' == $list ) {
			$list       = array();
			$taxonomies = get_categories(
				array(
					'type'         => 'post',
					'orderby'      => 'name',
					'order'        => 'ASC',
					'hide_empty'   => 0,
					'hierarchical' => 1,
					'taxonomy'     => 'category',
					'pad_counts'   => false,
				)
			);
			if ( is_array( $taxonomies ) && count( $taxonomies ) > 0 ) {
				foreach ( $taxonomies as $cat ) {
					$list[ $cat->term_id ] = apply_filters( 'birdily_filter_term_name', $cat->name, $cat );
				}
			}
			birdily_storage_set( 'list_categories', $list );
		}
		return $prepend_inherit ? birdily_array_merge( array( 'inherit' => esc_html__( 'Inherit', 'birdily' ) ), $list ) : $list;
	}
}


// Return list of taxonomies
if ( ! function_exists( 'birdily_get_list_terms' ) ) {
	function birdily_get_list_terms( $prepend_inherit = false, $taxonomy = 'category' ) {
		$list = birdily_storage_get( 'list_taxonomies_' . ( $taxonomy ) );
		if ( '' == $list ) {
			$list       = array();
			$taxonomies = get_terms(
				$taxonomy, array(
					'orderby'      => 'name',
					'order'        => 'ASC',
					'hide_empty'   => 0,
					'hierarchical' => 1,
					'taxonomy'     => $taxonomy,
					'pad_counts'   => false,
				)
			);
			if ( is_array( $taxonomies ) && count( $taxonomies ) > 0 ) {
				foreach ( $taxonomies as $cat ) {
					$list[ $cat->term_id ] = apply_filters( 'birdily_filter_term_name', $cat->name, $cat );  
				}
			}
			birdily_storage_set( 'list_taxonomies_' . ( $taxonomy ), $list );
		}
		return $prepend_inherit ? birdily_array_merge( array( 'inherit' => esc_html__( 'Inherit', 'birdily' ) ), $list ) : $list;
	}
}

// Return list of post's types
if ( ! function_exists( 'birdily_get_list_posts_types' ) ) {
	function birdily_get_list_posts_types( $prepend_inherit = false ) {
		$list = birdily_storage_get( 'list_posts_types' );
		if ( '' == $list ) {
			$list = apply_filters(
				'birdily_filter_list_posts_types', array(
					'post' => esc_html__( 'Post', 'birdily' ),
				)
			);
			birdily_storage_set( 'list_posts_types', $list );
		}
		return $prepend_inherit ? birdily_array_merge( array( 'inherit' => esc_html__( 'Inherit', 'birdily' ) ), $list ) : $list;
	}
}


// Return list post items from any post type and taxonomy
if ( ! function_exists( 'birdily_get_list_posts' ) ) {
	function birdily_get_list_posts( $prepend_inherit = false, $opt = array() ) {
		$opt = array_merge(
			array(
				'post_type'      => 'post',
				'post_status'    => 'publish',
				'post_parent'    => '',
				'taxonomy'       => 'category',
				'taxonomy_value' => '',
				'meta_key'       => '',
				'meta_value'     => '',
				'meta_compare'   => '',
				'posts_per_page' => -1,
				'orderby'        => 'post_date',
				'order'          => 'desc',
				'not_selected'   => true,
				'return'         => 'id',
			), is_array( $opt ) ? $opt : array( 'post_type' => $opt )
		);

		$hash = 'list_posts'
				. '_' . ( is_array( $opt['post_type'] ) ? join( '_', $opt['post_type'] ) : $opt['post_type'] )
				. '_' . ( is_array( $opt['post_parent'] ) ? join( '_', $opt['post_parent'] ) : $opt['post_parent'] )
				. '_' . ( $opt['taxonomy'] )
				. '_' . ( is_array( $opt['taxonomy_value'] ) ? join( '_', $opt['taxonomy_value'] ) : $opt['taxonomy_value'] )
				. '_' . ( $opt['meta_key'] )
				. '_' . ( $opt['meta_compare'] )
				. '_' . ( $opt['meta_value'] )
				. '_' . ( $opt['orderby'] )
				. '_' . ( $opt['order'] )
				. '_' . ( $opt['return'] )
				. '_' . ( $opt['posts_per_page'] );
		$list = birdily_storage_get( $hash );
		if ( '' == $list ) {
			$list = array();
			if ( false !== $opt['not_selected'] ) {
				$list['none'] = true === $opt['not_selected'] ? esc_html__( '- Not selected -', 'birdily' ) : $opt['not_selected'];
			}
			$args = array(
				'post_type'           => $opt['post_type'],
				'post_status'         => $opt['post_status'],
				'posts_per_page'      => -1 == $opt['posts_per_page'] ? 1000 : $opt['posts_per_page'],
				'ignore_sticky_posts' => true,
				'orderby'             => $opt['orderby'],
				'order'               => $opt['order'],
			);
			if ( ! empty( $opt['post_parent'] ) ) {
				if ( is_array( $opt['post_parent'] ) ) {
					$args['post_parent__in'] = $opt['post_parent'];
				} else {
					$args['post_parent'] = $opt['post_parent'];
				}
			}
			if ( ! empty( $opt['taxonomy_value'] ) ) {
				$args['tax_query'] = array(
					array(
						'taxonomy' => $opt['taxonomy'],
						'field'    => is_array( $opt['taxonomy_value'] )
										? ( (int) $opt['taxonomy_value'][0] > 0 ? 'term_taxonomy_id' : 'slug' )
										: ( (int) $opt['taxonomy_value'] > 0 ? 'term_taxonomy_id' : 'slug' ),
						'terms'    => is_array( $opt['taxonomy_value'] )
										? $opt['taxonomy_value']
										: ( (int) $opt['taxonomy_value'] > 0 ? (int) $opt['taxonomy_value'] : $opt['taxonomy_value'] ),
					),
				);
			}
			if ( ! empty( $opt['meta_key'] ) ) {
				$args['meta_key'] = $opt['meta_key'];
			}
			if ( ! empty( $opt['meta_value'] ) ) {
				$args['meta_value'] = $opt['meta_value'];
			}
			if ( ! empty( $opt['meta_compare'] ) ) {
				$args['meta_compare'] = $opt['meta_compare'];
			}
			$posts = get_posts( $args );
			if ( is_array( $posts ) && count( $posts ) > 0 ) {
				foreach ( $posts as $post ) {
					$list[ 'id' == $opt['return'] ? $post->ID : $post->post_title ] = $post->post_title;
				}
			}
			birdily_storage_set( $hash, $list );
		}
		return $prepend_inherit ? birdily_array_merge( array( 'inherit' => esc_html__( 'Inherit', 'birdily' ) ), $list ) : $list;
	}
}


// Return list of registered users
if ( ! function_exists( 'birdily_get_list_users' ) ) {
	function birdily_get_list_users( $prepend_inherit = false, $roles = array( 'administrator', 'editor', 'author', 'contributor', 'shop_manager' ) ) {
		$list = birdily_storage_get( 'list_users' );
		if ( '' == $list ) {
			$list         = array();
			$list['none'] = esc_html__( '- Not selected -', 'birdily' );
			$users        = get_users(
				array(
					'orderby' => 'display_name',
					'order'   => 'ASC',
				)
			);
			if ( is_array( $users ) && count( $users ) > 0 ) {
				foreach ( $users as $user ) {
					$accept = true;
					if ( is_array( $user->roles ) ) {
						if ( is_array( $user->roles ) && count( $user->roles ) > 0 ) {
							$accept = false;
							foreach ( $user->roles as $role ) {
								if ( in_array( $role, $roles ) ) {
									$accept = true;
									break;
								}
							}
						}
					}
					if ( $accept ) {
						$list[ $user->user_login ] = $user->display_name;
					}
				}
			}
			birdily_storage_set( 'list_users', $list );
		}
		return $prepend_inherit ? birdily_array_merge( array( 'inherit' => esc_html__( 'Inherit', 'birdily' ) ), $list ) : $list;
	}
}

// Return menus list, prepended inherit
if ( ! function_exists( 'birdily_get_list_menus' ) ) {
	function birdily_get_list_menus( $prepend_inherit = false ) {
		$list = birdily_storage_get( 'list_menus' );
		if ( '' == $list ) {
			$list            = array();
			$list['default'] = esc_html__( 'Default', 'birdily' );
			$menus           = wp_get_nav_menus();
			if ( is_array( $menus ) && count( $menus ) > 0 ) {
				foreach ( $menus as $menu ) {
					$list[ $menu->slug ] = $menu->name;
				}
			}
			birdily_storage_set( 'list_menus', $list );
		}
		return $prepend_inherit ? birdily_array_merge( array( 'inherit' => esc_html__( 'Inherit', 'birdily' ) ), $list ) : $list;
	}
}


// Return list of the specified icons (font icons, svg icons or png icons)
if ( ! function_exists( 'birdily_get_list_icons' ) ) {
	function birdily_get_list_icons( $style ) {
		$lists = get_transient( 'birdily_list_icons' );
		if ( ! is_array( $lists ) || ! isset( $lists[ $style ] ) || ! is_array( $lists[ $style ] ) || count( $lists[ $style ] ) < 2 ) {
			if ( 'icons' == $style ) {
				$lists[ $style ] = birdily_array_from_list( birdily_get_list_icons_classes() );
			} elseif ( 'images' == $style ) {
				$lists[ $style ] = birdily_get_list_images();
			} else { 
				$lists[ $style ] = birdily_get_list_images( false, 'svg' );
			}
			if ( is_admin() && is_array( $lists[ $style ] ) && count( $lists[ $style ] ) > 1 ) {
				set_transient( 'birdily_list_icons', $lists, 6 * 60 * 60 );       // Store to the cache for 6 hours
			}
		}
		return $lists[ $style ];
	}
}

// Return iconed classes list
if ( ! function_exists( 'birdily_get_list_icons_classes' ) ) {
	function birdily_get_list_icons_classes( $prepend_inherit = false ) {
		static $list = false;
		if ( ! is_array( $list ) ) {
			$list = ! is_admin() ? array() : birdily_parse_icons_classes( birdily_get_file_dir( 'css/font-icons/css/fontello-codes.css' ) );
		}
		$list = birdily_array_merge( array( 'none' => 'none' ), $list );
		return $prepend_inherit ? birdily_array_merge( array( 'inherit' => esc_html__( 'Inherit', 'birdily' ) ), $list ) : $list;
	}
}

// Return images list
if ( ! function_exists( 'birdily_get_list_images' ) ) {
	function birdily_get_list_images( $prepend_inherit = false, $type = 'png' ) {
		$list = function_exists( 'trx_addons_get_list_files' )
				? trx_addons_get_list_files( "css/icons.{$type}", $type )
				: array();
		return $prepend_inherit ? birdily_array_merge( array( 'inherit' => esc_html__( 'Inherit', 'birdily' ) ), $list ) : $list;
	}
}


// Additional attributes for VC and SOW
//----------------------------------------------------
if ( ! function_exists( 'birdily_get_list_sc_color_styles' ) ) {
	function birdily_get_list_sc_color_styles( $prepend_inherit = false ) {
		$list = apply_filters(
			'birdily_filter_get_list_sc_color_styles', array(
				'default' => esc_html__( 'Default', 'birdily' ),
				'link2'   => esc_html__( 'Link 2', 'birdily' ),
				'link3'   => esc_html__( 'Link 3', 'birdily' ),
				'dark'    => esc_html__( 'Dark', 'birdily' ),
			)
		);
		return $prepend_inherit ? birdily_array_merge( array( 'inherit' => esc_html__( 'Inherit', 'birdily' ) ), $list ) : $list;
	}
}
