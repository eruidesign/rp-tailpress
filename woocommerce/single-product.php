<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

<div class="container my-8 mx-auto">

	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		//do_action( 'woocommerce_before_main_content' );
	?>

    <?php
		if ( function_exists('yoast_breadcrumb') ) {
		yoast_breadcrumb( '<div id="breadcrumbs" class="my-8">','</div>' );
		}
	?>

		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>

            <?php
                $terms = get_the_terms( get_the_ID(), 'product_cat' );
                //echo $terms[0]->slug;
            ?>

            <?php if($terms[0]->slug == 'seasons') : ?>
                <div id="product-<?php the_ID(); ?>" class="md:grid md:grid-cols-[1fr_5fr] gap-8">
                    <div>
                    <h3 class="text-xl text-bold">Song Sets</h3>
                            <?php
                                $args = array(
                                    'taxonomy'	=> 'product_cat',
                                    'hide_empty' => false,
                                    'child_of'   => $terms[0]->parent,
                                );
                                $sibling_categories = get_terms( $args );
                            ?>

                            <ul>
                                <?php foreach ($sibling_categories as $cat) : ?> 
                                    <li>
                                        <a href="<?php echo esc_url(get_term_link($cat));?>" class="text-rpgreen-900 hover:pl-4"><?php echo $cat->name;?><span> →</span></a>
                                    </li>
                                <?php endforeach;?>
                            </ul>
                    </div>
                    <div>
                        <?php wc_get_template_part( 'content', 'single-product' ); ?>
                    </div>
                </div>

            <?php else : ?>

			<?php wc_get_template_part( 'content', 'single-product' ); ?>

            <?php endif;?>

		<?php endwhile; // end of the loop. ?>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		//do_action( 'woocommerce_after_main_content' );
	?>

	<?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		//do_action( 'woocommerce_sidebar' );
	?>
</div>

<?php
get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
