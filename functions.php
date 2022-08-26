<?php

/**
 * Theme setup.
 */
function tailpress_setup() {
	add_theme_support( 'title-tag' );

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'tailpress' ),
		)
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

    add_theme_support( 'custom-logo' );
	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );

	add_theme_support( 'editor-styles' );
	add_editor_style( 'css/editor-style.css' );
}

add_action( 'after_setup_theme', 'tailpress_setup' );

/**
 * Enqueue theme assets.
 */
function tailpress_enqueue_scripts() {
	$theme = wp_get_theme();

	wp_enqueue_style( 'tailpress', tailpress_asset( 'css/app.css' ), array(), $theme->get( 'Version' ) );
	wp_enqueue_script( 'tailpress', tailpress_asset( 'js/app.js' ), array(), $theme->get( 'Version' ) );
}

add_action( 'wp_enqueue_scripts', 'tailpress_enqueue_scripts' );

/**
 * Get asset path.
 *
 * @param string  $path Path to asset.
 *
 * @return string
 */
function tailpress_asset( $path ) {
	if ( wp_get_environment_type() === 'production' ) {
		return get_stylesheet_directory_uri() . '/' . $path;
	}

	return add_query_arg( 'time', time(),  get_stylesheet_directory_uri() . '/' . $path );
}

/**
 * Adds option 'li_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The curren item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function tailpress_nav_menu_add_li_class( $classes, $item, $args, $depth ) {
	if ( isset( $args->li_class ) ) {
		$classes[] = $args->li_class;
	}

	if ( isset( $args->{"li_class_$depth"} ) ) {
		$classes[] = $args->{"li_class_$depth"};
	}

	return $classes;
}

add_filter( 'nav_menu_css_class', 'tailpress_nav_menu_add_li_class', 10, 4 );

/**
 * Adds option 'submenu_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The curren item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function tailpress_nav_menu_add_submenu_class( $classes, $args, $depth ) {
	if ( isset( $args->submenu_class ) ) {
		$classes[] = $args->submenu_class;
	}

	if ( isset( $args->{"submenu_class_$depth"} ) ) {
		$classes[] = $args->{"submenu_class_$depth"};
	}

	return $classes;
}

add_filter( 'nav_menu_submenu_css_class', 'tailpress_nav_menu_add_submenu_class', 10, 3 );

/** Add Woocommerce support **/
function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

/** Custom Image Sizes **/
add_image_size('banner-1440x600', 1440, 600, true);
add_image_size('banner-1440x800', 1440, 800, true);

/*function add_image_sizes() {
    add_image_size('banner-1440x600', 1440, 600);
	add_image_size('banner-1440x800', 1440, 800);
}
add_action('after_setup_theme', 'add_image_sizes');*/

add_filter('tutor_courses_base_slug', 'change_tutor_course_slug');
/**
 * @param $slug
 * @return string
 */
if ( ! function_exists('change_tutor_course_slug')){
    function change_tutor_course_slug($slug){
        $slug = 'curriculum';
        return $slug;
    }
}

/*add_filter( 'wpseo_breadcrumb_links', 'yoast_seo_breadcrumb_append_link' );

function yoast_seo_breadcrumb_append_link( $links ) {
    global $post;

    if ( is_singular ('course') || is_archive() ) {
        $breadcrumb[] = array(
            'url' => site_url( '/curriculum/' ),
            'text' => 'Curriculum',
        );

        array_splice( $links, 1, -2, $breadcrumb );
    }

    return $links;
}*/

//remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
//remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
//remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

add_post_type_support( 'page', 'excerpt' );

add_filter( 'wpcf7_autop_or_not', '__return_false' );

// Our custom post type function
function create_posttype() {
  
    register_post_type( 'team-members',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Team Members' ),
                'singular_name' => __( 'Team Member' ),
				'add_new_item' => __( 'Add New Team Member'),
            ),
            'public' => true,
            'has_archive' => true,
			'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );

//Pull Product Data on Course
add_filter( 'the_content', 'codemode__show_linked_product' ); 
function codemode__show_linked_product( $content ){

    global $post; 

    $post_id = $post->ID; 

    $data = "";

    if( is_single( $post ) ){
        if( get_post_type( $post ) == 'courses' ){
            // get the linked product here
            $has_product_id = get_post_meta( $post_id, '_tutor_course_product_id', true );
            $product_id = get_post_meta( $post_id, '_tutor_course_product_id' );

            if( $has_product_id ){
                $product = wc_get_product( $product_id[0] );
                $short_description = $product->get_short_description();
                $permalink = get_permalink( $product->get_id() );
                $price = $product->get_price();
                $image_url = get_the_post_thumbnail_url( $product_id[0] );
                $name = $product->get_name();

                $data = "
                <style>
                    .flex-horiz{
                        display: flex;           /* establish flex sys-container */
                        flex-direction: column;  /* make main axis vertical */
                        align-items: center;     /* center items horizontally, in this case */
                    }

                    .product-item{
                        padding: 7px 5px;
                        text-align: center;
                    }

                    .codemode-linked-product{
                        padding: 15px;
                    }
                </style>

                <div class='codemode-linked-product flex-horiz'>
                    <center><h4>The Linked Product</h4></center>
                    <div style='max-width: 300px; height: auto; border: 1px solid #E1E1E1; pading: 10px; border-radius: 5px;'>
                        <center><img src='$image_url' style='max-height: 250px;' /></center>
                        <div class='product-item product-name'>$name</div>
                        <div class='product-item product-price'>Price: $price</div>
                        <div class='product-item product-short-descriptioin'>$short_description</div>
                        <div class='product-item product-permalink'><center><a href='$permalink' class='gradiant gradiant-hover btn'>View</a></center></div>
                    </dikv>
                </div>";
            }
        }
    }


    return $content.$data; 
}


function exclude_product_cat_children($wp_query) {
    if ( is_product_category() ) {
        //if ( isset ( $wp_query->query_vars['product_cat'] ) && $wp_query->is_main_query()) {
        if ( isset ( $wp_query->query_vars['product_cat'] ) && $wp_query->is_main_query()) {
            $wp_query->set('tax_query', array(
                array (
                    'taxonomy' => 'product_cat',
                    'field' => 'slug',
                    'terms' => $wp_query->query_vars['product_cat'],
                    'include_children' => false
                )
            ) );
        }
    } 
}
    
add_filter('pre_get_posts', 'exclude_product_cat_children', PHP_INT_MAX );
