<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */

$shop_page_ID = get_option( 'woocommerce_shop_page_id' );
$shop_page = get_post($shop_page_ID);

?>
<section class="hero min-h-[600px]" style="background-image: url(<?php echo get_the_post_thumbnail_url($shop_page_ID,'banner-1440x600');?>);">
    <div class="hero-overlay bg-opacity-60"></div>
    <div class="container mx-auto py-10 hero-content text-neutral-content">
        <div class="max-w-md">
        	<h1 class="mb-5 text-5xl font-bold"><?php echo $shop_page->post_title;?></h1>
       		<p class="mb-5"><?php echo $shop_page->post_excerpt;?></p>
        </div>
    </div>
</section>

<div class="container my-8 mx-auto">
	
	<?php
		if ( function_exists('yoast_breadcrumb') ) {
		yoast_breadcrumb( '<div id="breadcrumbs" class="my-8">','</div>' );
		}
	?>

	<header class="woocommerce-products-header">

		<h1 style="color:red;">archive-product.php</h1>	

		<!-- <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
			<h1 class="woocommerce-products-header__title page-title text-4xl"><?php woocommerce_page_title(); ?></h1>
		<?php endif; ?> -->

		<?php
		/**
		 * Hook: woocommerce_archive_description.
		 *
		 * @hooked woocommerce_taxonomy_archive_description - 10
		 * @hooked woocommerce_product_archive_description - 10
		 */
		do_action( 'woocommerce_archive_description' );
		
		?>
	</header>

	<h2 class="text-3xl font-bold uppercase mb-4">Products Categories</h2>

	<?php
		$args = array(
			'taxonomy'	=> 'product_cat',
			'exclude'	=> array(23,32), //Uncategorized, Art Courses
			'hide_empty' => false
		);
		$products_categories = get_terms( $args );
	?>
	
	<div class="container mx-auto min-h-[600px] grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">

		<?php
			$args = array(
				'taxonomy'	=> 'product_cat',
				'exclude'	=> array(23,32), //Exclude: Uncategorized, Art Courses
				'hide_empty' => false
			);
			$products_categories = get_terms( $args );
		?>

		<?php foreach ($products_categories as $cat) : ?> 
			
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
					<a href="<?php echo esc_url(get_term_link($cat));?>" class="grow bg-gray-500 text-white text-center rounded p-2 justify-self-end hover:bg-gray-400">More<span> →</span></a>
				</div>
			</div>
		<?php endforeach;?>

	</div>

</div>

<?php
get_footer( 'shop' );
