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

    <h1>taxonomy-product-cat.php</h1>
	
	<?php
		if ( function_exists('yoast_breadcrumb') ) {
		yoast_breadcrumb( '<div id="breadcrumbs" class="my-8">','</div>' );
		}
	?>

<?php $current_term_ID = get_queried_object_id();?>

    <?php if (in_array($current_term_ID, [48,49])) : ?>

        <p>It's WAM or SOS</p>

        <div class="grid grid-cols-[1fr_3fr]">

            <?php
                $args = array(
                    'taxonomy'	=> 'product_cat',
                    'hide_empty' => false,
                    'child_of'   => $current_term_ID,
                );
                $child_categories = get_terms( $args );
            ?>

            <ul>

                <?php foreach ($child_categories as $cat) : ?> 
                    <li>
                        <a href="<?php echo esc_url(get_term_link($cat));?>" class="bg-gray-500 text-white hover:bg-gray-400"><?php echo $cat->name;?></a>
                    </li>
                <?php endforeach;?>

            </ul>
            <div>

            <?php

            if ( wc_get_loop_prop( 'total' ) ) {
                while ( have_posts() ) {
                    the_post();

                    /**
                     * Hook: woocommerce_shop_loop.
                     */
                    //do_action( 'woocommerce_shop_loop' );

                    wc_get_template_part( 'content', 'single-product' );
                }
            }

            ?>
                    
            </div>

        </div>

    <?php elseif ( woocommerce_product_loop() ) : ?>

    <div class="products grid grid-cols-4 gap-4">
        <?php

            if ( wc_get_loop_prop( 'total' ) ) {
                while ( have_posts() ) {
                    the_post();
        
                    /**
                     * Hook: woocommerce_shop_loop.
                     */
                    //do_action( 'woocommerce_shop_loop' );
        
                    wc_get_template_part( 'content', 'product' );
                }
            }
        ?>
    </div>

    <?php else : ?>

        <?php do_action( 'woocommerce_no_products_found' ); ?>

    <?php endif;?>

</div>

<?php 

get_footer( 'shop' );