<?php get_header(); ?>

<?php
	$blog_page_ID = get_queried_object_id();
	$blog_page = get_post($blog_page_ID);
?>

<section class="hero min-h-[600px]" style="background-image: url(<?php echo get_the_post_thumbnail_url($blog_page_ID,'banner-1440x600');?>);">
    <div class="hero-overlay bg-opacity-60"></div>
    <div class="hero-content text-center text-neutral-content">
        <div class="max-w-md">
        	<h1 class="mb-5 text-5xl font-bold"><?php echo $blog_page->post_title;?></h1>
       		<p class="mb-5"><?php echo $blog_page->post_excerpt;?></p>
        </div>
    </div>
</section>

<div class="container mx-auto my-8">

	<?php
		if ( function_exists('yoast_breadcrumb') ) {
		yoast_breadcrumb( '<div id="breadcrumbs" class="my-8">','</div>' );
		}
	?>

	<?php if ( have_posts() ) : ?>
		<?php
		while ( have_posts() ) :
			the_post();
			?>

			<?php get_template_part( 'template-parts/content', get_post_format() ); ?>

		<?php endwhile; ?>

	<?php endif; ?>

</div>

<?php
get_footer();