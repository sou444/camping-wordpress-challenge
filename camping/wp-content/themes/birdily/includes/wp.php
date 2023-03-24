<?php
/**
 * WP tags and utils
 *
 * @package WordPress
 * @subpackage BIRDILY
 * @since BIRDILY 1.0
 */

// Theme init
if ( ! function_exists( 'birdily_wp_theme_setup' ) ) {
	add_action( 'after_setup_theme', 'birdily_wp_theme_setup' );
	function birdily_wp_theme_setup() {

		// Remove macros from title
		add_filter( 'wp_title', 'birdily_wp_title' );
		add_filter( 'wp_title_parts', 'birdily_wp_title' );
		add_filter( 'document_title_parts', 'birdily_wp_title' );

		// Breadcrumbs link 'All posts'
		add_filter( 'post_type_archive_link', 'birdily_get_template_page_link', 10, 2 );
	}
}


/* Blog utilities
-------------------------------------------------------------------------------- */

// Detect current blog mode to get correspond options (post | page | search | blog | front)
if ( ! function_exists( 'birdily_detect_blog_mode' ) ) {
	function birdily_detect_blog_mode() {
		if ( is_front_page() && ! is_home() ) {
			$mode = 'front';
		} elseif ( is_home() ) {
			$mode = 'home';     // Specify 'blog' if you don't need a separate options for the homepage
		} elseif ( is_single() ) {
			$mode = 'post';
		} elseif ( is_page() && ! birdily_storage_isset( 'blog_archive' ) ) {
			$mode = 'page';
		} else {
			$mode = 'blog';
		}
		return apply_filters( 'birdily_filter_detect_blog_mode', $mode );
	}
}

// Return image of current post/page/category/blog mode
if ( ! function_exists( 'birdily_get_current_mode_image' ) ) {
	function birdily_get_current_mode_image( $default = '' ) {
		if ( is_category() ) {
			$img = birdily_get_category_image();
			if ( '' != $img ) {
				$default = $img;
			}
		} elseif ( is_singular() || birdily_storage_isset( 'blog_archive' ) ) {
			if ( has_post_thumbnail() ) {
				$img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
				if ( is_array( $img ) ) {
					$default = $img[0];
				}
			} else {
				$default = '';
			}
		}
		return $default;
	}
}

// Start blog archive template
if ( ! function_exists( 'birdily_blog_archive_start' ) ) {
	function birdily_blog_archive_start() {
		$main_post = birdily_storage_get( 'blog_archive_template_post' );
		if ( is_object( $main_post ) ) {
			// Prepare post with template content
			$GLOBALS['post'] = $main_post;
			setup_postdata( $main_post );
			// Get template content
			$birdily_content            = '';
			$birdily_blog_archive_mask  = '%%CONTENT%%';
			$birdily_blog_archive_subst = sprintf( '<div class="blog_archive">%s</div>', $birdily_blog_archive_mask );
			$birdily_content            = apply_filters( 'the_content', get_the_content() );
			// Destroy sc parameters from the content of the template
			set_query_var( 'birdily_template_args', false );
			// Display parts of the template
			if ( '' != $birdily_content ) {
				$birdily_pos = strpos( $birdily_content, $birdily_blog_archive_mask );
				if ( false !== $birdily_pos ) {
					$birdily_content = preg_replace( '/(\<p\>\s*)?' . $birdily_blog_archive_mask . '(\s*\<\/p\>)/i', $birdily_blog_archive_subst, $birdily_content );
				} else {
					$birdily_content .= $birdily_blog_archive_subst;
				}
				$birdily_content = explode( $birdily_blog_archive_mask, $birdily_content );
				// Display first part
				birdily_show_layout( apply_filters( 'birdily_filter_blog_archive_start', $birdily_content[0] ) );
				// And store second part
				birdily_storage_set( 'blog_archive_end', $birdily_content[1] );
			}
			wp_reset_postdata();
		}
	}
}

// End blog archive template
if ( ! function_exists( 'birdily_blog_archive_end' ) ) {
	function birdily_blog_archive_end() {
		$html = birdily_storage_get( 'blog_archive_end' );
		if ( '' != $html ) {
			// Display second part of template content
			birdily_show_layout( apply_filters( 'birdily_filter_blog_archive_end', $html ) );
		}
	}
}

// Return name of the archive template for current blog style
if ( ! function_exists( 'birdily_blog_archive_get_template' ) ) {
	function birdily_blog_archive_get_template( $blog_style = '' ) {
		if ( empty( $blog_style ) ) {
			$blog_style = birdily_get_theme_option( 'blog_style' );
		}
		$parts   = explode( '_', $blog_style );
		$archive = '';
		if ( birdily_storage_isset( 'blog_styles', $parts[0], 'archive' ) ) {
			$archive = birdily_storage_get_array( 'blog_styles', $parts[0], 'archive' );
		}
		return $archive;
	}
}

// Return name of the item template for current blog style
if ( ! function_exists( 'birdily_blog_item_get_template' ) ) {
	function birdily_blog_item_get_template( $blog_style = '' ) {
		if ( empty( $blog_style ) ) {
			$blog_style = birdily_get_theme_option( 'blog_style' );
		}
		$parts = explode( '_', $blog_style );
		$item  = '';
		if ( birdily_storage_isset( 'blog_styles', $parts[0], 'item' ) ) {
			$item = birdily_storage_get_array( 'blog_styles', $parts[0], 'item' );
		}
		return $item;
	}
}


// Return ID of the post/page
if ( ! function_exists( 'birdily_get_post_id' ) ) {
	function birdily_get_post_id( $args = array() ) {
		$args  = array_merge(
			array(
				'posts_per_page' => 1,
			), $args
		);
		$id    = 0;
		$query = new WP_Query( $args );
		while ( $query->have_posts() ) {
			$query->the_post();
			$id = get_the_ID();
			break;
		}
		wp_reset_postdata();
		return $id;
	}
}


// Return full content of the post/page
if ( ! function_exists( 'birdily_get_post_content' ) ) {
	function birdily_get_post_content( $apply_filters=false ) {
		global $post;
		return $apply_filters ? apply_filters( 'the_content', $post->post_content ) : $post->post_content;
	}
}

// Return ID for the page with specified template
if ( ! function_exists( 'birdily_get_template_page_id' ) ) {
	function birdily_get_template_page_id( $args = array() ) {
		$args   = array_merge(
			array(
				'template'   => 'blog.php',
				'post_type'  => 'post',
				'parent_cat' => '',
			), $args
		);
		$q_args = array(
			'post_type'      => 'page',
			'post_status'    => 'publish',
			'posts_per_page' => 1,
			'orderby'        => 'id',
			'order'          => 'asc',
			'meta_query'     => array( 'relation' => 'AND' ),
		);
		if ( ! empty( $args['template'] ) ) {
			$q_args['meta_query'][] = array(
				'key'     => '_wp_page_template',
				'value'   => $args['template'],
				'compare' => '=',
			);
		}
		if ( ! empty( $args['post_type'] ) ) {
			$q_args['meta_query'][] = array(
				'key'     => 'birdily_options_post_type',
				'value'   => $args['post_type'],
				'compare' => '=',
			);
		}
		if ( '' !== $args['parent_cat'] ) {
			$q_args['meta_query'][] = array(
				'key'     => 'birdily_options_parent_cat',
				'value'   => $args['parent_cat'] > 0 ? $args['parent_cat'] : 1,
				'compare' => $args['parent_cat'] > 0 ? '=' : '<',
			);
		}
		return birdily_get_post_id( $q_args );
	}
}

// Return link to the page with theme specific $post_type archive template page:
// page_template == blog.php and 'post_type'== $post_type and 'parent_cat' == 0
if ( ! function_exists( 'birdily_get_template_page_link' ) ) {
	
	function birdily_get_template_page_link( $link = '', $post_type = '' ) {
		if ( ! empty( $post_type ) ) {
			$id = birdily_get_template_page_id(
				array(
					'post_type'  => $post_type,
					'parent_cat' => 0,
				)
			);
			if ( (int)$id > 0 ) {
				$link = get_permalink( $id );
			}
		}
		return $link;
	}
}


// Return current site protocol
if ( ! function_exists( 'birdily_get_protocol' ) ) {
	function birdily_get_protocol( $suffix=false ) {
		return ( is_ssl() ? 'https' : 'http' ) . ( ! empty( $suffix ) ? ':' : '' );
	}
}

// Return internal page link - if is customize mode - full url else only hash part
if ( ! function_exists( 'birdily_get_hash_link' ) ) {
	function birdily_get_hash_link( $hash ) {
		if ( 0 !== strpos( $hash, 'http' ) ) {
			if ( '#' != $hash[0] ) {
				$hash = '#' . $hash;
			}
			if ( is_customize_preview() ) {
				$url = birdily_get_current_url();
				$pos = strpos( $url, '#' );
				if ( false !== $pos ) {
					$url = substr( $url, 0, $pos );
				}
				$hash = $url . $hash;
			}
		}
		return $hash;
	}
}

// Return URL to the current page
if ( ! function_exists( 'birdily_get_current_url' ) ) {
	function birdily_get_current_url() {
		return add_query_arg( array() );
	}
}

// Remove macros from the title
if ( ! function_exists( 'birdily_wp_title' ) ) {
	
	
	
	function birdily_wp_title( $title ) {
		if ( is_array( $title ) ) {
			foreach ( $title as $k => $v ) {
				$title[ $k ] = birdily_remove_macros( $v );
			}
		} else {
			$title = birdily_remove_macros( $title );
		}
		return $title;
	}
}

// Return blog title
if ( ! function_exists( 'birdily_get_blog_title' ) ) {
	function birdily_get_blog_title() {

		if ( is_front_page() ) {
			$title = esc_html__( 'Home', 'birdily' );
		} elseif ( is_home() ) {
			$title = esc_html__( 'All Posts', 'birdily' );
		} elseif ( is_author() ) {
			$curauth = ( get_query_var( 'author_name' ) ) ? get_user_by( 'slug', get_query_var( 'author_name' ) ) : get_userdata( get_query_var( 'author' ) );
			// Translators: Add the author's name to the title
			$title = sprintf( esc_html__( 'Author page: %s', 'birdily' ), $curauth->display_name );
		} elseif ( is_404() ) {
			$title = esc_html__( 'URL not found', 'birdily' );
		} elseif ( is_search() ) {
			// Translators: Add the author's name to the title
			$title = sprintf( esc_html__( 'Search: %s', 'birdily' ), get_search_query() );
		} elseif ( is_day() ) {
			// Translators: Add the queried date to the title
			$title = sprintf( esc_html__( 'Daily Archives: %s', 'birdily' ), get_the_date() );
		} elseif ( is_month() ) {
			// Translators: Add the queried month to the title
			$title = sprintf( esc_html__( 'Monthly Archives: %s', 'birdily' ), get_the_date( 'F Y' ) );
		} elseif ( is_year() ) {
			// Translators: Add the queried year to the title
			$title = sprintf( esc_html__( 'Yearly Archives: %s', 'birdily' ), get_the_date( 'Y' ) );
		} elseif ( is_category() ) {
			$title = single_cat_title( '', false );
		} elseif ( is_tag() ) {
			// Translators: Add the tag's name to the title
			$title = sprintf( esc_html__( 'Tag: %s', 'birdily' ), single_tag_title( '', false ) );
		} elseif ( is_tax() ) {
			$title = single_term_title( '', false );
		} elseif ( is_post_type_archive() ) {
			$obj   = get_queried_object();
			$title = ! empty( $obj->labels->all_items ) ? $obj->labels->all_items : '';
		} elseif ( is_attachment() ) {
			// Translators: Add the attachment's name to the title
			$title = sprintf( esc_html__( 'Attachment: %s', 'birdily' ), get_the_title() );
		} elseif ( is_single() || is_page() ) {
			$title = get_the_title();
		} else {
			$title = get_the_title();   
		}
		return apply_filters( 'birdily_filter_get_blog_title', $title );
	}
}

// Return nav menu html
if ( ! function_exists( 'birdily_get_nav_menu' ) ) {
	function birdily_get_nav_menu( $location = '', $menu = '', $depth = 11, $custom_walker = false ) {
		static $list = array();
		$class       = '';
		if ( is_array( $location ) ) {
			$loc      = $location;
			$location = '';
			if ( ! empty( $loc['location'] ) ) {
				$location = $loc['location'];
			}
			if ( ! empty( $loc['class'] ) ) {
				$class = $loc['class'];
			}
		}
		$slug = $location . '_' . $menu;
		if ( empty( $list[ $slug ] ) ) {
			$list[ $slug ] = esc_html__( 'You are trying to use a menu inserted in himself!', 'birdily' );
			$args          = array(
				'menu'            => empty( $menu ) || 'default' == $menu || birdily_is_inherit( $menu ) ? '' : $menu,
				'container'       => 'nav',
				'container_class' => ( ! empty( $location ) ? esc_attr( $location ) : 'menu_main' ) . '_nav_area'
										. ( ! empty( $class ) ? ' ' . esc_attr( $class ) : '' ),
				'container_id'    => '',
				'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				'menu_class'      => 'sc_layouts_menu_nav ' . ( ! empty( $location ) ? esc_attr( $location ) : 'menu_main' ) . '_nav',
				'menu_id'         => ( ! empty( $location ) ? esc_attr( $location ) : 'menu_main' ),
				'echo'            => false,
				'fallback_cb'     => '',
				'before'          => '',
				'after'           => '',
				'link_before'     => '<span>',
				'link_after'      => '</span>',
				'depth'           => $depth,
			);
			if ( ! empty( $location ) ) {
				$args['theme_location'] = $location;
			}
			if ( $custom_walker && class_exists( 'birdily_custom_menu_walker' ) ) {
				$args['walker'] = new birdily_custom_menu_walker;
			}
			// Remove spaces between menu items
			$list[ $slug ] = preg_replace(
				array( "/>[\r\n\s]*<li/", "/>[\r\n\s]*<\\/ul>/" ),
				array( '><li', '></ul>' ),
				wp_nav_menu( apply_filters( 'birdily_filter_get_nav_menu_args', $args ) )
			);
			// Add Structured Data Snippet
			$list[ $slug ] = str_replace( '<nav', '<nav itemscope itemtype="//schema.org/SiteNavigationElement"', $list[ $slug ] );
		}
		return apply_filters( 'birdily_filter_get_nav_menu', $list[ $slug ], $location, $menu );
	}
}

// Return string with categories links
if ( ! function_exists( 'birdily_get_post_categories' ) ) {
	function birdily_get_post_categories( $delimiter = ', ', $id = false, $links = true ) {
		return birdily_get_post_terms( $delimiter, $id, 'category', $links );
	}
}

// Return string with terms links
if ( ! function_exists( 'birdily_get_post_terms' ) ) {
	function birdily_get_post_terms( $delimiter = ', ', $id = false, $taxonomy = 'category', $links = true ) {
		$output = '';
		if ( empty( $id ) ) {
			$id = get_the_ID();
		}
		if ( empty( $taxonomy ) ) {
			$taxonomy = birdily_get_post_type_taxonomy( get_post_type( $id ) );
		}
		$terms = get_the_terms( $id, $taxonomy );
		if ( ! empty( $terms ) && is_array( $terms ) ) {
			$cnt = count( $terms );
			$i   = 0;
			foreach ( $terms as $term ) {
				if ( empty( $term->term_id ) ) {
					continue;
				}
				$i++;
				$output .= ( $links
									? '<a href="' . esc_url( get_term_link( $term->term_id, $taxonomy ) ) . '"'
											// Translators: Add the term's name to the title
											. ' title="' . sprintf( esc_attr__( 'View all posts in %s', 'birdily' ), $term->name ) . '"'
											. '>'
									: '<span>'
								)
								. apply_filters( 'birdily_filter_term_name', $term->name, $term )
								. ( $i < $cnt ? $delimiter : '' )
							. ( $links ? '</a>' : '</span>' );
			}
		}
		return $output;
	}
}

// Return taxonomy for current post type
if ( ! function_exists( 'birdily_get_post_type_taxonomy' ) ) {
	function birdily_get_post_type_taxonomy( $post_type = '' ) {
		if ( empty( $post_type ) ) {
			$post_type = get_post_type();
		}
		if ( 'post' == $post_type ) {
			$tax = 'category';
		} else {
			$taxonomy_names = get_object_taxonomies( $post_type );
			$tax            = ! empty( $taxonomy_names[0] ) ? $taxonomy_names[0] : '';
		}
		return apply_filters( 'birdily_filter_post_type_taxonomy', $tax, $post_type );
	}
}

// Return editing post type or empty string if not edit mode
if ( ! function_exists( 'birdily_get_edited_post_type' ) ) {
	function birdily_get_edited_post_type() {
		$pt = '';
		if ( is_admin() ) {
			$url = birdily_get_current_url();
			if ( strpos( $url, 'post.php' ) !== false ) {
				if ( birdily_get_value_gp( 'action' ) == 'edit' ) {
					$id = birdily_get_value_gp( 'post' );
					if ( 0 < $id ) {
						$post = get_post( (int) $id );
						if ( is_object( $post ) && ! empty( $post->post_type ) ) {
							$pt = $post->post_type;
						}
					}
				}
			} elseif ( strpos( $url, 'post-new.php' ) !== false ) {
				$pt = birdily_get_value_gp( 'post_type' );
			}
		}
		return $pt;
	}
}


/* Query manipulations
-------------------------------------------------------------------------------- */

// Add sorting parameter in query arguments
if ( ! function_exists( 'birdily_query_add_sort_order' ) ) {
	function birdily_query_add_sort_order( $args, $orderby = 'date', $order = 'desc' ) {
		if ( ! empty( $orderby ) && ( empty( $args['orderby'] ) || 'none' != $orderby ) ) {
			$q          = apply_filters( 'birdily_filter_query_sort_order', array(), $orderby, $order );
			$q['order'] = 'asc' == $order ? 'asc' : 'desc';
			if ( empty( $q['orderby'] ) ) {
				if ( 'none' == $orderby ) {
					$q['orderby'] = 'none';
				} elseif ( 'ID' == $orderby ) {
					$q['orderby'] = 'ID';
				} elseif ( 'comments' == $orderby ) {
					$q['orderby'] = 'comment_count';
				} elseif ( 'title' == $orderby || 'alpha' == $orderby ) {
					$q['orderby'] = 'title';
				} elseif ( 'rand' == $orderby || 'random' == $orderby ) {
					$q['orderby'] = 'rand';
				} else {
					$q['orderby'] = 'post_date';
				}
			}
			foreach ( $q as $mk => $mv ) {
				if ( is_array( $args ) ) {
					$args[ $mk ] = $mv;
				} else {
					$args->set( $mk, $mv );
				}
			}
		}
		return $args;
	}
}

// Add post type and posts list or categories list in query arguments
if ( ! function_exists( 'birdily_query_add_posts_and_cats' ) ) {
	function birdily_query_add_posts_and_cats( $args, $ids = '', $post_type = '', $cat = '', $taxonomy = '' ) {
		if ( ! empty( $ids ) ) {
			$args['post_type'] = empty( $args['post_type'] )
									? ( empty( $post_type ) ? array( 'post', 'page' ) : $post_type )
									: $args['post_type'];
			$args['post__in']  = explode( ',', str_replace( ' ', '', $ids ) );
			if ( empty( $args['orderby'] ) || 'none' == $args['orderby'] ) {
				$args['orderby'] = 'post__in';
				if ( isset( $args['order'] ) ) {
					unset( $args['order'] );
				}
			}
		} else {
			$args['post_type'] = empty( $args['post_type'] )
									? ( empty( $post_type ) ? 'post' : $post_type )
									: $args['post_type'];
			$post_type         = is_array( $args['post_type'] ) ? $args['post_type'][0] : $args['post_type'];
			if ( ! empty( $cat ) ) {
				$cats = ! is_array( $cat ) ? explode( ',', $cat ) : $cat;
				if ( empty( $taxonomy ) ) {
					$taxonomy = birdily_get_post_type_taxonomy( $post_type );
				}
				if ( 'category' == $taxonomy ) {              // Add standard categories
					if ( is_array( $cats ) && count( $cats ) > 1 ) {
						$cats_ids = array();
						foreach ( $cats as $c ) {
							$c = trim( $c );
							if ( empty( $c ) ) {
								continue;
							}
							if ( 0 == (int) $c ) {
								$cat_term = get_term_by( 'slug', $c, $taxonomy, OBJECT );
								if ( $cat_term ) {
									$c = $cat_term->term_id;
								}
							}
							if ( 0 == $c ) {
								continue;
							}
							$cats_ids[] = (int) $c;
							$children   = get_categories(
								array(
									'type'         => $post_type,
									'child_of'     => $c,
									'hide_empty'   => 0,
									'hierarchical' => 0,
									'taxonomy'     => $taxonomy,
									'pad_counts'   => false,
								)
							);
							if ( is_array( $children ) && count( $children ) > 0 ) {
								foreach ( $children as $c ) {
									if ( ! in_array( (int) $c->term_id, $cats_ids ) ) {
										$cats_ids[] = (int) $c->term_id;
									}
								}
							}
						}
						if ( count( $cats_ids ) > 0 ) {
							$args['category__in'] = $cats_ids;
						}
					} else {
						if ( 0 < (int) $cat ) {
							$args['cat'] = (int) $cat;
						} else {
							$args['category_name'] = $cat;
						}
					}
				} else {                                    // Add custom taxonomies
					if ( ! isset( $args['tax_query'] ) ) {
						$args['tax_query'] = array();
					}
					$args['tax_query']['relation'] = 'AND';
					$args['tax_query'][]           = array(
						'taxonomy'         => $taxonomy,
						'include_children' => true,
						'field'            => (int) $cats[0] > 0 ? 'id' : 'slug',
						'terms'            => $cats,
					);
				}
			}
		}
		return $args;
	}
}

// Add filters (meta parameters) in query arguments
if ( ! function_exists( 'birdily_query_add_filters' ) ) {
	function birdily_query_add_filters( $args, $filters = false ) {
		if ( ! empty( $filters ) ) {
			if ( ! is_array( $filters ) ) {
				$filters = array( $filters );
			}
			foreach ( $filters as $v ) {
				$found = false;
				if ( 'thumbs' == $v ) {                                                      // Filter with meta_query
					if ( ! isset( $args['meta_query'] ) ) {
						$args['meta_query'] = array();
					} else {
						for ( $i = 0; $i < count( $args['meta_query'] ); $i++ ) {
							if ( $args['meta_query'][ $i ]['meta_filter'] == $v ) {
								$found = true;
								break;
							}
						}
					}
					if ( ! $found ) {
						$args['meta_query']['relation'] = 'AND';
						if ( 'thumbs' == $v ) {
							$args['meta_query'][] = array(
								'meta_filter' => $v,
								'key'         => '_thumbnail_id',
								'value'       => false,
								'compare'     => '!=',
							);
						}
					}
				} elseif ( in_array( $v, array( 'video', 'audio', 'gallery' ) ) ) {          // Filter with tax_query
					if ( ! isset( $args['tax_query'] ) ) {
						$args['tax_query'] = array();
					} else {
						for ( $i = 0; $i < count( $args['tax_query'] ); $i++ ) {
							if ( $args['tax_query'][ $i ]['tax_filter'] == $v ) {
								$found = true;
								break;
							}
						}
					}
					if ( ! $found ) {
						$args['tax_query']['relation'] = 'AND';
						if ( 'video' == $v ) {
							$args['tax_query'][] = array(
								'tax_filter' => $v,
								'taxonomy'   => 'post_format',
								'field'      => 'slug',
								'terms'      => array( 'post-format-video' ),
							);
						} elseif ( 'audio' == $v ) {
							$args['tax_query'] = array(
								'tax_filter' => $v,
								'taxonomy'   => 'post_format',
								'field'      => 'slug',
								'terms'      => array( 'post-format-audio' ),
							);
						} elseif ( 'gallery' == $v ) {
							$args['tax_query'] = array(
								'tax_filter' => $v,
								'taxonomy'   => 'post_format',
								'field'      => 'slug',
								'terms'      => array( 'post-format-gallery' ),
							);
						}
					}
				}
			}
		}
		return $args;
	}
}




/* Widgets utils
------------------------------------------------------------------------------------- */

// Create widgets area
if ( ! function_exists( 'birdily_create_widgets_area' ) ) {
	function birdily_create_widgets_area( $name, $add_classes = '' ) {
		$widgets_name = birdily_get_theme_option( $name );
		if ( ! birdily_is_off( $widgets_name ) && is_active_sidebar( $widgets_name ) ) {
			birdily_storage_set( 'current_sidebar', $name );
			ob_start();
			dynamic_sidebar( $widgets_name );
			$out = trim( ob_get_contents() );
			ob_end_clean();
			if ( ! empty( $out ) ) {
				$out          = preg_replace( "/<\/aside>[\r\n\s]*<aside/", '</aside><aside', $out );
				$need_columns = strpos( $out, 'columns_wrap' ) === false;
				if ( $need_columns ) {
					$columns = apply_filters( 'birdily_filter_widgets_area_columns', min( 4, max( 1, substr_count( $out, '<aside ' ) ) ), $name );
					$out     = preg_replace( '/<aside([^>]*)class="widget/', '<aside$1class="column-1_' . esc_attr( $columns ) . ' widget', $out );
				}
				?>
				<div class="<?php echo esc_attr( $name ); ?> <?php echo esc_attr( $name ); ?>_wrap widget_area">
					<div class="<?php echo esc_attr( $name ); ?>_inner <?php echo esc_attr( $name ); ?>_inner widget_area_inner">
						<?php
						do_action( 'birdily_action_before_sidebar' );
						birdily_show_layout(
							$out,
							true == $need_columns ? '<div class="columns_wrap">' : '',
							true == $need_columns ? '</div>' : ''
						);
						do_action( 'birdily_action_after_sidebar' );
						?>
					</div> <!-- /.widget_area_inner -->
				</div> <!-- /.widget_area -->
				<?php
			}
		}
	}
}

// Check if sidebar present
if ( ! function_exists( 'birdily_sidebar_present' ) ) {
	function birdily_sidebar_present() {
		global $wp_query;
		$sidebar_position = birdily_get_theme_option( 'sidebar_position' );
		$sidebar_name     = birdily_get_theme_option( 'sidebar_widgets' );
		return apply_filters(
			'birdily_filter_sidebar_present',
			! birdily_is_off( $sidebar_position )
					&& ! birdily_is_off( $sidebar_name )
					&& is_active_sidebar( $sidebar_name )
					&& ! is_404()
					&& ( ! is_search() || $wp_query->found_posts > 0 )
					&& ( ! is_single() || birdily_is_off( birdily_get_theme_option( 'hide_sidebar_on_single' ) ) )
		);
	}
}




/* Inline styles and scripts
------------------------------------------------------------------------------------- */

// Add inline styles and return class for it
if ( ! function_exists( 'birdily_add_inline_css_class' ) ) {
	function birdily_add_inline_css_class( $css, $suffix = '' ) {
		$class_name = sprintf( 'birdily_inline_%d', mt_rand() );
		birdily_add_inline_css( sprintf( '.%s%s{%s}', $class_name, ! empty( $suffix ) ? ( substr( $suffix, 0, 1 ) != ':' ? ' ' : '' ) . esc_attr( $suffix ) : '', $css ) );
		return $class_name;
	}
}

// Add inline styles
if ( ! function_exists( 'birdily_add_inline_css' ) ) {
	function birdily_add_inline_css( $css ) {
		if ( function_exists( 'trx_addons_add_inline_css' ) ) {
			trx_addons_add_inline_css( $css );
		} else {
			birdily_storage_concat( 'inline_styles', $css );
		}
	}
}

// Return inline styles
if ( ! function_exists( 'birdily_get_inline_css' ) ) {
	function birdily_get_inline_css() {
		return birdily_storage_get( 'inline_styles' );
	}
}



if ( ! function_exists( 'birdily_get_date' ) ) {
	function birdily_get_date( $dt = '', $format = '' ) {
		if ( '' == $dt ) {
		$dt = get_the_time( 'U' );
		}
		if ( date( 'U' ) - $dt > intval( birdily_get_theme_option( 'time_diff_before' ) ) * 24 * 3600 ) {
		$dt = date_i18n( '' == $format ? get_option( 'date_format' ) : $format, $dt );
		} else {
		// Translators: Add the human-friendly date difference
		$dt = sprintf( esc_html__( '%s ago', 'birdily' ), human_time_diff( $dt, current_time( 'timestamp' ) ) );
		}
	return $dt;
	}
}

/* wp_kses handlers
----------------------------------------------------------------------------------------------------- */
if ( ! function_exists( 'birdily_kses_allowed_html' ) ) {
	add_filter( 'wp_kses_allowed_html', 'birdily_kses_allowed_html', 10, 2);
	function birdily_kses_allowed_html($tags, $context) {
		if ( in_array( $context, array( 'birdily_kses_content', 'trx_addons_kses_content' ) ) ) {
			$tags = array(
				'h1'     => array( 'id' => array(), 'class' => array(), 'title' => array(), 'align' => array() ),
				'h2'     => array( 'id' => array(), 'class' => array(), 'title' => array(), 'align' => array() ),
				'h3'     => array( 'id' => array(), 'class' => array(), 'title' => array(), 'align' => array() ),
				'h4'     => array( 'id' => array(), 'class' => array(), 'title' => array(), 'align' => array() ),
				'h5'     => array( 'id' => array(), 'class' => array(), 'title' => array(), 'align' => array() ),
				'h6'     => array( 'id' => array(), 'class' => array(), 'title' => array(), 'align' => array() ),
				'p'      => array( 'id' => array(), 'class' => array(), 'title' => array(), 'align' => array() ),
				'span'   => array( 'id' => array(), 'class' => array(), 'title' => array() ),
				'div'    => array( 'id' => array(), 'class' => array(), 'title' => array(), 'align' => array() ),
				'a'      => array( 'id' => array(), 'class' => array(), 'title' => array(), 'href' => array(), 'target' => array(), 'rel' => array() ),
				'b'      => array( 'id' => array(), 'class' => array(), 'title' => array() ),
				'sub'    => array( 'id' => array(), 'class' => array(), 'title' => array() ),
				'sup'    => array( 'id' => array(), 'class' => array(), 'title' => array() ),
				'i'      => array( 'id' => array(), 'class' => array(), 'title' => array() ),
				'em'     => array( 'id' => array(), 'class' => array(), 'title' => array() ),
				'strong' => array( 'id' => array(), 'class' => array(), 'title' => array() ),
				'img'    => array( 'id' => array(), 'class' => array(), 'src' => array(), 'width' => array(), 'height' => array(), 'alt' => array() ),
				'br'     => array( 'clear' => array() ),
			);
		}
		return $tags;
	}
}


/* Structured Data
----------------------------------------------------------------------------------------------------- */

// Return markup schema
if ( ! function_exists( 'birdily_get_markup_schema' ) ) {
	function birdily_get_markup_schema() {
		if ( is_single() ) {                                        // Is single post
			$type = 'Article';
		} elseif ( is_home() || is_archive() || is_category() ) {    // Is blog home, archive or category
			$type = 'Blog';
		} elseif ( is_front_page() ) {                                // Is static front page
			$type = 'Website';
		} else { // Is a general page
			$type = 'WebPage';
		}
		return $type;
	}
}


// Return text for the Privacy Policy checkbox
if ( ! function_exists('birdily_get_privacy_text' ) ) {
	function birdily_get_privacy_text() {
		$page = get_option( 'wp_page_for_privacy_policy' );
		$privacy_text = birdily_get_theme_option( 'privacy_text' );
		return apply_filters(
		    'birdily_filter_privacy_text',
            wp_kses(
			$privacy_text
			. ( ! empty( $page ) && ! empty( $privacy_text )
				// Translators: Add url to the Privacy Policy page
				? ' ' . sprintf( __( 'See our %s', 'birdily' ),
						'<a href="' . esc_url( get_permalink( $page ) ) . '" target="_blank">'
							. __( 'Privacy Policy', 'birdily' )
						. '</a>' )
				: ''
				),
            'birdily_kses_content'
			)
		);
	}
}