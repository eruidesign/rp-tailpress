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

        <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">

            <?php foreach ($child_categories as $cat) : ?> 
    
                <div class="overflow-hidden rounded-lg bg-white border border-stone-100 flex flex-col">
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
                        <!--<div class="text-gray-400"><?php echo $cat->description;?></div>-->
                    </div>
                    <div class="p-4 flex">
                        <a href="<?php echo esc_url(get_term_link($cat));?>" class="grow bg-rpgreen-900 text-white text-center no-underline rounded p-2 justify-self-end hover:bg-rpgreen-500 transition-all">Discover <?php echo $cat->name;?> Songs<span> →</span></a>
                    </div>
                </div>
            <?php endforeach;?>

        </div>

    <?php elseif (in_array($parent_term_slug, ['wam','sos'])) : ?>

    <div class="grid grid-cols-[1fr_5fr] gap-8">

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
                        <a href="<?php echo esc_url(get_term_link($cat));?>" class="text-rpgreen-900 hover:pl-4 transition-all hover:text-rpgreen-500"><?php echo $cat->name;?><span> →</span></a>
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

                                do_action( 'woocommerce_shop_loop' );

                                wc_get_template_part( 'content', 'single-bundle' );

                                //the_content();
                            }
                        }
                        woocommerce_product_loop_end();
                    }

                ?>

            </div>


    </div>

    <?php else : ?>

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

    <?php endif;?>

</div>

<?php 

get_footer( 'shop' );