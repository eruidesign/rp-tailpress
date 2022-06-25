<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>

<div class="overflow-hidden rounded-lg bg-rppurple-500 flex flex-col">
	<div class="text-center flex-grow">
		<?php the_post_thumbnail('woocommerce_thumbnail',array('class' => 'w-full'));?>
		<h3 class="my-4 text-xl"><?php the_title();?></h3>
		<div class="text-white p-4 text-sm text-justify"><?php the_excerpt();?></div>
	</div>
	<div class="p-4 flex">
		<a href="<?php the_permalink();?>" class="grow border border-white text-white text-center rounded p-2 justify-self-end hover:bg-rppurple-900 hover:text-white">Buy this set<span> →</span></a>
	</div>
</div>
