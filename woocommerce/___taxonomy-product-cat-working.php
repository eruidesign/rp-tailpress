<?php
/**
 * The Template for displaying products in a product category. Simply includes the archive template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/taxonomy-product-cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     4.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header( 'shop' );

?>

<div class="container my-8 mx-auto">
	
	<?php
		if ( function_exists('yoast_breadcrumb') ) {
		yoast_breadcrumb( '<div id="breadcrumbs" class="my-8">','</div>' );
		}
	?>

    <?php 
        $current_term = get_queried_object();
        $current_term_ID = $current_term->term_id;
        $current_term_slug = $current_term->slug;
        $parent_term_ID = $current_term->parent;
        $parent_term_slug = '';
        
        if($parent_term_ID){
            $parent_term_slug = get_term( $parent_term_ID )->slug;
            echo 'Parent Category: '.$parent_term_slug;
        }

    ?>

    <?php if (in_array($current_term_slug, ['wam','sos'])) : ?>

        <?php
            $args = array(
                'taxonomy'	=> 'product_cat',
                'hide_empty' => false,
                'child_of'   => $current_term_ID,
            );
            $child_categories = get_terms( $args );
        ?>

        <div class="container mx-auto min-h-[600px] grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">

            <?php foreach ($child_categories as $cat) : ?> 
    
                <div class="overflow-hidden rounded-lg bg-gray-100 flex flex-col">
                    <div class="text-center flex-grow">
                        <?php
                            $thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
                            $image = wp_get_attachment_image_url( $thumbnail_id, 'woocommerce_thumbnail' );
                        ?>
                        <?php if ( $image ) : ?>
                            <img src="<?php echo $image;?>" alt="<?php echo $cat->name;?>" class="w-full"/>
                        <?php else : ?>
                            <div class="w-[100%] aspect-square bg-slate-400"></div>
                        <?php endif;?>
                        <h3 class="my-4 text-xl"><?php echo $cat->name;?></h3>
                        <div class="text-gray-400"><?php echo $cat->description;?></div>
                    </div>
                    <div class="p-4 flex">
                        <a href="<?php echo esc_url(get_term_link($cat));?>" class="grow bg-gray-500 text-white text-center rounded p-2 justify-self-end hover:bg-gray-400"><?php echo $cat->name;?><span> →</span></a>
                    </div>
                </div>
            <?php endforeach;?>

        </div>

    <?php //elseif ( woocommerce_product_loop() ) : ?>
    <?php elseif (in_array($parent_term_slug, ['wamx','sosx'])) : ?>

    <div class="grid grid-cols-[1fr_4fr]">

        <div>
            <h3 class="text-xl text-bold">Song Sets</h3>
            <?php
                $args = array(
                    'taxonomy'	=> 'product_cat',
                    'hide_empty' => false,
                    'child_of'   => $parent_term_ID,
                );
                $sibling_categories = get_terms( $args );
            ?>
            <ul>
                <?php foreach ($sibling_categories as $cat) : ?> 
                    <li>
                        <a href="<?php echo esc_url(get_term_link($cat));?>" class="text-rpgreen-900"><?php echo $cat->name;?><span> →</span></a>
                    </li>
                <?php endforeach;?>
            </ul>
        </div>

        <div>

        <?php
        /*
        if(!function_exists('wc_get_products')) {
            return;
        }

        $paged                   = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
        $ordering                = WC()->query->get_catalog_ordering_args();
        $ordering['orderby']     = array_shift(explode(' ', $ordering['orderby']));
        $ordering['orderby']     = stristr($ordering['orderby'], 'price') ? 'meta_value_num' : $ordering['orderby'];
        //$products_per_page       = apply_filters('loop_shop_per_page', wc_get_default_products_per_row() * wc_get_default_product_rows_per_page());

        $featured_products       = wc_get_products(array(
            'meta_key'             => '_price',
            'status'               => 'publish',
            'limit'                => 1,
            'page'                 => $paged,
            'featured'             => true,
            'paginate'             => true,
            'return'               => 'ids',
            'orderby'              => $ordering['orderby'],
            'order'                => $ordering['order'],
        ));

        wc_set_loop_prop('current_page', $paged);
        wc_set_loop_prop('is_paginated', wc_string_to_bool(true));
        wc_set_loop_prop('page_template', get_page_template_slug());
        wc_set_loop_prop('per_page', 1);
        wc_set_loop_prop('total', $featured_products->total);
        wc_set_loop_prop('total_pages', $featured_products->max_num_pages);

        if($featured_products) {
            do_action('woocommerce_before_shop_loop');
            woocommerce_product_loop_start();
            foreach($featured_products->products as $featured_product) {
                $post_object = get_post($featured_product);
                setup_postdata($GLOBALS['post'] =& $post_object);
                wc_get_template_part('content', 'single-bundle');
            }
            wp_reset_postdata();
            woocommerce_product_loop_end();
            do_action('woocommerce_after_shop_loop');
        } else {
            do_action('woocommerce_no_products_found');
        }
        */



        if ( woocommerce_product_loop() ) {

            /**
             * Hook: woocommerce_before_shop_loop.
             *
             * @hooked woocommerce_output_all_notices - 10
             * @hooked woocommerce_result_count - 20
             * @hooked woocommerce_catalog_ordering - 30
             */
            do_action( 'woocommerce_before_shop_loop' );
        
            woocommerce_product_loop_start();
        
            if ( wc_get_loop_prop( 'total' ) ) {
                while ( have_posts() ) {
                    the_post();
        
                    /**
                     * Hook: woocommerce_shop_loop.
                     */
                    do_action( 'woocommerce_shop_loop' );
        
                    wc_get_template_part( 'content', 'single-product' );
                }
            }
        
            woocommerce_product_loop_end();

        }

        ?>



    </div>

    <?php else : ?>

        <div class="grid grid-cols-[1fr_4fr]">

            <div>
                <h3 class="text-xl text-bold">Song Sets</h3>
                <?php
                    $args = array(
                        'taxonomy'	=> 'product_cat',
                        'hide_empty' => false,
                        'child_of'   => $parent_term_ID,
                    );
                    $sibling_categories = get_terms( $args );
                ?>
                <ul>
                    <?php foreach ($sibling_categories as $cat) : ?> 
                        <li>
                            <a href="<?php echo esc_url(get_term_link($cat));?>" class="text-rpgreen-900"><?php echo $cat->name;?><span> →</span></a>
                        </li>
                    <?php endforeach;?>
                </ul>
            </div>

            <div class="products woocommerce">

                <?php

                    if ( woocommerce_product_loop() ) {

                        woocommerce_product_loop_start();

                        if ( wc_get_loop_prop( 'total' ) ) {
                            while ( have_posts() ) {
                                the_post();

                                /**
                                 * Hook: woocommerce_shop_loop.
                                 */
                                do_action( 'woocommerce_shop_loop' );

                                wc_get_template_part( 'content', 'single-bundle' );

                                the_content();
                            }
                        }
                        woocommerce_product_loop_end();
                    }

                ?>
            </div>

        </div>

    <?php endif;?>

</div>

<?php 

get_footer( 'shop' );