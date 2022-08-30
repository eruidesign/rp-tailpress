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
$banner_url = get_the_post_thumbnail_url($shop_page_ID,'banner-1440x600');

?>

<section class="md:min-h-[600px] relative overflow-hidden">
	<img src="<?php echo $banner_url;?>" class="h-[100%] w-auto max-w-fit">
	<div class="section-container md:absolute inset-0 z-50 md:flex flex-row-reverse md:min-h-[600px]">
		<svg id="shape1" viewBox="0 0 354.8 799.9" class="hidden md:block order-2 min-w-[267px]">
			<path class="cls-1 fill-rpgray-900" d="M304.7,238.7c-18.1,145.1-36.7,295.1-190.5,507.4c-13.6,18.8-27.3,36.7-41,53.8h281.6V0
			C323.8,85.1,314.5,159.8,304.7,238.7z"/>
			<path class="cls-2 fill-rpgray-900" d="M284.8,236.3c9.7-78,18.9-151.9,48.7-236.3h-31.4c-26.8,82.6-36,156.9-45,229c-17.6,141.5-34.2,275-176.1,470.9
			c-26.8,37-53.6,70.1-81.1,100h47.3c17-20.5,33.9-42.3,50.7-65.5C248.7,526.2,267.1,378.8,284.8,236.3z"/>
		</svg>
		
		<div class="hero-content p-8 bg-rpgray-900 basis-[32rem] text-white order-1 flex items-center">
			<div class="max-w-md">
				<h1 class="mb-5 text-5xl font-bold"><?php echo $shop_page->post_title;?></h1>
				<div class="section-description text-stone-100 font-reenie text-5xl"><?php echo apply_filters('the_content', $shop_page->post_excerpt);?></div>
			</div>
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
				'include'	=> array(27,29,30),
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
