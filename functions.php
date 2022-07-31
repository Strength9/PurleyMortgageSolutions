<?php

define( 'xray_VERSION', 1.0 ); // Define the version so we can easily replace it throughout the theme

$SiteName = 'Site';
$settingslink = 'site-settings';
/*-----------------------------------------------------------------------------------*/
/* Remove the auto p tag removal
/*-----------------------------------------------------------------------------------*/

remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );


/*-----------------------------------------------------------------------------------*/
/* Set Theme Supports
/*-----------------------------------------------------------------------------------*/
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'menus' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'editor-styles' ); 
	add_editor_style( 'style-editor.css' );

	// Woocomerce Support For the image gallerys and sliders
	add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );

	function xray_add_woocommerce_support() {
		add_theme_support( 'woocommerce' );
	}
	add_action( 'after_setup_theme', 'xray_add_woocommerce_support' );  

if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
}

//* Add new image size
add_image_size( 'category-thumb', 313, 380, true );

function post_image_sizes($sizes){
	$custom_sizes = array(
		'category-thumb' => 'Category Thumb'
	);
	return array_merge( $sizes, $custom_sizes );
}
add_filter('image_size_names_choose', 'post_image_sizes');


/*-----------------------------------------------------------------------------------*/
/* WordPress Clean Ups
/*-----------------------------------------------------------------------------------*/
		function website_remove_version() { return ''; }

		remove_action('wp_head', 'rest_output_link_wp_head', 10);
		remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
		remove_action('template_redirect', 'rest_output_link_header', 11, 0);
		remove_action ('wp_head', 'rsd_link');
		remove_action( 'wp_head', 'wlwmanifest_link');
		remove_action( 'wp_head', 'wp_shortlink_wp_head');

		add_filter('the_generator', 'website_remove_version');
		add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
		add_filter( 'rank_math/frontend/remove_credit_notice', '__return_true' );
		add_filter( 'script_loader_src', 'website_cleanup_query_string', 15, 1 ); 
		add_filter( 'style_loader_src', 'website_cleanup_query_string', 15, 1 );

		function website_cleanup_query_string( $src ){ 
			$parts = explode( '?', $src ); 
			return $parts[0]; 
		}  
		function remove_jquery_migrate($scripts)
		{
			if (!is_admin() && isset($scripts->registered['jquery'])) {
				$script = $scripts->registered['jquery'];
				
				if ($script->deps) { // Check whether the script has any dependencies
					$script->deps = array_diff($script->deps, array(
						'jquery-migrate'
					));
				}
			}
		}
		add_action('wp_default_scripts', 'remove_jquery_migrate');

		function disable_emojis() {
			remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
			remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
			remove_action( 'wp_print_styles', 'print_emoji_styles' );
			remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
			remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
			remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
			remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
			add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
			add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
		}
		add_action( 'init', 'disable_emojis' );
		
		function disable_emojis_tinymce( $plugins ) {
			if ( is_array( $plugins ) ) {
			return array_diff( $plugins, array( 'wpemoji' ) );
			} else {
			return array();
			}
		}
		
		function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
			if ( 'dns-prefetch' == $relation_type ) {
			$emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
		
		$urls = array_diff( $urls, array( $emoji_svg_url ) );
			}
		
		return $urls;
		}
		
		
		remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
		remove_action( 'wp_footer', 'wp_enqueue_global_styles', 1 );
		

		
/*-----------------------------------------------------------------------------------*/
/* Menu Registration and Tidy Up
/*-----------------------------------------------------------------------------------*/
	register_nav_menus( array( 'primary'	=>	__( 'Primary Menu', 'xray' ), ));


	function wp_nav_menu_remove($var) {
		return is_array($var) ? array_intersect($var, array('current-menu-item','menu-item-has-children','current-menu-parent')) : '';
	}
	add_filter('page_css_class', 'wp_nav_menu_remove', 100, 1);
	add_filter('nav_menu_item_id', 'wp_nav_menu_remove', 100, 1);
	add_filter('nav_menu_css_class', 'wp_nav_menu_remove', 100, 1);

/*-----------------------------------------------------------------------------------*/
/* Enqueue Styles and Scripts
/*-----------------------------------------------------------------------------------*/
	function xray_scripts()  { 
		// get the theme directory style.css and link to it in the header
		wp_enqueue_style('custom_font', '//use.typekit.net/rir5arn.css');
		wp_enqueue_style('style.css', get_stylesheet_directory_uri() . '/style.css?v='.rand(111,999));
		
		wp_enqueue_script( 'jquery-core' );
		
		wp_enqueue_script( 'xray', get_template_directory_uri() . '/assets/js/script.js','','',true);
		wp_enqueue_script( 'xray', get_template_directory_uri() . '/assets/js/slider.js','','',true);
		


		wp_dequeue_style( 'wp-block-library' );
		wp_dequeue_style('hoverIntent');
	}
	add_action( 'wp_enqueue_scripts', 'xray_scripts' ); 

	
	remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
	remove_action( 'wp_footer', 'wp_enqueue_global_styles', 1 );


/*-----------------------------------------------------------------------------------*/
/* Add Custom Theme Section (For Use With ACF)
/*-----------------------------------------------------------------------------------*/
if( function_exists('acf_add_options_page') ) {
		acf_add_options_page(array(
			'page_title' 	=> $SiteName.' General Settings',
			'menu_title'	=> $SiteName.' Settings',
			'menu_slug' 	=> $settingslink,
			'capability'	=> 'edit_posts',
			'position'      => 1,
			'redirect'		=> false
		));	
};




/*-----------------------------------------------------------------------------------*/
/* Woocom Extra Categories
/*-----------------------------------------------------------------------------------*/




/*-----------------------------------------------------------------------------------*/
/* Add Custom Blocks
/*-----------------------------------------------------------------------------------*/

/* Custom block category's */
add_action('acf/init', 'xray_customblocks');
function xray_customblocks() {
	  // Get an array of theme PHP templates
	  $theme = wp_get_theme();
	  $files = $theme->get_files('php', 2, false);
	
	  // Iterate over and ignore non-block templates
	  foreach ($files as $filename => $filepath) {
		if (preg_match('#^template-parts/(block|container)s?/#', $filename, $matches) !== 1) {
		  continue;
		}
		// Read the PHP comment meta data for the block
		$meta = get_file_data($filepath, array(
		  'name'        => 'Block Name',
		  'description' => 'Block Description',
		  'post_types'  => 'Post Types',
		  'mode'        => 'Block Mode',
		  'svg' 		=> 'Block SVG',
		  'category' 	=> 'Block Category'
		));
		// Skip template if a name is not provided
		if (empty($meta['name'])) {
		  continue;
		}
		// Convert the post types to an array (or use defaults)
		$post_types = array_filter(
		  array_map('trim', explode(',', $meta['post_types']))
		);
		if (empty($post_types)) {
		  $post_types = array('page', 'post');
		}
		// Register the ACF block using the meta data
		acf_register_block_type(array(
		  'name'              => "{$matches[1]}_" . sanitize_title($meta['name']),
		  'title'             => $meta['name'],
		  'description'       => $meta['description'],
		  'post_types'        => $post_types,
		  'render_template'   => $filepath,
		  'category'          => $meta['category'], 
		  'icon'            => file_get_contents(get_template_directory().'/template-parts/svg-icons/'.$meta['svg'] ),
		  'supports'		=> [
			  		'mode'				=> true,
			  		'align'				=> false,
			  		'anchor'			=> true,
			  		'customClassName'	=> true,
					'jsx' => true,
		  ],
		  'example'  => array(
			  'attributes' => array(
				  'mode' => 'preview',
				  'data' => ['_is_preview' => true],
			  )
		  ),
		));
	  }
	}

function example_block_category( $categories, $post ) {
		return array_merge(
			$categories,
			array(
				array(
					'slug' => 's9blocks',
					'title' => 'Strength 9',
				),
			/*	array(
					'slug' => 'wcpauto',
					'title' => 'Wellington AutoFill',
				), */
			)
		);
	}
	add_filter( 'block_categories_all', 'example_block_category', 10, 2);


function xray_block_scripts()  { 
	// get the theme directory style.css and link to it in the header
	wp_enqueue_script( 'xray-2', get_template_directory_uri() . '/assets/js/slider.js');
}
add_action( 'wp_enqueue_scripts', 'xray_block_scripts' ); 


function random_str(
	int $length = 64,
	string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'): string {
	if ($length < 1) {
		throw new \RangeException("Length must be a positive integer");
	}
	$pieces = [];
	$max = mb_strlen($keyspace, '8bit') - 1;
	for ($i = 0; $i < $length; ++$i) {
		$pieces []= $keyspace[random_int(0, $max)];
	}
	return implode('', $pieces);
};

function cptui_register_my_cpts() {

	/**
	 * Post Type: Custom Post.
		 
		 Search and Replace  Custom Post
	 */

	$labels = [
		"name" => __( "Custom Post", "xray" ),
		"singular_name" => __( "Custom Post", "xray" ),
		"menu_name" => __( "Custom Post", "xray" ),
		"all_items" => __( "All Custom Post", "xray" ),
		"add_new" => __( "Add new", "xray" ),
		"add_new_item" => __( "Add new Custom Post", "xray" ),
		"edit_item" => __( "Edit Custom Post", "xray" ),
		"new_item" => __( "New Custom Post", "xray" ),
		"view_item" => __( "View Custom Post", "xray" ),
		"view_items" => __( "View Custom Post", "xray" ),
		"search_items" => __( "Search Custom Post", "xray" ),
		"not_found" => __( "No Custom Post found", "xray" ),
		"not_found_in_trash" => __( "No Custom Post found in trash", "xray" ),
		"parent" => __( "Parent Custom Post:", "xray" ),
		"featured_image" => __( "Featured image for this Custom Post", "xray" ),
		"set_featured_image" => __( "Set featured image for this Custom Post", "xray" ),
		"remove_featured_image" => __( "Remove featured image for this Custom Post", "xray" ),
		"use_featured_image" => __( "Use as featured image for this Custom Post", "xray" ),
		"archives" => __( "Custom Post archives", "xray" ),
		"insert_into_item" => __( "Insert into Custom Post", "xray" ),
		"uploaded_to_this_item" => __( "Upload to this Custom Post", "xray" ),
		"filter_items_list" => __( "Filter Custom Post list", "xray" ),
		"items_list_navigation" => __( "Custom Post list navigation", "xray" ),
		"items_list" => __( "Custom Post list", "xray" ),
		"attributes" => __( "Custom Post attributes", "xray" ),
		"name_admin_bar" => __( "Custom Post", "xray" ),
		"item_published" => __( "Custom Post published", "xray" ),
		"item_published_privately" => __( "Custom Post published privately.", "xray" ),
		"item_reverted_to_draft" => __( "Custom Post reverted to draft.", "xray" ),
		"item_scheduled" => __( "Custom Post scheduled", "xray" ),
		"item_updated" => __( "Custom Post updated.", "xray" ),
		"parent_item_colon" => __( "Parent Custom Post:", "xray" ),
	];

	$args = [
		"label" => __( "Custom Post", "xray" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "page",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "park_chatter", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail" ],
		"show_in_graphql" => false,
		"menu_position" => 3,
	];

	register_post_type( "park_chatter", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );

add_action('admin_menu', 'remove_posts_menu');
function remove_posts_menu() 
{
	remove_menu_page('edit.php');
}





